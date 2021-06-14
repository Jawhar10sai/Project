<?php
use App\Http\Controllers\EtudiantController;
#use Illuminate\Support\Facades\Route;
#use App\Controllers\EtudiantController;
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
#Route::get('/etudiants', 'EtudiantController@liste');
Route::get('/etudiants', [EtudiantController::class, 'liste']);
Route::post('/etudiants', [EtudiantController::class, 'Ajouter']);
Route::put('/etudiants/{id}', [EtudiantController::class, 'Modifier']);
Route::get('/etudiants/{id}', [EtudiantController::class, 'index']);
// or
#Route::get('/users', 'App\Http\Controllers\UserController@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
