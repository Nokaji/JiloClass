<?php
session_start();

if(isset($_SESSION['id'])){
    $reqroleid = $bdd->prepare("SELECT roleid FROM membres WHERE email = ? AND id = ? AND pseudo = ?");
    $reqroleid->execute(array($_SESSION['email'], $_SESSION['id'], $_SESSION['pseudo']));
    $reqroleid = $reqroleid->fetch();
    $roleid = $reqroleid['roleid'];

    $reqrole = $bdd->prepare("SELECT * FROM role WHERE id = ?");
    $reqrole->execute(array($roleid));
    $role = $reqrole->fetch();
}else{
    header('Location: index.php');
}

include('src/includes/database.php');
include('src/includes/domaine.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil | JiloClass</title>
    <link rel="shortcut icon" href="src/img/jiloclass.png" type="image/x-icon">
    <?php include(''.BASE_URL.'src/includes/navbar.php'); ?>
</head>
<body>
    
</body>
</html>