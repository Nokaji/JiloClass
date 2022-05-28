<?php
$reqdata = $bdd->prepare("SELECT * FROM membres WHERE email = ? AND id = ? AND pseudo = ?");
$reqdata->execute(array($_SESSION['email'], $_SESSION['id'], $_SESSION['pseudo']));
$reqdata = $reqdata->fetch();
$roleid = $reqdata['roleid'];
$reqrole = $bdd->prepare("SELECT * FROM role WHERE id = ?");
$reqrole->execute(array($roleid));
$role = $reqrole->fetch();
$permission2 = stristr($reqdata['permission'], "*");
//$permission = stristr($reqdata['permission'], $search);
?>