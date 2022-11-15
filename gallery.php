<div class="galleryContainer">

<?php


    if($result4 = mysqli_query($fincas_vacacionales, $sql4)){
      if(mysqli_num_rows($result4) > 0){
        while($row4 = mysqli_fetch_array($result4)){
          ?>
          <div class="item">

              <a href="finca2.php?finca_id=<?php echo $row4['finca_id'] ?>">

                <div class="imagen_item">
                  <img src="<?php echo "images/".$row4['email']."/".$row4['finca_id']."/0.jpg";?>">
                </div>
                <div class="caracteristicas2" style="position: relative;">
                  <p style="">Tipo de Arriendo:  <?php echo $row4['tipoArri'];?></p>
                  <p >Precio: <?php echo $row4['precio'];?>/persona</p>
                  <p style="">Cupo: <?php echo $row4['cupo'];?> personas</p>
                </div>

                <div class="caracteristicas" style="">

                    <ul style="">
                      <?php

                      if($row4['TVplasma']=="si"){
                          echo "<li>TVplasma</li>";
                            }
                      if($row4['DirecTV']=="si"){
                          echo "<li>DirecTV</li>";
                            }
                      if($row4['EquipoDeSonido']=="si"){
                          echo "<li>Equipo de sonido</li>";
                            }
                      if($row4['Gimnasio']=="si"){
                          echo "<li>Gimnasio</li>";
                            }
                      if($row4['BBQ']=="si"){
                          echo "<li>BBQ</li>";
                            }
                      if($row4['Ventiladores']=="si"){
                          echo "<li>Ventiladores</li>";
                            }
                      if($row4['RodaderoDePiscina']=="si"){
                          echo "<li>RodaderoDePiscina</li>";
                            }
                      if($row4['SeAdmitenMascotas']=="si"){
                          echo "<li>Mascotas</li>";
                            }
                      if($row4['pingPong']=="si"){
                          echo "<li>Ping pong</li>";
                            }
                      if($row4['parqueInfantil']=="si"){
                          echo "<li>Parque Infantil</li>";
                            }
                      if($row4['tenis']=="si"){
                          echo "<li>Tennis</li>";
                            }
                      if($row4['micro']=="si"){
                          echo "<li>Cancha de micro</li>";
                            }
                      if($row4['waterpolo']=="si"){
                          echo "<li>Waterpolo</li>";
                            }
                      if($row4['rana']=="si"){
                          echo "<li>Rana</li>";
                            }
                      if($row4['parques']=="si"){
                          echo "<li>Parqués</li>";
                            }
                      if($row4['tejo']=="si"){
                          echo "<li>Tejo</li>";
                            }
                            if($row4['billar']=="si"){
                                echo "<li>Billar</li>";
                                  }
                            if($row4['hamacas']=="si"){
                                echo "<li>Hamacas</li>";
                                  }
                            if($row4['jardines']=="si"){
                                echo "<li>Jardines</li>";
                                  }
                            if($row4['celaduria']=="si"){
                                echo "<li>Celaduria</li>";
                                  }
                            if($row4['camaras']=="si"){
                                echo "<li>Camaras</li>";
                                  }
                            if($row4['alarma']=="si"){
                                echo "<li>Alarma</li>";
                                  }
                            if($row4['parasoles']=="si"){
                                echo "<li>Parasoles</li>";
                                  }
                            if($row4['kiosko']=="si"){
                                echo "<li>Kiosko</li>";
                                  }
                            if($row4['terraza']=="si"){
                                echo "<li>Terraza</li>";
                                  }
                            if($row4['rodadero']=="si"){
                                echo "<li>Rodadero</li>";
                                  }
                            if($row4['jacuzzi']=="si"){
                                echo "<li>Jacuzzi</li>";
                                  }
                            if($row4['zonaVerde']=="si"){
                                echo "<li>Zona verde</li>";
                                  }
                            if($row4['sillasAsoleadoras']=="si"){
                                echo "<li>Sillas asoleadoras</li>";
                                  }
                            if($row4['piscinaInfantil']=="si"){
                                echo "<li>Piscina infantil</li>";
                                  }
                            if($row4['menajeCompleto']=="si"){
                                echo "<li>Menaje completo</li>";
                                  }
                            if($row4['microondas']=="si"){
                                echo "<li>Microondas</li>";
                                  }
                            if($row4['licuadora']=="si"){
                                echo "<li>Licuadora</li>";
                                  }
                            if($row4['nevera']=="si"){
                                echo "<li>Nevera</li>";
                                  }
                            if($row4['toallas']=="si"){
                                echo "<li>Toallas</li>";
                                  }
                            if($row4['tendidos']=="si"){
                                echo "<li>Tendidos</li>";
                                  }
                            if($row4['blackOut']=="si"){
                                echo "<li>Black out</li>";
                                  }
                            if($row4['closet']=="si"){
                                echo "<li>Closet</li>";
                                  }

                              ?>
                    </ul>
                </div>
</a>
    </div>
<?php
        }


      }
    }

  ?>


</div>
