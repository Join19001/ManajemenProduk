<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Landing');
});

//Auth
Route::get('/masuk', [AuthController::class, 'viewLogin']);
Route::post('/masuk', [AuthController::class, 'postLogin']);
Route::get('/daftar', [AuthController::class, 'viewRegister']);
Route::post('/daftar', [AuthController::class, 'postRegister']);
Route::get('/logout', [AuthController::class, 'logout']);

//App
Route::get('/beranda', [BarangController::class, 'getAll'])->middleware('auth');
Route::post('/beranda/{id}', [PesananController::class,'tambahPesanan']);
Route::get('/keranjang', [PesananController::class, 'keranjang']);
Route::get('/delete-barang/{id}', [PesananController::class, 'deleteKeranjang']);
Route::get('/pembayaran', [PesananController::class, 'pembayaran']);
Route::get('/beranda/selesai', [PesananController::class, 'selesaiBayar']);
Route::get('/pesanan-1', [PesananController::class, 'pesanan1']);
Route::get('/pesanan-2', [PesananController::class, 'pesanan2']);
Route::get('/tawar/{id}', [PesananController::class, 'indexTawar']);
Route::post('/tawar', [PesananController::class, 'tawar']);
Route::post('jumlah/{id}', [PesananController::class, 'updateJumlah']);
Route::get('chat/{id}', [ChatController::class, 'indexChat']);
Route::post('chat/{id}', [ChatController::class, 'chatUser']);


//Admin
Route::get('/user-admin', [UserController::class, 'getAll']);
Route::get('/barang-admin', [BarangController::class, 'getAllAdmin']);
Route::get('/pesan1-admin', [AdminController::class, 'adminPesanan1']);
Route::get('/pesan2-admin', [AdminController::class, 'adminPesanan2']);
Route::get('/tambahBarang', [BarangController::class, 'IndexAdminBarang']);
Route::post('/tambahBarang', [BarangController::class, 'InsertBarang']);
Route::get('/edit/{id}', [BarangController::class, 'indexEdit']);
Route::post('/edit/{id}', [BarangController::class, 'editBarang']);
Route::get('/success/{id}', [AdminController::class, 'success']);
Route::get('/delete/{id}', [AdminController::class, 'delete']);
Route::get('/chatAdmin/{id}', [ChatController::class, 'indexChatAdmin']);
Route::post('/chatAdmin/{id}', [ChatController::class, 'chatAdmin']);

Route::get('/chat', function(){
    return view('chat');
});

Route::get('/topbar', function(){
    return view('layout/topbar');
});