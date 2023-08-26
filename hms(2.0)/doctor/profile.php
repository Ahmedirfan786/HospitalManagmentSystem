<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors Profile</title>
</head>
<body>

<?php
    
    include('../include/header.php');
    include('../include/connection.php');

?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2" style="margin-left:-32px;">
                <?php
                include('sidenav.php');
                ?>
            </div>
            <div class="col-md-10">

                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="row">

                            <div class="col-md-6">
                            <?php
                            $doc=$_SESSION['doctor'];
                            $query="SELECT * FROM doctors WHERE username='$doc'";

                            $res=mysqli_query($conn,$query);

                            $row=mysqli_fetch_array($res);

                            if(isset($_POST['upload'])){

                                $img=$_FILES['img']['name'];

                                if(empty($img)){

                                }
                                else{
                                    $query="UPDATE doctors SET profile='$img'WHERE username='$doc' ";
                                    
                                    $res=mysqli_query($conn,$query);

                                    if($res){
                                        move_uploaded_file($_FILES['img']['tmp_name'],"img/$img");
                                    }
                                }
                            }
                            ?>
                            <form method="POST" enctype="multipart/form-data">
                                <?php
                                
                                echo "<img src='img/".$row['profile']."' style='height:300px' class='col-md-12 my-3'>";

                                ?>

                                <input type="file" name="img" class="form-control my-2">
                                <input type="submit" name="upload" class="btn btn-primary my-1" value="update profile">
                            </form>


                            <div class="my-3">
                                <table class="table table-bordered">
                                    <tr colspan="2" class="text-center">
                                        <th>Details</th>
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
                                        <td>Username</td>
                                        <td><?php echo $row['username'];?></td>
                                    </tr>

                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $row['email'];?></td>
                                    </tr>

                                    <tr>
                                        <td>gender</td>
                                        <td><?php echo $row['gender'];?></td>
                                    </tr>

                                    <tr>
                                        <td>Phone no#</td>
                                        <td><?php echo $row['phone'];?></td>
                                    </tr>


                                    <tr>
                                        <td>Country</td>
                                        <td><?php echo $row['country'];?></td>
                                    </tr>

                                    <tr>
                                        <td>Salary</td>
                                        <td><?php echo $row['salary'];?></td>
                                    </tr>

                                </table>
                            </div>


                            </div>

                            <div class="col-md-6">

                                <h5 class="text-center my-2">Update username</h5>

                                <?php
                                if(isset($_POST['change_uname'])){
                                    
                                $uname=$_POST['uname'];

                                if(empty($uname)){

                                }
                                else{
                                    $query="UPDATE doctors SET username='$uname' WHERE username='$doc'";

                                    $res=mysqli_query($conn,$query);

                                    if($res){
                                        $_SESSION['doctor']=$uname;
                                    }
                                }

                                }
                                ?>
                                <form method="POST">

                                <label>Change Username</label>
                                <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">

                                <input type="submit" name="change_uname" class="btn btn-primary my-2" value="change username">

                                </form>

                                <h5 class="text-center my-3">Change Password</h5>

                                <?php
                                
                                if(isset($_POST['change_pass'])){

                                    $old_pass=$_POST['old_pass'];
                                    $new_pass=$_POST['new_pass'];
                                    $con_pass=$_POST['con_pass'];

                                    $oldq="SELECT * FROM doctors WHERE username='$doc'";
                                    $oldr=mysqli_query($conn,$oldq);
                                    $row=mysqli_fetch_array($oldr);


                                    if($old_pass != $row['password']){

                                    }
                                    else if(empty($new_pass)){

                                    }
                                    else if($con_pass != $new_pass){

                                    }
                                    else{
                                        $query="UPDATE doctors SET password='$new_pass' WHERE username='$doc'";
                                        mysqli_query($conn,$query);
                                    }

                                }

                                ?>

                                <form method="POST">

                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input type="password" name="old_pass" class="form-control" autocomplete="off" placeholder="Enter Old Password">
                                </div>

                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" name="new_pass" class="form-control" autocomplete="off" placeholder="Enter New Password">
                                </div>

                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
                                </div>

                                <input type="submit" name="change_pass" class="btn btn-primary my-2" value="change password">


                                </form>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>