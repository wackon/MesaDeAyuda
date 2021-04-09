<?php
 class Areas{

    var $idArea;
    var $nombre;
    var $fkEmple;
 

    function __construct( $idArea, $nombre, $fkEmple){

        $this->idArea = $idArea;
        $this->nombre = $nombre;
        $this->fkEmple = $fkEmple;
       

    }

    function setIdArea($idArea){
        $this->idArea = $idArea;
    }

    function getIdArea (){
        return $this->idArea;
    }


    function setNombre($nombre){
        $this->nombre = $nombre;
    }

    function getNombre (){
        return $this->nombre;
    }


    function setFkEmple($fkEmple){
        $this->fkEmple = $fkEmple;
    }

    function getFkEmple (){
        return $this->fkEmple;
    }
  
}
?>