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
            <a href="#"><i class="fas fa-car"></i> Ver Conductores</a>
            <a href="#"><i class="fas fa-users"></i> Ver Usuarios</a>
            <a href="#"><i class="fas fa-route"></i> Ver Viajes</a>
            <a href="#"><i class="fas fa-arrow-left"></i> Salir de modo administrador</a>
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
                                    <th>Fecha de Solicitud</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                    <a href="#" name="AceptarSolicitud" class="btn btn-success btn-sm AceptarSolicitud" data-bs-toggle="modal" data-bs-target="#exampleModal" title="Aceptar">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    <a href="#" name="RechzarSolicitud" class="btn btn-danger btn-sm RechzarSolicitud" data-bs-toggle="modal" data-bs-target="#exampleModal" title="Rechazar">
                                        <i class="fas fa-times"></i>
                                    </a>
                                        <a href="#" name="VerInformacion" class="btn btn-info btn-sm VerInformacion" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver Más"><i class="fas fa-eye"></i></a>
                                    </td>
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
                                    <a href="#" class="btn btn-primary">Ir a Conductores</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Ver Usuarios</h5>
                                    <p class="card-text">Administra la información de los usuarios registrados.</p>
                                    <a href="#" class="btn btn-primary">Ir a Usuarios</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Ver Viajes</h5>
                                    <p class="card-text">Consulta y gestiona los viajes realizados.</p>
                                    <a href="#" class="btn btn-primary">Ir a Viajes</a>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Título del Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <textarea class="form-control observacion" id="observaciones" rows="10" style="width: 100%;"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Confirmar</button>
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
                    Modal.callModal('#exampleModal', event, tipo);  // Llama a la función para personalizar el modal
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

        // Otras funciones de tu código
        function toggleMenu() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            sidebar.classList.toggle('active');
            content.style.marginLeft = sidebar.classList.contains('active') ? '250px' : '0';
        }

        function showRequestsView() {
            document.getElementById('mainView').classList.add('hidden');
            document.getElementById('requestsView').classList.remove('hidden');
        }

        function showMainView() {
            document.getElementById('mainView').classList.remove('hidden');
            document.getElementById('requestsView').classList.add('hidden');
        }

        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(element => {
            new bootstrap.Tooltip(element);
        });
    </script>
</body>
</html>

