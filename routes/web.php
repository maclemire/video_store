<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\ListeCategoriesController;

// Videos
Route::get('/', [VideoController::class, 'index'])->name('home');
Route::resource('videos', VideoController::class);

// Catégories
Route::get('/categories', [ListeCategoriesController::class, 'index'])->name('categories.home');
Route::post('/categories', [ListeCategoriesController::class, 'store'])->name('categories.store');
Route::get('/categories/delete-category/{id}', [ListeCategoriesController::class, 'destroy'])->name('categories.destroy');
Route::get('/{category}/editCategory', [ListeCategoriesController::class, 'edit'])->name('categories.edit');
Route::put('/{category}/updateCategory', [ListeCategoriesController::class, 'update'])->name('categories.update');

// Actors
Route::post('/actors/{id}', [ActorsController::class, 'store'])->name('actors.store');
Route::get('/delete-actor/{id}', [ActorsController::class, 'destroy'])->name('actors.destroy');
Route::get('/{actors}/editActors', [ActorsController::class, 'edit'])->name('actors.edit');
Route::put('/{actors}/updateActors', [ActorsController::class, 'update'])->name('actors.update');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
