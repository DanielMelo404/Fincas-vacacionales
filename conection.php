<?php

  $dbhost ='localhost';
  $dbuser = 'root';
  $dbpassword = 'rooot';
  $db = 'fincas_vacacionales';


$fincas_vacacionales = new mysqli($dbhost,$dbuser,$dbpassword,$db);


/*echo $fincas_vacacionales -> host_info;
echo "<br>";
echo $fincas_vacacionales -> connect_errno;
echo "<br>";*/

if( ($fincas_vacacionales -> connect_errno)>0){
  echo "couldnt conect, bye";
  exit;
}
?>
