<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//Auth Routes list
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register/save', [RegisterController::class, 'store_register'])->name('register.action');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login/auth', [LoginController::class, 'login_action'])->name('login.action');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Admin Routes list
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    //Tipe Get
    Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/data-user', [AdminController::class, 'dataUser'])->name('admin.data-user');
    Route::get('/admin/data-kelas', [AdminController::class, 'dataKelas'])->name('admin.data-kelas');
    Route::get('/admin/data-rekening', [AdminController::class, 'dataRekening'])->name('admin.data-rekening');
    Route::get('/admin/data-transaksi', [AdminController::class, 'dataTransaksi'])->name('admin.data-transaksi');
    Route::get('/admin/transaksi', [AdminController::class, 'transaksiView'])->name('admin.transaksi');
    Route::post('/admin/data-kelas/create', [AdminController::class, 'createKelas'])->name('admin.data-kelas.create');
    Route::post('/admin/data-user/add', [AdminController::class, 'createUser'])->name('admin.data-user.create');
    Route::get('/admin/getrekening/{rek}', [TransaksiController::class, 'getDataRekening'])->name('admin.getdataRekening');
    Route::post('/admin/transaksi/add/setor-tunai', [TransaksiController::class, 'setorTunai'])->name('admin.transaksi.setor');
    //Tipe Delete
    Route::delete('/admin/data-kelas/delete/{id}', [AdminController::class, 'deleteKelas'])->name('admin.data-kelas.delete');
});

Route::middleware(['auth', 'user-access:user'])->group(function () {
    //Tipe Get
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
