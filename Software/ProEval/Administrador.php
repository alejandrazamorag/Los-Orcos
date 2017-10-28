<?php
	class Administrador{
		private $idAdministrador;
		private $Nombre_Admin;
		private $Contrasena_Admin;
		

		public function __construct() {
			$this->idAdministrador="";
			$this->Nombre_Admin = "";
			$this->Contrasena_Admin="";
		}

		public function setidAdministrador($idAdministrador) {
			$this->idAdministrador = $idAdministrador;
		}

		public function getIdAdministrador() {
			return $this->idAdministrador;
		}
		
		public function setNombre_Admin($Nombre_Admin) {
			$this->Nombre_Admin = $Nombre_Admin;
		}

		public function getNombre_Admin() {
			return $this->Nombre_Admin;
		}

		public function setContrasena_Admin($Contrasena_Admin) {
			$this->Contrasena_Admin = $Contrasena_Admin;
		}

		public function getContrasena_Admin() {
			return $this->Contrasena_Admin;
		}
		}
	}
?>