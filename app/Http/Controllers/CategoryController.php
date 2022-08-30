<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tampilan.dasboard.category',[
            'title' => 'Category',
            'category' => Category::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tampilan.dasboard.addCategory',[
            'title' => 'Add Category',
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
            'category' => 'required',
            'slug' => 'required|unique:categories',
            'image' => 'required|max:1500|file'
        ]);

        $validateData['image'] = $request->file('image')->store('category');

        Category::create($validateData);

        return redirect('/dashboard/category')->with('success','Added Category Succesfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('tampilan.dasboard.editCategory',[
            'title' => 'Edit Category',
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rule = [
            'category' => 'required',
            'image' => 'max:1500|file'
        ];

        if($request->slug != $category->slug){
            $validateData['slug'] = 'required|unique:categories';
        }

        $validateData = $request->validate($rule);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('category');
        }

        Category::where('id',$category->id)->update($validateData);

        return redirect('/dashboard/category')->with('updatedSucces','Updated Succesfully');

        
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->image){
            Storage::delete($category->image);
        }

        Category::destroy($category->id);

        return redirect('/dashboard/category')->with('deleteSucces','Deleted Succesfully');
        

    }
}
