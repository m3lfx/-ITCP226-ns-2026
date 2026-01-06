<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;

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

Route::get('/artists', [ArtistController::class, 'index']);
Route::get('/artists/create', [ArtistController::class, 'create']);
Route::post('/artists', [ArtistController::class, 'store']);
Route::get('/artists/create', [ArtistController::class, 'create']);
Route::get('/artists/{id}/edit', [ArtistController::class, 'edit']);
