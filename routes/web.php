<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\songs as adminSongs;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\parentController;
use App\Http\Controllers\User;
use App\Http\Controllers\user\playlists as playlistsController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware as UserMiddleware;

//use App\Http\Middleware\UserMiddleware;
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



/* Guest Routes */

Route::get('/', [parentController::class, 'guestIndex'])->name('guest.index');
Route::get('/public/song/{id}', [parentController::class, 'publicSong'])->name('public.song');


//user Routes
Route::group(['middleware' => ['auth', UserMiddleware::class]], function () {

    /* Gets */
    Route::get('/user', [parentController::class, 'userIndex'])->name('Home');
    Route::get('/artists', [parentController::class, 'userArtists'])->name('Artists');
    Route::get('/bands', [parentController::class, 'userBands'])->name('Bands');
    Route::get('/genres', [parentController::class, 'userGenres'])->name('Genres');

    /* Posts */
    Route::post('/add/song/playlist', [playlistsController::class, 'addSong'])->name('add.song.playlist');
    Route::post('/add/playlist', [playlistsController::class, 'newPlaylist'])->name('create new playlist');
});



//admin Routes
Route::group(['middleware' => ['auth', AdminMiddleware::class]], function () {

    /* Gets */
    Route::get('/dashboard', [parentController::class, 'adminIndex'])->name('admin.index');
    Route::get('/admin/songs/list', [parentController::class, 'listSongs'])->name('admin.songs.list');
    Route::get('/admin/comments/list', [parentController::class, 'listComments'])->name('admin.comments.list');
    Route::get('/admin/song/new', [parentController::class, 'createSong'])->name('admin.song.new');
    Route::get('/admin/song/update/{id}', [parentController::class, 'updateSong'])->name('admin.update.song');


    /* Posts */
    Route::post('/admin/song/save', [adminSongs::class, 'saveSong'])->name('admin.song.save');
    Route::post('/admin/song/saveUpdated/{id}', [adminSongs::class, 'saveSongUpdated'])->name('admin.song.save.updated');
});



require __DIR__ . '/auth.php';
