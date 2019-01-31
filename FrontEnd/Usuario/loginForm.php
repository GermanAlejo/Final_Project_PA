
<!--This page contains all html and php code for the login of the users
    All of the vaidations will be done in the this same page as the html form
    once the user has log in the page will redirect the user to index.php-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.css">

        <link rel="icon" href="../../FrontEnd/img/icon.png">
        <title>Tripshare</title>

        <?php
        session_start();
        include '../../libraries.php';
        include '../../BackEnd/Usuario/login.php';
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
                        <a class="p-2 text-dark" href="../Viajes/registroViajeForm.php">Organizar viaje</a>
                        <?php
                        profileButtom();
                        ?>
                    </nav>
                    <?php
                    accessButtom();
                    ?>
            </div>
        </div>

        <header class="masthead text-white text-center">
            <!--<div class="overlay"></div>-->
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 mx-auto">
                        <form action="#" method="POST">
                            <div class="loginContainer">
                                <div class="col-md-12 col-lg-8 col-xl-10 mx-auto">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-12 col-md-6 mb-2">
                                                <label for="uname"><b>Usuario</b></label>
                                                <input name="username" id="username" type="text" class="form-control " placeholder="Introducir usuario">
                                            </div>
                                            <div class="col-12 col-md-6 mb-2">
                                                <label for="uname"><b>Contraseña</b></label>
                                                <input name="password" id="password" type="password" class="form-control " placeholder="Introducir contraseña">  
                                                <span class="psw"> <a href="#" style="color: white">¿Olvidó su contraseña?</a></span> 
                                            </div> 
                                        </div>
                                    </form>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-10 col-lg-8 col-xl-4 mx-auto">
                                        <button type="submit" name="envio" class="btn btn-block btn-primary">Acceder</button>    
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="col-md-10 col-lg-8 col-xl-4 mx-auto">
                                        <a href="registroUsuarioForm.php" class="btn btn-block btn-primary">Registrarse</a>    
                                    </div>
                                </div>
                                <div class="form-row">
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
                        </form>
                    </div>
                </div>
            </div>

        </header>





    </body>

    <!-- Footer -->
    <?php footer() ?>

    <?php
    include_once('../../BackEnd/Usuario/login.php');
    loginForm();
    ?>

</html>






