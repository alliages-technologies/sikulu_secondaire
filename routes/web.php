<?php

use App\Http\Controllers\Prof\ParentMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/deconnexion','UserController@logout')->middleware('auth');
Route::get('/users/register', 'UserController@create')->middleware('auth');
Route::post('/users/store', 'UserController@store')->middleware('auth');
//Route::get('/utils/classes', 'DiversController@getClasses')->namespace('Utils');




Route::prefix('utils')
    ->namespace('Utils')
    ->name('utils.')
    ->group(function(){
    Route::get('/classes', 'DiversController@getClasses');
    Route::get('/inscriptions/{id}', 'DiversController@getElevesByClasse');
    Route::get('/inscription/{id}', 'DiversController@getInscriptionById');
});




// Route des éleves
Route::get('/eleves','EleveController@index')->middleware('auth');
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
    //Route::resource('/profs', 'ProfController');

});




Route::prefix('superadmin')
->namespace('Superadmin')
->name('superadmin.')
->group(function(){
    /*
        PARAMETRES
    */
    Route::resource('/parametres', 'ParametreController');
    // Ecoles
    Route::get('/ecoles', 'ParametreController@ecoles')->name('ecoles.index');
    Route::post('/ecole-store', 'ParametreController@ecoleStore')->name('ecoles.store');
    Route::get('/ecole-show/{token}', 'ParametreController@ecoleShow')->name('ecoles.show');
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
    // Programme national
    Route::resource('/programmes-national','ProgrammenationalController');
});




Route::prefix('adminecole')
    ->namespace('Adminecole')
    ->name('adminecole.')
    ->group(function(){
    /*
        PARAMETRES
    */
    Route::resource('/parametres', 'ParametreController');
    // Programmes école
    Route::resource('/programmes-ecole','ProgrammeecoleController');
    Route::get('/get-lignes-programme-national-by-id/{id}','ProgrammeecoleController@getProgrammeNationalById');
    // Config des salles
    Route::resource('/salles','SalleController');
    Route::get('/get-profs','ProgrammeecoleController@getProfs');
    Route::get('/get-lignes-programme-national-by-id/{id}','ProgrammeecoleController@getLignesProgrammeNationalById');
    Route::get('/save-prof','ProgrammeecoleController@saveProf');
    Route::get('/menu/{id}','ProgrammeecoleController@menu')->name('menu');
    // Configuration des utilisateurs
    Route::get('/utilisateurs', 'UtilisateurController@index')->name('utilisateurs.index');
    Route::post('/utilisateurs-resposable-store', 'UtilisateurController@responsableStore')->name('responsable.store');
    // Config des tranches horaires
    Route::resource('/tranches', 'TrancheController');
    // Config des trimestres
    Route::get('/trimestres', 'TrimestreController@index')->name('trimestre.index');
    Route::get('/trimestres-on/{id}', 'TrimestreController@trimestreOn')->name('trimestre.on');
    Route::get('/trimestres-off{id}', 'TrimestreController@trimestreOff')->name('trimestre.off');
    // Config des matières
    Route::resource('/matieres', 'MatiereController');
    Route::get('/matieres/on/{id}', 'MatiereController@on')->name('matieres.on');
    Route::get('/matieres/off/{id}', 'MatiereController@off')->name('matieres.off');
    // Config des cours
    Route::resource('/cours', 'CourController');
    /*
        FIN PARAMETRES
    */

    /*
        Debut de la gestion des relevés de notes
    */
    Route::get('/scolarite-menu', 'ScolariteController@menu')->name('scolarite.menu');
    Route::get('/scolarite-dashboard/{id}/{ecole}', 'ScolariteController@dashboard');
    Route::get('/scolarite-releve/{id}/{ecole}/{programme_ecole}', 'ScolariteController@releveNote');
    Route::get('/scolarite-inscriptions/{salle}/{ecole}/{trimestre}', 'ScolariteController@inscription');
    Route::get('/scolarite-inscription-show/{inscription}/{ecole}/{salle}/{trimestre_ecole}', 'ScolariteController@inscriptionShow');
    Route::get('/scolarite/releve-save/{inscription}/{ecole}/{salle}/{trimestre_ecole}', 'ScolariteController@save')->name("releve.pdf");
    Route::post('/scolarite/generation-auto-releve', 'ScolariteController@generationAutoReleve')->name('generation.auto');
    /*
        Fin de la gestion des relevés de notes
    */

    /*
        Debut de la gestion des notes (Modification)
     */
    Route::resource('/notes','NoteController');
    Route::get('/notes/salles/{token}/{trimestre}','NoteController@inscriptions')->name("salle.token");
    Route::get('/notes/trimestres/{token}/{id}','NoteController@trimestre');
    Route::get('/notes/inscription/{token}/{inscription}/{trimestre}','NoteController@inscription');
    Route::get('/notes/save/{id}','NoteController@noteSave');
    Route::get('/notes/note-by-id/{id}','NoteController@noteById');
    Route::post('/notes/save','NoteController@noteSave');

    // Gestion des pointages
    Route::resource('/pointage','PointageController');

});




