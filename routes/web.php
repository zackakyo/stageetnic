<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnvironnementController;
use App\Http\Controllers\InstanceController;
use App\Http\Controllers\ExtensionController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LoadDataController;

use App\Http\Controllers\PhpController;
use App\Http\Controllers\MysqlController;
use App\Http\Controllers\SolrController;
use App\Http\Controllers\Typo3Controller;

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
Route::resource('mysql', MysqlController::class); 
Route::resource('solr', SolrController::class); 
Route::resource('typo3', typo3Controller::class); 

// Route::get('test', 'php/index'); 


