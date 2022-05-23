<?php
session_start();

include 'includes/database.php';

if(isset($_SESSION['id'])){
    header('Location: index.php');
}

include_once('cookieconnect.php');

if(isset($_POST['formconnexion']))
{
   $mailconnect = htmlspecialchars($_POST['email']);
   $mdpconnect = sha1($_POST['mdp']);
   if(!empty($mailconnect) AND !empty($mdpconnect))
   {
      $requser = $bdd->prepare("SELECT * FROM membres WHERE email = ? AND motdepasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1)
      {
        if(isset($_POST['rememberme'])) {
            setcookie('session_id_email',$mailconnect,time()+365*24*3600,null,null,false,true);
            setcookie('session_id_password',$mdpconnect,time()+365*24*3600,null,null,false,true);
        }
        $userinfo = $requser->fetch();
        $_SESSION['id'] = $userinfo['id'];
        $_SESSION['prenom'] = $userinfo['prenom'];
        $_SESSION['nom'] = $userinfo['nom'];
        $_SESSION['email'] = $userinfo['email'];
        $_SESSION['addresse'] = $userinfo['addresse'];
        header("Location: clientarea.php");
      }
      else
      {
        $erreur = "Mauvais mail ou mot de passe !";
      }
   }
   else
   {
    $erreur = "Tous les champs doivent être complétés !";
   }
}

?>
<!DOCTYPE html>
<html>
<head>
    <base href="/"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/login.css">
    <title>connexion | JiloClass</title>
</head>
<body>
<form class="box" method="post">
  <input type="email" name="email" placeholder="Renseigner votre e-mail" class="input" id="inputE">
  <input type="password" name="mdp" placeholder="Renseigner votre mot de passe" class="input" id="inputMDP"><span class="eye"></span>
  <input type="submit" name="submitL" value="connexion" class="submitInput">
  <a href="register">Créer un compte</a>
  <a href="lost_mdp">mot de passe oublié</a>
</form>
<script>
submit = document.querySelector(".submitInput");
submit.addEventListener('click', login => {
    email = document.getElementById('inputE');
    mdp = document.getElementById('inputMDP');
    if(email.value) {
      email.classList.add('error');
      if(mdp.value) {
        mdp.classList.add('error');
      }
    }
});


</script>
</body>
</html>