<?php

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

//Route::get('/', function () {
    //return view('index');
//});

Route::get('/{currentDirection}', 'ElevatorController@index');
Route::get('/direction/up', 'ElevatorController@direction');
Route::get('/direction/down', 'ElevatorController@down');
