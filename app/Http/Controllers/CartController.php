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

        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $quantity = $request->input('quantity');
        dd($quantity);
        $produit = Produit::findOrFail($idProduit);

        $cart = session()->get('cart', []);

        if (isset($cart[$idProduit])) {
            $cart[$idProduit]['quantity']++;
        } else {
            $cart[$idProduit] = [
                'quantity' => 1,
                'name' => $produit->name,
                'price' => $produit->price
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produit ' . $produit->name . ' bien ajouté');
    }

  
}
