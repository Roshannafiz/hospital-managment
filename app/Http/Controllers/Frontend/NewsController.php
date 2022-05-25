<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        // Get All News
        $blogs = Blog::where('status', 1)->get();
        // Recent Blog
        $recent_blogs = Blog::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();
        return view('frontend.news.index', compact('blogs', 'recent_blogs'));
    }
}
