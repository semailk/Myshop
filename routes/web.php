<?php

use App\Http\Controllers\View\Admin\ConsoleController;
use App\Http\Controllers\View\Admin\Shop\ShopCategoryController;
use App\Http\Controllers\View\Admin\Shop\ShopProductController;
use App\Http\Controllers\View\Main\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\View\Admin\HomeController;
use Illuminate\Support\Facades\Auth;

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
Route::middleware(['admin'])->prefix('/admin')->group(function () {

    Route::resource('/categories',ShopCategoryController::class);
    Route::post('/categories/{id}/update', [ShopCategoryController::class, 'update'])->name('categories.update');
    Route::get('/categories/{id}/destroy', [ShopCategoryController::class, 'destroy'])->name('categories.destroy');
Route::get('category/create', [ShopCategoryController::class, 'create'])->name('categories.create');
Route::post('categories/store', [ShopCategoryController::class, 'store'])->name('categories.store');
Route::resource('/products', ShopProductController::class);
    Route::get('/products/{id}/destroy', [ShopProductController::class, 'destroy'])->name('products.destroy');
    Route::post('/products/{id}/update', [ShopProductController::class, 'update'])->name('products.update');
    Route::post('/products/upload', [ShopProductController::class, 'upload'])->name('products.upload');
    Route::get('/',[ConsoleController::class, 'index'])->name('console.index');
});


Route::get('/',[WelcomeController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'home'])->name('home');


