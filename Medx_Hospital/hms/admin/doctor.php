<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Doctors</title>
</head>
<body>

    
<?php

include('../include/header.php');
include('../include/connection.php');


?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2 col-sm-4 col-xs-4" style="margin-left:-32px">

           <?php
            include('sidenav.php');
           ?>

            </div>

            <div class="col-md-10 col-sm-8 col-xs-8 my-5">
                <h5 class="my-3">Total Doctors</h5>
            <?php
            
            $query="SELECT * FROM doctors WHERE status='Approved' ORDER BY date_reg ASC";

            $res=mysqli_query($conn,$query);

            $output = "";


// email not included in table
$output .= "
<table class='table table-striped table-responsive my-3'>
<tr>
    <th>Id</th>
    <th>Firstname</th>
    <th>Surname</th>
    <th>Username</th>
    
    <th>Gender</th>
    <th>Phone</th>
    <th>Country</th>
    <th>Salary</th>
    <th>Date registered</th>
    <th>Action</th>
</tr>
";

if (mysqli_num_rows($res) < 1) {
    $output .= "
    <tr>
        <td colspan='10'>No job request yet</td>
    </tr>";
} else {
    while ($row = mysqli_fetch_array($res)) {
        $output .= "
        <tr>
            <td>" . $row['id'] . "</td>
            <td>" . $row['firstname'] . "</td>
            <td>" . $row['surname'] . "</td>
            <td>" . $row['username'] . "</td>

            <td>" . $row['gender'] . "</td>
            <td>" . $row['phone'] . "</td>
            <td>" . $row['country'] . "</td>
            <td>" . $row['salary'] . "</td>
            <td>" . $row['date_reg'] . "</td>
            <td>
                <a href='doctor_edit.php?id=".$row['id']."'>
                <button class='btn btn-primary'>Edit</button>
                </a>
            </td>
        </tr>";
    }
}

$output .= "</table>";

echo $output;

            ?>

            </div>
        </div>
    </div>
</div>

</body>
</html>