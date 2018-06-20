
<?php
session_start();
require_once('../models/dao/connexiondb.class.php');
require_once('../models/structure/publication.class.php');
require_once('../models/dao/publication.dao.php');
require_once('../models/structure/etudiant.class.php');
require_once('../models/dao/etudiant.dao.php');
require_once('../models/structure/commentaire.class.php');
require_once('../models/dao/commentaire.dao.php');
if(isset($_POST['idpublication'],$_POST['contenu'])){
    $matricule = $_SESSION['matricule'];
    $etudiant_dao = new EtudiantDAO();
    $etudiant  = $etudiant_dao->getEtudiant($matricule);
    $id_etudiant = $etudiant->getId();
    $id_publication = htmlspecialchars($_POST['idpublication']);
    $contenu = htmlspecialchars($_POST['contenu']);
    $commentaire = new Commentaire(null,$id_etudiant,$id_publication,$contenu,null,0,0);
    $commentaire_dao = new CommentaireDAO();
    $commentaire_dao->ajouterCommentaire($commentaire);
}
header('Location: ../views/suite.php?idpublication='.$id_publication);
?>
