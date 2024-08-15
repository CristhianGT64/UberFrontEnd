<?php

use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('inicioSesion');
});

Route::get('/mapa', function () {
    return view('viewAdministrador');
});

Route::get('/Usuario/CrearUsuario', [UsuariosController::class, 'CrearUsuario'])->name('usuario.CrearUsuario');
Route::post('/Usuario/GuardarUsuario', [UsuariosController::class, 'GuardarUsuario'])->name('usuario.GuardarUsuario');
Route::post('/Usuario/menuUsuario', [UsuariosController::class, 'GuardarUsuario'])->name('usuario.GuardarUsuario');






