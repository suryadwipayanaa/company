<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        return view('tampilan.blogs',[
            'title' => 'Blogs',
            "blogs" => Blog::latest()->filter(request(['search', 'category']))->paginate(7)
        ]);
    }

    public function show(Blog $slug){
        return view('tampilan.blog',[
            'title' => 'SigleBlog',
            "blogs" => $slug
        ]);
    }

    public function sigle(Category $slug){
        return view('tampilan.blogs',[
            'title' => 'Blogs Category',
            "blogs" => $slug->blog
        ]);
    }
}
