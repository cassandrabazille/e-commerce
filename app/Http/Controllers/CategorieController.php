<?php

namespace App\Http\Controllers;
use App\Models\Categorie;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategorieController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Categorie::all();
        return view('categorie.gestionCategorie', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('categorie.create');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
        ]);

        Categorie::create([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')), 
            'description' => $request->input('description'),
        ]);

        return redirect()->route('categorie.index')->with('success', 'Catégorie créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('categorie.show', compact('categorie'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('categorie.edit', compact('categorie'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titre' => 'required',
        ]);
        $categorie = Categorie::findOrFail($id);

        $categorie->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('categorie.index')
            ->with('success', 'La catégorie a bien été modifiée.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();
        return redirect()->route('categorie.index')
            ->with('success', 'La catégorie a bien été supprimée.');
    }
}