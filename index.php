<?php
session_start();
include 'src/includes/domaine.php';
include ''.BASE_URL.'src/includes/database.php';
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil | JiloClass</title>
    <link rel="stylesheet" href="src/css/index.css">
    <link rel="shortcut icon" href="src/img/jiloclass.png" type="image/x-icon">
    <?php include 'src/includes/navbar.php';?>
</head>
<body>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img class="d-block w-100" src="..." alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>...</h5>
                <p>...</p>
            </div>
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="..." alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>...</h5>
                <p>...</p>
            </div>
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="..." alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>...</h5>
                <p>...</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
    <div class="section-hqp-1">
        <div class="icons-colomns">
        <i class="fa-solid fa-graduation-cap fa-bounce"></i>
        <p>Apprenez facilement avec JiloClass</p>
        </div>
    </div>
</body>
<script src="src/js/navbar.js"></script>
</html>