<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class ShowBranchController extends Controller
{
    public function show(){
        return view('tampilan.contact',[
            'title' => 'Contact All',
            'branch' => Branch::latest()->get()
        ]);
    }
}
