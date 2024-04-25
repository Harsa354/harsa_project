<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TitipanController;
use App\Http\Controllers\TransaksiController;
use App\Models\Meja;
use App\Models\Pelanggan;
use App\Models\Transaksi;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/isi', [HomeController::class, 'where']);

// CRUD --------------------------------------------------------------
Route::resource('/kategori', KategoriController::class);
Route::get('/kategori/export/excel', [KategoriController::class, 'export']);
Route::post('/kategori/import', [KategoriController::class, 'import'])->name('import_kategori');

Route::resource('/jenis', JenisController::class);
Route::get('/jenis/export/excel', [JenisController::class, 'export']);
Route::post('/jenis/import', [JenisController::class, 'import'])->name('import_jenis');


Route::resource('/menu', MenuController::class);
Route::get('/menu/export/excel', [MenuController::class, 'export']);
Route::post('/menu/import', [MenuController::class, 'import'])->name('import_menu');


Route::resource('/stok', StokController::class);
Route::get('/stok/export/excel', [StokController::class, 'export']);
Route::post('/stok/import', [StokController::class, 'import'])->name('import_stok');


Route::resource('/meja', MejaController::class);
Route::get('/meja/export/excel', [MejaController::class, 'export']);
Route::post('/meja/import', [MejaController::class, 'import'])->name('import_meja');


Route::resource('/pelanggan', PelangganController::class);
Route::get('/pelanggan/export/excel', [PelangganController::class, 'export']);
Route::post('/pelanggan/import', [PelangganController::class, 'import'])->name('import_pelanggan');

// Titipan
Route::resource('/titipan', TitipanController::class);
Route::get('/titipan/export/excel', [TitipanController::class, 'export']);
Route::post('/titipan/import', [TitipanController::class, 'import'])->name('import_titipan');


// Transaction -------------------------------------------------------
Route::resource('/pemesanan', PemesananController::class);
Route::resource('/transaksi', TransaksiController::class);
Route::get('nota/{nofaktur}', [TransaksiController::class, 'faktur']);

