<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;

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
    // return view('welcome');
    return "Laravel Test Driven";
});

Route::get('home', fn () => view('home'))->middleware('auth');
Route::redirect('about-page', 'about');
Route::get('about', fn () => 'About');

Route::get('register', [RegisterUserController::class, 'index']);
Route::post('register', [RegisterUserController::class, 'store']);

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::post('logout', LogoutController::class)->middleware('auth');
