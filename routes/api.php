<?php

use App\Http\Controllers\Api\ProduitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource("produits",ProduitController::class);
