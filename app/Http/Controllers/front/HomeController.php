<?php

namespace App\Http\Controllers\front;

use App\Models\Team;
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
        $service = Service::where('name', '!=', 'title')->get();
        $title = Service::where('name', 'title')->first();

        if (!$title) {
            $title = '';
        } else {
            $title = $title->value;
        }

        $freeqoute = FreeQoute::get()->toArray();
        $freeqoute = array_column($freeqoute, 'value', 'name');

        $contact = Contact::get()->toArray();
        $contact = array_column($contact, 'value', 'name');
        return response()->json([
            'data' => $service,
            'freeqoute' => $freeqoute,
            'contact' => $contact,
            'title' => $title,
        ], 200);
    }
    
    public function getBlog(){
        $data = Blog::with('tags.kategori')->with('komentar_blog')->with('komentar_blog_reply')->where('status', 1)->orderBy('tanggal_posting', 'desc')->get();

        return response()->json([
            'data' => $data,
            'path' => url('/') . '/administrator/assets/media/blog/',
        ], 200);
    }

    public function count(){
        $Testimonial = Testimonial::all();
        $Blog = Blog::where('status', 1)->get();
        $Client = Client::all();

        return response()->json([
            'testimonial' => $Testimonial->count(),
            'blog' => $Blog->count(),
            'client' => $Client->count(),
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
        $contact = Contact::get()->toArray();
        $contact = array_column($contact, 'value', 'name');

        return response()->json([
            'data' => $data,
        ], 200);
    }
    
    public function getAbout(){
        $data = About::get()->toArray();
        $data = array_column($data, 'value', 'name');

        $ourfeature = OurFeature::all();

        $contact = Contact::get()->toArray();
        $contact = array_column($contact, 'value', 'name');

        return response()->json([
            'data' => $data,
            'ourfeature' => $ourfeature,
            'contact' => $contact,
            'path' => url('/') . '/administrator/assets/media/gallery/',
        ], 200);
    }
    
    public function getOurFeature(){
        $data = OurFeature::all();

        return response()->json([
            'data' => $data,
            'path' => url('/') . '/administrator/assets/media/gallery/',
        ], 200);
    }
    
    public function getFreeQoute(){
        $data = FreeQoute::get()->toArray();
        $data = array_column($data, 'value', 'name');

        $ourfeature = OurFeature::all();

        $contact = Contact::get()->toArray();
        $contact = array_column($contact, 'value', 'name');

        $service = Service::where('name', '!=', 'title')->get();
        return response()->json([
            'data' => $data,
            'contact' => $contact,
            'ourfeature' => $ourfeature,
            'service' => $service,
        ], 200);
    }
    
    public function getTestimonial(){
        $data = Testimonial::all();

        return response()->json([
            'data' => $data,
            'path' => url('/') . '/administrator/assets/media/testimonial/',
        ], 200);
    }
    
    public function getClient(){
        $data = Client::all();

        return response()->json([
            'data' => $data,
        ], 200);
    }
    
    public function getTeam(){
        $data = Team::with('sosial_media')->get();

        return response()->json([
            'data' => $data,
            'path' => url('/') . '/administrator/assets/media/team/',
        ], 200);
    }
}
