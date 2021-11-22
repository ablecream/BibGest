<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ManagerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/managers', [ManagerController::class, 'list'])->name('managers');
Route::get('/managers/register', [ManagerController::class, 'index'])->name('register');
Route::post('/managers/register', [ManagerController::class, 'store']);

Route::get('/', function () {
    return view('posts.index');
});
