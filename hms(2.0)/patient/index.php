<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
</head>
<body>
    <?php
    include('../include/header.php');
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-32px">
                    <?php
                    include('sidenav.php');
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center my-3">Patients Dashboard</h5>

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
                                <div class="col-md-3 my-2 bg-danger mx-2" style="height:120px">
                                <div class="col-md-12">
                                    <div class="row my-3">
                                        <div class="col-md-8">
                                            <h5 class="text-white">Book</h5>
                                            <h5 class="text-white">Appointment</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><i class="fa-solid fa-notes-medical fa-3x my-4" style="color: #ffffff;"></i></a>
                                        </div>
                                    </div>
                                </div>
                                </div>

                                <!-- Item 03 -->
                                <div class="col-md-3 my-2 bg-success mx-2" style="height:120px">
                                <div class="col-md-12">
                                    <div class="row my-3">
                                        <div class="col-md-8">
                                            <h5 class="text-white">My</h5>
                                            <h5 class="text-white">Invoice</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><i class="fa-solid fa-file-invoice-dollar fa-3x my-4" style="color: #ffffff;"></i></a>
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