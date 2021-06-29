<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include "dependencias.php"; ?>
  <link rel="stylesheet" href="css/main.css">
  <title>Registro</title>
</head>
<body>
  <div class="container">
    <h1 style="text-align :center;"> Registro de Usuarios</h1>
    <hr>
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
          <form id="frmRegistro" method="POST" onsubmit="return agregarUsuarioNuevo()">
            <label for="nombre">Nombre de personal</label>
            <input type="text" class="form-control" id="nombre" name="nombre"  required = "" >
            <label for="apaterno">Apellido parterno</label>
            <input type="text" class="form-control" id="apaterno" name="apaterno"  required = "" >
            <label for="amaterno">Apellido materno</label>
            <input type="text" class="form-control" id="amaterno" name="amaterno"   required = "">
            <label for="telefono">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono"  required = "">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email"  required = "">
            <label for="usuario">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario"   required = "">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required = "" >
            <br>
            <div class="row">
              <div class="col-sm-6 text-left">
                <button  class="btn btn-primary" >Registrar</button>
              </div>
              <div class="col-sm-6 text-right">
                <a href="index.php" class="btn btn-warning" data-dismiss="modal" >Login</a>
              </div>
            </div>
            <br>
          </form>
      </div>
      <div class="col-sm-4"></div>
    </div>
  </div>

<script type="text/javascript">
  function agregarUsuarioNuevo(){
    $.ajax({
        method: "POST",
        data: $('#frmRegistro').serialize(),
        url: "procesos/Usuario/registro/agregarUsuario.php",
        success:function(respuesta) {
          //console.log(respuesta);
          respuesta= respuesta.trim();
          if(respuesta == 1){
            $('#frmRegistro')[0].reset();
            swal("Agregado con exito ","Suceess");
          }
          else if(respuesta == 2){
              swal("Este usuario ya existe , por favor escribe otro");
          }
          else{
            swal("Fallo al agregar","error");
          }
        
        }
    });
    return false;
  }
</script>
</body>
</html>
