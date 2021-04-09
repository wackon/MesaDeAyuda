<?php

/**
 * Para llamar a un método, primero se debe instanciar la clase, es decir, crear un objeto de la clase en php sería  $nombreObjeto = new nombreClase(argumentos del constructor)
 * 
 *Para llamar a un método es: , $nombreObjeto->nombreMetodo(argumentos)
 */
       class ControlRequerimiento
    {
        var $objRequerimiento;
    
        function __construct($objRequerimiento)
        {
            $this->objRequerimiento = $objRequerimiento;
        }
    
        function GuardarRequerimiento()
        {
            $fka=$this->objRequerimiento->getFkArea();
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
            $comandoSql = "insert into requerimiento values(0,'".$fka."')";
            $objControlConexion->ejecutarComandoSql($comandoSql);

            $objControlConexion->cerrarBd(); 
        }

        function Consultar()
        {
            $cod=$this->objRequerimiento->getIdArea();
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","bdmesa_ayuda");

            $comandoSql = "select * from area where codigo = '".$cod."'";

            $rs = $objControlConexion->ejecutarSelect($comandoSql);
            $registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable registro.
            
            $nom = $registro ["NOMBRE"];
            $fkEm = $registro ["FKEMPLE"];
           

            $this->objRequerimiento->setNombre($nom);
            $this->objRequerimiento->setFkEmple($fkEm);
           

            $objControlConexion->cerrarBd();
            return $this->objRequerimiento;
        }
         
        function Modificar()
        {
            $cod=$this->objRequerimiento->getIdArea();
            $nom=$this->objRequerimiento->getNombre();
            $fkEm=$this->objRequerimiento->getFkEmple();
            

            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","bdmesa_ayuda");

            $comandoSql = "update area set nombre = '".$nom."',fkEmple = '".$fkEm."' where codigo = '".$cod."'";

            
            $objControlConexion->ejecutarComandoSql($comandoSql);

            $objControlConexion->cerrarBd();
    
        }

        function Borrar()
        {
            $cod=$this->objRequerimiento->getIdArea();
            
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","bdmesa_ayuda");

            $comandoSql = "delete from area where codigo= '".$cod."' ";

            
            $objControlConexion->ejecutarComandoSql($comandoSql);

            $objControlConexion->cerrarBd();
    
        }
    }

    
?>