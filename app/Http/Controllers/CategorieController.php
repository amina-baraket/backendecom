<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //get
    public function index()
    {
        try{
            $categories=Categorie::all();
            return response()->json($categories);
        }catch(\Exception $e){
            return response()->json("les categories non disponible");
        }
       
    }

    /**
     * Store a newly created resource in storage.
     */
    //post
    public function store(Request $request)
    {
        try{
            $categorie=new categorie([
                'nomCategorie'=>$request->input('nomCategorie'),
                'imageCategorie'=>$request->input('imageCategorie')
            ]);
            $categorie->save();
            return response()->json($categorie);
        }catch(\Exception $e){
            return response()->json("probléme d'ajout de categorie");
        }
    }

    /**
     * Display the specified resource.
     */
    //
    public function show( $id)
    {
        try{
            $categorie=Categorie::findOrFail($id);
            return response()->json($categorie);
        }catch(\Exception $e){
            return response()->json("les categories non disponible");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        try {
            $categorie=Categorie::findorFail($id);
            $categorie->update($request->all());
            return response()->json($categorie);
            } catch (\Exception $e) {
            //return response()->json("probleme de modification");
            return response()->json("probleme de modification {$e->getMessage()},{$e->getCode()}");
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    //delete
    public function destroy( $id)
    {
        try {
            $categorie=Categorie::findOrFail($id);
            $categorie->delete();
            return response()->json("catégorie supprimée avec succes");
            } catch (\Exception $e) {
            return response()->json("probleme de suppression de catégorie");
            }
    }
}
