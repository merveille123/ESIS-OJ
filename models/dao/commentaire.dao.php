<?php

	class CommentaireDAO {
		private $db;
		
		public function __construct() {
			$this->db = ConnexionDB::getConnexion();
		}
		
		public function ajouterCommentaire($commentaire) {
			
		}
		
		public function getAllCommentaires() {
			
		}
		
		public function like($commentaire) {
			
		}
		
		public function dislike($commentaire) {
			
		}
	}
?>