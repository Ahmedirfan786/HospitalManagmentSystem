<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total income</title>
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
                <h5 class="text-center my-2">Total Income</h5>

                <?php
                
                $query="SELECT * FROM income";
                $res=mysqli_query($conn,$query);

                $output="";

                $output.="<table class='table table-striped table-responsive'>
                    <tr>
                        <th>Id</th>
                        <th>Doctor</th>
                        <th>Patient</th>
                        <th>Date_discharged</th>
                        <th>Fee</th>
                    </tr>
                ";

                if($row=mysqli_num_rows($res)<1){
                    $output.="<tr>
                        <td class='text-center' colspan='5'>No Patient Discharged Yet</td>
                    ";
                }

                while($row=mysqli_fetch_array($res)){
                    $output.="
                    <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['doctor']."</td>
                        <td>".$row['patient']."</td>
                        <td>".$row['date_discharge']."</td>
                        <td>".$row['amount_paid']."</td>
                    </tr>
                    ";
                };

                $output.="<table>";

                echo $output;


                ?>

            </div>
        </div>
    </div>
</div>
</body>
</html>