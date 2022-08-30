<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ShowCategoryController extends Controller
{
   public function index(){
    return view('tampilan.category',[
        'title' => 'Category',
        'category' => Category::latest()->get()
    ]);
   }
}
