<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Stmt\Return_;

class UsuariosController extends Controller
{
    public function CrearUsuario(){
        return view('nuevoUsuario');
    }

    public function GuardarUsuario(Request $request){
        $guardarUsuario = Http::post('http://localhost:8080/api/CrearUsuario',[
            "correo"=>$request->email,
            "contrasenia"=>$request->contrasena,
            "latActual"=>$request->latitud,
            "lonActual"=>$request->longitud,
            "persona"=>[
                "dni"=>$request->dni,
                "nombre1"=>$request->primerNombre,
                "nombre2"=>$request->segundoNombre,
                "apellido1"=>$request->primerApellido,
                "apellido2"=>$request->segundoApellido,
                "telefonosUsuario"=>[
                    [
                        "numero"=>$request->telefono
                    ]
                ]
            ]
        ]);

        if($guardarUsuario){
            //Traer informacion del usuario e iniciar sesion
            // 
            $usuario = Http::get('http://localhost:8080/api/buscarUsuario',[
                'correo'=>$request->email
            ]);

            // echo '<pre>';
            // var_dump($usuario->json());
            // echo '</pre>';

            $usuarioActivo = $usuario->json();

            session_start();
            $_SESSION["idUsuario"] = $usuarioActivo['idUsuario'];
            $_SESSION["correo"] = $usuarioActivo['correo'];
            $_SESSION["nombreCompleto"] = $usuarioActivo['nombreCompleto'];
            $_SESSION["roles"] = $usuarioActivo['roles'];
            $_SESSION["activo"] = true;

            return redirect('viewUsuario');

        }
        
        return view('nuevoUsuario');


    }


}
