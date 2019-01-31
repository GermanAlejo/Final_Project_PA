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

        <?php
        session_start();
        include '../../libraries.php';
        include "../../BackEnd/Viajes/misViajes.php";
        ?>


        <link rel="icon" href="../../FrontEnd/img/icon.png">
        <title>Tripshare</title>

        <!-- Bootstrap core CSS -->
        <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="../../FrontEnd/css/landing-page.min.css" rel="stylesheet">


        <!-- Bootstrap core JavaScript -->
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


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

        <!-- Conductores -->
        <section class="testimonials text-center bg-light">
            <div class="container">
                <h2 class="mb-5">Viajes realizados</h2>
                <div class="row">
                    <?php
                    //echo "userID: " . $_SESSION['user_id'];
                    showTarjetas();

//this function displays all trips done by the user
//this function is currently not being used
                    function showTarjetas() {

                        //get array with trips
                        $viajes = getViajesUsuario();
                        $numViajes = sizeof($viajes);
                        //echo "prueba";
                       // print_r($viajes);


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
                    ?>

                </div>
            </div>

        </section>


    </body>


    <!-- Footer -->
    <?php footer() ?>

</html>