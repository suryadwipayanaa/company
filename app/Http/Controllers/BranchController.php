<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use Illuminate\Support\Facades\Storage;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tampilan.dasboard.branch',[
            'title' => 'Branch',
            'branch' => Branch::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tampilan.dasboard.addBranch',[
            'title' => 'Add Branch'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBranchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBranchRequest $request)
    {
        $validateData = $request->validate([
            'image' => 'required|file|max:1500',
            'name' => 'required',
            'maps' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'telp' => 'required',
            'slug' => 'required|unique:branches',
            'whattsapp' => 'required',
            'instagram' => 'required',
            'email' => 'required'
        ]);

        $validateData['image'] = $request->file('image')->store('branch');

        Branch::create($validateData);

        return redirect('/dashboard/branch')->with('success','Add Branch Succesfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        return view('tampilan.dasboard.detailBranch',[
            'title' => 'Detail Branch',
            'branch' => $branch
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        return view('tampilan.dasboard.editBranch',[
            'title' => 'Edit Branch',
            'edit' => $branch
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBranchRequest  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBranchRequest $request, Branch $branch)
    {
        $rules= [
            'image' => 'max:1500',
            'name' => 'required',
            'maps' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'telp' => 'required',
            'whattsapp' => 'required',
            'instagram' => 'required',
            'email' => 'required'
        ];

        if($request->slug != $branch->slug){
           $rules['slug'] = 'required:unique:branches';
        }

        $validateData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('branch');
        }

        Branch::where('id', $branch->id)->update($validateData);

        return redirect('/dashboard/branch')->with('successUpdate', 'Updated Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        if($branch->image){
            Storage::delete($branch->image);
        }

        Branch::destroy($branch->id);

        return redirect('/dashboard/branch')->with('successDelete', 'Deleted Succesfully!');
    }
}
