
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



    </head>

    <body>

        <div>
            <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
                <h5 class="my-0 mr-md-auto font-weight-normal">
                    <a href="../../index.php">
                        <img src="../../FrontEnd/img/tripshare logo2.png" height="60"></h5>
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
                    <a href="../../FrontEnd/Usuario/loginForm.php" class="btn btn-outline-primary" href="#">Sign in</a>
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
                            <label for="uname"><b>Name: </b></label>
                        </div>
                        <div class="col-12 col-md-3 mb-2 mb-md-0">
                            <input type="text" name="firstName" class="form-control" placeholder="First name">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-3 mb-2 mb-md-0">
                            <label for="uname"><b>Middle & Last name: </b></label>
                        </div>
                        <div class="col-12 col-md-3 mb-2 mb-md-0">
                            <input type="text" name="middlename" class="form-control" placeholder="Middle name">
                        </div>
                        <div class="col-12 col-md-3 mb-2 mb-md-0">
                            <input type="text" name="lastname" class="form-control" placeholder="Last name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-3 mb-2 mb-md-0">
                            <label for="uname"><b>Email: </b></label>
                        </div>
                        <div class="col-12 col-md-6 mb-2 mb-md-0">
                            <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-3 mb-2 mb-md-0">
                            <label for="uname"><b>Phone:</b></label>
                        </div>
                        <div class="col-12 col-md-3 mb-2 mb-md-0">
                            <input type="text" name="phoneNumber" class="form-control" placeholder="Phone number">
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-md-12 col-lg-6 col-xl-6 mx-auto"> 
                    <div class="form-row">
                        <div class="col-12 col-md-3 mb-2 mb-md-0">
                            <div class="form-group">
                                <input type="submit" name="edit" class="btn btn-block btn-primary" value="Editar perfil">    
                            </div>
                        </div>
                        <div class="col-12 col-md-3 mb-2 mb-md-0">
                            <div class="form-group">
                                <input type="submit" name="delete" class="btn btn-block btn-primary" value="Eliminar perfil">    
                            </div>
                        </div>
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
                            <a href="#">About</a>
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

    <?php
//start session
//    session_start();
    include_once('../../BackEnd/Usuario/login.php');

//   loginForm();
    ?>

</html>



