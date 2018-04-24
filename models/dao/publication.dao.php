<?php

	class PublicationDAO {
		private $db;
		
		public function __construct() {
			$this->db = ConnexionDB::getConnexion();
		}
		
		public function getPublication($publication) {
			return $this->publication;
		}
		
		public function nouvellePublication($publication) {
            $str='INSERT INTO publication VALUES (null,:idEtudiant,:contenu,now(),:nblike,:nbdislike) ';
            $req=$this->db->prepare($str);
            $res=$req=execute(array(
                'idEtudiant'=>$publication->getIdEtudiant(),
                'contenu'=>$publication->getContenu(),
                'nblike'=>$publication->getNblike(),
                'nbdislike'=>$publication->getNbdislke(),
            ));
            if($res){
                return True;
            }
            else{
                return False;
            }	
		}
		public function top10() {
			$pub = [];
			$str = "SELECT * FROM publication ORDER BY nblike DESC LIMIT 10";
			$req = $this->db->prepare($str);
			$req->execute();
			while($v = $req->fetch())
				$pub[]= $v;
			return $pub;
			
		}
		
		public function getAllPublication() {
			$pub=[];
			$str="SELECT  * FROM publication ORDER BY id DESC";
			$req=$this->db->prepare($str);
			$req->execute();
			while($sv=$req->fetch())
				$pub[]=$sv;
			return $pub	;
			
		}
		
		public function like($publication) {
			$str = "UPDATE publication SET nblike = nblike + 1 WHERE id = :id";
			$req = $this->db->prepare($str);
			$res = $req->execute(array(
				'id'=>$publication->getId()
			));
	
			if($res) {
				return True;
			} else {
				return False;
			}
			
		}
		public function dislike($publication) {
			$str = "UPDATE publication SET nbdislike = nbdislike + 1 WHERE id = :id";
			$req = $this->db->prepare($str);
			$res = $req->execute(array(
				'id'=>$publication->getId()
			));
	
			if($res) {
				return True;
			} else {
				return False;
			}
			
		}
	}
?>