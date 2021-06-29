<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "dependencias.php"; ?>
    <link rel="stylesheet" href="css/main.css">
  <title>Login</title>
  
</head>
<body>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->

      <!-- Icon -->
      <div class="fadeIn first">
        <img src="img/1.png" id="icon" alt="User Icon" />
        <h1>Iniciar sección</h1>
      </div>

      <!-- Login Form -->
      <form method ="POST" id="frmLogin"  onsubmit="return Logear()" >
        <input type="text" id="login" class="fadeIn second" name="login" placeholder="username"  required=" ">
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="password"  required=" ">
        <input type="submit" class="fadeIn fourth" value="Entrar">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="registros.php">Registrar</a>
      </div>

    </div>
  </div>
  <script type="text/javascript">
      function Logear(){
          $.ajax({
            method: "POST",
            data: $('#frmLogin').serialize(),
            url: "procesos/Usuario/login/login.php",
            success:function(respuesta){
              
              respuesta= respuesta.trim();
              if(respuesta == 1){
                window.location = "inicio.php"
              }else{
                swal("Fallo la contraseña","error");
          
              }
            }
      
          });
    return false;
  }
  
  </script>



</body>
</html>