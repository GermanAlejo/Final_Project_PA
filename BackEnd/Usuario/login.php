<?php

include_once '../../libraries.php';

//This function contains all php code for the validation and check of a user
function loginForm() {



    if (isset($_POST['envio'])) {

        echo 'entra1';


//hadle the form and validate the input
        if (isset($_POST['username']) && isset($_POST['password'])) {
  echo 'entra2';
            $con = dbConnection();

//Save values in an array and sanitize them
            $arraySanitize = array('username' => FILTER_SANITIZE_STRING,
                'password' => FILTER_SANITIZE_STRING);

//filter the values
            $formInput = filter_input_array(INPUT_POST, $arraySanitize);
            $userName = $formInput['username'];
            $password = $formInput['password'];

//now do the DB search
//first sql sentence to find user in the DB
            $sql = "SELECT * FROM usuario WHERE correo LIKE '" . $userName . "';"; //username is email
            $query = mysqli_query($con, $sql);

            if (!$query) {//if we don't get an error here we found a user
                mysqli_close($con);
                echo 'entra';
                die("ERROR: There is an error in the LOGIN");
            } else if (mysqli_num_rows($query) == 1) {

                $aux = mysqli_fetch_array($query); //get the query result into an array
                print_r($aux);
                if (password_verify($password, $aux['contrasenha'])) {//using password_verify without hashing the DB passwords causes an error
                    //not finding any user
                    // if ($password === $aux['Pass']) {
                    //user found
                    mysqli_close($con);

                    //create session values once the user has been found in the DB
                    $_SESSION['userName'] = $userName;
                    $_SESSION['user_id'] = $aux['id'];
                    //$_SESSION['userRol'] = $aux['Rol'];
                    echo "User logged";
                    //go back to index after login
                    //header("Location: ../../index.php");
                } else {
                    //user not found
                    logOut();
                    mysqli_close($con);
                    die("User not found, mail and pass dont match");
                }
            }
        } else {
            unSetSession();
            echo "<br/>Please make sure you filled both email and password fields<br/>";
        }
    }
}

//this function should log out the user unseting all session variables
function logOut() {
    session_start();
    session_unset();
    header("Location: home.php");
}
