<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\EventTypes;
use Illuminate\Http\Request;

class EventTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // On récupère tous les utilisateurs
        $eventTypes = EventTypes::all();
        // On retourne les informations des utilisateurs en JSON
        return response()->json($eventTypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nameEventType' => 'required|max:100',
        ]);

        // On crée un nouvel article
        $eventTypes = EventTypes::create([
            'nameEventType' => $request->nameEventType,
        ]);
        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json($eventTypes, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventTypes  $eventTypes
     * @return \Illuminate\Http\Response
     */
    public function show(EventTypes $eventType)
    {
        // On retourne les informations de l'utilisateur en JSON
        return response()->json($eventType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventTypes  $eventTypes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventTypes $eventType)
    {
        $this->validate($request, [
            'nameEventType' => 'required|max:100',
        ]);
        // On crée un nouvel utilisateur
        $eventType->update([
            'nameEventType' => $request->nameEventType,
        ]);
        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json($eventType, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventTypes  $eventTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventTypes $eventType)
    {
          // On supprime l'utilisateur
          $eventType->delete();
          // On retourne la réponse JSON
          return response()->json();
    }
}
