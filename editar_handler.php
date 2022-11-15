<?php 
$email = $_SESSION['email'];

if(isset($_GET['finca_id'])){
  $_SESSION['finca_id'] = $_GET['finca_id'];
}else{
}
$finca_id = $_SESSION['finca_id'];


include 'conection.php';

  $sql3 = "SELECT * FROM fincas WHERE finca_id = $finca_id";
  if($result3 = mysqli_query($fincas_vacacionales, $sql3)){
    while($row3 = mysqli_fetch_array($result3)){

        $id_municipio = $row3['muni'];
        $id_departamento = $row3['dpto'];
        $images ="";
        $noHabitaciones = $row3['noHabitaciones'];
        $noParqueaderos = $row3['noParqueaderos'];
        $noArea = $row3['noArea'];;
        $servAgua = $row3['servAgua'];
        $servLuz = $row3['servLuz'];
        $noBanios = $row3['noBanios'];
        $servCable = $row3['servCable'];
        $servInternet = $row3['servInternet'];
        $servGas = $row3['servGas'];
        $servAyudante = $row3['servAyudante'];
        $precio = $row3['precio'];
        $costoTemp = $row3['costoTemp'];
        $cupo = $row3['cupo'];
        $celular = $row3['celular'];
        $whatsapp = $row3['whatsapp'];
        $tipoArri = $row3['tipoArri'];

        $TVplasma = $row3['TVplasma'];
        $DirecTV = $row3['DirecTV'];
        $equipoDeSonido = $row3['EquipoDeSonido'];
        $gimnasio = $row3['Gimnasio'];
        $BBQ = $row3['BBQ'];
        $ventiladores = $row3['Ventiladores'];
        $mascotas = $row3['SeAdmitenMascotas'];
        $pingPong = $row3['pingPong'];
        $parqueInfantil = $row3['parqueInfantil'];
        $tenis = $row3['tenis'];
        $micro = $row3['micro'];
        $waterpolo = $row3['waterpolo'];
        $rana = $row3['rana'];
        $parques = $row3['parques'];
        $tejo = $row3['tejo'];
        $billar = $row3['billar'];
        $hamacas = $row3['hamacas'];
        $jardines = $row3['jardines'];
        $celaduria = $row3['celaduria'];
        $camaras = $row3['camaras'];
        $alarma = $row3['alarma'];
        $parasoles = $row3['parasoles'];
        $kiosko = $row3['kiosko'];
        $terraza = $row3['terraza'];
        $rodadero = $row3['rodadero'];
        $jacuzzi = $row3['jacuzzi'];
        $zonaVerde = $row3['zonaVerde'];
        $sillasAsoleadoras = $row3['sillasAsoleadoras'];
        $piscinaInfantil = $row3['piscinaInfantil'];
        $menajeCompleto = $row3['menajeCompleto'];
        $microondas = $row3['microondas'];
        $licuadora = $row3['licuadora'];
        $nevera = $row3['nevera'];
        $toallas = $row3['toallas'];
        $tendidos = $row3['tendidos'];
        $blackOut = $row3['blackOut'];
        $closet = $row3['closet'];


}
}
$dep_mun_err = $images_err = $noHabitaciones_err = $noParqueaderos_err = $noArea_err ="";
$precio_err = $costoTemp_err = $cupo_err = $celular_err = $noBanios_err ="";

