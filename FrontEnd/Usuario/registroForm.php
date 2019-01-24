<!--This page contains all the php and html code for the registration of a new user-->

<html>

    <head>
        <meta charset="UTF-8">
        <title></title>

        <?php include '../../libraries.php'; ?>
    </head>

    <body>

        <?php
        include_once '../header.php';

        function registrationForm() {
            ?>

            <form action="#" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
                        <small class="form-text text-muted">Your email will be also your surname and used to log-in</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6"
                         <label for="inputName" >Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputLastName">Last Name</label>
                        <input type="text" name="lastName" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNumber">Phone number</label>
                        <input type="text" name="phoneNumber" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCard">Card Number</label>
                        <input type="text" name="cardNumber" class="form-control">
                        <small class="form-text text-muted">We wont steal your money we promise</small>
                    </div>

                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="hasCar" onclick="showCarForm('hasCar', 'carValuesID', null, 'on')" unchecked>
                        <label class="form-check-label" for="gridCheck">
                            Do you own a car?
                        </label>
                    </div>
                </div>
                <div id="carValuesID" class="form-row" style="display: none">
                    <div class="form-group col-md-6">
                        <label for="inputCard">Plate Number</label>
                        <input type="text" name="plateNumber" class="form-control">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCard">Car slots</label>

                        <input type="text" name="slots" class="form-control">

                    </div>
                </div>
                <button type="submit" name="send" class="btn btn-primary">Sign up</button>
            </form>



            <?php
        }
        
        include_once 'registro.php';
        registrationForm();
        registroForm();
        
        
        
        ?>




    </body>

</html>

