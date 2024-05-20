<?php

use Illuminate\http\request;
use Illuminate\support\facedes\route;

/*
/----------------------------------------------------------
/ API Routes
/----------------------------------------------------------
/
/ here is where you can register API Routes for your application. these
/ routes are loaded by the RouteServiceProvider within a grup which
/ is assigned the "api" middlenare grup. enjoy your building API!
/
*/

//panggil ProductController sebagai object
use App\Http\Controller\productController;

//buat route untuk menambahkan data produk
Route::post('/product',[ProductController::class,'strore']);

//route untuk menampilkan data produk keseluruhan
Route::get('/product',[ProductController::class,'showAll']);

//route untuk menampilkan data produk berdasarkan ID
Route::get('/product/{id}',[ProductController::class,'showById']);

//route untuk menampilkan data produk berdasarkan nama
Route::get('/product/search/product_name={product_name}',[ProductController::class,'showByName']);

//route untuk mengubah data produk berdasarkan ID produk
Route::put('/product/{id}',[PruductController::class,'update']);

//route untuk menghapus data produk berdasarkan ID produk
Route::delete('/product/{id}',[ProductController::class,'delete']);

Route::get('login/google', [AuthController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [AuthController::class, 'handleGoogleCallback']);

