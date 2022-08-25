<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // On récupère tous les utilisateurs
        $articles = Article::all();
        // On retourne les informations des utilisateurs en JSON
        return response()->json($articles);
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
            'titleArticle' => 'required|max:100',
            'contentArticle' => 'required',
            'image' => 'required',
            'user_id' => 'required',
        ]);

        $filename = "";
        if ($request->hasFile('image')) {
            // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg"
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // On récupère l'extension du fichier, résultat $extension : ".jpg"
            $extension = $request->file('image')->getClientOriginalExtension();
            // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $fileNameToStore :"jeanmiche_20220422.jpg"
            $filename = $filenameWithoutExt . '_' . time() . '.' . $extension;
            // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin /storage/app
            $path = $request->file('image')->storeAs('public/uploads', $filename);
        } else {
            $filename = Null;
        }

        // On crée un nouvel article
        $article = Article::create([
            'titleArticle' => $request->titleArticle,
            'contentArticle' => $request->contentArticle,
            'image' => $request->image,
            'user_id' => $request->user_id,
        ]);
        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json($article, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        // On retourne les informations de l'utilisateur en JSON
        return response()->json($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->validate($request, [
            'titleArticle' => 'required|max:100',
            'contentArticle' => 'required',
            'image' => 'required',
        ]);
        // On crée un nouvel utilisateur
        $article->update([
            'titleArticle' => $request->titleArticle,
            'contentArticle' => $request->contentArticle,
            'image' => $request->image,
        ]);
        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json($article, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        // On supprime l'utilisateur
        $article->delete();
        // On retourne la réponse JSON
        return response()->json();
    }
}
