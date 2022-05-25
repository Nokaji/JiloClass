<?php
if(!isset($_SESSION['id']) AND isset($_COOKIE['email'],$_COOKIE['motdepasse']) AND !empty($_COOKIE['email']) AND !empty($_COOKIE['motdepasse'])) {
   $requser = $bdd->prepare("SELECT * FROM membres WHERE email = ? AND motdepasse = ?");
   $requser->execute(array($_COOKIE['email'], $_COOKIE['motdepasse']));
   $userexist = $requser->rowCount();
   if($userexist == 1)
   {
      $userinfo = $requser->fetch();
      $_SESSION['id'] = $userinfo['id'];
      $_SESSION['pseudo'] = $userinfo['pseudo'];
      $_SESSION['email'] = $userinfo['email'];
   }
}
?>