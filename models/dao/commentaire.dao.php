<?php
class CommentaireDAO {
	private $db;
	
	public function __construct(){
		$this->db = ConnexionDB::getConnexion();
	}
	
	public function ajouterCommentaire($commentaire){
		$str = "INSERT INTO commentaire VALUES(null,:idEtudiant,:idPublication,:contenu,NOW(),0,0)";
		$req = $this->db->prepare($str);
		$req->bindValue(':idEtudiant',$commentaire->getIdEtudiant(),PDO::PARAM_INT);
		$req->bindValue(':idPublication',$commentaire->getIdPublication(),PDO::PARAM_INT);
		$req->bindValue(':contenu',$commentaire->getContenu(),PDO::PARAM_STR);
		$req->execute();
	}
	
	public function getCommentaire($commentaire){
		$str = "SELECT * FROM commentaire WHERE id = :id";
		$req = $this->db->prepare($str);
		$req->bindValue(':id',$commentaire->getId(),PDO::PARAM_INT);
		$req->execute();
		$res = $req->fetch();
		return new Commentaire($res['id'],$res['idEtudiant'],$res['idPublication'],$res['contenu'],$res['date'],$res['nblike'],$res['nbdislike']);
	}

	public function getAllCommentaires($publication){
		$str = "SELECT * FROM commentaire WHERE id = :id";
		$req = $this->db->prepare($str);
		$req->bindValue(':id',$publication->getId(),PDO::PARAM_INT);
		$req->execute();
		$res = $req->fetchAll();
		return $res;
	}
	
	public function like($commentaire){
		$str = "UPDATE commentaire SET nblike = :nblike WHERE id = :id";
		$req = $this->db->prepare($str);
		$req->bindValue(':nblike',$commentaire->getNbdislike()+1,PDO::PARAM_INT);
		$req->bindValue(':id',$commentaire->getId(),PDO::PARAM_INT);
		$req->execute();
	}
	
	public function dislike($commentaire) {
		$str = "UPDATE commentaire SET nbdislike = :nbdislike WHERE id = :id";
		$req = $this->db->prepare($str);
		$req->bindValue(':nbdislike',$commentaire->getNbdislike()+1,PDO::PARAM_INT);
		$req->bindValue(':id',$commentaire->getId(),PDO::PARAM_INT);
		$req->execute();
	}
}
?>