<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients view Details</title>
</head>
<body>
    
<?php
    
    include('../include/header.php');
    include('../include/connection.php');

?>

<div class="contanier-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2  col-sm-4 col-xs-4" style="margin-left:-32px;">
                <?php 
                include('sidenav.php');
                ?>
            </div>
            <div class="col-md-10 col-sm-8 col-xs-8">
                <h5 class="text-center my-2">View Patients Details</h5>

                <?php
                if(isset($_GET['id'])){

                    $id=$_GET['id'];

                    $query="SELECT * FROM patients WHERE id='$id'";
                    $res=mysqli_query($conn,$query);

                    $row=mysqli_fetch_array($res);
                    
                }
                
                ?>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3"></div>

                        <div class="col-md-6">

                            <?php
                            echo "<img src='../patient/img/".$row['profile']."' class='col-md-12 my-2' style='height:250px;'>";
                            ?>
                            <table class="table table-striped">
                                <tr>
                                    <th class="text-center" colspan="2">Details</th>
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
                                    <td>Phone no</td>
                                    <td><?php echo $row['phone'];?></td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td><?php echo $row['gender'];?></td>
                                </tr>
                                <tr>
                                    <td>Date_Reg</td>
                                    <td><?php echo $row['date_reg'];?></td>
                                </tr>
                            </table>
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