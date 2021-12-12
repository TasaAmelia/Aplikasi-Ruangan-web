<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\JenisRuanganController;
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

Route::get('/gedungList', [GedungController::class, 'index']);
Route::get('/gedungAdd', [GedungController::class, 'add']);
Route::post('/gedungAdd', [GedungController::class, 'create']);
Route::get('/gedungUpdate/{id}', [GedungController::class, 'showData']);
Route::post('/gedungUpdate', [GedungController::class, 'Update']);
Route::get('/gedungDelete/{id}', [GedungController::class, 'delete']);


Route::get('/jenisruanganList', [JenisRuanganController::class, 'index']);
Route::get('/jenisruanganAdd', [JenisRuanganController::class, 'create']);
Route::post('/jenisruanganAdd', [JenisRuanganController::class, 'store']);
Route::get('/jenisruanganUpdate/{id}', [JenisRuanganController::class, 'edit']);
Route::post('/jenisruanganUpdate', [JenisRuanganController::class, 'update']);
Route::get('/jenisruanganDelete/{id}', [JenisRuanganController::class, 'destroy']);


Route::get('/ruanganList', [RuanganController::class, 'index']);
Route::get('/ruanganAdd', [RuanganController::class, 'create']);
Route::post('/ruanganAdd', [RuanganController::class, 'store']);
Route::get('/ruanganUpdate/{id}', [RuanganController::class, 'edit']);
Route::post('/ruanganUpdate', [RuanganController::class, 'update']);
Route::get('/ruanganDelete/{id}', [RuanganController::class, 'destroy']);


Route::get('/peminjamanList', [PeminjamanController::class, 'list']);
Route::get('/peminjamanAdd', [PeminjamanController::class, 'pinjam']);



Route::get('/', [DashboardController::class, 'read']);

Route::get('/laporan', [LaporanController::class, 'read']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);
// Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register', [RegisterController::class, 'store']);

Route::get('/userAdd', [UserController::class, 'add']);
Route::post('/userAdd', [UserController::class, 'create']);
Route::get('/userList', [UserController::class, 'read']);
// Route::get('/userList', [UserController::class, 'read'])->middleware('superAdmin');
Route::get('/userUpdate/{id}', [UserController::class, 'showData']);
Route::post('/userUpdate', [UserController::class, 'update']);
Route::get('/userDelete/{id}', [UserController::class, 'delete']);
