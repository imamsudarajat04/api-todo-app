<?php

use App\Http\Controllers\PhoneGenerator\PhoneGeneratorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['web'])->group(function () {
    Route::get('/phone-generator', [PhoneGeneratorController::class, 'index'])->name('phone-generator.index');
    Route::post('/phone-generator', [PhoneGeneratorController::class, 'generate'])->name('phone-generator.generate');
});
