<?php

namespace App\Http\Controllers\front;

use App\Models\FreeQoute;
use App\Models\admin\Blog;
use App\Models\OurFeature;
use App\Models\admin\About;
use App\Models\Testimonial;
use App\Models\admin\Banner;
use App\Models\admin\Client;
use Illuminate\Http\Request;
use App\Models\admin\Contact;
use App\Models\admin\Gallery;
use App\Models\admin\Service;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        return view('front.home.index');
    }

    public function getService(){
        $data = Service::limit(4)->get();

        return response()->json([
            'data' => $data,
        ], 200);
    }
    
    public function getBlog(){
        $data = Blog::with('kategori')->with('komentar_blog')->with('komentar_blog_reply')->where('status', 1)->orderBy('created_at', 'desc')->get();

        return response()->json([
            'data' => $data,
        ], 200);
    }
    
    public function getGallery(){
        $data = Gallery::limit(4)->get();

        return response()->json([
            'data' => $data,
        ], 200);
    }
    
    public function getBanner(){
        $data = Banner::all();

        return response()->json([
            'data' => $data,
        ], 200);
    }
    
    public function getContact(){
        $data = Contact::all();

        return response()->json([
            'data' => $data,
        ], 200);
    }
    
    public function getAbout(){
        $data = About::all();

        return response()->json([
            'data' => $data,
        ], 200);
    }
    
    public function getOurFeature(){
        $data = OurFeature::all();

        return response()->json([
            'data' => $data,
        ], 200);
    }
    
    public function getFreeQoute(){
        $data = FreeQoute::all();

        return response()->json([
            'data' => $data,
        ], 200);
    }
    
    public function getTestimonial(){
        $data = Testimonial::all();

        return response()->json([
            'data' => $data,
        ], 200);
    }
    
    public function getClient(){
        $data = Client::all();

        return response()->json([
            'data' => $data,
        ], 200);
    }
}
