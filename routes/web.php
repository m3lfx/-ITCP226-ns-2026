<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListenerController;
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



Route::view('/register', 'user.register');
Route::view('/user/login', 'user.login');
Route::post('/user/register', [UserController::class, 'register'])->name('user.register');

Route::post('signin', [UserController::class, 'postSignin'])->name('user.signin');



Route::middleware(['auth'])->group(function () {
    Route::get('/artists', [ArtistController::class, 'index'])->name('artist.index');
    Route::get('/artists/create', [ArtistController::class, 'create'])->name('artist.create');
    Route::post('/artists', [ArtistController::class, 'store'])->name('artists.store');
    Route::get('/artists/create', [ArtistController::class, 'create']);
    Route::get('/artists/{id}/edit', [ArtistController::class, 'edit']);
    Route::post('/artists/{id}/update', [ArtistController::class, 'update']);
    Route::get('/artists/{id}/delete', [ArtistController::class, 'delete']);
    Route::get('/songs/{id}/restore',  [SongController::class, 'restore'])->name('songs.restore');
    Route::get('/listeners/{id}/restore',  [ListenerController::class, 'restore'])->name('listeners.restore');

    Route::get('/listeners/add-album', [ListenerController::class, 'addAlbums'])->name('listeners.addAlbums');
    Route::post('/listeners/add-album', [ListenerController::class, 'addAlbumListener'])->name('listeners.addAlbumListener');
    Route::get('/listeners/edit-album', [ListenerController::class, 'editAlbumListener'])->name('listeners.editAlbumListener');
    Route::put('/listeners/update-albums', [ListenerController::class, 'updateAlbums'])->name('listeners.updateAlbums');

    Route::resource('songs', SongController::class);
    Route::resource('albums', AlbumController::class);
    Route::resource('listeners', ListenerController::class);
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
});
