<?php

namespace App\Http\Controllers;
use App\Models\Produit;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('cart.index', compact('cart'));
    }

public function add(string $idProduit, Request $request)
{
    // Si tu ne passes pas quantity dans le formulaire, mets une valeur par défaut
    $quantity = $request->input('quantity', 1);

    // Validation facultative si tu as un champ quantity
    if ($quantity < 1) {
        return redirect()->back()->withErrors('La quantité doit être au moins 1');
    }

    $produit = Produit::findOrFail($idProduit);

    $cart = session()->get('cart', []);

    if (isset($cart[$idProduit])) {
        $cart[$idProduit]['quantity'] += $quantity;
    } else {
        $cart[$idProduit] = [
            'quantity' => $quantity,
            'name' => $produit->name,
            'price' => $produit->price,
        ];
    }

    session()->put('cart', $cart);

    return redirect()->back()->with('success', 'Produit ' . $produit->name . ' bien ajouté au panier.');
}



}
