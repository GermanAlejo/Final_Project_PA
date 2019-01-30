<!--This page contains all the php and html code for the registration of a new user-->
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
        session_start();
        include '../../libraries.php';
        include '../../BackEnd/viajes/viajes.php';
        include "../../BackEnd/Usuario/ajustesUsuario.php";
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

        <?php
        $vehicles = getUserVehicles();

        // print_r($vehicles);
        //get user vehicles and retreive it to show data
        //this function will get all plate number from users vehicles and 
        function showVehicles($vehicles) {
            $s = '<option value="';
            for ($i = 0; $i < sizeof($vehicles); $i++) {
                $vehicle = $vehicles[$i];
                $s .= $vehicle['matricula'] . '">' . $vehicle['matricula'] . '</option>';
            }
            echo $s;
        }
        ?>

        <header class="masthead text-white text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 col-xl-10 mx-auto">
                        <form action="#" method="POST">
                            <!--  <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">-->
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Vehíchulo</label>

                                    <select name="plate" class="form-control">
                                        <?php
                                        showVehicles($vehicles);
                                        ?>
                                    </select>

                                </div>
                                <br>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Origen</label>
                                    <input type="text" name="inicio" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputNumber">Destino</label>
                                    <input type="text" name="fin" class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="inputName">Fecha</label>
                                    <input type="date" name="fecha" class="form-control" data-date="" data-date-format="YYYY MMMM DD">
                                </div>
                                <br>
                                <div class="form-group col-md-2">
                                    <label for="inputLastName">Hora</label>
                                    <input  class="form-control" type="time" id="appt" name="hora_salida"  value="00:00"required>                                    
                                </div>
                                <br>
                                <div class="form-group col-md-3">
                                    <label for="inputLastName">Precio</label>
                                    <input type="number" min="0" name="precio" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputLastName">Nº Ocupantes</label>
                                    <input type="number" min="1" max="7" name="capacidad" class="form-control">
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="inputLastName">Seguro</label>
                                    <input type="checkbox" name="seguro" class="form-control" id="check" onclick="paypal()">
                                    <script>
                                        function paypal() {

                                            var checkBox = document.getElementById("check");
                                            var pay = document.getElementById("pay");
                                            if (checkBox.checked === true) {

                                                pay.style.display = "block";

                                            } else {
                                                pay.style.display = "none";
                                            }
                                        }
                                    </script>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputName" >Descripción</label>
                                    <textarea class="form-control" cols=""rows="3" id="comment"></textarea>
                                </div>     
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4 mx-auto">
                                    <input type="submit" name="send" class="btn btn-block btn-primary" value="Registrar viaje">                    
                                </div>
                            </div>
                        </form>

                        <?php
                        newViaje();
                        ?>

                        <div class="form-group col-md-3" id="pay" style="display:none" class="collapse in">
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="GNJN8V2KFVJ4W">
                                <input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma rápida y segura de pagar en Internet.">
                                <img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
                            </form>
                        </div>


                    </div>  
                </div>
            </div>

        </header>


    </body>

    <!-- Footer -->
<?php footer() ?>

</html>