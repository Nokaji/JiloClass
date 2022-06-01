<?php
session_start();
if(isset($_SESSION['id'])){
  header("Location: index");
}
include_once('cookieconnect.php');

require_once('src/includes/database.php');

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
        $_SESSION['pseudo'] = $userinfo['pseudo'];
        $_SESSION['email'] = $userinfo['email'];
        header("Location: index");
      }else{
        $erreur = "Mauvais mail ou mot de passe !";
      }
    }else{
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
  <title>Connexion | JiloClass</title>
  <link rel="stylesheet" href="src/css/login.css">
</head>
<body>
<?php include "src/includes/navbar.php"; ?>
<div class="container" id="login">
  <div class="text">
    Connexion
  </div>
  <form method="post" class="row g-3"> 
    <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" value="<?php if(isset($email)) { echo $email; } ?>">
    </div>
    <div class="col-md-6">
        <label for="mdp" class="form-label">Mot de Passe</label>
        <input type="password" name="mdp" class="form-control" id="mdp" value="<?php if(isset($_POST['mdp'])) { echo $_POST['mdp']; } ?>">
    </div>
    <div class="col-md-6">
    <input class="form-check-input" name="rememberme" type="checkbox" id="rememberme">
    <label class="form-check-label" for="rememberme">
      Se Souvenir de Moi
    </label>
    </div>
    <button name="formconnexion" type="submit" class="btn btn-primary">Se connecter</button>
  </form>
<?php
if(isset($erreur)) {
    echo '<font color="red">'.$erreur."</font>";
}
?>
</div>
</body>
</html>