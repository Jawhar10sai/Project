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

//my own routes
Route::get('/AllProfils', [App\Http\Controllers\SelectController::class, 'selectprofil'])->name('AllProfils');
Route::get('/AllAgences', [App\Http\Controllers\SelectController::class, 'selectagence'])->name('AllAgences');
Route::get('/AllSectors', [App\Http\Controllers\SelectController::class, 'selectsector'])->name('AllSectors');
//end my own routes

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//home admin
Route::get('/homeadmin', [App\Http\Controllers\AdminController::class, 'home'])->name('homeadmin');
//home responsable de ramassage
Route::get('/homerespramassage', [App\Http\Controllers\RamassageController::class, 'home'])->name('homerespramassage');


//my own routes
//Route::get('/index', [App\Http\Controllers\SelectController::class, 'index'])->name('index');
//routes showusers view
//add user
Route::get('/adduser', [App\Http\Controllers\AdminController::class, 'addUser'])->name('addUser');
Route::POST('/adduser', [App\Http\Controllers\AdminController::class, 'store'])->name('storeuser');

//modify user
Route::get('/modUser', [App\Http\Controllers\AdminController::class, 'modUser'])->name('modUser');
Route::post('/moduser', [App\Http\Controllers\AdminController::class, 'edit'])->name('edit');
Route::get('/AllNames', [App\Http\Controllers\SelectController::class, 'selectname'])->name('AllNames');
Route::get('/profil', [App\Http\Controllers\SelectController::class, 'SelectedProfil'])->name('SelectedProfil');
Route::put('/update', [App\Http\Controllers\AdminController::class, 'update'])->name('updateuser');
Route::put('/updateuser2', [App\Http\Controllers\AdminController::class, 'update2'])->name('updateuser2');


Route::get('/showusers', [App\Http\Controllers\AdminController::class, 'showUsers'])->name('showUsers');

//afficher la vue de l'historique des clients
Route::get('/showclientshistory', [App\Http\Controllers\AdminController::class, 'showClientsHistory'])->name('showClientsHistory');
//afficher tous l'historique des clients
Route::get('/AllClientsHistory', [App\Http\Controllers\SelectController::class, 'selectAllClientsHistory'])->name('AllClientsHistory');
//afficher la vue de l'historique des commandes
Route::get('/showcommandshistory', [App\Http\Controllers\AdminController::class, 'showCommandsHistory'])->name('showCommandsHistory');
//afficher tous l'historique des commandes
Route::get('/AllCommandsHistory', [App\Http\Controllers\SelectController::class, 'selectAllCommandsHistory'])->name('AllCommandsHistory');
//afficher la vue de l'historique des utilisateurs
Route::get('/showusershistory', [App\Http\Controllers\AdminController::class, 'showUsersHistory'])->name('showUsersHistory');
//afficher tous l'historique des utilisateurs
Route::get('/AllUsersHistory', [App\Http\Controllers\SelectController::class, 'selectAllUsersHistory'])->name('AllUsersHistory');



//deleting user
Route::delete('/delete',  [App\Http\Controllers\AdminController::class, 'delete'])->name('delete');
//end of my own routes

//routes showcommands view 
Route::get('/showCommands', [App\Http\Controllers\RamassageController::class, 'showCommands'])->name('showCommands');

//routes showclients view
//show clients for resp ramass
Route::get('/showClients', [App\Http\Controllers\ClientController::class, 'showClients'])->name('showClients');

Route::get('/AllCommercials', [App\Http\Controllers\SelectController::class, 'selectcommercial'])->name('AllCommercials');
//code client
Route::GET('/codeClient', [App\Http\Controllers\ClientController::class, 'code'])->name('codeClient');
//add client
Route::POST('/addclient', [App\Http\Controllers\ClientController::class, 'store'])->name('storeclient');
//select all clients
Route::get('/allClients', [App\Http\Controllers\SelectController::class, 'clients'])->name('clients');
//update client
Route::put('/updateClient', [App\Http\Controllers\ClientController::class, 'update'])->name('updateClient');
//deleting client
Route::delete('/deleteClient',  [App\Http\Controllers\ClientController::class, 'delete'])->name('deleteClient');


