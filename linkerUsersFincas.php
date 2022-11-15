<?php
session_start();
include('conection.php');

$email = $_SESSION['email'];
$fecha = $_SESSION['fecha'];
$imageExt = $_SESSION['imageExt'];


$sql = "SELECT finca_id FROM fincas WHERE creacion = '$fecha'";

if($result = mysqli_query($fincas_vacacionales, $sql)){
  if(mysqli_num_rows($result)==1){
    while($row = mysqli_fetch_array($result)){
      $finca_id = $row['finca_id'];
    }
  }
}

mkdir("images/".$email."/".$finca_id);
for($i = 0; $i<7; $i++){
  if(rename("images/".$email."/temp/$i.$imageExt", "images/".$email."/".$finca_id."/$i".".$imageExt")){
  //  echo "hey";
  }
}



$sql = "SELECT user_id FROM users WHERE email = '$email'";

if($result = mysqli_query($fincas_vacacionales, $sql)){
  if(mysqli_num_rows($result)==1){
    while($row = mysqli_fetch_array($result)){
      $user_id = $row['user_id'];
    }
  }
}
echo "hey";

$sql = "INSERT INTO linker_users_fincas (user_id, finca_id) VALUES ('$user_id', '$finca_id')";
if(mysqli_query($fincas_vacacionales, $sql)){
    echo "<script> window.location = 'index.php'</script>";

  }



 ?>
