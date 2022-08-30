<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Http\Requests\StorePromoRequest;
use App\Http\Requests\UpdatePromoRequest;
use Illuminate\Support\Facades\Storage;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tampilan.dasboard.promo',[
            'title' => 'Promo',
            'promo' => Promo::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tampilan.dasboard.addPromo',[
            'title' => 'Add Promo'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePromoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePromoRequest $request)
    {

        $validateData = $request->validate([
            'title' => 'required|min:5|max:100',
            'image' => 'required|file|max:1500',
            'slug' => 'required|unique:promos',
            'diskon' => 'required',
            'expiret' => 'required',
            'hargaAwal' => 'required',
            'hargaAkhir' => 'required',
            'deskripsi' => 'required',
            'fasilitas' => 'required'
        ]);

        $validateData['image'] = $request->file('image')->store('promo');

        Promo::create($validateData);
        return redirect('/dashboard/promo')->with('success','Added Promo Succesfully!');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function show(Promo $promo)
    {
        return view('tampilan.dasboard.detailPromo',[
            'title' => 'Promo',
            'promo' => $promo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo $promo)
    {
        return view('tampilan.dasboard.editPromo',[
            'title' => 'Edit Promo',
            'promo' => $promo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePromoRequest  $request
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePromoRequest $request, Promo $promo)
    {
        $rules = [
            'title' => 'required|min:5|max:100',
            'image' => 'file|max:1500',
            'diskon' => 'required',
            'expiret' => 'required',
            'hargaAwal' => 'required',
            'hargaAkhir' => 'required',
            'deskripsi' => 'required',
            'fasilitas' => 'required'
        ];

        if($request['slug'] != $promo['slug']){
            $rules['slug'] = 'required|unique:promos';
        }

        $validateData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('promo');
        }

        Promo::where('id', $promo->id)
            ->update($validateData);

        return redirect('/dashboard/promo')->with('successUpdate', 'Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promo $promo)
    {
        if($promo->image){
            Storage::delete($promo->image);
        }

        Promo::destroy($promo->id);

        return redirect('/dashboard/promo')->with('successDelete','Deleted Successfully!');
    }
}
