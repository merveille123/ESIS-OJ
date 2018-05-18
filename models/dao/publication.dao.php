<?php

	class PublicationDAO {
		private $db;
		
		public function __construct() {
			$this->db = ConnexionDB::getConnexion();
		}
		
		public function getPublication($id) 
		{
			$req="SELECT * FROM publication where id=:id";
			$prepare=$this->db->prepare($req);
			$prepare->execute(array( 'id' =>$id));
			$data=$prepare->fetch();
			$publication =new Publication($data['id'],$data['idEtudiant'],$data['contenu'],$data['date'],$data['nblike'],$data['nbdislike']);
			return $publication;

		}
		
		public function nouvellePublication($publication) {


			$req="INSERT INTO publication(id,idEtudiant,contenu,date) values(null,:idEtudiant,:contenu,NOW()) ";
			$prepare= $this->db->prepare($req);
			$prepare->execute(array(
				'idEtudiant'		=>$publication->getIdEtudiant(),
                'contenu'   =>$publication->getContenu(),

			));
			if($req){
				return true;
			}
			else{
				return False;
			}
			
		}
		
		public function top10() {
			$req="SELECT * FROM publication ORDER BY nblike desc LIMIT 10";
			return $this->db->query($req);
		}
		public function toDay(){
			$req="SELECT * FROM publication WHERE DATE(publication.date)=CURDATE() ORDER BY  id desc ";
			return $this->db->query($req);
		}
		
		public function getAllPublication() {
			$req ="SELECT * FROM publication ORDER BY date DESC";
			return $this->db->query($req);
			
		}
		
		public function like($idPublication,$action) {
			$req="UPDATE publication SET nblike=nblike+1 WHERE id =:id";
			if($action=="steal"){
				$req="UPDATE publication SET nblike=nblike-1 WHERE id =:id";
			}
			
			$res=$this->db->prepare($req);
			$res->execute(array(
				'id'=>$idPublication
			));
			$res->closeCursor();
			
		}
		
		public function dislike($idPublication,$action) {
			$req="UPDATE publication SET nbdislike=nbdislike+1 WHERE id =:id";
			if($action=="steal"){
				$req="UPDATE publication SET nbdislike=nbdislike-1 WHERE id =:id";
			}
			$res=$this->db->prepare($req);
			$res->execute(array(
				'idPublication'=>$idPublication
			));
			$res->closeCursor();
		}
		
	}
	 function getPartOfPublication($contenu){
		$demiContenu="";
		$i=0;
		while ($i< strlen($contenu)/2){
		  $demiContenu=$demiContenu.$contenu[$i];
		  $i++;
		}
		return $demiContenu;
	}

?>
