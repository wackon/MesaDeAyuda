<?php
    class Cargos{

        var $idCargo;
        var $nombre;
        

        function __construct( $idCargo, $nombre){

            $this->idCargo = $idCargo;
            $this->nombre = $nombre;
           
        }

        function getIdCargo (){
            return $this->idCargo;
        }

        function setIdCargo($idCargo){
            $this->idCargo = $idCargo;
        }

        function getNombre (){
            return $this->nombre;
        }

        function setNombre($nombre){
            $this->nombre = $nombre;
        }

    }
?>