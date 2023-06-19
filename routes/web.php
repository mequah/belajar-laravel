<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


//untuk memangil halaman awal
//usahakan name route berbeda

// Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::post('/post-login', [LoginController::class, 'postLogin'])->name('post-login');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/saveregister', [HomeController::class, 'saveregister'])->name('saveregister');

Route::post('/simpan-registrasi', [LoginController::class, 'simpanRegistrasi'])->name('simpan-registrasi'); //simpan ke database

Route::group(['middleware' => ['auth']], function () { //bisa diatur untuk kategori tertentu
  Route::get('/', function () {
    return view('home');
  });
});