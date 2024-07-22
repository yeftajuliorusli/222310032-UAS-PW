<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\PertemuanController;
use App\Models\Pertemuan;

Route::get('/', function () {
    return view('user.login');
});

Route::get('/pertemuan', function(Pertemuan $pertemuan){
    return view('layout.students.pertemuan', [
        "data" => $pertemuan->all()
    ]);
})->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Route::get('/presensi/{id}', [PresensiController::class, 'show'])->name('presensi.show')->middleware('auth');

Route::get('editPresensi/{id}', [DashboardController::class, 'editPresensi'])->name('dashboard.editPresensi')->middleware('auth');
Route::post('updatePresensi/{id}', [DashboardController::class, 'updatePresensi'])->name('dashboard.updatePresensi')->middleware('auth');

Route::post('/', [LoginController::class, "postlogin"]);
Route::post('/logout', [LoginController::class, "logout"])->middleware('auth');

Route::get('/qrcode', [QRCodeController::class, 'generateQRCode'])->middleware('auth');
Route::post('/savePresensi', [PresensiController::class, 'savePresensi'])->name('presensi.save')->middleware('auth');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/presensi/{id}', [PresensiController::class, 'showPresensi'])->name('presensi.show')->middleware('auth');
