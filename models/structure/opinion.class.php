<?php
    class Opinion{
        private $id;
       private $idCommentaire;
       private $idEtudiant;
       private $opinion;
       public function __construct($id,$idCommentaire,$idEtudiant,$opinion){
           $this->id=$id;
           $this->idCommentaire=$idCommentaire;
           $this->idEtudiant=$idEtudiant;
           $this->opinion=$opinion;
       }
       public function getIdCommentaire(){
           return $this->idCommentaire;
       }
       public function getIdEtudiant(){
           return $this->idEtudiant;
       }
       public function getOpinion(){
           return $this->opinion;
       }
       
    }

    
 ?>