Route::prefix('responsablefinances')
->namespace('Responsablefinances')
->name('responsablefinances.')
->group(function(){
    /*
        Gestion des frais d'écolage
    */
    Route::resource('/ecolages', 'EcolageController');
    Route::get('/ecolages-salle-select', 'EcolageController@salleSelect');
    Route::get('/ecolages-eleve-infos-show/{id}', 'EcolageController@eleveShowById');
    Route::post('/ecolages-eleve-paiement-store', 'EcolageController@elevePaiementStore');
    Route::get('/ecolages-historique-paiements', 'EcolageController@historiquePaiements')->name('historique.paiements');
    Route::get('/ecolages-historique-salle/{token}', 'EcolageController@historiqueSalle')->name('historique.salle');
    Route::get('/ecolages-historique-paiements-eleve/{token}', 'EcolageController@historiquePaiementsEleve')->name('historique.piements.eleve');
    //Historique global
    Route::get('/ecolages-historique-paiements-global', 'EcolageController@historiqueEcolageGlobal')->name('historique.ecolages.global');
    Route::get('/ecolages-historique-find-salle/{id}', 'EcolageController@findEcolagesInscriptionsBySalle');
    Route::get('/ecolages-historique-eleve/{id}', 'EcolageController@historiqueEleve');
    Route::get('/ecolages-historique-find-month/{id}', 'EcolageController@findEcolagesByMonth');
    /*
        Fin de la gestion des frais d'écolage
    */

    // Dépenses
    Route::get('/depenses-categories', 'FinanceController@depensesCategories')->name('depenses.index');
    Route::post('/depenses-categorie-store', 'FinanceController@depenseCategorieStore')->name('depenses.categorie.store');
    Route::get('/depenses-gestion', 'FinanceController@depensesGestion')->name('depenses.gestion');
    Route::post('/depenses-store', 'FinanceController@depenseStore')->name('depenses.store');
    Route::get('/depenses-show/{token}', 'FinanceController@depenseShow')->name('depenses.show');
    // Autres Entrées
    Route::get('/entrees', 'FinanceController@entrees')->name('entrees.index');
    Route::post('/entrees-categorie-store', 'FinanceController@entreeCategorieStore')->name('entrees.categorie.store');
    Route::get('/entrees-gestion', 'FinanceController@entreesGestion')->name('entrees.gestion');
    Route::post('/entrees-store', 'FinanceController@entreeStore')->name('entrees.store');
    Route::get('/entrees-show/{token}', 'FinanceController@entreeShow')->name('entrees.show');
    // Suivi des paiements
    Route::get('/suivi-paiements', 'SuiviController@index')->name('suivi.index');
    Route::post('/suivi-paiements-search', 'SuiviController@search')->name('suivi.search');
    Route::get('/ecolages/facture/paiement','EcolageController@facture')->name('ecolages.facture');
    Route::resource('/pointages','PointageController');
});




