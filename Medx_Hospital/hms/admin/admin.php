<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <?php
    include("../include/header.php");
    ?>

    <div class="conatiner-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2 col-sm-4 col-xs-4" style="margin-left:-32px;">
                    <?php
                    include("sidenav.php");
                    include("../include/connection.php");
                    ?>
                </div>
                <div class="col-md-10 col-sm-8 col-xs-8">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-center">All Admin</h5>

                                <?php
                                $ad = $_SESSION['admin'];
                                $query = "Select * from admin where username != '$ad'";
                                $result = mysqli_query($conn, $query);

                                $output = "<table class='table table-bordered'>
                                    <tr>
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th style='width:10%;'>Action</th>
                                    </tr>";

                                if (mysqli_num_rows($result) < 1) {
                                    $output .= "<tr><td colspan='3' class='text-center'>No new Admin</td></tr>";
                                } else {
                                    while ($row = mysqli_fetch_array($result)) {
                                        $id = $row['id'];
                                        $username = $row['username'];

                                        $output .= "
                                        <tr>
                                            <td>$id</td>
                                            <td>$username</td>
                                            <td>
                                            <a href='admin.php?id=$id'><button id='$id' class='btn btn-danger'>Remove</button></a>
</td>

                                        </tr>";
                                    }
                                }

                                $output .= "
                                </table>";

                                echo $output;

                                if(isset($_GET['id'])){
                                    $id=$_GET['id'];

                                    $query = "DELETE FROM `admin` WHERE id='$id'";
                                    mysqli_query($conn,$query);
                                }

                                
                                ?>

                            </div>
                            <div class="col-md-6">
                                <?php
                                if (isset($_POST['add'])) {
                                    $uname = $_POST['uname'];
                                    $pass = $_POST['pass'];
                                    $image = $_FILES['img']['name'];

                                    $error = array();

                                    if (empty($uname)) {
                                        $error['u'] = "Enter admin username";
                                    } elseif (empty($pass)) {
                                        $error['u'] = "Enter admin password";
                                    } elseif (empty($image)) {
                                        $error['u'] = "Enter admin picture";
                                    }

                                    if (count($error) == 0) {
                                        
                                        $q = "INSERT INTO `admin` (`username`, `password`, `profile`) VALUES ('$uname', '$pass', '$image')";

                                        // Use prepared statement for executing the query
                                        $result = mysqli_prepare($conn, $q);
                                        if ($result) {
                                            mysqli_stmt_execute($result);
                                            move_uploaded_file($_FILES['img']['tmp_name'], "img/$image");
                                           
                                        } else {
                                            
                                        }
                                    }
                                }

                               


                                if(isset($error['u'])){
                                    $er=$error['u'];

                                    $show="<h5 class='tetx-center alert alert-danger'>$er</h5>";
                                }
                                else{
                                    $show="";
                                }
                                ?>



                                <h5 class="text-center">Add Admin</h5>
                                <form method="post" enctype="multipart/form-data">


                                    <div>
                                        <?php
                                    echo $show;
                                    ?>
                                    </div>



                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="uname" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="pass" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Add Admin Picture</label>
                                        <input type="file" name="img" class="form-control">
                                    </div><br>
                                    <button type="submit" name="add" class="btn btn-success text-light">Add new
                                        admin</button>
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