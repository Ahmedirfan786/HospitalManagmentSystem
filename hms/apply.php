<?php
include('include/connection.php');

if(isset($_POST['apply'])){

$firstname=$_POST['fname'];
$surname=$_POST['sname'];
$username=$_POST['uname'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$phone=$_POST['phone'];
$country=$_POST['country'];
$password=$_POST['pass'];
$confirm_password=$_POST['con_pass'];

$error=array();

if(empty($firstname)){
    $error['apply']="Enter Firstname";
}
else if(empty($surname)){
    $error['apply']="Enter Surname";
}
else if(empty($username)){
    $error['apply']="Enter Username";
}
else if(empty($email)){
    $error['apply']="Enter Email Address";
}
else if(empty($gender)){
    $error['apply']="Select Your Gender";
}
else if(empty($phone)){
    $error['apply']="Enter Phone Number";
}
else if(empty($country)){
    $error['apply']="Select Country";
}
else if(empty($password)){
    $error['apply']="Enter Password";
}
else if($confirm_password != $password){
    $error['apply']="Both Password do not match";
}


if(count($error)==0){

$query= "INSERT INTO doctors(`firstname`,`surname`,`username`,`email`,`gender`,`phone`,`country`,`password`,`salary`,`date_reg`,`status`,`profile`) VALUES('$firstname','$surname','$username','$email','$gender','$phone','$country','$password','0',NOW(),'Pending','doctor.jpg')";


$result=mysqli_query($conn,$query);

if($result){
    echo "<script>alert('you have successfully Applied')</script>";
    header("location:doctorlogin.php");
}
else{
    echo "<script>alert('Failed to Apply')</script>";
}

}

}


if(isset($error['apply'])){
    $s=$error['apply'];

    $show="<h5 class='text-center alert alert-danger'>$s</h5>";
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
    <title>Apply Now!</title>
</head>
<body>
    <?php
    include('include/header.php');
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-3 jumbotron">
                <h5 class="text-center">Doctors Apply Now!</h5>


                    <div>
                    <?php
                    echo $show;
                    ?>    
                    <div>

                <form method="POST">
                    <div class="form-group">
                        <label>Firstname</label>
                        <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" value="<?php if(isset($_POST['fname']))  echo $_POST['fname'];?>">
                    </div>
                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname" 
                        value="<?php if(isset($_POST['sname']))  echo $_POST['sname'];?>">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username"
                        value="<?php if(isset($_POST['uname']))  echo $_POST['uname'];?>">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter email address"
                        value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>">
                    </div>
                    <div class="form-group">
                        <label>Select Gender</label>
                        <select name="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>  
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter phone number"value="<?php if(isset($_POST['phone']))  echo $_POST['phone'];?>">
                    </div>
                    <div class="form-group" >
                        <label>Select Country</label>
                        <select name="country" class="form-control">
                            <option value="">Select Country</option>
                            <option value="america">America</option>
                            <option value="pakistan">Pakistan</option>  
                            <option value="india">India</option>  
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
                    </div>

                    <input type="submit" class="btn btn-primary" name="apply" value="apply now">
                    <p class="my-4">I already have an account<a href="doctorlogin.php">Click here!</a></p>
                </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>