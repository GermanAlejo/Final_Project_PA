<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Landing Page - Start Bootstrap Theme</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="FrontEnd/css/landing-page.min.css" rel="stylesheet">

        <?php
            session_start();
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
                        <a class="p-2 text-dark" href="#">Search trip</a>
                        <a class="p-2 text-dark" href="#">Plan trip</a>

                        <!-- notice that the Profile and the sigh up buttom will be changed so they switch between them-->
                        <a href="#" class="dropdown-toggle active" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a href="#" class="dropdown-item">Panel</a>
                            <a href="#" class="dropdown-item">Previous trips</a>
                            <a href="#" class="dropdown-item">Profile settings</a>
                            <a href="#" class="dropdown-item">My Forum</a>
                            <a href="#" class="dropdown-item">Messages</a>
                            <a href="#" class="dropdown-item">Close Session</a>
                        </div>
                    </nav>
                    <a href="FrontEnd/Usuario/loginForm.php" class="btn btn-outline-primary" href="#">Sign in</a>
            </div>
        </div>

        <header class="masthead text-white text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 mx-auto">
                        <h1 class="mb-5">Planea tu próximo viaje ¿A dónde vas a ir?</h1>
                    </div>
                    <div class="col-md-12 col-lg-8 col-xl-10 mx-auto">
                        <form action="BackEnd/viajes/viajes.php" method="POST">
                            <div class="form-row">
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <input name="inicio" id="inicio" type="text" class="form-control " placeholder="From...">
                                </div>
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <input name="fin" id="fin" type="text" class="form-control " placeholder="To...">
                                </div>
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <div class="form-group">
                                        <input type="date" name="fecha" id="date" class="form-control" placeholder="Date" min="today" value="today">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <button type="submit" class="btn btn-block btn-primary">Search!</button>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                    <div class="col-md-10 col-lg-8 col-xl-4 mx-auto">
                        <a href="FrontEnd/Usuario/registroForm.php" class="btn btn-block btn-primary" href="#">Sign up</a>                    
                    </div>
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

        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMUO9y2pHnf2AujLJt5KAGA0sNXhQp9wE&callback=initMap&libraries=places">
        </script>



        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>


    <!-- Footer -->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item">
                            <a href="#">About us</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#">Contact</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#">Forum</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#">Promos</a>
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
