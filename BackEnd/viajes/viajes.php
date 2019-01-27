<?php
include '../../libraries.php';

//this need to be changed
getProximosViajes();

function getProximosViajes() {

    $error[] = "";

//in this case the user does not need to be logged
    //Save values in an array and sanitize them
    $arraySanitize = array('inicio' => FILTER_SANITIZE_STRING,
        'fin' => FILTER_SANITIZE_STRING);

//filter the values
    $formInput = filter_input_array(INPUT_POST, $arraySanitize);
    $ini = $formInput['inicio'];
    $fin = $formInput['fin'];

    $fech = $_POST['fecha'];

//first conenct to DB
    $con = dbConnection();

    $ini = explode(",", $ini);
    $ini = $ini[0];
    
    $fin = explode(",", $fin);
    $fin = $fin[0];
    
    //first get the trip data about the DB
    $sql = "SELECT * FROM viaje WHERE viaje.origen='" . $ini . "' "
            . " AND viaje.destino='" . $fin . "' AND viaje.fecha='" . $fech . "'";

    //echo $sql;
    $query = mysqli_query($con, $sql);

    if (!$query) {
        $error = "Error in sql";
        mysqli_close($con);
    } else {

//this loop should go to each row of the trips table and store it in an array
        while ($row = mysqli_fetch_assoc($query)) {
            
            //we need to get the driver_id to get the name
            $driver_id = $row['conductor_id'];
            $newSql = "SELECT nombre FROM usuario WHERE usuario.id='" . $driver_id . "'";
            $queryName = mysqli_query($con, $newSql);
            $rowDriver = mysqli_fetch_assoc($queryName);
            $driverName = $rowDriver['nombre'];
            
            $res[] = array(
                'name' => $driverName,
                'date' => $row['fecha'],
                'from' => $row['origen'],
                'to' => $row['destino'],
                'slots' => $row['capacidad'],
                'desc' => $row['descripcion'],
                'price' => $row['precio'],
                'depTime' => $row['hora_salida']);
            //echo "loop";
        }


//close DB conection
        mysqli_close($con);

//the array with the tables rows is returnet to the frontend
        print_r($res);
    }


    print_r($error);
}
