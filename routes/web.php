<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Homepage\Home;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Pegawai\Index as PegawaiIndex;
use App\Livewire\Pegawai\Create as PegawaiCreate;
use App\Livewire\Jabatan\Index as JabatanIndex;
use App\Livewire\UnitKerja\Index as UnitKerjaIndex;
use App\Livewire\Absensi\Index as AbsensiIndex;
use App\Livewire\Absensi\Create as AbsensiCreate;
use App\Livewire\Cuti\Index as CutiIndex;
use App\Livewire\Gaji\Index as GajiIndex;
use App\Livewire\Laporan\AbsensiBulanan;

Route::get('/', Home::class)->name('home');

// // Halaman utama
// Route::get('/', Home::class)
//     ->middleware(['auth', 'verified'])
//     ->name('home');

// Route Pegawai
Route::get('/pegawai', PegawaiIndex::class)->name('pegawai.index');
Route::get('/pegawai/create', PegawaiCreate::class)->name('pegawai.create');
Route::get('/pegawai/{id}/edit', \App\Livewire\Pegawai\Edit::class)->name('pegawai.edit');

Route::get('/jabatan/create', \App\Livewire\Jabatan\Create::class)->name('jabatan.create');
Route::get('/jabatan/{id}/edit', \App\Livewire\Jabatan\Edit::class)->name('jabatan.edit');

Route::get('/unit-kerja/create', \App\Livewire\UnitKerja\Create::class)->name('unit-kerja.create');
Route::get('/unit-kerja/{id}/edit', \App\Livewire\UnitKerja\Edit::class)->name('unit-kerja.edit');

Route::get('/absensi/create', AbsensiCreate::class)->name('absensi.create');

// Route::get('/laporan/absensi', AbsensiBulanan::class)->name('laporan.absensi');


// Route Jabatan, Unit Kerja, Cuti, Gaji, Laporan
Route::get('/jabatan', JabatanIndex::class)->name('jabatan.index');
Route::get('/unit-kerja', UnitKerjaIndex::class)->name('unit-kerja.index');
Route::get('/absensi', AbsensiIndex::class)->name('absensi.index');
Route::get('/cuti', CutiIndex::class)->name('cuti.index');
Route::get('/gaji', GajiIndex::class)->name('gaji.index');
// Route::get('/laporan/absensi', action: AbsensiBulanan::class)->name('laporan.absensi');

// Route Settings
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
