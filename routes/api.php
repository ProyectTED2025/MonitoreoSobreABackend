<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MesaController;
use Illuminate\Support\Facades\Route;

Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/logout', [AuthController::class, 'logout']);

// Rutas de usuarios → solo admin
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::get('list/users', [UserController::class, 'list']);
    Route::post('users', [UserController::class, 'store']);
    Route::get('users/{user}', [UserController::class, 'show']);
    Route::put('users/{user}', [UserController::class, 'update']);
    Route::delete('users/{user}', [UserController::class, 'destroy']);
});

// Rutas de mesas
Route::middleware(['auth:sanctum', 'role:admin,standard'])->group(function () {
    Route::get('/mesas', [MesaController::class, 'index']);
    Route::put('/mesas/{id}', [MesaController::class, 'update']);
});
