<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:4'
        ]);
        if (
            \Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ])
        ) {
            $request->session()->regenerate();
            return redirect()->route('produits.index');
        }
        return redirect()->back()->withErrors('Le mot de passe ou l\'email ne correspond pas');
    }
}
