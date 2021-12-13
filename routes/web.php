<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ManagerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ChartJsController;

Route::get('/', [BookController::class, 'listguest'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/user/{username}', [ManagerController::class, 'profil'])->name('user');

Route::get('cat/{label}', [BookController::class, 'listbyCat'])->name('bycats');

Route::get('book/{id}', [BookController::class, 'singlebook'])->name('book');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);



Route::get('/managers', [ManagerController::class, 'list'])->name('managers');
Route::delete('/managers/{id}', [ManagerController::class, 'destroy'])->name('managers.destroy');
Route::get('/managers/edit/{id}', [ManagerController::class, 'editview'])->name('managers.edit');
Route::post('/managers/edit/{id}', [ManagerController::class, 'edit']);
Route::get('/managers/register', [ManagerController::class, 'index'])->name('register');
Route::post('/managers/register', [ManagerController::class, 'store']);

Route::get('/books', [BookController::class, 'list'])->name('books');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
Route::get('/books/add', [BookController::class, 'index'])->name('addbook');
Route::post('/books/add', [BookController::class, 'store']);
Route::get('/books/edit/{id}', [BookController::class, 'editview'])->name('books.edit');
Route::post('/books/edit/{id}', [BookController::class, 'edit']);
Route::get('/search', [BookController::class, 'search'])->name('search');

Route::get('/categories', [CategoryController::class, 'list'])->name('cats');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('cats.destroy');
Route::get('/categories/add', [CategoryController::class, 'index'])->name('addcat');
Route::post('/categories/add', [CategoryController::class, 'store']);
Route::get('/categories/edit/{id}', [CategoryController::class, 'editview'])->name('cats.edit');
Route::post('/categories/edit/{id}', [CategoryController::class, 'edit']);

Route::get('/clients', [ClientController::class, 'list'])->name('clients');
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::get('/clients/add', [ClientController::class, 'index'])->name('addclient');
Route::post('/clients/add', [ClientController::class, 'store']);
Route::get('/clients/edit/{id}', [ClientController::class, 'editview'])->name('clients.edit');
Route::post('/clients/eidt/{id}', [CategoryController::class, 'edit']);


Route::get('/tags', [TagController::class, 'list'])->name('tags');
Route::delete('/tags/{id}', [TagController::class, 'destroy'])->name('tags.destroy');
Route::get('/tags/add', [TagController::class, 'index'])->name('addtag');
Route::post('/tags/add', [TagController::class, 'store']);
Route::get('/tags/edit/{id}', [TagController::class, 'editview'])->name('tags.edit');
Route::post('/tags/edit/{id}', [TagController::class, 'edit']);


