<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('dashboard/addrestaurant', 'RestaurantsController@index')->name('addrestaurantform');

Route::post('addrestaurant', 'RestaurantsController@addrestaurant')->name('addrestaurant');

Route::get('dashboard/addmenu', 'MenusController@index')->name('addmenuform');

Route::post('addmenu', 'MenusController@addmenu')->name('addmenu');