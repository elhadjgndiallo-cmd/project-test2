<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;




Route::get('/', [ProduitController::class, 'index']);
Route::resource('produits', ProduitController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
