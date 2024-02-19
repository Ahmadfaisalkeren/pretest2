<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('/barang')->group(function () {
        Route::get('/', [BarangController::class, 'index'])->name('barang.index');
        Route::post('/store', [BarangController::class, 'store'])->name('barang.store');
        Route::get('/{id}/show', [BarangController::class, 'show'])->name('barang.show');
        Route::put('/{id}/update', [BarangController::class, 'update'])->name('barang.update');
    });

});


require __DIR__.'/auth.php';
