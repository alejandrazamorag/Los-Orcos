<?php
	class usuario{
		private $Nombre;
		private $Contrasena;
		private $idAdministrador;

		public function __construct() {
			$this->Nombre = "";
			$this->Contrasena="";
			$this->idAdministrador="";
		}

		public function setidAdministrador($idAdministrador) {
			$this->idAdministrador = $idAdministrador;
		}

		public function getIdAdministrador() {
			return $this->idAdministrador;
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
		}
	}
?>