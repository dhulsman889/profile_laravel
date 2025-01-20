<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TtgController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectsController;

Route::get('/', function () {
    return view('home.home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('ttg', TtgController::class)
    ->only(['index', 'store', 'show', 'edit', 'create', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);


Route::resource('projects', ProjectsController::class)
    ->only(['index', 'store', 'show', 'edit', 'create', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
