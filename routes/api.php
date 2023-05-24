<?php

use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\MerchantController;
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

Route::get('cars', function () {
    return response()->json(['status' => true, 'message' => 'success', 'data' => 'kkkk']);
});

Route::apiResource('car', CarController::class);
Route::apiResource('merchant', MerchantController::class);
Route::apiResource('customer', CustomerController::class);

Route::get('information',[InformationController::class,'index']);

Route::get('carMerchant/{id}',[MerchantController::class,'carMerchant']);
Route::get('carCustomer/{id}',[CustomerController::class,'carCustomer']);

Route::get('search/{name}',[CarController::class,'search']);

Route::prefix('carFilter')->group(function () {
    Route::post('/getCarsFilter', [CarController::class, 'getCarsFilter']);
//    Route::get('/{price}', [CarController::class, 'getCarsFilter']);
});

Route::prefix('auth')->group(function () {
    Route::post('register/customer', [ApiAuthController::class, 'registerCustomer']);
    Route::post('login/customer', [ApiAuthController::class, 'loginCustomer']);

    Route::post('register/merchant', [ApiAuthController::class, 'registerMerchant']);
    Route::post('login/merchant', [ApiAuthController::class, 'loginMerchant']);

    Route::get('logout/customer', [ApiAuthController::class, 'logoutCustomer']);
});

//Route::get('getAll',[CarController::class, 'index']);
//Route::get('getAll/{id}',[CarController::class,'show']);
//Route::post('getAll',[CarController::class,'store']);
//Route::post('getAll/{id}',[CarController::class,'update']);
//Route::delete('getAll/{id}',[CarController::class,'destroy']);
