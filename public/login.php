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
<?php
if(isset($_COOKIE['email']) && isset($_COOKIE['pseudo'])){
  setcookie('deco', '1', time() + (3600 * 24 * 30));
  header("Location: http://localhost"); // TODO: changer l'url
  die();
}
$i = 0;
include 'database.php';
global $db;
if(isset($_COOKIE['email']) && isset($_COOKIE['pseudo'])){
    ?><h1><?= $_COOKIE['email']; ?> <br> <?= $_COOKIE['pseudo'];?></h1><?php
} else{
    if(isset($_POST['submitL'])){
    extract($_POST);
    if(!empty($email) && !empty($mdp)){
    $q = $db->prepare("SELECT * FROM utilisateurs WHERE email = :email");
    $q->execute(['email' => $email]);
    $result = $q->fetch();
    var_dump($result);
    if($result == true){
        $hashpassword = $result['mdp'];
          if(password_verify($mdp, $hashpassword)){
              $pseudo = $result['pseudo'];
            setcookie('pseudo', $pseudo, time() + (3600 * 24 * 30));
            setcookie('email', $email, time() + (3600 * 24 * 30));
            // addresse de l'hébergeur lorsqu'on en a un
            header("Location: http://localhost/"); // TODO: changer l'url
            die();
            
        } else{
            ?><h1><?= 'Pas le bon mot de passe' ?></h1><?php
            }
        }
    } else{
        ?><h3>Le compte n'existe pas </h3><a href="register">Créer un compte</a><?php
    }
} else{
    ?><h1>Les champs ne sont pas tous remplis.</h1><?php
}
}
?>
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