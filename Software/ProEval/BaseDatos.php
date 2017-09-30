<?php
	class BD {
		private $servidor;
		private $usuario;
		private $clave;
		private $basededatos;
		private $conexion;

		public function __construct() {
			$this->servidor = "localhost";
			$this->usuario = "root";
			$this->clave = "";
			$this->basededatos = "delphi";
		}

		public function conectar() {
			$this->conexion = mysqli_connect($this->servidor,
				$this->usuario,
				$this->clave,
				$this->basededatos);
		}

		public function desconectar() {
			mysqli_close($this->conexion);
		}

/*		public function guardarUsuario($mUsuario) {

			$consulta = mysqli_query($this->conexion, "insert into  values ('".$mUsuario->getNombre()."','".$mUsuario->getnombre()."',".$mUsuario->getCorreo().",".$mUsuario->getContrasena().","$mUsuario->getTipo().");") or die (mysqli_error($this->conexion));
		}
		*/
	}
?>