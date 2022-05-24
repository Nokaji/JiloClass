<?php
session_start();

if(isset($_SESSION['id'])){
    header('Location: index');
}

include 'src/includes/database.php';

if(isset($_POST['forminscription'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);
    if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
        $pseudolength = strlen($pseudo);
        if($pseudolength <= 255) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $reqmail = $bdd->prepare("SELECT * FROM membres WHERE email = ?");
            $reqmail->execute(array($email));
            $mailexist = $reqmail->rowCount();
            if($mailexist == 0) {
                if($mdp == $mdp2) {
                    $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, email, motdepasse) VALUES(?, ?, ?)");
                    $insertmbr->execute(array($pseudo, $email, $mdp));
                    $color = "green";
                    $erreur = "Votre compte a bien été créé !";
                } else {
                    $color = "red";
                    $erreur = "Vos mots de passes ne correspondent pas !";
                }
            } else {
                $color = "red";
                $erreur = "Adresse mail déjà utilisée !";
            }
        } else {
            $color = "red";
        $erreur = "Votre adresse mail n'est pas valide !";
        }
    } else {
        $color = "red";
        $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
    }
} else {
    $color = "red";
    $erreur = "Tous les champs doivent être complétés !";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription | JiloClass</title>
    <link rel="shortcut icon" href="src/img/jiloclass.png" type="image/x-icon">
    <link rel="stylesheet" href="src/css/form.css">
</head>
<body>
    <?php include "src/includes/navbar.php"; ?>
    <form method="post" class="row g-3">
        <p class="fs-1">Inscription</p>
        <p class="fs-3">Informations Personnelles</p>
        <div class="col-md-6">
            <label for="pseudo" class="form-label label-required">Surnom</label>
            <input type="text" name="pseudo" class="form-control" id="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" required>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label label-required">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="<?php if(isset($email)) { echo $email; } ?>" required>
        </div>
        <p class="fs-3">Sécurité du Compte</p>
        <div class="col-md-6">
            <label for="mdp" class="form-label label-required">Mot de Passe</label>
            <input type="password" name="mdp" class="form-control" id="mdp" value="<?php if(isset($_POST['mdp'])) { echo $_POST['mdp']; } ?>" required>
        </div>
        <div class="col-md-6">
            <label for="mdp2" class="form-label label-required">Confirmation du Mot de Passe</label>
            <input type="password" name="mdp2" class="form-control" id="mdp2" value="<?php if(isset($_POST['mdp2'])) { echo $_POST['mdp2']; } ?>" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
    </form>
    <?php
    if(isset($erreur)) {
        echo '<font color='.$color.'>'.$erreur."</font>";
    }
    ?>
</body>
</html>