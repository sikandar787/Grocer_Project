<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('admin.login');
});
// Route::get('/login',[AdminController::class,'index']);
Route::post('custom-login', [AdminController::class, 'customLogin'])->name('login.custom');

Route::group(['middleware' => 'admin'], function () {
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});


Route::get('/add-unit', function () {
    return view('admin.add-unit');
});

Route::get('/add-city', function () {
    return view('admin.add-city');
});

Route::get('/add-category', function () {
    return view('admin.add-category');
});
Route::get('/view-admin', function () {
    return view('admin.view-admin');
});

Route::get('/add-area', function () {
    return view('admin.add-area');
});

Route::get('/add-product', function () {
    return view('admin.add-product');
});

Route::get('/add-shop', function () {
    return view('admin.add-shop');
});

Route::get('/add-banner', function () {
    return view('admin.add-banner');
});

// Route::get('/add-user', function () {
//     return view('admin.add-user');
// });

// Route::get('/view-users ', function () {
//     return view('admin.view-users');
// });

Route::get('/add-product', [ProductController::class, 'getCategories']);

Route::get('/edit-product', [ProductController::class, 'getCategories']);

Route::get('/add-shop', [ShopController::class, 'getCities']);

Route::get('/edit-shop', [ShopController::class, 'getCities']);

Route::get('/add-banner', [BannerController::class, 'getCategories']);

Route::get('/edit-banner', [BannerController::class, 'getCategories']);


//Route for view Record On Dashboard
Route::get('/dashboard', [DashboardController::class, 'viewRecords']);

// Profile Section routes

Route::get('/edit-profile',[AdminController::class,'editProfile']);
Route::post('/update-profile',[AdminController::class,'updateProfile'])->name('update-profile');

//Logout routes
Route::get('signout', [AdminController::class, 'signOut'])->name('signout');

// unit Setion routes
Route::post('add-unit', [UnitController::class, 'addUnit'])->name('add-unit');
Route::get('view-units', [UnitController::class, 'viewUnits']);
Route::get('delete-unit/{id}', [UnitController::class, 'destroyUnit']);
Route::get('/edit-unit/{id}',[UnitController::class,'editUnit']);
Route::post('update-unit/{id}',[UnitController::class,'updateUnit'])->name('update-unit');
Route::get('unit/update-status/{id}',[UnitController::class,'statusUpdateUnit']);


//City Setion Routes
Route::post('add-city', [CityController::class, 'addCity'])->name('add-city');
Route::get('view-cities', [CityController::class, 'viewCities']);
Route::get('delete-city/{id}', [CityController::class, 'destroyCities']);
Route::get('/edit-city/{id}',[CityController::class,'editCity']);
Route::post('update-city/{id}',[CityController::class,'updateCity'])->name('update-city');
Route::get('city/update-status/{id}',[CityController::class,'statusUpdateCity']);

// Category routes
Route::post('/add-category', [CategoryController::class, 'addCategory'])->name('add-category');
Route::get('/view-categories',[CategoryController::class,'viewCategories']);
Route::get('/delete-category/{id}',[CategoryController::class,'deleteCategory']);
Route::get('/edit-category/{id}',[CategoryController::class,'editCategory']);
Route::post('/update-category/{id}',[CategoryController::class,'updateCategory'])->name('update-category');
Route::get('category/update-status/{id}',[CategoryController::class,'statusUpdateCategories']);

//Area Routes
Route::get('/enter-area', [AreaController::class, 'enterArea']);
Route::post('/add-area', [AreaController::class, 'addArea'])->name('add-area');
Route::get('/view-areas',[AreaController::class,'viewAreas']);
Route::get('/delete-area/{id}',[AreaController::class,'deleteArea']);
Route::get('/edit-area/{id}',[AreaController::class,'editArea']);
Route::post('/update-area/{id}',[AreaController::class,'updateArea'])->name('update-area');
Route::get('area/update-status/{id}',[AreaController::class,'statusUpdateAreas']);


// Product routes
Route::post('/add-product', [ProductController::class, 'addProduct'])->name('add-product');
Route::get('/view-products',[ProductController::class,'viewProducts']);
Route::get('/delete-product/{id}',[ProductController::class,'deleteProduct']);
Route::get('/edit-product/{id}',[ProductController::class,'editProduct']);
Route::post('/update-product/{id}',[ProductController::class,'updateProduct'])->name('update-product');
Route::get('product/update-status/{id}',[ProductController::class,'statusUpdateProducts']);
Route::get('update-checked',[ProductController::class,'updateChecked']);
Route::post('/edit-checked',[ProductController::class,'editChecked']);
Route::get('/product-details/{id}',[ProductController::class, 'productDetail']);


// Shop routes
Route::post('/add-shop', [ShopController::class, 'addShop'])->name('add-shop');
Route::get('/view-shops',[ShopController::class,'viewShops']);
Route::get('/delete-shop/{id}',[ShopController::class,'deleteShop']);
Route::get('/edit-shop/{id}',[ShopController::class,'editShop']);
Route::post('/update-shop/{id}',[ShopController::class,'updateShop'])->name('update-shop');
Route::get('get-area',[ShopController::class,'getArea']);
Route::get('shop/update-status/{id}',[ShopController::class,'statusUpdateShops']);
Route::get('get-shops',[ShopController::class,'getShops']);


// Banner routes
Route::post('/add-banner', [BannerController::class, 'addBanner'])->name('add-banner');
Route::get('/view-banners',[BannerController::class,'viewBanners']);
Route::get('/delete-banner/{id}',[BannerController::class,'deleteBanner']);
Route::get('/edit-banner/{id}',[BannerController::class,'editBanner']);
Route::post('/update-banner/{id}',[BannerController::class,'updateBanner'])->name('update-banner');
Route::get('banner/update-status/{id}',[BannerController::class,'statusUpdateBanners']);

Route::get('/view-users',[UserController::class,'viewUsers']);
Route::get('/changeuserstatus/{id}',[UserController::class,'updateUserStatus']);
Route::post('/update-status/{id}',[UserController::class,'changeUserStatus'])->name('update-status');
});
