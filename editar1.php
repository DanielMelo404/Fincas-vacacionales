
<?php include('editar_handler.php')?>

<DOCTYPE html>
<html>
<head>
  <title>editar finca</title>
  <link rel="stylesheet" type="text/css" href="styles/crear_finca.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

  <h1>Editar anuncio</h1>
  <div class="formDiv">
  <form id="form1" enctype="multipart/form-data" class="registro" action="" method="post">
    <div id = "pag1"class="pag1">
    <div class="column">

      <p>En que departamento y municipio esta ubicada tu finca?</p>
        <div class="clear_select">
        <select id="departamento" name="id_departamento" onchange="populate(this.id, 'municipio')">
          <option value=""></option>
          <?php

          $sql = "SELECT * FROM departamentos";
          if($result = mysqli_query($fincas_vacacionales, $sql)){
            while($row = mysqli_fetch_array($result)){
              if(mysqli_num_rows($result)>1){
          ?>
          <option value="<?php echo $row['id_departamento'];?>"><?php echo $row['departamento']; ?></option>
          <?php

              }
            }

          }

           ?>
        </select>

        <select id="municipio" name="id_municipio">

        </select></div>

        <script>
          function populate(s1, s2){
            var sel1 = document.getElementById(s1);
            var sel2 = document.getElementById(s2);
            sel2.innerHTML="";

            <?php
            $sql = "SELECT * FROM departamentos";
            if($result = mysqli_query($fincas_vacacionales, $sql)){
              while($row = mysqli_fetch_array($result)){
                if(mysqli_num_rows($result)>1){
                  ?>
                  if(sel1.value == <?php echo '"'.$row['id_departamento'].'"'; ?>){
                    var optArray = [
                      <?php
                      $aux = $row['id_departamento'];
                      $sql2 = "SELECT * FROM municipios WHERE departamento_id = '$aux'";
                      if($result2 = mysqli_query($fincas_vacacionales, $sql2)){
                        while($row2 = mysqli_fetch_array($result2)){
                          if(mysqli_num_rows($result2)>1){
                            echo ',"' . $row2['id_municipio'] . '|' . $row2['municipio'] .'"' ;
                          }
                        }

                      }
                      ?>
                    ];
                  }

                  <?php
                }
              }
            }
             ?>
            for(var opt in optArray){
              var pair = optArray[opt].split("|");
              var newOpt = document.createElement("option");
              newOpt.value = pair[0];
              newOpt.innerHTML = pair[1];
              sel2.options.add(newOpt);
            }



          }


        </script>

        <span class="error"><?php echo $dep_mun_err ;?></span>

      <p>Ingresa las fotos de tu finca</p>

      <label class="file_container"><i class="material-icons">attachment</i>
        <input  id = "input"type="file" name="images[]" onchange="display()"multiple>
      </label>
      <p id="bold" style="color: black;">Cambiar imagenes</p>
      <script>
      function display(){
        var inp = document.getElementById("input");
        var bold = document.getElementById("bold");
          if(inp.files.length > 0){
            var num = inp.files.length;
            var text = num + " imagenes seleccionadas";
            bold.innerHTML = text;
            document.getElementById("imgAlert").style.display = "none";
          }
      }
      </script>

      <span id="imgAlert"class="error"><?php echo $images_err ;?></span>

      <p>Que servicios ofreces en tu finca?</p>

        <label class="check_container">
          <input type="checkbox" name="servAgua" value="si" <?php if($servAgua=="si"){echo 'checked';} ?>>Agua
          <span class="checkmark"></span>
        </label>

        <label class="check_container">
          <input type="checkbox" name="servLuz" value="si" <?php if($servLuz=="si"){echo 'checked';} ?>>Luz
          <span class="checkmark"></span>
        </label>

        <label class="check_container">
          <input type="checkbox" name="servCable" value="si" <?php if(  $servCable=="si"){echo 'checked';} ?>>Cable
          <span class="checkmark"></span>
        </label>

        <label class="check_container">
          <input type="checkbox" name="servInternet" value="si" <?php if($servInternet=="si"){echo 'checked';} ?>>Internet
          <span class="checkmark"></span>
        </label>

        <label class="check_container">
          <input type="checkbox" name="servGas" value="si" <?php if($servGas=="si"){echo 'checked';} ?>>Gas
          <span class="checkmark" ></span>
        </label>

        <label class="check_container">
          <input type="checkbox" name="servAyudante" value="si" <?php if($servAyudante=="si"){echo 'checked';} ?>>Ayudante domestico
          <span class="checkmark"></span>
        </label>

        <p>Cuantas habitaciones tiene tu finca?</p>

        <input type="text" name="noHabitaciones" value="<?php echo $noHabitaciones;?>">
        <span class="error"><?php echo $noHabitaciones_err ;?></span>

      <p>De cuantos parqueaderos dispone tu finca?</p>

      <input type="text" name="noParqueaderos" value="<?php echo $noParqueaderos;?>">
      <span class="error"><?php echo $noParqueaderos_err ;?></span>
      <p>De cuantos baños dispone tu finca?</p>

      <input type="text" name="noBanios" value="<?php echo $noBanios;?>">
      <span class="error"><?php echo $noBanios_err ;?></span>
  </div>


  <div class="column">

    <p>Que area habitable tiene tu finca?<br><span class="menuda"> Si no lo sabes, un dato aproximado esta bien</span></p>

    <input type="text" style="width:80%; direction: RTL;" name="noArea" value="<?php echo $noArea;?>">
    <b style="font-size: 1.4em; ">m<sup>2</sup></b>
    <span class="error"><?php echo $noArea_err ;?></span>


    <p>Cuanto cuesta una noche por persona en tu finca cuando no es temporada?</p>

    <input type="text" name="precio" value="<?php echo $precio;?>">
    <span class="error"><?php echo $precio_err ;?></span>

    <p>Cuanto cuesta en temporada?</p>

    <input type="text" name="costoTemp" value="<?php echo $costoTemp ;?>">
    <span class="error"><?php echo $costoTemp_err ;?></span>

    <p>Cual es el cupo maximo de tu finca?</p>

    <input type="text" name="cupo" value="<?php echo $cupo ;;?>">
    <span class="error"><?php echo $cupo_err ;?></span>

    <p>Cual es el tipo de arriendo de tu finca?</p>

    <label class="radio_container" >
      <input type="radio" name="tipoArri" value="Completo" <?php if($tipoArri=="Completo"){echo "checked";}?>>Completo
      <span class="checkmark_radio"></span>
    </label>

    <label class="radio_container">
      <input type="radio" name="tipoArri" value="Por Habitaciones" <?php if($tipoArri=="Por Habitaciones"){echo "checked";}?>>Por habitaciones
      <span class="checkmark_radio"></span>
    </label>

    <p>A que celular llamaran tus futuros huespedes?</p>

    <input type="text" name="celular" value="<?php echo $celular;?>">
    <span class="error"><?php echo $celular_err ?></span>

    <p>Cuentas con Whatsapp en este celular?</p>

    <label class="radio_container" >
      <input type="radio" name="whatsapp" value="si" <?php if($whatsapp=="si"){echo "checked";}?>>Si
      <span class="checkmark_radio"></span>
    </label>

    <label class="radio_container" >
      <input type="radio" name="whatsapp" value="no" <?php if($whatsapp=="no"){echo "checked";}?>>No
      <span class="checkmark_radio"></span>
    </label>

    </div>
