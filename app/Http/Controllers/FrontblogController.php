<?php

namespace App\Http\Controllers;
use App\Blog;
use App\Bsettings;
use Illuminate\Http\Request;

class FrontblogController extends Controller
{
    public function index ()
    {
        $posts= Blog::orderBy('id', 'DESC')->get();
        return view('frontend.blog.index')->withPosts($posts);
    }
    public function single($slug)
    {
        $post = Blog::where('slug', '=', $slug)->firstOrFail();
        $settings = Bsettings::where('id', '=', 1);
        return view('frontend.blog.single')->withPost($post)->withSettings($settings);
    }
}
