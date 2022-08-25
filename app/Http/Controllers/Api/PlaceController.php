<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\places;
use Illuminate\Http\Request;

class PlaceController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\places  $places
     * @return \Illuminate\Http\Response
     */
    public function show(places $places)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\places  $places
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, places $places)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\places  $places
     * @return \Illuminate\Http\Response
     */
    public function destroy(places $places)
    {
        //
    }
}
