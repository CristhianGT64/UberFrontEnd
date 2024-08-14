<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyTaxi - Servicios de transporte</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            color: #333;
        }

        .navbar {
            background-color: #343a40;
        }

        .navbar-brand img {
            max-width: 50px;
        }

        .navbar-nav .nav-link {
            color: #fff;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #00aaff;
        }

        .btn-custom {
            background-color: #00aaff;
            border: none;
            color: #fff;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #007bb5;
            transform: scale(1.05);
        }

        .carousel-item img {
            height: 500px;
            object-fit: cover;
        }

        .carousel-caption {
            background: rgba(0, 0, 0, 0.5);
            border-radius: 5px;
            padding: 10px;
        }

        .services {
            padding: 50px 0;
            background-color: #007bb5;
            color: #fff;
        }

        .card {
            border: none;
            border-radius: 10px;
            margin-top: 20px;
            color: #333;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            height: 200px;
            object-fit: cover;
        }

        .footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .footer i {
            margin-right: 5px;
        }

        .footer a {
            color: #fff;
            margin: 0 10px;
            text-decoration: none;
        }

        .footer a:hover {
            color: #00aaff;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="https://via.placeholder.com/50" alt="Logo"> EasyTaxi
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-house-door"></i> Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-info-circle"></i> Acerca de nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-car-front"></i> Viajes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-person-vcard"></i> Conducir</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-custom" href="#"><i class="bi bi-box-arrow-in-right"></i> Inicia Sesión</a>
                        </li>
                        <li class="nav-item ms-4">
                            <a class="btn btn-custom " href="#"><i class="bi bi-person-plus"></i> Regístrate</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://images.unsplash.com/photo-1584467735873-a80a4cb5d304" class="d-block w-100" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Transporte confiable</h5>
                        <p>Servicios de transporte rápidos y confiables a tu alcance.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://example.com/imagen-transporte.jpg" class="d-block w-100" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Paseos rápidos</h5>
                        <p>Obtenga un viaje en minutos con nuestras opciones de servicio rápido.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1541748715189-9e4f2c39a2b3" class="d-block w-100" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Cobertura</h5>
                        <p>Disponible en la ciudad de Tegucigalpa.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container services">
            <h2 class="text-center mb-5">Nuestros servicios</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d" class="card-img-top" alt="Taxi Service">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-car-front"></i> Servicio de taxi</h5>
                            <p class="card-text">Servicio de taxi confiable y rápido disponible las 24 horas, los 7 días de la semana para satisfacer todas sus necesidades de transporte.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1506629082955-511b1e2f9b7a" class="card-img-top" alt="Quick Ride">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-clock"></i> Paseo rápido</h5>
                            <p class="card-text">Llega rápidamente a tu destino con tus opciones de viaje exprés.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1573497491208-6b1acb260507" class="card-img-top" alt="Global Coverage">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-globe"></i> Cobertura</h5>
                            <p class="card-text">Disfrute de un transporte sin interrupciones en la ciudad de Tegucigalpa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    
        <footer class="footer">
            <div class="container">
                <p><i class="bi bi-mortarboard"></i> Clase: Base de Datos I</p>
                <p><i class="bi bi-people"></i> Grupo: #2</p>
                <p><i class="bi bi-person"></i> Integrantes:</p>
                
        </footer>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>