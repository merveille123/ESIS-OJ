<?php
      session_start();
      require_once('../models/structure/etudiant.class.php');
      require_once('../models/structure/publication.class.php');
      require_once('../models/structure/commentaire.class.php');
      require_once('../models/dao/etudiant.dao.php');
      require_once('../models/dao/connexiondb.class.php');
      require_once('../models/dao/publication.dao.php');
      require_once('../models/dao/commentaire.dao.php');
      require_once('../models/structure/opignon.class.php');
      require_once('../models/structure/opinion.class.php');
      require_once('../models/dao/opignon_publication.dao.php');
      require_once('../models/dao/opinion_commentaire.dao.php');
      if(isset($_GET['idPub'],$_GET['pg']) or isset($_GET['idCom'],$_GET['num'])){
                $matricule=$_SESSION['matricule'];
                $opignon="like";
                $etudao=new EtudiantDao();
                $etudiant=$etudao->getEtudiantByMatricule($matricule);
                $idEtudiant=$etudiant->getId();
            if (isset($_GET['idPub'])){
                $page=$_GET['pg'];
                    $idPublication=$_GET['idPub'];
                    $opignon_pub= new Opignon(0,$idPublication,$idEtudiant,$opignon);
                    $opiDao=new OpignonPublicationDAO();
                    $pubDao=new PublicationDAO ();
                    $opignonCourante=$opiDao->CheckExistanceOpignon($opignon_pub);
                    if($opignonCourante=="NoExit"){
                        $opiDao->newOpignon($opignon_pub);
                        $pubDao->like($idPublication,"add");
                    }
                    elseif($opignonCourante==$opignon){
                        $opiDao->RemoveOpignon($opignon_pub);
                        $pubDao->like($idPublication,"steal");
                    }
                    else if($opignonCourante=="dislike"){
                        $opiDao->ChangeOpignon($opignon_pub,"like");
                        $pubDao->like($idPublication,"add");
                        $pubDao->dislike($idPublication,"steal");        
                    }
                    if($page=='suite'){
                        header('Location: ../views/'.$page.'.php?idPub='.$idPublication);
                    }
                    else{
                    header('Location: ../views/'.$page.'.php');}
            }
           
            if(isset($_GET['idCom'],$_GET['num'])){
                $num=$_GET['num'];
                $idCommentaire=$_GET['idCom'];
                $opignon_com= new Opinion(0,$idCommentaire,$idEtudiant,$opignon);
                $opiDao=new OpinionCommentaireDAO();
                $comDao=new CommentaireDao();
                $opignonCourante=$opiDao->CheckExistanceOpinion($opignon_com);
                if($opignonCourante=="NoExit"){
                    $opiDao->newOpinion($opignon_com);
                    $comDao->like($idCommentaire,"add");
                    header('Location: ../views/suite.php?idPub='.$num);
                }
                elseif($opignonCourante==$opignon){
                    $opiDao->RemoveOpinion($opignon_com);
                    $comDao->like($idCommentaire,"steal");
                    header('Location: ../views/suite.php?idPub='.$num);
                }
                else if($opignonCourante=="dislike"){
                    $opiDao->ChangeOpinion($opignon_com,"like");
                    $comDao->like($idCommentaire,"add");
                    $comDao->dislike($idCommentaire,"steal");
                   }
                   header('Location: ../views/suite.php?idPub='.$num);
            }
            else{
                echo "ERREUR DANS LES DATAS";
            }
        }else{
            echo "ERREUR";
        }
?>