<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('restaurants', 'RestaurantsController');

Route::get('additem', 'ItemsController@index')->name('additemform');

Route::post('additem', 'ItemsController@additem')->name('additem');

Route::get('edititem/{id}', 'ItemsController@edit')->name('edititemform');

Route::put('edititem/{id}', 'ItemsController@update')->name('updateitem');

Route::delete('deleteitem/{id}', 'ItemsController@destroy')->name('item.destroy');