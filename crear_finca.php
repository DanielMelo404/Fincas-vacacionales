<?php session_start(); include('crear_finca_handler.php')?>

<DOCTYPE html>
<html>
<head>
  <title>Fincas Vacacionales</title>
  <link rel="stylesheet" type="text/css" href="styles/crear_finca.css">
  <link rel="stylesheet" type="text/css" href="styles/select.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Muli:700|Open+Sans|Oswald|Quicksand|Raleway:700|Roboto|Source+Sans+Pro" rel="stylesheet">

</head>

<body>


  <h1>Crear anuncio</h1>
<div class="formDiv">
  <form id="form1" enctype="multipart/form-data" class="registro" action="<?php echo $_SERVER['PHP_SELF'];?>"method="post">
    <div id = "pag1"class="pag1">
    <div class="column">

      <p style="position:relative; z-index: 3; width:70%;" class="check_radio">En que departamento y municipio esta ubicada tu finca?</p>
  <div class="elevator">
        <div class="clear_select">
          <div class="custom-select">
        <select id="id_departamento" name="id_departamento" onchange="populate(this.id, 'municipio')">
          <option value="">Departamento</option>
          <?php

          $sql = "SELECT * FROM departamentos";
          if($result = mysqli_query($fincas_vacacionales, $sql)){
            while($row = mysqli_fetch_array($result)){
              if(mysqli_num_rows($result)>1){
          ?>
          <option value="<?php $id_departamento = $row['id_departamento'];  echo $id_departamento; ?>"><?php echo $row['departamento']; ?></option>
          <?php

              }
            }

          }

           ?>
        </select>
      </div>
<div class="custom-select">
        <select id="municipio" name="id_municipio">
          <option value="">Municipio</option>
        </select>
      </div>
</div>
</div>
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
              newOpt.id = "dpto" + pair[0];
              newOpt.innerHTML = pair[1];
              sel2.options.add(newOpt);
            }

          }

        </script>

        <span class="error"><?php echo $dep_mun_err ;?></span>

      <p class="check_radio">Ingresa las fotos de tu finca</p>

      <label class="file_container"><i class="material-icons">attachment</i>
        <input  id = "images" type="file" name="images[]" onchange=""multiple>
      </label>
<div class="imgContainer">
      <div class="img1">
        <img id="img1" class="error-fixed" src="" alt="finca">
      </div>
<div class="secun">
      <div class="imgSecun">
        <img id="img2" class="error-fixed" src="" alt="finca">
      </div>
      <div class="imgSecun">
        <img id="img3" class="error-fixed" src="" alt="finca">
      </div>
      <div class="imgSecun">
        <img id="img4" class="error-fixed" src="" alt="finca">
      </div>
      <div class="imgSecun">
        <img id="img5" class="error-fixed" src="" alt="finca">
      </div>
      <div class="imgSecun">
        <img id="img6" class="error-fixed" src="" alt="finca">
      </div>
      <div class="imgSecun">
        <img id="img7" class="error-fixed" src="" alt="finca">
      </div>
    </div>
</div>
<span class="menuda">Se aceptan maximo 7 imagenes de formatos jpg, jpeg y png.</span>
      <p id="bold" style="color: black;"></p>
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



      <p class="check_radio">Que servicios ofreces en tu finca?</p>

        <label class="check_container">
          <input type="checkbox" name="servAgua" value="si">Agua
          <span class="checkmark"></span>
        </label>

        <label class="check_container">
          <input type="checkbox" name="servLuz" value="si">Luz
          <span class="checkmark"></span>
        </label>

        <label class="check_container">
          <input type="checkbox" name="servCable" value="si">Cable
          <span class="checkmark"></span>
        </label>

        <label class="check_container">
          <input type="checkbox" name="servInternet" value="si">Internet
          <span class="checkmark"></span>
        </label>

        <label class="check_container">
          <input type="checkbox" name="servGas" value="si">Gas
          <span class="checkmark" ></span>
        </label>

        <label class="check_container">
          <input type="checkbox" name="servAyudante" value="si">Ayudante domestico
          <span class="checkmark"></span>
        </label>
<div class="textInputContainer">
        <div class="textInput">
        <p>Cuantas habitaciones tiene tu finca?</p>
          <div>

            <input id="habitaciones" class="short" type="text" name="noHabitaciones" value="<?php echo $noHabitaciones ;?>" autocomplete="off" maxlength="3">

          </div>
        </div>
        <span class="error"><?php echo $noHabitaciones_err ;?></span>
