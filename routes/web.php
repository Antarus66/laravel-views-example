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
    return view('hello-world');
});

Route::get('/xss-example', function () {
    return view('xss-example')->with(
        'greeting',
        "<script>
            (function () {
                var a = document.createElement('a');
                a.href = 'http://example.com';
                a.innerHTML = 'Download Petya';
                document.body.appendChild(a);

                alert('You are hacked');
            })();
         </script>"
    );
});

Route::group(['prefix' => '/layout'], function() {
    Route::get('/', function () {
        return view('layout/full-layout');
    });

    Route::get('/inherited', function () {
        return view('layout/inherited/child');
    })->name('inherited-layout');

    Route::get('/inherited/overrided', function () {
        return view('layout/inherited/child-with-overrided-menu');
    });

    Route::get('/slots', function () {
        return view('layout/with-slots/child');
    })->name('layout-with-slots');
});

Route::group(['prefix' => 'bikes'], function () {
    Route::get('/', 'BikeController@index')->name('bike-list');
    Route::get('/create', 'BikeController@create')->name('bike-form');
    Route::get('/create/simple', 'BikeController@createSimple')->name('bike-form-simple');
    Route::post('/', 'BikeController@store')->name('bike-store');
    Route::get('/{id}', 'BikeController@show')->name('bike-show');
});