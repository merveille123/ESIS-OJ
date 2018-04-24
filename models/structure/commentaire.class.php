<?php
	class Commentaire {
		private $id;
		private $idEtudiant;
		private $idPublication;
		private $contenu;
		private $date;
		private $nblike;
		private $nbdislike;
		
		public function __construct($id, $idEtudiant, $idPublication, $contenu, $date, $nblike, $nbdislike) {
			$this->id = $id;
			$this->idEtudiant = $idEtudiant;
			$this->idPublication = $idPublication;
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
		
		public function getIdPublication() {
			return $this->idPublication;
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