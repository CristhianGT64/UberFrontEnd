<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista Conductor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin-top: 20px;
        }
        .btn-custom {
            width: 45%;
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-warning text-white">
                Solicitudes pendientes
            </div>
            <div class="card-body">
                <h5 class="card-title">Centro, Centro Histórico</h5>
                <p class="card-text">Colonia Kennedy<br>
                    LPS. 60,00 
                </p>
                <div id="map" style="height: 200px; background-color: #e9ecef;"></div>
                <div class="d-flex justify-content-between mt-3">
                    <button class="btn btn-danger btn-custom">Declinar</button>
                    <button class="btn btn-success btn-custom">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
