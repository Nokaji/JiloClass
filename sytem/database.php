<?php
define('HOST', 'localhost'); // TODO changer l'url
define('DB_NAME', 'lunarmc');//TODO tout changer
define('USER', 'root');
define('PASS', '');
try{
    $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOExecption $e){
    echo $e;
}

?>