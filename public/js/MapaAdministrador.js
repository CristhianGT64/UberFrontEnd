// import {ubicacionRepartidor} from '../js/ubicacionRepartidor.js';

const Repartidores = [];
const locations = [
    { lat: 14.0857108, lng: -87.1994419  },
    ];
const locationNegocios = [];
var markersGlbal = [];
var makerNegocios = [];
var mapaGlobal = '';
const imageRepartidor = "/imagenes/cascoLogo.png";
const imageNegocio = "/imagenes/LogoTienda.png";

// console.log(repartidoreBD);//

// Función para calcular una nueva posición
//La distancia debe de recibirse como km, es decir 4,3,2,1
function CalcularPosicion(lat, lng, distancia, rumbo) {
    const R = 6371; // Radio de Teguscigalpa y comayaguela aprox en km, este valor es si o si obligatorio
    const ad = distancia / R; // Convierte la distancia a un ángulo en radianes
    const lat1 = (Math.PI / 180) * lat; // Convierte la latitud a radianes
    const lng1 = (Math.PI / 180) * lng; // Convierte la longitud a radianes
    const rumb = (Math.PI / 180) * rumbo; // Convierte el rumbo a radianes
  
    const lat2 = Math.asin(Math.sin(lat1) * Math.cos(ad) + Math.cos(lat1) * Math.sin(ad) * Math.cos(rumb));
    const lng2 = lng1 + Math.atan2(Math.sin(rumb) * Math.sin(ad) * Math.cos(lat1), Math.cos(ad) - Math.sin(lat1) * Math.sin(lat2));
  
    return {
      lat: ((180 / Math.PI) * lat2), // Convierte la latitud a grados
      lng: (180 / Math.PI) * lng2, // Convierte la longitud a grados
    };
  }

  function gradosRadianes(grados){
    return (Math.PI / 180) * grados;
}

function RadianesGrados(radianes){
    return ((180 / Math.PI) * radianes);
}


//     async function actualizarUbicaciones() {
//             locations.length = 0;

//             //Recorremos la lista donde guardamos los objetos de repartidores

//             Repartidores.forEach(repartidor => {
//                 //Antes de modificar las posiciones validaremos si estan disponibles 
//                 //los repartidores
                
//                 var estado;
//                 fetch('http://localhost:8081/api/Usuario/EstadoRepartidor?idRepartidor='+repartidor.idRepartidor)
//                 .then( response => response.json())
//                 .then(data => {
//                     repartidor.disponible = data;
//                     // console.log(estado)
//                 })

//                 // console.log(repartidor.disponible)
//                 if(repartidor.disponible === false){
                    
//                 }

//                 //Cambiar de estado en objeto
//                 // console.log(estado);
//                 // console.log(estado.data);
//                 repartidor.ModificarDireccion();
//                 repartidor.ModificarAngulo();
//                 var nvaPosicion = CalcularPosicion(14.0857108 , -87.1994419, repartidor._distanciaActualDelCentro, repartidor._rumbo);
//                 repartidor.latRepartidor = nvaPosicion.lat;
//                 repartidor.lngRepartidor = nvaPosicion.lng;
//                 locations.push(nvaPosicion);

//                 //Enviar ubicacion al servidor y guardarlos
//                 fetch('http://localhost:8081/api/Usuario/ActualizarUbicacion', {
//                     method: 'PUT',
//                     headers: {
//                         'Content-Type': 'application/json; charset=UTF-8',
//                     },
//                     body: JSON.stringify({
//                         id: repartidor.idRepartidor,
//                         latitud: repartidor.latRepartidor,
//                         longitud : repartidor.lngRepartidor
//                     }),
//                     })
//                     .then(response => response.text()) //Espera la respuesta que se desa obtener
//                     // .then(data => console.log(data))
//                     .catch((error) => {
//                     console.error('Error:', error);
//                     });

