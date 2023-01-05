<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskMingguanController;

Route::group(['middleware' => ['auth']], function(){

// Route Home/Dashboard
Route::get('/home', [HomeController::class, 'index'])->name('home.index');

// Route Pengguna
Route::get('/tampiluser',        [UserController::class, 'index'])->name('user.index');
Route::post('/user',             [UserController::class,'simpanUser'])->name('user.simpanUser');
Route::post('/user/update/{id}', [UserController::class, 'updateUser'])->name('user.updateUser');
Route::get('/user/delete/{id}',  [UserController::class, 'deleteUser'])->name('user.deleteUser');


// Route Pegawai
Route::get('/pegawai',               [PegawaiController::class, 'index'])->name('pegawai.index');
Route::post('/pegawai',              [PegawaiController::class,'simpanPegawai'])->name('pegawai.simpanPegawai');
Route::post('/pegawai/update/{id}',  [PegawaiController::class, 'updatePegawai'])->name('pegawai.updatePegawai');
Route::get('/pegawai/delete/{id}',   [PegawaiController::class, 'deletePegawai'])->name('pegawai.deletePegawai');

// Route Absen
Route::get('/absen',                 [PegawaiController::class, 'absen'])->name('absen.absen');

//task harian
Route::get('/task',                  [PegawaiController::class, 'task'])->name('task.task');
Route::get('/task/tambah',           [PegawaiController::class,'tambahTask'])->name('task.tambahTask');
Route::post('/task',                 [PegawaiController::class,'simpanTask'])->name('task.simpanTask');
Route::post('/task/update/{id}',     [PegawaiController::class, 'updateTask'])->name('task.updateTask');
});


// AUTH
Route::get('/',         [AuthController::class, 'index'])->name('login.index');
Route::post('/login',   [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout',  [AuthController::class, 'logout'])->name('auth.logout');


//Route Profil
Route::group(['middleware' => ['auth']], function() {
Route::get('/profil',               [ProfilController::class, 'index'])->name('profil.index');
Route::get('/profil/create',        [ProfilController::class, 'create'])->name('profil.create');
Route::post('/profil/PUpdate/{id}', [ProfilController::class, 'PUpdate'])->name('PUpdate');
Route::post('crop', [ProfilController::class, 'crop'])->name('crop');
Route::post('change-password',[ProfilController::class,'changePassword'])->name('adminChangePassword');
Route::post('crop',                 [ProfilController::class, 'crop'])->name('crop');
Route::post('change-password',      [ProfilController::class,'changePassword'])->name('adminChangePassword');

});
    
Route::get('/kamera', function(){
    return view('kamera');
});