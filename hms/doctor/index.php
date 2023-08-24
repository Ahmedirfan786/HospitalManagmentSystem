<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Dashboard</title>
</head>
<body>
    <?php
    include('../include/header.php');
    // include('../include/connection.php');

    ?>


    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-32px">

                    <?php
                    include('sidenav.php')
                    ?>

                </div>
                <div class="col-md-10">

                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="row">
                                <!-- Item 01 -->
                                <div class="col-md-3 my-2 bg-primary" style="height:120px">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-white my-4">My Profile</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><i class="fa-solid fa-circle-user fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                                </div>

                                <!-- Item 02 -->
                                <div class="col-md-3 bg-warning mx-2" style="height:120px">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h5 class="my-2 text-white" style="font-size:30px;">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Patients</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <i class="fa-solid fa-bed fa-3x my-4"
                                                style="color:white; margin-left:-15px;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>