
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


        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel="icon" href="../../FrontEnd/img/icon.png">
        <title>Tripshare</title>


        <?php
        include '../../libraries.php';
        include '../../BackEnd/Admin/admin.php';
        include_once '../../BackEnd/Usuario/registro.php';
        ?>

        <?php
        // registrationForm();
        registroForm();
        ?>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function () {
                $("#tabs").tabs();
            });
        </script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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

        <header class="">
            <div class="container">
                <div class="col-md-12 col-lg-8 col-xl-10 mx-auto">
                    <h1>Menú administrador</h1>

                    <div id="tabs">
                        <ul>
                            <li><a href="#tabs-1">Usuarios</a></li>
                            <li><a href="#tabs-2">Promociones</a></li>
                            <li><a href="#tabs-3">Seguros</a></li>
                            <li><a href="#tabs-4">Foro</a></li>
                        </ul>

                        <div id="tabs-1" class="table-responsive">
                            <table class="table table-hover table-striped table-sm">
                                <?php users(); ?>
                            </table>
                            <div class="form-row">
                                <div class="col-12 col-md-2 mb-md-0 mx-auto ">
                                    <a href="FrontEnd/Usuario/registroUsuarioForm.php" class="btn btn-block btn-primary">Nuevo usuario</a>                    
                                </div>
                            </div>
                        </div>


                        <div id="tabs-2" class="table-responsive">
                            <table class="table table-hover table-striped table-sm">
                                <?php promos(); ?>
                            </table>
                            <div class="form-row">
                                <div class="col-12 col-md-2 mb-md-0 mx-auto ">
                                    <a href="FrontEnd/Usuario/registroUsuarioForm.php" class="btn btn-block btn-primary">Nueva promo</a>                    
                                </div>
                            </div>
                        </div>


                        <div id="tabs-3" class="table-responsive">
                            <table class="table table-hover table-striped table-sm">
                                <?php seguros(); ?>
                                </tbody>
                            </table>
                            <div class="form-row">
                                <div class="col-12 col-md-2 mb-md-0 mx-auto ">
                                    <a href="FrontEnd/Usuario/registroUsuarioForm.php" class="btn btn-block btn-primary">Nuevo seguro</a>                    
                                </div>
                            </div>
                        </div>



                        <div id="tabs-4">
                            <table class="table table-hover table-striped table-sm">
                                <?php foro(); ?>
                            </table>
                            <div class="form-row">
                                <div class="col-12 col-md-2 mb-md-0 mx-auto ">
                                    <a href="FrontEnd/Usuario/registroUsuarioForm.php" class="btn btn-block btn-primary">Nuevo foro</a>                    
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </header>

    </body>


    <!-- Footer -->
    <?php footer() ?>

    <?php
//start session
//    session_start();
    include_once('../../BackEnd/Usuario/login.php');

//   loginForm();
    ?>

</html>



