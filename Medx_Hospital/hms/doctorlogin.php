<?php

session_start();

include('include/connection.php');

if(isset($_POST['login'])){

    $uname=$_POST['uname'];
    $password=$_POST['pass'];


    $error=array();

    $q="SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
    $qres=mysqli_query($conn,$q);

    $row=mysqli_fetch_array($qres);

    if(empty($uname)){
        $error['login']="Enter Username";
    }
    else if(empty($password)){
        $error['login']="Enter Password";
    }
    else if($row['status'] == 'Pending'){
        $error['login']="Please wait for admin to continue";
    }
    else if($row['status'] == 'Rejected'){
        $error['login']="Try again later";
    }


    if(count($error)==0){
        $query="SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
        $res=mysqli_query($conn,$query);

        if(mysqli_num_rows($res)){
            echo "<script>alert('done')</script>";
            $_SESSION['doctor']=$uname;
            header('location:doctor/index.php');
        }
        else{
            echo "<script>alert('Invalid Account')</script>";
        }
    }

}


if(isset($error['login'])){
    $l=$error['login'];
    $show="<h5 class='text-center alert alert-danger'>$l<h5>";
}
else{
    $show="";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
include('include/header.php');

?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 jumbotron my-3">

                <h5 class="text-center my-2">Doctors Login</h5>


                <div>
                <?php
                echo $show;
                ?>
                </div>

                <form method="POST">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                    </div>
                    <input type="submit" class="btn btn-primary" name="login" value="login">

                    <p class="my-1">I dont have any account <a href="apply.php">Apply Now!</a></p>
                </form>

            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
</body>
</html>