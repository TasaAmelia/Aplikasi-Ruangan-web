<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\JruanganController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [GedungController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'read']);

Route::get('/jenisruanganList', [JruanganController::class, 'read']);

Route::get('/ruanganList', [RuanganController::class, 'read']);

Route::get('/laporan', [LaporanController::class, 'read']);


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/changePass', [LoginController::class, 'show']);
// Route::post('/changePass', [LoginController::class, 'changePassword']);

Route::get('/userAdd', [UserController::class, 'add']);
Route::post('/userAdd', [UserController::class, 'create']);

Route::get('/userList', [UserController::class, 'read']);
// Route::get('/userList', [UserController::class, 'read'])->middleware('superAdmin');

Route::get('/userUpdate/{id}', [UserController::class, 'showData']);
Route::post('/userUpdate', [UserController::class, 'update']);

Route::get('/userDelete/{id}', [UserController::class, 'delete']);
