<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TodoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('todo')->name('todo.')->controller(TodoController::class)->group(function () {
    Route::get("", "index")->name("index");
});