//--------------------------------------------------------------
if($_SERVER["REQUEST_METHOD"] ==  "POST"){

//validacion id_departamento y municipio

  if(empty($_POST['id_departamento'])||(empty($_POST['id_municipio']))){
    $dep_mun_err = "Porfavor ingresa tu departamento y municipio";
  }else{
    $id_departamento = $_POST['id_departamento'];
    $id_municipio = $_POST['id_municipio'];
  }
//validacion imagenes
if(file_exists($_FILES['images']['tmp_name'][0]) || is_uploaded_file($_FILES['images']['tmp_name'][0])){
    $images = $_FILES['images'];
    $long = count($_FILES['images']['name']);
  if($long<8){
    if(!file_exists("images/".$email."/del/")){
    mkdir("images/".$email."/del/");
    }

    $directory = "images/".$email."/".$finca_id."/*";

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

      $count = count($fileData);

    for($i=0; $i<$count ;$i++){
      rename("images/".$email."/".$finca_id."/".$i, "images/".$email.'/del');
    }

  for($i=0; $i<$long ;$i++){

    $imageName = $_FILES['images']['name'][$i];
    $imageTempName = $_FILES['images']['tmp_name'][$i];
    $imageSize = $_FILES['images']['size'][$i];
    $imageError = $_FILES['images']['error'][$i];
    $imageType = $_FILES['images']['type'][$i];

    $imageExplode = explode(".", $imageName);
    $imageExt = strtolower(end($imageExplode));

    $allowed = array('jpg', 'jpeg', 'png');
  if (in_array($imageExt, $allowed)) {
    if ($imageError == 0) {
      if ($imageSize < 10000000) {
        $imageNameNew = $i. "." . $imageExt;
        $imageDestination = 'images/'.$email ."/".$finca_id."/". $imageNameNew;
        move_uploaded_file($imageTempName, $imageDestination);
      }else{
        $images_err = "Solo imagenes de maximo 1MB";
      }

    }else{
      $images_err = "No se pudo subir tu imagen, vuelve mas tarde";
    }
  }else{
      $images_err =  "Solo archivos jpg, jpeg, png";
  }
  }
  }else{
    $images_err =  "Maximo 7 imagenes";
  }
}
//validacion caracteristicas

if(isset($_POST['TVplasma'])){
  $TVplasma = "si";
}else{
  $TVplasma = "no";
}

if(isset($_POST['DirecTV'])){
  $DirecTV = "si";
}else{
  $DirecTV = "no";
}

if(isset($_POST['equipoDeSonido'])){
  $equipoDeSonido = "si";
}else{
  $equipoDeSonido = "no";
}

if(isset($_POST['gimnasio'])){
  $gimnasio = "si";
}else{
  $gimnasio = "no";
}

if(isset($_POST['BBQ'])){
  $BBQ = "si";
}else{
  $BBQ = "no";
}

if(isset($_POST['ventiladores'])){
  $ventiladores = "si";
}else{
  $ventiladores = "no";
}


if(isset($_POST['rodaderoDePiscina'])){
  $rodaderoDePiscina = "si";
}else{
  $rodaderoDePiscina = "no";
}

if(isset($_POST['mascotas'])){
  $mascotas = "si";
}else{
  $mascotas = "no";
}

if(isset($_POST['pingPong'])){
  $pingPong = "si";
}else{
  $pingPong = "no";
}

if(isset($_POST['parqueInfantil'])){
  $parqueInfantil = "si";
}else{
  $parqueInfantil = "no";
}

if(isset($_POST['tenis'])){
  $tenis = "si";
}else{
  $tenis = "no";
}

if(isset($_POST['micro'])){
  $micro = "si";
}else{
  $micro = "no";
}


if(isset($_POST['waterpolo'])){
  $waterpolo = "si";
}else{
  $waterpolo = "no";
}

if(isset($_POST['rana'])){
  $rana = "si";
}else{
  $rana = "no";
}

if(isset($_POST['parques'])){
  $parques = "si";
}else{
  $parques = "no";
}

if(isset($_POST['tejo'])){
  $tejo = "si";
}else{
  $tejo = "no";
}

if(isset($_POST['billar'])){
  $billar = "si";
}else{
  $billar = "no";
}

if(isset($_POST['hamacas'])){
  $hamacas = "si";
}else{
  $hamacas = "no";
}

if(isset($_POST['jardines'])){
  $jardines = "si";
}else{
  $jardines = "no";
}

if(isset($_POST['celaduria'])){
  $celaduria = "si";
}else{
  $celaduria = "no";
}

if(isset($_POST['camaras'])){
  $camaras = "si";
}else{
  $camaras = "no";
}

if(isset($_POST['alarma'])){
  $alarma = "si";
}else{
  $alarma = "no";
}

if(isset($_POST['parasoles'])){
  $parasoles = "si";
}else{
  $parasoles = "no";
}

if(isset($_POST['kiosko'])){
  $kiosko = "si";
}else{
  $kiosko = "no";
}

if(isset($_POST['terraza'])){
  $terraza = "si";
}else{
  $terraza = "no";
}

if(isset($_POST['rodadero'])){
  $rodadero = "si";
}else{
  $rodadero = "no";
}

if(isset($_POST['jacuzzi'])){
  $jacuzzi = "si";
}else{
  $jacuzzi = "no";
}

if(isset($_POST['zonaVerde'])){
  $zonaVerde = "si";
}else{
  $zonaVerde = "no";
}

if(isset($_POST['sillasAsoleadoras'])){
  $sillasAsoleadoras = "si";
}else{
  $sillasAsoleadoras = "no";
}

if(isset($_POST['piscinaInfantil'])){
  $piscinaInfantil = "si";
}else{
  $piscinaInfantil = "no";
}

if(isset($_POST['menajeCompleto'])){
  $menajeCompleto = "si";
}else{
  $menajeCompleto = "no";
}

if(isset($_POST['microondas'])){
  $microondas = "si";
}else{
  $microondas = "no";
}

if(isset($_POST['licuadora'])){
  $licuadora = "si";
}else{
  $licuadora = "no";
}

if(isset($_POST['nevera'])){
  $nevera = "si";
}else{
  $nevera = "no";
}

if(isset($_POST['toallas'])){
  $toallas = "si";
}else{
  $toallas = "no";
}

if(isset($_POST['tendidos'])){
  $tendidos = "si";
}else{
  $tendidos = "no";
}

if(isset($_POST['blackOut'])){
  $blackOut = "si";
}else{
  $blackOut = "no";
}

if(isset($_POST['closet'])){
  $closet = "si";
}else{
  $closet = "no";
}


//validacion de servicios

if(isset($_POST['servAgua'])){
  $servAgua = "si";
}else{
  $servAgua = "no";
}

if(isset($_POST['servLuz'])){
  $servLuz = "si";
}else{
  $servLuz = "no";
}

if(isset($_POST['servCable'])){
  $servCable = "si";
}else{
  $servCable = "no";
}

if(isset($_POST['servInternet'])){
  $servInternet = "si";
}else{
  $servInternet = "no";
}

if(isset($_POST['servGas'])){
  $servGas = "si";
}else{
  $servGas = "no";
}

if(isset($_POST['servAyudante'])){
  $servAyudante = "si";
}else{
  $servAyudante = "no";
}

//validacion de habitaciones
if(empty($_POST['noHabitaciones'])){
  $noHabitaciones_err = "Porfavor ingresa el numero de parqueaderos de tu finca";
}else{
  if(filter_input(INPUT_POST,'noHabitaciones', FILTER_VALIDATE_INT)){
    $noHabitaciones = filter_var(trim($_POST['noHabitaciones']), FILTER_SANITIZE_NUMBER_INT);
}else{
  $noHabitaciones_err = "Porfavor ingresa un numero sin signos ";
}
}
//validacion de parqueaderos
  if(empty($_POST['noParqueaderos'])){
    $noParqueaderos_err = "Porfavor ingresa el numero de parqueaderos de tu finca";
  }else{
    if(filter_input(INPUT_POST,'noParqueaderos', FILTER_VALIDATE_INT)){
    $noParqueaderos = filter_var(trim($_POST['noParqueaderos']), FILTER_SANITIZE_NUMBER_INT);
  }else{
    $noParqueaderos_err = "Porfavor ingresa un numero sin signos ";
  }
  }

  //validacion de baños
  if(empty($_POST['noBanios'])){
    $noBanios_err = "Porfavor ingresa el numero de parqueaderos de tu finca";
  }else{
    if(filter_input(INPUT_POST,'noBanios', FILTER_VALIDATE_INT)){
    $noBanios = filter_var(trim($_POST['noBanios']), FILTER_SANITIZE_NUMBER_INT);
  }else{
    $noBanios_err = "Porfavor ingresa un numero sin signos ";
  }
  }
//validacion de area
  if(empty($_POST['noArea'])){
    $noArea_err = "Porfavor ingresa el area de tu finca";
  }else{
    if(filter_input(INPUT_POST,'noArea', FILTER_VALIDATE_INT)){
    $noArea = filter_var(trim($_POST['noArea']), FILTER_SANITIZE_NUMBER_INT);
  }else{
    $noArea_err = "Porfavor ingresa un numero sin signos";
  }
  }
  //validaicon precio
  if(empty($_POST['precio'])){
    $precio_err = "Porfavor ingresa el precio normal de una noche para una persona en tu finca";
  }else{
    if(filter_input(INPUT_POST,'precio', FILTER_VALIDATE_INT)){
    $precio = filter_var(trim($_POST['precio']), FILTER_SANITIZE_NUMBER_INT);
  }else{
    $precio_err = "Porfavor ingresa un numero sin signos";
  }
  }
//validacion de costo en temporada
  if(empty($_POST['costoTemp'])){
    $costoTemp_err = "Porfavor ingresa el precio en temporada de una noche para una persona en tu finca";
  }else{
    if(filter_input(INPUT_POST,'costoTemp', FILTER_VALIDATE_INT)){
    $costoTemp = filter_var(trim($_POST['costoTemp']), FILTER_SANITIZE_NUMBER_INT);
  }else{
    $costoTemp_err = "Porfavor ingresa un numero sin signos";
  }
  }
//validacion de cupo
  if(empty($_POST['cupo'])){
    $cupo_err = "Porfavor ingresa la cantidad de maxima de personas que pueden quedarse en tu finca";
  }else{
    if(filter_input(INPUT_POST,'costoTemp', FILTER_VALIDATE_INT)){
    $cupo = filter_var(trim($_POST['cupo']), FILTER_SANITIZE_NUMBER_INT);
  }else{
    $cupo_err = "Porfavor ingresa un numero sin signos";
  }
  }
//validacion de celular
  if(empty($_POST['celular'])){
    $celular_err = "Porfavor ingresa el celular al que se comunicaran tus huespedes";
  }else{
    if(filter_input(INPUT_POST,'costoTemp', FILTER_VALIDATE_INT)){
    $celular = filter_var(trim($_POST['celular']), FILTER_SANITIZE_NUMBER_INT);
  }else{
    $celular_err = "Porfavor ingresa un numero sin signos";
  }
  }

//validacion whatsapp
$whatsapp = $_POST['whatsapp'];

//validacion tipo de Arriendo
$tipoArri = $_POST['tipoArri'];
if(empty($dep_mun_err) && empty($images_err) && empty($noHabitaciones_err) && empty($noParqueaderos_err) && empty($noArea_err) &&
empty($precio_err) && empty($costoTemp_err) && empty($cupo_err) && empty($celular_err)){
    $sql = "UPDATE fincas SET noBanios = ?, tipoArri = ?, dpto = ?, muni = ?, precio = ?, noHabitaciones = ?,noParqueaderos= ?,
     noArea= ?, servAgua = ?, servLuz = ?, servCable = ?,
      servInternet = ?, servAyudante = ?, costoTemp = ?, cupo = ?, celular = ?, whatsapp = ?,
      TVplasma = ?, DirecTV = ?, EquipoDeSonido = ?,Gimnasio = ?,
      BBQ =?, Ventiladores = ?, RodaderoDePiscina = ?, SeAdmitenMascotas = ?, pingPong = ?, parqueInfantil = ?, tenis = ?, micro = ?,
       waterpolo = ?, rana = ?, parques = ?, tejo = ?, billar = ?, hamacas = ?,
      jardines = ?, celaduria = ?, camaras = ?, alarma = ?, parasoles = ?, kiosko = ?, terraza = ?, rodadero = ?,
      jacuzzi = ?,zonaVerde = ?, sillasAsoleadoras = ?, piscinaInfantil = ?, menajeCompleto = ?,
      microondas = ?, licuadora = ?, nevera = ?, toallas = ?,tendidos = ?, blackOut = ?, closet = ?, creacion  = ? WHERE finca_id = $finca_id";

      if(($stmt = mysqli_prepare($fincas_vacacionales, $sql))){
        mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssssssssssssssssssssssssssssssssssssss", $noBanios,
         $tipoArri, $id_departamento, $id_municipio,
        $precio, $noHabitaciones, $noParqueaderos, $noArea, $servAgua, $servLuz, $servCable, $servInternet,
        $servAyudante, $costoTemp, $cupo, $celular, $whatsapp, $TVplasma, $DirecTV, $equipoDeSonido,$gimnasio,
        $BBQ, $ventiladores, $rodaderoDePiscina, $mascotas, $pingPong, $parqueInfantil, $tenis, $micro,
         $waterpolo, $rana, $parques, $tejo, $billar, $hamacas,
        $jardines, $celaduria, $camaras, $alarma, $parasoles, $kiosko, $terraza, $rodadero,
        $jacuzzi,$zonaVerde, $sillasAsoleadoras, $piscinaInfantil, $menajeCompleto,
      $microondas, $licuadora, $nevera, $toallas,$tendidos, $blackOut, $closet, $fecha);

        if(mysqli_stmt_execute($stmt)){

            if(isset($_SESSION['email'])){
            $_SESSION['fecha'] = $fecha;

            echo "<script> window.location = 'index.php'</script>";
            ;
          }
        }else{
        }

      }




}


}

  //
 ?>
