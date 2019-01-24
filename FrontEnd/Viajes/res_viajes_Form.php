
<!------ Include the above in your HEAD tag ---------->
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="css/res-viajes.css" rel="stylesheet">
    <?php include '../libraries.php'; ?>
    <?php include_once '../header.php'; ?>
</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-sm-2">

            </div>
            <div class="col-sm-8">
                <section class="pt-2">
                    <div class="container-fluid text-center">

                        <div class="row my-3">
                            <div class="col-md-12">
                                <h4>Find the New perfect trip you are looking for!</h4>
                            </div>
                        </div>

                        <!--start of code for trip search results-->

                        <div class="row mb-3">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row ">
                                            <div class="col-md-4">
                                                <img class="user-pic" src="../img/user_icon.jpg" alt=""width="100px">
                                            </div>
                                            <div class="col-md-8">
                                                <h4>Driver Name</h4>
                                                <a href="#">offers & discounts</a>
                                            </div>
                                        </div>
                                        <div class="row ">                                  
                                            <div class="col-md-4">  
                                                <ul class="list-unstyled list-inline">
                                                    <li class="list-inline">Origin:</li>
                                                    <li class="list-inline">Destination:</li>
                                                    <li class="list-inline">Distance:</li>
                                                </ul> 
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-6">   

                                                <h6>3 Free seats</h6>
                                                <input type="number" name="quantity" min="1" max="5" value="1">

                                                <button type="button" class="btn btn-secondary btn-sm btn-block">RESERVE SEAT</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
            </div>
            </section>
        </div>
        <div class="col-sm-2">

        </div>
    </div>
</div>

</body>







<?php

