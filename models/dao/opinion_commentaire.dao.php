<?php
   class OpinionCommentaireDao{
    private $db;
    
    public function __construct() {
        $this->db = ConnexionDB::getConnexion();
    }

    public function newOpinion($opinion){
        $req="INSERT INTO OPINiON_commentaire (idCommentaire,idEtudiant,opinion) values(:idCom,:idEt,:op)";
        $prepare=$this->db->prepare($req);
        $prepare->execute(array(
            'idCom'=>$opinion->getIdCommentaire(),
            'idEt' =>$opinion->getIdEtudiant(),
            'op'   =>$opinion->getOpinion()
        ));

    }
    public function CheckExistanceOpinion($opinion){
        $req="SELECT * FROM OPINiON_Commentaire WHERE idCommentaire = :idCom and idEtudiant=:idEt";
        $res=$this->db->prepare($req);
        $res->execute(array(
            'idCom'=>$opinion->getIdCommentaire(),
            'idEt' =>$opinion->getIdEtudiant()
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
    public function ChangeOpinion($opinion,$newOp){
        $req="UPDATE opinion_Commentaire SET opinion=:opinion WHERE idCommentaire =:idCom and idEtudiant=:idEt";
        $res=$this->db->prepare($req);
        $res->execute(array(
            'opinion'   =>$newOp,
            'idCom'     =>$opinion->getIdCommentaire(),
            'idEt'      =>$opinion->getIdEtudiant()
        ));
        $res->closeCursor();
    }
    public function RemoveOpinion($opinion){
    $req="DELETE FROM opinion_Commentaire WHERE idCommentaire =:idCom and idEtudiant=:idEt";
        $res=$this->db->prepare($req);
        $res->execute(array(
            'idCom'     =>$opinion->getIdCommentaire(),
            'idEt'      =>$opinion->getIdEtudiant()
        ));
        $res->closeCursor();
    }
   }
?>
