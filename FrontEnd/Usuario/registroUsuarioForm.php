<!--This page contains all the php and html code for the registration of a new user-->
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
                        <a class="p-2 text-dark" href="../../index.php">Buscar viaje</a>
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
                    <a href="loginForm.php" class="btn btn-outline-primary" href="#">Acceder</a>
            </div>
        </div>

        <header class="masthead text-white text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 col-xl-10 mx-auto">
                        <form action="#" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
                                </div>
                                <br>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Contraseña</label>
                                    <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="···········">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputNumber">Teléfono</label>
                                    <input type="text" name="phoneNumber" class="form-control" placeholder="XXXYYYZZZ">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputName" >Nombre</label>
                                    <input type="text" name="firstName" class="form-control" placeholder="Nombre">
                                </div>
                                <br>
                                <div class="form-group col-md-4">
                                    <label for="inputLastName">Primer apellido</label>
                                    <input type="text" name="middlename" class="form-control" placeholder="Primer apellido">
                                </div>
                                <br>
                                <div class="form-group col-md-4">
                                    <label for="inputLastName">Segundo apellido</label>
                                    <input type="text" name="lastname" class="form-control" placeholder="Segundo apellido">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4 mx-auto">
                                    <input type="submit" name="send" class="btn btn-block btn-primary" value="Registrarse">                    
                                </div>
                            </div>
                        </form>
                    </div>  
                </div>
            </div>


        </header>



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