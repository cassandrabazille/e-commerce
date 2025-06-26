<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CartController;

Route::get('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'doLogin'])->name('auth.login');
Route::resource('produits', ProduitController::class);
Route::resource('categorie', CategorieController::class);
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/panier/ajouter/{idProduit}', [CartController::class, 'add'])->name('cart.add');





// Route::patch('produit/{id}/valider', [ProduitController::class, 'valider'])->name('produit.valider');
// Route::get('produit/{id}/gestionProduit', [ProduitController::class, 'gestionProduit'])->name('produit.gestionProduit');
// Route::get('categorie/gestionCategorie', [CategorieController::class, 'index'])->name('categorie.gestionCategorie');
