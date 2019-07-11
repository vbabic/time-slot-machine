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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'slots'], function(){
    Route::get('', 'SlotController@index')->name('slot.index');
    Route::get('create', 'SlotController@create')->name('slot.create');
    Route::post('store', 'SlotController@store')->name('slot.store');
    Route::get('edit/{slot}', 'SlotController@edit')->name('slot.edit');
    Route::post('update/{slot}', 'SlotController@update')->name('slot.update');
    Route::post('delete/{slot}', 'SlotController@destroy')->name('slot.destroy');
    Route::get('show/{slot}', 'SlotController@show')->name('slot.show');

    Route::get('list', 'SlotController@list')->name('slot.list');
    Route::post('filter', 'SlotController@filter')->name('slot.filter');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
