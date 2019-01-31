<?php
include_once '../../libraries.php';


function newValoracion() {

    //check if user sent form
    if (isset($_POST['send'])) {
        //check if user is logged
        if (isset($_SESSION['user_id'])) {

            //get session values
            $user_id = $_SESSION['user_id'];
            
            $trip_id = $_POST['trip_id'];
            
            
            //this attribute is selected
            $valoracion = $_POST['valoracion'];

            //sanitize and validate the comentario input 
            $comen = filter_var($_POST['comentario'], FILTER_SANITIZE_STRING);

            if (!isset($_POST['comentario'])) {
                echo "Comentarios can't be empty";
            } else {

                //cennect to DB
                $con = dbConnection();

                //prepare sql sentence to get driverID and Trip ID
                $sql1 = "select viaje.conductor_id FROM viaje WHERE viaje.id='" . $trip_id . "'";
                


                $query1 = mysqli_query($con, $sql1);

                if (!$query1) {
                    echo "error sql1";
                    mysqli_close($con);
                } else {

                    $aux = mysqli_fetch_row($query1);
                    print_r($aux);
                    $driver_id = $aux['id'];
                    echo $driver_id;
                    //prepare second sql sentence for inserting the valoration
                    $sql2 = "INSERT INTO valoracion (id, creador_id, conductor_id, viaje_id, valoracion, comentarios) "
                            . "VALUES (NULL, '" . $user_id . "', '" . $driver_id . "', '" . $trip_id . "', "
                            . "'" . $valoracion . "', '" . $comen . "')";
                    
                    $query2 = mysqli_query($con, $sql2);
                    
                    if(!$query2){
                        //echo 'error sql2';
                        mysqli_close($con);
                    }else{
                        //echo 'Valoracion realizada con exito';
                        mysqli_close($con);
                        //page should take the user back to the list of done trips
                        //header('Location: ../../FrontEnd/Viajes/viajesRealizadosForm.php');
                    }
                }
            }
        } else {
            echo 'You must be logged to create valorations';
        }
    }
}
