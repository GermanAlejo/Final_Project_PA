<?php

include '../../libraries.php'; //this include crashes all pages using functions from this file IDK WHY

function getProximosViajes() {

    $error[] = "";
    $res = "";
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
        return $res;
    }


    print_r($error);
}

//this function receives the id of a trip and returns the trip from the trip table
function getViaje($idViaje) {

    $error[] = "";

    //user does not need to be logged
//first conenct to DB
    $con = dbConnection();


    //first get the trip data about the DB
    $sql = "SELECT * FROM viaje WHERE viaje_id='" . $idViaje . "'";

    //echo $sql;
    $query = mysqli_query($con, $sql);

    if (!$query) {
        $error = "Error in sql";
        $res = "Trip not found";
        mysqli_close($con);
    } else if (mysqli_num_rows($query) === 1) {//check if the result is only one(row)
        $res = mysqli_fetch_array($query);
        //save trip id for later use when selecting a trip
        $_SESSION['trip_id'] = $res['id'];
        //save avalaible slots so its easier to check later when reserving a trip
        $_SESSION['slots'] = $res['capacidad'];
//close DB conection
        mysqli_close($con);
    }

    print_r($error);

    //return trip
    return $res;
}

//this function will insert a new trip in the DB
function newViaje() {

    $error[] = "";
    echo "function called<br/>";
    if (isset($_POST['send'])) {
        echo "from sent<br/>";
        if (isset($_SESSION['user_id'])) {
            echo "user logged<br/>";
            if (isset($_POST['inicio']) && isset($_POST['fin']) && isset($_POST['capacidad']) && isset($_POST['precio']) && isset($_POST['fecha']) && isset($_POST['hora_salida']) && isset($_POST['plate'])) {
                //first we sanitize all inputs 
                echo "fields filled<br/>";

                $arraySanitize = array(
                    'inicio' => FILTER_SANITIZE_STRING,
                    'fin' => FILTER_SANITIZE_STRING,
                    'capacidad' => FILTER_SANITIZE_STRING,
                    'descripcion' => FILTER_SANITIZE_STRING,
                    'precio' => FILTER_SANITIZE_NUMBER_INT,
                    'plate' => FILTER_SANITIZE_STRING,
                    'fecha' => FILTER_SANITIZE_STRING,
                    'hora_salida' => FILTER_SANITIZE_STRING); //change date and hour to use specific validating functions
                //form validation
                $error = [];
                // then check requiered fields for errors

                if (!isset($_POST['inicio']) || $_POST['inicio'] == "") {
                    $error[] = "Origin can't be empty";
                }
                if (!isset($_POST['fin']) || $_POST['fin'] == "") {
                    $error[] = "Destination can't be empty";
                }
                if (!isset($_POST['capacidad']) || $_POST['capacidad'] == "") {
                    $error[] = "Capacity can't be empty";
                }
                if (!isset($_POST['descripcion']) || $_POST['descripcion'] == "") {
                    $error[] = "Description name can't be empty";
                }
                if (!filter_var($_POST['precio'], FILTER_VALIDATE_INT)) {
                    $error[] = "Email not valid";
                }
                if (!isset($_POST['plate']) || $_POST['plate'] == "") {
                    $error[] = "Plate not valid";
                }
                if (!isset($_POST['fecha']) || $_POST['fecha'] == "") {
                    $error[] = "Date can't be emtpy";
                }
                if (!isset($_POST['hora_salida']) || $_POST['hora_salida'] == "") {
                    $error[] = "Departure time can't be empty";
                }

                if (empty($error)) {

                    //print_r($error);
                    //filtered array
                    $formInput = filter_input_array(INPUT_POST, $arraySanitize);

                    //get values from filtered array
                    $from = $formInput['inicio'];
                    $to = $formInput['fin'];
                    $slots = $formInput['capacidad'];
                    $desc = $formInput['descripcion'];
                    $price = $formInput['precio'];
                    $plate = $formInput['plate'];
                    $date = $formInput['fecha'];
                    $time = $formInput['hora_salida'];
                    
                    /*
                     * DateTIme format validation doesn't work for now check function in libraries
                     * not sure if this is necesary given that is not possible to change dateTime format in the form
                     */
                    //datetime output before validating
                    //echo "hora y fecha:" . $date . "--" . $time;
                    //validate correct format
                    //$dateTime = $date . " " . $time;
                    //echo "DATETIMEANTES" . $dateTime;
                    //$dateTime = validateDate($date, $format='Y-m-d H:i');
                    
                    //echo "DATETIMEDESPUES" . $dateTime;
                    //dateTime output after validating
                    //echo "DATETIME:" . $dateTime;

                    //now validate dateTime values
                    //$aux = explode(" ", $dateTime);
                    //$date2 = $aux[0]; //get date
                    //$time2 = $aux[0]; //get time
                    echo "fecha" . $date;
                    if (validateDateValues($date)) {

                        //get driver id from session values as the user creating the trip is the driver
                        $driver_id = $_SESSION['user_id'];


                        //conect to DB
                        $con = dbConnection();

                        //sql sentence for inserting new trip
                        $sql = "INSERT INTO viaje (id, conductor_id, vehiculo_id, seguro_id, "
                                . "origen, destino, capacidad, descripcion, precio, fecha, hora_salida) "
                                . "VALUES (NULL, '" . $driver_id . "', '" . $plate . "', NULL, '" . $from . "', '" . $to . "', "
                                . "'" . $slots . "', '" . $desc . "', '" . $price . "', '" . $date . "', '" . $time . "')";

                        //echo $sql;
                        //insert into DB
                        $query1 = mysqli_query($con, $sql);

                        if (!$query1) {
                            echo "error sql";
                            $error[] = "Trip already registered";
                            mysqli_close($con);
                        } else {
                            echo "sql done<br/>";
                            //print_r($error);

                            mysqli_close($con);
                            //redirect user to trips page
                            header("Location: ../../FrontEnd/Viajes/viajesPendientesForm.php");
                        }
                    } else {
                        $error[] = "date time values not valid";
                    }
                }
            }
        } else {
            echo "You must be logged to plan a new trip<br/>";
        }
    }
    print_r($error);
}

