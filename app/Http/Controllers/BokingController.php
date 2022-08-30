<?php

namespace App\Http\Controllers;

use App\Models\Boking;
use App\Http\Requests\StoreBokingRequest;
use App\Http\Requests\UpdateBokingRequest;

class BokingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBokingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBokingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Boking  $boking
     * @return \Illuminate\Http\Response
     */
    public function show(Boking $boking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Boking  $boking
     * @return \Illuminate\Http\Response
     */
    public function edit(Boking $boking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBokingRequest  $request
     * @param  \App\Models\Boking  $boking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBokingRequest $request, Boking $boking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Boking  $boking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boking $boking)
    {
        //
    }
}
