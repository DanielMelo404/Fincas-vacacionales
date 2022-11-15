<?php
  include('conection.php');
  $password = $email = "";
  $password_err = $email_err = "";

   if($_SERVER['REQUEST_METHOD'] == "POST"){


     if(!empty($_POST['email'])){
       $email = $_POST['email'];

        }else{
     $email_err = "Porfavor ingresa tu email";
   }

    if(!empty($_POST['password'])){
     $password = $_POST['password'];
    }else{
   $password_err = "Porfavor ingresa tu contraseña";
 }

    if(!empty($email) && !empty($password)){
       $sql = "SELECT email, password FROM users WHERE email = ?";

       if($stmt = mysqli_prepare($fincas_vacacionales, $sql)){
         mysqli_stmt_bind_param($stmt,"s", $email);

         if(mysqli_stmt_execute($stmt)){
           mysqli_stmt_store_result($stmt);

           if(mysqli_stmt_num_rows($stmt) ==1){
             mysqli_stmt_bind_result($stmt, $email, $hashed_password);

           if(mysqli_stmt_fetch($stmt)){
             if(password_verify($password, $hashed_password)){
               session_start();
               $_SESSION['email'] = $email;
               echo "<script> window.location = 'misAnuncios.php';</script>";
             }else{
               $password_err = "Contraseña incorrecta";
             }
           }else{
             $email_err = "no account found";
           }
         }else{
            $email_err = "no account found";
         }
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
   <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Muli:700|Open+Sans|Oswald|Quicksand|Raleway:700|Roboto|Source+Sans+Pro" rel="stylesheet">

 </head>

 <body>
   <h1 style="margin: 50px auto 70px auto;">login</h1>

   <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div class="container">

     <div class="forma" style="padding-top: 20px;">
       <p class="p2">E-mail</p>
     <input type="text" name="email" class="input2" value="<?php echo isset($_POST['email']) ? $email : '';?>">
   </div>
   <span><?php echo $email_err;?></span>

   <div class="forma">
     <p class="p2">Contraseña</p>
     <input type="password" name="password" class="input2" value="<?php echo isset($_POST['password']) ? $password : '';?>">
    </div>
    <span><?php echo $password_err;?></span>
<div class="forma" style="width: 80px">
     <input class="registrar" type="submit" name="submit" value="Ingresar" >
   </div>
</div>
   </form>
 </div>
 </body>



 </html>
