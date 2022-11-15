<?php
session_start();
include('conection.php');

$nombre = $apellido = $password = $celular = $email = "";

$nombre_err = $apellido_err = $contraseña_err = $celular_err = $email_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

//
if(($_POST['year']==0)&&($_POST['month']==0)&&($_POST['day']==0)){
  $fecha_err = "Porfavor ingresa tu fecha de nacimiento";
}else{

  $year =  $_POST['year'];
  $month = $_POST['month'];
  $day = $_POST['day'];

  $birth = mktime(0, 0, 0, $day, $month, $year + 18);
  $age = time();
if(time() - $birth<0){
  echo "<script> window.location = 'index.php'</script>";
}


}


//nombre validation
  if(!empty($_POST['nombre'])){
    $nombre = filter_var(trim($_POST['nombre']), FILTER_SANITIZE_STRING);
    if(!filter_var($nombre, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+/")))){
      $nombre_err = "Porfavor ingresa un nombre valido";
    }
  } else{
    $nombre_err = "Porfavor ingresa tu nombre";
  }

//validacion apellido
  if(!empty($_POST['apellido'])){
    $apellido = filter_var(trim($_POST['apellido']), FILTER_SANITIZE_STRING);
    if(!filter_var($apellido, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+/")))){
      $apellido_err = "Porfavor ingresa un apellido valido";
      echo $apellido;
    }
  } else{
    $apellido_err = "Porfavor ingresa algun apellido";
  }

//validacion email
  if(!empty($_POST['email'])){
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $email_err  = "Porfavor ingresa un email valido";
    }else{
      $sql = "SELECT user_id FROM users WHERE email = ?";

      if($stmt = mysqli_prepare($fincas_vacacionales, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $email);
        if(mysqli_stmt_execute($stmt)){
          mysqli_stmt_store_result($stmt);

          if(mysqli_stmt_num_rows($stmt)==1){
            $email_err = "Este email ya ha sido registrado";
          }
        }else{
          echo "No se pudo crear registrar email, intenta mas tarde";
        }
        mysqli_stmt_close($stmt);
      }
    }
  }else{
    $email_err = "Porfavor ingresa un email";
  }

//validacion contraseña
if(!empty($_POST['contraseña'])){

  $password = filter_var(trim($_POST['contraseña']), FILTER_SANITIZE_STRING);

  if(strlen($password) < 6){
    $contraseña_err = "La contraseña debe tener almenos 6 caracteres";
  }else{

  }

} else{
  $contraseña_err = "Porfavor ingresa alguna contraseña";
}

//validacion Celular



//ingreso a la base de datos
if(empty($nombre_err) && empty($apellido_err) && empty($password_err) && empty($celular_err)
&& empty($email_err)){
  $sql = "INSERT INTO users (name, las_name, password, email) VALUES (?,?,?,?)";
echo "loading, please wait..........";
  if($stmt = mysqli_prepare($fincas_vacacionales, $sql)){
    echo "hola";
    mysqli_stmt_bind_param($stmt, "ssss", $nombre, $apellido, $password,$email);
    $password = password_hash($password, PASSWORD_DEFAULT);

    if(mysqli_stmt_execute($stmt)){
      $_SESSION['email'] = $email;
      echo "<script> window.location = 'index.php'</script>";
    }else{
      echo "<script> window.location = 'index.php'</script>";
    }


  }
}


}

?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>login</title>
  <link rel="stylesheet" type="text/css" href="styles/login.css">
</head>

<body>
  <h1>Registro</h1>

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
      <div class="container">

        <div class="forma" style="padding-top: 20px;">
            <p class="p2" >Nombre</p>
            <input class="input2" type="text" name="nombre" value="<?php echo $nombre?>">
        </div>
        <span><?php echo $nombre_err ?></span>

        <div class="forma">
          <p class="p2">Apellido</p>
          <input class="input2" type="text" name="apellido" value="<?php echo $apellido?>">
        </div>
        <span><?php echo $apellido_err ?></span>

        <div class="forma" style="">
            <p class="p2"style="">Contraseña</p>
            <input class="input2" type="text" name="contraseña" style="width: 150px;" value="<?php echo $password?>">
        </div>
        <span><?php echo $contraseña_err ?></span>

        <div class="forma" style="">
          <p class="p2"style="">email</p>
          <input class="input2" type="text" name="email" value="<?php echo $email?>">
        </div>
        <span><?php echo $email_err ?></span>


        <div class="forma" style="">
          <p  class="p2" style="">Fecha de nacimiento: </p>
          <select style="float:right;" name="year">
            <option value="1998">1998</option>
          </select>

          <select style="float:right;" name="month" >
            <option value="06" >06</option>
          </select>

          <select style="float:right;" name="day" >
            <option value="19">19</option>
          </select>
        </div>


    <div class="forma" style="width:80px;">
      <input class="registrar" type="submit" value="Registrar">
    </div>
    <div style="clear:both;"></div>

      </div>
  </form>
</div>
</body>



</html>
