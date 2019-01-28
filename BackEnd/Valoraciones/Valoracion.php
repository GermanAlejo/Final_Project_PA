<?php



function newValoracion(){

    //check if user sent form
    if(isset($_POST['send'])){
        //check if user is logged
        if(isset($_SESSION['user_id'])){
            
            //save user id for later use
            $user_id = $_SESSION['user_id'];
            
            
            
            
        }else{
            echo 'You must be logged to create valorations';
        }
        
        
    }
    
}

