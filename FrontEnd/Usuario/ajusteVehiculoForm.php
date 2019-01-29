
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




        <?php
        include '../../libraries.php';
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
                    <h1>Mis vehículos</h1>

                    <div id="tabs">
                        <ul>
                            <li><a href="#tabs-1">Nunc tincidunt</a></li>
                            <li><a href="#tabs-2">Proin dolor</a></li>
                            <li><a href="#tabs-3">Aenean lacinia</a></li>
                        </ul>
                        
                       <div id="tabs-1">
                            <div class="form-row">
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <img class="user-pic" src="../img/user_icon.jpg" alt="" width="100px">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <label for="uname"><b>Matrícula: </b></label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <label for="uname"><b>Marca: </b></label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <label for="uname"><b>Modelo: </b>modelo 1</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <div class="form-group">
                                        <form action="editVehiculoForm.php" method="POST">
                                            <input  type ="submit" name="edit" class="btn btn-block btn-primary" value="Editar vehiculo"></input>
                                        </form>

                                    </div>
                                </div>
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <div class="form-group">
                                        <form action="#" method="POST">
                                            <input type="submit" name="delete" class="btn btn-block btn-primary" value="Eliminar vehiculo"> 
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div id="tabs-2">
                            <div class="form-row">
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <img class="user-pic" src="../img/user_icon.jpg" alt="" width="100px">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <label for="uname"><b>Matrícula: </b></label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <label for="uname"><b>Marca: </b></label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <label for="uname"><b>Modelo: </b>modelo 1</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <div class="form-group">
                                        <form action="editVehiculoForm.php" method="POST">
                                            <input  type ="submit" name="edit" class="btn btn-block btn-primary" value="Editar vehiculo"></input>
                                        </form>

                                    </div>
                                </div>
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <div class="form-group">
                                        <form action="" method="POST">
                                            <input type="submit" name="delete" class="btn btn-block btn-primary" value="Eliminar vehiculo"> 
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div id="tabs-3">
                            <div class="form-row">
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <img class="user-pic" src="../img/user_icon.jpg" alt="" width="100px">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <label for="uname"><b>Matrícula: </b></label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <label for="uname"><b>Marca: </b></label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <label for="uname"><b>Modelo: </b>modelo 1</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <div class="form-group">
                                        <form action="editVehiculoForm.php" method="POST">
                                            <input  type ="submit" name="edit" class="btn btn-block btn-primary" value="Editar vehiculo"></input>
                                        </form>

                                    </div>
                                </div>
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <div class="form-group">
                                        <form action="#" method="POST">
                                            <input type="submit" name="delete" class="btn btn-block btn-primary" value="Eliminar vehiculo"> 
                                        </form>
                                    </div>
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



