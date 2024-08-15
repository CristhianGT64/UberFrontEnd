<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministradoresController extends Controller
{
    public function modoAdministrador(){
        session_start();

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

        return view('viewAdministrador');
    }
}
