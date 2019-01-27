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

    //esto es una crutada para separar el resultado de busqueda de google
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

//this function will insert a new trip in the DB
function newViaje() {

    $error[] = "";

    if (isset($_POST['send'])) {
        if (isset($_SESSION['user_id'])) {
            if (isset($_POST['origen']) && isset($_POST['destino']) && isset($_POST['capacidad']) && isset($_POST['precio']) && isset($_POST['fecha']) && isset($_POST['hora_salida'])) {
                //first we sanitize all inputs 
                //     if (empty($error)) {

                $arraySanitize = array(
                    'origen' => FILTER_SANITIZE_STRING,
                    'destino' => FILTER_SANITIZE_STRING,
                    'capacidad' => FILTER_SANITIZE_STRING,
                    'descripcion' => FILTER_SANITIZE_STRING,
                    'precio' => FILTER_SANITIZE_NUMBER_INT,
                    'fecha' => FILTER_SANITIZE_STRING,
                    'hora_salida' => FILTER_SANITIZE_NUMBER_INT);
                //       }
                //form validation
                $error = [];
                // then check requiered fields for errors

                if (!isset($_POST['origen']) || $_POST['origen'] == "") {
                    $error[] = "Origin can't be empty";
                }
                if (!isset($_POST['destino']) || $_POST['destino'] == "") {
                    $error[] = "Destino can't be empty";
                }
                if (!isset($_POST['capacidad']) || $_POST['capacidad'] == "") {
                    $error[] = "Last name can't be empty";
                }
                if (!filter_var($_POST['precio'], FILTER_VALIDATE_INT)) {
                    $error[] = "Email not valid";
                }
                if (!isset($_POST['fecha']) || $_POST['fecha'] == "") {
                    $error[] = "Date can't be emtpy";
                }
                if (!isset($_POST['hora_salida']) || $_POST['hora_salida'] == "") {
                    $error[] = "Departure time can't be empty";
                }



                //print_r($error);
                //filtered array
                $formInput = filter_input_array(INPUT_POST, $arraySanitize);

                //get values from filtered array
                $from = $formInput['origen'];
                $to = $formInput['destino'];
                $slots = $formInput['capacidad'];
                $desc = $formInput['descripcion'];
                $price = $formInput['precio'];
                $date = $formInput['fecha'];
                $time = $formInput['hora_salida'];

                //get driver id from session values as the user creating the trip is the driver
                $driver_id = $_SESSION['user_id'];

                //get the vehicle id
                $car_id = "";

                //get he insurance?
                $insurance_id = 1;

                //conect to DB
                $con = dbConnection();

                //sql sentence for inserting new trip
                $sql = "INSERT INTO viaje (id, conductor_id, vehiculo_id, seguro_id, "
                        . "origen, destino, capacidad, descripcion, precio, fecha, hora_salida) "
                        . "VALUES (NULL, '" . $driver_id . "', '" . $car_id . "', '" . $insurance_id . "', '" . $from . "', '" . $to . "', "
                        . "'" . $slots . "', '" . $desc . "', '" . $price . "', '" . $date . "', '" . $time . "')";

                //echo $sql;
                //insert into DB
                $query1 = mysqli_query($con, $sql);

                if (!$query1) {
                    echo "error sql";
                    $error[] = "Trip already registered";
                    mysqli_close($con);
                } else {
                    //echo "true";

                    print_r($error);

                    mysqli_close($con);
                    //redirect user to trips page
                    header("Location: ../../index.php");
                }
            }
        } else {
            echo "You must be logged to plan a new trip<br/>";
        }
    }
}
