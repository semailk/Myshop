<?php

use App\Http\Controllers\View\Admin\ConsoleController;
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
Route::middleware(['auth'])->prefix('/admin')->group(function () {
    Route::get('/console',[ConsoleController::class, 'index'])->name('console.index');
});

Route::get('/',[WelcomeController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::get('/admin', function ()
{
    return view('layouts.admin');
});
