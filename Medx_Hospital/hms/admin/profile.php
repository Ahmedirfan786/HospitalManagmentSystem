<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
</head>
<body>
    <?php
    include('../include/header.php');
    include('../include/connection.php');

    $ad=$_SESSION['admin'];
    $query="SELECT * FROM admin WHERE username='$ad'";

    $res=mysqli_query($conn,$query);

    while($row = mysqli_fetch_array($res)){
        $username=$row['username'];
        $profile=$row['profile'];
    }
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
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><?php echo $username;?> Profile</h4>

                                <?php
                                if(isset($_POST['update'])){
                                    $profile=$_FILES['profile']['name'];

                                    if(empty($profile)){

                                    }
                                    else{
                                        $query="UPDATE admin SET profile='$profile' WHERE username='$ad'";

                                        $result=mysqli_query($conn,$query);

                                        if($result){
                                            move_uploaded_file($_FILES['profile']['tmp_name'],"img/$profile");
                                        }
                                    }
                                }
                                ?>

                                <form method="POST" enctype="multipart/form-data">
                                    <?php
                                        echo "<img src='img/$profile' class='col-md-12' style='height:250px;width:250px;border:1px solid;' alt=''>";
                                    ?>
                                    <br><br>

                                    <div class="form-group">
                                        <label>Update Profile</label>
                                        <input type="file" name="profile" class="form-control">
                                    </div>
                                    <br>
                                    <input type="submit" class="btn btn-success" value="update" name="update">
                                </form>
                            </div>
                            <div class="col-md-6">
                                <?php
                                if(isset($_POST['change'])){
                                    $uname=$_POST['uname'];

                                    if(empty($uname)){

                                    }
                                    else{
                                        $query="UPDATE admin SET username='$uname' WHERE username='$ad'";
                                        $result=mysqli_query($conn,$query);

                                        if($result){
                                            $_SESSION['admin']=$uname;
                                        }
                                    }
                                }
                                ?>
                                <form method="POST">
                                    <h5 class="text-center">Change Username</h5>
                                    <input type="text" name="uname" class="form-control" autocomplete="off">
                                    <input type="submit" class="btn btn-success my-2" value="change" name="change">
                                </form>

                                <br><br>



                                <?php
                                if(isset($_POST['update_pass'])){
                                    $old_pass=$_POST['old_pass'];
                                    $new_pass=$_POST['new_pass'];
                                    $con_pass=$_POST['con_pass'];

                                    $error=array();

                                    $old=mysqli_query($conn,"SELECT * FROM admin WHERE username='$ad'");
                                    $row=mysqli_fetch_array($old);
                                    $pass=$row['password'];

                                    if(empty($old_pass)){
                                        $error['p']="Enter Old Password";
                                    }
                                    elseif(empty($new_pass)){
                                        $error['p']="Enter New Password";
                                    }
                                    elseif(empty($con_pass)){
                                        $error['p']="Enter Confirm Password";
                                    }
                                    elseif($old_pass != $pass){
                                        $error['p']="Invalid Old Password";
                                    }
                                    elseif($new_pass != $con_pass){
                                        $error['p']="Both password doesnot match";
                                    }


                                    if(count($error)==0){
                                        $query="UPDATE admin SET password='$new_pass' WHERE username='$ad'";
                                        mysqli_query($conn,$query);
                                    }

                                    
                                }
                                if(isset($error['p'])){
                                        $e =$error['p'];

                                        $show="<h5 class='alert alert-danger text-center'>$e</h5>";
                                    }
                                    else{
                                        $show="";
                                    }
                                ?>





                                <form method="POST">
                                    <div>
                                        <?php
                                        echo $show;
                                        ?>
                                    </div>
                                    <h5 class="text-center my-4">Change password</h5>
                                    <div class="form-group">
                                        <label>Old password</label>
                                        <input type="password" name="old_pass" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>New password</label>
                                        <input type="password" name="new_pass" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm password</label>
                                        <input type="password" name="con_pass" class="form-control">
                                    </div>
                                    <input type="submit" class="btn btn-primary" name="update_pass" value="Update password" >
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