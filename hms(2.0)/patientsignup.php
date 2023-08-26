<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account(Patients)</title>
</head>
<body>
    <?php
    include('include/header.php');
    include('include/connection.php');


    if(isset($_POST['create'])){
        $fname=$_POST['fname'];
        $sname=$_POST['sname'];
        $uname=$_POST['uname'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $gender=$_POST['gender'];
        $pass=$_POST['pass'];
        $con_pass=$_POST['con_pass'];



        $error=array();

        if(empty($fname)){
            $error[ac]="Enter Firstname";
        }
        else if(empty($sname)){
            $error[ac]="Enter Surname";
        }
        else if(empty($uname)){
            $error[ac]="Enter Username";
        }
        else if(empty($email)){
            $error[ac]="Enter Email";
        }
        else if(empty($phone)){
            $error[ac]="Enter Phone no";
        }
        else if($gender == ""){
            $error[ac]="Select your gender";
        }
        else if(empty($pass)){
            $error[ac]="Enter Your Password";
        }
        else if($con_pass != $pass){
            $error[ac]="Both Passwords doesnt match";
        }
        

        if(count($error)==0){
            $query = "INSERT INTO patients (firstname, surname, username, email, phone, gender, password, date_reg, profile)
            VALUES ('$fname', '$sname', '$uname', '$email', '$phone', '$gender', '$pass', NOW(), 'patient.jpg')";
  
            $res=mysqli_query($conn,$query);

            if($res){
                header('location:patientlogin.php');
            }
            else{
                echo "<script>alert('failed')</script>";
            }
        }
    }

    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>

                <div class="col-md-6 my-2 jumbotron">
                    
                <h5 class="text-center text-primary my-2">Create Account</h5>
                
                <form method="POST">
                    <div class="form-group">
                        <label>Firstname</label>
                        <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname">
                    </div>

                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname">
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label>Phone no</label>
                        <input type="text" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone no">
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-control">
                            <option value="">Select your Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
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

                    <input type="submit" name="create" class="btn btn-primary" value="Create Account">

                    <p>I already have an account <a href="patientlogin.php">click here!</a></p>

                </form>

                </div>

                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>