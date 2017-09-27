<?php
	class Tarea{
		private $idTarea;
		private $idProyecto;
		private $Descripcion;
		private $Peso;

		public function __construct() {
			$this->idTarea = "";
			$this->idProyecto= "";
			$this->Descripcion= "";
			$this->Peso=0;
		}

		public function setidTarea($idTarea) {
			$this->idTarea= $idTarea;
		}

		public function getidTarea() {
			return $this->idTarea;
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

		public function setPeso($Peso) {
			$this->Peso= $Peso;
		}

		public function getPeso() {
			return $this->Peso;
		}


		
	}
?>