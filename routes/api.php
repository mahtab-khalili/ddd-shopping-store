<?php

use App\Http\Api\Controllers\Product\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'products'], function(){
    Route::post('create', [ProductController::class, 'store'])->name('product.store');
    Route::put('/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::get('', [ProductController::class, 'index'])->name('product.index');
    Route::get('/{product}', [ProductController::class, 'show'])->name('product.show');
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
});