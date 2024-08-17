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
  <title>Vista de Conductores</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #e9ecef;
      color: #343a40;
    }

    /* Header Styles */
    header {
      background-color: #007bff;
      color: #fff;
      padding: 1rem 2rem;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      position: relative;
      z-index: 1040;
    }

    header h1 {
      margin: 0;
      font-size: 2rem;
      text-align: left; /* Align text to the left */
    }

    /* Sidebar Styles */
    .sidebar {
      height: 100vh;
      width: 250px;
      position: fixed;
      top: 0;
      right: 0;
      background-color: #343a40;
      color: #fff;
      padding: 1rem;
      border-left: 2px solid #495057;
      transform: translateX(100%);
      transition: transform 0.3s ease;
      overflow-y: auto;
      z-index: 1040;
    }

    .sidebar.show {
      transform: translateX(0);
    }

    .sidebar .nav-link {
      color: #adb5bd;
      margin-bottom: 0.5rem;
      font-weight: 500;
    }

    .sidebar .nav-link.active {
      color: #fff;
      background-color: #495057;
      border-radius: 0.25rem;
    }

    .profile-picture {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #fff;
      margin-bottom: 1rem;
    }

    /* Main Content Styles */
    .mainView {
      margin-right: 250px;
      padding: 2rem;
      background: linear-gradient(to bottom right, #dee2e6, #f8f9fa);
      min-height: calc(100vh - 140px); /* Adjusting for header and footer height */
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      color: #343a40;
    }

    .mainView h1 {
      font-size: 2.5rem;
      color: #007bff;
      margin-bottom: 1rem;
    }

    .mainView p {
      font-size: 1.25rem;
      color: #6c757d;
    }

    /* Footer Styles */
    footer {
      background-color: #343a40;
      color: #fff;
      padding: 1rem 0;
      text-align: center;
      position: absolute;
      bottom: 0;
      width: 100%;
    }

    footer p {
      margin: 0;
      font-size: 0.875rem;
    }

    /* Toggle Button */
    .toggle-btn {
      position: fixed;
      top: 1rem;
      right: 1rem;
      z-index: 1050;
      background-color: #007bff;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 0.25rem;
      color: #fff;
      font-size: 1.25rem;
      cursor: pointer;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .status-text {
      font-size: 1.2rem;
      margin-left: 10px;
    }

    .form-check-input:checked {
      background-color: #28a745;
      border-color: #28a745;
    }

    .form-check-input:not(:checked) {
      background-color: #dc3545;
      border-color: #dc3545;
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 100%;
        border-left: none;
        border-bottom: 2px solid #495057;
      }
      .mainView {
        margin-right: 0;
        padding: 1rem;
      }
      .toggle-btn {
        top: 0.5rem;
        right: 0.5rem;
      }
    }
  </style>
</head>
<body>

  <!-- Header -->
  <header>
    <h1>Panel de Conductores</h1>
  </header>

  <!-- Toggle Button -->
  <button class="toggle-btn" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-expanded="false" aria-controls="sidebar">
    <i class="fas fa-bars"></i>
  </button>

  <!-- Sidebar -->
  <div id="sidebar" class="sidebar collapse">
    <h4 class="text-center mb-4">Mi Perfil</h4>
    <div class="text-center mb-4">
      <img src="https://via.placeholder.com/100" alt="Perfil" class="profile-picture">
      <h5>{{$_SESSION['nombreCompleto']}}</h5>
      <div class="d-flex align-items-center justify-content-center">
        <label class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="statusSwitch">
        </label>
        <span id="statusText" class="status-text text-danger">Desconectado</span>
      </div>
    </div>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" href="#"><i class="fas fa-home"></i> Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-car"></i> Mis Viajes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-wallet"></i> Mi Cartera</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-envelope"></i> Solicitudes Pendientes</a>
      </li>
      <!-- 
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-check"></i> Solicitudes Aceptadas</a>
      </li> 

      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-times"></i> Cancelados</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-ban"></i> Declinados</a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-car-side"></i> Información del Vehículo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-history"></i> Historia de Pagos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Salir de Modo Conductor</a>
      </li>
    </ul>
  </div>

  <!-- Main Content -->
  <div class="mainView"> 
    <h1>Bienvenido, {{$_SESSION['nombreCompleto']}}r</h1>
    <p>Aquí puedes gestionar tus viajes, tu perfil y más.</p>
  </div>

  <!-- Footer -->
  <footer>
    <p>&copy; 2024 EasyTaxy. Todos los derechos reservados.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('statusSwitch').addEventListener('change', function() {
      var statusText = document.getElementById('statusText');
      if (this.checked) {
        statusText.textContent = 'Disponible';
        statusText.classList.remove('text-danger');
        statusText.classList.add('text-success');
      } else {
        statusText.textContent = 'Desconectado';
        statusText.classList.remove('text-success');
        statusText.classList.add('text-danger');
      }
    });
  </script>
</body>
</html>
