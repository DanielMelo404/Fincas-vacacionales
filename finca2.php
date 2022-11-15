<?php session_start();       include('conection.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>finca</title>
    <link rel="stylesheet" type="text/css" href="styles/finca2.css">
    <link rel="stylesheet" type="text/css" href="styles/header.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="stylesheet" href="styles/slideshow.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Muli:700|Open+Sans|Oswald|Quicksand|Raleway:700|Roboto|Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php
  if (!isset($_GET['finca_id'])) {
    echo "<script> wondow.loaction = 'index.php'</script>"
    ;
  }else{
    $finca_id =  $_GET['finca_id'];
  }
  ?>
  <?php include 'header.php'; ?>

<?php
    $sql = "SELECT * FROM fincas WHERE finca_id = '$finca_id'";
    if($result = mysqli_query($fincas_vacacionales, $sql)){
      if(mysqli_num_rows($result) == 1){
        while($row = mysqli_fetch_array($result)){


 ?>


      <div class="row-1" style="margin-top: 50px;">
          <div class="col-1" style=""></div>
          <div class="col-7" style="">

            <div class="slideShow">


            <?php
            //
            $directory = "images/".$row['email']."/".$finca_id."/*";
            //
            $path = dirname($directory);
              $objects = new RecursiveIteratorIterator(
                  new RecursiveDirectoryIterator($path),
                  RecursiveIteratorIterator::SELF_FIRST
              );
              foreach ($objects as $file => $object) {
                  $basename = $object->getBasename();
                  if ($basename == '.' or $basename == '..') {
                      continue;
                  }
                  if ($object->isDir()) {
                      continue;
                  }
                  $fileData[] = $object->getPathname();
              }
              

            $filecount = count($fileData);

            $files = glob($directory);
            if ($files){
             $filecount = count($files);
            }


            for($i = 0; $i<$filecount; $i++){

            ?>
            <div class="mySlides fade">
              <img class="imagen" src="<?php echo $fileData[$i];/* "images/".$row['email']."/".$row['finca_id']."/$i".".jpg"; */?>">
            </div>

            <?php

            }

             ?>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <script>

              var slideIndex = 1;
              showSlide(slideIndex);


              function plusSlides(n){
                showSlide(slideIndex += n);
              }

              function currentSlide(n){
                showSlide(slideIndex = n)
              }

              function showSlide(n){
                var i;
                var slides = document.getElementsByClassName("mySlides");
                if (n > slides.length){slideIndex = 1}
                if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
              }
              slides[slideIndex-1].style.display = "block";
            }

            </script>

          </div>
          <div class="col-3" style="">

            <div class="" style="">
              <div class="caracteristicas-1" style="margin-top: 20px; font-size: 1.2em;"><h2 style="">Precio por persona:</h2><h3><?php echo $row['precio']/1000; ?>.000</h3></div>
              <div class="caracteristicas-1" ><h2>Cupo maximo:</h2><h3><?php echo $row['cupo']; ?> personas</h3></div>
              <div class="caracteristicas-1" ><h2><?php if($row['whatsapp']=="si"){echo "Whatsapp/Cel:";}else{echo "Cel";}?></h2><h3><?php echo $row['celular']; ?></h3></div>
            </div>

            <div class="caracteristicas-2">
              <ul>
                <li><p><i class="fa fa-bed" style="font-size: 1.3em;"></i>   Habitaciones: <?php echo $row['noHabitaciones']; ?></p></li>
                <li><p><i class="fa fa-car" style="font-size: 1.3em;"></i>  Parqueaderos: <?php echo $row['noParqueaderos']; ?></p></li>
                <li ><p> <i class="fa fa-bathtub" style="font-size: 1.3em;"></i> Baños: <?php echo $row['cupo']; ?></p></li>
                <li><p> <i class="fa fa-arrows-alt" style="font-size: 1.3em;"></i> Area: <?php echo $row['noArea']; ?>m2</p></li>
                <li><p> <i class="material-icons" style="vertical-align:bottom;">room_service</i> Servicios: <?php
                if($row['servCable'] == "si"){echo "Cable ";}
                if($row['servInternet'] == "si"){echo "Internet ";}
                if($row['servAyudante'] == "si"){echo "Ayudante domestico ";}
                if($row['servAgua'] == "si"){echo "Agua ";}
                if($row['servLuz'] == "si"){echo "Luz ";}
                if($row['servGas'] == "si"){echo "Gas ";}

                ?> </p></li>

              </ul>
            </div>

          </div>

          <div class="col-1" style=""></div>

      </div>

      <div class="row-2">
        <div class="col-1" style=""></div>
        <div class="col-10">
          <h4>Caracteristicas y servicios de la casa:</h4>
          <ul>
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
        </div>
        <div class="col-1" style=""></div>
      </div>

      <?php




          }
        }
      }

       ?>

      <hr>







</body>
</html>
