<?php

/*
 * ajustesUsuario.php contains php functions for the modifications of a user details
 * also for the insertion of a vehicle
 */

//import libraries
include_once '../../libraries.php';

//this function insert a new vehicle in the DB
function addVehicle() {

     $error[]="";
    
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
            if(!$query){
                $error[] = "Vehicle already in the DB";
                mysqli_close($con);
            }else{
                
                //everthing is ok
                mysqli_close($con);
                //redirect to another page?
               // header("Location: ../../index.php");
                
                
            }
            
        }
    }else{
        
        $error[] = "You must be loged-in in order to add vehicles";
    }
    
    //check all error for debugging porpouses
    print_r($error);
}


//this function will get all vehicles from a user in the DB and return it to the backend
function getUserVehicles(){
    
     $error[]="";
    
    //check if the user is logged
    if(isset($_SESSION['user_id'])){
        
        //get userID to known which cars to get from DB
        $user_id = $_SESSION['user_id'];
        
        //first conenct to DB
        $con = dbConnection();
        
        $sql = "SELECT * FROM vehiculo WHERE propietario_id LIKE '" . $user_id . "';";
        
        $query = mysqli_query($con, $sql);
        
        if(!$query){
            
            $error = "Error in sql";
            mysqli_close($con);
        }else{
            
            //this loop should go to each row of the vehicle table and store it in an array
            while($row = mysqli_fetch_assoc($query)){
                
                $res[] = array('matricula'=> $row['matricula'], 
                    'propietario_id' => $row['propietario_id'],
                    'marca' => $row['marca'],
                    'modelo' => $row['modelo']);
                
            }
            
            //close DB conection
            mysqli_close($con);
            
            //the array with the tables rows is returnet to the frontend
            return $res;
        }
        
        
        
    }else{
        
        $error[] = "The user must be logged-in";
    }
    
    print_r($error);
    
}
