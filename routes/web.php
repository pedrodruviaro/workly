<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // return view('dashboard');
    return redirect(route('projects.index'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// remove later
Route::view('/projects', 'projects.index')->name('projects.index');
Route::view('/projects/create', 'projects.create')->name('projects.create');
Route::view('/projects/edit/{id}', 'projects.edit')->name('projects.edit');
Route::view('/projects/{id}', 'projects.show')->name('projects.show');

Route::view('/tasks', 'tasks.index')->name('tasks.index');
Route::view('/tags', 'tags.index')->name('tags.index');

require __DIR__ . '/auth.php';
