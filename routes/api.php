<?php

use App\Http\Controllers\Account\UpdateAccountController;
use App\Http\Controllers\Address\CreateAddressController;
use App\Http\Controllers\Address\FindAddressController;
use App\Http\Controllers\Address\ListAdressesController;
use App\Http\Controllers\Address\UpdateAddressController;
use App\Http\Controllers\Auth\GetUserAuthenticatedController;
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

    Route::get('me', GetUserAuthenticatedController::class);
    Route::put('account/{id}', UpdateAccountController::class);

//    Route::get('/user', function (Request $request) {
//        return \App\Http\Resources\UserResource::collection(\App\Models\User::all());
//    });

    Route::post('address', CreateAddressController::class);
    Route::put('address/{id}', UpdateAddressController::class);
    Route::get('address/{id}', FindAddressController::class);
    Route::get('address', ListAdressesController::class);

    Route::post('products', CreateProductController::class);
    Route::patch('products/{id}', UpdateProductController::class);
});

