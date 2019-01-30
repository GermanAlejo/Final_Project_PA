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
        include_once '../../BackEnd/viajes/viajes.php';
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
                        <a class="p-2 text-dark" href="../../index.php">Buscar viaje</a>
                        <a class="p-2 text-dark" href="#">Organizar viaje</a>
                        <?php
                        profileButtom();
                        ?>
                    </nav>
                    <?php
                    accessButtom();
                    ?>
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
                                    document.getElementById('inicio2')), {
                                types: ['(cities)'],
                                componentRestrictions: countryRestrict
                            });

                            fin = new google.maps.places.Autocomplete((
                                    document.getElementById('fin2')), {
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
                                origin: document.getElementById('inicio2').value,
                                destination: document.getElementById('fin2').value,
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
                                        summaryPanel.innerHTML += '<b>Route Segment: </b><br>';
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


                </div>
            </div>

        </header>


        <!-- Conductores -->
        <section class="testimonials text-center bg-light">
            <div class="container">
                <h2 class="mb-5">Conductores disponibles</h2>
                <div class="row">


                    <?php
                    $trip_id = showFutureTrips();

                    //this function shows index result when searching for a trip
                    function showFutureTrips() {

                        //get asociative array with trip and driver data
                        $viajes = buscaViajes();

                        $numViajes = sizeof($viajes);
                        //echo "NUM" . $numViajes;
                        //print_r($viajes);

                        for ($i = 0; $i < $numViajes; $i++) {

                            //get first element of array aka first trip
                            $viaje = $viajes[$i];
                            //print_r($viaje);
                            //save values form array in variables
                            $driverName = $viaje['name'];
                            $origen = $viaje['from'];
                            $destino = $viaje['to'];
                            //$fecha = $viaje['date'];
                            $hora_salida = $viaje['dep_time'];
                            $trip_id = $viaje['id'];
                            $asientos = $viaje['slots'];
                            //echo "tripID:" . $trip_id;

                            echo ' <div class="col-lg-6 col-sm-12 mb-3">';
                            echo '     <div class="card"> ';
                            echo '   <div class="card-body">';
                            echo '       <div class="row ">';
                            echo '           <div class="col-md-4">';
                            echo '               <img class="user-pic" src="../img/user_icon.jpg" alt="" width="100px">';
                            echo '           </div>';
                            echo '           <div class="col-md-8">';
                            echo '               <h4>Conductor </h4>';
                            echo '               <h6>' . $driverName . '</h6>';
                            echo '           </div>';
                            echo '       </div>';
                            echo '       <div class="row ">  ';
                            echo '           <div class="col-md-6">  ';
                            echo '               <ul class="list-unstyled list-inline">';
                            echo '                   <li class="list-inline">Origen: ' . $origen . '</li>';
                            echo '                   <li class="list-inline">Destino: ' . $destino . '</li>';
                            echo '                   <li class="list-inline">Hora de salida: ' . $hora_salida . '</li>';
                            echo '               </ul> ';
                            echo '           </div>';
                            // echo '           <div class="col-md-2"></div>';
                            echo '           <div class="col-md-6">   ';

                            echo '               <h6>' . $asientos . ' Asientos libres</h6>';
                            echo '               <input type="number" name="quantity" min="1" max="' . $asientos . '" value="1">';

                            echo '               <button type="button" class="btn btn-secondary btn-sm btn-block">Reservar asientos</button>';

                            echo '           </div>';
                            echo '       </div>';
                            echo '     </div>';
                            echo '  </div>';
                            echo '</div>';
                        }
                        return $trip_id;
                    }

                  
                    ?>

                </div>
            </div>
            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMUO9y2pHnf2AujLJt5KAGA0sNXhQp9wE&callback=initMap&libraries=places">
            </script>
        </section>




        <!--NOT USED FOR NOW-->
        <script>
            function ciudades2() {
<?php
echo 'var inicio="' . $origenG . '"';
echo 'var fin="' . $destino . '"';
?>
                document.getElementById("inicio2").value = inicio;
                document.getElementById("fin2").value = fin;
            }
        </script>

        <div id="right-panel">
            <div>
                <?php
                      $aux = getViaje($trip_id);
                    //print_r($aux);
                    $origenG = $aux['origen'];
                    $destinoG = $aux['destino'];
                    echo '<input type="hidden" id="origenG" value="' . $origenG . '">';
                    echo'<input type="hidden" id="destinoG" value="' . $destinoG . '">';
                ?>
                <b>Start:</b>
                <input type="text" name="inicio" value="" id="inicio2"/>
                <br>

                <b>End:</b>
                <input type="text" name="fin" value="" id="fin2"/>

                <button id="submit" onclick="ciudades()" value="">Calcular ruta</button>

            </div>
            <div id="directions-panel"></div>
        </div>
         <script>
            function ciudades() {

                document.getElementById("inicio2").value = document.getElementById("inicioG").value ;
                document.getElementById("fin2").value = document.getElementById("finG").value ;
            }
        </script>
        <?php
        /*
          $s = '<div id="right-panel">';

          $s.= ' <input type="text" name="inicio" id="origen" value="' . $origenG . '"/>';
          $s .= ' <br>';
          $s .= '<input type="text" name="fin" id="fin" value="' . $destinoG . '"/>';
          $s .= '<input type="submit" id="submit" value="Calcular ruta">';
          echo $s; */
        ?>

    </body>


    <!-- Footer -->
    <?php footer() ?>
</html>
