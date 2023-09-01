<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Patients Appointment</title>
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
                    <h5 class="text-center my-2">Total Appointments</h5>

                    <?php
                        if(isset($_GET['id'])){

                            $id=$_GET['id'];

                            $query="SELECT * FROM appointment WHERE id='$id'";
                            $res=mysqli_query($conn,$query);

                            $row=mysqli_fetch_array($res);


                        }
                    ?>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-striped my-3">
                                    <tr>
                                        <td colspan="2" class="text-center">Appointment Details</td>
                                    </tr>

                                    <tr>
                                        <td>Firstname</td>
                                        <td><?php echo $row['firstname'];?></td>
                                    </tr>

                                    <tr>
                                        <td>Surname</td>
                                        <td><?php echo $row['surname'];?></td>
                                    </tr>

                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $row['gender'];?></td>
                                    </tr>

                                    <tr>
                                        <td>Phone no</td>
                                        <td><?php echo $row['phone'];?></td>
                                    </tr>

                                    <tr>
                                        <td>Appointment Date</td>
                                        <td><?php echo $row['appointment_date'];?></td>
                                    </tr>

                                    <tr>
                                        <td>Symptoms</td>
                                        <td><?php echo $row['symptoms'];?></td>
                                    </tr>

                                </table>
                            </div>


                            <div class="col-md-6">

                                <h5 class="text-center my-2">Invoice</h5>

                                    <?php
                                        if(isset($_POST['send'])){
                                            $fee=$_POST['fee'];
                                            $des=$_POST['des'];

                                            if(empty($fee)){

                                            }
                                            else if(empty($des)){
                                                
                                            }
                                            else{
                                                $doc=$_SESSION['doctor'];

                                                $fname=$row['firstname'];
                                                $query="INSERT INTO income(doctor, patient, date_discharge, amount_paid, description) VALUES('$doc','$fname',NOW(),'$fee','$des')";

                                                $res=mysqli_query($conn,$query);

                                                if($res){
                                                    echo "<script>alert('You have send invoice')</script>";

                                                    mysqli_query($conn,"UPDATE appointment SET status='Discharged' WHERE id='$id'");
                                                }
                                            }
                                        }
                                    ?>

                                <form method="POST">
                                    <label>Fee</label>
                                    <input type="number" name="fee" class="form-control" autocomplete="off" placeholder="Enter Patient Fee">

                                    <label>Description</label>
                                    <input type="text" name="des" class="form-control" autocomplete="off" placehoder="Enter Description">

                                    <input type="submit" name="send" class="btn btn-primary my-2" value="Send">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>