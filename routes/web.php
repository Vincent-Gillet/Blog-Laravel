<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;



Route::get('/legals', [PageController::class, 'legals'])->name('legals');

Route::get('/about_us', [PageController::class, 'about_us'])->name('about_us');

Route::get('/', [PageController::class, 'articles'])->name('articles');



Route::middleware('auth')->group(function () {
    // returns the home page with all posts
    Route::get('/dashboard', PostController::class . '@index')->name('dashboard');
    // returns the form for adding a post
    Route::get('/dashboard/post-create', PostController::class . '@create')->name('dashboard.create');
    // adds a post to the database
    Route::post('/dashboard/post-create', PostController::class . '@store')->name('dashboard.store');
    // returns a page that shows a full post
    Route::get('/dashboard/post/{id}', PostController::class . '@show')->name('dashboard.show');
    // returns the form for editing a post
    Route::get('/dashboard/post/{id}/edit', PostController::class . '@edit')->name('dashboard.edit');
    // updates a post
    Route::put('/dashboard/post/{id}/edit', PostController::class . '@update')->name('dashboard.update');
    // deletes a post
    Route::delete('/dashboard/post/{id}', PostController::class . '@destroy')->name('dashboard.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
