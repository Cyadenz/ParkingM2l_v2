<?php
use App\Http\Middleware\Admin;

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

// Route::get('/laravel', function () {
//     return view('welcome');
// });

//Routes Admin protégées par le middleware Admin.php
Route::get('/aDashboard',['middleware' => ['auth', 'admin'], 'uses' => 'adminController@index'])->name('aDashboard');

Route::get('/aUtilisateurs',['middleware' => ['auth', 'admin'], 'uses' => 'adminController@Util'])->name('aUtils');

Route::get('/aUtilisateur/{id}',['middleware' => ['auth', 'admin'], 'uses' => 'adminController@UtilSelect'])->name('aUtilSelect');
Route::post('/aUtilisateur/{id}',['middleware' => ['auth', 'admin'], 'uses' => 'adminController@UtilStore'])->name('aUtilStore');
Route::get('/aUtilisateurSupp/{id}',['middleware' => ['auth', 'admin'], 'uses' => 'adminController@UtilSupp'])->name('aUtilSupp');
Route::get('/aUtilisateurVal/{id}',['middleware' => ['auth', 'admin'], 'uses' => 'adminController@UtilVal'])->name('aUtilVal');

Route::get('/aReservations',['middleware' => ['auth', 'admin'], 'uses' => 'adminController@Reserv'])->name('aReservs');

Route::get('/aReservationValidation/{id_place}',['middleware' => ['auth', 'admin'], 'uses' => 'adminController@ReservValidation'])->name('aReservValidation');
Route::post('/aReservation/{id_place}',['middleware' => ['auth', 'admin'], 'uses' => 'adminController@Reservstore'])->name('aReservstore');

Route::get('/aaReservationSupp/{id_place}',['middleware' => ['auth', 'admin'], 'uses' => 'adminController@ReservSupp'])->name('aReservSupp');

Route::get('/aPlaces',['middleware' => ['auth', 'admin'], 'uses' => 'adminController@Places'])->name('aPlaces');
Route::get('/aPlaceCreate',['middleware' => ['auth', 'admin'], 'uses' => 'adminController@PlacesCreate'])->name('aPlaceCreate');
Route::get('/aPlace/{idplace}',['middleware' => ['auth', 'admin'], 'uses' => 'adminController@PlacesSupp'])->name('aPlaceSupp');

Route::get('/aFileAttente',['middleware' => ['auth', 'admin'], 'uses' => 'adminController@FileAttente'])->name('aFileAttente');
Route::get('/aUpFileAttente/{id}',['middleware' => ['auth', 'admin'], 'uses' => 'adminController@up'])->name('aUpFileAttente');
Route::get('/aDownFileAttente/{id}',['middleware' => ['auth', 'admin'], 'uses' => 'adminController@down'])->name('aDownFileAttente');
Route::get('/aSuppFileAttente/{id}',['middleware' => ['auth', 'admin'], 'uses' => 'adminController@ListASupp'])->name('aListASupp');


//Routes Sidebar
Route::get('/', 'SidebarController@index')->name('Accueil');

Route::get('/sMonProfil', 'SidebarController@profil')->name('sProfil');

Route::get('/sMesInfos', 'SidebarController@mesInfos')->name('sMesInfos');
Route::post('/sMesInfos', 'SidebarController@store')->name('sMesInfosVal');

Route::get('/sMonRang', 'SidebarController@monRang')->name('sRang');

Route::get('/sRangPlus', 'reservController@rangPlus')->name('sRangPlus');

Route::get('/sMesReservations', 'SidebarController@mesReservations')->name('sMesReserv');

//Routes Reserv
Route::get('/rDashboard', 'reservController@index')->name('rDashboard');
Route::get('/rPlaces', 'reservController@show')->name('rPlaces');


Route::post('/rPlace/{idplace}', 'reservController@store')->name('rPlace');

Route::get('/rReservPlace/', 'reservController@reserve')->name('rReservPlace');

Route::get('/rPlaceSupp/{idplace}', 'reservController@reservSupp')->name('rPlaceSupp');
Route::get('/rPlaceSelect/{idplace}', 'reservController@placeSelect')->name('rPlaceSelect');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
