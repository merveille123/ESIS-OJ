<?php
    class Opignon{
       private $id;
       private $idPublication;
       private $idEtudiant;
       private $opignon;
       public function __construct($id,$idPublication,$idEtudiant,$opignon){
           $this->id=$id;
           $this->idPublication=$idPublication;
           $this->idEtudiant=$idEtudiant;
           $this->opignon=$opignon;
       }
       public function getIdPublication(){
           return $this->idPublication;
       }
       public function getIdEtudiant(){
           return $this->idEtudiant;
       }
       public function getOpignion(){
           return $this->opignon;
       }
       
    }
?>