<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('/kriteria', \App\Http\Controllers\KriteriaController::class);
Route::resource('/option', \App\Http\Controllers\OptionController::class);
Route::resource('/result', \App\Http\Controllers\ResultController::class);
Route::post('/result/hapus', [\App\Http\Controllers\ResultController::class, 'hapus'])->name('result.hapus');
Route::post('/result/hitung', [\App\Http\Controllers\ResultController::class, 'hitung'])->name('result.hitung');