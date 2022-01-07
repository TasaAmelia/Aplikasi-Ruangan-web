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
use App\Http\Controllers\DashboardRentalController;
use App\Http\Controllers\RentalController;
use App\Models\Rental;
use GuzzleHttp\Middleware;

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

Route::get('/', [DashboardController::class, 'read'])->middleware('auth');

Route::resource('gedung', GedungController::class)->middleware('mix');

Route::resource('roomtype', RoomTypeController::class)->middleware('mix');

Route::resource('ruangan', RoomController::class)->middleware('mix');

Route::resource('user', UserController::class)->middleware('mix');

Route::resource('rental', DashboardRentalController::class)->middleware('mix');
Route::resource('rents', RentalController::class)->middleware('user');
Route::get('getRoom/{id}', function ($id) {
    $room = App\Models\Room::where('building_id',$id)->get();
    return response()->json($room);
});

Route::get('/laporan', [LaporanController::class, 'read']);


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);