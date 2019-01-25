<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="/FrontEnd/css/landing-page.css" rel="stylesheet">
        <?php include 'libraries.php'; ?>
    </head>
    <body>
        <?php include_once 'FrontEnd/header.php'; ?>


        <header class="masthead text-white text-center">
            <div class="overlay"></div>
           <!-- <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <h1 class="mb-5">Build a landing page for your business or project and generate more leads!</h1>
                    </div>
                    <div class="row">
                    <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                        <form>
                            <div class="form-row">
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <input name="incio" id="inicio" type="text" class="form-control form-control-lg" placeholder="From...">
                                </div>
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <input name="fin" id="fin" type="text" class="form-control form-control-lg" placeholder="To...">
                                </div>
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <div class="form-group">
                                        <input type="date" id="date" class="form-control" placeholder="Date">

                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <button type="submit" class="btn btn-block btn-lg btn-primary">Search!</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            -->
            
             <div class="container2">
                <div class="row">
                    <div class="col-md-3">
                        <h1 class="mb-5">Build a landing page for your business or project and generate more leads!</h1>
                    </div>
                    <div class="row">
    
                        <form>
                            <div class="form-row">
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <input name="incio" id="inicio" type="text" class="form-control form-control-lg" placeholder="From...">
                                </div>
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <input name="fin" id="fin" type="text" class="form-control form-control-lg" placeholder="To...">
                                </div>
                                <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <div class="form-group">
                                        <input type="date" id="date" class="form-control form-control-lg" placeholder="Date">

                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <button type="submit" class="btn btn-block btn-lg btn-primary">Search!</button>
                                </div>
                            </div>
                        </form>
                 
                    </div>
                </div>
            </div>
            
            
            
            
            


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




        </header>

    </body>
</html>
