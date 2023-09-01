<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
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
                    <h5 class="text-center my-2">Book Appointment</h5>
                    <?php
                                                $patient=$_SESSION['patient'];
                                                $sel=mysqli_query($conn,"SELECT * FROM patients WHERE username='$patient'");

                                                $row=mysqli_fetch_array($sel);

                                                $firstname=$row['firstname'];
                                                $surname=$row['surname'];
                                                $gender=$row['gender'];
                                                $phone=$row['phone'];

                                                if(isset($_POST['book'])){

                                                    $date=$_POST['date'];
                                                    $sym=$_POST['sym'];

                                                    if(empty($sym)){

                                                    }
                                                    else{
                                                        $query = "INSERT INTO appointment(firstname, surname, gender, phone, appointment_date, symptoms, status, date_booked) VALUES('$firstname', '$surname', '$gender', '$phone', '$date', '$sym', 'Pending', NOW())";


                                                        $res=mysqli_query($conn,$query);

                                                        if($res){
                                                            echo "<script>alert('You have booked appointment successfully')</script>";
                                                        }
                                                    }
                                                }
                                            ?>


                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3"></div>
                                                    <div class="col-md-6 jumbotron">
                                                         <form method="POST">
                                                            <label>Appointment </label>
                                                            <input type="date" name="date" class="form-control">

                                                            <label>Symptoms</label>
                                                            <input type="text" name="sym" class="form-control" autocomplete="off" placeholder="Enter Symptoms">

                                                            <input type="submit" name="book" class="btn btn-primary my-2" value="Book Appointment">
                                                         </form>
                                                    </div>
                                                    <div class="col-md-3"></div>
                                                </div>
                                            </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>