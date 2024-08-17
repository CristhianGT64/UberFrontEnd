<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="card p-4">
            <!-- Logo -->
            <div class="text-center mb-4">
                <img src="{{ asset('path_to_logo') }}" alt="Logo" class="img-fluid" style="height: 50px;">
                <h3 class="mt-2">Recibo por tu servicio</h3>
                <!-- Número de factura  -->
                <p class="mb-1"><strong>Número de factura:</strong> HN240725101515Qfa</p>
                <p class="mb-1"><strong>Fecha:</strong> July 25, 2024</p>
            </div>
            
            <!-- Información del pasajero -->
            <p><strong>Para:</strong> Cristhian Lopez</p>
            
            <!-- Información del viaje -->
            <p><strong>Tipo de solicitud:</strong> Viaje urbano</p>
            <p><strong>Nombre del conductor:</strong> Jose Luis Valladares Rivera</p>
            <p><strong>Detalles del auto:</strong> Red Suzuki S-Presso HCW9452</p>
            
            <!-- Fecha y detalles del viaje -->
            <p><strong>Fecha del viaje:</strong> July 25, 2024</p>
            <p><strong>Recogida:</strong> Bulevard Norte, Tegucigalpa y Comayagüela, Distrito central, Honduras - 4:25 AM, July 25, 2024</p>
            <p><strong>Dejada:</strong> Transporte Cristina, Tegucigalpa y Comayagüela, Distrito central, Honduras - 4:39 AM, July 25, 2024</p>

            <!-- Tabla de precios -->
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Monto</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tarifa del viaje (incluye impuestos)</td>
                        <td>L 120.00</td>
                    </tr>
                </tbody>
            </table>

            <!-- Método de pago y total -->
            <div class="d-flex justify-content-between">
                <p><strong>Método de pago:</strong> Efectivo</p>
                <p><strong>Monto total:</strong> L 120.00</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
