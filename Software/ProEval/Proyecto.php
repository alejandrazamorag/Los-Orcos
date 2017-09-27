<?php
	class Proyecto{
		private $Nombre;
		private $idProyecto;
		private $Descripcion;
		private $Fecha_Creacion;
		private $Fecha_Limite;
		public function __construct() {
			$this->idNombre = "";
			$this->idProyecto= "";
			$this->Descripcion= "";
			$this->Fecha_Creacion = "";
			$this->Fecha_Limite = "";
			
		}

		public function setNombre($Nombre) {
			$this->Nombre= $Nombre;
		}

		public function getNombre() {
			return $this->Nombre;
		}

		public function setidProyecto($idProyecto) {
			$this->idProyecto = $idProyecto;
		}

		public function getidProyecto() {
			return $this->idProyecto;
		}

		public function setDescripcion($Descripcion) {
			$this->Descripcion= $Descripcion;
		}

		public function getDescripcion() {
			return $this->Descripcion;
		}

		public function setFechaCreacion($Fecha_Creacion) {
			$this->Fecha_Creacion= $Fecha_Creacion;
		}

		public function getFechaCreacion() {
			return $this->Fecha_Creacion;
		}


		public function setFechaLimite($Fecha_Limite) {
			$this->Fecha_Limite= $Fecha_Limite;
		}

		public function getFechaLimite() {
			return $this->Fecha_Limite;
		}
		
	}
?>