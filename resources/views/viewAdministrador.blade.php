<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panel de Administrador - Servicio de Transporte</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
                background-color: #f8f9fa;
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
            }
            .sidebar a:hover {
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
        </style>
    </head>
    <body>
        <header class="header">
            <h1>Panel de Administrador - EasyTaxy</h1>
            <button class="menu-toggle" onclick="toggleMenu()"><i class="fas fa-bars"></i></button>
        </header>

        <div class="wrapper">
            <nav class="sidebar" id="sidebar">
                <h4>Menú de Administrador</h4>
                <a href="#"><i class="fas fa-check-circle"></i> Aceptar Solicitudes</a>
                <a href="#"><i class="fas fa-car"></i> Ver Conductores</a>
                <a href="#"><i class="fas fa-users"></i> Ver Usuarios</a>
                <a href="#"><i class="fas fa-route"></i> Ver Viajes</a>
                <a href="{{route('usuario.menuCliente')}}"><i class="fas fa-arrow-left"></i> Salir de modo admministrador</a>
            </nav>
            
            <main class="content" id="content">
                <div class="container main-content">
                    <h2>Bienvenido, Administrador</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Aceptar Solicitudes</h5>
                                    <p class="card-text">Gestiona las solicitudes de nuevos conductores o usuarios.</p>
                                    <a href="#" class="btn btn-primary">Ir a Solicitudes</a>
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
            </main>
        </div>

        <footer class="bg-dark text-white text-center py-3 mt-auto">
            <p>&copy; 2024 EasyTaxy. Todos los derechos reservados.</p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            function toggleMenu() {
                const sidebar = document.getElementById('sidebar');
                sidebar.classList.toggle('active');
            }
        </script>
    </body>
</html>
