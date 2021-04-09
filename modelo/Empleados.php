<?php
    class Empleados{

        var $idempleado;
        var $nombre;
        var $foto;
        var $hojaVida;
        var $telefono;
        var $email;
        var $direccion;
        var $x;
        var $y;
        var $fkEmple_Jefe;
        var $fkArea;


        function __construct( $idempleado, $nombre, $foto, $hojaVida, $telefono, $email, $direccion, $x, $y, $fkEmple_Jefe,$fkArea){

            $this->idempleado= $idempleado;
            $this->nombre=$nombre;
            $this->foto = $foto;
            $this->hojaVida = $hojaVida;
            $this->telefono = $telefono;
            $this->email = $email;
            $this->direccion = $direccion;
            $this->x = $x;
            $this->y = $y;
            $this->fkEmple_Jefe = $fkEmple_Jefe;
            $this->fkArea = $fkArea;
        }

        function setIdEmpleado($idempleado){
            $this->idempleado= $idempleado;
        }

        function getIdEmpleado (){
            return $this->idempleado;
        }


        function setNombre($nombre){
            $this->nombre = $nombre;
        }

        function getNombre (){
            return $this->nombre;
        }

        
        function setFoto($foto){
            $this->foto = $foto;
        }

        function getFoto (){
            return $this->foto;
        }

        function setHojaVida($hojaVida){
            $this->hojaVida = $hojaVida;
        }

        function getHojaVida (){
            return $this->hojaVida;
        }


        function setTelefono($telefono){
            $this->telefono = $telefono;
        }

        function getTelefono (){
            return $this->telefono;
        }


        function setEmail($email){
            $this->email = $email;
        }

        function getEmail (){
            return $this->email;
        }


        function setDireccion($direccion){
            $this->direccion = $direccion;
        }


        function getDireccion (){
            return $this->direccion;
        }

        function setX($x){
            $this->x = $x;
        }

        function getX (){
            return $this->x;
        }

        function setY($y){
            $this->y = $y;
        }

        function getY (){
            return $this->y;
        }

        function setFkEmple_Jefe($fkEmple_Jefe){
            $this->fkEmple_Jefe = $fkEmple_Jefe;
        }


        function getFkEmple_Jefe (){
            return $this->fkEmple_Jefe;
        }

        function setFkArea($fkArea){
            $this->fkArea = $fkArea;
        }

        function getFkArea (){
            return $this->fkArea;
        }



    }

?>