<?php 
  $server="localhost";
  $user="root";
  $pass="";
  $basededatos="sgssi";
  $formRegister = "<input id='namere' name='namere' class='fadeIn' placeholder='Name' type='text'><input id='loginre' name='loginre' class='fadeIn' Placeholder='Email' type='text'><input id='passwordre' name='passwordre' class='fadeIn' placeholder='Password' type='text'><input class='fadeIn' value='Register' type='submit'>";
  $formLogin="<input id='login' class='fadeIn' name='login' placeholder='login' type='text'><input id='password' class='fadeIn' name='password' placeholder='password' type='text'><input class='fadeIn' value='Log In' type='submit'>";
  echo '<!DOCTYPE html>
<html>
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
    
    .divElement{
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: -50px;
    margin-left: -50px;
    width: 100px;
    height: 100px;
    
}
  </style>
      <link rel="stylesheet" href="../css/login.css">
    <meta http-equiv="content-type" content="text/html; charset=windows-1252">
    <style>
body {
  background-color: #94E3F5;
  background-size: 100%;
}
</style> </head><body>
    <!--Origen del login: https://codepen.io/danzawadzki/pen/EgqKRr -->
    
    <div class="wrapper fadeInDown">
      <div id="formContent">';

/*

###############      COMIENZO APARTADO 5.2   ###########

#APARTADO 5.2: Usando la función PASSWORD de MySql
if(isset($_POST['login'])){
  #Se realiza login
  #Sacamos lo que hemos obtenido con el 
  $login = $_POST['login'];
  $contrasena = $_POST['password'];

  $link = new mysqli($server, $user, $pass, $basededatos);

  #Notese que usamos la funcion PASSWORD a la hora de hacer la consulta SQL
  $sql = "SELECT * FROM usuarios WHERE login='" . $login . "' AND password=PASSWORD('" . $contrasena. "')";
  $usuario = mysqli_query($link ,$sql);
  if(mysqli_num_rows($usuario) == 0){
    echo '<p style="color:red; font-size:20px; font-weight: bold;">LOGIN INCORRECTO</p>';
  }else{
    $row  = mysqli_fetch_array($usuario);
    echo '<p style="color:green; font-size:20px; font-weight: bold;">Login correcto, '.$row["name"].'</p>';
  }

}else if(isset($_POST['loginre'])){
  #Se realiza registro
  #Sacamos lo que hemos obtenido con el 
  $name = $_POST['namere'];
  $login = $_POST['loginre'];
  $contrasena = $_POST['passwordre'];

  $link = new mysqli($server, $user, $pass, $basededatos);
  
  #Notese que usamos la funcion PASSWORD a la hora de hacer la consulta SQL
  $sql = "INSERT INTO usuarios VALUES('".$name."','".$login."',PASSWORD('".$contrasena."'));";
  mysqli_query($link ,$sql);
  echo '<p style="color:green; font-size:20px; font-weight: bold;">Registro correcto</p>';

#############################################################################################
###########################     FIN APARTADO 5.2     ########################################

*/

/*

######################        COMIENZO APARTADO 5.3   #######################################

#APARTADO 5.3: Usando la función password_hash de PHP
if(isset($_POST['login'])){
  #Se realiza login
  #Sacamos lo que hemos obtenido con el 
  $login = $_POST['login'];
  $contrasena = $_POST['password'];

  $link = new mysqli($server, $user, $pass, $basededatos);
  
  #Elegimos la sal
  $options = [
    'salt' => 'mikel iturria para sgssi en 2021'
];
  $contra_cifrada = password_hash($contrasena,PASSWORD_DEFAULT,$options);

  #Notamos que ahora no usamos la funcion PASSWORD a la hora de hacer la consulta SQL
  $sql = "SELECT * FROM usuarios WHERE login='" . $login . "' AND password='" . $contra_cifrada. "'";
        $usuario = mysqli_query($link ,$sql);
        if(mysqli_num_rows($usuario) == 0){
          echo '<p style="color:red; font-size:20px; font-weight: bold;">LOGIN INCORRECTO</p>';
        }else{
          $row  = mysqli_fetch_array($usuario);
          echo '<p style="color:green; font-size:20px; font-weight: bold;">Login correcto, '.$row["name"].'</p>';
        }

}else if(isset($_POST['loginre'])){
  #Se realiza registro
  #Sacamos lo que hemos obtenido con el 
  $name = $_POST['namere'];
  $login = $_POST['loginre'];
  $contrasena = $_POST['passwordre'];

  $link = new mysqli($server, $user, $pass, $basededatos);
  
  #Elegimos la sal
  $options = [
    'salt' => 'mikel iturria para sgssi en 2021'
];
  $contra_cifrada = password_hash($contrasena,PASSWORD_DEFAULT,$options);

  #Notamos que ahora no usamos la funcion PASSWORD a la hora de hacer la consulta SQL
  $sql = "INSERT INTO usuarios VALUES('".$name."','".$login."','".$contra_cifrada."');";
  mysqli_query($link ,$sql);
  echo '<p style="color:green; font-size:20px; font-weight: bold;">Registro correcto</p>';

#############################################################################################
###########################     FIN APARTADO 5.3     ########################################

 */

