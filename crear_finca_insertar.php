<?php

if(empty($dep_mun_err) && empty($images_err) && empty($noHabitaciones_err) && empty($noParqueaderos_err) && empty($noArea_err) &&
empty($precio_err) && empty($costoTemp_err) && empty($cupo_err) && empty($celular_err)){


    $sql = "INSERT INTO fincas (email, noBanios, tipoArri, dpto, muni, precio, noHabitaciones,noParqueaderos, noArea, servAgua, servLuz, servCable,
      servInternet, servAyudante, costoTemp, cupo, celular, whatsapp, TVplasma, DirecTV, EquipoDeSonido,Gimnasio,
      BBQ, Ventiladores, RodaderoDePiscina, SeAdmitenMascotas, pingPong, parqueInfantil, tenis, micro,
       waterpolo, rana, parques, tejo, billar, hamacas,
      jardines, celaduria, camaras, alarma, parasoles, kiosko, terraza, rodadero,
      jacuzzi,zonaVerde, sillasAsoleadoras, piscinaInfantil, menajeCompleto,
      microondas, licuadora, nevera, toallas,tendidos, blackOut, closet, creacion) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
        ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

      if(($stmt = mysqli_prepare($fincas_vacacionales, $sql))){
        mysqli_stmt_bind_param($stmt, "sssssssssssssssssssssssssssssssssssssssssssssssssssssssss", $email, $noBanios,
         $tipoArri, $departamento, $municipio,
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
            echo "<script> window.location = 'linkerUsersFincas.php';</script>";
            exit();
        }
        }else{
        //  echo "<script> window.location = 'index.php';</script>";
        }

      }




}




 ?>
