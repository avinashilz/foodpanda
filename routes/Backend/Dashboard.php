<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('dashboard/addresturant', 'ResturantsController@index')->name('addresturantform');

Route::post('addresturant', 'ResturantsController@addresuarant')->name('addresturant');

//Route::get('dashboard/addmenu', 'ResturantsController@index')->name('addresturantform');

