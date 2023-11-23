<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\App\Http\Controllers\PostController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\SuratJalanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DaftarController;

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
    return view('welcome');
})->name('welcome');

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    //route utama
    Route::resource('/posts', \App\Http\Controllers\PostController::class);
    Route::post('/posts/tambah', [\App\Http\Controllers\PostController::class, 'tambah'])->name('posts.tambah');
    Route::get('/posts/{no_keputusan_pengadilan}/cetak_bukti', [\App\Http\Controllers\PostController::class, 'cetak_bukti'])->name('posts.cetak_bukti');

    Route::get('/berita_acara/create/{no_keputusan_pengadilan}', [\App\Http\Controllers\BeritaController::class, 'edit'])->name('berita_acara.edit');
    Route::post('/berita_acara/create/{no_keputusan_pengadilan}', [\App\Http\Controllers\BeritaController::class, 'create'])->name('berita_acara.create');
    Route::get('/berita_acara/cetak', [BeritaController::class, 'cetak'])->name('berita_acara.cetak');

    Route::get('/surat_jalan/create/{no_keputusan_pengadilan}', [\App\Http\Controllers\SuratJalanController::class, 'edit'])->name('surat_jalan.edit');
    Route::post('/surat_jalan/create/{no_keputusan_pengadilan}', [\App\Http\Controllers\SuratJalanController::class, 'create'])->name('surat_jalan.create');
    Route::get('/surat_jalan/cetak', [SuratJalanController::class, 'cetak'])->name('surat_jalan.cetak');

    Route::resource('/warehouse', \App\Http\Controllers\WarehouseController::class);
    Route::resource('/users', \App\Http\Controllers\DaftarController::class);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:operator'])->group(function () {

    //route utama
    Route::resource('/posts', \App\Http\Controllers\PostController::class);
    Route::post('/posts/tambah', [\App\Http\Controllers\PostController::class, 'tambah'])->name('posts.tambah');
    Route::get('/posts/{no_keputusan_pengadilan}/cetak_bukti', [\App\Http\Controllers\PostController::class, 'cetak_bukti'])->name('posts.cetak_bukti');

    Route::get('/berita_acara/create/{no_keputusan_pengadilan}', [\App\Http\Controllers\BeritaController::class, 'edit'])->name('berita_acara.edit');
    Route::post('/berita_acara/create/{no_keputusan_pengadilan}', [\App\Http\Controllers\BeritaController::class, 'create'])->name('berita_acara.create');
    Route::get('/berita_acara/cetak', [BeritaController::class, 'cetak'])->name('berita_acara.cetak');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:gudang'])->group(function () {

    Route::get('/surat_jalan/create/{no_keputusan_pengadilan}', [\App\Http\Controllers\SuratJalanController::class, 'edit'])->name('surat_jalan.edit');
    Route::post('/surat_jalan/create/{no_keputusan_pengadilan}', [\App\Http\Controllers\SuratJalanController::class, 'create'])->name('surat_jalan.create');
    Route::get('/surat_jalan/cetak', [SuratJalanController::class, 'cetak'])->name('surat_jalan.cetak');

    Route::resource('/warehouse', \App\Http\Controllers\WarehouseController::class);
    Route::resource('/users', \App\Http\Controllers\DaftarController::class);
});



// //route utama
// Route::resource('/posts', \App\Http\Controllers\PostController::class);
// Route::post('/posts/tambah', [\App\Http\Controllers\PostController::class, 'tambah'])->name('posts.tambah');
// Route::get('/posts/{no_keputusan_pengadilan}/cetak_bukti', [\App\Http\Controllers\PostController::class, 'cetak_bukti'])->name('posts.cetak_bukti');

// Route::get('/berita_acara/create/{no_keputusan_pengadilan}', [\App\Http\Controllers\BeritaController::class, 'edit'])->name('berita_acara.edit');
// Route::post('/berita_acara/create/{no_keputusan_pengadilan}', [\App\Http\Controllers\BeritaController::class, 'create'])->name('berita_acara.create');
// Route::get('/berita_acara/cetak', [BeritaController::class, 'cetak'])->name('berita_acara.cetak');

// Route::get('/surat_jalan/create/{no_keputusan_pengadilan}', [\App\Http\Controllers\SuratJalanController::class, 'edit'])->name('surat_jalan.edit');
// Route::post('/surat_jalan/create/{no_keputusan_pengadilan}', [\App\Http\Controllers\SuratJalanController::class, 'create'])->name('surat_jalan.create');
// Route::get('/surat_jalan/cetak', [SuratJalanController::class, 'cetak'])->name('surat_jalan.cetak');

// Route::resource('/warehouse', \App\Http\Controllers\WarehouseController::class);
// Route::resource('/users', \App\Http\Controllers\DaftarController::class);
