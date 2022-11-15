<?php

//validacion departamento y municipio
  if(empty($_POST['id_departamento'])||(empty($_POST['id_municipio']))){
    $dep_mun_err = "Porfavor ingresa tu departamento y municipio";
  }else{
    $departamento = $_POST['id_departamento'];
    $municipio = $_POST['id_municipio'];
  }
//validacion imagenes
if(file_exists($_FILES['images']['tmp_name'][0]) || is_uploaded_file($_FILES['images']['tmp_name'][0])){
    $images = $_FILES['images'];
  $long = count($_FILES['images']['name']);
  if($long<8){
    if(!file_exists("images/".$email)){
      mkdir("images/".$email);
    }
    if(!file_exists("images/".$email."/temp/")){
    mkdir("images/".$email."/temp/");
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
        $imageDestination = 'images/'.$email ."/temp/". $imageNameNew;
        move_uploaded_file($imageTempName, $imageDestination);
        $_SESSION['imageExt']=$imageExt;
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
}else{
  $images_err = "Porfavor ingresa almenos una imagen";
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
    $noHabitaciones = filter_var(trim($_POST['noHabitaciones']), FILTER_SANITIZE_NUMBER_INT);
}
//validacion de parqueaderos
  if(empty($_POST['noParqueaderos'])){
    $noParqueaderos_err = "Porfavor ingresa el numero de parqueaderos de tu finca";
  }else{

    $noParqueaderos = filter_var(trim($_POST['noParqueaderos']), FILTER_SANITIZE_NUMBER_INT);

  }

  //validacion de baños
  if(empty($_POST['noBanios'])){
    $noBanios_err = "Porfavor ingresa el numero de parqueaderos de tu finca";
  }else{

    $noBanios = filter_var(trim($_POST['noBanios']), FILTER_SANITIZE_NUMBER_INT);

  }
//validacion de area
  if(empty($_POST['noArea'])){
    $noArea_err = "Porfavor ingresa el area de tu finca";
  }else{
    $noArea = filter_var(trim($_POST['noArea']), FILTER_SANITIZE_NUMBER_INT);

  }
  //validaicon precio
  if(empty($_POST['precio'])){
    $precio_err = "Porfavor ingresa el precio normal de una noche para una persona en tu finca";
  }else{

    $precio = filter_var(trim($_POST['precio']), FILTER_SANITIZE_NUMBER_INT);

  }
//validacion de costo en temporada
  if(empty($_POST['costoTemp'])){
    $costoTemp_err = "Porfavor ingresa el precio en temporada de una noche para una persona en tu finca";
  }else{

    $costoTemp = filter_var(trim($_POST['costoTemp']), FILTER_SANITIZE_NUMBER_INT);

  }
//validacion de cupo
  if(empty($_POST['cupo'])){
    $cupo_err = "Porfavor ingresa la cantidad de maxima de personas que pueden quedarse en tu finca";
  }else{

    $cupo = filter_var(trim($_POST['cupo']), FILTER_SANITIZE_NUMBER_INT);

  }
//validacion de celular
  if(empty($_POST['celular'])){
    $celular_err = "Porfavor ingresa el celular al que se comunicaran tus huespedes";
  }else{
    $celular = filter_var(trim($_POST['celular']), FILTER_SANITIZE_NUMBER_INT);
  }
//agregacion $email

//validacion whatsapp
  $whatsapp = $_POST['whatsapp'];

//validacion tipo de Arriendo
$tipoArri = $_POST['tipoArri'];

 ?>
