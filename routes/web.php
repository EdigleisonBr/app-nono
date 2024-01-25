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

Route::get('/athlete/index', [AthleteController::class, 'index']);
Route::get('/athlete/create', [AthleteController::class, 'create']);
Route::post('/athlete', [AthleteController::class, 'store']);
Route::get('/athlete/edit/{id}', [AthleteController::class, 'edit']);
Route::put('/athlete/update/{id}', [AthleteController::class, 'update']);
Route::get('/athlete/show/{id}', [AthleteController::class, 'show']);

Route::get('/oppossing_team/index', [OppossingTeamController::class, 'index']);
Route::get('/oppossing_team/create', [OppossingTeamController::class, 'create']);
Route::post('/oppossing_team', [OppossingTeamController::class, 'store']);
Route::get('/oppossing_team/edit/{id}', [OppossingTeamController::class, 'edit']);
Route::put('/oppossing_team/update/{id}', [OppossingTeamController::class, 'update']);
Route::get('/oppossing_team/show/{id}', [OppossingTeamController::class, 'show']);

Route::get('/match/index', [MatcheController::class, 'index']);
Route::get('/match/create', [MatcheController::class, 'create']);
Route::post('/match', [MatcheController::class, 'store']);
Route::get('/match/edit/{id}', [MatcheController::class, 'edit']);
Route::put('/match/update/{id}', [MatcheController::class, 'update']);
Route::get('/match/edit_goals/{id}', [MatcheController::class, 'edit_goals']);
Route::put('/match/update_goals/{id}', [MatcheController::class, 'update_goals']);
Route::get('/match/delete_goals/{id}', [MatcheController::class, 'delete_goals']);
Route::get('/match/delete_goals_goalkeeper/{id}', [MatcheController::class, 'delete_goals_goalkeeper']);

Route::get('/', [DashboardController::class, 'index']);
// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
