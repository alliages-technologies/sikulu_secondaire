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
//return view('welcome');
 return redirect('/login');
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


Route::prefix('superadmin')
    ->namespace('Superadmin')
    ->name('superadmin.')
    ->group(function(){
        /*
        Paramètres
        */
        Route::resource('/parametres', 'ParametreController');
        // Enseignements
        Route::get('/enseignements', 'ParametreController@enseignements')->name('enseignements.index');
        Route::post('/enseignement/store', 'ParametreController@enseignementStore')->name('enseignements.store');
        // Séries
        Route::get('/series', 'ParametreController@series')->name('series.index');
        Route::post('/serie/store', 'ParametreController@serieStore')->name('series.store');
        // Niveaux
        Route::get('/niveaux', 'ParametreController@niveaux')->name('niveaux.index');
        Route::post('/niveau/store', 'ParametreController@niveauStore')->name('niveaux.store');
        // Classes
        Route::get('/classes', 'ParametreController@classes')->name('classes.index');
        Route::post('/classe/store', 'ParametreController@classeStore')->name('classes.store');
        // Matières
        Route::get('/matieres', 'ParametreController@matieres')->name('matieres.index');
        Route::post('/matiere/store', 'ParametreController@matiereStore')->name('matieres.store');
        // Matières
        Route::get('/ecoles', 'ParametreController@ecoles')->name('ecoles.index');
        Route::post('/ecole/store', 'ParametreController@ecoleStore')->name('ecoles.store');
        Route::get('/ecole/{id}', 'ParametreController@ecoleShow')->name('ecoles.show');
        // Programme national
        Route::resource('/programmes-national','ProgrammenationalController');
});


Route::prefix('adminecole')
    ->namespace('Adminecole')
    ->name('adminecole.')
    ->group(function(){
        /*
        Parametres
        */
        Route::resource('/parametres', 'ParametreController');
        // Programmes ecole
        Route::resource('/programmes-ecole','ProgrammeecoleController');
        Route::get('/get-lignes-programme-national-by-id/{id}','ProgrammeecoleController@getProgrammeNationalById');
        //Gestion salle
        Route::resource('/salles','SalleController');
        Route::get('/get-profs','ProgrammeecoleController@getProfs');
        Route::get('/get-lignes-programme-national-by-id/{id}','ProgrammeecoleController@getLignesProgrammeNationalById');
        Route::get('/save-prof','ProgrammeecoleController@saveProf');
        // Gestion salles
        Route::resource('/salles', 'SalleController');
        // Profs
        Route::resource('/profs', 'ProfController');
        Route::get('/profs-verification-numero', 'ProfController@verificationNumero');
        Route::post('/profs-terminer-un', 'ProfController@terminerUn');
        Route::get('/profs-verification-info', 'ProfController@verificationInfo');
        Route::post('/profs-terminer-deux', 'ProfController@terminerDeux');
        Route::resource('/inscriptions', 'InscriptionController');

});

