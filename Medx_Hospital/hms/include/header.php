<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Hospital Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <?php
                if(isset($_SESSION['admin'])){
                    $user=$_SESSION['admin'];
                    echo "<li class='nav-item'><a href='#' class='nav-link'>$user</a></li>
                    <li class='nav-item'><a href='logout.php' class='nav-link'>Logout</a></li>";
                }
                else if(isset($_SESSION['doctor'])){
                    $user=$_SESSION['doctor'];
                    echo "<li class='nav-item'><a href='#' class='nav-link'>$user</a></li>
                    <li class='nav-item'><a href='logout.php' class='nav-link'>Logout</a></li>";
                }
                else if(isset($_SESSION['patient'])){
                    $user=$_SESSION['patient'];
                    echo "<li class='nav-item'><a href='#' class='nav-link'>$user</a></li>
                    <li class='nav-item'><a href='logout.php' class='nav-link'>Logout</a></li>";
                }
                else{
                    echo "
                    <li class='nav-item'><a href='index.php' class='nav-link'>Home</a></li>
                    <li class='nav-item'><a href='./adminlogin.php' class='nav-link'>Admin</a></li>
                    <li class='nav-item'><a href='./doctorlogin.php' class='nav-link'>Doctor</a></li>
                    <li class='nav-item'><a href='./patientlogin.php' class='nav-link'>Patient</a></li>";
                }
                ?>
            </ul>
        </div>
    </nav>
    <!-- ... rest of your HTML ... -->
</body>
</html>
