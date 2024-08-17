<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Stmt\Return_;

class viajesController extends Controller
{
    public function menuCliente(){

        session_start();

        return view('SolicitudViaje');
    }

    public function solicitarViaje(Request $request){
        session_start();

        
        $respuesta = Http::post('http://localhost:8080/api/solicitus/solicitudViaje',[
            "latitudOrigen"=>$request->latitudOrigen,
            "longitudOrigen"=>$request->longitudOrigen,
            "latitudDestino"=>$request->latitudDestino,
            "longitudDestino"=>$request->longitudDestino,
            "usuario"=>[
                "idUsuario"=>$_SESSION["idUsuario"]
            ],
            "tarifa"=>$request->tarifa
        ]);

        if($respuesta){
            return redirect('/viajes/viaje');
        }

        return redirect('/viajes/menuaCliente');
    }

    public function verViaje(){
        session_start();

        return view('viewViajesCliente');
    }
}
