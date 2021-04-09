<?php

/**
 * Para llamar a un método, primero se debe instanciar la clase, es decir, crear un objeto de la clase en php sería  $nombreObjeto = new nombreClase(argumentos del constructor)
 * 
 *Para llamar a un método es: , $nombreObjeto->nombreMetodo(argumentos)
 */
       class ControlCargos
    {
        var $objCargos;
    
        function __construct($objCargos)
        {
            $this->objCargos = $objCargos;
        }
    
        function guardar()
        {
            $idc=$this->objCargos->getIdCargo();
            $nom=$this->objCargos->getNombre();
           
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","mesa_ayuda");

            $comandoSql = "insert into cargo values(".$idc.",'".$nom."')";

            $objControlConexion->ejecutarComandoSql($comandoSql);

            $objControlConexion->cerrarBd();
        }

        function Consultar()
        {
            $idc=$this->objCargos->getIdCargo();
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","mesa_ayuda");

            $comandoSql = "select * from cargo where idcargo = '".$idc."'";

            $rs = $objControlConexion->ejecutarSelect($comandoSql);
            $registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable registro.
            
            if($registro != ""){
                $idc = $registro ["IDCARGO"];
                $nom = $registro ["NOMBRE"];
               
                $this->objCargos->setIdCargo($idc);
                $this->objCargos->setNombre($nom);

            }else{
                $this->objCargos->setIdCargo("");
            }
            $objControlConexion->cerrarBd();
            return $this->objCargos;
        }

        function Modificar()
        {
            $idc=$this->objCargos->getIdCargo();
            $nom=$this->objCargos->getNombre();
                        

            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","mesa_ayuda");

            $comandoSql = "update cargo set nombre = '".$nom."' where idcargo = '".$idc."'";

            
            $objControlConexion->ejecutarComandoSql($comandoSql);

            $objControlConexion->cerrarBd();
    
        }

        function Borrar()
        {
            $idc=$this->objCargos->getIdCargo();
            
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","mesa_ayuda");

            $comandoSql = "delete from cargo where idcargo= '".$idc."' ";

            
            $objControlConexion->ejecutarComandoSql($comandoSql);

            $objControlConexion->cerrarBd();
    
        }
    }

    
?>