</div>
          <div class="textInputContainer">
            <div class="textInput">
              <p>De cuantos parqueaderos dispone tu finca?</p>
              <div>
                <input id="parqueaderos" class="short" type="text" name="noParqueaderos" value="<?php echo $noParqueaderos;?>" autocomplete="off" maxlength="3">
              </div>
            </div>

            <span class="error"><?php echo $noParqueaderos_err ;?></span>
          </div>

          <div class="textInputContainer">
            <div class="textInput">
              <p>De cuantos baños dispone tu finca?</p>
              <div>
                <input id="banios" class="short" type="text" name="noBanios" value="<?php echo  $noBanios;?>" autocomplete="off" maxlength="3">
              </div>
            </div>
            <span class="error"><?php echo $noBanios_err ;?></span>
          </div>

          <div class="textInputContainer">
            <div class="textInput">
              <p>Que area habitable tiene tu finca?<br><span class="menuda"> Si no lo sabes, un dato aproximado esta bien</span></p>
              <div>
                <input id='area' class="long" type="text" style="" spellcheck='false' name="noArea" value="<?php echo $noArea ;?>" autocomplete="off" maxlength="9">
              </div>
            </div>
            <span class="error"><?php echo $noArea_err ?></span>
          </div>


          <div class="textInputContainer">
            <div class="textInput">
              <p>Cuanto cuesta una noche por persona en tu finca cuando no es temporada?</p>
              <div>
                <input id="precio" class="long" type="text" name="precio" value="<?= $precio?>" autocomplete="off" maxlength="8">
              </div>
            </div>
            <span class="error"><?php echo $precio_err ?></span>
          </div>

          <div class="textInputContainer">
            <div class="textInput">
              <p>Cuanto cuesta en temporada?</p>
              <div>
                <input id="precioTemp" class="long" type="text" name="costoTemp" value="<?php echo $costoTemp;?>" autocomplete="off" maxlength="8">
              </div>
            </div>
            <span class="error"><?php echo $costoTemp_err ;?></span>
          </div>

                    <div class="textInputContainer">
                      <div class="textInput">
                        <p>Cual es el cupo maximo de tu finca?</p>
                        <div>
                          <input id="cupo" class="short" type="text" name="cupo" value="<?= $cupo?>" autocomplete="off" maxlength="2">
                        </div>
                      </div>
                      <span class="error"><?php echo $cupo_err ;?></span>
                    </div>













    <p class="check_radio">Cual es el tipo de arriendo de tu finca?</p>

    <label class="radio_container" >
      <input type="radio" name="tipoArri" value="Completo" checked>Completo
      <span class="checkmark_radio"></span>
    </label>

    <label class="radio_container">
      <input type="radio" name="tipoArri" value="Por Habitaciones">Por habitaciones
      <span class="checkmark_radio"></span>
    </label>

    <div class="textInputContainer">
      <div class="textInput">
        <p>A que celular llamaran tus futuros huespedes?</p>
        <div>
          <input id="celular" class="long" type="text" name="celular" value="<?php echo $celular;?>" autocomplete="off" minlength="10" maxlength="10">
        </div>
      </div>
      <span class="error"><?php echo $celular_err; ?></span>
    </div>




    <p class="check_radio">Cuentas con Whatsapp en este celular?</p>

    <label class="radio_container" >
      <input type="radio" name="whatsapp" value="si" checked>Si
      <span class="checkmark_radio"></span>
    </label>

    <label class="radio_container" >
      <input type="radio" name="whatsapp" value="no" >No
      <span class="checkmark_radio"></span>
    </label>

    </div>
</div>

