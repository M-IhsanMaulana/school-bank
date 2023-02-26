<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
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
    Route::get('/admin/setor-tunai', [AdminController::class, 'transaksiView'])->name('admin.transaksi-setor');
    Route::get('/admin/tarik-tunai', [AdminController::class, 'tarikTunaiView'])->name('admin.transaksi-tarik');
    Route::get('/admin/data-rekening/detail/{id}', [AdminController::class, 'detailRek'])->name('admin.detail-rekening');
    Route::post('/admin/data-rekening/detail/post/{id}', [AdminController::class, 'updateStatus'])->name('admin.detail-rekening.post');
    Route::post('/admin/data-kelas/create', [AdminController::class, 'createKelas'])->name('admin.data-kelas.create');
    Route::post('/admin/data-user/add', [AdminController::class, 'createUser'])->name('admin.data-user.create');
    Route::get('/admin/getrekening/{rek}', [TransaksiController::class, 'getDataRekening'])->name('admin.getdataRekening');
    Route::post('/admin/transaksi/add/setor-tunai', [TransaksiController::class, 'setorTunai'])->name('admin.transaksi.setor');
    Route::post('/admin/transaksi/add/tarik-tunai', [TransaksiController::class, 'tarikTunai'])->name('admin.transaksi.tarik');
    //Tipe Delete
    Route::delete('/admin/data-kelas/delete/{id}', [AdminController::class, 'deleteKelas'])->name('admin.data-kelas.delete');
    Route::delete('/admin/data-user/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.data-user.delete');
});

Route::middleware(['auth', 'user-access:user'])->group(function () {
    //Tipe Get
    Route::get('/home', [HomeController::class, 'index'])->name('user.home');
    Route::get('/user/my-rekening', [UserController::class, 'myrek'])->name('user.my-rek');
    Route::get('/user/buat-rekening/step-1', [RekeningController::class, 'createStepone'])->name('user.create-step-1');
    Route::post('/user/buat-rekening/step-1/post', [RekeningController::class, 'postCreateStepOne'])->name('user.create-step-1.post');
    Route::get('/user/buat-rekening/step-2', [RekeningController::class, 'createSteptwo'])->name('user.create-step-2');
    Route::post('/user/buat-rekening/step-2/post', [RekeningController::class, 'postCreateStepTwo'])->name('user.create-step-2.post');
    Route::get('/user/buat-rekening/step-confirm', [RekeningController::class, 'createStepconfirmation'])->name('user.create-confirmation');
    Route::post('/user/buat-rekening/create', [RekeningController::class, 'postcreateRekening'])->name('user.create-rekening.post');

});
