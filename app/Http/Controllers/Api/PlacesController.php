<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Places;
use Illuminate\Http\Request;

class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // On récupère tous les utilisateurs
        $places = Places::all();
        // On retourne les informations des utilisateurs en JSON
        return response()->json($places);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namePlace' => 'required|max:100',
            'descriptionPlace' => 'required',
            // 'imagePlace' => 'required',
            'adressPlace',
            'latitudePlace',
            'longitudePlace',
            'place_types_id' => 'required',
        ]);

        $filename = "";
        if ($request->hasFile('imagePlace')) {
            // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg"
            $filenameWithExt = $request->file('imagePlace')->getClientOriginalName();
            $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // On récupère l'extension du fichier, résultat $extension : ".jpg"
            $extension = $request->file('imagePlace')->getClientOriginalExtension();
            // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $fileNameToStore :"jeanmiche_20220422.jpg"
            $filename = $filenameWithoutExt . '_' . time() . '.' . $extension;
            // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin /storage/app
            $path = $request->file('imagePlace')->storeAs('public/uploads', $filename);
        } else {
            $filename = Null;
        }

        // On crée un nouvel contact
        $places = Places::create([
            'namePlace' => $request->namePlace,
            'descriptionPlace' => $request->descriptionPlace,
            'imagePlace' => $filename,
            'adressPlace' => $request->adressPlace,
            'latitudePlace' => $request->latitudePlace,
            'longitudePlace' => $request->longitudePlace,
            'place_types_id' => $request->place_types_id,
        ]);
        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json($places, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Places  $places
     * @return \Illuminate\Http\Response
     */
    public function show(Places $place)
    {
       // On retourne les informations de l'utilisateur en JSON
       return response()->json($place);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Places  $places
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Places $place)
    {
        //$this->validate($request, [
            // 'namePlace' => 'required|max:100',
            // 'descriptionPlace' => 'required',
            // // 'imagePlace' => 'required',
            // 'adressPlace',
            // 'latitudePlace',
            // 'longitudePlace',
            // 'place_types_id' => 'required',
       // ]);

        $filename = "";
        if ($request->hasFile('imagePlace')) {
            // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg"
            $filenameWithExt = $request->file('imagePlace')->getClientOriginalName();
            $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // On récupère l'extension du fichier, résultat $extension : ".jpg"
            $extension = $request->file('imagePlace')->getClientOriginalExtension();
            // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $fileNameToStore :"jeanmiche_20220422.jpg"
            $filename = $filenameWithoutExt . '_' . time() . '.' . $extension;
            // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin /storage/app
            $path = $request->file('imagePlace')->storeAs('public/uploads', $filename);
        } else {
            $filename = Null;
        }
// dd($place);
        // On crée un nouvel utilisateur
        $place->update([
            'namePlace' => $request->namePlace,
            'descriptionPlace' => $request->descriptionPlace,
            'imagePlace' => $filename,
            'adressPlace' => $request->adressPlace,
            'latitudePlace' => $request->latitudePlace,
            'longitudePlace' => $request->longitudePlace,
            'place_types_id' => $request->place_types_id,
        ]);
        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json($place, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Places  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Places $place)
    {
         // On supprime l'utilisateur
         $place->delete();
         // On retourne la réponse JSON
         return response()->json();
    }
}
