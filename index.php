<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="icon" href="FrontEnd/img/icon.png">
        <title>Tripshare</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.css">


        <?php
        include 'libraries.php';
        ?>

    </head>

    <body>
        <div>
            <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
                <h5 class="my-0 mr-md-auto font-weight-normal">
                    <a href="index.php">
                        <img src="FrontEnd/img/tripshare logo2.png" height="60">
                    </a>
                </h5>
                <nav class="my-2 my-md-0 mr-md-3">
                    <a class="p-2 text-dark" href="../../index.php">Buscar viaje</a>
                    <a class="p-2 text-dark" href="#">Organizar viaje</a>
                    <?php
                    indexProfileButtom();
                    ?>
                </nav>
                <?php
                indexAccessButtom();
                ?>
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
                                   
                                    <input type="date" id="date" class="form-control" placeholder="Fecha" min="today" required>
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

                            <div class="form-row ">
                                <div class="col-12 col-md-12 mb-md-0 mx-auto">
                                    <br>

                                    <!-- START Bootstrap-Cookie-Alert -->
                                    <div class="alert text-center cookiealert" role="alert">
                                        <b>AVISO SOBRE USO DE COOCKIES</b> &#x1F36A; Es posible que utilicemos cookies propias y de terceros para mejorar nuestros servicios.
                                        Esto nos ayudará a mejorar experiencia en el uso de nuestra web. Adicionalmente, nos reservamos el derecho de compartir los análisis
                                        de navegación y los grupos de interés inferidos con terceros. Al clicar en "Aceptar" o SI CONTINÚA NAVEGANDO, ACEPTA SU USO. 
                                        También puede CONFIGURAR O RECHAZAR la instalación de cookies clicando en “Cambiar configuración".
                                        <br>
                                        <button type="button" class="btn btn-primary btn-sm acceptcookies" aria-label="Close">Acepto</button>
                                    </div>
                                    <!-- END Bootstrap-Cookie-Alert -->

                                    <!-- Include cookiealert script -->
                                    <script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>  

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
    <?php footer() ?>




</html>