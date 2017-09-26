<?php
	class usuario{
		private $Nombre;
		private $Contrasena;
		private $idUsuario;
		private $idProyecto;

		public function __construct() {
			$this->Nombre = "";
			$this->Contrasena="";
			$this->idUsuario="";
			$this->idProyecto="";
		}

		public function setidUsuario($idUsuario) {
			$this->idUsuario = $idUsuario;
		}

		public function getIdUsuario() {
			return $this->idUsuario;
		}
		
		public function setNombre($Nombre) {
			$this->Nombre = $Nombre;
		}

		public function getNombre() {
			return $this->Nombre;
		}

		public function setContrasena($Contrasena) {
			$this->Contrasena = $Contrasena;
		}

		public function getContrasena() {
			return $this->Contrasena;
		}

		public function setidProyecto($idProyecto) {
			$this->idProyecto = $idProyecto;
		}

		public function getidProyecto() {
			return $this->idProyecto;
		}
	}
?>