//routes showCommands view
//get client by code
Route::get('/findClient', [App\Http\Controllers\SelectController::class, 'SelectedClient'])->name('SelectedClient');
//code commande
Route::get('/codeCom', [App\Http\Controllers\RamassageController::class, 'code'])->name('codeCom');
//autocoplete nom_client ajax
Route::get('/fetch', [App\Http\Controllers\RamassageController::class, 'fetch'])->name('fetch');
//get client by name
Route::get('/findClientByName', [App\Http\Controllers\SelectController::class, 'SelectedClientByName'])->name('SelectedClientByName');
//autocoplete nom_benificiaire ajax
Route::get('/fetch2', [App\Http\Controllers\RamassageController::class, 'fetch2'])->name('fetch2');
//add command
Route::POST('/addcommand', [App\Http\Controllers\RamassageController::class, 'store'])->name('storeCommand');
//show all commands
Route::get('/AllCommands', [App\Http\Controllers\SelectController::class, 'selectcommand'])->name('AllCommands');
//show all commands after filters
Route::get('/AllCommandsAfterFilters', [App\Http\Controllers\SelectController::class, 'selectcommandsafterfilters'])->name('AllCommandsAfterFilters');
//update command
Route::put('/updateCommand', [App\Http\Controllers\RamassageController::class, 'update'])->name('updateCommand');
//deleting command
Route::delete('/deleteCommand',  [App\Http\Controllers\RamassageController::class, 'delete'])->name('deleteCommand');

//affecter un ramasseur
//get command by id
Route::get('/findCommandById', [App\Http\Controllers\SelectController::class, 'SelectedCommandById'])->name('SelectedCommandById');
//get ramasseur by matricule
Route::get('/findRamasseurByMat', [App\Http\Controllers\SelectController::class, 'SelectedRamasseurByMatricule'])->name('SelectedRamasseurByMatricule');
//autocoplete nom_ramasseur ajax
Route::get('/fetchram', [App\Http\Controllers\RamassageController::class, 'fetchram'])->name('fetchram');
//get ramasseur by name
Route::get('/findRamByName', [App\Http\Controllers\SelectController::class, 'SelectedRamasseurByName'])->name('SelectedRamasseurByName');
//valider l'affectation
Route::put('/assigncommand', [App\Http\Controllers\RamassageController::class, 'assign'])->name('assignCommand');
//confirmer la demande
Route::put('/confirm', [App\Http\Controllers\RamassageController::class, 'confirm'])->name('confirmCommand');
//annuler la demande
Route::put('/cancel', [App\Http\Controllers\RamassageController::class, 'cancel'])->name('cancelCommand');


//routes showMotifs view
Route::get('/showmotifs', [App\Http\Controllers\MotifController::class, 'showMotifs'])->name('showMotifs');
//ajouter un motif
Route::POST('/addmotif', [App\Http\Controllers\MotifController::class, 'store'])->name('storemotif');
//afficher les motif
Route::get('/AllMotifs', [App\Http\Controllers\SelectController::class, 'selectmotif'])->name('AllMotifs');
//modifier un motif
Route::put('/updatemotif', [App\Http\Controllers\MotifController::class, 'update'])->name('updatemotif');
//supprimer un motif
Route::delete('/deleteMotif',  [App\Http\Controllers\MotifController::class, 'delete'])->name('deleteMotif');

//show RespRDV home
Route::get('/homeresprdv', [App\Http\Controllers\ResprdvController::class, 'RespRDVview'])->name('homeresprdv');
//exporter ficher excel
Route::get('/exportExcel', [App\Http\Controllers\RamassageController::class, 'export'])->name('exportExcel');
/* partie zero ramassage */
//importer la feuille de ramassage
Route::POST('/importExcel', [App\Http\Controllers\StatisticController::class, 'import'])->name('importExcel');
//importer fichier de l'age reel
Route::POST('/importExcel2', [App\Http\Controllers\StatisticController::class, 'import2'])->name('importExcel2');
//importer fichier de l'age avec zero ram
Route::POST('/importExcel3', [App\Http\Controllers\StatisticController::class, 'import3'])->name('importExcel3');

