<?php
session_start();

if(isset($_SESSION['id'])){
	header("Location: index.php");
}

require_once
 
if(isset($_POST['forminscription'])) {
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $paiement = htmlspecialchars($_POST['paiement']);
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);
    if(!empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
        $prenomlength = strlen($prenom);
        $namelenght = strlen($name);
        if($prenomlength <= 255) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $reqmail = $bdd->prepare("SELECT * FROM membres WHERE email = ?");
            $reqmail->execute(array($email));
            $mailexist = $reqmail->rowCount();
            if($mailexist == 0) {
                if($mdp == $mdp2) {
                    $insertmbr = $bdd->prepare("INSERT INTO membres(prenom, email, motdepasse, paiement) VALUES(?, ?, ?, ?)");
                    $insertmbr->execute(array($prenom, $email, $mdp, $paiement));

                    $erreur = "Votre compte a bien été créé regarde dans votre boite mail pour confirmer votre compte puis connectez vous";
                } else {
                    $erreur = "Vos mots de passes ne correspondent pas !";
                }
            } else {
                $erreur = "Adresse mail déjà utilisée !";
            }
        } else {
        $erreur = "Votre adresse mail n'est pas valide !";
        }
    } else {
        $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
    }
} else {
    $erreur = "Tous les champs doivent être complétés !";
}
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <base href="/"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/register.css">
    <title>Inscription | JiloClass</title>
</head>
<body>
<div class="containerForm">
<form class="box" method="post">
  <h1>Inscription</h1>
  <input type="text" name="pseudo" placeholder="Pseudo" class="inputR">
  <input type="email" name="email" placeholder="email" class="inputR">
  <input type="password" name="mdp" placeholder="mot de passe (min 5 caractères)" class="inputR"><span class="eye"></span>
  <input type="password" name="mdpConf" placeholder="confirmer le mot de passe" class="inputR"><span class="correctmdp"></span>
  <input type="submit" name="submit" value="s'inscrire">
  <a href="login">J'ai déjà un compte</a>
</form>
</div>
</body>
</html>
