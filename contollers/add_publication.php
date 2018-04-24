
<?php
    session_start();
    require_once('../models/structure/etudiant.class.php');
    require_once('../models/structure/publication.class.php');
	require_once('../models/dao/etudiant.dao.php');
	require_once('../models/dao/connexiondb.class.php');
	require_once('../models/dao/publication.dao.php');
	
if(isset($_POST['contenu'])) {
    //public function __construct($id, $idEtudiant, $contenu, $date, $nblike, $nbdislike
		$contenu = $_POST['contenu'];
        $matricule=$_SESSION['matricule'];
        $etudao=new EtudiantDao();
        $etudiant=$etudao->getEtudiantByMatricule($matricule);
        $idEtudiant=$etudiant->getId();
        $publication=new Publication(0,$idEtudiant,$contenu,null,0,0);
        $pubdao=new PublicationDao();
        $res=$pubdao->nouvellePublication($publication);

			if($res) {
				//Créer une session	
				header('Location: ../views/today.php');
			} else {
				//header('Location: ../views/index.php?error=4');
			}
			
		
		
	} else {
		echo 'Erreur dans les données envoyées!';
	}
?>