<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
                <h5 class="text-center">Total Reports</h5>

                <?php
                    $query="SELECT * FROM report";
                    $res=mysqli_query($conn,$query);

                    $output="";

                    $output.="
                        <table class='table table-striped'>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Message</th>
                            <th>Username</th>
                            <th>Date Send</th>
                        </tr>
                    ";

                    if(mysqli_num_rows($res)<1){
                        $output.="<tr>
                            <td colspan='6'>No Reports Yet</td>    
                        </tr>
                        ";
                    }

                    while($row =mysqli_fetch_array($res)){
                        $output.="
                        <tr>
                            <td>".$row['id']."</td>
                            <td>".$row['title']."</td>
                            <td>".$row['message']."</td>
                            <td>".$row['username']."</td>
                            <td>".$row['date_send']."</td>
                        </tr>
                        ";
                    }

                    $output.="<table>";

                    echo $output;
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>