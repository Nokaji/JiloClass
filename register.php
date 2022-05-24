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
    <link rel="stylesheet" href="src/css/form.css">
</head>
<body>
    <?php include "src/includes/navbar.php"; ?>
    <form id="signupform" method="POST">
        <div class="col-md-6 form-text">
            <input id="pseudo" type="text" name="pseudo" placeholder="Surnom" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" required>
        </div>
        <div class="form-text">
            <input id="email" type="email" name="email" placeholder="Addresse E-Mail" value="<?php if(isset($email)) { echo $email; } ?>" required>
        </div>
        <div class="form-text">
            <input id="mdp" type="password" name="mdp" placeholder="Mot de passe" value="<?php if(isset($_POST['mdp'])) { echo $_POST['mdp']; } ?>" required>
        </div>
        <div class="form-text">
            <input id="mdp2" type="password" name="mdp2" placeholder="Confirmation du Mot de passe" value="<?php if(isset($_POST['mdp2'])) { echo $_POST['mdp2']; } ?>" required>
        </div>
        <div class="form-button">
            <button name="forminscription" type="submit" class="">Créé un nouveau compte</button>
        </div>
    </form>
    <?php
    if(isset($erreur)) {
        echo '<font color='.$color.'>'.$erreur."</font>";
    }
    ?>
</body>
</html>