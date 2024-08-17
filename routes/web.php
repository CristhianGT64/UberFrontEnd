<?php

use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\ConductorController;
use App\Http\Controllers\SolicitudConductorController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\viajesController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    $status = session('status'); // Esto capturará el 'status' de la sesión
    return view('inicioSesion', compact('status'));
})->name('login');

Route::get('/mapa', function () {
    return view('solicitudViaje');
});

/* Usuarios ------------------------------------------ */
Route::get('/Usuario/CrearUsuario', [UsuariosController::class, 'CrearUsuario'])->name('usuario.CrearUsuario');
Route::post('/Usuario/GuardarUsuario', [UsuariosController::class, 'GuardarUsuario'])->name('usuario.GuardarUsuario');
Route::get('/Usuario/menuUsuario', [UsuariosController::class, 'menuCliente'])->name('usuario.menuCliente');
Route::get('/Usuario/login', [UsuariosController::class, 'CerraSesion'])->name('usuario.cerrarSesion');
Route::post('/Usuario/iniciar', [UsuariosController::class, 'iniciarSesion'])->name('usuario.iniciar');
Route::post('/Usuario/IniciarSesion', [UsuariosController::class, 'iniciarSesion'])->name('usuario.iniciarSesion');


/* Conductores ----------------------------------------------------------------- */
Route::get('/Conductores/CambioModo', [ConductorController::class, 'modoConductor'])->name('conductor.cambiarModo');
Route::get('/Conductores/menuPrincipal', [ConductorController::class, 'menuConductor'])->name('conductor.menuConductor');


/* SolicitudesCondutores ---------------------------------------------------------- */
Route::get('/SolicitudConductor/Solictud', [SolicitudConductorController::class, 'Solicitud'])->name('solictudConduc.solictud');
Route::post('/SolicitudConductor/GuardarSolicitud', [SolicitudConductorController::class, 'GuadarSolicitud'])->name('solicitud.GuardarSolicitud');
Route::post('/SolicitudConductor/decisionSolicitud', [SolicitudConductorController::class, 'decisionSolicitud'])->name('solicitud.decison');



/* Administradores */
Route::get('/Administradores/CambioModo', [AdministradoresController::class, 'modoAdministrador'])->name('Administrador.cambiarModo');
Route::get('/Administradores/menuAdministrador', [AdministradoresController::class, 'menuAdministrador'])->name('Administrador.menuAdministrador');


/* Viajes y solicitudes de viajes */
// Route::get('/viajes/CambioModo', [SolicitudConductorController::class, ''])->name('solicitudes.cambiarModo');
Route::get('/viajes/menuaCliente', [viajesController::class, 'menuCliente'])->name('solicitud.menuCliente');
Route::post('/viajes/solictarViaje', [viajesController::class, 'solicitarViaje'])->name('solicitud.solictarViaje');
Route::get('/viajes/viaje', [viajesController::class, 'verViaje'])->name('solicitud.viaje');






