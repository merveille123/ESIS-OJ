<?php
if(isset($_GET['id'])){
    require_once('../models/dao/connexiondb.class.php');
    require_once('../models/structure/publication.class.php');
    require_once('../models/dao/publication.dao.php');
    $publication_dao = new PublicationDAO();
    $publication = $publication_dao->getPublication(new Publication($_GET['id'], null, null, null, null, null));
    $publication_dao->like($publication);
    header('Location: ../views/suite.php?id='.$publication->getId());
}
elseif(isset($_GET['id'])){
    require_once('../models/dao/connexiondb.class.php');
    require_once('../models/structure/commentaire.class.php');
    require_once('../models/dao/commentaire.dao.php');
    $commentaire_dao = new CommentaireDAO();
    $commentaire = $commentaire_dao->getCommentaire(new Commentaire($_GET['id'], null, null, null, null, null, null));
    $commentaire_dao->like($commentaire);
    header('Location: ../views/suite.php?id='.$commentaire->getIdPublication());
}
else
    header('Location: ../views/all.php');
?>