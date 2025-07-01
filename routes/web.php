<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\LaporanController;

// Halaman Publik
Route::get('/', function () {
    return view('login');
});

// Halaman Lain
// Route::get('/services', [Controller::class, 'Comerce'])->name('comerce');
// Route::get('/laporan', [Controller::class, 'Laporan'])->name('laporan');

// Dashboard - hanya bisa diakses setelah login
Route::get('/index', [Controller::class, 'Dashboard'])->name('dashboard')->middleware('auth');
Route::get('/grafik-data', [TransactionController::class, 'grafikData']);
Route::get('/dashboard', [ServiceController::class, 'dashboard'])->name('dashboard');

// Login & Register
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);

// Transaksi Barang (CRUD Lengkap)
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions');
Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
Route::get('/transactions/{transaction}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
Route::put('/transactions/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');
Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy'])->name('transactions.destroy');

//services
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy'); 

//Laporan
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
Route::get('/laporan/export-excel', [LaporanController::class, 'exportExcel'])->name('laporan.export.excel');
Route::get('/laporan/export-pdf', [LaporanController::class, 'exportPDF'])->name('laporan.export.pdf');

