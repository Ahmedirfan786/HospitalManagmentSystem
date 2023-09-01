<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctors</title>
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

                <h5 class="text-center my-2">Edit Doctors</h5>

                <?php
                
                if(isset($_GET['id'])){

                    $id=$_GET['id'];

                    $query="SELECT * FROM doctors WHERE id='$id'";

                    $res= mysqli_query($conn,$query);

                    $row=mysqli_fetch_array($res);

                }

                ?>

                <div class="row">
                <div class="col-md-8">
                <h5 class="text-center">Doctor Details</h5>
                    <h5>ID: <?php echo $row['id'];?></h5>
                    <h5>Firstname: <?php echo $row['firstname'];?></h5>
                    <h5>surname: <?php echo $row['surname'];?></h5>
                    <h5>Username: <?php echo $row['username'];?></h5>
                    <h5>Email: <?php echo $row['email'];?></h5>
                    <h5>Phone: <?php echo $row['phone'];?></h5>
                    <h5>Gender: <?php echo $row['gender'];?></h5>
                    <h5>Country: <?php echo $row['country'];?></h5>
                    <h5>Date_Registered : <?php echo $row['date_reg'];?></h5>
                    <h5>Salary : <?php echo $row['salary'];?></h5>
                    
                </div>

                <div class="col-md-4">
                    <h5 class="text-center">Update Salary</h5>

                    <?php
                    if(isset($_POST['update'])){

                        $salary=$_POST['salary'];

                        $query="UPDATE doctors SET salary='$salary' WHERE id='$id' ";

                        mysqli_query($conn,$query);
                    }
                    ?>

                    <form method="POST">
                        <label>Enter Doctor's Salary</label>
                        <input type="number" name="salary" class="form-control" autocomplete="off" placeholder="Enter Doctors Salary" value="<?php echo $row['salary']; ?>">
                        <input type="submit" name="update" class="btn btn-primary my-2" value="update_salary">
                    </form>
                </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>