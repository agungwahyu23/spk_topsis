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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::resource('banks', App\Http\Controllers\BankController::class);
    Route::resource('criterias', App\Http\Controllers\CriteriaController::class);
    Route::resource('subCriterias', App\Http\Controllers\SubCriteriaController::class);
    Route::resource('objeks', App\Http\Controllers\ObjekController::class);
    Route::resource('alternatives', App\Http\Controllers\AlternativeController::class);
    Route::resource('analyses', App\Http\Controllers\AnalysisController::class);
});


Auth::routes();
