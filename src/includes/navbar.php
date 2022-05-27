<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand">
      <img src="src/img/jiloclass.gif" alt="" width="75" height="75" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="index" href="index">Accueil</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cours
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Verifié</a></li>
          </ul>
        </li>
      </ul>
        <?php
          if(isset($_SESSION['id'])){
            $reqdata = $bdd->prepare("SELECT * FROM membres WHERE email = ? AND id = ? AND pseudo = ?");
            $reqdata->execute(array($_SESSION['email'], $_SESSION['id'], $_SESSION['pseudo']));
            $reqdata = $reqdata->fetch();
            $roleid = $reqdata['roleid'];
            $permission = stristr($reqdata['permission'], "paneladmin");
            $permission2 = stristr($reqdata['permission'], "*");
            $reqrole = $bdd->prepare("SELECT * FROM role WHERE id = ?");
            $reqrole->execute(array($roleid));
            $role = $reqrole->fetch();
            $admindashboard = "<li><a class='dropdown-item' href='admin'>Panel Admin</a></li>";
          ?>
          <div class='topbar-divider'></div>
          <li class='nav-item dropdown nav-account'>
          <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
            <?= $_SESSION['pseudo'] ?>
          </a>
          <ul class='dropdown-menu dropdown-menu-account' aria-labelledby='navbarDropdown'>
            <li><a class='dropdown-item' href='dashboard'>Dashboard</a></li>
            <?php
            if($role['name'] == 'administrator' && $roleid == 1 OR $permission == $reqdata['permission'] && $permission != false OR $permission2 == $reqdata['permission'] && $permission2 != false)
            {echo $admindashboard;}
            ?>
            <li><a class='dropdown-item' href='info.php'>Mon Profil</a></li>
            <li><hr class='dropdown-divider'></li>
            <li><a class='dropdown-item' href='logout.php'>Se déconnecter</a></li>
          </ul>
        </li>
        <?php }else{ ?>
          <li class='nav-item'>
          <a class='navbar-link navbar-sign-up' href='register'>S'inscrire</a>
          </li>
          <li class='nav-item'>
          <a class='navbar-link navbar-sign-in' onclick='openLogin()'>Connexion</a>
          </li> 
        <?php } ?>
    </div>
  </div>
</div>
</nav>
<?php include("".BASE_URL."login.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="src/css/navbar.css">
<link rel="stylesheet" href="src/fontawesome/css/all.min.css">