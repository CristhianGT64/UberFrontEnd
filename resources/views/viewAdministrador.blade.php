<!DOCTYPE html>
<html lang="es">
    @php

    if (empty($_SESSION)) {
        header('Location: /login');
        exit();
    }
@endphp
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador - Servicio de Transporte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background-color: #f8f9fa;
            margin: 0;
        }
        .wrapper {
            display: flex;
            flex: 1;
            flex-direction: column;
        }
        @media (min-width: 768px) {
            .wrapper {
                flex-direction: row;
            }
        }
        .sidebar {
            background-color: #212529;
            color: #fff;
            padding: 10px;
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: -250px; /* Oculto por defecto */
            z-index: 1001;
            transition: left 0.3s ease-in-out;
        }
        .sidebar.active {
            left: 0; /* Muestra el sidebar */
        }
        .sidebar h4 {
            text-align: center;
            margin-top: 15px;
            margin-bottom: 15px;
            font-size: 18px;
            font-weight: bold;
            position: relative;
        }
        .sidebar h4 .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
            cursor: pointer;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 8px;
            font-size: 16px;
            position: relative;
        }
        .sidebar a:hover {
            background-color: #343a40;
        }
        .sidebar a.active {
            background-color: #343a40;
        }
        .sidebar a i {
            margin-right: 10px;
            font-size: 18px;
        }
        .content {
            flex: 1;
            padding: 20px;
            margin-left: 0;
            transition: margin-left 0.3s ease-in-out;
        }
        @media (min-width: 768px) {
            .content {
                margin-left: 250px;
            }
        }
        .header {
            background-color: #212529;
            color: #fff;
            padding: 10px 20px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .menu-toggle {
            background-color: transparent;
            border: none;
            color: #fff;
            font-size: 24px;
            display: inline-block;
            cursor: pointer;
        }
        .main-content {
            margin-top: 60px;
        }
        .hidden {
            display: none;
        }
        .table-responsive {
            overflow-x: auto;
        }
        .tooltip-inner {
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>Panel de Administrador - EasyTaxy</h1>
        <button class="menu-toggle" onclick="toggleMenu()"><i class="fas fa-bars"></i></button>
    </header>

    <div class="wrapper">
        <nav class="sidebar" id="sidebar">
            <h4>Menú de Administrador <span class="close-btn" onclick="toggleMenu()"><i class="fas fa-times"></i></span></h4>
            <a href="#" id="viewRequestsLink" onclick="showRequestsView()"><i class="fas fa-check-circle"></i> Aceptar Solicitudes</a>
            <a href="#" onclick="showRequestsViewConductores()"><i class="fas fa-car"></i> Ver Conductores</a>
            <a href="#" onclick="showRequestsViewUsuarios()"><i class="fas fa-users"></i> Ver Usuarios</a>
            <a href="#" onclick="showRequestsViewViajes()"><i class="fas fa-route"></i> Ver Viajes</a>
            <a href="{{route('usuario.menuCliente')}}"><i class="fas fa-arrow-left"></i> Salir de modo administrador</a>
        </nav>
        
        <main class="content" id="content">
            <div class="container main-content">
                
                <div class="hidden" id="requestsView">
                    <button class="btn btn-secondary mb-3" onclick="showMainView()">Regresar</button>
                    <h2>Solicitudes Pendientes</h2>
                    <div class="table-responsive">
                        <table id ="SolicitudesConductor" name= "SolicitudesConductor" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email del Usuario</th>
                                    {{-- <th>Fecha de Solicitud</th> --}}
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach ($detallesSolicitud as $solicitud)
                                <tr>
                                    <td>{{$solicitud['idSolicitud']}}</td>
                                    <td>{{$solicitud['nombreCompleto']}}</td>
                                    {{-- <td></td> --}}
                                    <td>{{$solicitud['correo']}}</td>
                                    <td>
                                    <a href="{{$solicitud['idSolicitud']}}" data-id="{{$solicitud['idSolicitud']}}" name="AceptarSolicitud" class="btn btn-success btn-sm AceptarSolicitud" data-bs-toggle="modal" data-bs-target=".exampleModal" title="Aceptar">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    <a href="{{$solicitud['idSolicitud']}}" data-id="{{$solicitud['idSolicitud']}}" name="RechzarSolicitud" class="btn btn-danger btn-sm RechzarSolicitud" data-bs-toggle="modal" data-bs-target=".exampleModal" title="Rechazar">
                                        <i class="fas fa-times"></i>
                                    </a>
                                        <a href="" name="VerInformacion" class="btn btn-info btn-sm VerInformacion"  data-bs-placement="top" title="Ver Más" data-bs-toggle="modal" data-bs-target=".viewSolicitud"
                                        data-id="{{$solicitud['idSolicitud']}}"
                                        data-nombre="{{ $solicitud['nombreCompleto'] }}"
                                        data-correo="{{ $solicitud['correo'] }}"
                                        data-telefono="{{ $solicitud['numero'] }}"
                                        data-fecha-nacimiento="{{ $solicitud['fechaNacimiento'] }}"
                                        data-licencia="{{ $solicitud['licencia'] }}"
                                        data-fecha-vencimiento="{{ $solicitud['fechaVencimiento'] }}"
                                        data-color-auto="{{ $solicitud['colorVehiculo'] }}"
                                        data-placa-auto="{{ $solicitud['numPlaca'] }}"
                                        data-num-puertas="{{ $solicitud['numPuertas'] }}"
                                        data-anio="{{ $solicitud['anio'] }}"
                                        data-num-asientos="{{ $solicitud['numAsientos'] }}"
                                        data-marca="{{ $solicitud['nombreMarca'] }}"
                                        data-modelo="{{ $solicitud['nombreModelo'] }}"
                                        @foreach ($fotografiasSolicitud as $foto)
                                            @if ($foto['idSolicitud'] == ($solicitud['idSolicitud']) )
                                                @if ($foto['idTipoFotografia'] == 2)
                                                    data-foto-retrato="{{ $foto['ubicacion'] }}"
                                                @endif
                                                @if ($foto['idTipoFotografia'] == 3)
                                                    data-foto-licencia="{{ $foto['ubicacion'] }}"  
                                                @endif
                                                @if ($foto['idTipoFotografia'] == 4)
                                                    data-foto-auto="{{ $foto['ubicacion'] }}"
                                                @endif 
                                            @endif
                                        @endforeach
                                        ><i class="fas fa-eye"></i></a>
                                    </a>
                                    </td>
                                </tr>
                            @endforeach
                                
                                <!-- Agrega más filas aquí -->
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="hidden" id="requestsViewConductores">
                    <button class="btn btn-secondary mb-3" onclick="showMainViewConductores()">Regresar</button>
                    <h2>Lista de conductores</h2>
                    <div class="table-responsive">
                        <table id ="VerConductores" name= "verConductores" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Viajes Realizados</th>
                                    <th>Disponible</th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td> 
                                    <td></td>   
                                </tr>
                          
                                
                                <!-- Agrega más filas aquí -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="hidden" id="requestsViewUsuarios">
                    <button class="btn btn-secondary mb-3" onclick="showMainViewUsuarios()">Regresar</button>
                    <h2>Lista de conductores</h2>
                    <div class="table-responsive">
                        <table id ="VerConductores" name= "verConductores" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Contraseña</th>
                                    <th>Visible</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td> 
                                    <td></td>
                                    <td></td>   
                                </tr>
                          
                                
                                <!-- Agrega más filas aquí -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="hidden" id="requestsViewViajes">
                    <button class="btn btn-secondary mb-3" onclick="showMainViewViajes()">Regresar</button>
                    <h2>Lista de conductores</h2>
                    <div class="table-responsive">
                        <table id ="VerConductores" name= "verConductores" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre del Cliente</th>
                                    <th>Conductor</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td> 
                                    <td></td>
                                    <td></td>   
                                </tr>
                          
                                
                                <!-- Agrega más filas aquí -->
                            </tbody>
                        </table>
                    </div>
                </div>


                <!-- Vista principal -->
                <div id="mainView">
                    <h2>Bienvenido, Administrador</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Aceptar Solicitudes</h5>
                                        <p class="card-text">Gestiona las solicitudes de nuevos conductores o usuarios.</p>
                                        <button class="btn btn-primary" onclick="showRequestsView()">Ir a Solicitudes</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Ver Conductores</h5>
                                        <p class="card-text">Revisa la información y el estado de los conductores.</p>
                                        <button class="btn btn-primary" onclick="showRequestsViewConductores()">Ver Conductores</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Ver Usuarios</h5>
                                        <p class="card-text">Administra la información de los usuarios registrados.</p>
                                        <a onclick="showRequestsViewUsuarios()" href="#" class="btn btn-primary">Ir a Usuarios</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Ver Viajes</h5>
                                        <p class="card-text">Consulta y gestiona los viajes realizados.</p>
                                        <a onclick="showRequestsViewViajes()" href="#" class="btn btn-primary">Ir a Viajes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </main>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <p>&copy; 2024 EasyTaxy. Todos los derechos reservados.</p>
    </footer>


    <!--  Ventanas Modales  -->
    <div class="modal fade exampleModal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Título del Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('solicitud.decison')}}"  method="POST">
                     @csrf
                    <div class="modal-body">
                        <textarea class="form-control observacion" id="observaciones" name="observaciones" rows="10" style="width: 100%;"></textarea>
                        <input type="hidden" id="solicitud" name="solicitud">
                        <input type="hidden" id="accion" name="accion">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" class="btn btn-primary" value="confirmar">
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    
    <!-- Modal para ver solicitudes -->
    <div  class="modal fade viewSolicitud"  tabindex="-1" aria-labelledby="viewSolicitudLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewSolicitudLabel">Detalles de la Solicitud</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Datos del usuario -->
                    <div class="card mb-3">
                        <div class="card-header">
                            Datos del Usuario
                        </div>
                        <div class="card-body">
                            <p><strong>Correo del usuario : <span id="CorreoConductor"></span></strong></p>
                            <p><strong>Nombre Completo:</strong><span id = "nombreCompletoConductor"></span></p>
                            <p><strong>Teléfono:</strong id="TelefonoConductor"> <span id = "TelefonoConductor"></span> </p>
                            <div class="mb-3">
                                <label class="form-label"><strong>Foto del Retrato:</strong></label>
                                <img id="FotoRetratoConductor" src="" alt="Foto del Retrato" class="img-fluid rounded">
                            </div>
                            <p><strong>Fecha de Nacimiento:</strong id="FechaNacimientoConductor"><span id="FechaNacimientoConductor"></span></p>
                        </div>
                    </div>
                    
                    <!-- Datos de la licencia -->
                    <div class="card mb-3">
                        <div class="card-header">
                            Datos de la Licencia
                        </div>
                        <div class="card-body">
                            <p><strong>Número de la Licencia: </strong id="viewLicencia"><span id="viewLicencia"></span></p>
                            <p><strong>Fecha de Vencimiento: </strong id="viewFechaVencimientoL"><span id="viewFechaVencimientoL"></span></p>
                            <div class="mb-3">
                                <label class="form-label"><strong>Foto de la Licencia:</strong></label>
                                <img  id="viewFotoLicencia" src="#" alt="Foto de la Licencia" class="img-fluid rounded" >
                            </div>
                        </div>
                    </div>
                    
                    <!-- Datos del vehículo -->
                    <div class="card">
                        <div class="card-header">
                            Datos del Vehículo
                        </div>
                        <div class="card-body">
                            <p><strong>Color del Vehículo:</strong id="viewColorAuto"> <span id="viewColorAuto"></span></p>
                            <p><strong>Número de Placa:</strong id="viewPlacaAuto"> <span id="viewPlacaAuto"></span></p>
                            <p><strong>Número de Puertas:</strong id="viewNumPuertasAuto"> <span id="viewNumPuertasAuto"></span></p>
                            <p><strong>Año:</strong id="viewAnioAuto"> <span id="viewAnioAuto"></span></p>
                            <p><strong>Número de Asientos:</strong id="viewNumAsientoAuto"> <span id="viewNumAsientoAuto"></span></p>
                            <p><strong>Marca:</strong id="viewMarcaAuto"> <span id="viewMarcaAuto"></span></p>
                            <p><strong>Modelo:</strong id="viewModeloAuto"> <span id="viewModeloAuto"></span></p>
                            <div class="mb-3">
                                <label class="form-label"><strong>Foto del Vehículo:</strong></label>
                                <img id="viewFotoAuto" src="#" alt="Foto del Vehículo" class="img-fluid rounded">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
             class Modal {
                static callModal(idModal, event, tipo) {
                    // Asegúrate de que el elemento modal existe
                    let element = document.querySelector(idModal);
                    if (!element) {
                        console.error(`Modal con ID ${idModal} no encontrado.`);
                        return;
                    }

                    let modalTitle = element.querySelector('.modal-title');
                    let modalTextarea = element.querySelector('.observacion');
                    let buttonA =document.querySelector(".btn btn-primary");
                    if (!modalTitle || !modalTextarea) {
                        console.error('No se encontraron los elementos esperados dentro del modal.');
                        return;
                    }

                    // Cambiar el título y placeholder según la acción (Aceptar/Rechazar)
                    if (tipo === 'aceptar') {
                        modalTitle.textContent = 'Justificación para Aceptar';
                        modalTextarea.placeholder = 'Ingrese la justificación para aceptar...';
                       
                    } else if (tipo === 'rechazar') {
                        modalTitle.textContent = 'Motivo de Rechazo';
                        modalTextarea.placeholder = 'Ingrese el motivo del rechazo...';
                        
                    }

                    let modal = new bootstrap.Modal(element);
                    modal.show();
                }
            }

        document.addEventListener('DOMContentLoaded', function () {
            const botones = document.querySelectorAll('.AceptarSolicitud, .RechzarSolicitud');

            botones.forEach(function(boton) {
                boton.addEventListener('click', function (event) {
                    event.preventDefault();  // Prevenir el comportamiento por defecto del enlace
                    const tipo = boton.getAttribute('title').toLowerCase();  // 'aceptar' o 'rechazar'
                    Modal.callModal('.exampleModal', event, tipo);  // Llama a la función para personalizar el modal
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            // Configuración para el cierre del modal y el backdrop
            document.querySelectorAll('.modal').forEach(function(modal) {
                modal.addEventListener('hidden.bs.modal', function () {
                    const backdrop = document.querySelector('.modal-backdrop');
                    if (backdrop) {
                        backdrop.remove();
                    }
                });
            });
        });

        function toggleMenu() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            sidebar.classList.toggle('active');
            content.style.marginLeft = sidebar.classList.contains('active') ? '250px' : '0';
        }
        //Boton de solicitudes
        function showRequestsView() {
            document.getElementById('mainView').classList.add('hidden');
            document.getElementById('requestsView').classList.remove('hidden');
        }

        function showMainView() {
            document.getElementById('mainView').classList.remove('hidden');
            document.getElementById('requestsView').classList.add('hidden');
        }

        //Boton de ver conductores
        function showRequestsViewConductores() {
            document.getElementById('mainView').classList.add('hidden');
            document.getElementById('requestsViewConductores').classList.remove('hidden');
        }

        function showMainViewConductores() {
            document.getElementById('mainView').classList.remove('hidden');
            document.getElementById('requestsViewConductores').classList.add('hidden');
        }

        //Boton de ver usuarios
        function showRequestsViewUsuarios() {
            document.getElementById('mainView').classList.add('hidden');
            document.getElementById('requestsViewUsuarios').classList.remove('hidden');
        }

        function showMainViewUsuarios() {
            document.getElementById('mainView').classList.remove('hidden');
            document.getElementById('requestsViewUsuarios').classList.add('hidden');
        }

        //Boton para ver viajes
        function showRequestsViewViajes() {
            document.getElementById('mainView').classList.add('hidden');
            document.getElementById('requestsViewViajes').classList.remove('hidden');
        }

        function showMainViewViajes() {
            document.getElementById('mainView').classList.remove('hidden');
            document.getElementById('requestsViewViajes').classList.add('hidden');
        }
        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(element => {
            new bootstrap.Tooltip(element);
        });

        document.querySelectorAll('.AceptarSolicitud').forEach(button => {
            button.addEventListener('click', function() {
                // Obtener los atributos de datos del botón
                const idSolicitud = this.getAttribute('data-id');
                const accion = 'aceptar';
                console.log(idSolicitud)
                document.getElementById('solicitud').value = idSolicitud;
                document.getElementById('accion').value = accion;

            });
        });

        document.querySelectorAll('.RechzarSolicitud').forEach(button => {
            button.addEventListener('click', function() {
                // Obtener los atributos de datos del botón
                const idSolicitud = this.getAttribute('data-id');
                const accion = 'rechazar';
                console.log(idSolicitud)
                document.getElementById('solicitud').value = idSolicitud;
                document.getElementById('accion').value = accion;

            });
        });



        document.querySelectorAll('.VerInformacion').forEach(button => {
            button.addEventListener('click', function() {
                // Obtener los atributos de datos del botón
                const idSolicitud = this.getAttribute('data-id');
                const nombre = this.getAttribute('data-nombre');
                const correo = this.getAttribute('data-correo');
                const telefono = this.getAttribute('data-telefono');
                const fotoRetrato = this.getAttribute('data-foto-retrato');
                const fechaNacimiento = this.getAttribute('data-fecha-nacimiento');
                const licencia = this.getAttribute('data-licencia');
                const fechaVencimiento = this.getAttribute('data-fecha-vencimiento');
                const fotoLicencia = this.getAttribute('data-foto-licencia');
                const colorAuto = this.getAttribute('data-color-auto');
                const placaAuto = this.getAttribute('data-placa-auto');
                const numPuertas = this.getAttribute('data-num-puertas');
                const anio = this.getAttribute('data-anio');
                const numAsientos = this.getAttribute('data-num-asientos');
                const marca = this.getAttribute('data-marca');
                const modelo = this.getAttribute('data-modelo');
                const fotoAuto = this.getAttribute('data-foto-auto');
    
                // Actualizar los campos de la modal
                document.getElementById('solicitud').textContent = idSolicitud;
                document.getElementById('nombreCompletoConductor').textContent = nombre;
                document.getElementById('CorreoConductor').textContent = correo;
                document.getElementById('TelefonoConductor').textContent = telefono;
                
                document.getElementById('FotoRetratoConductor').src = "/imagenesProductos/"+fotoRetrato
                console.log(fotoRetrato);

                document.getElementById('FechaNacimientoConductor').textContent = fechaNacimiento;
    
                document.getElementById('viewLicencia').textContent = licencia;
                document.getElementById('viewFechaVencimientoL').textContent = fechaVencimiento;
                document.getElementById('viewFotoLicencia').src = "/imagenesProductos/"+fotoLicencia;
    
                document.getElementById('viewColorAuto').textContent = colorAuto;
                document.getElementById('viewPlacaAuto').textContent = placaAuto;
                document.getElementById('viewNumPuertasAuto').textContent = numPuertas;
                document.getElementById('viewAnioAuto').textContent = anio;
                document.getElementById('viewNumAsientoAuto').textContent = numAsientos;
                document.getElementById('viewMarcaAuto').textContent = marca;
                document.getElementById('viewModeloAuto').textContent = modelo;
                document.getElementById('viewFotoAuto').src = "/imagenesProductos/"+fotoAuto;
            });
        });

    </script>
</body>
</html>

