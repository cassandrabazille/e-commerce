<?php

<<<<<<< Updated upstream
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', fn () => 'Bienvenue sur le dashboard')->name('dashboard');

Route::get('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'doLogin'])->name('auth.login');
=======

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;

Route::resource('produit', ProduitController::class);
Route::resource('categorie', CategorieController::class);


// Route::patch('produit/{id}/valider', [ProduitController::class, 'valider'])->name('produit.valider');
// Route::get('produit/{id}/gestionProduit', [ProduitController::class, 'gestionProduit'])->name('produit.gestionProduit');
// Route::get('categorie/gestionCategorie', [CategorieController::class, 'index'])->name('categorie.gestionCategorie');
>>>>>>> Stashed changes
