<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>

<body>
    <?php
    include('../include/header.php');

    include('../include/connection.php')
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2 col-sm-4 col-xs-2" style="margin-left:-32px">

                    <?php
                include('sidenav.php');
                ?>
                </div>
                <div class="col-md-10 col-sm-8 col-xs-10">

                    <h4 class="my-3 text-dark">Admin Dashboard</h4>

                    <div class="col-md-12 my-1">
                        <div class="row">

<!-- Item 01 -->
                            <div class="col-md-3 bg-success mx-2" style="height:120px">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <?php
                                            $ad=mysqli_query($conn,"Select * from admin");
                                            $num1=mysqli_num_rows($ad);
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size:30px;"><?php
                                            echo $num1;
                                            ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Admins</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="admin.php">
                                            <i class="fa-solid fa-user fa-3x my-4" style="color:white;"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

<!-- Item 02 -->
                            <div class="col-md-3 bg-primary mx-2" style="height:120px">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">

                                            <?php
                                            
                                                $doctor=mysqli_query($conn,"SELECT * FROM doctors WHERE status='Approved'");

                                                $num2=mysqli_num_rows($doctor);

                                            ?>

                                            <h5 class="my-2 text-white" style="font-size:30px;"><?php echo $num2?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Doctors</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="doctor.php"><i class="fa-solid fa-user-doctor fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

<!-- Item 03 -->
                            <div class="col-md-3 bg-warning mx-2" style="height:120px">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <?php
                                                $patient=mysqli_query($conn,"SELECT COUNT(*) as total_patients FROM patients");

                                                $num3=mysqli_fetch_assoc($patient)['total_patients'];
                                            ?>

                                            <h5 class="my-2 text-white" style="font-size:30px;"><?php echo $num3;?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Patients</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="patient.php"><i class="fa-solid fa-bed fa-3x my-4"
                                                style="color:white; margin-left:-15px;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!-- Item 04 -->
                            <div class="col-md-3 bg-danger mx-2 my-2" style="height:120px">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                        <?php
                                                $report=mysqli_query($conn,"SELECT COUNT(*) as total_report FROM report");

                                                $num4=mysqli_fetch_assoc($report)['total_report'];
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size:30px;"><?php echo $num4?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Reports</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="report.php"><i class="fa-solid fa-flag fa-3x my-4"
                                                style="color:white; margin-left:-15px;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

<!-- Item 05 -->


                            <div class="col-md-3 bg-warning mx-2 my-2" style="height:120px">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">

                                            <?php
                                            
                                            $job=mysqli_query($conn,"SELECT * FROM doctors WHERE status='Pending'");
                                            $num5=mysqli_num_rows($job);

                                            ?>

                                            <h5 class="my-2 text-white" style="font-size:30px;"><?php echo $num5?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Job Requests</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="job_request.php"><i class="fa-solid fa-pen fa-3x my-4"
                                                style="color:white; margin-left:-15px;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

<!-- Item 06 -->
                            <div class="col-md-3 bg-success mx-2 my-2" style="height:120px">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <?php
                                                $income=mysqli_query($conn,"SELECT SUM(amount_paid)as profit FROM income");
                                                $row=mysqli_fetch_array($income);

                                                $num6=$row['profit'];

                                            ?>
                                            <h5 class="my-2 text-white" style="font-size:30px;"><?php echo "$ ".$num6;?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Income</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="income.php"><i class="fa-solid fa-money-check-dollar fa-3x my-4"
                                                style="color:white; margin-left:-15px;"></i></a>
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