</div>

<div id= "pag2" class="pag2">
  <div class="h2text" style=""><h2>Que caracteristicas tiene tu finca?</h2></div>

  <div class="column">

    <p>Caracteristicas Interiores</p>

    <label class="check_container">
      <input type="checkbox" name="TVplasma" value="si" <?php if($TVplasma=="si"){echo 'checked';} ?>>TV plasma
      <span class="checkmark"></span>
    </label>


          <label class="check_container">
            <input type="checkbox" name="direcTV" value="si" <?php if($DirecTV=="si"){echo 'checked';} ?>>DirecTV
            <span class="checkmark"></span>
          </label>

          <label class="check_container">
            <input type="checkbox" name="equipoDeSonido" value="si" <?php if($equipoDeSonido=="si"){echo 'checked';} ?>>Equipo de sonido
            <span class="checkmark"></span>
          </label>

      <label class="check_container">
        <input type="checkbox" name="gimnasio" value="si" <?php if($gimnasio=="si"){echo 'checked';} ?>>Gimnasio
        <span class="checkmark" ></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="BBQ" value="si" <?php if($BBQ=="si"){echo 'checked';} ?>>BBQ
        <span class="checkmark"></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="ventiladores" value="si" <?php if($ventiladores=="si"){echo 'checked';} ?>>Ventiladores
        <span class="checkmark"></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="rodaderoDePiscina" value="si" <?php if($rodadero=="si"){echo 'checked';} ?>>Rodadero de piscina
        <span class="checkmark"></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="mascotas" value="si" <?php if($mascotas=="si"){echo 'checked';} ?>>Se admiten de  mascotas
        <span class="checkmark"></span>
      </label>

      <p>Juegos y deportes</p>

      <label class="check_container">
        <input type="checkbox" name="pingPong" value="si" <?php if($pingPong=="si"){echo 'checked';} ?>>Ping Pong
        <span class="checkmark"></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="parqueInfantil" value="si" <?php if($parqueInfantil=="si"){echo 'checked';} ?>>Parque infantil
        <span class="checkmark" ></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="tenis" value="si" <?php if($tenis=="si"){echo 'checked';} ?>>Cancha de tenis
        <span class="checkmark" ></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="micro" value="si" <?php if($micro=="si"){echo 'checked';} ?>>Cancha de microfutbol
        <span class="checkmark"></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="waterpolo" value="si" <?php if($waterpolo=="si"){echo 'checked';} ?>>Cancha de waterpolo
        <span class="checkmark"></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="rana" value="si" <?php if($rana=="si"){echo 'checked';} ?>>Rana
        <span class="checkmark"></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="parqués" value="si" <?php if($parques=="si"){echo 'checked';} ?>>Parqués
        <span class="checkmark"></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="tejo" value="si" <?php if($tejo=="si"){echo 'checked';} ?>>Tejo
        <span class="checkmark"></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="billar" value="si" <?php if($billar=="si"){echo 'checked';} ?>>Billar
        <span class="checkmark"></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="hamacas" value="si" <?php if($hamacas=="si"){echo 'checked';} ?>>Hamacas
        <span class="checkmark"></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="jardines" value="si" <?php if($jardines=="si"){echo 'checked';} ?>>Jardines
        <span class="checkmark"></span>
      </label>

      <p>Seguridad</p>

      <label class="check_container">
        <input type="checkbox" name="celaduria" value="si" <?php if($celaduria=="si"){echo 'checked';} ?>>Celaduria
        <span class="checkmark"></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="camaras" value="si" <?php if($camaras=="si"){echo 'checked';} ?>>Camaras de seguridad
        <span class="checkmark" ></span>
      </label>

        <label class="check_container">
          <input type="checkbox" name="alarma" value="si" <?php if($alarma=="si"){echo 'checked';} ?>>Alarma
          <span class="checkmark"></span>
        </label>

