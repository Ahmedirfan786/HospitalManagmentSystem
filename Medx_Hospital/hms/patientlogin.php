<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login Page</title>
</head>
<body>
    <?php
    include('include/header.php');
    include('include/connection.php');


    if(isset($_POST['login'])){
        $uname=$_POST['uname'];
        $pass=$_POST['pass'];


        if(empty($uname)){
            echo "<script>alert('Enter Username')</script>";
        }
        else if(empty($pass)){
            echo "<script>alert('Enter Password')</script>";
        }

        else{
            $query="SELECT * FROM patientS WHERE username='$uname' AND password='$pass'";

            $res=mysqli_query($conn,$query);

            if(mysqli_num_rows($res)==1){
                header("location:patient/index.php");

                $_SESSION['patient']=$uname;
                
            }
            else{
                echo "<script>alert('Invalid Username or Password')</script>";
            }
        }
    }

    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-5 jumbotron">

                    <h5 class="text-center my-3">Patient Login</h5>

                    <form method="POST">

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>

                        <input type="submit" name="login" class="btn btn-primary my-3" value="login">

                        <p>I dont have an account <a href="patientsignup.php">click here!</a></p>

                    </form>

                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>