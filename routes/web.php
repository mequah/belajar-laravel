<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

//untuk memangil halaman awal
//usahakan name route berbeda

// Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::post('/post-login', [LoginController::class, 'postLogin'])->name('post-login');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/data-pengguna', [UserController::class, 'user'])->name('data-pengguna');

// Route::get('/saveregister', [HomeController::class, 'saveregister'])->name('saveregister');

Route::post('/simpan-registrasi', [LoginController::class, 'simpanRegistrasi'])->name('simpan-registrasi'); //simpan ke database

Route::group(['middleware' => ['auth']], function () { //bisa diatur untuk kategori tertentu
  Route::get('/', function () {
    return view('home');
  });
  Route::get('/data-pengguna',[UserController::class, 'index'])->name('data-pengguna');
  Route::get('/hapus-pengguna/{id}',[UserController::class, 'hapusPengguna']);
  Route::get('/show-pengguna/{id}',[UserController::class, 'show']);
  Route::get('/ubah-pengguna/{id}',[UserController::class, 'ubahPengguna']);
  Route::post('/simpan-ubah-pengguna/{id}',[UserController::class, 'simpanUbahPengguna']);
});