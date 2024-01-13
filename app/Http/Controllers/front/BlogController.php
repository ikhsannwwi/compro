<?php

namespace App\Http\Controllers\front;

use App\Models\admin\Blog;
use Illuminate\Http\Request;
use App\Models\admin\KategoriBlog;
use App\Models\admin\KomentarBlog;
use App\Http\Controllers\Controller;
use App\Models\admin\KomentarBlogReply;

class BlogController extends Controller
{
    public function index(){
        $data = Blog::with('tags.kategori')
                    ->with('user')
                    ->with('komentar_blog')
                    ->with('komentar_blog_reply')
                    ->where('status', 1)
                    ->orderBy('tanggal_posting', 'desc')
                    ->paginate(1);

        $kategori = KategoriBlog::all();

        $recent_post = Blog::where('status', 1)->orderBy('created_at', 'desc')->limit(5)->get();

        $random = Blog::where('status', 1)->inRandomOrder()->first();

        return view('front.blog.index', compact('data', 'kategori', 'recent_post', 'random'));
    }
    
    public function fetchData(){
        $data = Blog::with('tags.kategori')
                    ->with('user')
                    ->with('komentar_blog')
                    ->with('komentar_blog_reply')
                    ->where('status', 1)
                    ->orderBy('tanggal_posting', 'desc')
                    ->paginate(1);
        
        return view('front.blog.fetchData.index', compact('data'))->render();
    }

    public function kategori($slug){
        $kategori = KategoriBlog::all();
    
        $kategoriSlug = $kategori->where('slug', $slug)->first();
        
        $data = Blog::with('tags.kategori')
                    ->with('user')
                    ->with('komentar_blog')
                    ->with('komentar_blog_reply')
                    ->where('status', 1)
                    ->whereHas('tags', function ($query) use ($kategoriSlug) {
                        $query->where('kategori_id', $kategoriSlug->id);
                    })
                    ->orderBy('tanggal_posting', 'desc')
                    ->paginate(10);
    
        $recent_post = Blog::where('status', 1)->orderBy('created_at', 'desc')->limit(5)->get();
    
        $random = Blog::where('status', 1)->inRandomOrder()->first();
    
        return view('front.blog.index', compact('data', 'kategori', 'recent_post', 'random', 'kategoriSlug'));
    }

    public function slug($slug){
        $data = Blog::with('tags.kategori')
                    ->with('user')
                    ->with('komentar_blog')
                    ->with('komentar_blog_reply')
                    ->where('slug', $slug)
                    ->first();

        $kategori = KategoriBlog::all();

        $recent_post = Blog::where('status', 1)->orderBy('created_at', 'desc')->limit(5)->get();

        $random = Blog::where('status', 1)->inRandomOrder()->first();

        $comment = KomentarBlog::with('reply')->where('blog_id', $data->id)->get();

        return view('front.blog.detail', compact('data', 'kategori', 'recent_post', 'random', 'comment'));
    }

    public function fetchDataComment(Request $request)
    {
        if ($request->ajax()) {
            $data = Blog::where('slug', $request->slug)->first();
            $comment = KomentarBlog::with('reply')->where('blog_id', $data->id)->get();

            return view('front.blog.fetchData.comment', compact('comment','data'))->render();
        }
    }

    public function comment(Request $request,$slug){
        $blog = Blog::where('slug', $slug)
        ->with('komentar_blog')
        ->with('komentar_blog_reply')->first();
        
        $data = KomentarBlog::create([
            'user_id' => 0,
            'komentar_id' => 0,
            'blog_id' => $blog->id,
            'isi' => $request->comment,
        ]);
        
        $blog = Blog::where('slug', $slug)
        ->with('komentar_blog')
        ->with('komentar_blog_reply')->first();
        $count = 0;
        $count += $blog->komentar_blog->count();
        $count += $blog->komentar_blog_reply->count();

        return response()->json([
            'status' => 'success',
            'message' => 'Data telah disimpan.',
            'count' => $count,
        ]);
    }

    public function reply(Request $request,$slug){
        $blog = Blog::where('slug', $slug)
        ->with('komentar_blog')
        ->with('komentar_blog_reply')->first();
        
        $data = KomentarBlogReply::create([
            'user_id' => 0,
            'komentar_id' => $request->komentar_id,
            'blog_id' => $blog->id,
            'isi' => $request->comment,
        ]);
        
        $blog = Blog::where('slug', $slug)
        ->with('komentar_blog')
        ->with('komentar_blog_reply')->first();
        $count = 0;
        $count += $blog->komentar_blog->count();
        $count += $blog->komentar_blog_reply->count();

        return response()->json([
            'status' => 'success',
            'message' => 'Data telah disimpan.',
            'count' => $count,
        ]);
    }
}
