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
     if(isset($_GET['idP'],$_GET['pg']) or isset($_GET['idCom'],$_GET['num'])){
                $matricule=$_SESSION['matricule'];
                $opignon="dislike";
                $etudao=new EtudiantDao();
                $etudiant=$etudao->getEtudiantByMatricule($matricule);
                $idEtudiant=$etudiant->getId();
            if (isset($_GET['id'])){
                $page=$_GET['pg'];
                $idPublication=$_GET['id'];
                $opignon_pub= new Opignon(0,$idPublication,$idEtudiant,$opignon);
                $opiDao=new OpignonPublicationDAO();
                $pubDao=new PublicationDAO ();
                $opignonCourante=$opiDao->CheckExistanceOpignon($opignon_pub);
                echo $opignonCourante."sa";
                if($opignonCourante=="NoExit"){
                    $opiDao->newOpignon($opignon_pub);
                    $pubDao->dislike($idPublication,"add");
                }
                elseif($opignonCourante==$opignon){
                    $opiDao->RemoveOpignon($opignon_pub);
                    $pubDao->dislike($idPublication,"steal");
                }
                else if($opignonCourante=="like"){
                    $opiDao->ChangeOpignon($opignon_pub,"dislike");
                    $pubDao->like($idPublication,"steal");
                    $pubDao->dislike($idPublication,"add");
                }
                if($page=='suite'){
                    header('Location: ../views/'.$page.'.php?id='.$idPublication);
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
                    $comDao->dislike($idCommentaire,"add");
                    header('Location: ../views/suite.php?id='.$num);
                }
                elseif($opignonCourante==$opignon){
                    $opiDao->RemoveOpinion($opignon_com);
                    $comDao->dislike( $idCommentaire,"steal");
                    header('Location: ../views/suite.php?id='.$num);
                }
                else if($opignonCourante=="like"){
                    $opiDao->ChangeOpinion($opignon_com,"dislike");
                    $comDao->dislike($idCommentaire,"add");
                    $comDao->like($idCommentaire,"steal");
                }
                header('Location: ../views/suite.php?id='.$num);
            }
        }
        else{
            echo "ERREUR";
        }
?>