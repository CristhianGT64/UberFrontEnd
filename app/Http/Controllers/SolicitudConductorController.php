<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolicitudConductorController extends Controller
{
    public function Solicitud(){
        return view('nuevoConductor');
    }
}
