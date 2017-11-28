<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('dashboard/addrestaurant', 'RestaurantsController@index')->name('addrestaurantform');

Route::post('addrestaurant', 'RestaurantsController@addrestaurant')->name('addrestaurant');

Route::get('dashboard/additem', 'ItemsController@index')->name('additemform');

Route::post('additem', 'ItemsController@additem')->name('additem');