<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // On récupère tous les utilisateurs
        $contacts = Contacts::all();
        // On retourne les informations des utilisateurs en JSON
        return response()->json($contacts);
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
            'firstnameContact' => 'required|max:100',
            'lastnameContact' => 'required|max:100',
            'emailContact' => 'required|max:100',
            'messageContact' => 'required',
        ]);

        // On crée un nouvel contact
        $contacts = Contacts::create([
            'firstnameContact' => $request->firstnameContact,
            'lastnameContact' => $request->lastnameContact,
            'emailContact' => $request->emailContact,
            'messageContact' => $request->messageContact,
        ]);
        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json($contacts, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Contacts $contact)
    {
        // $contacts =  Contacts::whereId($contacts->id)->firstOrFail();

        // On retourne les informations de l'utilisateur en JSON
        return response()->json($contact);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacts $contacts)
    {
         // On supprime l'utilisateur
         $contacts->delete();
         // On retourne la réponse JSON
         return response()->json();
    }
}
