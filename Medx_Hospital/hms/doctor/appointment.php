<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Appointment</title>
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
                        include('sidenav.php');
                    ?>
                </div>
                <div class="col-md-10 col-sm-8 col-xs-8">
                    <h5 class="my-3">Total Appointment</h5>

                    <?php
                        $query="SELECT * FROM appointment WHERE status='Pending'";
                        $res=mysqli_query($conn,$query);

                        $output="";

                        $output.="
                        <table class='table table-striped table-responsive my-3'>
                            <tr>
                                <th>Id</th>
                                <th>Firstname</th>
                                <th>Surname</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Appointment Date</th>
                                <th>Symptoms</th>
                                <th>Date Booked</th>
                                <th>Action<th>
                            </tr>


                        ";

                        if(mysqli_num_rows($res)<1){
                            $output.="
                            <tr>
                                <td class='text-center' colspan='8'>No Appointments Yet</td>
                            </tr>

                            ";
                        }

                        while($row=mysqli_fetch_array($res)){
                            $output.="
                            <tr>
                            </tr>
                            <td>".$row['id']."</td>
                            <td>".$row['firstname']."</td>
                            <td>".$row['surname']."</td>
                            <td>".$row['gender']."</td>
                            <td>".$row['phone']."</td>
                            <td>".$row['appointment_date']."</td>
                            <td>".$row['symptoms']."</td>
                            <td>".$row['date_booked']."</td>

                            <td>
                                <a href='discharge.php?id=".$row['id']."'>
                                    <button class='btn btn-primary'>Check</button>
                                </a>
                            </td>
                            ";
                        }

                        $output.="<table>";

                        echo $output;
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>