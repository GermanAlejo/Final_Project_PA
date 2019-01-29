<!--This page contains all the php and html code for the registration of a new user-->
<!DOCTYPE html>
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
                            <div class="form-row">
                                <div class="col-12 col-md-12 mb-md-0 mx-auto">
                                    <br>

                                    <!-- START Bootstrap-Cookie-Alert -->
                                    <div class="alert text-center cookiealert" role="alert">
                                        <b>AVISO SOBRE USO DE COOCKIES</b> &#x1F36A; Es posible que utilicemos cookies propias y de terceros para mejorar nuestros servicios.
                                        Esto nos ayudará a mejorar experiencia en el uso de nuestra web. Adicionalmente, nos reservamos el derecho de compartir los análisis
                                        de navegación y los grupos de interés inferidos con terceros. Al clicar en "Aceptar" o SI CONTINÚA NAVEGANDO, ACEPTA SU USO. 
                                        También puede CONFIGURAR O RECHAZAR la instalación de cookies clicando en “Cambiar configuración".

                                        <button type="button" class="btn btn-primary btn-sm acceptcookies" aria-label="Close">Acepto</button>
                                        
                                    </div>
                                    <!-- END Bootstrap-Cookie-Alert -->

                                    <!-- Include cookiealert script -->
                                    <script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>  

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

</html>