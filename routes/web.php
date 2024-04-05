<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservasiController;
use App\Livewire\CariDokter;
use App\Http\Controllers\AntrianController;

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
    return view('pages.landing');
});

Route::name('reservasi.')->group(function () {
    Route::get('/reservasi', CariDokter::class)->name('cari');

    Route::get('/reservasi/{id}', [ReservasiController::class, 'create'])->name('book');
    Route::post('/reservasi/{id}/old', [ReservasiController::class, 'old'])->name('old');
    Route::post('/reservasi/{id}/store', [ReservasiController::class, 'store'])->name('store');
    Route::get('/reservasi/{id}/selesai', [ReservasiController::class, 'show'])->name('selesai');
});

Route::name('antrian.')->group(function () {
    Route::get('/antrian', function () {
        return view('pages.antrian.form');
    })->name('form');

    Route::post('/antrian/search', [AntrianController::class, 'search'])->name('search');
});
