<?php   session_start();?>


<!DOCTYPE html>
  <html>
    <head> 
      <title>gallery</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <link rel="stylesheet" type="text/css" href="styles/gallery.css">
      <link rel="stylesheet" type="text/css" href="styles/item.css">
      <link rel="stylesheet" type="text/css" href="styles/header.css">
      <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Muli:700|Open+Sans|Oswald|Quicksand|Raleway:700|Roboto|Source+Sans+Pro" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="styles/select.css">

      <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

      <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>
      <!--HEADER-->
      <?php include 'header.php'; ?>
      <!--FINCAS LOOKER-->
      <?php include 'fincas_looker.php'; ?>
      <!--GALERY-->
      <?php include 'gallery.php' ;?>
    </body>
  </html>