Route::prefix('responsablescolarite')
->namespace('Responsablescolarite')
->name('responsablescolarite.')
->group(function(){
    // Config des Profs
    Route::resource('/profs', 'ProfController');
    Route::get('/profs-verification-numero', 'ProfController@verificationNumero');
    Route::post('/profs-terminer-un', 'ProfController@terminerUn');
    Route::get('/profs-verification-info', 'ProfController@verificationInfo');
    Route::post('/profs-terminer-deux', 'ProfController@terminerDeux');
    // Config des inscriptions
    Route::resource('/inscriptions', 'InscriptionController');
    Route::get('/tuteur-verification-numero', 'InscriptionController@verificationNumero');
    // Config des réinscriptions
    Route::get('/reinscriptions', 'InscriptionController@reinscription')->name('reinscriptions');
    Route::get('/get-inscription-by-id/{id}', 'InscriptionController@getInscriptionById');
    Route::post('/reinscriptions-save', 'InscriptionController@save')->name('reinscriptions.save');
    // Config des emplois du temps
    Route::resource('/emploistemps', 'EmploiController');
    Route::get('/emplois-du-temps/{token}', 'EmploiController@index')->name('emploistemps.index');
    Route::get('/emplois-du-temps-salles-menu', 'EmploiController@menu')->name('emploistemps.salles.menu');
    Route::resource('/diplomes', 'DiplomeController');
    Route::get('/inscription-auto', 'InscriptionController@inscriptionAuto')->name('inscription.auto');
    // Gestion des pointages
    Route::resource('/pointages','PointageController');
    Route::post('/pointages/pointer','PointageController@pointer');
});




Route::prefix('profs')
    ->namespace('Prof')
    ->name('profs.')
    ->group(function(){
        Route::resource('/ecoles', 'EcoleController');
        Route::get('/ecoles/{token}/{ecole}', 'EcoleController@show')->name('ecole.token');
        Route::resource('/notes', 'NoteController');
        Route::get('/notes/ecole/{ecole}', 'NoteController@indexEcole')->name('notes.ecole');
        Route::get('/notes-by-inscription/{token}/{ligne_programme_ecole}','NoteController@getInscriptionByToken')->name('note.show');
        Route::resource('/emploi_temps', 'EmploiTempController');
        Route::get('/emploi-by-salle/{token}/{ecole}','EmploiTempController@getEmploieBySalle');
        Route::get('/show-emploi-by-salle/{token}/{id}','EmploiTempController@getShowEmploie');
        Route::get('/add-salle', 'NoteController@addSalle');
        Route::get('/noteGenerate', 'NoteController@noteGenerateAuto');
        Route::post('abscences/recherche','AbscenceController@recherche')->name('recherche');
        Route::resource('/abscences', 'AbscenceController');
        Route::get('/abscences/ecole/{ecole}', 'AbscenceController@indexEcole')->name('abscences.ecole.index');
        Route::get('abscences/get-inscriptions-by-salle/{salle}','AbscenceController@getInscriptionBySalle');
        Route::post('/bar', 'MailController@bar');
        Route::get('/cours/{ecole}', 'MailController@cour')->name('cours');
        Route::get('/build', 'MailController@build')->name('build');
        Route::resource('/appuiecours', 'MailController');
});

// releve : inscription_id, trimestre_id, token, moi, semaine, annee

// ligne_releves : releve_id programme_ligne_ecole_id, valeur, note_id,

Route::prefix('parent')
    ->namespace('Parent')
    ->name('parents.')
    ->group(function(){
        Route::resource('/ecoles', 'EcoleController');
        Route::resource('/inscriptions', 'EleveController');
});


Route::prefix('surveillant')
    ->namespace('Surveillant')
    ->name('surveillants.')
    ->group(function(){
        Route::resource('/abscence', 'AbscenceController');
        Route::post('abscences/recherche','AbscenceController@recherche')->name('recherche');
        Route::get('abscences/get-inscriptions-by-salle/{salle}','AbscenceController@getInscriptionBySalle');
        Route::post('abscences/recherche','AbscenceController@recherche')->name('recherche');
        Route::resource('/pointages', 'PointageController');
        Route::get('/pointages/get-matiere-by-prof/{id}', 'PointageController@getMatieresByProf');

});
