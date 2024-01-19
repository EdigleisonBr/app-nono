<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AthleteController;

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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
