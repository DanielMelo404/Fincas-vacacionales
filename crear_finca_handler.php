<?php 
$email = $_SESSION['email'];

include 'conection.php';

$municipio = $departamento = $images = $image = $noHabitaciones = $noParqueaderos = $noArea = "";
$servAgua = $servLuz = $noBanios = $servCable = $servInternet = $servGas = $servAyudante = "";

$precio = $costoTemp = $cupo = $celular = $whatsapp = "";

$dep_mun_err = $images_err = $noHabitaciones_err = $noParqueaderos_err = $noArea_err ="";
$precio_err = $costoTemp_err = $cupo_err = $celular_err = $noBanios_err ="";

$fecha = date("Y-m-d-h-i-s");


//--------------------------------------------------------------
if($_SERVER["REQUEST_METHOD"] ==  "POST"){

  include 'crear_finca_validation_pag1.php';
  include 'crear_finca_validation_pag2.php';
  include 'crear_finca_insertar.php';

}
 ?>
