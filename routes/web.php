<?php

use App\Http\Controllers\AdminController;
use App\Models\Admin;
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

Route::get('/', [AdminController::class, 'adminPage'])->name('admin#page');
Route::get('/adminPage', [AdminController::class, 'adminPage'])->name('adminPage#page');
Route::post('/movie/createPost', [AdminController::class, 'moviePostCreate'])->name('movie#createPost');
Route::get('/movie/deletePage/{id}', [AdminController::class, 'moviePostDelete'])->name('movie#delete');
Route::get('movie/editPage/{id}', [AdminController::class, 'moviePostEdit'])->name('movie#edit');
Route::post('/movie/editPage/done/{id}', [AdminController::class, 'finalEdit'])->name('movie#edit#done');

Route::get('/movie/home', [AdminController::class, 'homePage'])->name('movie#home');
Route::get('/movie/homeView/{id}', [AdminController::class, 'homeViewPage'])->name('movie#homeView');

Route::get('/movie/tvshowPage', [AdminController::class, 'tvshowPage'])->name('movie#tvshow');
Route::get('/movie/movieShowPage', [AdminController::class, 'movieShowPage'])->name('movie#showPage');
Route::get('/movie/upcomingMovie', [AdminController::class, 'upcomingMovie'])->name('movie#upcomingMovie');
