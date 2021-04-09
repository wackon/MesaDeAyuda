
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

	include '../modelo/Requerimiento.php';
	include '../modelo/DetalleRequerimiento.php';
	include '../control/ControlRequerimiento.php';
	include '../control/ControlDetalleRequerimiento.php';
	include '../control/ControlConexion.php';

	$txtr = $_POST["txtRequerimiento"];
	$ide = $_POST["txtIdEmpleado"];
	$area = $_POST["Areas"];
	$mensaje = "Mensaje informativo";
	$otroreq = '';

	$objRequerimiento= new Requerimiento(0,$area);
	$objControlRequerimiento = new ControlRequerimiento($objRequerimiento);
	$objControlRequerimiento->GuardarRequerimiento();
	$fecha = date('Y/m/d H:i:s');
	$objDetalleRequerimiento= new DetalleRequerimiento(0,$fecha, $txtr, 0, "", $ide, null);
	$objControlDetalleRequerimiento = new ControlDetalleRequerimiento($objDetalleRequerimiento);
	
	$idr = $objControlDetalleRequerimiento->GuardarDetalleRequerimiento();
	if($objRequerimiento != null || $objRequerimiento != ""){
		$mensaje = "<h4>SU SOLICITUD CON ID: ".$idr." SE HA REGISTRADO CORRECTAMENTE.<br>Sentencia: ".$idr."</h4>";
		$otroreq = '<a class="btn btn-secondary" href="registrarrequerimiento.html">Registrar Requerimiento</a>';
	}else{
		$mensaje = "ERROR INSERTANDO REQUERIMIENTO";
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
			  <?php echo $otroreq ?>
			</div>
          </div>
        </div>
      </div>
    </div>

</body>

</html>