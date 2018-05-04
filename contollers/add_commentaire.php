<?php
     //session_start();
     require_once('../views/check_connexion.php'); 
	 require_once('../models/structure/publication.class.php');
	 require_once('../models/dao/connexiondb.class.php');
	 require_once('../models/dao/publication.dao.php');
	 require_once('../models/dao/commentaire.dao.php');
     require_once('../models/structure/commentaire.class.php');
     require_once('../models/dao/etudiant.dao.php');
     require_once('../models/structure/etudiant.class.php');
     
     if(isset($_POST['contenu'] ,$_POST['idPub'])) {
        //public function __construct($id, $idEtudiant, $contenu, $date, $nblike, $nbdislike
            $contenu = $_POST['contenu'];
            $matricule=$_SESSION['matricule'];
            $idPublication=$_POST['idPublication'];
            $etudao=new EtudiantDao();
            $etudiant=$etudao->getEtudiantByMatricule($matricule);
            $idEtudiant=$etudiant->getId();
            $commentaire=new Commentaire(0,$idEtudiant,$idPublication,$contenu,null,0,0);
            $comDao=new commentaireDao();
            $res=$comDao->ajouterCommentaire($commentaire);
    
                if($res) {	
                    header('Location: ../views/suite.php?idPublication='.$idPublication);
                } else {
                    echo"erreur";
                }
        } else {
            echo 'Erreur dans les données envoyées!';
        }
?>
