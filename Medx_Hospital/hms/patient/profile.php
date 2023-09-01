<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Profile</title>
</head>

<style>
    #table {
        height: 250px;
        overflow-y: scroll;
    }
</style>

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

                    $patient=$_SESSION['patient'];

                    $query="SELECT * FROM patients WHERE username='$patient'";
                    $res=mysqli_query($conn,$query);

                    $row=mysqli_fetch_array($res);


                    ?>
                </div>
                <div class="col-md-10 col-sm-8 col-xs-8">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="my-2">My Profile</h5>

                                <?php
                                if(isset($_POST['upload'])){
                                    $img=$_FILES['img']['name'];

                                    if(empty($img)){

                                    }
                                    else{
                                        $query="UPDATE patients SET profile='$img' WHERE username='$patient'";
                                        $res=mysqli_query($conn,$query);

                                        if($res){
                                            move_uploaded_file($_FILES['img']['tmp_name'],"img/$img");
                                        }
                                    }
                                }
                                ?>

                                <form method="POST" enctype="multipart/form-data">
                                    <?php
                                    echo "<img src='img/".$row['profile']."' class='col-md-12' style='height:300px;'>";
                                    ?>

                                    <input type="file" name="img" class="form-control my-2">
                                    <input type="submit" name="upload" class="btn btn-primary" value="update profile">
                                </form>

                                <div id="table">
                                    <table class="table table-striped my-3">
                                        <tr>
                                            <th colspan="2">My Details</th>
                                        </tr>

                                        <tr>
                                            <td>Firstname</td>
                                            <td>
                                                <?php echo $row['firstname'];?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Surname</td>
                                            <td>
                                                <?php echo $row['surname'];?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Username</td>
                                            <td>
                                                <?php echo $row['username'];?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Email</td>
                                            <td>
                                                <?php echo $row['email'];?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Phone no</td>
                                            <td>
                                                <?php echo $row['phone'];?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Gender</td>
                                            <td>
                                                <?php echo $row['gender'];?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Date_reg</td>
                                            <td>
                                                <?php echo $row['date_reg'];?>
                                            </td>
                                        </tr>

                                    </table>
                                </div>



                            </div>

                            <div class="col-md-6">
                                <h5 class="text-center my-2">Change Username</h5>

                                <?php
                                if(isset($_POST['update'])){
                                    $uname=$_POST['uname'];

                                    if(empty($uname)){

                                    }
                                    else{
                                        $query="UPDATE patients SET username='$uname' WHERE username='$patient'";
                                        $res=mysqli_query($conn,$query);

                                        if($res){
                                            $_SESSION['patient']=$uname;
                                        }
                                    }
                                }
                                ?>
                                <form method="POST">
                                    <label>Change Username</label>
                                    <input type="text" name="uname" class="form-control" autocomplete="off"
                                        placeholder="Enter Username">
                                    <input type="submit" class="btn btn-primary my-2" name="update"
                                        value="update username">
                                </form>

                                <h5 class="text-center my-3">Change Password</h5>
                                <?php
                                if(isset($_POST['change_pass'])){

                                    $old_pass=$_POST['old_pass'];
                                    $new_pass=$_POST['new_pass'];
                                    $con_pass=$_POST['con_pass'];

                                    $oldq="SELECT * FROM patients WHERE username='$patient'";
                                    $oldr=mysqli_query($conn,$oldq);
                                    $row=mysqli_fetch_array($oldr);


                                    if($old_pass != $row['password']){

                                    }
                                    else if(empty($new_pass)){

                                    }
                                    else if($con_pass != $new_pass){

                                    }
                                    else{
                                        $query="UPDATE patients SET password='$new_pass' WHERE username='$patient'";
                                        mysqli_query($conn,$query);
                                    }

                                }

                                ?>
                                <form method="POST">
                                    <label>Old Password</label>
                                    <input type="text" name="old_pass" class="form-control" autocomplete="off"
                                        placeholder="Enter old password">
                                    <label>New Password</label>
                                    <input type="text" name="new_pass" class="form-control" autocomplete="off"
                                        placeholder="Enter new password">
                                    <label>Confirm Password</label>
                                    <input type="text" name="con_pass" class="form-control" autocomplete="off"
                                        placeholder="Enter confirm password">
                                    <input type="submit" class="btn btn-primary my-2" name="change_pass"
                                        value="update password">
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