<?php
	class Publication {
		private $id;
		private $idEtudiant;
		private $contenu;
		private $date;
		private $nblike;
		private $nbdislike;
		
		public function __construct($id, $idEtudiant, $contenu, $date, $nblike, $nbdislike) {
			$this->id = $id;
			$this->idEtudiant = $idEtudiant;
			$this->contenu = $contenu;
			$this->date = $date;
			$this->nblike = $nblike;
			$this->nbdislike = $nbdislike;
		}
		
		public function getId() {
			return $this->id;
		}
		
		public function getIdEtudiant() {
			return $this->idEtudiant;
		}
		
		public function getContenu() {
			return $this->contenu;
		}
		
		public function getDate() {
			return $this->date;
		}
		
		public function getNblike() {
			return $this->nblike;
		}
		
		public function getNbdislike() {
			return $this->nbdislike;
		}
	}
?>