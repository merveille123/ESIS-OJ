<?php

	class CommentaireDAO {
		private $db;
		
		public function __construct() {
			$this->db = ConnexionDB::getConnexion();
		}
		
		public function ajouterCommentaire($commentaire) {
			$req="INSERT INTO commentaire(idEtudiant,idPublication,contenu,date)
					values (:idEt,:idPub,:cont,now())";
			$prepare=$this->db->prepare($req);
			$prepare->execute(array(
				'idEtudiant'  => $commentaire->getIdEtudiant(),
				'idPublication' => $commentaire->getIdPublication(),
				'contenu'  => $commentaire->getContenu()
			));
			if($prepare){
				return true;
			}
			else{
				return false;
			}

			
		}
		
		public function getAllCommentaires($idPublication) {
			$req="SELECT * FROM commentaire where idPublication=:idPublication order by date desc";
			$res=$this->db->prepare($req);
			 $res->execute(array(
				'idPublication'=>$idPublication
			));
			return $res;
			
		}
		
		public function like($idCommentaire,$action) {
			$req="UPDATE commentaire SET nblike=nblike+1 WHERE id =:id";
			if($action=="steal"){
				$req="UPDATE commentaire SET nblike=nblike-1 WHERE id =:id";
			}
			
			$res=$this->db->prepare($req);
			$res->execute(array(
				'id'=>$idCommentaire
			));
			$res->closeCursor();
			
		}
		
		public function dislike($idCommentaire,$action) {
			$req="UPDATE commentaire SET nbdislike=nbdislike+1 WHERE id =:id";
			if($action=="steal"){
				$req="UPDATE commentaire SET nbdislike=nbdislike-1 WHERE id =:id";
			}
			
			$res=$this->db->prepare($req);
			$res->execute(array(
				'id'=>$idCommentaire
			));
			$res->closeCursor();
			
		}
		public function compteCommentaire($idPublication){
			$req="SELECT COUNT(*) FROM commentaire where idPublication=:idPublication";
			$compte=$this->db->prepare($req);
			$compte->execute(array(
				'idPublication'=>$idPublication
			));
			return $compte->fetch()[0];

		}
	}
?>