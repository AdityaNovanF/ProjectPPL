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
    return redirect('/home');
});

Route::get('/keluar', function () {
    \Auth::logout();
    return redirect('/login');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/pupuk', 'Pupuk_controller@index');

    Route::get('/pupuk/add', 'Pupuk_controller@add');
    Route::post('/pupuk/add', 'Pupuk_controller@store');

    Route::get('/pupuk/{id}', 'Pupuk_controller@edit');
    Route::put('/pupuk/{id}', 'Pupuk_controller@update');

    Route::delete('/pupuk/{id}', 'Pupuk_controller@delete');

    //manage Po
    Route::get('/po', 'Po_controller@index');
    Route::get('/po/detail/{id}', 'Po_controller@detail');

    Route::get('/po/add', 'Po_controller@add');
    Route::post('/po/add', 'Po_controller@store');

    Route::get('/po/{id}', 'Po_controller@edit');
    Route::put('/po/{id}', 'Po_controller@update');

    Route::delete('/po/{id}', 'Po_controller@delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
