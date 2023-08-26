<?php
include('../include/connection.php');

$query = "SELECT * FROM doctors WHERE status='Pending' ORDER BY date_reg ASC";
$res = mysqli_query($conn, $query);

$output = "";

$output .= "
<table class='table table-bordered'>
<tr>
    <th>Id</th>
    <th>Firstname</th>
    <th>Surname</th>
    <th>Username</th>
    <th>Email</th>
    <th>Gender</th>
    <th>Phone</th>
    <th>Country</th>
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
            <td>" . $row['email'] . "</td>
            <td>" . $row['gender'] . "</td>
            <td>" . $row['phone'] . "</td>
            <td>" . $row['country'] . "</td>
            <td>" . $row['date_reg'] . "</td>
            <td>
                <div class='col-md-12'>
                    <div class='row'>
                        <div class='col-md-6' style='margin-left:-10px;'>
                            <button id='" . $row['id'] . "' class='btn btn-success approve'><i class='fa-solid fa-check'></i></button>
                        </div>
                        
                        <div class='col-md-6 ml-1'>
                        <button id='" . $row['id'] . "' class='btn btn-danger reject'><i class='fa-solid fa-x'></i></button>
                        </div>
                    </div>
                </div>
            </td>
        </tr>";
    }
}

$output .= "</table>";

echo $output;
?>
