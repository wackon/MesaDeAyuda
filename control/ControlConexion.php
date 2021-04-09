<?php

    class ControlConexion
    {
        
        var $conn;
        
        function __construct(){
            $this->conn=null;
        }
        function abrirBd($servidor, $usuario, $password,$db){
            try	{
                $this->conn = new mysqli($servidor, $usuario, $password, $db);
                }
                 catch (Exception $e){
                  echo "ERROR AL CONECTARSE AL SERVIDOR ".$e->getMessage()."\n";
              }
    
        }
    
        function cerrarBd() {
            try{
           $this->conn->close();
            }
              catch (Exception $e){
                  echo "ERROR AL CONECTARSE AL SERVIDOR ".$e->getMessage()."\n";
              }		
        }
    
        function ejecutarComandoSql($sql) {//$sql debe ser insert into , update, delete
            try	{
                $this->conn->query($sql);
                }
            catch (Exception $e) {
                    echo " NO SE AFECTARON LOS REGISTROS: ". $e->getMessage()."\n";
              }	
            }
    
        function ejecutarSelect($sql) {//para usar select
                try	{
                    $recordSet=$this->conn->query($sql);
                    }
        
                catch (Exception $e) {
                        echo " ERROR: ". $e->getMessage()."\n";
                  }	
            return $recordSet; //recordSet es una variable que apunta al encabezado de la tabla resultado de la consulta
                }   
                
    }

?>