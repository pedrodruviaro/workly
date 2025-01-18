<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    // Profile
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // Dashboard
    Route::get('/dashboard', function () {
        // return view('dashboard');
        return redirect(route('projects.index'));
    })->name('dashboard');

    // Projects
    Route::controller(ProjectController::class)->group(function () {
        Route::get('/projects', 'index')->name('projects.index');
        Route::get('/projects/create', 'create')->name('projects.create');
        Route::get('/projects/{project}/edit', 'edit')->name('projects.edit');
        Route::get('/projects/{project}', 'show')->name('projects.show');
    });

    // Tags
    Route::controller(TagController::class)->group(function () {
        Route::get('/tags', 'index')->name('tags.index');
        Route::post('/tags', 'store')->name('tags.store');
        Route::delete('/tags/{tag}', 'destroy')->name('tags.destroy');
    });

    // Tasks
    Route::controller(TaskController::class)->group(function () {
        Route::get('/tasks', 'index')->name('tasks.index');
        Route::get('/tasks/{project}/create', 'create')->name('tasks.create');
        Route::get('/tasks/{project}/edit/{task}', 'edit')->name('tasks.edit');
    });
});

require __DIR__ . '/auth.php';
