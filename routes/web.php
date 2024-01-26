<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AthleteController;
use App\Http\Controllers\OppossingTeamController;
use App\Http\Controllers\MatcheController;
use App\Http\Controllers\DashboardController;

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

Route::get('/athlete/index', [AthleteController::class, 'index'])->middleware('auth');
Route::get('/athlete/create', [AthleteController::class, 'create'])->middleware('auth');
Route::post('/athlete', [AthleteController::class, 'store'])->middleware('auth');
Route::get('/athlete/edit/{id}', [AthleteController::class, 'edit'])->middleware('auth');
Route::put('/athlete/update/{id}', [AthleteController::class, 'update'])->middleware('auth');
Route::get('/athlete/show/{id}', [AthleteController::class, 'show'])->middleware('auth');

Route::get('/oppossing_team/index', [OppossingTeamController::class, 'index'])->middleware('auth');
Route::get('/oppossing_team/create', [OppossingTeamController::class, 'create'])->middleware('auth');
Route::post('/oppossing_team', [OppossingTeamController::class, 'store'])->middleware('auth');
Route::get('/oppossing_team/edit/{id}', [OppossingTeamController::class, 'edit'])->middleware('auth');
Route::put('/oppossing_team/update/{id}', [OppossingTeamController::class, 'update'])->middleware('auth');
Route::get('/oppossing_team/show/{id}', [OppossingTeamController::class, 'show'])->middleware('auth');

Route::get('/match/index', [MatcheController::class, 'index'])->middleware('auth');
Route::get('/match/create', [MatcheController::class, 'create'])->middleware('auth');
Route::post('/match', [MatcheController::class, 'store'])->middleware('auth');
Route::get('/match/edit/{id}', [MatcheController::class, 'edit'])->middleware('auth');
Route::put('/match/update/{id}', [MatcheController::class, 'update'])->middleware('auth');
Route::get('/match/edit_goals/{id}', [MatcheController::class, 'edit_goals'])->middleware('auth');
Route::put('/match/update_goals/{id}', [MatcheController::class, 'update_goals'])->middleware('auth');
Route::get('/match/delete_goals/{id}', [MatcheController::class, 'delete_goals'])->middleware('auth');
Route::get('/match/delete_goals_goalkeeper/{id}', [MatcheController::class, 'delete_goals_goalkeeper'])->middleware('auth');

Route::get('/', [DashboardController::class, 'index']);
// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
