<?php

require_once "Conexion.php";
  class Usuario extends Conectar{
    
    public function agregarUsuario($datos) {
      $conexion = Conectar::conexion();

      if (self::buscarUsuarioRepetido($datos['usuario'])) {
        return 2;
      }else{

          $sql =" INSERT INTO  t_registro(nombre,
                                          apellidospaterno,
                                          apellidosmaterno,
                                          correo,
                                          telefono,
                                          usuario,
                                          password
                                        )
        
          VALUES( ?, ?, ?, ?, ?, ?, ?)";

          $query =  $conexion -> prepare($sql);
          $query -> bind_param("sssssss", 
                                          $datos[  'nombre'],
                                          $datos['apaterno'],  
                                          $datos['amaterno'],
                                          $datos['telefono'],
                                          $datos[   'email'],
                                          $datos[ 'usuario'],
                                          $datos['password']);


          $exito = $query -> execute ();
          $query-> close();
          return $exito;
        }
      }  
      

    public function buscarUsuarioRepetido( $usuario){
      $conexion = Conectar::conexion();
      $sql ="SELECT  usuario
      FROM t_registro
      WHERE usuario = '$usuario'";
      $result = mysqli_query($conexion,$sql);
      $datos = mysqli_fetch_array($result);

      if ($datos ['usuario'] != "" || $datos['usuario'] == $usuario) {
        return 1;
      }else{
        return 0;
      }
    }

    public function login($usuario, $password){
      $conexion = Conectar::conexion();

        $sql=" SELECT count(*) as existeUsuario FROM t_registro 
        WHERE usuario = '$usuario'  
        AND  password ='$password'";
      $result = mysqli_query($conexion,$sql);
      $repuesta = mysqli_fetch_array($result)['existeUsuario'];

          if ($repuesta > 0) {

            $_SESSION['usuario']=$usuario;

            $sql= "SELECT idusuario FROM t_registro 
            WHERE usuario = '$usuario'  
            AND  password ='$password'";
            $result = mysqli_query($conexion,$sql);
            $idUsuario = mysqli_fetch_array($result)[0];
            $_SESSION ['idUsuario'] = $idUsuario;
            return 1;
          }else {
            return 0;
          }

      }

  }


?>