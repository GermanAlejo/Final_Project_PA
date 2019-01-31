
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


        <header>
            <div class="container">
                <div class="col-md-12 col-lg-8 col-xl-10 mx-auto">

                    <div class="form-row">
                        <div class="col-12 col-md-3 mb-2 mb-md-0">
                            <img class="user-pic" src="../img/user_icon.jpg" alt="" width="100px">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-3 mb-2 mb-md-0">
                            <label for="uname"><b>Nombre: </b></label>
                        </div>
                        <div class="col-12 col-md-3 mb-2 mb-md-0">
                            <input type="text" name="name" class="form-control">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-3 mb-2 mb-md-0">
                            <label for="uname"><b>Inicio: </b></label>
                        </div>
                        <div class="col-12 col-md-3 mb-2 mb-md-0">
                            <input type="date" name="inicio" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-3 mb-2 mb-md-0">
                            <label for="uname"><b>Fin: </b></label>
                        </div>
                        <div class="col-12 col-md-3 mb-2 mb-md-0">
                            <input type="date" name="fin" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-3 mb-2 mb-md-0">
                            <label for="uname"><b>Descuento: </b></label>
                        </div>
                        <div class="col-12 col-md-3 mb-2 mb-md-0">
                            <input type="number" name="descuento" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-3 mb-2 mb-md-0">
                            <label for="uname"><b>Descripción: </b></label>
                        </div>
                        <div class="col-12 col-md-3 mb-2 mb-md-0">
                            <textarea class="form-control" cols=""rows="3" id="comment"></textarea>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-md-12 col-lg-6 col-xl-6 mx-auto"> 
                    <div class="form-row">
                        <div class="col-12 col-md-4 mb-2 mb-md-0 mx-auto">
                            <div class="form-group">
                                <input type="submit" name="create" class="btn btn-block btn-primary" value="Publicar promo">    
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </header>




    </body>

    <!-- Footer -->
    <?php footer() ?>

</html>



