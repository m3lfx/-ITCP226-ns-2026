<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UserController;
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

Route::get('/artists', [ArtistController::class, 'index'])->name('artist.index')->middleware('auth');
Route::get('/artists/create', [ArtistController::class, 'create'])->name('artist.create')->middleware('auth');
Route::post('/artists', [ArtistController::class, 'store'])->name('artists.store');
Route::get('/artists/create', [ArtistController::class, 'create']);
Route::get('/artists/{id}/edit', [ArtistController::class, 'edit']);
Route::post('/artists/{id}/update', [ArtistController::class, 'update']);
Route::get('/artists/{id}/delete', [ArtistController::class, 'delete']);
Route::get('/songs/{id}/restore',  [SongController::class, 'restore'])->name('songs.restore');

Route::view('/register', 'user.register');
Route::view('/user/login', 'user.login');
Route::post('/user/register', [UserController::class, 'register'])->name('user.register');
Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
Route::post('signin', [UserController::class, 'postSignin'])->name('user.signin');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::resource('albums', AlbumController::class)->middleware('auth')->except(['index']);
Route::resource('songs', SongController::class)->middleware('auth');
