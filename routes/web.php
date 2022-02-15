<?php

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

Route::get('chart  
s', 'HomeController@chartjs');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/stack', function () {
    return view('stack');
});



Auth::routes();

Route::get('/dashboard', 'HomeController@claimdata')->name('dashboard');

Route::get('/js', 'HomeController@js');

Route::get('/add', 'HomeController@add');

Route::get('/logout', 'HomeController@logout');

Route::get('/scan', 'ScanController@pending_claim');
