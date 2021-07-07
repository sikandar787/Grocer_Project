<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/products/{id}', [ApiController::class,'getProductsApi']);
// Route::get('/overall-products', [ApiController::class,'getOverallProductsApi']);
// Route::get('/specific-products', [ApiController::class,'getSpecificProductsApi']);
Route::get('/cities-areas', [ApiController::class,'getCitiesAreasApi']);
Route::get('/overall-shops', [ApiController::class,'getOverallShopsApi']);
Route::get('/specific-shops', [ApiController::class,'getSpecificShopsApi']);
// Route::get('/cities', [ApiController::class,'getCitiesApi']);
Route::post('/areas-by-city/{id}', [ApiController::class,'getAreasbyCityApi']);
Route::get('/units', [ApiController::class,'getUnitsApi']);
Route::get('/categories', [ApiController::class,'getCategoriesApi']);
Route::post('/banners/{id}', [ApiController::class,'getBannersApi']);
Route::post('/login', [ApiController::class,'getAdminLoginApi']);
Route::post('/user-register', [ApiController::class,'userRegistrationApi']);
Route::post('/user-login/{id}/{latitude}/{longitude}', [ApiController::class,'userLoginApi']);
