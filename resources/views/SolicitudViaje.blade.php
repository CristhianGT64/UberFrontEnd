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
    <title>Solicitud de Viaje</title>
    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 30px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            font-size: 1.25rem;
            text-align: center;
            padding: 1rem;
        }
        .card-body {
            padding: 2rem;
        }
        #map {
            height: 300px;
            width: 100%;
            border-radius: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .form-control {
            border-radius: 10px;
        }
        .input-group-text {
            border-radius: 10px 0 0 10px;
        }
        .input-group input {
            border-radius: 0 10px 10px 0;
        }
        @media (max-width: 768px) {
            #map {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Solicita tu Viaje
            </div>
            <div class="card-body">
                <form action="{{route('solicitud.solictarViaje')}}" method="POST" id="locationForm">
                    @csrf
                    <div class="mb-3">
                        <label for="origen" class="form-label">Origen</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                            <input type="text" id="origen" class="form-control" placeholder="Ingresa tu origen" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="destino" class="form-label">Destino</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-geo-fill"></i></span>
                            <input type="text" id="destino" class="form-control" placeholder="Ingresa tu destino" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tarifa" class="form-label">Tarifa</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" id="tarifa" name="tarifa" class="form-control" placeholder="Ingresa la tarifa" min="0" step="0.01" required>
                        </div>
                    </div>
                    <div id="map" class="mb-3"></div>
                    <input type="hidden" name="latitudOrigen" id="latitudOrigen">
                    <input type="hidden" name="longitudOrigen" id="longitudOrigen">
                    <input type="hidden" name="latitudDestino" id="latitudDestino">
                    <input type="hidden" name="longitudDestino" id="longitudDestino">
                    <div class="d-grid">
                        <input type="submit" id="submitButton" value="Solicitar Conductor" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5.3.3 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Google Maps JavaScript API with Places Library -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpRCB0Sg5No0ReolmJ-2dOzOsIhrUpb_Y&libraries=places&callback=initMap"
        async
        defer
    ></script>
    <!-- Archivo script para logica del mapa -->
    <script >

        let map;
        let autocompleteOrigen;
        let autocompleteDestino;
        let markerOrigen;
        let markerDestino;
        let directionsService;
        let directionsRenderer;

        function initMap() {
            const tegucigalpaBounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(13.9904, -87.2294), // SW corner
                new google.maps.LatLng(14.0754, -87.1498)  // NE corner
            );

            const defaultPos = { lat: 14.089889, lng: -87.213806 };
            map = new google.maps.Map(document.getElementById("map"), {
                center: defaultPos,
                zoom: 13,
                mapTypeId: 'roadmap'
            });

            directionsService = new google.maps.DirectionsService();
            directionsRenderer = new google.maps.DirectionsRenderer();
            directionsRenderer.setMap(map);

            autocompleteOrigen = new google.maps.places.Autocomplete(document.getElementById("origen"), {
                bounds: tegucigalpaBounds,
                strictBounds: true
            });
            autocompleteDestino = new google.maps.places.Autocomplete(document.getElementById("destino"), {
                bounds: tegucigalpaBounds,
                strictBounds: true
            });

            autocompleteOrigen.addListener("place_changed", () => {
                const place = autocompleteOrigen.getPlace();
                if (place.geometry && place.geometry.location) {
                    if (markerOrigen) markerOrigen.setMap(null);
                    markerOrigen = new google.maps.Marker({
                        map,
                        position: place.geometry.location,
                        title: place.name,
                        draggable: true
                    });
                    document.getElementById("latitudOrigen").value = place.geometry.location.lat();
                    document.getElementById("longitudOrigen").value = place.geometry.location.lng();
                    updateRoute();
                }
            });

            autocompleteDestino.addListener("place_changed", () => {
                const place = autocompleteDestino.getPlace();
                if (place.geometry && place.geometry.location) {
                    if (markerDestino) markerDestino.setMap(null);
                    markerDestino = new google.maps.Marker({
                        map,
                        position: place.geometry.location,
                        title: place.name,
                        draggable: true
                    });
                    document.getElementById("latitudDestino").value = place.geometry.location.lat();
                    document.getElementById("longitudDestino").value = place.geometry.location.lng();
                    updateRoute();
                }
            });
        }

        function updateRoute() {
            if (markerOrigen && markerDestino) {
                const request = {
                    origin: markerOrigen.getPosition(),
                    destination: markerDestino.getPosition(),
                    travelMode: google.maps.TravelMode.DRIVING
                };

                directionsService.route(request, (result, status) => {
                    if (status === google.maps.DirectionsStatus.OK) {
                        directionsRenderer.setDirections(result);
                    } else {
                        alert("No se pudo obtener la ruta. Intenta de nuevo.");
                    }
                });
            }
        }

        document.getElementById("submitButton").addEventListener("click", () => {
            if (document.getElementById("latitudOrigen").value && document.getElementById("latitudDestino").value) {
                document.getElementById("locationForm").submit();
            } else {
                alert("Por favor, selecciona ambas ubicaciones antes de enviar.");
            }
        });



    </script>
</body>
</html>




