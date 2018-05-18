<?php

	class PublicationDAO{
		private $db;
		
		public function __construct(){
			$this->db = ConnexionDB::getConnexion();
		}
		
		public function getPublication($publication){
			$str = "SELECT * FROM publication WHERE id = :id";
			$req = $this->db->prepare($str);
			$req->bindValue(':id',$publication->getId(),PDO::PARAM_INT);
			$req->execute();
			$res = $req->fetch();
			return new Publication($res['id'],$res['idEtudiant'],$res['contenu'],$res['date'],$res['nblike'],$res['nbdislike']);
		}
		
		public function nouvellePublication($publication){
			$str = "INSERT INTO publication VALUES(null,:idEtudiant,:contenu,NOW(),0,0)";
			$req = $this->db->prepare($str);
			$req->bindValue(':idEtudiant',$publication->getIdEtudiant(),PDO::PARAM_INT);
			$req->bindValue(':contenu',$publication->getContenu(),PDO::PARAM_STR);
			$req->execute();
		}
		
		public function top10(){
			$str = "SELECT * FROM publication ORDER BY nblike DESC LIMIT 10";
			$req = $this->db->query($str);
			$req->execute();
			$res = $req->fetchAll();
			return $res;
		}
		
		public function getTodayPublication(){
			$str = "SELECT * FROM publication WHERE DATE_FORMAT(date,'%Y-%m-%d') = CURRENT_DATE() ORDER BY date DESC";
			$req = $this->db->query($str);
			$req->execute();
			$res = $req->fetchAll();
			return $res;
		}

		public function getAllPublication(){
			$str = "SELECT * FROM publication ORDER BY date DESC";
			$req = $this->db->query($str);
			$req->execute();
			$res = $req->fetchAll();
			return $res;
		}
		
		public function like($publication){
			$str = "UPDATE publication SET nblike = :nblike WHERE id = :id";
			$req = $this->db->prepare($str);
			$req->bindValue(':nblike',$publication->getNblike()+1,PDO::PARAM_INT);
			$req->bindValue(':id',$publication->getId(),PDO::PARAM_INT);
			$req->execute();
		}
		
		public function dislike($publication){
			$str = "UPDATE publication SET nbdislike = :nbdislike WHERE id = :id";
			$req = $this->db->prepare($str);
			$req->bindValue(':nbdislike',$publication->getNbdislike()+1,PDO::PARAM_INT);
			$req->bindValue(':id',$publication->getId(),PDO::PARAM_INT);
			$req->execute();
		}
	}
?>