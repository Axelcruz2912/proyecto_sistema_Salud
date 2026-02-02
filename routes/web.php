<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RecuperacionController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'form'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| DASHBOARD (REDIRECT POR ROL)
|--------------------------------------------------------------------------
| Esta ruta SOLO decide a dónde mandar al usuario logueado
*/

Route::middleware('auth')->get('/dashboard', function () {
    $usuario = auth()->user();

    if ($usuario->rol->nombre_rol === 'Admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('usuario.dashboard');
})->name('dashboard');

/*
|--------------------------------------------------------------------------
| DASHBOARD POR ROL
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'rol:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboard.admin');
    })->name('admin.dashboard');
});

Route::middleware(['auth', 'rol:usuario'])->group(function () {
    Route::get('/usuario/dashboard', function () {
        return view('dashboard.usuario');
    })->name('usuario.dashboard');
});

/*
|--------------------------------------------------------------------------
| USUARIOS
|--------------------------------------------------------------------------
*/

Route::get('/usuarios/create', [UsuarioController::class, 'create'])->middleware('guest');
Route::post('/usuarios', [UsuarioController::class, 'store'])->middleware('guest');

/*
|--------------------------------------------------------------------------
| RECUPERACIÓN DE CUENTA
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/recuperar', [RecuperacionController::class, 'form']);
    Route::post('/recuperar', [RecuperacionController::class, 'solicitar']);

    Route::get('/reset/{token}', [RecuperacionController::class, 'resetForm']);
    Route::post('/reset', [RecuperacionController::class, 'reset']);
});
