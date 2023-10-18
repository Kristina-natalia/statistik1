<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('/data', 'DataController@index')->name('data.index');
Route::get('/data/create', 'DataController@create')->name('data.create');
Route::get('/data/{id}/edit', 'DataController@edit')->name('data.edit');
Route::delete('/data/{id}', 'DataController@destroy')->name('data.destroy');
Route::post('/data', 'DataController@store')->name('data.store');
Route::put('/data/{id}', 'DataController@update')->name('data.update');
Route::get('/calculate-statistics', 'DataController@calculateStatistics')->name('data.calculateStatistics');
