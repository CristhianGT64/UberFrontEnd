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

        .bi bi-taxi-front-fill{
            width: 20px;
            height: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                <i class="bi bi-taxi-front-fill"></i>  EasyTaxi
                </a>
                <a class="btn btn-secondary" href="{{route('usuario.cerrarSesion')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                        <path d="M7.5 1v7h1V1z"/>
                        <path d="M3 8.812a5 5 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812"/>
                    </svg>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-house-door"></i> Inicio</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-info-circle"></i> Acerca de nosotros</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('solicitud.menuCliente')}}"><i class="bi bi-car-front"></i> Viajes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('conductor.cambiarModo')}}"><i class="bi bi-person-vcard"></i> Conducir</a>
                        </li>
                        @foreach ($_SESSION['roles'] as $rol)
                            @if ($rol === 1)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('Administrador.cambiarModo')}}"><i class="bi bi-building"></i> Administrar</a>
                                </li>
                                @break
                             @endif
                        @endforeach

                        <li class="nav-item">
                            <p class="nav-link" href="#"><i class="bi bi-envelope"></i> {{$_SESSION['correo']}}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
              <div class="navbar-brand" href="#">
            
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                      </svg>
                  </svg>
                    Bienvenido {{ $_SESSION['nombreCompleto'] }}
                </div>
            </div>
          </nav>

          @if ((session('status') == 1))
          <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
            <symbol id="check-circle-fill" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
            <symbol id="info-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </symbol>
            <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
          </svg>
          
          <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
               Solicitud Enviada con exito para revision
            </div>
          </div>
          @endif

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
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
                        <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d" class="card-img-top" alt="Quick Ride">
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