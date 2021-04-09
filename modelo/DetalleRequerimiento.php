<?php
    class DetalleRequerimiento{

        var $iddetalle;
        var $fecha;
        var $observacion;
        var $fkreq;
        var $fkestado;
        var $fkemple;
        var $fkempleasignado;

        function __construct($iddetalle, $fecha, $observacion, $fkreq, $fkestado, $fkemple, $fkempleasignado){

            $this->iddetalle = $iddetalle;
            $this->fecha = $fecha;
            $this->observacion = $observacion;
            $this->fkreq = $fkreq;
            $this->fkestado = $fkestado;
            $this->fkemple = $fkemple;
            $this->fkempleasignado = $fkempleasignado;
           
        }
        function getIdDetalle (){
            return $this->iddetalle;
        }

        function setIdDetalle($iddetalle){
            $this->iddetalle = $iddetalle;
        }

        function getFecha (){
            return $this->fecha;
        }

        function setFecha($fecha){
            $this->fecha = $fecha;
        }
        function getObservacion (){
            return $this->observacion;
        }

        function setObservacion($observacion){
            $this->observacion = $observacion;
        }

        function getFkReq (){
            return $this->fkreq;
        }

        function setFkReq($fkreq){
            $this->fkreq = $fkreq;
        }

        function getFkEstado (){
            return $this->fkestado;
        }

        function setFkEstado($fkestado){
            $this->fkestado = $fkestado;
        }

        function getFkEmple (){
            return $this->fkemple;
        }

        function setFkEmple($fkemple){
            $this->fkemple = $fkemple;
        }

        function getFkEmpleAsignado (){
            return $this->fkempleasignado;
        }

        function setFkEmpleAsignado($fkempleasignado){
            $this->fkempleasignado = $fkempleasignado;
        }
    }
?>