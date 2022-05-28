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
    <header>
    <div class="header-start">
        <center>
            <h1 class="title">JiloClass</h1>
            <p class="text">Apprennez à Coder et Faites apprendre aux autres</p>
            <a class="start" href="register.php">Commencer</a>
        </center>
    </div>
    <img class="header-end" src="src/img/learn.png">
    </header>
    <img src="src/img/wave.svg">
    <div class="section-hqp-1">
        <div class="icons-colomns">
        <i class="fa-solid fa-graduation-cap fa-bounce"></i>
        <p>Apprenez facilement avec JiloClass</p>
        </div>
    </div>
</body>
<script src="src/js/navbar.js"></script>
</html>