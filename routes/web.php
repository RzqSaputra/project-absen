<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskMingguanController;

Route::group(['middleware' => ['auth']], function(){
// Route Pengguna
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
Route::get('/pengguna/tambah', [homeController::class,'tambahPengguna'])->name('pengguna.tambahPengguna');
Route::get('/pengguna/tambah', [PenggunaController::class,'tambahPengguna'])->name('pengguna.tambahPengguna');
Route::post('/pengguna', [PenggunaController::class,'simpanPengguna'])->name('pengguna.simpanPengguna');
Route::get('/pengguna/ubah/{id}', [PenggunaController::class, 'ubahPengguna'])->name('pengguna.ubahPengguna');
Route::post('/pengguna/update/{id}', [PenggunaController::class, 'updatePengguna'])->name('pengguna.updatePengguna');
Route::get('/pengguna/delete/{id}', [PenggunaController::class, 'deletePengguna'])->name('pengguna.deletePengguna');


// Route Pegawai
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::get('/pegawai/tambah', [PegawaiController::class,'tambahPegawai'])->name('pegawai.tambahPegawai');
Route::post('/pegawai', [PegawaiController::class,'simpanPegawai'])->name('pegawai.simpanPegawai');
Route::get('/pegawai/ubah/{id}', [PegawaiController::class, 'ubahPegawai'])->name('pegawai.ubahPegawai');
Route::post('/pegawai/update/{id}', [PegawaiController::class, 'updatePegawai'])->name('pegawai.updatePegawai');
Route::get('/pegawai/delete/{id}', [PegawaiController::class, 'destroy']);

// Route Absen
Route::get('/absen', [PegawaiController::class, 'absen'])->name('absen.absen');
//task harian
Route::get('/task', [PegawaiController::class, 'task'])->name('task.task');
Route::get('/task/tambah', [PegawaiController::class,'tambahTask'])->name('task.tambahTask');
Route::post('/task', [PegawaiController::class,'simpanTask'])->name('task.simpanTask');
Route::post('/task/update/{id}', [PegawaiController::class, 'updateTask'])->name('task.updateTask');
// Route::get('/task/delete/{id}', [PegawaiController::class, 'taskDestroy']);

//task mingguan
// Route::get('/taskMingguan', [TaskMingguanController::class,'taskMingguan'])->name('TaskMingguan.taskMingguan');
// Route::get('/taskMingguan/tambah', [TaskMingguanController::class,'tambahTaskMingguan'])->name('TaskMingguan.tambahTaskMingguan');
// Route::post('/taskMingguan', [TaskMingguanController::class,'simpanTaskMingguan'])->name('TaskMingguan.simpanTaskMingguan');
// Route::post('/taskMingguan/update/{id}', [TaskMingguanController::class, 'updateTaskMingguan'])->name('TaskMingguan.updateTaskMingguan');

});


// AUTH
Route::get('/', [AuthController::class, 'index'])->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');


//Route Profil
Route::group(['middleware' => ['auth']], function() {
Route::get('/profil', [ProfilController::class, 'index']);
Route::get('/profil/create', [ProfilController::class, 'create'])->name('profil.create');
Route::post('/profil/PUpdate/{id}', [ProfilController::class, 'PUpdate'])->name('PUpdate');
});