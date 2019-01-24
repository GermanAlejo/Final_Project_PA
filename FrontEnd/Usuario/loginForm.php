
<!--This page contains all html and php code for the login of the users
    All of the vaidations will be done in the this same page as the html form
    once the user has log in the page will redirect the user to index.php-->
<html>

    <head>
        <meta charset="UTF-8">
        <title></title>

        <?php include '../../libraries.php'; ?>
    </head>

    <body>

        <?php include '../header.php'; ?>


        <form action="#" method="POST">

            <div class="loginContainer">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <button type="submit">Login</button>

            </div>

            <div class="loginContainer">
                <button type="button" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form> 

    </body>

</html>

<?php
//start session
session_start();
include_once('../../BackEnd/Usuario/login.php');

loginForm();