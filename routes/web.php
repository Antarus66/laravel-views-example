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
    });

    Route::get('/overrided-menu', function () {
        return view('examples/layout/inherited/child-with-overrided-menu');
    });
});

