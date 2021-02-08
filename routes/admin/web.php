<?php

use Illuminate\Support\Facades\Route;


Route::group(['as'=>'admin.','prefix'=>'admin','middleware'=>['auth','admin']],function (){

    Route::get('/','AdminController@admin')->name('home');

    Route::resource('user','UserController')->except('destroy','show','update');
    Route::post('user/delete','UserController@destroy')->name('user.delete');
    Route::post('user/update/{id}','UserController@update')->name('user.update');


    Route::group(['as'=>'setting.','prefix'=>'setting'],function (){
        Route::get('/','SettingController@index')->name('index');
        Route::post('update/{id}','SettingController@update')->name('update');

});

    Route::resource('building','BuildingController')->except('destroy','show','update');
    Route::post('building/delete','BuildingController@destroy')->name('building.delete');
    Route::post('building/update/{id}','BuildingController@update')->name('building.update');
    Route::get('status/{id}','BuildingController@status')->name('building.status');
    Route::get('read-all', 'BuildingController@MarkReadAll')->name('MarkReadAll');


    Route::group(['as'=>'types.','prefix'=>'types'],function (){
        Route::get('/', 'TypeController@index')->name('index');
        Route::post('store', 'TypeController@store')->name('store');
        Route::post('update', 'TypeController@update')->name('update');
        Route::post('delete', 'TypeController@destroy')->name('delete');


    });
    Route::group(['as'=>'messages.','prefix'=>'messages'],function (){
        Route::get('/', 'MessageController@index')->name('index');
        Route::get('/{id}', 'MessageController@show')->name('show');
        Route::post('delete', 'MessageController@destroy')->name('delete');
    });


});