</div>


<div class="column">
  <p>Caracteristicas Exteriores</p>

  <label class="check_container">
    <input type="checkbox" name="parasoles" value="si" <?php if($parasoles=="si"){echo 'checked';} ?>>Parasoles
    <span class="checkmark"></span>
  </label>

  <label class="check_container">
    <input type="checkbox" name="kiosko" value="si" <?php if($kiosko=="si"){echo 'checked';} ?>>Kiosko
    <span class="checkmark"></span>
  </label>

  <label class="check_container">
    <input type="checkbox" name="terraza" value="si" <?php if($terraza=="si"){echo 'checked';} ?>>Terraza
    <span class="checkmark"></span>
  </label>

  <label class="check_container">
    <input type="checkbox" name="rodadero" value="si" <?php if($rodadero=="si"){echo 'checked';} ?>>Rodadero de piscina
    <span class="checkmark"></span>
  </label>

  <label class="check_container">
    <input type="checkbox" name="jacuzzi" value="si" <?php if($jacuzzi=="si"){echo 'checked';} ?>>Jacuzzi
    <span class="checkmark"></span>
  </label>

  <label class="check_container">
    <input type="checkbox" name="zonaVerde" value="si" <?php if($zonaVerde=="si"){echo 'checked';} ?>>Zona verde
    <span class="checkmark"></span>
  </label>

  <label class="check_container">
    <input type="checkbox" name="sillasAsoleadoras" value="si" <?php if($sillasAsoleadoras=="si"){echo 'checked';} ?>>Sillas asoleadoras
    <span class="checkmark"></span>
  </label>


  <label class="check_container">
    <input type="checkbox" name="piscinaInfantil" value="si" <?php if($piscinaInfantil=="si"){echo 'checked';} ?>>Piscina infanitl
    <span class="checkmark" ></span>
  </label>


  <p>Cocina</p>

  <label class="check_container">
    <input type="checkbox" name="menajeCompleto" value="si" <?php if($menajeCompleto=="si"){echo 'checked';} ?>>Menaje Completo
    <span class="checkmark"></span>
  </label>

  <label class="check_container">
    <input type="checkbox" name="microondas" value="si" <?php if($microondas=="si"){echo 'checked';} ?>>Microondas
    <span class="checkmark"></span>
  </label>

  <label class="check_container">
    <input type="checkbox" name="licuadora" value="si" <?php if($licuadora=="si"){echo 'checked';} ?>>Licuadora
    <span class="checkmark"></span>
  </label>

  <label class="check_container">
    <input type="checkbox" name="nevera" value="si" <?php if($nevera=="si"){echo 'checked';} ?>>Nevera
    <span class="checkmark"></span>
  </label>

  <p>Habitacion</p>

  <label class="check_container">
    <input type="checkbox" name="toallas" value="si" <?php if($toallas=="si"){echo 'checked';} ?>>Toallas
    <span class="checkmark"></span>
  </label>

  <label class="check_container">
    <input type="checkbox" name="tendidos" value="si" <?php if($tendidos=="si"){echo 'checked';} ?>>Tendidos
    <span class="checkmark"></span>
  </label>

  <label class="check_container">
    <input type="checkbox" name="blackOut" value="si" <?php if($blackOut=="si"){echo 'checked';} ?>>Black out
    <span class="checkmark"></span>
  </label>

  <label class="check_container">
    <input type="checkbox" name="closet" value="si" <?php if($closet=="si"){echo 'checked';} ?>>Closet
    <span class="checkmark"></span>
  </label>

  </div>


</div>

  </form>
  <div class="center_submit">
    <input type="submit" value="Guardar cambios" style="width: 150px;" name="submit" form="form1">
    <button id="carac"class="carac" style="width: 180px;">Añade caracteristicas</button>
  </div>

</div>
<script>

  var cont=1;
    var btnCarac = document.getElementById("carac");

    btnCarac.onclick = changePag;

    var pag1 = document.getElementById("pag1");
    var  pag2 =   document.getElementById("pag2");
    function changePag(){
    pag1.style.display = "none";
    pag2.style.display = "block";
    btnCarac.onclick = changePag2;
    btnCarac.innerHTML="Atras";
    btnCarac.style.width = "80px";
}

function changePag2(){
  pag1.style.display = "block";
  pag2.style.display = "none";
  btnCarac.onclick = changePag;
  btnCarac.innerHTML="Añade caracteristicas";
  btnCarac.style.width = "180px";
}

  </script>


</body>
</html>
