<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Categorie::all();
        $selectedCategorie = null;
        $produits = Produit::all();

        if ($request->has('categories')) {
            $selectedCategorie = Categorie::with('produits')->find($request->input('categories'));

            if ($selectedCategorie) {
                $produits = $selectedCategorie->produits;
            }
        }
        return view('produit.liste', compact('produits', 'categories', 'selectedCategorie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('produit.create', compact('categories'));
    }

public function store(Request $request)
{
    // Validation des données
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'id_categorie' => 'required|exists:categories,id_categorie',
    ]);

    // Création du produit
    Produit::create([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'id_categorie' => $request->input('id_categorie'),
        'done' => false,
    ]);

    return redirect()->route('produit.index')->with('success', 'Produit créé avec succès');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produit = Produit::with('categorie')->findOrFail($id);
        return view('produit.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produit = Produit::find($id);
        $categories = Categorie::all();
        return view('produit.edit', compact('produit', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
 public function update(Request $request, string $id)
{
    // Validation des données
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'id_categorie' => 'required|exists:categories,id_categorie',
    ]);

    // Recherche du produit
    $produit = Produit::findOrFail($id);

    // Mise à jour
    $produit->update([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'id_categorie' => $request->input('id_categorie'),
    ]);

    return redirect()->route('produit.index')
        ->with('success', 'Le produit a bien été modifié.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tache = Produit::find($id);
        $tache->delete();
        return redirect()->route('produit.index')
            ->with('success', 'Le produit a bien été supprimé.');
    }
}