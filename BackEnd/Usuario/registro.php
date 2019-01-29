<?php

include_once '../../libraries.php';

registroForm();

//This function contains all php code for the database connection and insertion of a new user
function registroForm() {

    $error[] = "";

    if (isset($_POST['send'])) {

        if (isset($_POST['firstName']) && isset($_POST['middlename']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['phoneNumber'])) {
            //first we sanitize all inputs 
            //     if (empty($error)) {

            $arraySanitize = array(
                'firstName' => FILTER_SANITIZE_STRING,
                'middlename' => FILTER_SANITIZE_STRING,
                'lastname' => FILTER_SANITIZE_STRING,
                'email' => FILTER_SANITIZE_STRING,
                'password' => FILTER_SANITIZE_STRING,
                'phoneNumber' => FILTER_SANITIZE_NUMBER_INT);
            //       }
            //form validation
            $error = [];
            // then check requiered fields for errors

            if (!isset($_POST['firstName']) || $_POST['firstName'] == "") {
                $error[] = "Name can't be empty";
            }
            if (!isset($_POST['middlename']) || $_POST['middlename'] == "") {
                $error[] = "Middle name can't be empty";
            }
            if (!isset($_POST['lastname']) || $_POST['lastname'] == "") {
                $error[] = "Last name can't be empty";
            }
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $error[] = "Email not valid";
            }
            if (strlen($_POST['password']) < 4) {
                $error[] = "Password must contain at least 4 characters";
            }
            if (!filter_var($_POST['phoneNumber'], FILTER_VALIDATE_INT)) {
                $error[] = "Phone Number not valid";
            }



            //print_r($error);
            //filtered array
            $formInput = filter_input_array(INPUT_POST, $arraySanitize);

            //get values from filtered array
            $name = $formInput['firstName'];
            $middleName = $formInput['middlename'];
            $lastName = $formInput['lastname'];
            $userName = $formInput['email']; //username is email
            $password = $formInput['password'];
            $phoneNumber = $formInput['phoneNumber'];



            //hash the password
            $hashedPass = password_hash($password, PASSWORD_DEFAULT);

            //conect to DB
            $con = dbConnection();

            //sql sentence for inserting user
            //echo $name . "<br/>";
             $sqlUserExist= "SELECT COUNT(*) FROM usuario WHERE usuario.correo=".$userName.";";

            $sqlUser = "INSERT INTO usuario ( id, rol_id, foto, nombre, apellido1, apellido2, correo, contrasenha, telefono"
                    . ") VALUES ('NULL', ' 1 ', 'NULL', '" . $name
                    . "', '" . $middleName . "', '" . $lastName . "', '" . $userName . "', "
                    . "'" . $hashedPass . "', '" . $phoneNumber . "' )";

            echo $sqlUser;
            //insert into DB
            $query1 = mysqli_query($con, $sqlUser);

            if ($query1) {
                echo "error sql1";
                $error[] = "User already registered";
                mysqli_close($con);
            } else {
                //echo "true";
                //get the automated generated id from last query
                $user_id = mysqli_insert_id($con);
                //Now we need to create the relation to the client table
                //sql sentence for inserting client with user_id
                $sqlClient = "INSERT INTO cliente (usuario_id) VALUES "
                        . "(' " . $user_id . "')";

                $query2 = mysqli_query($con, $sqlUser);
                $query3 = mysqli_query($con, $sqlClient);
                
                if (!$query2) {
                    $error[] = "Error inserting client into clientes table";
                }

                //create session values
                $_SESSION["user"] = $userName;
                $_SESSION["user_id"] = $user_id;

                print_r($error);

                mysqli_close($con);
                header("Location: ../../index.php");
            }
        } else {
            unSetSession();
            echo "<br/>All fields must be filled<br/>";
        }
    }
}
