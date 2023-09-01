<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medx Hospital</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- normalize css -->
    <link rel = "stylesheet" href = "css/normalize.css">
    <!-- custom css -->
    <link rel = "stylesheet" href = "css/main.css">
</head>
<body>
    
<?php
include('connection.php');
?>

    <!-- header -->
    <header class = "header bg-blue">
        <nav class = "navbar bg-blue">
            <div class = "container flex">
                <a href = "index.html" class = "navbar-brand">
                    <img src = "images/mainlogo.png">
                </a>
                <button type = "button" class = "navbar-show-btn">
                    <img src = "images/ham-menu-icon.png">
                </button>

                <div class = "navbar-collapse bg-white">
                    <button type = "button" class = "navbar-hide-btn">
                        <img src = "images/close-icon.png">
                    </button>
                    <ul class = "navbar-nav">
                        <li class = "nav-item">
                            <a href = "#" class = "nav-link">Home</a>
                        </li>
                        <li class = "nav-item">
                            <a href = "#about" class = "nav-link">About</a>
                        </li>
                        <li class = "nav-item">
                            <a href = "#services" class = "nav-link">Service</a>
                        </li>
                        <li class = "nav-item">
                            <a href = "#doc-panel" class = "nav-link">Doctors</a>
                        </li>
                    </ul>
                    
                </div> 
            </div>
        </nav>

        <div class = "header-inner text-white text-center">
            <div class = "container grid">
                <div class = "header-inner-left">
                    <h1>your most trusted<br> <span>health partner</span></h1>
                    <p class = "lead">the best match services for you</p>
                    <p class = "text text-md">
Where healing whispers through sterile halls, love's touch mends souls, and hope finds its wings.</p>
                    <div class = "btn-group">
                        <a href = "#" class = "btn btn-white">Learn More</a>
                        <a href = "hms/index.php" class = "btn btn-light-blue">Enter Our HMS</a>
                    </div>
                </div>
                <div class = "header-inner-right">
                    <img src = "images/header.png">
                </div>
            </div>
        </div>
    </header>
    <!-- end of header -->