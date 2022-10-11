<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\ListeCategoriesController;


Route::get('/', [VideoController::class, 'index'])->name('home');
Route::resource('videos', VideoController::class);
Route::get('/categories', [ListeCategoriesController::class, 'index'])->name('categories.home');
Route::post('/categories', [ListeCategoriesController::class, 'store'])->name('categories.store');
Route::get('/categories/delete-category/{id}', [ListeCategoriesController::class, 'destroy'])->name('categories.destroy');
Route::get('/categories/editCategory/{id}', [ListeCategoriesController::class, 'edit'])->name('categories.edit');
Route::put('/categories/updateCategory/', [ListeCategoriesController::class, 'update'])->name('categories.update');


Route::post('/actors/{id}', [ActorsController::class, 'store'])->name('actors.store');
Route::get('/delete-actor/{id}', [ActorsController::class, 'destroy'])->name('actors.destroy');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
