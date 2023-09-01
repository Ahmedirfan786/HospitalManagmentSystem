<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My invoice</title>
</head>
<body>
    <?php
    include('../include/header.php');
    include('../include/connection.php');
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2 col-sm-4 col-xs-4" style="margin-left:-32px;">
                    <?php
                        include('sidenav.php');
                    ?>
                </div>
                <div class="col-md-10 col-sm-8 col-xs-8">
                    <h5 class="my-3">My Invoice</h5>

                    <?php
                        $patient=$_SESSION['patient'];
                        $query="SELECT * FROM patients WHERE username='$patient'";

                        $res=mysqli_query($conn,$query);
                        $row=mysqli_fetch_array($res);

                        $fname=$row['firstname'];

                        $querys=mysqli_query($conn,"SELECT * FROM income WHERE patient='$fname'");


                        $output="";

                        $output.="
                        <table class='table table-striped table-responsive my-3'>
                            <tr>
                                <th>Id</th>
                                <th>Doctor</th>
                                <th>Patient</th>
                                <th>Date Discharged</th>
                                <th>Amount Paid</th>
                                <th>Desciption</th>
                                <th>Action</th>
                            </tr>
                        ";
                        if(mysqli_num_rows($querys)<1){
                            $output.="
                            <tr>
                                <td class='text-center' colspan='7'>No Invoice Yet</td>
                            </tr>
                            ";

                        }

                        while($row=mysqli_fetch_array($querys)){
                            $output.="
                            <tr>
                                <td>".$row['id']."</td>
                                <td>".$row['doctor']."</td>
                                <td>".$row['patient']."</td>
                                <td>".$row['date_discharge']."</td>
                                <td>".$row['amount_paid']."</td>
                                <td>".$row['description']."</td>

                                <td>
                                    <a href='invoiceview.php?id=".$row['id']."'>    
                                        <button class='btn btn-primary'>View</button>
                                    </a>
                                </td>
                            </tr>
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