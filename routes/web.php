<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPenerbitanController;
use App\Http\Controllers\AdminTranslateController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\SuperAdminController;
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
Route::get('/profil', function(){return view('profil');});
Route::get('/prosedur', function(){return view('prosedur');});
Route::get('/layanan', function(){return view('layanan');});
Route::get('/layanan/Buku', [LayananController::class, 'indexLayananBuku']);
Route::post('/PenerbitanBuku', [LayananController::class, 'insertBuku']);

Route::get('/layanan/Artikel', [LayananController::class, 'indexLayananArtikel']);
Route::post('/PenerbitanArtikel', [LayananController::class, 'insertArtikel']);

Route::get('/layanan/Haki', [LayananController::class, 'indexLayananHaki']);
Route::post('/PenerbitanHaki', [LayananController::class, 'insertHaki']);

Route::get('/layanan/Plagiasi', [LayananController::class, 'indexLayananPlagiasi']);
Route::post('/PengecekanPlagiasi', [LayananController::class, 'insertPlagiasi']);

Route::get('/layanan/Translate', [LayananController::class, 'indexLayananTranslate']);
Route::post('/Translate', [LayananController::class, 'insertTranslate']);

Route::get('/layanan/Pengeditan', [LayananController::class, 'indexLayananPengeditan']);
Route::post('/PengeditanKosakata', [LayananController::class, 'insertPengeditan']);

Route::get('/layanan/Seminar', function(){return view('layananSeminar');});

Route::get('/layanan/Seminar/Peserta', [LayananController::class, 'indexSeminarPeserta']);
Route::post('/PendaftaranSeminarPeserta', [LayananController::class, 'insertPeserta']);

Route::get('/layanan/Seminar/Pemakalah', [LayananController::class, 'indexSeminarPemakalah']);
Route::post('/PendaftaranSeminarPemakalah', [LayananController::class, 'insertPemakalah']);

//Auth
Route::get('/masuk', function(){return view('login');});
Route::post('/masuk', [SuperAdminController::class, 'postLogin']);
Route::get('/logOut', [SuperAdminController::class, 'logout']);

//Admin
Route::get('/superAdmin', [SuperAdminController::class, 'indexSuperAdmin']);
Route::get('/tambahUser', [SuperAdminController::class, 'indexTambahUser']);
Route::post('/tambahUser', [SuperAdminController::class, 'insertUser']);
Route::get('/deleteUser/{id}', [SuperAdminController::class, 'deleteUser']);

//Admin Penerbitan
Route::get('/AdminPenerbitan', [AdminPenerbitanController::class, 'indexAdminPenerbitan']);
Route::get('/downloadBuku/{filename}', [AdminPenerbitanController::class, 'downloadBuku']);
Route::get('/deleteBuku/{id}', [AdminPenerbitanController::class, 'deleteBuku']);

Route::get('/downloadArtikel/{filename}', [AdminPenerbitanController::class, 'downloadArtikel']);
Route::get('/deleteArtikel/{id}', [AdminPenerbitanController::class, 'deleteArtikel']);

Route::get('/downloadHaki/{filename}', [AdminPenerbitanController::class, 'downloadHaki']);
Route::get('/deleteHaki/{id}', [AdminPenerbitanController::class, 'deleteHaki']);


//Admin Translate
Route::get('/AdminTranslate', [AdminTranslateController::class, 'indexAdminTranslate']);
Route::get('/deleteTranslate/{id}', [AdminTranslateController::class, 'deleteTranslate']);