/*

######################        COMIENZO APARTADO 5.4   #######################################

#APARTADO 5.4: Usando la función password_hash de PHP con sal aleatoria y verificando con password_verify
if(isset($_POST['login'])){
  #Se realiza login
  #Sacamos lo que hemos obtenido con el 
  $login = $_POST['login'];
  $contrasena = $_POST['password'];

  $link = new mysqli($server, $user, $pass, $basededatos);
  
  #Notamos que ahora no pedimos la contraseña a la hora de hacer la consulta SQL
  $sql = "SELECT * FROM usuarios WHERE login='" . $login . "'";
  $usuario = mysqli_query($link ,$sql);
  $row  = mysqli_fetch_array($usuario);

  #Guardamos la contraseña cifrada que obtenemos de la base de datos
  $contrasenaDB = $row["password"];
  #Será la función password_verify la que compruebe si la contraseña es correcta.
  if(password_verify($contrasena,$contrasenaDB)){
    echo '<p style="color:green; font-size:20px; font-weight: bold;">Login correcto, '.$row["name"].'</p>';
  }else{
    echo '<p style="color:red; font-size:20px; font-weight: bold;">LOGIN INCORRECTO</p>';
  }

}else if(isset($_POST['loginre'])){
  #Se realiza registro
  #Sacamos lo que hemos obtenido con el 
  $name = $_POST['namere'];
  $login = $_POST['loginre'];
  $contrasena = $_POST['passwordre'];

  $link = new mysqli($server, $user, $pass, $basededatos);
  
  #Usamos sal aleatoria
  $contra_cifrada = password_hash($contrasena,PASSWORD_DEFAULT);

  #Notamos que ahora no usamos la funcion PASSWORD a la hora de hacer la consulta SQL
  $sql = "INSERT INTO usuarios VALUES('".$name."','".$login."','".$contra_cifrada."');";
  mysqli_query($link ,$sql);
  echo '<p style="color:green; font-size:20px; font-weight: bold;">Registro correcto</p>';

#############################################################################################
###########################     FIN APARTADO 5.4     ########################################

 */


}else{
echo '
        <!-- Tabs Titles -->
        <h2 class="active" id="lin"> Sign In </h2>
        <h2 class="inactive underlineHover" id="sin">Sign Up </h2>
        <!-- Login Form -->
        <form action="LogIn.php" method="POST" id="formulario">
          <input id="login" class="fadeIn second" name="login" placeholder="login" type="text">
          <input id="password" class="fadeIn third" name="password" placeholder="password" type="text">
          <input class="fadeIn fourth" value="Log In" type="submit">
        </form>
      </div>
    </div>
  <script>
  $(document).ready(function(){
    $("#sin").click(function(){
    let elm = document.getElementById("sin");
      if(elm.className !== "active"){
        $("#formulario").html("'.$formRegister.'");
        $("#lin,#sin").toggleClass("active");
        $("#lin,#sin").toggleClass("inactive underlineHover");
      }
    });
    $("#lin").click(function(){
      let elm = document.getElementById("lin");
      if(elm.className !== "active"){
        $("#formulario").html("'.$formLogin.'");
        $("#lin,#sin").toggleClass("active");
        $("#lin,#sin").toggleClass("inactive underlineHover");
      }
    });
  });

  </script>

  </body>
</html>
';
}
  
?>