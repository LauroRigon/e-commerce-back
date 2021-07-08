<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Product\CreateProductController;
use App\Http\Controllers\Product\ListProductsController;
use App\Http\Controllers\Product\FindProductController;
use App\Http\Controllers\Product\UpdateProductController;
use Illuminate\Support\Facades\Route;

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

Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);

Route::get('products', ListProductsController::class);
Route::get('products/{id}', FindProductController::class);

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('logout', LogoutController::class);

//    Route::get('/user', function (Request $request) {
//        return \App\Http\Resources\UserResource::collection(\App\Models\User::all());
//    });
    Route::post('products', CreateProductController::class);
    Route::patch('products/{id}', UpdateProductController::class);
});

