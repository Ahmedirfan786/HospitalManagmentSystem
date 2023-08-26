<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<title>Document</title>
</head>
<body>
    

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-primary bg-primary">

<h5 class="text-light">Hospital Managment System</h5>

<div class="mr-auto"></div>

<ul class="navbar-nav">
<?php

if(isset($_SESSION['admin'])){
    $user=$_SESSION['admin'];
echo "<li class='nav-item'><a href='#' class='nav-link text-light'>$user</a></li>
<li class='nav-item'><a href='logout.php' class='nav-link text-light'>logout</a></li>";
}

else if(isset($_SESSION['doctor'])){
    $user=$_SESSION['doctor'];
    echo "<li class='nav-item'><a href='#' class='nav-link text-light'>$user</a></li>
    <li class='nav-item'><a href='logout.php' class='nav-link text-light'>logout</a></li>";
}

else if(isset($_SESSION['patient'])){
    $user=$_SESSION['patient'];
    echo "<li class='nav-item'><a href='#' class='nav-link text-light'>$user</a></li>
    <li class='nav-item'><a href='logout.php' class='nav-link text-light'>logout</a></li>";
}

else{
    echo "
    <li class='nav-item'><a href='index.php' class='nav-link text-light'>Home</a></li>
    <li class='nav-item'><a href='./adminlogin.php' class='nav-link text-light'>Admin</a></li>
    <li class='nav-item'><a href='./doctorlogin.php' class='nav-link text-light'>Doctor</a></li>
    <li class='nav-item'><a href='./patientlogin.php' class='nav-link text-light'>Patient</a></li>";
}
?>
</ul>
</nav>

</body>
</html>