<div id= "pag2" class="pag2">
  <div class="h2text" style=""><h2>Que caracteristicas tiene tu finca?</h2></div>

  <div class="column">

    <p class="check_radio">Caracteristicas Interiores</p>

    <label class="check_container">
      <input type="checkbox" name="TVplasma" value="si">TV plasma
      <span class="checkmark"></span>
    </label>


          <label class="check_container">
            <input type="checkbox" name="direcTV" value="si">DirecTV
            <span class="checkmark"></span>
          </label>

          <label class="check_container">
            <input type="checkbox" name="equipoDeSonido" value="si">Equipo de sonido
            <span class="checkmark"></span>
          </label>

      <label class="check_container">
        <input type="checkbox" name="gimnasio" value="si">Gimnasio
        <span class="checkmark" ></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="BBQ" value="si">BBQ
        <span class="checkmark"></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="ventiladores" value="si">Ventiladores
        <span class="checkmark"></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="rodaderoDePiscina" value="si">Rodadero de piscina
        <span class="checkmark"></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="mascotas" value="si">Se admiten de  mascotas
        <span class="checkmark"></span>
      </label>

      <p class="check_radio">Juegos y deportes</p>

      <label class="check_container">
        <input type="checkbox" name="pingPong" value="si">Ping Pong
        <span class="checkmark"></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="parqueInfantil" value="si">Parque infantil
        <span class="checkmark" ></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="tenis" value="si">Cancha de tenis
        <span class="checkmark" ></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="micro" value="si">Cancha de microfutbol
        <span class="checkmark"></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="waterpolo" value="si">Cancha de waterpolo
        <span class="checkmark"></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="rana" value="si">Rana
        <span class="checkmark"></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="parqués" value="si">Parqués
        <span class="checkmark"></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="tejo" value="si">Tejo
        <span class="checkmark"></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="billar" value="si">Billar
        <span class="checkmark"></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="hamacas" value="si">Hamacas
        <span class="checkmark"></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="jardines" value="si">Jardines
        <span class="checkmark"></span>
      </label>

      <p class="check_radio">Seguridad</p>

      <label class="check_container">
        <input type="checkbox" name="celaduria" value="si">Celaduria
        <span class="checkmark"></span>
      </label>

      <label class="check_container">
        <input type="checkbox" name="camaras" value="si">Camaras de seguridad
        <span class="checkmark" ></span>
      </label>

        <label class="check_container">
          <input type="checkbox" name="alarma" value="si">Alarma
          <span class="checkmark"></span>
        </label>

</div>


<div class="column">
  <p class="check_radio">Caracteristicas Exteriores</p>

  <label class="check_container">
    <input type="checkbox" name="parasoles" value="si">Parasoles
    <span class="checkmark"></span>
  </label>

  <label class="check_container">
    <input type="checkbox" name="kiosko" value="si">Kiosko
    <span class="checkmark"></span>
  </label>

  <label class="check_container">
    <input type="checkbox" name="terraza" value="si">Terraza
    <span class="checkmark"></span>
  </label>

  <label class="check_container">
    <input type="checkbox" name="rodadero" value="si">Rodadero de piscina
    <span class="checkmark"></span>
  </label>

  <label class="check_container">
    <input type="checkbox" name="jacuzzi" value="si">Jacuzzi
    <span class="checkmark"></span>
  </label>

  <label class="check_container">
    <input type="checkbox" name="zonaVerde" value="si">Zona verde
    <span class="checkmark"></span>
  </label>

  <label class="check_container">
    <input type="checkbox" name="sillasAsoleadoras" value="si">Sillas asoleadoras
    <span class="checkmark"></span>
  </label>


  <label class="check_container">
    <input type="checkbox" name="piscinaInfantil" value="si">Piscina infanitl
    <span class="checkmark" ></span>
  </label>


  <p class="check_radio">Cocina</p>

  <label class="check_container">
    <input type="checkbox" name="menajeCompleto" value="si">Menaje Completo
    <span class="checkmark"></span>
  </label>

  <label class="check_container">
    <input type="checkbox" name="microondas" value="si">Microondas
    <span class="checkmark"></span>
  </label>

  <label class="check_container">
    <input type="checkbox" name="licuadora" value="si">Licuadora
    <span class="checkmark"></span>
  </label>

  <label class="check_container">
    <input type="checkbox" name="nevera" value="si">Nevera
    <span class="checkmark"></span>
  </label>

  <p class="check_radio">Habitacion</p>

  <label class="check_container">
    <input type="checkbox" name="toallas" value="si">Toallas
    <span class="checkmark"></span>
  </label>

  <label class="check_container">
    <input type="checkbox" name="tendidos" value="si">Tendidos
    <span class="checkmark"></span>
  </label>

  <label class="check_container">
    <input type="checkbox" name="blackOut" value="si">Black out
    <span class="checkmark"></span>
  </label>

  <label class="check_container">
    <input type="checkbox" name="closet" value="si">Closet
    <span class="checkmark"></span>
  </label>

  </div>

</div>

  </form>
  <div class="center_submit">
    <input type="submit" value="Crear anuncio" name="submit" form="form1">
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

  <script src="crear_finca.js">

  </script>

  <script src="select.js">

  </script>
  <script >
  function xIndexSelect(){
    var optionContainers =  document.getElementById('cont0');
    var optionContainers2 =  document.getElementById('cont1');


      optionContainers.setAttribute('style','height:170px;');
      optionContainers2.setAttribute('style','height:170px;');
  }

  xIndexSelect();
  </script>
</body>
</html>