//             });
//             // fetch('http://localhost:8081/api/Usuario/TraerRepartidores')
//             // .then(response => response.json())
//             // .then(data => console.log(data));
//             eliminarMarcadores();
//             crearMarcadores(mapaGlobal, imageRepartidor, locations);
// }


    function eliminarMarcadores() {
        for (var i = 0; i < markersGlbal.length; i++) {
            markersGlbal[i].setMap(null);
        }
        markersGlbal.length = 0; // Vacía el array de marcadores
    }


        async function crearMarcadores(map, image, mapPosition, tipo){

                        const infoWindow = new google.maps.InfoWindow({
                            content: "",
                            disableAutoPan: true,
                        });

                        // Añade algunos marcadores al mapa No se usan
                        mapPosition.map((posiciones) => {

                            //Imagen para indicadores de conductores -----
        
                            const beachFlagImg = document.createElement("img"); //creamos una imagen en el html
                            // const beachFlagImg.src = "/imagenes/logoRepartidor.jpg";
                            beachFlagImg.src = image; //decimos a que es igual esa imagen
                            beachFlagImg.width = 23; // Ancho de la imagen en píxeles
                            beachFlagImg.height = 23; // Alto de la imagen en píxeles
        
                            ///Termina imagenes para Repartidor
        
                        //Cuando se instancia cada funcion del mapa se debe de poner
                        // su paramentro, funcionan tipo clave valor
                        //Este es para mapear los marcadores, es decir, hacer los dibujos de los marcadores
                        var marker = new google.maps.marker.AdvancedMarkerElement({
                            map,
                            position: posiciones, //Este es el encargado de poner los marcadores
                            title: 'Uluru',
                            content: beachFlagImg, // le decimos que los nuevos inconos seran la imagen que importamos
                        });

                        if(tipo === 'negocio'){
                            makerNegocios.push(marker);
                        }else{
                            markersGlbal.push(marker);
                        }
        
                        // console.log(Repartidores);
        
                                // abre la ventana de información cuando se hace clic en el marcador
                            marker.addListener("click", () => {
                                infoWindow.setContent(posiciones.lat + ", " + posiciones.lng); //Este sera modificado para despues poner los nombres de los negocios
                                infoWindow.open(map, marker); //Abre el globo de texto
                                map.setCenter(posiciones);
                                map.setZoom(16);
                                });
                        });


        }

        function calcularRumbo(repartidor){ //Con este nos ayudara a obtener el rumbo y en base a el generar numeros aleatorios de rumbo
            const latRepartidor = gradosRadianes(repartidor.latitud);
            const lngRepartidor = gradosRadianes(repartidor.longitud);
            const lngBase = gradosRadianes(-87.1994419);
            const latBase = gradosRadianes(14.0857108) 
            const deltaY = lngRepartidor - lngBase;
            const x = Math.cos(latRepartidor)*Math.sin(deltaY);
            const y = Math.cos(latBase)*Math.sin(latRepartidor) - Math.sin(latBase)*Math.cos(latRepartidor)*Math.cos(deltaY);
            const rumbo = Math.atan2(x,y);
            var rumboGrados = RadianesGrados(rumbo);
            if(rumboGrados < 0){
                rumboGrados += 360;
            }
            // console.log(rumboGrados);
            return rumboGrados;
        }

        //Ahora calcularemos la distancia entre dos ubicaciones, la base y la del repartidor
        function calcularDistancia(repartidor){
            const R = 6371; // Radio de la Tierra en km, este valor es si o si obligatorio
            const deltaLatitud = gradosRadianes(repartidor.latitud - 14.0857108);
            const deltaLongitud = gradosRadianes(repartidor.longitud - -87.1994419);
            // const lngBase = gradosRadianes(position.lng);
            const latBase = gradosRadianes(14.0857108) 
            const latRepartidor = gradosRadianes(repartidor.latitud);
            // const lngRepartidor = gradosRadianes(repartidor.longitud);
            var a = Math.pow(Math.sin(deltaLatitud / 2) , 2) + Math.cos(latBase) * Math.cos(latRepartidor) * Math.pow(Math.sin(deltaLongitud / 2), 2);
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a)); //Caular la distancia real
            var d = R*c;
            // console.log(R * c)
            // console.log();
            if(d < 0){
                return (d*-1)
            }
            console.log(d);
            return d;
        }

        //Meter ubicaciones traida de la base de datos a location
        // repartidoreBD.forEach(repartidor => {
        //     const id = repartidor.idusuario;
        //     const latRepartidor = repartidor.latitud;
        //     const lngRepartidor = repartidor.longitud;
        //     const nvoPosicionRepartidor = new ubicacionRepartidor(id, calcularRumbo(repartidor), calcularDistancia(repartidor), latRepartidor, lngRepartidor);
        //     Repartidores.push(nvoPosicionRepartidor);
        //     const posicion = { lat: latRepartidor, lng:lngRepartidor };
        //     locations.push(posicion);
        // });

        //Meter ubicaciones traida de la base de datos a locationNegocios
        // negociosBD.forEach(negocio => {
        //     const ubicacionNegocio = {lat: negocio.latitud, lng:negocio.longitud};
        //     locationNegocios.push(ubicacionNegocio);
        // });


    async function initMap() {

        // console.log(negociosBD);

            // Librerias necesarias para el mapa, map, infoWindows y marker
            const { Map, InfoWindow } = await google.maps.importLibrary("maps");
            const { AdvancedMarkerElement, PinElement } = await google.maps.importLibrary(
                "marker",
            );
            const position = { lat: 14.0857108 , lng: -87.1994419 };//Variable con posicion que usaremos como
            //centro de nuestro mapa

            //Nueva instancia de un mapa de google
            var map = new google.maps.Map(document.getElementById("map"), {
                zoom: 12, //zoom incial de nuestra app
                center: position, //Posicion de nuestro mapa cuando inicie
                draggable:true,
                mapId: "DEMO_MAP_ID", // Lo podemos usar para modificar el disenio de nuestro maapa
            });
            mapaGlobal = map;


            // Crea un objeto Circle para saber en donde vamos a estar
            const cityCircle = new google.maps.Circle({
                strokeColor: "#FF0000", // Color del borde del círculo
                strokeOpacity: 0.8, // Opacidad del borde
                strokeWeight: 2, // Grosor del borde
                fillColor: "#00ff38", // Color de relleno del círculo
                fillOpacity: 0.2, // Opacidad del relleno
                map, // Asocia el círculo al mapa que has creado
                center: position, // Centro del círculo en las coordenadas de latitud y longitud
                radius: 5000, // Radio del círculo en metros, es el mismo que definimos arriba
            });  
            //  markerGlobal = crearMarcadores(map, imageRepartidor, locations); //Creamos los marcadores
             crearMarcadores(map,imageNegocio, locationNegocios, 'negocio');
    } /* Final del init map */



    
initMap(); //Llamado a la funcion
// setInterval(actualizarUbicaciones,500);