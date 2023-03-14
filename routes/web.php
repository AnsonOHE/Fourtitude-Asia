<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('calculate-loan.index');
});

Route::get('calculate-loan', [\App\Http\Controllers\LoanController::class, 'index'])->name('calculate-loan.index');
Route::post('calculate-loan', [\App\Http\Controllers\LoanController::class, 'store'])->name('calculate-loan.store');

Route::get('check-digit', [\App\Http\Controllers\CheckDigitController::class, 'index'])->name('check-digit.index');
Route::post('check-digit', [\App\Http\Controllers\CheckDigitController::class, 'store'])->name('check-digit.store');
Route::patch('check-digit', [\App\Http\Controllers\CheckDigitController::class, 'update'])->name('check-digit.update');

Route::get('lcg', [\App\Http\Controllers\LCGController::class, 'index'])->name('lcg.index');
Route::post('lcg', [\App\Http\Controllers\LCGController::class, 'store'])->name('lcg.store');
Route::patch('lcg', [\App\Http\Controllers\LCGController::class, 'update'])->name('lcg.update');
