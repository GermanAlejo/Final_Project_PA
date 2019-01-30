
<!--bootstrap 4 libraries-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

<!-- Custom styles for this template -->
<link href="css/landing-page.min.css" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

<!-- Custom styles for this template -->
<link href="../../FrontEnd/css/landing-page.min.css" rel="stylesheet">

<!-- Bootstrap core JavaScript -->
<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../vendor/jquery/jquery.min.js"></script>

<!-- API Google -->
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMUO9y2pHnf2AujLJt5KAGA0sNXhQp9wE&callback=initMap&libraries=places">
</script>



<!-- INDEX -->
<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

<!-- Custom styles for this template -->
<link href="FrontEnd/css/landing-page.min.css" rel="stylesheet">

<!-- Bootstrap core JavaScript -->

<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="../../vendor/jquery/jquery.min.js"></script>






<!--All php function here:  -->
<?php

//this function handles the connection to the DB
function dbConnection() {
    //Connect to database
    $con = mysqli_connect("localhost", "root", "");

//check connection
    if (!$con) {
        die("ERROR: Can't connect to host");
    }
    $db = mysqli_select_db($con, "PA_proyecto_final");

    if (!$db) {
        die("ERROR: Can't connect to DB ");
    }

    return $con;
}

//this function should kill all session vars when needed to
function unSetSession() {
    //session_start();
    session_unset();
    session_destroy();
}

//NOT USED FOR NOW funtion to validate Date to use specific format: https://stackoverflow.com/questions/14504913/verify-valid-date-using-phps-datetime-class?answertab=active#tab-top
function validateDate($date, $format = 'Y-m-d H:i') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

//function to validate dateTime values
function validateDateValues($date) {

    $res = false;
    //old code not working for some cases
//    $currentDateTime = getdate(); //get current os date
//    $aux = explode("-", $date); //split date fields into three 
    //echo "AUX:";
    //print_r($aux);
    //print_r($currentDateTime);
//    if ($currentDateTime['year'] <= $aux[0] && $currentDateTime['mon'] <= $aux[1] && $currentDateTime['mday'] <= $aux[2]) {
//        $res = true;
//    }
    //more simple way to compare
    //take todays date compare to input date
    $today = date("Y-m-d");

    if (strtotime($date) > strtotime($today)) {

        $res = true;
    }

    return $res;
}


//this function displays all trips done by the user
//this function is currently not being used
function showTarjetas() {

    //get array with trips
    $viajes = getViajesUsuario();
    $numViajes = sizeof($viajes);
    //echo "prueba";
    print_r($viajes);


    for ($i = 0; $i < $numViajes; $i++) {

        //get first element of array aka first trip
        $viaje = $viajes[$i];
        //print_r($viaje);
        //save values form array in variables
        $driverName = $viaje['name'];
        $origen = $viaje['from'];
        $destino = $viaje['to'];
        $fecha = $viaje['date'];
        $trip_id = $viaje['id'];
        echo "tripID:" . $trip_id;

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
        echo '           <div class="col-md-4">  ';
        echo '               <ul class="list-unstyled list-inline">';
        echo '                   <li class="list-inline">Origen: ' . $origen . '</li>';
        echo '                   <li class="list-inline">Destino: ' . $destino . '</li>';
        echo '                   <li class="list-inline">Fecha:' . $fecha . '</li>';
        echo '               </ul> ';
        echo '           </div>';
        echo '           <div class="col-md-2"></div>';
        echo '           <div class="col-md-6">';
        echo '               <form action="valorarViajeForm.php" method="POST">';
        echo '                   <input type="hidden" name="name" value="' . $driverName . '">';
        echo '                   <input type="hidden" name="origen" value="' . $origen . '">';
        echo '                   <input type="hidden" name="destino" value="' . $destino . '">';
        //echo '                   <input type="hidden" name="fecha" value="' . $fecha . '">'; not used for now
        echo '                   <input type="hidden" name="id" value="' . $trip_id . '">';
        echo '                  <input  type="submit" class="btn btn-primary btn-sm btn-block text-white" value="Valorar">Valorar';
        echo '               </form>';
        echo '           </div>';
        echo '       </div>';
        echo '     </div>';
        echo '  </div>';
        echo '</div>';
    }
}

