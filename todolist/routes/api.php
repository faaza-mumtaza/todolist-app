<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Services\TodoController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->group(function () {
    //route login
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    //route register
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    //route logout

});

// Route Services
Route::prefix('services')->middleware('auth:sanctum')->group(function () {
    // Category
    Route::apiResource('category', CategoryController::class);

    // Label Route

    // To_do Route
    Route::apiResource('todo', TodoController::class);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

