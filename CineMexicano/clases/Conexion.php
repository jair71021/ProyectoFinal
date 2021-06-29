<?php 
	
  
	class Conectar {

		public function conexion() {
			$servidor = "localhost";
			$usuario = "root";
			$password = "";
			$bd = "usuario";

			$conexion = mysqli_connect($servidor, $usuario, $password, $bd);

			return $conexion;
		}
	}

?>