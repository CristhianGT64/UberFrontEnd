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
                <span  class="refresh-icon">
                        <i onclick="location.reload()" class=" bi bi-arrow-counterclockwise"></i>
                        <a class="bi bi-arrow-left-circle return-icon" href="#" ></a>
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

    <!-- Modal para calificación -->
    <div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ratingModalLabel">Califica tu viaje</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="ratingForm">
                    <div class="modal-body">
                        <!-- Calificación con estrellas -->
                        <div class="star-rating">
                            <input type="radio" id="star5" name="rating" value="5"><label for="star5" title="5 estrellas">&#9733;</label>
                            <input type="radio" id="star4" name="rating" value="4"><label for="star4" title="4 estrellas">&#9733;</label>
                            <input type="radio" id="star3" name="rating" value="3"><label for="star3" title="3 estrellas">&#9733;</label>
                            <input type="radio" id="star2" name="rating" value="2"><label for="star2" title="2 estrellas">&#9733;</label>
                            <input type="radio" id="star1" name="rating" value="1"><label for="star1" title="1 estrella">&#9733;</label>
                        </div>
                        <div class="rating-display" id="ratingDisplay">0 estrellas</div>
                        <!-- Campo oculto para almacenar el numero de la calificación, este input es que se envia al BackEnd-->
                        <input type="hidden" id="calificacion" name="calificacion" value="0">
                        <!-- Campo de comentario -->
                        <div class="form-group mt-3">
                            <label for="comentario">Comentario:</label>
                            <textarea class="form-control" id="comentario" name="comentario" rows="4" placeholder="Escribe tu comentario aquí..."></textarea>
                        </div>
                        <div class="alert alert-success mt-3" id="successMessage">¡Calificación enviada exitosamente!</div>
                        <div class="alert alert-danger mt-3" id="errorMessage">Hubo un error al enviar la calificación. Intenta nuevamente.</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Enviar Calificación</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.star-rating input').forEach(input => {
            input.addEventListener('change', function() {
                const rating = this.value;
                document.getElementById('ratingDisplay').textContent = `${rating} estrella${rating > 1 ? 's' : ''}`;
                document.getElementById('calificacion').value = rating;
            });
        });

        document.getElementById('ratingForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            const rating = document.getElementById('calificacion').value;
            const comentario = document.getElementById('comentario').value;

            // Validar que se haya seleccionado al menos 1 estrella
            if (rating < 1) {
                document.getElementById('successMessage').style.display = 'none';
                document.getElementById('errorMessage').style.display = 'block';
                document.getElementById('errorMessage').textContent = 'Por favor, selecciona al menos 1 estrella antes de enviar.';
                return;
            }

            // Simulación de éxito
           // document.getElementById('successMessage').style.display = 'block';
            //document.getElementById('errorMessage').style.display = 'none';
            // También podrías ocultar el modal aquí si el envío es exitoso.
           // setTimeout(() => {
             //   const modal = bootstrap.Modal.getInstance(document.getElementById('ratingModal'));
            //    modal.hide();
            //}, 2000);
        });
    </script>
</body>
</html>




