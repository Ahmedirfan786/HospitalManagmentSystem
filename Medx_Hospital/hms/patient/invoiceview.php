<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Invoice</title>
</head>
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
                    ?>
                </div>

                <div class="col-md-10 col-sm-8 col-xs-8">
                    <h5 class="text-center my-2">View Invoice</h5>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <?php
                                    if(isset($_GET['id'])){
                                        $id=$_GET['id'];

                                        $query="SELECT * FROM income WHERE id='$id'";
                                        $res=mysqli_query($conn,$query);

                                        $row=mysqli_fetch_array($res);
                                    }
                                ?>

                                <table class="table table-striped">
                                    <tr>
                                        <th class="text-center" colspan="2">Invoice Details</th>
                                    </tr>

                                    <tr>
                                        <td>Doctor</td>
                                        <td><?php echo $row['doctor'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Patient</td>
                                        <td><?php echo $row['patient'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Date Discharged</td>
                                        <td><?php echo $row['date_discharge'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Amount_paid</td>
                                        <td><?php echo $row['amount_paid'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td><?php echo $row['description'];?></td>
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