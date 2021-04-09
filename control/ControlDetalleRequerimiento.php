<?php

/**
 * Para llamar a un método, primero se debe instanciar la clase, es decir, crear un objeto de la clase en php sería  $nombreObjeto = new nombreClase(argumentos del constructor)
 * 
 *Para llamar a un método es: , $nombreObjeto->nombreMetodo(argumentos)
 */
       class ControlDetalleRequerimiento
    {
        var $objDetalleRequerimiento;
    
        function __construct($objDetalleRequerimiento)
        {
            $this->objDetalleRequerimiento = $objDetalleRequerimiento;
        }
    
        function GuardarDetalleRequerimiento()
        {
            $txtreq=$this->objDetalleRequerimiento->getObservacion();
            $fecha=$this->objDetalleRequerimiento->getFecha();
            $fke=$this->objDetalleRequerimiento->getFkEmple();
            $idr=$this->ConsultarUltimoRequerimiento();

            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
            $comandoSql = "insert into detallereq values(0,'".$fecha."','".$txtreq."',".$idr.",'1','".$fke."',null)";
            $sentencia = "insert into detallereq values(0,'".$this->objDetalleRequerimiento->getFecha()."','".$this->objDetalleRequerimiento->getObservacion()."',".$this->objDetalleRequerimiento->getFkReq().",'1','".$this->objDetalleRequerimiento->getFkEmple()."',null)";
            $objControlConexion->ejecutarComandoSql($comandoSql);

            $objControlConexion->cerrarBd(); 
            return $sentencia;
        }

        function Consultar()
        {
            $cod=$this->objDetalleRequerimiento->getIdArea();
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","bdmesa_ayuda");

            $comandoSql = "select * from area where codigo = '".$cod."'";

            $rs = $objControlConexion->ejecutarSelect($comandoSql);
            $registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable registro.
            
            $nom = $registro ["NOMBRE"];
            $fkEm = $registro ["FKEMPLE"];
           

            $this->objDetalleRequerimiento->setNombre($nom);
            $this->objDetalleRequerimiento->setFkEmple($fkEm);
           

            $objControlConexion->cerrarBd();
            return $this->objDetalleRequerimiento;
        }
        function ConsultarUltimoRequerimiento()
        {
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","mesa_ayuda");

            $comandoSql = "select max(idreq) as idreq from requerimiento";
            $rs = $objControlConexion->ejecutarSelect($comandoSql);
            $registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable registro.
            $idr = $registro ["idreq"];
            $objControlConexion->cerrarBd();
            return $idr;
        }
         
        function Modificar()
        {
            $cod=$this->objDetalleRequerimiento->getIdArea();
            $nom=$this->objDetalleRequerimiento->getNombre();
            $fkEm=$this->objDetalleRequerimiento->getFkEmple();
            

            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","bdmesa_ayuda");

            $comandoSql = "update area set nombre = '".$nom."',fkEmple = '".$fkEm."' where codigo = '".$cod."'";

            
            $objControlConexion->ejecutarComandoSql($comandoSql);

            $objControlConexion->cerrarBd();
    
        }

        function Borrar()
        {
            $cod=$this->objDetalleRequerimiento->getIdArea();
            
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","bdmesa_ayuda");

            $comandoSql = "delete from area where codigo= '".$cod."' ";

            
            $objControlConexion->ejecutarComandoSql($comandoSql);

            $objControlConexion->cerrarBd();
    
        }

    }

    
?>