function footer() {

    echo '<footer class="footer bg-light">';
    echo '    <div class="container">';
    echo '        <div class="row">';
    echo '            <div class="col-lg-6 h-100 text-center text-lg-left my-auto">';
    echo '                <ul class="list-inline mb-2">';
    echo '                    <li class="list-inline-item">';
    echo '                        <a href="#">El proyecto / Nosotros</a>';
    echo '                    </li>';
    echo '                    <li class="list-inline-item">&sdot;</li>';
    echo '                    <li class="list-inline-item">';
    echo '                        <a href="#">Contacto</a>';
    echo '                    </li>';
    echo '                   <li class="list-inline-item">&sdot;</li>';
    echo '                    <li class="list-inline-item">';
    echo '                        <a href="#">Foro</a>';
    echo '                    </li>';
    echo '                    <li class="list-inline-item">&sdot;</li>';
    echo '                    <li class="list-inline-item">';
    echo '                        <a href="#">Promociones</a>';
    echo '                    </li>';
    echo '                </ul>';
    echo '                <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2019. All Rights Reserved.</p>';
    echo '            </div>';
    echo '            <div class="col-lg-6 h-100 text-center text-lg-right my-auto">';
    echo '                <ul class="list-inline mb-0">';
    echo '                    <li class="list-inline-item mr-3">';
    echo '                        <a href="https://www.facebook.com/TRIPSHARE_es-282100442475538" target="_blank">';
    echo '                            <i class="fab fa-facebook fa-2x fa-fw"></i>';
    echo '                        </a>';
    echo '                    </li>';
    echo '                    <li class="list-inline-item mr-3">';
    echo '                        <a href="https://twitter.com/TRIPSHARE3" target="_blank">';
    echo '                            <i class="fab fa-twitter-square fa-2x fa-fw"></i>';
    echo '                        </a>';
    echo '                     </li>';
    echo '                </ul>';
    echo '            </div>';
    echo '        </div>';
    echo '    </div>';
    echo '</footer>';
}

function profileButtom() {

    echo '                    <a href="#" class="dropdown-toggle active" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Perfil</a>';
    echo '                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
    echo '                        <a href="../../FrontEnd/Usuario/ajusteUsuarioForm.php" class="dropdown-item">Mis datos</a>';
    echo '                        <a href="../../FrontEnd/Usuario/ajusteVehiculoForm.php" class="dropdown-item">Mis vehículos</a>';
    echo '                        <a href="../../FrontEnd/Viajes/viajesPendientesForm.php" class="dropdown-item">Viajes pendientes</a>';
    echo '                        <a href="../../FrontEnd/Viajes/viajesRealizadosForm.php" class="dropdown-item">Viajes realizados</a>';
    echo '                        <a href="#" class="dropdown-item">Cerrar Sesión</a>';
    echo '                    </div>';
}

function accessButtom() {

    echo '                <a href="../../FrontEnd/Usuario/loginForm.php" class="btn btn-outline-primary" href="#">Acceder</a>';
}

function indexProfileButtom() {

    echo '                    <a href="#" class="dropdown-toggle active" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Perfil</a>';
    echo '                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
    echo '                        <a href="FrontEnd/Usuario/ajusteUsuarioForm.php" class="dropdown-item">Mis datos</a>';
    echo '                        <a href="FrontEnd/Usuario/ajusteVehiculoForm.php" class="dropdown-item">Mis vehículos</a>';
    echo '                        <a href="FrontEnd/Viajes/viajesPendientesForm.php" class="dropdown-item">Viajes pendientes</a>';
    echo '                        <a href="FrontEnd/Viajes/viajesRealizadosForm.php" class="dropdown-item">Viajes realizados</a>';
    echo '                        <a href="#" class="dropdown-item">Cerrar Sesión</a>';
    echo '                    </div>';
}

function indexAccessButtom() {

    echo '                <a href="FrontEnd/Usuario/loginForm.php" class="btn btn-outline-primary" href="#">Acceder</a>';
}
?>



<!--All javascript functions here:   -->
<script>
            //Esta funcion sirve para mostrar o ocultar distintos campos del formulario
            //en funcion de el valor de cmpValor que le pasemos
            //ocultara idElem si no se cumple y mostrara idElem2 en el caso de
            //que se le haya mandado alguno
            //Funsion sedida por el gran Am3
            function showCarForm(idValor, idElem, idElem2, cmpValor) {
                var x = document.getElementById(idElem);
                var valor = document.getElementById(idValor);
                if (idElem2 != null) {
                    var x2 = document.getElementById(idElem2);
                }
                if (valor.value === cmpValor) {
                    x.style.display = "block";
                    if (x2 != null) {
                        x2.style.display = "none";
                    }

                    return true;
                } else if (valor.value !== cmpValor) {
                    x.style.display = "none";
                    if (x2 !== null) {
                        x2.style.display = "block";
                    }

                }
                return false;
            }

</script>
