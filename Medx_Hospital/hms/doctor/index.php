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
    include('../include/connection.php');

    ?>


    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2 col-sm-4 col-xs-4" style="margin-left:-32px">

                    <?php
                    include('sidenav.php')
                    ?>

                </div>
                <div class="col-md-10 col-sm-8 col-xs-8">

                    <div class="container-fluid">
                        <h5 class="text-center">Doctor's Dashboard</h5>
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
                                            <a href="profile.php"><i class="fa-solid fa-circle-user fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                                </div>

                                <!-- Item 02 -->
                                <div class="col-md-3 my-2 bg-danger mx-2" style="height:120px">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                        <?php
                                                $patient=mysqli_query($conn,"SELECT COUNT(*) as total_patients FROM patients");

                                                $num=mysqli_fetch_assoc($patient)['total_patients'];
                                            ?>

                                            <h5 class="my-2 text-white" style="font-size:30px;"><?php echo $num;?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Patient</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="patient.php"><i class="fa-solid fa-bed-pulse fa-3x my-4" style="color: #ffffff;"></i></a>
                                        </div>
                                    </div>
                                </div>
                                </div>

                                <!-- Item 03 -->
                                <div class="col-md-3 my-2 bg-success mx-2" style="height:120px">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php
                                            $app=mysqli_query($conn,"SELECT * FROM appointment WHERE status='Pending'");

                                            $num2=mysqli_num_rows($app);
                                            ?>
                                        <h5 class="text-white my-2"><?php echo $num2;?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Appointment</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="appointment.php"><i class="fa-solid fa-calendar-days fa-3x my-4" style="color: #ffffff;"></i></a>
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
    </div>


</body>
</html>