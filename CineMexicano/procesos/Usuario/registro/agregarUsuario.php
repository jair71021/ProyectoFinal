<?php

require_once "../../../clases/Usuario.php";
  //print_r($_POST);
$password= sha1( $_POST['password']);

$datos = array (
      'nombre'    =>  $_POST['nombre'], 
      'apaterno'    =>  $_POST['apaterno'],  
      'amaterno'    =>  $_POST['amaterno'],  
      'telefono'    =>  $_POST['telefono'],  
      ' email'    =>  $_POST['email'],  
      'usuario'    =>  $_POST['usuario'],  
      'password'    =>  $password



);

  $usuario = new Usuario();
  echo$usuario->agregarUsuario($datos);

  
?>