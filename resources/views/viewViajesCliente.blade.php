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
            display: flex;
            align-items: center;
        }
        .refresh-icon .return-icon {
            font-size: 1.25rem;
            color: #6c757d;
            margin-left: 10px;
        }
        .star-rating {
            display: flex;
            flex-direction: row;
            font-size: 2rem; /* Tamaño de las estrellas */
            color: #e4e5e9; /* Color de estrellas vacías */
            cursor: pointer;
            position: relative;
        }
        .star-rating input {
            display: none;
        }
        .star-rating label {
            margin-right: 0.1rem;
            cursor: pointer;
            color: #e4e5e9; /* Color de estrellas vacías */
        }
        .star-rating input:checked ~ label {
            color: #ffc107; /* Color de estrellas llenas */
        }
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #ffeb3b; /* Color de estrellas al pasar el ratón */
        }
        .star-rating .half-star {
            position: absolute;
            top: 0;
            left: 0;
            width: 50%;
            overflow: hidden;
            color: #ffc107; /* Color de media estrella */
        }
        .star-rating input.half:checked ~ label {
            color: #ffc107; /* Color de estrella llena al seleccionar medio */
        }
        .star-rating input.half:checked ~ .half-star {
            width: 50%;
        }
        .rating-display {
            font-size: 1.2rem;
            margin-top: 10px;
            color: #ffc107;
        }
        .alert {
            display: none;
        }
        .form-control {
            resize: none;
        }
        .alert.error {
            display: block;
        }
        /* Estilos para el icono de regresar */
        .return-icon {
            font-size: 1.25rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-warning text-white d-flex justify-content-between">
                <span>Mis viajes</span>
                <span class="refresh-icon">
                    <i class="bi bi-arrow-counterclockwise" onclick="location.reload()"></i>
                    <a class="bi bi-arrow-left-circle return-icon" ></a> <!-- Aqui se coloca el link de pagina principal para los usuarios -->
                </span>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <!-- En progreso: Aqui se hacer la logica e interracion entre el conducto y cliente relacionado al viaje -->
                    <div class="tab-pane fade show active" id="progreso" role="tabpanel" aria-labelledby="progreso-tab">
                        <div class="card mt-3">
                            <div class="card-body">
                                <span class="badge bg-success">TERMINADO</span>
                                <h5 class="card-title mt-2">Centro</h5>
                                <p class="card-text">dsddddddddddddddddddddddddd<br>Su oferta: LPS. 60,00 </p>
                                <div id="map" style="height: 200px; background-color: #e9ecef;"></div>
                                <div class="d-flex justify-content-between mt-3">
                                    <!-- En progreso: Aqui se hacer la logica e interracion entre el conducto y cliente relacionado al viaje -->
                                    <button class="btn btn-danger btn-custom" style="width: 100%;" id="cancelarViaje">CANCELAR SOLICITUD</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- A calificar: Aqui se es card de cuando el viaje termino y el usuario deber dar su calificacion-->
                    <div class="tab-pane fade" id="calificar" role="tabpanel" aria-labelledby="calificar-tab">
                        <div class="card mt-3">
                            <div class="card-body">
                                <span class="badge bg-warning">TERMINADO</span>
                                <h5 class="card-title mt-2">Centro, Ceeeffd</h5>
                                <p class="card-text">Cfdfdfdfdf, fdfdf,fdfdfdd<br>Su oferta: LPS 60,00</p>
                                <div id="map" style="height: 200px; background-color: #e9ecef;"></div>
                                <div class="d-flex justify-content-between mt-3">
                                    <button class="btn btn-warning btn-custom" data-bs-toggle="modal" data-bs-target="#ratingModal">Calificar viaje</button>
                                    <button class="btn btn-primary btn-custom" class="viewRecibo" class="viewRecibo">Ver recibo</button>
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
                                    <button class="btn btn-primary btn-custom">Ver Recibo</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-container">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <span class="nav-link active" id="progreso-tab" data-bs-toggle="tab" data-bs-target="#progreso" type="button" role="tab" aria-controls="progreso" aria-selected="true">
                                <i class="bi bi-clock-history"></i> En progreso
                            </span>
                        </li>
                        <li class="nav-item" role="presentation">
                            <span class="nav-link" id="calificar-tab" data-bs-toggle="tab" data-bs-target="#calificar" type="button" role="tab" aria-controls="calificar" aria-selected="false">
                                <i class="bi bi-star-fill"></i> A calificar
                            </span>
                        </li>
                        <li class="nav-item" role="presentation">
                            <span class="nav-link" id="archivados-tab" data-bs-toggle="tab" data-bs-target="#archivados" type="button" role="tab" aria-controls="archivados" aria-selected="false">
                                <i class="bi bi-archive-fill"></i> Archivados
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para calificación -->
    <div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ratingModalLabel">Calificar viaje</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="star-rating">
                            <input type="radio" id="star5" name="rating" value="5" />
                            <label for="star5" title="5 estrellas">★</label>
                            <input type="radio" id="star4" name="rating" value="4" />
                            <label for="star4" title="4 estrellas">★</label>
                            <input type="radio" id="star3" name="rating" value="3" />
                            <label for="star3" title="3 estrellas">★</label>
                            <input type="radio" id="star2" name="rating" value="2" />
                            <label for="star2" title="2 estrellas">★</label>
                            <input type="radio" id="star1" name="rating" value="1" />
                            <label for="star1" title="1 estrella">★</label>
                        </div>
                        <textarea class="form-control mt-3" rows="3" placeholder="Deja un comentario..."></textarea>
                        <button type="submit" class="btn btn-primary mt-3">Enviar calificación</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>