//this function reserves a trip for a user if avalaible
function reservarViaje() {

    //check if user is logged
    if ($_SESSION['user_id']) {
        //check if form was sent
        if ($_POST['send']) {
            //check if a trip was properly selected
            if ($_SESSION['trip_id']) {

                $trip_id = $_SESSION['trip_id'];
                $slots = $_SESSION['slots'];
                $user_id = $_SESSION['user_id'];
                $numSeats = $_POST['quantity'];
                $aux = $slots - $numSeats; //for checking if theres enaought space for more than one
                //if slots is greater than 0 it means theres space avalaible for clients in the trip
                if ($slots > 0 && $aux > 0) {

                    $con = dbConnection();

                    //in order to select a trip we need to create a relation between the trip and the user
                    //and update the number of slots left in the trip
                    $sql1 = "INSERT INTO 'viajerosClientes' ('cliente_id', 'viaje_id') "
                            . "VALUES ('" . $user_id . "', '" . $trip_id . "')";

                    $query1 = mysqli_query($con, $sql1);

                    if (!$query1) {
                        echo "error sql";
                        mysqli_close($con);
                    } else {

                        $sql2 = "UPDATE viaje SET capacidad = '" . $aux . "' WHERE viaje.id = '" . $trip_id . "'";

                        $query2 = mysqli_query($con, $sql2);

                        if (!$query2) {
                            echo "error updating seats";
                            mysqli_close($con);
                        } else {
                            echo "trip reserved!";
                            mysqli_close($con);
                        }
                    }
                } else {
                    echo "There's no space left in the trip";
                }
            } else {
                echo "No trip was selected";
            }
        }
    } else {
        echo "Please log in to reserve a trip";
    }
}
