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

//Routes Admin
Route::get('/aDashboard', 'adminController@index')->name('aDashboard');
Route::get('/aUtilisateurs', 'adminController@Util')->name('aUtils');

Route::get('/aUtilisateur/{id}', 'adminController@UtilSelect')->name('aUtilSelect');
Route::post('/aUtilisateur/{id}','adminController@UtilStore')->name('aUtilStore');
Route::get('/aUtilisateurSupp/{id}','adminController@UtilSupp')->name('aUtilSupp');

Route::get('/aReservations', 'adminController@Reserv')->name('aReservs');

Route::get('/aReservationValidation/{id_place}','adminController@ReservValidation')->name('aReservValidation');
Route::post('/aReservation/{id_place}','adminController@Reservstore')->name('aReservstore');

Route::get('/aaReservationSupp/{id_place}','adminController@ReservSupp')->name('aReservSupp');

Route::get('/aPlaces', 'adminController@Places')->name('aPlaces');
Route::get('/aPlaceCreate', 'adminController@PlacesCreate')->name('aPlaceCreate');
Route::get('/aPlace/{idplace}','adminController@PlacesSupp')->name('aPlaceSupp');

Route::get('/aFileAttente', 'adminController@FileAttente')->name('aFileAttente');

//Routes Sidebar
Route::get('/', 'SidebarController@index')->name('Accueil');

Route::get('/sMonProfil', 'SidebarController@profil')->name('sProfil');

Route::get('/sMesInfos', 'SidebarController@mesInfos')->name('sMesInfos');
Route::post('/sMesInfos', 'SidebarController@store')->name('sMesInfosVal');

Route::get('/sMonRang', 'SidebarController@monRang')->name('sRang');

Route::get('/sRangPlus', 'reservController@rangPlus')->name('sRangPlus');

//Routes Reserv
Route::get('/rDashboard', 'reservController@index')->name('rDashboard');
Route::get('/rPlaces', 'reservController@show')->name('rPlaces');

Route::get('/rTest', 'reservController@reserve')->name('rTest');

Route::post('/rPlace/{idplace}', 'reservController@store')->name('rPlace');

Route::get('/rPlaceSupp/{idplace}', 'reservController@reservSupp')->name('rPlaceSupp');

Route::get('/rPlaceSelect/{idplace}', 'reservController@placeSelect')->name('rPlaceSelect');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
