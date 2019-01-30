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
        include '../../libraries.php';
        include "../../BackEnd/viajes/misViajes.php";
        session_start();
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
        <script src="../../vendor/jquery/jquery.min.js"></script>




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
                <h2 class="mb-5">Viajes pendientes</h2>
                <div class="row">


                    <?php
                    $arrayViajes = viajesPendientes();
                    $totalSize = countPendientes();
                    echo $totalSize;
                    $j = 0;
                    for ($i = 0; $i < $totalSize; $i++) {

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
                        echo '                   <li class="list-inline">fecha:</li>';
                        echo '                   <li class="list-inline">hora:</li>';
                        echo '               </ul> ';
                        echo '           </div>';
                        echo '           <div class="col-md-2"></div>';
                        echo '           <div class="col-md-6">   ';
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

    </body>

    <!-- Footer -->
    <?php footer() ?>

</html>




