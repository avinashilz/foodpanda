<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('dashboard', 'DashboardController@index')->name('dashboard');



Route::get('dashboard/addrestaurant', 'RestaurantsController@index')->name('addrestaurantform');

Route::post('addrestaurant', 'RestaurantsController@addrestaurant')->name('addrestaurant');

Route::get('dashboard/editrestaurant', 'RestaurantsController@edit')->name('editrestaurantform');

Route::post('editrestaurant', 'RestaurantsController@update')->name('updaterestaurant');

Route::get('deleterestaurant/{id}', 'RestaurantsController@destroy')->name('restaurant.destroy');




Route::get('dashboard/additem', 'ItemsController@index')->name('additemform');

Route::post('additem', 'ItemsController@additem')->name('additem');

Route::get('dashboard/edititem', 'ItemsController@edit')->name('edititemform');

Route::post('edititem', 'ItemsController@update')->name('updateitem');

Route::get('deleteitem/{id}', 'ItemsController@destroy')->name('item.destroy');