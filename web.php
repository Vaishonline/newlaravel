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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/assign1', 'HomeController@assign1')->name('assign1');

Route::get('/assign2', 'HomeController@assign2')->name('assign2');

Route::get('/assign3', 'HomeController@assign3')->name('assign3');

Route::get('/assign4', 'HomeController@assign4')->name('assign4');

Route::get('/assign5', 'HomeController@assign5')->name('assign5');

Route::get('/assign6', 'HomeController@assign6')->name('assign6');

