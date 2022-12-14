<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $events = DB::table('events')
            ->leftjoin('event_types', 'event_types.id', '=', 'events.event_types_id')
            ->leftjoin('places', 'places.id', '=', 'events.places_id')
            ->select('events.*', 'nameEventType', 'namePlace')
            ->get()
            ->toArray();

        return response()->json($events);

        // On récupère tous les utilisateurs
        $events = Events::all();
        // On retourne les informations des utilisateurs en JSON
        return response()->json($events);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nameEvent' => 'required|max:100',
        //     'descriptionEvent' => 'required',
        //     // 'imageEvent' => 'required',
        //     'priceEvent',
        //     'startDateEvent',
        //     'endDateEvent',
        //     'event_types_id' => 'required',
        //     'places_id' => 'required',
        // ]);

        $filename = "";
        if ($request->hasFile('imageEvent')) {
            // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg"
            $filenameWithExt = $request->file('imageEvent')->getClientOriginalName();
            $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // On récupère l'extension du fichier, résultat $extension : ".jpg"
            $extension = $request->file('imageEvent')->getClientOriginalExtension();
            // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $fileNameToStore :"jeanmiche_20220422.jpg"
            $filename = $filenameWithoutExt . '_' . time() . '.' . $extension;
            // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin /storage/app
            $path = $request->file('imageEvent')->storeAs('public/uploads', $filename);
        } else {
            $filename = Null;
        }

        // $startDateEventFr = $request->startDateEvent;
        // $startDateEvent = Carbon::createFromFormat('d-m-Y', $startDateEventFr)
        //     ->format('Y-m-d');

        // $endDateEventFr = $request->endDateEvent;
        // $endDateEvent = Carbon::createFromFormat('d-m-Y', $endDateEventFr)
        //     ->format('Y-m-d');

        // On crée un nouvel contact
        $events = Events::create([
            'nameEvent' => $request->nameEvent,
            'descriptionEvent' => $request->descriptionEvent,
            'imageEvent' => $filename,
            'priceEvent' => $request->priceEvent,
            'startDateEvent' => $request->startDateEvent,
            'endDateEvent' => $request->endDateEvent,
            'event_types_id' => $request->event_types_id,
            'places_id' => $request->places_id,
        ]);
        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json($events, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function show(Events $event)
    {
        $event = DB::table('events')
        ->leftjoin('event_types', 'event_types.id', '=', 'events.event_types_id')
        ->leftjoin('places', 'places.id', '=', 'events.places_id')
        ->select('events.*', 'nameEventType', 'namePlace')
        ->where('events.id', '=', $event->id)
        ->get();
        
        // On retourne les informations de l'utilisateur en JSON
        return response()->json($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Events $event)
    {
        // $request->validate([
        //     'nameEvent' => 'required|max:100',
        //     'descriptionEvent' => 'required',
        //     // 'imageEvent' => 'required',
        //     'priceEvent',
        //     'startDateEvent',
        //     'endDateEvent',
        //     'event_types_id' => 'required',
        //     'places_id' => 'required',
        // ]);
        $filename = "";
        if ($request->hasFile('imageEvent')) {
            // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg"
            $filenameWithExt = $request->file('imageEvent')->getClientOriginalName();
            $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // On récupère l'extension du fichier, résultat $extension : ".jpg"
            $extension = $request->file('imageEvent')->getClientOriginalExtension();
            // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $fileNameToStore :"jeanmiche_20220422.jpg"
            $filename = $filenameWithoutExt . '_' . time() . '.' . $extension;
            // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin /storage/app
            $path = $request->file('imageEvent')->storeAs('public/uploads', $filename);
        } else {
            $filename = Null;
        }
        $filename = "";
        if ($request->hasFile('imageEvent')) {
            // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg"
            $filenameWithExt = $request->file('imageEvent')->getClientOriginalName();
            $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // On récupère l'extension du fichier, résultat $extension : ".jpg"
            $extension = $request->file('imageEvent')->getClientOriginalExtension();
            // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $fileNameToStore :"jeanmiche_20220422.jpg"
            $filename = $filenameWithoutExt . '_' . time() . '.' . $extension;
            // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin /storage/app
            $path = $request->file('imageEvent')->storeAs('public/uploads', $filename);
        } else {
            $filename = Null;
        }
        // dd($place);
        // On crée un nouvel utilisateur
        $event->update([
            'nameEvent' => $request->nameEvent,
            'descriptionEvent' => $request->descriptionEvent,
            'imageEvent' => $filename,
            'priceEvent' => $request->priceEvent,
            'startDateEvent' => $request->startDateEvent,
            'endDateEvent' => $request->endDateEvent,
            'event_types_id' => $request->event_types_id,
            'places_id' => $request->places_id,
        ]);
        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json($event, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function destroy(Events $event)
    {
        // On supprime l'utilisateur
        $event->delete();
        // On retourne la réponse JSON
        return response()->json();
    }
}