/* partie 3*5 ramassages */
//importer la feuille de ramassage
Route::POST('/importExcel4', [App\Http\Controllers\StatisticController::class, 'import4'])->name('importExcel4');
//importer fichier de l'age reel
Route::POST('/importExcel5', [App\Http\Controllers\StatisticController::class, 'import5'])->name('importExcel5');
//importer fichier de l'age avec zero ram
Route::POST('/importExcel6', [App\Http\Controllers\StatisticController::class, 'import6'])->name('importExcel6');

/* partie passage */
//importer la feuille de ramassage
Route::POST('/importExcel7', [App\Http\Controllers\StatisticController::class, 'import7'])->name('importExcel7');
//importer feuille passage
Route::POST('/importExcel8', [App\Http\Controllers\StatisticController::class, 'import8'])->name('importExcel8');

/* partie feuille globale */
//importer la feuille de ramassage
Route::POST('/importExcel9', [App\Http\Controllers\StatisticController::class, 'import9'])->name('importExcel9');
//importer feuille globale
Route::POST('/importExcel10', [App\Http\Controllers\StatisticController::class, 'import10'])->name('importExcel10');


//routes showStatistics view
Route::get('/showStatistics', [App\Http\Controllers\StatisticController::class, 'showstatiStics'])->name('showStatistics');

//routes showagezeroram view
Route::get('/showAgeZeroRam', [App\Http\Controllers\StatisticController::class, 'zeroramview'])->name('zeroramview');
//routes showagezeroram2 view
Route::get('/showAgeZeroRam2', [App\Http\Controllers\StatisticController::class, 'zeroram2view'])->name('zeroram2view');
//routes showagezeroram3 view
Route::get('/showAgeZeroRam3', [App\Http\Controllers\StatisticController::class, 'zeroram3view'])->name('zeroram3view');

//routes showagetacram view
Route::get('/showAgeTacRam', [App\Http\Controllers\StatisticController::class, 'tacramview'])->name('tacramview');
//routes showagetacram2 view
Route::get('/showAgeTacRam2', [App\Http\Controllers\StatisticController::class, 'tacram2view'])->name('tacram2view');
//routes showagetacram3 view
Route::get('/showAgeTacRam3', [App\Http\Controllers\StatisticController::class, 'tacram3view'])->name('tacram3view');

//routes showpassage view
Route::get('/showPassage', [App\Http\Controllers\StatisticController::class, 'passageview'])->name('passageview');
//routes showpassage2 view
Route::get('/showPassage2', [App\Http\Controllers\StatisticController::class, 'passage2view'])->name('passage2view');
//routes showpassage3 view
Route::get('/showPassage3', [App\Http\Controllers\StatisticController::class, 'passage3view'])->name('passage3view');

//routes showglobstats view
Route::get('/showGlobstats', [App\Http\Controllers\StatisticController::class, 'globstatsview'])->name('globstatsview');
//routes showglobstats2 view
Route::get('/showGlobstats2', [App\Http\Controllers\StatisticController::class, 'globstats2view'])->name('globstats2view');
//routes showglobstats3 view
Route::get('/showGlobstats3', [App\Http\Controllers\StatisticController::class, 'globstats3view'])->name('globstats3view');

//show all statistics of clients with zero ram
Route::get('/AllStatistics1', [App\Http\Controllers\SelectController::class, 'selectstatistic1'])->name('AllStatistics1');
//show all statistics of clients with 3*5 ram
Route::get('/AllStatistics2', [App\Http\Controllers\SelectController::class, 'selectstatistic2'])->name('AllStatistics2');
//show all statistics of clients 
Route::get('/AllStatistics3', [App\Http\Controllers\SelectController::class, 'selectstatistic3'])->name('AllStatistics3');
//show all passages of clients  
Route::get('/AllStatistics4', [App\Http\Controllers\SelectController::class, 'selectstatistic4'])->name('AllStatistics4');
//show statistics of all clients  
Route::get('/AllStatistics5', [App\Http\Controllers\SelectController::class, 'selectstatistic5'])->name('AllStatistics5');


