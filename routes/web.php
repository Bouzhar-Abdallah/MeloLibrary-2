<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\FileUploadController;
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

use App\Http\Livewire\Modals\ArtistFormModal;

Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/artist-form-modal', ArtistFormModal::class)->name('artist-form-modal');
});

/* public home route */
Route::get('/', function () {
    return view('guest');
});
Route::get('/test', function () {
    return view('test');
});
    

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
Route::get('/admin/song/new', [SongController::class, 'index'])->name('admin.song');
Route::post('/admin/song/save', [SongController::class, 'save'])->name('admin.song.save');
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
    Route::get('/user', [DashboardController::class, 'user'])->name('home');
});




require __DIR__.'/auth.php';
