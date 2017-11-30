<?php

/**
 * All route names are prefixed with 'admin.'.
 */
//Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('restaurants', 'RestaurantsController');

Route::get('dashboard/additem', 'ItemsController@index')->name('additemform');

Route::post('additem', 'ItemsController@additem')->name('additem');

Route::get('dashboard/edititem', 'ItemsController@edit')->name('edititemform');

Route::post('edititem', 'ItemsController@update')->name('updateitem');

Route::get('deleteitem/{id}', 'ItemsController@destroy')->name('item.destroy');