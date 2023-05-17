<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function singleView($id){
        $blog = Blog::find($id);

        $relatedBlog = Blog::where('status', 'Publish')->inRandomOrder()->take(3)->get();
        $popularBlog = Blog::where('status', 'Publish')->inRandomOrder()->take(3)->get();

        return view('web.pages.SinglePostView', [
            'blog' => $blog,
            'relatedBlog' => $relatedBlog,
            'popularBlog' => $popularBlog
        ]);
    }

    public function blogList(){
        $blogs = Blog::latest()->paginate(10);
        $popularBlog = Blog::where('status', 'Publish')->inRandomOrder()->take(3)->get();

        return view('web.pages.Blogs', [
            'blogs' => $blogs,
            'popularBlog' => $popularBlog
        ]);
    }
}
