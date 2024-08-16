<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AdministradoresController extends Controller
{
    public function modoAdministrador(){
        session_start();

        //Verificar que el usuario sea un administrador
        foreach ($_SESSION['roles'] as $rol):
            if ($rol === 1):
                //Mandarlo directamente al menu de conductor
                return redirect('/Administradores/menuAdministrador');
                break;
            endif;
        endforeach;

        return redirect('/Usuario/menuUsuario');
    }

    public function menuAdministrador(){
        session_start();

        //Traer todas las solicitudes

        $detallesSolicitud = Http::get('http://localhost:8080/api/solicitud/detallesSolicitud')->json();
        $fotografiasSolicitud = Http::get('http://localhost:8080/api/solicitud/fotografiasSolicitudes')->json();

        // echo('<pre>');
        // var_dump($detallesSolicitud);
        // echo('<pre>');

        // echo('<pre>');
        // var_dump($fotografiasSolicitud);
        // echo('<pre>');

        // exit;

        return view('viewAdministrador', compact('detallesSolicitud', 'fotografiasSolicitud'));
    }
}
