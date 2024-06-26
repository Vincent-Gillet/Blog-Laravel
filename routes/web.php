<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;


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


Route::group(['middleware' => AdminMiddleware::class],function () {
    // returns the home page with all posts
    Route::get('/dashboard/categories', CategoryController::class . '@index')->name('categories');
    // returns the form for adding a post
    Route::get('/dashboard/category-create', CategoryController::class . '@create')->name('category.create');
    // adds a post to the database
    Route::post('/dashboard/category-create', CategoryController::class . '@store')->name('category.store');
    // returns a page that shows a full post
    Route::get('/dashboard/category/{id}', CategoryController::class . '@show')->name('category.show');
    // returns the form for editing a post
    Route::get('/dashboard/category/{id}/edit', CategoryController::class . '@edit')->name('category.edit');
    // updates a post
    Route::put('/dashboard/category/{id}/edit', CategoryController::class . '@update')->name('category.update');
    // deletes a post
    Route::delete('/dashboard/category/{id}', CategoryController::class . '@destroy')->name('category.destroy');


    // returns the home page with all users
    Route::get('/dashboard/users', UserController::class . '@index')->name('users');
    // returns a page that shows a full user
    Route::get('/dashboard/user/{id}', UserController::class . '@show')->name('user.show');
    // returns the form for editing a user
    Route::get('/dashboard/user/{id}/edit', UserController::class . '@edit')->name('user.edit');
    // updates a user
    Route::put('/dashboard/user/{id}/edit', UserController::class . '@update')->name('user.update');
    // deletes a user
    Route::delete('/dashboard/user/{id}', UserController::class . '@destroy')->name('user.destroy');
});


Route::middleware(['auth', 'admin'])->group(function () {

    // returns the form for adding a user
    // Route::get('/dashboard/user-create', UserController::class . '@create')->name('user.create');
    // // adds a user to the database
    // Route::post('/dashboard/user-create', UserController::class . '@store')->name('user.store');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
