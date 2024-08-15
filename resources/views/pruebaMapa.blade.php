<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script> {{-- Ncesarios js --}}
    <link rel="stylesheet" type="text/css" href="/css/app.css" /> {{-- Necesario mapa js --}}
    <title>Mapa General</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link font-weight-bold" href="#">Inicio <span class="sr-only">(current)</span></a>
          </li>
  
        </ul>
  
         <!-- Agregar el nombre de usuario -->
        <span class="navbar-text">
          {{-- Usuario: {{$_SESSION['nombre']}} --}}
        </span>
      </div>
    </div>
  </nav>

    <center><h1>Mapa general</h1></center>


    <div id="map"></div>
      <script>
        (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
          key: "AIzaSyDpRCB0Sg5No0ReolmJ-2dOzOsIhrUpb_Y",
        });
      </script>

      {{-- ENVIAR REPARTIDORES AL JS PARA MAPEARLOS EN EL MAPA --}}
{{-- <script type="text/javascript">
    var repartidoreBD = {!! json_encode($repartidores) !!}; // Envio de informacion de repartiores a JS
</script> --}}

    {{-- Enviar negocios al JS para mapearlos en el mapa --}}
    {{-- <script type="text/javascript">
      var negociosBD = {!! json_encode($negocios) !!}; // Envio de informacion de negocios a JS
  </script> --}}

<script type="module" src="/js/MapaAdministrador.js"></script>
</body>
</html>