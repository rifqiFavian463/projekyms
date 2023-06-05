<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaControllers;  
use App\Http\Controllers\UserControllers; 
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('main-interface.login-landing');
});

Route::resource('sisw',SiswaControllers::class)->middleware('admin');
Route::resource('user',UserControllers::class)->middleware('auth');

Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth');
//Route::resource('/dasboard/user',UserControllers::class)->except('show'); itu kecuali show ya

Route::resource('/dashboard/user',AdminController::class)->except('show')->middleware('auth');

