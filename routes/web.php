<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello-world', function () {
    return view('examples/hello-world');
});

Route::group(['prefix' => '/layout'], function() {
    Route::get('/', function () {
        return view('examples/layout/full-layout');
    });

    Route::get('/inherited', function () {
        return view('examples/layout/inherited/child');
    })->name('inherited-layout');

    Route::get('/overrided-menu', function () {
        return view('examples/layout/inherited/child-with-overrided-menu');
    });

    Route::get('/slots', function () {
        return view('examples/layout/with-slots/child');
    })->name('layout-with-slots');
});

Route::group(['prefix' => 'bikes'], function () {
    Route::get('/', 'BikeController@index')->name('bike-list');
    Route::get('/create', 'BikeController@create')->name('bike-form');
    Route::get('/create/simple', 'BikeController@createSimple')->name('bike-form-simple');
    Route::post('/', 'BikeController@store')->name('bike-store');
    Route::get('/{id}', 'BikeController@show')->name('bike-show');
});