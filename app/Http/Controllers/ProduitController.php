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
    $produits = Produit::all(); // Récupère tous les produits
    return view('produits.index', compact('produits'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('produits.create', compact('categories'));
    }

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'id_categorie' => 'required|exists:categories,id_categorie',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $data = $request->only(['name', 'description', 'id_categorie', 'price']);
    
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('produits', 'public');
    }

    Produit::create($data);

    return redirect()->route('produit.index')
        ->with('success', 'Produit créé avec succès');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produit = Produit::with('categorie')->findOrFail($id);
        return view('produits.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produit = Produit::find($id);
        $categories = Categorie::all();
        return view('produits.edit', compact('produit', 'categories'));
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