<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnvironnementController;

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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [EnvironnementController::class, 'index']); 

Route::get('/instance/', function () {
    return view('instance');
});

Route::get('/site/', function () {
    return view('site');
});

Route::get('/extension/', function () {
    return view('extension');
});

// Route::resource('environnement', 'EnvironnementController')->name() ; 