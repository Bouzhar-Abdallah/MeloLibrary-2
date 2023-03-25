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

Route::get('/', [parentController::class, 'guestIndex'])->name('guest.index');
/* public home route */


Route::get('/test', function () {
    return redirect('/dashboard')->with('flashMessage', ['message' => 'test', 'type' => 'failure']);
})->name('test');

    

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); */



Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
Route::get('/user', [DashboardController::class, 'user'])->name('user');

Route::get('/admin/update/artist/{id}', [ArtistController::class, 'update'])->name('admin.update.artist');
Route::post('/admin/edit/artist/{id}', [ArtistController::class, 'edit'])->name('save.new.artist');
Route::get('/admin/delete/artist/{id}', [ArtistController::class, 'delete'])->name('delete.artist');

Route::get('/admin/update/band/{id}', [BandController::class, 'update'])->name('admin.update.band');
Route::post('/admin/edit/band/{id}', [BandController::class, 'edit'])->name('save.new.band');
Route::get('/admin/delete/band/{id}', [BandController::class, 'delete'])->name('delete.band');
/* Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); */


/* Route::group(['prefix' => 'admin','middleware'=>['auth',\App\Http\Middleware\AdminMiddleware::class]], function () {
    Route::get('dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
    Route::get('/song/new', [SongController::class, 'index'])->name('admin.song');
    Route::post('/song/save', [SongController::class, 'save'])->name('admin.song.save');
}); */

//route for executive


//route for user
Route::group(['middleware'=>['auth',UserMiddleware::class]], function () {
    Route::get('/user', [parentController::class, 'userIndex'])->name('user.index');
});

Route::get('/dashboard', [parentController::class, 'adminIndex'])->name('admin.index');
Route::get('/admin/songs/list', [parentController::class, 'listSongs'])->name('admin.songs.list');
Route::get('/admin/song/new', [parentController::class, 'createSong'])->name('admin.song.new');
Route::get('/admin/song/update/{id}', [parentController::class, 'updateSong'])->name('admin.update.song');
Route::post('/admin/song/save', [adminSongs::class, 'saveSong'])->name('admin.song.save');
Route::post('/admin/song/saveUpdated/{id}', [adminSongs::class, 'saveSongUpdated'])->name('admin.song.save.updated');



require __DIR__.'/auth.php';
