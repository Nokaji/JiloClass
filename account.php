<?php
if(!isset($_SESSION['id'])){
    header('Location: index');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil | JiloClass</title>
    <?= include 'src/includes/navbar.php'; ?>
</head>
<body>
    
</body>
</html>