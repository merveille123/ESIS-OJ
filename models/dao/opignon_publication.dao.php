<?php
   class OpignonPublicationDAO {
		private $db;
		
		public function __construct() {
			$this->db = ConnexionDB::getConnexion();
        }

        public function newOpignon($opignon){
            $req="INSERT INTO opinion_publication(idPublication,idEtudiant,opinion) values(:idPublication,:idEtudiant,:opignon)";
            $prepare=$this->db->prepare($req);
            $prepare->execute(array(
                'idPublication'=>$opignon->getIdPublication(),
                'idEtudiant' =>$opignon->getIdEtudiant(),
                'opignon'   =>$opignon->getOpignion()
            ));

        }
        public function CheckExistanceOpignon($opignon){
            $req="SELECT * FROM opinion_publication WHERE idPublication = :idPublication and idEtudiant=:idEtudiant";
            $res=$this->db->prepare($req);
            $res->execute(array(
                'idPublication'=>$opignon->getIdPublication(),
                'idEtudiant' =>$opignon->getIdEtudiant()
            ));
            $val=$res->fetch()['opinion'];
            $res->closeCursor();
            if($val=="like"){
                return "like";
            }
            elseif ($val=="dislike"){
                return "dislike";
            }
            return "NoExit";
        }
        public function ChangeOpignon($opignon,$newOp){
            $req="UPDATE opinion_publication SET opinion=:opignon WHERE idPublication =:idPublication and idEtudiant=:idEtudiant";
			$res=$this->db->prepare($req);
			$res->execute(array(
                'opignon'   =>$newOp,
                'idPublication'     =>$opignon->getIdPublication(),
                'idEtudiant'      =>$opignon->getIdEtudiant()
            ));
            $res->closeCursor();
        }
        public function RemoveOpignon($opignon){
        $req="DELETE FROM opinion_publication WHERE idPublication =:idPublication and idEtudiant=:idEtudiant";
			$res=$this->db->prepare($req);
			$res->execute(array(
                'idPublication'     =>$opignon->getIdPublication(),
                'idEtudiant'      =>$opignon->getIdEtudiant()
            ));
            $res->closeCursor();
        }
    }

