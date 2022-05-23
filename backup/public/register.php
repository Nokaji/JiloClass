
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

<?php
include 'database.php';
include 'encryption.php';
global $db;
if(isset($_POST['submit'])){
    extract($_POST);
    
    // test du pseudo
    if(!empty($pseudo)){
        // test de l'email
        if(!empty($email)){
            $c = $db->prepare("SELECT email FROM utilisateurs WHERE email = :email");
            $c->execute(['email' => $email]);
            $result = $c->rowCount();
            // test si il y a déjà la même e-mail
            if($result == 0) {
                // test du mot de passe
                if(!empty($mdp)){
                    // test de la confirmation du mot de passe
                    if(!empty($mdpConf)){
                        // test des deux mots de passe
                        if($mdpConf == $mdp){  
                            // test cryptage du mot de passe 
                            $options['salt'] = 'thisisthesaltforthepasswordsofjiloclass';
                            $options['cost'] = 1453;
                            $mdp_hash = password_hash($mdp, PASSWORD_BCRYPT, $options);
                            // création du token
                            $m1 = uniqid();
                            $token = uniqid($m1, TRUE);
                            // insert toute les infos
                            $q = $db->prepare("INSERT INTO utilisateurs(pseudo,email,mdp,token) VALUES(:pseudo,:email,:mdp,:token)");
                            $q->execute([
                                'pseudo' => $pseudo,
                                'email' => $email,
                                'mdp' => $mdp_hash,
                                'token' => $token
                            ]);
                            setcookie('pseudo', $pseudo, time() + (3600 * 24 * 30));
                            setcookie('email', $email, time() + (3600 * 24 * 30));
                            // addresse de l'hébergeur lorsqu'on en a un
                            header("Location: http://localhost/"); // TODO: Changer l'addresse
                            die();



                        } else{
                            ?><h1 style="color:white">Les mots de passe ne sont pas les mêmes</h1><?php
                        }
                    } else{
                        ?><h1 style="color:white">Veuillez confirmer votre mot de passe</h1><?php
                    }
                } else{
                    ?><h1 style="color:white">Veuillez renseigner un mot de passe</h1><?php
                }
            } else{
                ?> <h1 style="color:white">Cette email existe déjà</h1><?php
            }
        } else{
            ?><h1 style="color:white">Veuillez renseigner une email</h1><?php
        }
    } else{
        ?><h1 style="color:white">Veuillez renseigner un pseudo</h1><?php
    }
}
?>
</body>
</html>
