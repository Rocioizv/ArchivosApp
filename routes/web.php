<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubirArchivosController;
use App\Http\Controllers\ImageController;


Route::get('/', [SubirArchivosController::class, 'showForm'])->name('upload.form');
Route::post('/upload', [SubirArchivosController::class, 'upload'])->name('upload.handle');
Route::get('/images', [SubirArchivosController::class, 'index'])->name('images.index');
Route::get('/photos', [SubirArchivosController::class, 'showPhotos'])->name('photos.index');

Route::get('/photos/view/{storedName}', [SubirArchivosController::class, 'viewPhoto'])->name('photos.view');
