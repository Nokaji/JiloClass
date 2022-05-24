<?php
define('HOST', 'localhost'); // TODO changer l'url
define('DB_NAME', 'jiloclass');//TODO tout changer
define('USER', 'root');
define('PASS', '');
try{
    $bdd = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOExecption $e){
    echo $e;
}
?>