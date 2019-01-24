<?php

include_once '../libraries.php';


//This function contains all php code for the database connection and insertion of a user
function registroForm() {
    if (isset($_POST['send'])) {
        //first we sanitize all inputs 
        //     if (empty($error)) {

        $arraySanitize = array(
            'name' => FILTER_SANITIZE_STRING,
            'lastName' => FILTER_SANITIZE_STRING,
            'email' => FILTER_SANITIZE_STRING,
            'password' => FILTER_SANITIZE_STRING,
            'phoneNumber' => FILTER_SANITIZE_NUMBER_INT,
            'cardNumber' => FILTER_SANITIZE_STRING,
            'plateNumber' => FILTER_SANITIZE_STRING,
            'slots' => FILTER_SANITIZE_NUMBER_INT);
        //       }
        //form validation
        $error = [];
        // then check requiered fields for errors

        if (!isset($_POST['name']) || $_POST['name'] == "") {
            $error[] = "Name can't be empty";
        }
        if (!isset($_POST['lastName']) || $_POST['lastName'] == "") {
            $error[] = "Last name can't be empty";
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email not valid";
        }
        if (strlen($_POST['password']) < 1) {
            $error[] = "Password must contain at least 8 characters";
        }

        if (!filter_var($_POST['phoneNumber'], FILTER_VALIDATE_INT)) {
            $error[] = "Phone Number not valid";
        }

        //number of slots in the car are optional thus we check before that they are filled
        if (isset($_POST['slots']) && !empty($_POST['slots'])) {
            if (!filter_var($_POST['slots'], FILTER_VALIDATE_INT)) {
                $error[] = "Slots not valid";
            }
        }
        //print_r($error);
        //filtered array
        $formInput = filter_input_array(INPUT_POST, $arraySanitize);

        //get values from filtered array
        $name = $formInput['name'];
        $lastName = $formInput['lastName'];
        $userName = $formInput['email']; //username is email
        $password = $formInput['password'];
        $phoneNumber = $formInput['phoneNumber'];

        //optional values
        if (isset($formInput['cardNumber'])) {
            $cardNumber = $formInput['cardNumber'];
        } else {
            $cardNumber = "";
        }
        if (isset($_POST['plateNumber'])) {
            $plateNumber = $formInput['plateNumber'];
            $rol = "conductor"; //set user rol to driver in case he has a vehicle
        } else {
            $rol = "cliente";
        }
        if (isset($_POST['slots'])) {
            $carSlots = $formInput['slots'];
        } else {
            $carSlots = false;
        }

        //hash the password
        $hashedPass = password_hash($password, PASSWORD_DEFAULT);

        //conect to DB
        $con = dbConnection();

        //sql sentence for inserting user
        //echo $name . "<br/>";
        $sqlUser = "INSERT INTO usuario ( Id, Name, LastName, Mail, Pass, Phone,"
                . " Credit_card, Rol) VALUES ('NULL', '" . $name . "', '" . $lastName
                . "', '" . $userName . "', '" . $hashedPass . "', '" . $phoneNumber
                . "', '" . $cardNumber . "', '" . $rol . "')";

        //  echo $sqlUser;
        //insert into DB
        $query1 = mysqli_query($con, $sqlUser);

        if (!$query1) {
            //  echo "error sql1";
            $error[] = "User already registered";
            mysqli_close($con);
        } else {
            //  echo "true";
            //get the automated generated id from last query
            $user_id = mysqli_insert_id($con);
            echo "slots: " . $carSlots;
            //if slots is true means theres a number thus a driver and a car to insert
            if ($carSlots) {
                //sql sentence for inserting vehicle
                $sqlVehicle = "INSERT INTO vehiculo (Matricula, Plazas, Propietario_id)"
                        . " VALUES ('" . $plateNumber . "', '" . $carSlots . "', '" . $user_id
                        . "')";

                //insert vehicle into DB
                $query2 = mysqli_query($con, $sqlVehicle);

                if (!$query2) {
                    $error[] = "Vehicle already registered";
                }
            } else {
                $error[] = "Error iserting vehicle";
            }

            $_SESSION["user"] = $userName;
            $_SESSION["user_id"] = $user_id;
            $_SESSION["type"] = $rol;

            print_r($error);

            mysqli_close($con);
            header("Location: index.php");
        }
    }
}
