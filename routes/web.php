<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/loginAdmin', [LoginController::class, 'loginAdmin'])->name('LoginAdmin');
Route::post('/userWarga', [UserController::class, 'wargaStore'])
    ->name('warga.store');


Route::middleware(['auth', 'user-access:warga'])->group(function () {
    Route::get('/warga/home', [HomeController::class, 'homeWarga'])->name('warga.home');
    Route::get('/pengaduanWarga/create', [PengaduanController::class, 'pengaduanWargaCreate'])
        ->name('pengaduanWarga.create');
    Route::get('/pengaduanWarga/{pengaduanWarga}', [PengaduanController::class, 'pengaduanWargaShow'])
        ->name('pengaduanWarga.show');
    Route::get('/pengaduanWarga/{pengaduanWarga}/edit', [PengaduanController::class, 'pengaduanWargaEdit'])
        ->name('pengaduanWarga.edit');
    Route::delete('/pengaduanWarga/{pengaduanWarga}', [PengaduanController::class, 'pengaduanWargaDestroy'])
        ->name('pengaduanWarga.destroy');
    Route::post('/pengaduanWarga', [PengaduanController::class, 'pengaduanWargaStore'])
        ->name('pengaduanWarga.store');
    Route::get('/warga/edit', [UserController::class, 'wargaEdit'])
        ->name('warga.edit');
    Route::patch('/user/{user}', [UserController::class, 'wargaUpdate'])
        ->name('warga.updateWarga');
    Route::get('/wargas/{warga}', [UserController::class, 'wargaShow'])
        ->name('wargas.show');
});

Route::middleware(['auth', 'user-access:admin,staff'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'homeAdmin'])->name('admin.home');

    Route::resource('pengaduans', PengaduanController::class);
    Route::get('/admin/listBaru', [PengaduanController::class, 'listBaru'])->name('pengaduans.listBaru');
    Route::get('/admin/listProses', [PengaduanController::class, 'listProses'])->name('pengaduans.listProses');
    Route::get('/admin/listSelesai', [PengaduanController::class, 'listSelesai'])->name('pengaduans.listSelesai');
    Route::patch('/pengaduans/{pengaduan}/updateStatus', [PengaduanController::class, 'updateStatus'])
        ->name('pengaduans.updateStatus');
    Route::post('/pengaduans/{pengaduan}/createTanggapan', [PengaduanController::class, 'createTanggapan'])
        ->name('pengaduans.createTanggapan');
    Route::patch('/pengaduans/{pengaduan}/updateTanggapan', [PengaduanController::class, 'updateTanggapan'])
        ->name('pengaduans.updateTanggapan');

    Route::get('/admin/listWarga', [UserController::class, 'listWarga'])->name('users.listWarga');
    Route::get('/admin/listStaff', [UserController::class, 'listStaff'])->name('users.listStaff');
    Route::get('/admin/listAdmin', [UserController::class, 'listAdmin'])->name('users.listAdmin');

    Route::get('/users', [UserController::class, 'index'])
        ->name('users.index');

    Route::get('/users/create', [UserController::class, 'create'])
        ->name('users.create');

    Route::post('/users', [UserController::class, 'store'])
        ->name('users.store');

    Route::get('/users/{user}', [UserController::class, 'show'])
        ->name('users.show');

    Route::get('/users/{user}/edit', [UserController::class, 'edit'])
        ->name('users.edit');

    Route::patch('/users/{user}', [UserController::class, 'update'])
        ->name('users.update');

    Route::delete('/user/{user}', [UserController::class, 'destroy'])
        ->name('users.destroy');


    Route::patch('/users/{user}/updateRole', [UserController::class, 'updateRole'])
        ->name('users.updateRole');

    Route::resource('kategoris', KategoriController::class);
});
