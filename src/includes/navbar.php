<div class="loader">
  <div class="loading">
    <i class="fa-solid fa-circle-notch fa-spin fa-3x"></i>
    <div>
      <span>Chargement !</span>
    </div>
  </div>
</div>
<nav class="navbar navbar-expand-lg">
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
            require_once("src/includes/permission.php");
            $permission = stristr($reqdata['permission'], "paneladmin");
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
          <a class='navbar-link navbar-sign-up' href='register.php'>S'inscrire</a>
          </li>
          <li class='nav-item'>
          <a class='navbar-link navbar-sign-in' href="login.php">Connexion</a>
          </li> 
        <?php } ?>
    </div>
  </div>
</div>
</nav>
<script src="src/js/externe/bootstrap.min.js"></script>
<script src="src/js/externe/jquery.min.js"></script>
<link href="src/css/externe/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="src/css/navbar.css">
<link rel="stylesheet" href="src/fontawesome/css/all.min.css">
<script>
  function delay(time) {
  return new Promise(resolve => setTimeout(resolve, time));
}
  $(window).on("load", async function() {
    $(".loader").fadeOut("slow");
    await delay(750);
    $('body').css('overflow-y','unset');
  });s
</script>