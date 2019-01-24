<?php

include_once '../../libraries.php';

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
            'phoneNumber' => FILTER_SANITIZE_NUMBER_INT);
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

        //optional values bank card is optional
        if (isset($formInput['cardNumber'])) {
            $cardNumber = $formInput['cardNumber'];
        } else {
            $cardNumber = "";
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
        $cardNumber = $formInput['cardNumber'];


        //hash the password
        $hashedPass = password_hash($password, PASSWORD_DEFAULT);

        //conect to DB
        $con = dbConnection();

        //sql sentence for inserting user
        //echo $name . "<br/>";
        $sqlUser = "INSERT INTO usuario ( id_usuario, rol_id, nombre, apellidos, correo, contrasenha, telefono,"
                . ") VALUES ('NULL', ' 2 ', '" . $name
                . "', '" . $lastName . "', '" . $userName . "', '" . $hashedPass
                . "', '" . $phoneNumber . " )";

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
            //Now we need to create the relation to the client table

            //sql sentence for inserting client with user_id
            $sqlClient= "INSERT INTO cliente (usuario_id, tarjetaCredito) VALUES ("
                    . "(' " . $user_id . "', '" . $cardNumber . "')";
            
            $query2 = mysqli_query($con, $sqlClient);
            
            if(!$query2){
                $error[] = "Error inserting card number";
            }
            
            //create session values
            $_SESSION["user"] = $userName;
            $_SESSION["user_id"] = $user_id;

            print_r($error);

            mysqli_close($con);
            header("Location: ../../index.php");
        }
    }
}
