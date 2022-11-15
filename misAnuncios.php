<?php
  session_start();

  if(!isset($_SESSION['email'])||empty($_SESSION['email'])){
    echo "<script> window.location = 'login.php'</script>;";
    exit;
  }else{
    $email = $_SESSION['email'];
  }
?>

<!DOCTYPE html>
  <html>
    <head>
      <title>gallery</title>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="styles/gallery.css">
      <link rel="stylesheet" type="text/css" href="styles/item.css">
      <link rel="stylesheet" type="text/css" href="styles/header.css">
      <link rel="stylesheet" type="text/css" href="styles/fincasLooker.css">
      <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Muli:700|Open+Sans|Oswald|Quicksand|Raleway:700|Roboto|Source+Sans+Pro" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">

    </head>

    <body>

      <?php include 'header.php'; ?>

      <?php
      include('conection.php');

      $sql2 = "SELECT * FROM users WHERE email = '$email' LIMIT 0 ,1";
      if($result = mysqli_query($fincas_vacacionales, $sql2)){
        while($row = mysqli_fetch_array($result)){
          $user_id = $row['user_id'];

       ?>
<!--FINCAS LOOKER-->
    <div class="tusAn">
      <h1>Hola <span><?php echo  $row['name'];}}?></span>, estos son tus anuncios:</h1>
    </div>
<!--GALERY-->
<div class="galleryContainer">
<?php
    $sql = "SELECT * FROM fincas WHERE finca_id IN (SELECT finca_id FROM linker_users_fincas WHERE user_id = $user_id)";
    if($result = mysqli_query($fincas_vacacionales, $sql)){
      if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){


          ?>
              <a href="finca2.php?finca_id=<?php echo $row['finca_id'] ?>"><div class="itemTusAn">

                <div class="imagen_item">
                  <img src="<?php echo "images/".$email."/".$row['finca_id']."/0.jpg";?>">
                </div>
                <div class="caracteristicas2" style="position: relative;">
                  <p style="">Tipo de Arriendo:  <?php echo $row['tipoArri'];?></p>
                  <p >Precio: <?php echo $row['precio'];?>/persona</p>
                  <p style="">Cupo: <?php echo $row['cupo'];?> personas</p>
                </div >

                <div class="caracteristicas" style="">
                    <ul style="">
                      <?php

                      if($row['TVplasma']=="si"){
                          echo "<li>TVplasma</li>";
                            }
                      if($row['DirecTV']=="si"){
                          echo "<li>DirecTV</li>";
                            }
                      if($row['EquipoDeSonido']=="si"){
                          echo "<li>Equipo de sonido</li>";
                            }
                      if($row['Gimnasio']=="si"){
                          echo "<li>Gimnasio</li>";
                            }
                      if($row['BBQ']=="si"){
                          echo "<li>BBQ</li>";
                            }
                      if($row['Ventiladores']=="si"){
                          echo "<li>Ventiladores</li>";
                            }
                      if($row['RodaderoDePiscina']=="si"){
                          echo "<li>RodaderoDePiscina</li>";
                            }
                      if($row['SeAdmitenMascotas']=="si"){
                          echo "<li>Mascotas</li>";
                            }
                      if($row['pingPong']=="si"){
                          echo "<li>Ping pong</li>";
                            }
                      if($row['parqueInfantil']=="si"){
                          echo "<li>Parque Infantil</li>";
                            }
                      if($row['tenis']=="si"){
                          echo "<li>Tennis</li>";
                            }
                      if($row['micro']=="si"){
                          echo "<li>Cancha de micro</li>";
                            }
                      if($row['waterpolo']=="si"){
                          echo "<li>Waterpolo</li>";
                            }
                      if($row['rana']=="si"){
                          echo "<li>Rana</li>";
                            }
                      if($row['parques']=="si"){
                          echo "<li>Parqués</li>";
                            }
                      if($row['tejo']=="si"){
                          echo "<li>Tejo</li>";
                            }
                            if($row['billar']=="si"){
                                echo "<li>Billar</li>";
                                  }
                            if($row['hamacas']=="si"){
                                echo "<li>Hamacas</li>";
                                  }
                            if($row['jardines']=="si"){
                                echo "<li>Jardines</li>";
                                  }
                            if($row['celaduria']=="si"){
                                echo "<li>Celaduria</li>";
                                  }
                            if($row['camaras']=="si"){
                                echo "<li>Camaras</li>";
                                  }
                            if($row['alarma']=="si"){
                                echo "<li>Alarma</li>";
                                  }
                            if($row['parasoles']=="si"){
                                echo "<li>Parasoles</li>";
                                  }
                            if($row['kiosko']=="si"){
                                echo "<li>Kiosko</li>";
                                  }
                            if($row['terraza']=="si"){
                                echo "<li>Terraza</li>";
                                  }
                            if($row['rodadero']=="si"){
                                echo "<li>Rodadero</li>";
                                  }
                            if($row['jacuzzi']=="si"){
                                echo "<li>Jacuzzi</li>";
                                  }
                            if($row['zonaVerde']=="si"){
                                echo "<li>Zona verde</li>";
                                  }
                            if($row['sillasAsoleadoras']=="si"){
                                echo "<li>Sillas asoleadoras</li>";
                                  }
                            if($row['piscinaInfantil']=="si"){
                                echo "<li>Piscina infantil</li>";
                                  }
                            if($row['menajeCompleto']=="si"){
                                echo "<li>Menaje completo</li>";
                                  }
                            if($row['microondas']=="si"){
                                echo "<li>Microondas</li>";
                                  }
                            if($row['licuadora']=="si"){
                                echo "<li>Licuadora</li>";
                                  }
                            if($row['nevera']=="si"){
                                echo "<li>Nevera</li>";
                                  }
                            if($row['toallas']=="si"){
                                echo "<li>Toallas</li>";
                                  }
                            if($row['tendidos']=="si"){
                                echo "<li>Tendidos</li>";
                                  }
                            if($row['blackOut']=="si"){
                                echo "<li>Black out</li>";
                                  }
                            if($row['closet']=="si"){
                                echo "<li>Closet</li>";
                                  }


                              ?>
                    </ul>
                    <a href="editar.php?finca_id=<?php echo $row['finca_id']; ?>">
                <div style="clear:both"></div>
                </div>
                <div class="editar"style=" "><p style="">Editar</p></div></a>


    </div></a>

<?php
        }


      }
    }




  ?>




</div>
    </body>
  </html>
