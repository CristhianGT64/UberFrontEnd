<!DOCTYPE html>
<html lang="en">
    @php

    if (empty($_SESSION)) {
        header('Location: /login');
        exit();
    }
@endphp
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="/css/nvoUsuarioMapa.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    {{-- <script type="module" src="/js/mapa.js"></script> --}}
    <title>Registro</title>
    <style>
        .conditional-form {
            display: none; /* Ocultar el formulario inicialmente */
        }

        .color-display {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 10px;
        }
    </style>
</head>
<body>
<h1>Registro de Conductores</h1>
    <div>
        <form action="{{route('solicitud.GuardarSolicitud')}}" method="POST" enctype="multipart/form-data"> 
            @csrf
            <div>
                <fieldset>
                    <legend>Datos del Conductor</legend>
                    <div>
                        <div>
                            <label for="fechaNacimiento">Fecha de nacimiento</label>
                            <div class="mb-3">
                                <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>

                            </div>
                        </div>

                          <!-- Sección para tipo de fotografía y carga de imagen -->
                        <div id="photo-section">
                            <div class="mb-3">
                                <label for="FotoPersona" class="form-label">Añadir una Foto de su cara</label>
                                <input class="form-control" type="file" id="FotoPersona" name ="FotoPersona" accept="image/*">
                                <small class="form-text text-muted">Solo se permiten imágenes (JPEG, PNG, GIF, etc.).</small>

                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">¿Tiene licencia de Conducir?</label><br>
                            <input type="radio" id="si1" name="repuesta1" value="si">
                            <label for="si1">Sí</label>
                            <input type="radio" id="no1" name="repuesta1" value="no">
                            <label for="no1">No</label>
                        </div>

                       
                        <div id="formLicencia" class="conditional-form">
                            <h3>Datos de la licencia</h3>
                            <div class="mb-3">
                                <label for="numLicencia" class="form-label">Numero de la licencia</label>
                                <input placeholder="Numero de la licencia" type="text" class="form-control" id="numLicencia" name="numLicencia">
                            </div>
                            <div class="mb-3">
                                <label for="fechaVecimiento">Fecha de vecimiento</label>
                                <div class="mb-3">
                                    <input type="date" class="form-control" id="fechaVecimiento" name="fechaVecimiento" required>
                                </div>
                            </div>


                            <!-- Sección para tipo de fotografía y carga de imagen -->
                            <div id="photo-section">
                                <div class="mb-3">
                                    <label for="FotoLicencia" class="form-label">Añadir una Foto de su licencia</label>
                                    <input class="form-control" type="file" id="FotoLicencia" name="FotoLicencia"  accept="image/*">
                                    <small class="form-text text-muted">Solo se permiten imágenes (JPEG, PNG, GIF, etc.).</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <br>

                <fieldset>

                    <div class="mb-3">
                        <label class="form-label">¿Tiene Automovil?</label><br>
                        <input type="radio" id="si2" name="repuesta2" value="si">
                        <label for="si2">Sí</label>
                        <input type="radio" id="no2" name="repuesta2" value="no">
                        <label for="no2">No</label>
                    </div>
                    <div id="formAutomovil" class="conditional-form">

                        <legend>Datos del Automovil</legend>
                            <div>
                                <div>
                                    <label for="email">Placa de Automovil</label>
                                    <input type="text" placeholder="Placa de Automovil" id="numPlaca" name="numPlaca">
                                </div>
                                <div>

                                    <div class="mb-3">
                                        <label for="marcaSelect" class="form-label">Selecciona la marca del automóvil</label>
                                        <select id="MarcaAutomovil" class="form-select" name="MarcaAutomovil">
                                            <option value="" disabled selected>Seleccione una marca</option>
                                            @foreach ($Marcas as $marca)
                                                <option value="{{$marca['idMarca']}}">{{$marca['nombreMarca']}}</option>
                                            @endforeach
                                        </select>                                    
                                    </div>
                                <div class="mb-3">
                                    <label for="modeloSelect" class="form-label">Selecciona el modelo del automóvil</label>
                                    <select id="ModeloAutomovil" class="form-select" name="ModeloAutomovil">
                                        <option value="" disabled selected>Seleccione un modelo</option>
                                    </select>                                     
                                </div>
                                    <div class="mb-3">
                                        <label for="colorSelect" class="form-label">Selecciona un color</label>
                                        
                                        <select id="colorSelect" class="form-select" name="colorSelect">
                                            <!-- Opciones se llenarán con JavaScript -->
                                            <option value="" disabled selected>Seleccione un color</option>

                                        </select>                                     
                                    </div>
                                    <div class="mb-3">
                                         <!-- Este input se obtiene el valor o color del vehiculo-->
                                        <span id="colorVistaPreview" class="color-display"></span>
                                        <span id="colorVehiculo" name="colorVehiculo">Nombre del color</span>
                                    </div>
        
                                </div>
                                <div>
                                    <label for="numPuertas">Numero de Puertas</label>
                                    <input type="number"  class="form-control" id="numPuertas" name="numPuertas" min="1" max="5" placeholder="Numero de puertas entre 1 y 5" required>
                                    
                                    <div>
                                            <label for="numAsientos">Numero de Asientos</label>
                                            <input type="number"  class="form-control" id="numAsientos" name="numAsientos" min="1" max="6" placeholder="Numero de Asientos entre 1 y 6" required>
                                    </div>

                                    <div>
                                            <label for="anio">Año Vehiculo</label>
                                            <input type="number" class="form-control" id="anio" name="anio" min="2014" max="2024" placeholder="Año entre 2014 y 2024" required>
                                    </div>
                                </div>
                            
                                <!-- Sección para tipo de fotografía y carga de imagen -->
                                <div id="photo-section">
                                    <div class="mb-3">
                                        <label for="FotoVehiculo" class="form-label">Añadir una Foto del vehiculo</label>
                                        <input type="file" class="form-control"  name="FotoVehiculo" id="FotoVehiculo" accept="image/*">
                                        <small class="form-text text-muted">Solo se permiten imágenes (JPEG, PNG, GIF, etc.).</small>

                                    </div>
                                </div>
                            </div> 
                          
           
                </fieldset>                        
            </div>
        </div>
           
            <div>
                <input type="submit" value="Enviar Solicitud de Conductor" style="display: flex" class="mt-2">
            </div> 

            <div>
                <input id="cancelFormConductor" Value="Cancelar Solicitud" type="submit"  style="display: flex" class="mt-2">                 

            </div>
           
        </div>
    </form> {{-- Fin del formulario --}}
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/ScriptFormConductor.js"></script>
    <script>
        // Suponiendo que tienes una variable de PHP que contiene los modelos
        const modelos = @json($modelos);
    
        document.getElementById('MarcaAutomovil').addEventListener('change', function() {
            const marcaId = this.value;
            const modeloSelect = document.getElementById('ModeloAutomovil');
            
            // Limpiar las opciones actuales
            modeloSelect.innerHTML = '<option value="" disabled selected>Seleccione un modelo</option>';
            
            // Filtrar y agregar los modelos correspondientes
            modelos.forEach(modelo => {
                if (modelo.modeloMarca == marcaId) {
                    const option = document.createElement('option');
                    option.value = modelo.idModelo;
                    option.textContent = modelo.nombreModelo;
                    modeloSelect.appendChild(option);
                }
            });
        });
    </script>
    



</body>
</html>