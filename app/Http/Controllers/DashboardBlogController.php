<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tampilan.dasboard.blogs',[
            'title' => 'Blogs',
            'blogs' => Blog::latest()->filter(request(['search']))->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tampilan.dasboard.addPost',[
            "title" => " Add Posts",
            "category" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    
    {

        $validateData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'slug' => 'required|unique:blogs',
            'image' => 'required|file|max:1500',
            'desFull' => 'required'
        ]);

        $validateData['image'] = $request->file('image')->store('images');

        $validateData['desSingkat'] = Str::limit(strip_tags($request->desFull),200);

        Blog::create($validateData);

        return redirect('/dashboard/blogs')->with('succes', 'New Post Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('tampilan.dasboard.blog',[
            'title' => 'Blog',
            'blogs' => $blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('tampilan.dasboard.editPost',[
            'title' => 'Edit',
            'blog' => $blog,
            "category" => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'max:1500',
            'desFull' => 'required'
        ];

        if($request->slug != $blog->slug){
            $rules['slug'] = 'required|unique:blogs';
        }

        $validateData = $request->validate($rules);

        $validateData['desFull'] = Str::limit(strip_tags($request->desFull));
        
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('images');
        }

        Blog::where('id', $blog->id)
                    ->update($validateData);

        return redirect('/dashboard/blogs')->with('updatedSucces', 'Data Updated Succesfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if($blog->image){
            Storage::delete($blog->image);
        }
        Blog::destroy($blog->id);

        return redirect('/dashboard/blogs')->with('deleteSucces','Deleted Succesfully!');
    }
}



