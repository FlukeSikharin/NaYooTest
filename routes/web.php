<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\changeController;
use App\Http\Controllers\choosecontroller;
use App\Http\Controllers\contactcontroller;
use App\Models\contact;
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

Route::get('/change', function () {
    return view('change');
});
Route::get('/choose', function () {
    return view('choose');
});
Route::get('/contact', function () {
    $contact=contact::all();
    return view('contact',compact('contact'));
});


Route::post('/exchange','App\Http\Controllers\changeController@Change');

Route::post('/choose','App\Http\Controllers\choosecontroller@Choose');

Route::post('/addContact', 'App\Http\Controllers\contactcontroller@Add');

Route::post('/EditContact/{id}', 'App\Http\Controllers\contactcontroller@Edit');

Route::post('/Delete/{id}', 'App\Http\Controllers\contactcontroller@Delete');


Route::post('/add', 'App\Http\Controllers\addcontroller@Create');

