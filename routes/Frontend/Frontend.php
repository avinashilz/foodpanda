<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'FrontendController@index')->name('index');
Route::get('macros', 'FrontendController@macros')->name('macros');
Route::get('contact', 'ContactController@index')->name('contact');
Route::post('contact/send', 'ContactController@send')->name('contact.send');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('home', 'DashboardController@index')->name('dashboard');
        Route::post('/search', 'DashboardController@search')->name('search');

        Route::get('/search/{restroid}', 'DashboardController@show')->name('show');
        
        
        Route::get('/loggedInUserAllOrder', 'DashboardController@logged_in_user_all_order')->name('logged_in_user_all_order');
        
        Route::get('/loggedInUserOrderOfSpecificRestaurant', 'DashboardController@logged_in_user_order_of_specific_restaurant')->name('logged_in_user_order_of_specific_restaurant');
        
        Route::get('/mostPopularRestaurant', 'DashboardController@most_popular_restaurant')->name('most_popular_restaurant');
        
        Route::get('/mostPopularRestaurantOfLoggedUser', 'DashboardController@most_popular_restaurant_of_logged_user')->name('most_popular_restaurant_of_logged_user');
        
        Route::get('/mostPopularChinesItemInLast2Months', 'DashboardController@most_popular_Chines_item_in_2_months')->name('most_popular_Chines_item_in_2_months');
        
        Route::get('/mostFrequentUserIn2Months', 'DashboardController@most_frequent_user_in_2_months')->name('most_frequent_user_in_2_months');

        Route::get('/mostPopularChinesRestaurants', 'DashboardController@most_popular_Chines_restaurants')->name('most_popular_Chines_restaurants');
       
        Route::get('/user', 'DashboardController@user')->name('user');
        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');
    });
});
