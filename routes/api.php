<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Product
Route::post('/addProduct', [productController::class, 'addProduct']);
Route::get('/getProduct', [productController::class, 'getProduct']);
Route::get('/getProductById/{id}', [productController::class, 'getProductById']);
Route::put('/editProduct/{id}', [productController::class, 'editProduct']);
Route::delete('/delProduct/{id}', [productController::class, 'delProduct']);