<?php
if(isset($_GET['pid'])){
    require_once('../models/dao/connexiondb.class.php');
    require_once('../models/structure/publication.class.php');
    require_once('../models/dao/publication.dao.php');
    $publication_dao = new PublicationDAO();
    $publication = $publication_dao->getPublication(new Publication($_GET['pid'], null, null, null, null, null));
    $publication_dao->dislike($publication);
    header('Location: ../views/suite.php?pid='.$publication->getId());
}
elseif(isset($_GET['cid'])){
    require_once('../models/dao/connexiondb.class.php');
    require_once('../models/structure/commentaire.class.php');
    require_once('../models/dao/commentaire.dao.php');
    $commentaire_dao = new CommentaireDAO();
    $commentaire = $commentaire_dao->getCommentaire(new Commentaire($_GET['cid'], null, null, null, null, null, null));
    $commentaire_dao->dislike($commentaire);
    header('Location: ../views/suite.php?pid='.$commentaire->getIdPublication());
}
else
    header('Location: ../views/all.php');
?>