
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Vista Areas</title>
	<!--ESTILOS-->
	<link rel="stylesheet" href="../public/css/bootstrap.css" />
	<link rel="stylesheet" href="../public/css/bootstrap-grid.min.css" />
	<link rel="stylesheet" href="../public/css/bootstrap-reboot.min.css" />
	<link rel="stylesheet" href="../public/css/styles.css" />
	<!--ESTILOS-->
	<!--SCRIPTS-->
	<script src="../public/js/jquery-3.5.1.min.js"></script>
	<script src="../public/js/bootstrap.min.js"></script>
	<script src="../public/js/bootstrap.bundle.min.js"></script>
	<!--SCRIPTS-->
</head>

<body>

<?php

	include '../modelo/Empleados.php';
	include '../control/ControlEmpleados.php';
	include '../control/ControlConexion.php';

	$ema = $_POST["txtEmailEmpleado"];
	$ide = $_POST["txIdEmpleado"];
	$mensaje = "Mensaje informativo";
	$registrarrq = '';
	

	$objEmpleados= new Empleados($ide,"","","","",$ema,"",0,0,"","");
	$objControlEmpleados = new ControlEmpleados($objEmpleados);
	$objEmpleados = $objControlEmpleados->validarlogin();
	$nem=$objEmpleados->getNombre();
	
	if($objEmpleados != null || $objEmpleados != ""){
		$mensaje = "<h4>BIENVENIDO SR@ : ".$nem."</h4>";
		$registrarrq = '<a class="btn btn-secondary" href="registrarrequerimiento.html">Registrar Requerimiento</a>';
	}else{
		$mensaje = "RETORNA NULL";
	}

	echo "<script type='text/javascript'>
		$(document).ready(function(){
		$('#ModalMensaje').modal('show');
		});
		</script>";
?>

<div class="modal fade" id="ModalMensaje" role="dialog">
        <div class="modal-dialog" role="document"> 
          <!-- Modal contenido-->
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Mensaje del sistema</h5>
              <button type="button" class="close" data-dismiss="modal" onclick="window.location.href='Login.html';" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
              <div id="conte-modal">
              	<?php echo $mensaje ?>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="window.location.href='Login.html';" data-dismiss="modal">Cerrar</button>
			  <?php echo $registrarrq ?>
			</div>
          </div>
        </div>
      </div>
    </div>

</body>

</html>