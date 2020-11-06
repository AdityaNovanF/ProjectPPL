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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
