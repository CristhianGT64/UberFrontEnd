<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function solicitarDatosFactura(){
        session_start();

        $NumeroFactura = Http::get('http://localhost:8080/api/Facturas/NumeroFactura')->json();


        return redirect('/SolicitudConductor/Solictud');

    }
    
}
