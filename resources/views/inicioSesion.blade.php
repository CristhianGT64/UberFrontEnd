<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio de sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <Style>
        body{
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        #container{
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
        }
        a{
            font-size: large;
        }
        #btninicioSecion{
            font-size: large;
        }
    </Style>
</head>
<body class= "d-flex justify-content-center align-items-center vh-100"> 
    <div id="container" class= "border p-5 rounded-5" style= "width: 22rem">
    <h1 class= "text-center fs-1 fw-bolder">Inicio de sesión</h1> 
    <div class="mt-3">
        <form action="#" method="POST">
            {{-- //Usamos el metodo post para que no se vea la informacion en la url --}}
            @csrf
                <div>
                <label class="fs-5 fw-bolder" for="email">Email</label>
                <input class="form-control mt-0.5 " type="email" placeholder="Correo Electronico" name="email">
                </div>
                <br>
                <div>
                <label class="fs-5 fw-bolder" for="contrasena">Contraseña</label>
                <input class="form-control mt-0.5" type="password" placeholder="Contraseña" name="contrasena">
                </div>
                <div>
                <br>
                <a  class="text-decoration-none text-primary fw-bold fst-italic" href="{{route('usuario.CrearUsuario')}}">Crear un nuevo Usuario</a>
                <br>
                </div>
                <br>    
                <div class="d-flex justify-content-center">
                <input id="btninicioSecion" class="btn btn-info w-100 mt-2 fw-bold " type="submit" value="Iniciar Sesión" >
                </div>
        </form>
        </div>
    </div>
</body>
</html>