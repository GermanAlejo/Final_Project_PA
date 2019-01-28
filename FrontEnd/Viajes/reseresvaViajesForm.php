<head></head>
<!--This page contains all html and php code for the login of the users
    All of the vaidations will be done in the this same page as the html form
    once the user has log in the page will redirect the user to index.php-->
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="icon" href="../../FrontEnd/img/icon.png">
        <title>Tripshare</title>

        <!-- Bootstrap core CSS -->
        <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


        <!-- Custom fonts for this template -->
        <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="../../FrontEnd/css/landing-page.min.css" rel="stylesheet">

        <!-- CSS maps-->
        <link href="../css/maps.css" rel="stylesheet">

        <!-- Bootstrap core JavaScript -->
        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- API Google -->
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMUO9y2pHnf2AujLJt5KAGA0sNXhQp9wE&callback=initMap&libraries=places">
        </script>

  <?php
        include '../../libraries.php';
        include_once '../../BackEnd/Usuario/registro.php';
        ?>

        <?php
        include_once '../../BackEnd/Usuario/registro.php';
        // registrationForm();
        registroForm();
        ?>

    </head>

    <body>

        <div>
            <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
                <h5 class="my-0 mr-md-auto font-weight-normal">
                    <a href="../../index.php">
                        <img src="../../FrontEnd/img/tripshare logo2.png" height="60"></h5>
                    </a>
                    <nav class="my-2 my-md-0 mr-md-3">
                        <a class="p-2 text-dark" href="#">Buscar viaje</a>
                        <a class="p-2 text-dark" href="#">Organizar viaje</a>

                        <!-- notice that the Profile and the sigh up buttom will be changed so they switch between them-->
                        <a href="#" class="dropdown-toggle active" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Perfil</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <a href="../../FrontEnd/Usuario/ajusteUsuarioForm.php" class="dropdown-item">Mis datos</a>
                            <a href="../../FrontEnd/Usuario/ajusteVehiculoForm.php" class="dropdown-item">Mis vehículos</a>
                            <a href="../../FrontEnd/Viajes/viajesPendientesForm.php" class="dropdown-item">Viajes pendientes</a>
                            <a href="../../FrontEnd/Viajes/viajesRealizadosForm.php" class="dropdown-item">Viajes realizados</a>
                            <a href="#" class="dropdown-item">Cerrar Sesión</a>
                        </div>
                    </nav>
                    <a href="../../FrontEnd/Usuario/loginForm.php" class="btn btn-outline-primary" href="#">Acceder</a>
            </div>
        </div>

        <header class="masthead text-center">
            <!--<div class="overlay"></div>-->
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 mx-auto text-white text-center">
                        <h1 class="mb-5 ">Visualiza tu ruta</h1>
                    </div>
                    <div id="map"></div>
                    <script>
                        var map, places, infoWindow;
                        var incio;
                        var fin;
                        var countryRestrict = {'country': 'es'};
                        var countries = {
                            'es': {
                                center: {lat: 40.5, lng: -3.7},
                                zoom: 5
                            }
                        };



                        function initMap() {
                            var directionsService = new google.maps.DirectionsService;
                            var directionsDisplay = new google.maps.DirectionsRenderer;
                            var map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 6,
                                center: {lat: 40, lng: -3},
                                mapTypeControl: false
                            });


                            incio = new google.maps.places.Autocomplete((
                                    document.getElementById('inicio')), {
                                types: ['(cities)'],
                                componentRestrictions: countryRestrict
                            });

                            fin = new google.maps.places.Autocomplete((
                                    document.getElementById('fin')), {
                                types: ['(cities)'],
                                componentRestrictions: countryRestrict
                            });

                            places = new google.maps.places.PlacesService(map);

                            directionsDisplay.setMap(map);
                            document.getElementById('submit').addEventListener('click', function () {
                                calculateAndDisplayRoute(directionsService, directionsDisplay);
                            });

                        }

                        function calculateAndDisplayRoute(directionsService, directionsDisplay) {
                            var waypts = [];
                            var checkboxArray = document.getElementById('descanso');
                            for (var i = 0; i < 0; i++) {
                                if (checkboxArray.options[i].selected) {
                                    waypts.push({
                                        location: checkboxArray[i].value,
                                        stopover: true
                                    });
                                }
                            }

                            directionsService.route({
                                origin: document.getElementById('inicio').value,
                                destination: document.getElementById('fin').value,
                                waypoints: waypts,
                                optimizeWaypoints: true,
                                travelMode: 'DRIVING'
                            }, function (response, status) {
                                if (status === 'OK') {
                                    directionsDisplay.setDirections(response);
                                    var route = response.routes[0];
                                    var summaryPanel = document.getElementById('directions-panel');
                                    summaryPanel.innerHTML = '';
                                    // For each route, display summary information.
                                    for (var i = 0; i < route.legs.length; i++) {
                                        var routeSegment = i + 1;
                                        summaryPanel.innerHTML += '<b>Route Segment: '
                                        '</b><br>';
                                        summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
                                        summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
                                        summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
                                        //alert('Distancia = ' +  route.legs[i].distance.text);
                                    }

                                } else {
                                    window.alert('Directions request failed due to ' + status);
                                }
                            });
                        }

                    </script>

                    <script async defer
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMUO9y2pHnf2AujLJt5KAGA0sNXhQp9wE&callback=initMap&libraries=places">
                    </script>
                </div>
            </div>

        </header>


        <!-- Conductores -->
        <section class="testimonials text-center bg-light">
            <div class="container">
                <h2 class="mb-5">Conductores disponibles</h2>
                <div class="row">


                    <?php
                    for ($i = 0; $i < 5; $i++) {

                        echo ' <div class="col-lg-6 col-sm-12 mb-3">';
                        echo '     <div class="card"> ';
                        echo '   <div class="card-body">';
                        echo '       <div class="row ">';
                        echo '           <div class="col-md-4">';
                        echo '               <img class="user-pic" src="../img/user_icon.jpg" alt="" width="100px">';
                        echo '           </div>';
                        echo '           <div class="col-md-8">';
                        echo '               <h4>Conductor </h4>';
                        echo '               <h6>nombre del tipejo</h6>';
                        echo '           </div>';
                        echo '       </div>';
                        echo '       <div class="row ">  ';
                        echo '           <div class="col-md-4">  ';
                        echo '               <ul class="list-unstyled list-inline">';
                        echo '                   <li class="list-inline">Origen:</li>';
                        echo '                   <li class="list-inline">Destino:</li>';
                        echo '                   <li class="list-inline">Distancia:</li>';
                        echo '               </ul> ';
                        echo '           </div>';
                        echo '           <div class="col-md-2"></div>';
                        echo '           <div class="col-md-6">   ';

                        echo '               <h6>3 Asientos libres</h6>';
                        echo '               <input type="number" name="quantity" min="1" max="5" value="1">';

                        echo '               <button type="button" class="btn btn-secondary btn-sm btn-block">Reservar asientos</button>';

                        echo '           </div>';
                        echo '       </div>';
                        echo '     </div>';
                        echo '  </div>';
                        echo '</div>';
                    }
                    ?>

                </div>
            </div>

        </section>

        <div id="right-panel">
            <div>
                <b>Start:</b>
                <input type="text" name="inicio" value="" id="inicio"/>
                <br>

                <b>End:</b>
                <input type="text" name="fin" value="" id="fin"/>

                <input type="submit" id="submit" value="Calcular ruta">

            </div>
            <div id="directions-panel"></div>
        </div>


    </body>


    <!-- Footer -->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item">
                            <a href="#">El proyecto / Nosotros</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#">Contacto</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#">Foro</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#">Promociones</a>
                        </li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2019. All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item mr-3">
                            <a href="https://www.facebook.com/TRIPSHARE_es-282100442475538" target="_blank">
                                <i class="fab fa-facebook fa-2x fa-fw"></i>
                            </a>
                        </li>
                        <li class="list-inline-item mr-3">
                            <a href="https://twitter.com/TRIPSHARE3" target="_blank">
                                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</html>




