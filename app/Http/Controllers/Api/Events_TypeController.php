<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\events_type;
use Illuminate\Http\Request;

class Events_TypeController extends Controller
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
     * @param  \App\Models\events_type  $events_type
     * @return \Illuminate\Http\Response
     */
    public function show(events_type $events_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\events_type  $events_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, events_type $events_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\events_type  $events_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(events_type $events_type)
    {
        //
    }
}
