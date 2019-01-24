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
                    <div class="col-md-6">
                        <label>Card Number</label>
                        <input type="text" name="cardNumber" class="form-control">
                    </div>
                    
                </div>

                
                <button type="submit" name="send" class="btn btn-primary">Sign up</button>
            </form>



            <?php
        }
        
        include_once '../../BackEnd/Usuario/registro.php';
        registrationForm();
        registroForm();
        
        
        
        ?>




    </body>

</html>

