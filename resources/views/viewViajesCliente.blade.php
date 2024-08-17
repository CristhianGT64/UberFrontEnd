<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Viajes - Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin-top: 20px;
        }
        .card-header {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 1.25rem;
        }
        .nav-tabs {
            justify-content: space-evenly;
            border-top: 2px solid #ffcc00;
        }
        .nav-link {
            color: #6c757d;
            font-size: 0.9rem;
        }
        .nav-link.active {
            color: #ffcc00;
            border-color: #ffcc00;
        }
        .tab-content {
            padding: 10px 0;
        }
        .btn-custom {
            width: 48%;
            margin: 5px;
        }
        .tab-container {
            margin-top: 20px;
        }
        .refresh-icon {
            font-size: 1.5rem;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-warning text-white d-flex justify-content-between">
                <span>Mis viajes</span>
                <span onclick="location.reload()" class="refresh-icon"><i class="bi bi-arrow-counterclockwise"></i></span>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <!-- En progreso -->
                    <div class="tab-pane fade show active" id="progreso" role="tabpanel" aria-labelledby="progreso-tab">
                        <div class="card mt-3">
                            <div class="card-body">
                                <span class="badge bg-success">TERMINADO</span>
                                <h5 class="card-title mt-2">Centro</h5>
                                <p class="card-text">dsddddddddddddddddddddddddd<br>Su oferta: LPS. 60,00 </p>
                                <div id="map" style="height: 200px; background-color: #e9ecef;"></div>
                                <div class="d-flex justify-content-between mt-3">
                                    <button class="btn btn-danger btn-custom">CANCELAR</button>
                                    <button class="btn btn-success btn-custom">Detalles</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- A calificar -->
                    <div class="tab-pane fade" id="calificar" role="tabpanel" aria-labelledby="calificar-tab">
                        <div class="card mt-3">
                            <div class="card-body">
                                <span class="badge bg-warning">TERMINADO</span>
                                <h5 class="card-title mt-2">Centro, Ceeeffd</h5>
                                <p class="card-text">Cfdfdfdfdf, fdfdf,fdfdfdd<br>Su oferta: LPS 60,00</p>
                                <div id="map" style="height: 200px; background-color: #e9ecef;"></div>
                                <div class="d-flex justify-content-between mt-3">
                                    <button class="btn btn-warning btn-custom">Calificar viaje</button>
                                    <button class="btn btn-primary btn-custom">Generar recibo</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Archivados -->
                    <div class="tab-pane fade" id="archivados" role="tabpanel" aria-labelledby="archivados-tab">
                        <div class="card mt-3">
                            <div class="card-body">
                                <span class="badge bg-secondary">ARCHIVADO</span>
                                <h5 class="card-title mt-2">Centrdsdsds</h5>
                                <p class="card-text">Cidsd, dsdsdds, dsdssdds<br>Su oferta: Lps 60,00 </p>
                                <div id="map" style="height: 200px; background-color: #e9ecef;"></div>
                                <div class="d-flex justify-content-between mt-3">
                                    <button class="btn btn-secondary btn-custom">Ver detalles</button>
                                    <button class="btn btn-danger btn-custom">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-container">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="progreso-tab" data-bs-toggle="tab" data-bs-target="#progreso" type="button" role="tab" aria-controls="progreso" aria-selected="true">
                                <i class="bi bi-clock-history"></i> En progreso
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="calificar-tab" data-bs-toggle="tab" data-bs-target="#calificar" type="button" role="tab" aria-controls="calificar" aria-selected="false">
                                <i class="bi bi-star-fill"></i> A calificar
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="archivados-tab" data-bs-toggle="tab" data-bs-target="#archivados" type="button" role="tab" aria-controls="archivados" aria-selected="false">
                                <i class="bi bi-archive-fill"></i> Archivados
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

