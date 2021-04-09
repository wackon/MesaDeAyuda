<?php
 class Requerimiento{

    var $idReq;
    var $fkArea;
 
    function __construct( $idReq, $fkArea){

        $this->idReq = $idReq;
        $this->fkArea = $fkArea;

    }

    function getIdReq (){
        return $this->idReq;
    }

    function setIdReq($idReq){
        $this->idReq = $idReq;
    }

    function getFkArea (){
        return $this->fkArea;
    }

    function setFkArea($fkArea){
        $this->fkArea = $fkArea;
    }
  
}
?>