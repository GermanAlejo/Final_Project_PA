<?php

include_once '../../libraries.php';

//this function gets all trips done by a user
function getViajes() {

    $error[] = "";

//check if the user is logged
    if (isset($_SESSION['user_id'])) {

//get userID to known which cars to get from DB
        $user_id = $_SESSION['user_id'];

//first conenct to DB
        $con = dbConnection();

        //first get the trip data about the DB
        $sql = "SELECT viaje.origen,viaje.destino,viaje.fecha,usuario.nombre "
                . "FROM viajerosClientes JOIN viaje JOIN cliente JOIN usuario "
                . "WHERE viajerosClientes.cliente_id=" . $user_id 
                . "AND viajerosClientes.viaje_id=viaje.id and viaje.conductor_id=cliente.usuario_id AND"
                . " cliente.usuario_id=usuario.id";

        //consulta para obtener nombre (del conductor) fecha origen y destino
        
        $query = mysqli_query($con, $sql);

        if (!$query) {

            $error = "Error in sql";
            mysqli_close($con);
            
        } else {

//this loop should go to each row of the vehicle table and store it in an array
            while ($row = mysqli_fetch_assoc($query)) {

                 $res[] = array(
                     'name'=> $row['nombre'], 
                    'date' => $row['fecha'],
                    'from' => $row['origen'],
                    'to' => $row['destino']);
                
            }

//close DB conection
            mysqli_close($con);

//the array with the tables rows is returnet to the frontend
            return $res;
        }
    } else {

        $error[] = "The user must be logged-in";
    }

    print_r($error);
}




