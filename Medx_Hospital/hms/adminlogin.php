<?php
session_start();
include('include/connection.php');

if(isset($_POST['login'])){

    $username=$_POST['uname'];
    $password=$_POST['pass'];

    $error=array();

    if(empty($username)){
        $error['admin']="Enter username";
    }
    elseif(empty($password)){
        $error['admin']="Enter password";
    }


    if(count($error)==0){
        $query="Select * from admin where username='$username' AND password='$password'";
        $result=mysqli_query($conn,$query);

        if(mysqli_num_rows($result)==1){
            echo "<script>alert('Succesfully logged in as admin')</script>";

            $_SESSION['admin']=$username;

            header("location:admin/index.php");
           
        }
        else{
            echo "<script>alert('Invalid username or password')</script>";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login page </title>
</head>
<body>
    <?php
    include('include/header.php')
    ?>
    <div class="container my-5">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6 jumbotron">
                    <h3 class="text-primary"><i class="fa-solid fa-user"></i> Admin Login</h3>
                <form method="POST">


                <div>

                <?php
                if(isset($error['admin'])){
                    $sh=$error['admin'];

                    $show="<h6 class='alert alert-danger'>$sh</h6>";

                }
                else{
                    $show="";
                    
                }
                echo $show;
                ?>

                </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="uname" placeholder="Enter username">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1"
                            name="pass" placeholder="Enter password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="login">Submit</button>
                </form>
                </div>
                <div class="col-lg-3"></div>
                
            </div>
        </div>
    </div>
</body>

</html>