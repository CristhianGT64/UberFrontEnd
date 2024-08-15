<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConductorController extends Controller
{
    public function modoConductor(){
        session_start();

        foreach ($_SESSION['roles'] as $rol):
            if ($rol === 2):
                //Mandarlo directamente al menu de conductor
                return redirect('/Conductores/menuPrincipal');
                break;
            endif;
        endforeach;

        return redirect('/SolicitudConductor/Solictud');

    }
    
}
