<?php

use App\Http\Controllers\View\Admin\HomeController;
use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::resource('category', \App\Http\Controllers\Api\ShopCategoriesController::class)->except('show');
    Route::resource('product', \App\Http\Controllers\Api\ShopProductsController::class)->except('show');
    Route::resource('user', \App\Http\Controllers\Api\ShopUsersController::class)->except('show');
    Route::resource('image', \App\Http\Controllers\Api\ShopImagesController::class)->except('show');
    Route::resource('comment', \App\Http\Controllers\Api\ShopCommentsController::class)->except('show');
    Route::resource('review', \App\Http\Controllers\Api\ShopReviewController::class)->except('show');

