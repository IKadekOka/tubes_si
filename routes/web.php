<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;   
use App\Http\Controllers\barangsController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardCustomerController;
use App\Http\Controllers\DashboardSupirController;
use App\Http\Controllers\gudangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\jadwalController;
use App\Http\Controllers\kendaraanController;
use App\Http\Controllers\outletController;
use App\Http\Controllers\pemesananController;
use App\Http\Controllers\pengirimanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\supirController;
use App\Models\kategori_barang;

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

// Route::get('/', function () {
//     return view('login');
// });


Route::group(['middleware' => ['is_admin']], function () {
    route::get('/dashboard-admin', [DashboardAdminController::class, 'index'])->name('dashboard-admin');

    Route::get('/kategori',[categoryController::class,'index'])->name('Kategori.kategori');
    Route::get('/create-kategori',[categoryController::class,'create'])->name('kategori.create-kategori');
    Route::post('/store-kategori',[categoryController::class,'store'])->name('Kategori.store-kategori');
    Route::post('/update-kategori{id}',[categoryController::class,'update'])->name('Kategori.update-kategori');
    Route::get('/edit-kategori{id}',[categoryController::class,'edit'])->name('Kategori.edit-kategori');
    Route::get('/delete-kategori{id}',[categoryController::class,'destroy'])->name('Kategori.delete');
    Route::get('/laporan-kategori',[categoryController::class,'cetak'])->name('kategori.cetak');

    Route::get('/barang',[barangsController::class,'index'])->name('Barang.barang');
    Route::get('/create-barang',[barangsController::class,'create'])->name('Barang.create-barang');
    Route::post('/store-barang',[barangsController::class,'store'])->name('Barang.store-barang');
    Route::post('/update-barang{id}',[barangsController::class,'update'])->name('Barang.update-barang');
    Route::get('/edit-barang/{id}',[barangsController::class,'edit'])->name('Barang.edit-barang');
    Route::get('/delete-barang/{id}',[barangsController::class,'destroy'])->name('Barang.delete');
    Route::get('/laporan-barang',[barangsController::class,'cetak'])->name('Barang.cetak');

    Route::get('/gudang',[gudangController::class,'index'])->name('Gudang.gudang');
    Route::get('/create-gudang',[gudangController::class,'create'])->name('Gudang.create-gudang');
    Route::post('/store-gudang',[gudangController::class,'store'])->name('Gudang.store-gudang');
    Route::post('/update-gudang{id}',[gudangController::class,'update'])->name('Gudang.update-gudang');
    Route::get('/edit-gudang{id}',[gudangController::class,'edit'])->name('Gudang.edit-gudang');
    Route::get('/delete-gudang{id}',[gudangController::class,'destroy'])->name('Gudang.delete');
    Route::get('/laporan-gudang',[gudangController::class,'cetak'])->name('Gudang.cetak');

    Route::get('/role',[RoleController::class,'index'])->name('role.index');
    Route::get('/create-role',[RoleController ::class,'create'])->name('role.create-role');
    Route::post('/store-role',[RoleController ::class,'store'])->name('role.store-role');
    Route::post('/update-role{id}',[RoleController::class,'update'])->name('role.update-role');
    Route::get('/edit-role{id}',[RoleControlle::class,'edit'])->name('role.edit-role');
    Route::get('/delete-role{id}',[RoleController ::class,'destroy'])->name('role.delete');
});

Route::group(['middleware' => ['is_customer']], function () {
    route::get('/dashboard-customer', [DashboardCustomerController::class, 'index'])->name('dashboard-customer');

    Route::get('/outlet',[outletController::class,'index'])->name('Outlet.outlet');
    Route::get('/create-outlet',[outletController::class,'create'])->name('Outlet.create-outlet');
    Route::post('/store-outlet',[outletController::class,'store'])->name('Outlet.store-outlet');
    Route::post('/update-outlet{id}',[outletController::class,'update'])->name('Outlet.update-outlet');
    Route::get('/edit-outlet{id}',[outletController::class,'edit'])->name('Outlet.edit-outlet');
    Route::get('/delete-outlet{id}',[outletController::class,'destroy'])->name('Outlet.delete');

    Route::get('/pemesanan',[pemesananController::class,'index'])->name('Pemesanan.pemesanan');
    Route::get('/create-pemesanan',[pemesananController::class,'create'])->name('Pemesanan.create-pemesanan');
    Route::post('/store-pemesanan',[pemesananController::class,'store'])->name('Pemesanan.store-pemesanan');
    Route::post('/update-pemesanan{id}',[pemesananController::class,'update'])->name('Pemesanan.update-pemesanan');
    Route::get('/edit-pemesanan{id}',[pemesananController::class,'edit'])->name('Pemesanan.edit-pemesanan');
    Route::get('/delete-pemesanan{id}',[pemesananController::class,'destroy'])->name('Pemesanan.delete');
    Route::get('/laporan',[pemesananController::class,'cetak'])->name('Pemesanan.cetak');
});


