<?php
	class Etudiant {
		private $id;
		private $matricule;
		private $pwd;
		
		public function __construct($id, $matricule, $pwd) {
			$this->id = $id;
			$this->matricule = $matricule;
			$this->pwd = $pwd;
		}
		
		public function getId() {
			return $this->id;
		}
		
		public function getMatricule() {
			return $this->matricule;
		}
		
		public function getPwd() {
			return $this->pwd;
		}
	}
?>