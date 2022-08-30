<?php

namespace App\Http\Controllers;

use App\Models\Say;
use App\Http\Requests\StoreSayRequest;
use App\Http\Requests\UpdateSayRequest;
use Illuminate\Support\Facades\Storage;

class SayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tampilan.dasboard.say',[
            'title' => 'People Say',
            'say' => Say::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tampilan.dasboard.addSay',[
            'title' => 'Add Say'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSayRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSayRequest $request)
    {
     $validateData = $request->validate([
        'name' => 'required',
        'slug' => 'required|unique:says',
        'image' => 'required|file|max:1500',
        'deskripsi' => 'required'
     ]);
     
     $validateData['image'] = $request->file('image')->store('say');

     Say::create($validateData);

     return redirect('/dashboard/say')->with('success','Added Succesfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Say  $say
     * @return \Illuminate\Http\Response
     */
    public function show(Say $say)
    {
        return view('tampilan.dasboard.detailSay',[
            'title' => 'Detail Say',
            'say' => $say
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Say  $say
     * @return \Illuminate\Http\Response
     */
    public function edit(Say $say)
    {
        return view('tampilan.dasboard.editSay',[
            'title' => 'Edit Say',
            'say' => $say
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSayRequest  $request
     * @param  \App\Models\Say  $say
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSayRequest $request, Say $say)
    {
        $rules = [
         'name' => 'required',
        'image' => 'file|max:1500',
        'deskripsi' => 'required'
        ];

        if($request['slug'] != $say['slug']){
            $rules['slug'] = 'required|unique:says';
        }

        $validateData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('say');
        }

        Say::where('id', $say->id)->update($validateData);

        return redirect('/dashboard/say')->with('successUpdate','Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Say  $say
     * @return \Illuminate\Http\Response
     */
    public function destroy(Say $say)
    {
        if($say->image){
            Storage::delete($say->image);
        }

        Say::destroy($say->id);

        return redirect('/dashboard/say')->with('successDelete','Deleted Succesfully');
    }
}
