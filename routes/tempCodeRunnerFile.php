<?php
Route::get('/', Home::class)->name('home');

// Halaman utama
Route::get('/', Home::class)
    ->middleware(['auth', 'verified'])
    ->name('home');