//supprimer la table statistic
Route::delete('/deleteAllTable',  [App\Http\Controllers\StatisticController::class, 'delete'])->name('deleteAllTable');
//exporter ficher excel des clients avec 0 ram
Route::get('/exportExcel0ram', [App\Http\Controllers\StatisticController::class, 'export'])->name('exportExcel0ram');
//exporter ficher excel des clients avec 3*5 ram
Route::get('/exportExcel35ram', [App\Http\Controllers\StatisticController::class, 'export2'])->name('exportExcel35ram');
//exporter la feuille passage
Route::get('/exportExcelPassage', [App\Http\Controllers\StatisticController::class, 'export3'])->name('exportExcelPassage');
//exporter la feuille des statistiques des clients avec 3*5 ramassages
Route::get('/exportSecondExcel35ram', [App\Http\Controllers\StatisticController::class, 'export4'])->name('exportSecondExcel35ram');
//exporter la feuille des statistiques des clients avec 0 ramassage
Route::get('/exportSecondExcel0ram', [App\Http\Controllers\StatisticController::class, 'export5'])->name('exportSecondExcel0ram');
//exporter la feuille d'age reel des clients
Route::get('/exportAgereelFile', [App\Http\Controllers\StatisticController::class, 'export6'])->name('exportAgereelFile');
//exporter ficher excel de tous les clients avec l'age 0 ram
Route::get('/exportExcel0ram2', [App\Http\Controllers\StatisticController::class, 'export7'])->name('exportExcel0ram2');
//exporter ficher excel de tous les clients avec l'age 3*5 ram
Route::get('/exportExcel35ram2', [App\Http\Controllers\StatisticController::class, 'export8'])->name('exportExcel35ram2');
//exporter le fichier global
Route::get('/exportFglobal', [App\Http\Controllers\StatisticController::class, 'export9'])->name('exportFglobal');


//ShowCommandslist belongs to resprdv
Route::get('/showRespRDVCommands', [App\Http\Controllers\ResprdvController::class, 'showCommands'])->name('showRespRDVCommands');

//importer la feuille de ramassage
Route::POST('/importFram', [App\Http\Controllers\StatisticController::class, 'import3'])->name('importFram');
//routes exportFeulleDeRamassage view
Route::get('/feuillederamassage', [App\Http\Controllers\StatisticController::class, 'framassageview'])->name('feuillederamassage');
//generer la feuille de ramassage
Route::get('/generateFram', [App\Http\Controllers\StatisticController::class, 'generate_fram'])->name('generateFram');
//exporter feuille de ramassage
//Route::get('/exportFram', [App\Http\Controllers\StatisticController::class, 'export2'])->name('exportFram');
//afficher les nom des fichiers importés
Route::get('/importedfiles', [App\Http\Controllers\SelectController::class, 'selectfilenames'])->name('importedfiles');

//afficher le nombre des clients avec somme=0
Route::get('/AllNullSomme', [App\Http\Controllers\SelectController::class, 'selectNullSomme'])->name('AllNullSomme');
//afficher le nombre des clients avec age_zero_ram=null
Route::get('/AllNullAge0ram', [App\Http\Controllers\SelectController::class, 'selectNullAges'])->name('AllNullAge0ram');

//afficher le nombre des clients avec somme entre 3 et 5
Route::get('/All35Somme', [App\Http\Controllers\SelectController::class, 'select35Somme'])->name('All35Somme');
//afficher le nombre des clients avec age_3_5ram=null
Route::get('/AllNullAge35ram', [App\Http\Controllers\SelectController::class, 'select35Ages'])->name('AllNullAge35ram');

//afficher le nombre des clients dans la feuille de ramassage
Route::get('/AllFramClients', [App\Http\Controllers\SelectController::class, 'selectAllFramClients'])->name('AllFramClients');

//afficher le nombre des clients dans la feuille de passage
Route::get('/AllPassageClients', [App\Http\Controllers\SelectController::class, 'selectAllPassageClients'])->name('AllPassageClients');


//dashboard routes
Route::get('/dash', [App\Http\Controllers\RamassageController::class, 'dashboard'])->name('dashboard');


//afficher les donnees de la chart des clients avec 0ram
Route::get('/Allstatszeroram', [App\Http\Controllers\SelectController::class, 'statszeroram'])->name('Allstatszeroram');
//afficher les donnees de la chart des clients avec 3*5 rams
Route::get('/Allstats35rams', [App\Http\Controllers\SelectController::class, 'stats35rams'])->name('Allstats35rams');

