<?php

/**
 * Para llamar a un método, primero se debe instanciar la clase, es decir, crear un objeto de la clase en php sería  $nombreObjeto = new nombreClase(argumentos del constructor)
 * 
 *Para llamar a un método es: , $nombreObjeto->nombreMetodo(argumentos)
 */
       class ControlEmpleados
    {
        var $objEmpleados;
    
        function __construct($objEmpleados)
        {
            $this->objEmpleados = $objEmpleados;
        }
            // _construct( $idEmpleado, $nombre, $foto, $hojaVida, $telefono, $email, $direccion, $x, $y, $fkEmple_Jefe,$fkArea){
    
        function guardar()
        {
            $ide=$this->objEmpleados->getIdEmpleado();
            $nom=$this->objEmpleados->getNombre();
            $fot=$this->objEmpleados->getFoto();
            $hoV=$this->objEmpleados->getHojaVida();
            $tel=$this->objEmpleados->getTelefono();
            $ema=$this->objEmpleados->getEmail();
            $dir=$this->objEmpleados->getDireccion();
            $x=$this->objEmpleados->getX();
            $y=$this->objEmpleados->getY();
            $fkEm=$this->objEmpleados->getFkEmple_Jefe();
            $fkA=$this->objEmpleados->getFkArea();

            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","mesa_ayuda");

            $comandoSql = "insert into empleado values('".$ide."','".$nom."','".$fot."','".$hoV."','".$tel."','".$ema."','".$dir."',".$x.",".$y.",null,'".$fkA."')";
            $objControlConexion->ejecutarComandoSql($comandoSql);

            $objControlConexion->cerrarBd();
        }

        function Consultar()
        {
            $ide=$this->objEmpleados->getIdEmpleado();
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
            $comandoSql = "select*from empleado where idempleado = '".$ide."'";
            $rs = $objControlConexion->ejecutarSelect($comandoSql);
            $registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable registro

            
            $ide= $registro [0];
            $nom = $registro [1];
            $fot= $registro [2];
            $hoV= $registro [3];
            $tel= $registro [4];
            $ema= $registro [5];
            $dir= $registro [6];
            $x= $registro [7];
            $y= $registro [8];
            $fkEm= $registro [9];
            $fkA= $registro [10];
         
            $this->objEmpleados->setIdEmpleado($ide);
            $this->objEmpleados->setNombre($nom);
            $this->objEmpleados->setFoto($fot);
            $this->objEmpleados->setHojaVida($hoV);
            $this->objEmpleados->setTelefono($tel);
            $this->objEmpleados->setEmail($ema);
            $this->objEmpleados->setDireccion($dir);
            $this->objEmpleados->setX($x);
            $this->objEmpleados->setY($y);
            $this->objEmpleados->setFkEmple_Jefe($fkEm);
            $this->objEmpleados->setFkArea($fkA);
            
                          
            $objControlConexion->cerrarBd();
            return $this->objEmpleados;
        }

        function Modificar()
        {
            $ide=$this->objEmpleados->getIdEmpleado();
            $nom=$this->objEmpleados->getNombre();
            $fot=$this->objEmpleados->getFoto();
            $hoV=$this->objEmpleados->getHojaVida();
            $tel=$this->objEmpleados->getTelefono();
            $ema=$this->objEmpleados->getEmail();
            $dir=$this->objEmpleados->getDireccion();
            $x=$this->objEmpleados->getX();
            $y=$this->objEmpleados->getY();
            $fkEm=$this->objEmpleados->getFkEmple_Jefe();
            $fkA=$this->objEmpleados->getFkArea();
            

            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","mesa_ayuda");

            $comandoSql = "update empleado set nombre = '".$nom."',foto = '".$fot."',hojavida ='".$hoV."', telefono = '".$tel."', email = '".$ema."', direccion = '".$dir."', x = '".$x."', y = '".$y."', fkEmple_jefe = '".$fkEm."', fkArea = '".$fkA."' where idempleado = '".$ide."'";

            
            $objControlConexion->ejecutarComandoSql($comandoSql);

            $objControlConexion->cerrarBd();
    
        }

        function Borrar()
        {
            $ide=$this->objEmpleados->idEmpleado();
            
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","mesa_ayuda");

            $comandoSql = "delete from empleados where codigo= '".$ide."' ";

            
            $objControlConexion->ejecutarComandoSql($comandoSql);

            $objControlConexion->cerrarBd();
    
        }

        function validarlogin(){
            $ide=$this->objEmpleados->getIdEmpleado();
            $ema=$this->objEmpleados->getEmail();
            //$return = "ID EMPLEADO: ".$ide." EMAIL: ".$ema."";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","mesa_ayuda");

            $comandoSql = "select * from empleado where idempleado = '".$ide."' and email = '".$ema."'";

            $rs = $objControlConexion->ejecutarSelect($comandoSql);
            $registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable registro.
            
            $nom = $registro ["NOMBRE"];
            $this->objEmpleados->setNombre($nom);

            $objControlConexion->cerrarBd();
            //ultimoingreso($this->objEmpleados);
            return $this->objEmpleados;
        }

/*         function ultimoingreso(Empleados $objEmpleados){
            $uin = $this->objEmpleados;
            $this->objEmpleados;
        } */
    }

    
?>