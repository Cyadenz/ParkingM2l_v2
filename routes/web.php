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

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/register2', function () {
    return view('auth.register2');
});

//Routes Admin
Route::get('/aDashboard', 'adminController@index')->name('aDashboard');
Route::get('/aUtilisateurs', 'adminController@Util')->name('aUtils');

Route::get('/aUtilisateur/{id}', 'adminController@UtilSelect')->name('aUtilSelect');
Route::post('/aUtilisateur/{id}','adminController@UtilStore')->name('aUtilStore');

Route::get('/aUtilisateurSupp/{id}','adminController@UtilSupp')->name('aUtilSupp');

//Routes Reserv
Route::get('/rDashboard', 'reservController@index')->name('rDashboard');
Route::get('/rPlaces', 'reservController@show')->name('rPlaces');

Route::get('/rPlace/{idplace}', 'reservController@reserv')->name('rPlace');
Route::get('/rPlaceSupp/{idplace}', 'reservController@reservSupp')->name('rPlaceSupp');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
