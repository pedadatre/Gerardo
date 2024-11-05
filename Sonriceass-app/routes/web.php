<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;





Route::get('/ofertas',[ProductController::class,'oferta']);
Route::get('/productos',[ProductController::class,'productos']);