<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', fn () => 'Bienvenue sur le dashboard')->name('dashboard');

Route::get('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'doLogin'])->name('auth.login');