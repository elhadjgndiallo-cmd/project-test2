<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProduitLima;
use Illuminate\Support\Str;

class ProduitController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:ajouter')->only(['create', 'store']);
        $this->middleware('permission:modifier')->only(['edit', 'update']);
        $this->middleware('permission:supprimer')->only(['destroy']); 
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = ProduitLima::all();
        return view('liste', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->merge(['slug'=> Str::slug($request->nom)]);
       ProduitLima::create($request->all());
       return redirect()->route('produits.index')->with('success', 'Produit créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $produit=ProduitLima::find($id);
        return view('produitedit', compact('produit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $produit=ProduitLima::find($id);
        $request->merge(['slug'=> Str::slug($request->nom)]);
        $produit->update($request->all());
        return redirect()->route('produits.index')->with('success', 'Produit modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $produit=ProduitLima::find($id);
        $produit->delete();
        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
      }
}