/*feuille 0 ram*/
//modifier l'age reel d'un client 
Route::put('/updateClientAgeReel', [App\Http\Controllers\StatisticController::class, 'updateAgeReel'])->name('updateAgeReel');
//modifier l'age avec 0ramassage d'un client
Route::put('/updateClientAge0Ram', [App\Http\Controllers\StatisticController::class, 'updateAge0Ram'])->name('updateAge0Ram');

/*feuille 3*5 rams*/
//modifier l'age reel d'un client
Route::put('/updateClientAgeReel2', [App\Http\Controllers\StatisticController::class, 'updateAgeReel2'])->name('updateAgeReel2');
//modifier l'age avec 3*5 ramassages d'un client
Route::put('/updateClientAge35Ram', [App\Http\Controllers\StatisticController::class, 'updateAge35Ram'])->name('updateAge35Ram');



/*operateur call center routes*/
//home 
Route::get('/homeopcallcenter', [App\Http\Controllers\CallcenterController::class, 'home'])->name('homeopcallcenter');
//show clients for op call center
Route::get('/showClientsOpCallCenter', [App\Http\Controllers\ClientController::class, 'showClientsCallCenter'])->name('showClientsCallCenter');
//routes showcommandscallcenter view
Route::get('/showCommandsOpCallCenter', [App\Http\Controllers\CallcenterController::class, 'showCommands'])->name('showCommandsCallCenter');

//acceder a la vue erreur 403
Route::get('/erreur403', [App\Http\Controllers\HomeController::class, 'erreur403'])->name('erreur403');

/*responsable call center routes*/
//home
Route::get('/homerespcallcenter', [App\Http\Controllers\RamassageController::class, 'home2'])->name('homerespcallcenter');
//show clients for resp call center
Route::get('/showClientsRespCallCenter', [App\Http\Controllers\ClientController::class, 'showClientsRespCallCenter'])->name('showClientsRespCallCenter');
//routes showcommandsRespcallcenter view
Route::get('/showCommandsRespCallCenter', [App\Http\Controllers\RamassageController::class, 'showCommandsRespCallCenter'])->name('showCommandsRespCallCenter');

//routes gestion des agences
//showAgences view
Route::get('/showagencesview', [App\Http\Controllers\AdminController::class, 'showAgencesView'])->name('showagencesview');
//afficher les agences
// Route::get('/AllAgences', [App\Http\Controllers\AgenceController::class, 'selectAllAgences'])->name('selectAllAgences');
//ajouter une agence
Route::POST('/addagence', [App\Http\Controllers\AgenceController::class, 'store'])->name('storeagence');
//modifier une agence
Route::put('/updateagence', [App\Http\Controllers\AgenceController::class, 'update'])->name('updateagence');
//supprimer une agence
Route::delete('/deleteAgence',  [App\Http\Controllers\AgenceController::class, 'delete'])->name('deleteAgence');

//routes gestion des secteurs
//showSectors view
Route::get('/showsectorsview', [App\Http\Controllers\AdminController::class, 'showSectorsView'])->name('showsectorsview');
//afficher les secteurs
 Route::get('/AllSectors2', [App\Http\Controllers\SelectController::class, 'selectsector2'])->name('selectAllSectors2');
//ajouter un secteur
Route::POST('/addSector', [App\Http\Controllers\SecteurController::class, 'store'])->name('storeSector');
//modifier un secteur
Route::put('/updateSector', [App\Http\Controllers\SecteurController::class, 'update'])->name('updateSector');
//supprimer un secteur
Route::delete('/deleteSector',  [App\Http\Controllers\SecteurController::class, 'delete'])->name('deleteSector');


//routes gestion des commerciaux
//showCommercials view
Route::get('/showCommercialsView', [App\Http\Controllers\AdminController::class, 'showCommercialView'])->name('showCommercialsView');
//afficher les commerciaux
Route::get('/selectAllCommercials', [App\Http\Controllers\SelectController::class, 'selectAllCommercials'])->name('selectAllCommercials');
//ajouter un commercial
Route::POST('/addCommercial', [App\Http\Controllers\CommercialController::class, 'store'])->name('storeCommercial');
//modifier un commercial
Route::put('/updateCommercial', [App\Http\Controllers\CommercialController::class, 'update'])->name('updateCommercial');
//supprimer un commercial
Route::delete('/deleteCommercial',  [App\Http\Controllers\CommercialController::class, 'delete'])->name('deleteCommercial');
