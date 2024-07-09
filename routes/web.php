<?php

use App\Http\Controllers\EtudiantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return view('welcome');

});

Route::post('etudiants', [EtudiantController::class, 'store'])->name('etudiants.store');

Route::get('etudiants/create', [EtudiantController::class, 'create'])->name('etudiants.create');

Route::get('etudiants/index', [EtudiantController::class, 'index'])->name('etudiants.index');

Route::get('etudiants/{id}/edit', [EtudiantController::class, 'edit'])->name('etudiants.edit'); // {id} veut dire que le parametre id change

Route::put('etudiants/{id}', [EtudiantController::class, 'update'])->name('etudiants.update'); //route put pout tout ce qui est modification

Route::delete('etudiants/{id}', [EtudiantController::class, 'destroy'])->name('etudiants.destroy');

Route::get('etudiants/filiere/{code}', [EtudiantController::class, 'byCodeFiliere'])->name('etudiants.byCodeFiliere'); //Quand c'est un parametre c'est entre accolades

Route::post('etudiants', [EtudiantController::class, 'search'])->name('etudiants.search');

Route::post('etudiants', [EtudiantController::class, 'searchByF'])->name('etudiants.searchByF');


