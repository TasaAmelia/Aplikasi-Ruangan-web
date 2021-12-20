<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\JruanganController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Models\RoomType;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RentalController;
use App\Models\Rental;

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
Route::get('/gedungAddForm', [GedungController::class, 'add']);
Route::post('/gedungAdd', [GedungController::class, 'create']);
Route::get('/gedungDelete/{id}', [GedungController::class, 'delete']);
Route::post('/gedungUpdate', [GedungController::class, 'update']);
Route::get('/gedungUpdateForm/{id}', [GedungController::class, 'showData']);

Route::get('/', [DashboardController::class, 'read']);

Route::get('/jenisruanganList', [RoomTypeController::class, 'index']);
Route::get('/jenisruanganAddForm', [RoomTypeController::class, 'create']);
Route::post('/jenisruanganAdd', [RoomTypeController::class, 'store']);
Route::get('/jenisruanganDelete/{id}', [RoomTypeController::class, 'destroy']);
Route::get('/jenisruanganUpdateForm/{id}', [RoomTypeController::class, 'edit']);
Route::post('/jenisruanganUpdate', [RoomTypeController::class, 'update']);

Route::get('/ruanganList', [RoomController::class, 'index']);
Route::get('/ruanganAddFrom', [RoomController::class, 'create']);
Route::post('/ruanganAdd', [RoomController::class, 'store']);
Route::get('/ruanganDelete/{id}', [RoomController::class, 'destroy']);
Route::get('/ruanganUpdateForm/{id}', [RoomController::class, 'edit']);
Route::post('/ruanganUpdate', [RoomController::class, 'update']);

Route::get('/peminjamanList', [RentalController::class, 'index']);
Route::get('/peminjamanAddForm', [RentalController::class, 'create']);
Route::post('/peminjamanAdd', [RentalController::class, 'store']);
Route::get('/peminjamanDelete/{id}', [RentalController::class, 'destroy']);
Route::get('/peminjamanUpdateForm/{id}', [RentalController::class, 'edit']);
Route::post('/peminjamanUpdate', [RentalController::class, 'update']);

Route::get('/laporan', [LaporanController::class, 'read']);


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/userAdd', [UserController::class, 'add']);
Route::post('/userAdd', [UserController::class, 'create']);
Route::get('/userList', [UserController::class, 'read']);
Route::get('/userUpdate/{id}', [UserController::class, 'showData']);
Route::post('/userUpdate', [UserController::class, 'update']);
Route::get('/userDelete/{id}', [UserController::class, 'delete']);
