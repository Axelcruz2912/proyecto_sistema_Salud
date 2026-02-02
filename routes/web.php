<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RecuperacionController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'form'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return "Bienvenido al sistema";
    });
});

Route::get('/usuarios/create', [UsuarioController::class, 'create']);
Route::post('/usuarios', [UsuarioController::class, 'store']);


Route::get('/recuperar', [RecuperacionController::class, 'form']);
Route::post('/recuperar', [RecuperacionController::class, 'solicitar']);

Route::get('/reset/{token}', [RecuperacionController::class, 'resetForm']);
Route::post('/reset', [RecuperacionController::class, 'reset']);
