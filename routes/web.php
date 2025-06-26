<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;

Route::get('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'doLogin'])->name('auth.login');
Route::resource('produit', ProduitController::class);
Route::resource('categorie', CategorieController::class);


// Route::patch('produit/{id}/valider', [ProduitController::class, 'valider'])->name('produit.valider');
// Route::get('produit/{id}/gestionProduit', [ProduitController::class, 'gestionProduit'])->name('produit.gestionProduit');
// Route::get('categorie/gestionCategorie', [CategorieController::class, 'index'])->name('categorie.gestionCategorie');
