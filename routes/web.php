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


// Route des inscriptions des éleves
Route::get('/inscriptions', 'InscriptionController@index')->middleware('auth');
Route::get('/inscriptions/create', 'InscriptionController@create')->middleware('auth');
Route::post('/inscriptions/eleve', 'InscriptionController@store')->middleware('auth');
Route::get('/inscriptions/inscrire', 'InscriptionController@inscrire')->middleware('auth');
Route::post('/inscriptions/inscrit', 'InscriptionController@inscrit')->middleware('auth');
Route::get('/inscriptions/show/{id}', 'InscriptionController@show')->middleware('auth');
Route::get('/inscriptions/pdf/{eleve}/{inscripion}', 'InscriptionController@creationPdf')->middleware('auth');
// Fin route

// Route des série
Route::get('/series', 'SerieController@index')->middleware('auth');
Route::post('/series/store', 'SerieController@store')->middleware('auth');
// Fin route

// Route des classes
Route::get('/classes', 'ClasseController@index')->middleware('auth');
Route::post('/classes/store', 'ClasseController@store')->middleware('auth');
// Fin route

// Route des mois
Route::get('/mois', 'MoiController@index')->middleware('auth');
Route::post('/mois/store', 'MoiController@store')->middleware('auth');
Route::get('/mois/on/{id}', 'MoiController@on')->middleware('auth');
Route::get('/mois/off/{id}', 'MoiController@off')->middleware('auth');
// Fin route

// Route des écolages
Route::get('/ecolages', 'EcolageController@index')->middleware('auth');
Route::post('/ecolages/store', 'EcolageController@store')->middleware('auth');
Route::get('/ecolages/show/{id}', 'EcolageController@show')->middleware('auth');
// Fin route

// Route des cours
Route::get('/cours', 'CourController@index')->middleware('auth');
Route::post('/cours/store', 'CourController@store')->middleware('auth');
// Fin route

// Route des matieres
Route::get('/matieres', 'MatiereController@index')->middleware('auth');
Route::post('/matieres/store', 'MatiereController@store')->middleware('auth');
// Fin route

// Route des tranches horaires
Route::get('/tranche_horaires', 'TrancheHoraireController@index')->middleware('auth');
Route::post('/tranche_horaires/store', 'TrancheHoraireController@store')->middleware('auth');
// Fin route

// Route des années academiques
Route::get('/annee_acads', 'AnneeAcadController@index')->middleware('auth');
Route::post('/annee_acads/store', 'AnneeAcadController@store')->middleware('auth');
// Fin route

// Route des éleves
Route::get('/eleves','EleveController@index')->middleware('auth');
// Fin route

// Route des utilisateurs
Route::get('/users','UserController@index')->middleware('auth','admin');
// Fin route


// Route des rôles
Route::get('/roles','RoleController@index')->middleware('auth','admin');
Route::post('/roles/store','RoleController@store')->middleware('auth','admin');
// Fin route


// Route de la gestion des emploies du temps
/*
emploie_temps(cour_id,tranche_id)

*/
//
