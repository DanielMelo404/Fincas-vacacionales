<link rel="stylesheet" href="styles/select.css">
<link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Muli:700|Open+Sans|Oswald|Quicksand|Raleway:700|Roboto|Source+Sans+Pro" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<div class="blanco">

</div>

<?php


  $id_departamento = $id_municipio = $cupo = $precio = "";//principal variables that will be passed to the data base

  $ran1 = 0;          //bottom range of prices (both set to minimum and maximun for doing the look of all prices)
  $ran2 = 10000000;   //top range of prices
  $op1 = 0;           //ranges of capacity, same set as the ones before for having all results if requested
  $op2 = 10000000;    //by clicking "Buscar" without selecting any option from the list

  /*------------------------------------------------ PASSING HTML INFO TO PHP VARIABLES  ----------------------------------------------------*/

  if(isset($_POST['precio'])){// for selecting the corresponding range of price from the database

    switch ($_POST['precio']) {
      case 1:
      $ran1 = 20000;
      $ran2 = 30000;
      break;
      case 2:
      $ran1 = 30000;
      $ran2 = 40000;
      break;
      case 3:
      $ran1 = 40000;
      $ran2 = 50000;
      break;
      case 4:
      $ran1 = 50000;
      $ran2 = 60000;
      break;
      case 5:
      $ran1 = 60000;
      $ran2 = 70000;
      break;
      case 6:
      $ran1 = 70000;
      $ran2 = 80000;
      break;

      default:
      break;
    }

  }else{
  }

  if(isset($_POST['capacidad'])){// for selecting the correspondig range of capacity from the database

    switch ($_POST['capacidad']) {
      case 1:
        $op1 = 5;
        $op2 = 10;
        break;

      case 2:
        $op1 = 10;
        $op2 = 20;
        break;

      case 3:
        $op1 = 20;
        $op2 = 30;
        break;

      case 4:
        $op1 = 30;
        $op2 = 40;
        break;

      case 5:
        $op1 = 40;
        $op2 = 50;
        break;

      default:
        // code...
        break;
    }
  }

  if(isset($_POST['id_municipio'])){// for reciving the id of the municipality and puting it on the variable
    $id_municipio = $_POST['id_municipio'];
  }

    if((isset($_POST['id_departamento']))&&($_POST['id_departamento'] != "")){//passing department varaiable to php
      $id_departamento = $_POST['id_departamento'];
      //forming sql staements for extracting houses clasified by department, municipality and the rest
      $sql4 = "SELECT * FROM fincas WHERE dpto = '$id_departamento' && muni='$id_municipio' && precio <= '$ran2' && precio >= '$ran1'  && '$op1' <= cupo && $op2 >= cupo";
      //forming sql staements for extracting houses clasified only by price or capacity or none
    }else{
      $sql4 = "SELECT * FROM fincas WHERE  precio <= '$ran2' && precio >= '$ran1' && '$op1' <= cupo && $op2 >= cupo";
    }

 ?>


<!--FINCAS LOOKER-->
      <section class="fincasLooker">

        <form class="fincasLooker" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

      <!-- DEPARTMENT SELECT -->

        <div class="fincasLooker neutralPhone">
          <div class="customSelect">
        <select id="id_departamento" name="id_departamento" class="fincasLooker" onchange="populate(this.id, 'municipio')" placeholder="Cualquiera">
          <option value="">Departamento</option>
          <?php
          include('conection.php');
          $sql = "SELECT * FROM departamentos";//php til line 132 is for having the creating of the container list of department options (from the database)
          if($result = mysqli_query($fincas_vacacionales, $sql)){
            if(mysqli_num_rows($result)>1){
            while($row = mysqli_fetch_array($result)){
              ?>
              <option value="<?php echo $row['id_departamento']; ?>"><?php echo $row['departamento']; ?></option>
              <?php
              }
            }
            }
          ?>
        </select>
        </div>
      </div>

      <!-- MUNICIPALITY SELECT -->

        <div class="fincasLooker neutralPhone">
          <div class="customSelect">
              <select class="fincasLooker" id="municipio" name="id_municipio">
                <option value="">Municipio</option>
              </select>
            </div>

              <script>
                function populate (departmentsID, municipalitysID){ //function for populating the municipality select acording to the department chosen
                  var selectDep = document.getElementById(departmentsID);
                  var selectMun = document.getElementById(municipalitysID);
                  selectMun.innerHTML="";

                  <?php
                  $sql = "SELECT * FROM departamentos";
                  if($result = mysqli_query($fincas_vacacionales, $sql)){
                    while($row = mysqli_fetch_array($result)){
                      if(mysqli_num_rows($result)>1){
                        ?>

                        if(selectDep.value == <?php echo '"'.$row['id_departamento'].'"'; ?>){
                          var optionsArr = [

                            <?php //printing all municipalitys from the correspondig department til line 170
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

                  for(var option in optionsArr){//creating the new options from the optionsArr created before
                    var pair = optionsArr[option].split("|");
                    var newOpt = document.createElement("option");
                    newOpt.value = pair[0];
                    newOpt.id = "dpto" + pair[0];
                    newOpt.innerHTML = pair[1];
                    selectMun.options.add(newOpt);
                  }

                }
              </script>
            </div>

      <!-- PRICE SELECT-->

      <div class="fincasLooker neutralPhone">
        <div class="customSelect">

        <select name="precio" class="fincasLooker">
          <option value="null">Precio</option>
          <option value="6">70.000 - 80.000</option>
          <option value="5">60.000 - 70.000</option>
          <option value="4">50.000 - 60.000</option>
          <option value="3">40.000 - 50.000</option>
          <option value="2">30.000 - 40.000</option>
          <option value="1">20.000 - 30.000</option>
        </select>
      </div>
      </div>

      <!-- CAPACITY SELECT-->

      <div class="fincasLooker neutralPhone">
        <div class="customSelect">
        <select name="capacidad" class="fincasLooker">
          <option value="6">Capacidad</option>
          <option value="5">40-50</option>
          <option value="4">30-40</option>
          <option value="3">20-30</option>
          <option value="2">10-20</option>
          <option value="1">5-10</option>
        </select>
      </div>
      </div>

      <input type="submit" value="Buscar"><!-- BUTTON FOR SEARCH -->

</form>
    </section>


    <script src="select.js">
    </script>
