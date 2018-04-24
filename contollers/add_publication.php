<?php

session_start();
require_once('../models/dao/connexiondb.class.php');
require_once('../models/structure/etudiant.class.php');
require_once('../models/dao/etudiant.dao.php');
require_once('../models/structure/publication.class.php');
require_once('../models/dao/publication.dao.php');

if($_POST['contenu']){
    $matricule=$_SESSION['matricule'];
    $etudao=new EtudiantDAO();
    $etudiant=$etudao->public function  getEtudiantByMatricule($matricule);
    $id=$etudiant->$etudiant->getId();
    $publication=new publication(0,$id,$contenu,null,0,0);
    $pubdao=new PublicationDAO();
    $pubdao->nouvellePublication($publication);

    header('Location: ../views/today.php');

}else{
    echo 'Erreur dans les données';
}
?>