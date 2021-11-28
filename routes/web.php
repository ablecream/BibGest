<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ManagerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/managers', [ManagerController::class, 'list'])->name('managers');
Route::delete('/managers/{id}', [ManagerController::class, 'destroy'])->name('managers.destroy');
Route::get('/managers/edit/{id}', [ManagerController::class, 'editview'])->name('edit');
Route::post('/managers/edit/{id}', [ManagerController::class, 'edit']);
Route::get('/managers/register', [ManagerController::class, 'index'])->name('register');
Route::post('/managers/register', [ManagerController::class, 'store']);

Route::get('/books', [BookController::class, 'index'])->name('books');

Route::get('/posts', function () {
    return view('posts.index');
});
