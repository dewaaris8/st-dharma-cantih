<?php

use App\Http\Controllers\AbsensiAnggotaController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\InventarisBarangController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('anggota', AnggotaController::class)->parameters([
//     'anggota' => 'anggota'
// ]);
// Route::resource('absensi', AbsensiAnggotaController::class);
// Route::resource('inventaris', InventarisBarangController::class)->parameters([
//     'inventaris' => 'inventaris'
// ]);
// Route::resource('acara', AcaraController::class);
// Route::resource('peminjaman', PeminjamanController::class)->parameters([
//     'peminjaman' => 'peminjaman'
// ]);
// Route::patch('/peminjaman/{peminjaman}/status', [PeminjamanController::class, 'updateStatus'])->name('peminjaman.updateStatus');
// Route::get('/acara/{acara}/absensi/create', [AbsensiAnggotaController::class, 'create'])->name('absensi.create');
// Route::post('/acara/{acara}/absensi', [AbsensiAnggotaController::class, 'store'])->name('absensi.store');
// Route::get('/acara', [AcaraController::class, 'index'])->name('acara.index');
// Route::get('/acara/{acara}', [AcaraController::class, 'show'])->name('acara.show');
// Route::get('/acara/{acara?}/absensi', [AbsensiAnggotaController::class, 'index'])->name('absensi.index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/absensi', [FrontController::class, 'absensi'])->name('absensi');
Route::get('/inventaris', [FrontController::class, 'barang'])->name('barang');
Route::get('/inventaris/pdf', [InventarisBarangController::class, 'cetakPdf'])->name('inventaris.pdf');
Route::get('/anggota/pdf', [AnggotaController::class, 'cetakPdf'])->name('anggota.pdf');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::middleware('can:manage categories')->group(function () {
            Route::resource('anggota', AnggotaController::class)->parameters([
                'anggota' => 'anggota'
            ]);
            Route::resource('absensi', AbsensiAnggotaController::class);
            Route::resource('inventaris', InventarisBarangController::class)->parameters([
                'inventaris' => 'inventaris'
            ]);
            Route::resource('acara', AcaraController::class);
            Route::resource('peminjaman', PeminjamanController::class)->parameters([
                'peminjaman' => 'peminjaman'
            ]);
            Route::get('/absensi/pdf/{daerah}', [FrontController::class, 'cetakPDF'])->name('absensi.pdf');
            
            Route::patch('/peminjaman/{peminjaman}/status', [PeminjamanController::class, 'updateStatus'])->name('peminjaman.updateStatus');
            Route::get('/acara/{acara}/absensi/create', [AbsensiAnggotaController::class, 'create'])->name('absensi.create');
            Route::post('/acara/{acara}/absensi', [AbsensiAnggotaController::class, 'store'])->name('absensi.store');
            Route::get('/acara', [AcaraController::class, 'index'])->name('acara.index');
            Route::get('/acara/{acara}', [AcaraController::class, 'show'])->name('acara.show');
            Route::get('/acara/{acara?}/absensi', [AbsensiAnggotaController::class, 'index'])->name('absensi.index');
            Route::get('/admin/acara/{acara}/absensi/edit', [AbsensiAnggotaController::class, 'edit'])->name('absensi.edit');
            Route::put('/admin/acara/{acara}/absensi/update', [AbsensiAnggotaController::class, 'update'])->name('absensi.update');
            Route::get('/admin/absensi/{absensi}/edit', [AbsensiAnggotaController::class, 'editSingle'])->name('absensi.editSingle');
            Route::put('/admin/absensi/{absensi}', [AbsensiAnggotaController::class, 'updateSingle'])->name('absensi.updateSingle');
            Route::resource('pengumuman', PengumumanController::class);
            // Route::get('/absensi/pdf/{daerah}', [AbsensiAnggotaController::class, 'cetakPDF'])->name('absensi.pdf');


        });
    });
});


require __DIR__.'/auth.php';
