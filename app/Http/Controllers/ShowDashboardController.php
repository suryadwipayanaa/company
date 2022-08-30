<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class ShowDashboardController extends Controller
{
    public function index(){
        return view('tampilan.dasboard.dasboard',[
            'title' => 'My Dashboard',
            'blogs' => Blog::all()
        ]);
    }
}
