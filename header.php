<link rel="stylesheet" href="styles/header.css">
<link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Muli:700|Open+Sans|Oswald|Quicksand|Raleway:700|Roboto|Source+Sans+Pro" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
<link rel="stylesheet" href="styles/coverPage.css">
<header>
  <div id="menuButton" class="miniMenu">
    <div></div>
    <div></div>
    <div></div>
  </div>

  <h1 >Fincas Vacacionales</h1>
  <ul id='ulMenu' class="hidden">
    <?php
    echo '<li><a href="index.php" >Inicio</a></li>';
    echo '<li><a href="fincas.php" >Fincas</a></li>';
    if(isset($_SESSION['email'])){
      echo '<li><a href="misAnuncios.php"  >Mis Anuncios</a></li>';
      echo '<li><a href="crear_finca.php"  >Publica</a></li>';
      echo '<li><a href="logout.php"  >Logout</a></li>';
      } else{
          echo '<li><a href="registro.php" >Registrate</a></li>';
          echo '<li><a href="login.php" >Login</a></li>';
      }
    ?>
  </ul>

</header>
<script type="text/javascript">
  var menuButton = document.getElementById('menuButton');
  var ulMenu = document.getElementById('ulMenu');

  menuButton.addEventListener('click', menuVisibility);
  function menuVisibility(){
    ulMenu.classList.toggle('visible');
    ulMenu.classList.toggle('hidden');
  }
</script>
