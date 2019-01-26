<?php

/*
 * ajustesUsuario.php contains php functions for the modifications of a user details
 * also for the insertion of a vehicle
 */

//import libraries
include_once '../../libraries.php';

//this function insert a new vehicle in the DB
function addVehicle() {

    $error[] = "";

    //check if the user sent a form
    if (isset($_POST['send'])) {

        //check if user is logged?
        //get id from session values
        if (isset($_SESSION['id_usuario'])) {

            //check for form values
            //sanitizing and filtering
            $arraySanitize = array(
                'plate' => FILTER_SANITIZE_STRING,
                'brand' => FILTER_SANITIZE_STRING,
                'model' => FILTER_SANITIZE_STRING);



            //check if form values are empty
            if (!isset($_POST['plate']) || $_POST['plate'] == "") {
                $error[] = "Plate number can't be empty";
            }
            if (!isset($_POST['brand']) || $_POST['brand'] == "") {
                $error[] = "Brand can't be empty";
            }
            if (!filter_var($_POST['model'] || $_POST['model'] == "")) {
                $error[] = "Model can't be empty";
            }

            //filter the input
            $formInput = filter_input_array(INPUT_POST, $arraySanitize);

            //get values from filtered array
            $plate = $formInput['plate'];
            $brand = $formInput['brand'];
            $model = $formInput['model'];

            //now we need to get the user id
            $user_id = $_SESSION['user_id'];

            //connect to DB to insert new vehicle
            $con = dbConnection();

            //sql sentence for inserting new vehicle
            $sql = "INSERT INTO vehiculo (matricula, propietaro_id, marca, modelo)"
                    . " VALUES (' " . $plate . "', '" . $user_id . "', '" . $brand . "',"
                    . "' " . $model . "')";

            //do the query now
            $query = mysqli_query($con, $sql);

            //check for errors now
            if (!$query) {
                $error[] = "Vehicle already in the DB";
                mysqli_close($con);
            } else {

                //everthing is ok
                mysqli_close($con);
                //redirect to another page?
                // header("Location: ../../index.php");
            }
        }
    } else {

        $error[] = "You must be loged-in in order to add vehicles";
    }

    //check all error for debugging porpouses
    print_r($error);
}

//this function will get all vehicles from a user in the DB and return it to the backend
function getUserVehicles() {

    $error[] = "";

    //check if the user is logged
    if (isset($_SESSION['user_id'])) {

        //get userID to known which cars to get from DB
        $user_id = $_SESSION['user_id'];

        //first conenct to DB
        $con = dbConnection();

        $sql = "SELECT * FROM vehiculo WHERE propietario_id LIKE '" . $user_id . "';";

        $query = mysqli_query($con, $sql);

        if (!$query) {

            $error = "Error in sql";
            mysqli_close($con);
        } else {

            //this loop should go to each row of the vehicle table and store it in an array
            while ($row = mysqli_fetch_assoc($query)) {

                $res[] = array('matricula' => $row['matricula'],
                    'propietario_id' => $row['propietario_id'],
                    'marca' => $row['marca'],
                    'modelo' => $row['modelo']);
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

//this function changes the name of the user in case is not taken already
function setName($newName) {

    $error[] = "";

    //check if the user is logged
    if (isset($_SESSION['user_id'])) {

        //get user_id
        $user_id = $_SESSION['user_id'];
        //first filter and sanitize the new name
        if ($_POST['newName'] != "") {
            $newName = filter_var($_POST['newName'], FILTER_SANITIZE_STRING);
            if ($_POST['newName'] == "") {
                $error[] = 'Please enter a valid name.<br/><br/>';
            }
        } else {
            $error[] = 'Please enter your name.<br/>';
        }

        //connect to DB
        $con = dbConnection();

        $sql = "UPDATE usuario SET nombre = '" . $newName . "' WHERE usuario.id =" . $user_id;

        $query = mysqli_query($con, $sql);

        if (!$query) {

            $error[] = "Name already in the DB";
            mysqli_close($con);
        } else {

            //if the name is not already registered 
            mysqli_close($con);
        }
    }
}

function setEmail($newEmail) {

    $error[] = "";

    //check if the user is logged
    if (isset($_SESSION['user_id'])) {

        //get user_id
        $user_id = $_SESSION['user_id'];
        //first filter and sanitize the new email
        if ($_POST['newEmail'] != "") {
            $newEmail = filter_var($_POST['newEmail'], FILTER_SANITIZE_EMAIL);
            if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
                $errors[] = $newEmail . " is <strong>NOT</strong> a valid email address.<br/><br/>";
            }
        } else {
            $errors[] = 'Please enter your email address.<br/>';
        }

        //connect to DB
        $con = dbConnection();

        $sql = "UPDATE usuario SET correo = '" . $newEmail . "' WHERE usuario.id =" . $user_id;

        $query = mysqli_query($con, $sql);

        if (!$query) {

            $error[] = "Email already in the DB";
            mysqli_close($con);
        } else {

            //if the name is not already registered 
            mysqli_close($con);
        }
    }
}

function setPassword($newPass1, $newPass2, $oldPass) {
    
    $error[] = "";

    //check if the user is logged
    if (isset($_SESSION['user_id'])) {

        //get user_id
        $user_id = $_SESSION['user_id'];
        //first filter and sanitize the new password
       if ($_POST['newPass1'] !== "" && $_POST['newPass2'] !== "") {
            $newPass1 = filter_var($_POST['newPass1'], FILTER_SANITIZE_STRING);
            $newPass2 = filter_var($_POST['newPass2'], FILTER_SANITIZE_STRING);
            if ($_POST['newName'] === ""  || $_POST['newPass2'] === "") {
                $error[] = 'Please fill both fields with new password.<br/><br/>';
            }else if($newPass1 !== $newPass2) {//check for both fields of password are the same
                $error[] = 'Please make sure you introduce same password into both fields.<br/>';
            }else{
                if(password_verify($oldPass, $newPass1)){//check new password is not the old password
                    $error[] = "Please make sure your new password is not the oldpassword.<br/>";
                }
            }
        } else {
            $error[] = 'Please enter your new password.<br/>';
        }

        //connect to DB
        $con = dbConnection();

        //hash the new password before updating
        $hashedPass = password_hash($newPass1, PASSWORD_DEFAULT);
        
        $sql = "UPDATE usuario SET contrasenha = '" . $hashedPass . "' WHERE usuario.id =" . $user_id;

        $query = mysqli_query($con, $sql);

        if (!$query) {

            $error[] = "Error in sql";
            mysqli_close($con);
        } else {

            //if the name is not already registered 
            mysqli_close($con);
        }
    }
    
}
