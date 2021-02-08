<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', function () {
    return view('front.home');
})->name('home');



Route::get('details/{id}','HomeController@details')->name('building.details');
Route::GET('search','HomeController@deep')->name('search.deep');
Route::GET('all/buildings','HomeController@all')->name('buildings.all');
Route::GET('ajax/bu/information','HomeController@getAjaxInfo');
Route::GET('contact','HomeController@contact')->name('contact');
Route::post('contact','Admin\MessageConroller@send')->name('send.message');

//////////////////////////////////////////////front-user
Route::GET('create','buildingController@create')->name('buildings.create');
Route::POST('store','buildingController@store')->name('building.store');
Route::GET('edit/{id}','buildingController@edit')->name('building.edit');
Route::POST('update/{id}','buildingController@update')->name('building.update');
Route::GET('buildings','buildingController@index')->name('user.buildings');
Route::GET('user','buildingController@profile')->name('profile');
Route::post('user/{id}','buildingController@profileUpdate')->name('user.update');
