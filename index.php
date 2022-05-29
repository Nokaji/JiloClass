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
</head>
<body>
    <header>
        <?php include 'src/includes/navbar.php';?>
    </header>
    <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
<defs>
<path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
</defs>
<g class="parallax">
<use xlink:href="#gentle-wave" x="48" y="7" fill="#303030" />
</g>
</svg>
    <div class="section-hqp-1">
        <div class="icons-colomns">
        <i class="fa-solid fa-graduation-cap"></i>
        <p>Apprennez facilement avec JiloClass</p>
        </div>
    </div>
</body>
<script src="src/js/navbar.js"></script>
</html>