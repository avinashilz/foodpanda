<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('restaurants', 'RestaurantsController');

Route::get('additem', 'ItemsController@index')->name('additemform');

Route::post('additem', 'ItemsController@additem')->name('additem');

Route::get('restaurants/{restroid}/edititem/{itemid}/edit', 'ItemsController@edit')->name('edititemform');

Route::put('restaurants/{restroid}/edititem/{itemid}', 'ItemsController@update')->name('updateitem');

Route::delete('restaurants/{restroid}/deleteitem/{itemid}', 'ItemsController@destroy')->name('item.destroy');

Route::get('fileentry', 'FileEntryController@index')->name('file');

Route::get('fileentry/get/{filename}', 'FileEntryController@get')->name('getentry');

Route::post('fileentry/add', 'FileEntryController@add')->name('addentry');
