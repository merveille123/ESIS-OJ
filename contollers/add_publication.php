
<?php
session_start();
require_once('../models/dao/connexiondb.class.php');
require_once('../models/structure/publication.class.php');
require_once('../models/dao/publication.dao.php');
require_once('../models/structure/etudiant.class.php');
require_once('../models/dao/etudiant.dao.php');
if(isset($_POST['contenu'])){
    $matricule = $_SESSION['matricule'];
    $etudiant_dao = new EtudiantDAO();
    $etudiant  = $etudiant_dao->getEtudiant($matricule);

    $id_etudiant = $etudiant->getId();
    $contenu = htmlspecialchars($_POST['contenu']);
    $post  = new Publication(null,$id_etudiant,$contenu,null,0,0);
    
    $publication_dao = new PublicationDAO();
    $publication_dao->nouvellePublication($post);
}
header('Location: ../views/all.php');
?>