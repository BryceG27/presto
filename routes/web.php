<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
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
Route::get('/serch', [PublicController::class, 'search'])->name('search');

Route::post('/locale/{locale}', [PublicController::class, 'locale'])->name('locale');

Route::get('/announcements/new',[AnnouncementController::class, 'showForm'] )->name('fast');
Route::post('/announcements/submit',[AnnouncementController::class, 'create'])->name('announcements.create');
Route::get('/announcements/detail/{announcement}', [PublicController::class, 'announcementDetail'] )->name('announcement.detail');

Route::post('/announcements/images/upload',[AnnouncementController::class, 'uploadImage'])->name('announcements.images.upload');
Route::delete('/announcements/images/remove',[AnnouncementController::class, 'removeImage'])->name('announcements.images.remove');
Route::get('/announcements/images', [AnnouncementController::class, 'getImages'])->name('announcements.images');

Route::get('/category/{name}/{id}/announcements', [PublicController::class, 'announcementByCategory'])->name('announcement.category');

//Revisor Area
Route::get('/revisor/home',[RevisorController::class, 'index'])->name('revisor.home');
Route::post('/revisor/announcement/{id}/reject',[RevisorController::class,'reject'])->name('revisor.reject');
Route::post('/revisor/announcement/{id}/accept',[RevisorController::class,'accept'])->name('revisor.accept');
Route::post('/revisor/announcement/{id}/back',[RevisorController::class,'back'])->name('revisor.back');