<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\ExportContoller;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\PeminjamsController;




// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['middleware' => 'isGuest'])->group(function () {
    Route::get('/login', [ViewController::class, 'login']);
    Route::post('/login/auth', [AuthController::class, 'auth'])->name('auth');
});

Route::middleware(['middleware' => 'isLogin'])->group(function () {
    Route::get('/dashboard', [ViewController::class, 'layout']);

    Route::get('/data-user', [ViewController::class, 'dataPengguna']);
    Route::get('/create-user', [ViewController::class, 'createUser']);
    Route::post('/create-user/store', [AuthController::class, 'store'])->name('createuser');
    Route::get('/data-user/{id}/edit-user', [AuthController::class, 'edit'])->name('edit-user');
    Route::patch('/update-user/{id}/store', [AuthController::class, 'update'])->name('update-user');
    Route::delete('/delete/{id}', [AuthController::class, 'destroy'])->name('delete-user');

    Route::get('/kategori-buku', [ViewController::class, 'kategoriBuku']);
    Route::get('create-kategori', [ViewController::class, 'createKategori']);
    Route::post('/kategori-buku/store', [KategoriController::class, 'store'])->name('createkategori');
    Route::get('kategori-buku/{id_category}/edit-kategori', [KategoriController::class, 'edit'])->name('edit-kategori');
    Route::patch('/update-kategori/{id_category}/store', [KategoriController::class, 'update'])->name('update-kategori');
    Route::delete('/delete/{id_category}', [KategoriController::class, 'destroy'])->name('deletekategori');

    Route::get('/pendataan-buku', [ViewController::class, 'buku']);
    Route::get('/create-buku', [ViewController::class, 'createBuku']);
    Route::post('/create-buku/store', [BukuController::class, 'store'])->name('create-buku');
    Route::get('/edit-buku/{id}', [BukuController::class, 'edit'])->name('edit-buku');
    Route::patch('/update-buku/{id}', [BukuController::class, 'update'])->name('update-buku');
    Route::get('/delete-buku', [BukuController::class, 'destroy'])->name('delete-buku');

    Route::get('/data-peminjaman-buku', [ViewController::class, 'dataPeminjaman']);
    Route::get('koleksi-buku', [ViewController::class, 'koleksiBuku'])->name('koleksi-buku');
    Route::delete('delete-koleksi-buku/{id}', [KoleksiController::class, 'destroy'])->name('delete-koleksi-buku');

    Route::post('/auth-peminjaman-buku', [PeminjamsController::class, 'store'])->name('auth-peminjaman-buku');
    Route::post('/auth-koleksi-buku', [KoleksiController::class, 'store'])->name('auth-koleksi-buku');
    Route::patch('/update-koleksi-buku/{id}', [PeminjamsController::class, 'update'])->name('update-koleksi-buku');

    Route::get('/komentar/{id}', [KomentarController::class, 'create'])->name('komentar');
    Route::post('/auth-komentar', [KomentarController::class, 'store'])->name('auth-komentar');

    Route::get('/review/{id}', [ViewController::class, 'review'])->name('review');

    Route::get('export-users', [ExportContoller::class, 'export'])->name('export-users');
});

Route::get('/logout', [ViewController::class, 'logout'])->name('logout');
