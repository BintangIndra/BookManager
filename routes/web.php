<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('books')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\BookController::class, 'index'])->name('books.index');
    Route::get('/create', [App\Http\Controllers\BookController::class, 'create'])->name('books.create');
    Route::post('/', [App\Http\Controllers\BookController::class, 'store'])->name('books.store');
    Route::get('/{book}', [App\Http\Controllers\BookController::class, 'show'])->name('books.show');
    Route::get('/{book}/edit', [App\Http\Controllers\BookController::class, 'edit'])->name('books.edit');
    Route::put('/{book}', [App\Http\Controllers\BookController::class, 'update'])->name('books.update');
    Route::delete('/{book}', [App\Http\Controllers\BookController::class, 'destroy'])->name('books.destroy');
});

Route::prefix('authors')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\AuthorController::class, 'index'])->name('authors.index');
    Route::get('/create', [App\Http\Controllers\AuthorController::class, 'create'])->name('authors.create');
    Route::post('/', [App\Http\Controllers\AuthorController::class, 'store'])->name('authors.store');
    Route::get('/{author}', [App\Http\Controllers\AuthorController::class, 'show'])->name('authors.show');
    Route::get('/{author}/edit', [App\Http\Controllers\AuthorController::class, 'edit'])->name('authors.edit');
    Route::put('/{author}', [App\Http\Controllers\AuthorController::class, 'update'])->name('authors.update');
    Route::delete('/{author}', [App\Http\Controllers\AuthorController::class, 'destroy'])->name('authors.destroy');
});

Route::prefix('admin/users')->middleware('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('admin.users.index');
    Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('admin.users.create');
    Route::post('/', [App\Http\Controllers\UserController::class, 'store'])->name('admin.users.store');
    Route::get('/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('admin.users.show');
    Route::get('/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('admin.users.destroy');
});