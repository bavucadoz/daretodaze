<?php

use App\Http\Controllers\LocaleController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

// Rute publik: bahasa antarmuka mengikuti pilihan pengunjung (disimpan di session).
Route::middleware(SetLocale::class)->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
});

// Mengganti bahasa.
Route::post('/locale', [LocaleController::class, 'update'])->name('locale.update');