<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::prefix('utils')
->namespace('Utils')
->name('utils.')
->group(function(){
Route::get('/classes', 'DiversController@getClasses');
Route::get('/inscriptions/{id}', 'DiversController@getElevesByClasse');
Route::get('/inscription/{id}', 'DiversController@getInscriptionById');
});


Route::get('/users/register', 'UserController@create')->middleware('auth');
Route::post('/users/store', 'UserController@store')->middleware('auth');
//Route::get('/utils/classes', 'DiversController@getClasses')->namespace('Utils');


Route::get('/deconnexion','UserController@logout')->middleware('auth');


// Route des éleves
Route::get('/eleves','EleveController@index')->middleware('auth');
// Fin route

// Route des utilisateurs
Route::get('/users','UserController@index')->middleware('auth','admin');
// Fin route


Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth','admin')
    ->name('admin.')
    ->group(function () {
    // Route de la gestion des emploies du temps
    Route::get('emploie-temps', 'EmploieTempController@index')->name('emploies.index');
    Route::get('/emploie-temps/{id}', 'EmploieTempController@getCourByClasse');
    Route::post('/emploie-temps/store', 'EmploieTempController@store')->name('emploies.store');

    // Route des inscriptions des éleves
    Route::resource('/inscriptions', 'InscriptionController');
    Route::get('/inscriptions/pdf/{eleve}/{inscripion}', 'InscriptionController@creationPdf')->name('inscriptions.creationPdf');

    // Route des années academiques
    Route::resource('/annee-acads', 'AnneeAcadController');

    // Route des série
    Route::resource('/series', 'SerieController');

    // Route des classes
    Route::resource('/classes', 'ClasseController');

    // Route des mois
    Route::resource('/mois', 'MoiController');
    Route::get('/mois/on/{id}', 'MoiController@on');
    Route::get('/mois/off/{id}', 'MoiController@off');

    // Route des écolages
    Route::resource('/ecolages', 'EcolageController');

    // Route des matières
    Route::resource('/matieres', 'MatiereController');

    // Route des cours
    Route::resource('/cours', 'CourController');

    // Route des Tranches Horaires
    Route::resource('/tranches', 'TrancheHoraireController');

    // Route des rôles
    Route::resource('/roles', 'RoleController');

    // Route des diplômes
    Route::resource('/diplomes', 'DiplomeController');

    // Route des profs
    Route::resource('/profs', 'ProfController');

    });
