<?php
session_start();

include 'src/includes/database.php';

if(isset($_SESSION['id'])){
    header('Location: index');
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
        $_SESSION['pseudo'] = $userinfo['pseudo'];
        $_SESSION['email'] = $userinfo['email'];
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
<div class="container" id="login">
  <label for="show" class="close-btn fas fa-times" title="close"></label>
  <div class="text">
    Connexion
  </div>
  <form method="post" class="row g-3"> 
    <div class="col-md-6">
        <label for="email" class="form-label label-required">Email</label>
        <input type="email" name="email" class="form-control" id="email" value="<?php if(isset($email)) { echo $email; } ?>" required>
    </div>
    <div class="col-md-6">
        <label for="mdp" class="form-label label-required">Mot de Passe</label>
        <input type="password" name="mdp" class="form-control" id="mdp" value="<?php if(isset($_POST['mdp'])) { echo $_POST['mdp']; } ?>" required>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
</form>
<?php
if(isset($erreur)) {
    echo '<font color="red">'.$erreur."</font>";
}
?>
</div>
<link rel="stylesheet" href="src/css/login.css">
<script src="src/js/login.js"></script>