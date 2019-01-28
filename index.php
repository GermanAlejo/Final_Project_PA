<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">


        <link rel="icon" href="FrontEnd/img/icon.png">
        <title>Tripshare</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="FrontEnd/css/landing-page.min.css" rel="stylesheet">

        <!-- Bootstrap core JavaScript -->
        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- API Google -->
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMUO9y2pHnf2AujLJt5KAGA0sNXhQp9wE&callback=initMap&libraries=places">
        </script>


        <?php
        include 'libraries.php';
        ?>

    </head>

    <body>
        <div>
            <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
                <h5 class="my-0 mr-md-auto font-weight-normal">
                    <a href="index.php">
                        <img src="FrontEnd/img/tripshare logo2.png" height="60"></h5>
                    </a>
                    <nav class="my-2 my-md-0 mr-md-3">
                        <a class="p-2 text-dark" href="index.php">Buscar viaje</a>
                        <a class="p-2 text-dark" href="#">Organizar viaje</a>

                        <!-- notice that the Profile and the sigh up buttom will be changed so they switch between them-->
                        <a href="#" class="dropdown-toggle active" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Perfil</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a href="FrontEnd/Usuario/ajusteUsuarioForm.php" class="dropdown-item">Mis datos</a>
                            <a href="FrontEnd/Usuario/ajusteVehiculoForm.php" class="dropdown-item">Mis vehículos</a>
                            <a href="FrontEnd/Viajes/viajesPendientesForm.php" class="dropdown-item">Viajes pendientes</a>
                            <a href="FrontEnd/Viajes/viajesRealizadosForm.php" class="dropdown-item">Viajes realizados</a>
                            <a href="#" class="dropdown-item">Cerrar Sesión</a>
                        </div>
                    </nav>
                    <a href="FrontEnd/Usuario/loginForm.php" class="btn btn-outline-primary">Acceder</a>
            </div>
        </div>

        <header class="masthead text-white text-center">
            <div class="container">
                <div class="row">
                    <form action="#" method="GET">
                        <div class="col-xl-12 mx-auto">
                            <h1 class="mb-5">Planea tu próximo viaje ¿A dónde vas a ir?</h1>
                        </div>
                        <div class="col-md-12 col-lg-8 col-xl-12 mx-auto">
                            <div class="form-row">
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <input name="inicio" id="inicio" type="text" class="form-control " placeholder="Desde...">
                                </div>
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <input name="fin" id="fin" type="text" class="form-control " placeholder="Hacia...">
                                </div>
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <input type="date" id="date" class="form-control" placeholder="Fecha" min="today" value="today" required>
                                </div>
                                <div class="col-12 col-md-3 mb-md-0">
                                    <button type="submit" class="btn btn-block btn-primary">Buscar</button>
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col-12 col-md-4 mb-md-0 mx-auto">
                                    <a href="FrontEnd/Usuario/registroUsuarioForm.php" class="btn btn-block btn-primary">Registrarse</a>                    
                                </div>
                            </div>
                        </div>
                        <script async defer
                                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMUO9y2pHnf2AujLJt5KAGA0sNXhQp9wE&callback=initMap&libraries=places">
                        </script>
                    </form>
                </div>
            </div>
        </header>


        <script>
            var incio;
            var fin;
            var countryRestrict = {'country': 'es'};

            function initMap() {

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

            }
        </script>



    </body>

    <!-- Testimonials -->
    <section class="testimonials text-center bg-light">
        <div class="container">
            <h2 class="mb-5">Promociones exclusivas</h2>
            <div class="row">
                <?php
                for ($i = 0; $i < 5; $i++) {
                    echo '      <div class="col-lg-4">';
                    echo '        <div class="testimonial-item mx-auto mb-5 mb-lg-0">';
                    echo '          <img class="img-fluid rounded-circle mb-3" src="FrontEnd/img/cartel.jpg" alt="">';
                    echo '          <h5>Margaret E.</h5>';
                    echo '          <p class="font-weight-light mb-0">"This is fantastic! Thanks so much guys!"</p>';
                    echo '        </div>';
                    echo '      </div>';
                }
                ?>
            </div>
        </div>
    </section>



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