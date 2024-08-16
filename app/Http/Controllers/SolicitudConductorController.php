<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class SolicitudConductorController extends Controller
{
    public function Solicitud(){
        session_start();

        $Marcas = Http::get('http://localhost:8080/api/Vehiculos/Marcas')->json();
        $modelos = Http::get('http://localhost:8080/api/Vehiculos/Modelos')->json();
        

        return view('nuevoConductor', compact('Marcas','modelos'));
    }

    public function GuadarSolicitud(Request $request){

        session_start();

        echo('<pre>');
        var_dump($_FILES);
        echo('<pre>');


        $FotoPersona = ($_FILES['FotoPersona']['tmp_name']);
        $FotoLicencia = ($_FILES['FotoLicencia']['tmp_name']);
        $FotoVehiculo = ($_FILES['FotoVehiculo']['tmp_name']);



        //creacion de carpeta donde se guardaran las 
        $CarpetaImagenesSolicitud = "../public/imagenesProductos";

        $nombreFotoPersona = md5(uniqid(rand(), true)).'.jpg'; //Nuevo nombre generado para la imagen
        $nombreFotoLicencia = md5(uniqid(rand(), true)).'.jpg'; //Nuevo nombre generado para la imagen
        $nombreFotoVehiculo = md5(uniqid(rand(), true)).'.jpg'; //Nuevo nombre generado para la imagen


        //Validamos que si la carpeta no existe la cree
        if (!is_dir($CarpetaImagenesSolicitud)){
            mkdir($CarpetaImagenesSolicitud);  //Creamos el directorio de imagenes
        }


        $guardarSolitud = Http::post('http://localhost:8080/api/solicitus/GuardarSolicitud',[
            "usuarios"=>[
                "idUsuario"=>$_SESSION['idUsuario']
            ],
            "fechaNacimiento"=>$request->fechaNacimiento,
            "licencia"=>[
                "licencia"=>$request->numLicencia,
                "fechaVencimiento"=>$request->fechaVecimiento
            ],
            "colorVehiculo"=>$request->colorSelect,
            "numPlaca"=>$request->numPlaca,
            "numPuertas"=>$request->numPuertas,
            "anio"=>$request->anio,
            "numasientos"=>$request->numAsientos,
            "marca"=>[
                "idMarca"=>$request->MarcaAutomovil
            ],
            "modelo"=>[
                "idModelo"=>$request->ModeloAutomovil
            ],
            "fotografiaSolicitud"=>[
                [
                    "ubicacion"=>$nombreFotoPersona
                ],
                [
                    "ubicacion"=>$nombreFotoLicencia
                ],
                [
                    "ubicacion"=>$nombreFotoVehiculo
                ]
            ]
        ]);

        if ($guardarSolitud) {
            
            //Subir las imagenes al sistemas
            move_uploaded_file($FotoPersona , $CarpetaImagenesSolicitud.'/'.$nombreFotoPersona);
            move_uploaded_file($FotoLicencia , $CarpetaImagenesSolicitud.'/'.$nombreFotoLicencia);
            move_uploaded_file($FotoVehiculo , $CarpetaImagenesSolicitud.'/'.$nombreFotoVehiculo);

            // Guardar Producto en base de datos
            return redirect('/Usuario/menuUsuario')->with('status',1);
        }

        return $this->Solicitud();


        

        


    }

}
