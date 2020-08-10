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

// Unit Test
//Route::get('/', function () {
//    return view('welcome');
//});

// Index Page
Route::get('/', 'HomeController@index');

// Management System
Route::get('/management/manageCandidates', 'ManageController@index');