Route::group(['middleware' => ['is_supir']], function () {
    route::get('/dashboard-supir', [DashboardSupirController::class, 'index'])->name('dashboard-supir');

    Route::get('/pengiriman',[pengirimanController::class,'index'])->name('Pengiriman.pengirim');
    Route::get('/create-pengiriman',[pengirimanController::class,'create'])->name('Pengiriman.create-pengiriman');
    Route::post('/store-pengiriman',[pengirimanController::class,'store'])->name('Pengiriman.store-pengiriman');
    Route::post('/update-pengiriman{id}',[pengirimanController::class,'update'])->name('Pengiriman.update-pengiriman');
    Route::get('/edit-pengiriman{id}',[pengirimanController::class,'edit'])->name('Pengiriman.edit-pengiriman');
    Route::get('/delete-pengiriman{id}',[pengirimanController::class,'destroy'])->name('Pengiriman.delete');
    
    Route::get('/jadwal',[jadwalController::class,'index'])->name('Jadwal.jadwal');
    Route::get('/create-jadwal',[jadwalController::class,'create'])->name('Jadwal.create-jadwal');
    Route::post('/store-jadwal',[jadwalController::class,'store'])->name('Jadwal.store-jadwal');
    Route::post('/update-jadwal{id}',[jadwalController::class,'update'])->name('Jadwal.update-jadwal');
    Route::get('/edit-jadwal{id}',[jadwalController::class,'edit'])->name('Jadwal.edit-jadwal');
    Route::get('/delete-jadwal{id}',[jadwalController::class,'destroy'])->name('Jadwal.delete');
    
    Route::get('/kendaraan',[kendaraanController::class,'index'])->name('Kendaraan.kendaraan');
    Route::get('/create-kendaraan',[kendaraanController::class,'create'])->name('Kendaraan.create-kendaraan');
    Route::post('/store-kendaraan',[kendaraanController::class,'store'])->name('Kendaraan.store-kendaraan');
    Route::post('/update-kendaraan{id}',[kendaraanController::class,'update'])->name('Kendaraan.update-kendaraan');
    Route::get('/edit-kendaraan{id}',[kendaraanController::class,'edit'])->name('Kendaraan.edit-kendaraan');
    Route::get('/delete-kendaraan{id}',[kendaraanController::class,'destroy'])->name('Kendaraan.delete');
    Route::get('/Laporan',[kendaraanController::class,'cetak'])->name('Kendaraan.cetak');
    
    Route::get('/supir',[supirController::class,'index'])->name('Supir.supir');
    Route::get('/create-supir',[supirController::class,'create'])->name('Supir.create-supir');
    Route::post('/store-supir',[supirController::class,'store'])->name('Supir.store-supir');
    Route::post('/update-supir{id}',[supirController::class,'update'])->name('Supir.update-supir');
    Route::get('/edit-supir{id}',[supirController::class,'edit'])->name('Supir.edit-supir');
    Route::get('/delete-supir{id}',[supirController::class,'destroy'])->name('Supir.delete');
    Route::get('/laporan-supir',[supirController::class,'cetak'])->name('Supir.cetak');
});



route::get('/login',[AuthController::class, 'index'])->name('login');

route::get('/register',[AuthController::class, 'register'])->name('register');
route::post('/register-proses',[AuthController::class, 'prosesRegister'])->name('register.proses');
route::post('/login-proses',[AuthController::class, 'login'])->name('login.proses');
route::get('/logout',[AuthController::class, 'logout'])->name('logout');