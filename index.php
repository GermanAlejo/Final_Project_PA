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

    </head>

    <body>

        <div>
            <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
                <h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5>
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
                <a href="http://localhost/Final_Project_PA/FrontEnd/Usuario/loginForm.php" class="btn btn-outline-primary" href="#">Sign in</a>
            </div>
        </div>



        <header class="masthead text-white text-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <h1 class="mb-5">Build a landing page for your business or project and generate more leads!</h1>
                    </div>
                    <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                        <form>
                            <div class="form-row">
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <input name="incio" id="inicio" type="text" class="form-control " placeholder="From...">
                                </div>
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <input name="fin" id="fin" type="text" class="form-control " placeholder="To...">
                                </div>
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <div class="form-group">
                                        <input type="date" id="date" class="form-control" placeholder="Date">

                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <button type="submit" class="btn btn-block btn-primary">Search!</button>
                                </div>
                            </div>
                            <div class="form-row">
                                <a href="http://localhost/Final_Project_PA/FrontEnd/Usuario/loginForm.php" class="btn btn-block btn-primary" href="#">Sign up</a>
                            </div>
                        </form>
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

</html>
