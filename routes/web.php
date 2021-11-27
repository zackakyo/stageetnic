<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnvironnementController;
use App\Http\Controllers\InstanceController;
use App\Http\Controllers\ExtensionController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LoadDataController;
use App\Http\Controllers\PhpController;

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


Route::resource('/', EnvironnementController::class); 
Route::resource('instance', InstanceController::class);
Route::resource('extension', ExtensionController::class);
Route::resource('site', SiteController::class);


Route::resource('fillDB', LoadDataController::class); 
Route::resource('php', PhpController::class); 

// Route::get('test', 'php/index'); 


