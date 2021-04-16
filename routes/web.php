<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/users/register', 'UserController@create');
Route::post('/users/store', 'UserController@store');


Route::get('/deconnexion','UserController@logout');


// Route des inscriptions des éleves
Route::get('/inscriptions', 'InscriptionController@index');
Route::get('/inscriptions/create', 'InscriptionController@create');
Route::post('/inscriptions/eleve', 'InscriptionController@store');
Route::get('/inscriptions/inscrire', 'InscriptionController@inscrire');
Route::post('/inscriptions/inscrit', 'InscriptionController@inscrit');
Route::get('/inscriptions/show/{id}', 'InscriptionController@show');
// Fin route

// Route des série
Route::get('/series', 'SerieController@index');
Route::post('/series/store', 'SerieController@store');
// Fin route

// Route des classes
Route::get('/classes', 'ClasseController@index');
Route::post('/classes/store', 'ClasseController@store');
// Fin route

// Route des mois
Route::get('/mois', 'MoiController@index');
Route::post('/mois/store', 'MoiController@store');
Route::get('/mois/on/{id}', 'MoiController@on');
Route::get('/mois/off/{id}', 'MoiController@off');
// Fin route

// Route des écolages
Route::get('/ecolages', 'EcolageController@index');
Route::post('/ecolages/store', 'EcolageController@store');
Route::get('/ecolages/show/{id}', 'EcolageController@show');
// Fin route
