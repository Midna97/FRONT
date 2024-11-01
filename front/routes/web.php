<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriesController;


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/categories', [CategoriesController::class, 'consulta'])->name('categories');
Route::get('/alimentos',[CategoriesController::class,'pages'])->name('alimentos');

