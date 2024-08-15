<!DOCTYPE html>
<html lang="en">
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
        <form action="" method="POST"> 
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
                                <label for="FotoRetrato" class="form-label">Añadir una Foto de su cara</label>
                                <input class="form-control" type="file" id="FotoRetrato" name ="FotoRetrato" accept="image/*">
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
                                        <label for="colorSelect" class="form-label">Selecciona la marca del automovil</label>
                                        
                                        <select id="MarcaAutomovil" class="form-select">
                                            <!-- Opciones se llenarán con JavaScript -->
                                            <option value="" disabled selected>Seleccione una marca</option>

                                        </select>                                     
                                </div>

                                <div class="mb-3">
                                        <label for="colorSelect" class="form-label">Selecciona el modelo del automovil</label>
                                        
                                        <select id="MarcaAutomovil" class="form-select">
                                            <!-- Opciones se llenarán con JavaScript -->
                                            <option value="" disabled selected>Seleccione un modelo</option>

                                        </select>                                     
                                </div>
                                    <div class="mb-3">
                                        <label for="colorSelect" class="form-label">Selecciona un color</label>
                                        
                                        <select id="colorSelect" class="form-select">
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
                                            <label for="numAsientos">Numero de Puertas</label>
                                            <input type="number"  class="form-control" id="numAsientos" name="numAsientos" min="1" max="6" placeholder="Numero de Asientos entre 1 y 6" required>
                                    </div>

                                    <div>
                                            <label for="anio">Numero de Puertas</label>
                                            <input type="number" class="form-control" id="anio" name="anio" min="2014" max="2024" placeholder="Año entre 2014 y 2024" required>
                                    </div>
                                </div>
                            
                                <!-- Sección para tipo de fotografía y carga de imagen -->
                                <div id="photo-section">
                                    <div class="mb-3">
                                        <label for="photoUpload1" class="form-label">Añadir una Foto del vehiculo</label>
                                        <input class="form-control" type="file" name="FotoVehiculo" id="FotoVehiculo" accept="image/*">
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
     
    



</body>
</html>