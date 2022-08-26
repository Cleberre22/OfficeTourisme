<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PlaceTypes;
use Illuminate\Http\Request;

class PlaceTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // On récupère tous les utilisateurs
        $placeTypes = PlaceTypes::all();
        // On retourne les informations des utilisateurs en JSON
        return response()->json($placeTypes);
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
            'namePlaceType' => 'required|max:100',
        ]);

        // On crée un nouvel article
        $placeTypes = PlaceTypes::create([
            'namePlaceType' => $request->namePlaceType,
        ]);
        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json($placeTypes, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlaceTypes  $placeTypes
     * @return \Illuminate\Http\Response
     */
    public function show(PlaceTypes $placeType)
    {
          // On retourne les informations de l'utilisateur en JSON
          return response()->json($placeType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlaceTypes  $placeTypes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlaceTypes $placeType)
    {
        $this->validate($request, [
            'namePlaceType' => 'required|max:100',
        ]);
        // On crée un nouvel utilisateur
        $placeType->update([
            'namePlaceType' => $request->namePlaceType,
        ]);
        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json($placeType, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlaceTypes  $placeTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlaceTypes $placeType)
    {
        // On supprime l'utilisateur
        $placeType->delete();
        // On retourne la réponse JSON
        return response()->json();
    }
}
