<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;


/*
    1. SOLID - Single Responsibility Principle

    Con esas rutas separadas, cada endpoint tiene una sola responsabilidad:

    Como desarrollador senior, esto te permite:

    Métodos más pequeños y enfocados
    Fácil localización de bugs
    Cambios aislados (modificar login no afecta registro)
  
 */

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/perfil', [AuthController::class, 'perfil']);
