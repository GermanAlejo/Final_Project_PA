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

             
        <!-- Bootstrap core JavaScript -->
        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        
        <!-- Bootstrap core JavaScript -->
        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <?php
        include '../../libraries.php';
        include_once '../../BackEnd/Usuario/registro.php';
        ?>

        <?php
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

        <!-- Conductores -->
        <section class="testimonials text-center bg-light">
            <div class="container">
                <h2 class="mb-5">Viajes realizados</h2>
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
                        echo '               <a href="valorarViajeForm.php" type="button" class="btn btn-primary btn-sm btn-block text-white">Valorar</a>';
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







