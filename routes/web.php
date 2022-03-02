<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AnnouncementController;


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

Route::get('/', [PublicController::class, 'index'])->name('home');

Route::get('/announcements/new',[AnnouncementController::class, 'showForm'] )->name('fast');
Route::post('/announcements/submit',[AnnouncementController::class, 'create'])->name('announcements.create');

Route::get('/category/{name}/{id}/announcements', [PublicController::class, 'announcementByCategory'])->name('announcement.category');
