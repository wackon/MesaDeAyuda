
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Vista Empleados</title>
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
	include '../modelo/Cargos.php';
	include '../control/ControlEmpleados.php';
	include '../control/ControlCargos.php';
	include '../control/ControlConexion.php';

	$ide = $_POST["txtIdEmpleado"];
	$nom = $_POST["txtNombre"];
	$fot = $_POST["txtFoto"];
	$hvi = $_POST["txtHojaVida"];
	$tel = $_POST["txtTelefono"];
/* 	$car = $_POST["txtCargo"]; */
	$ema = $_POST["txtEmail"];
	$dir = $_POST["txtDireccion"];
	$x = $_POST["txtX"];
	$y = $_POST["txtY"];
	$fke = $_POST["txtFkEmple"];
	$fki = $_POST["txtFkIdArea"];
	$bot = $_POST["btn"];
	$mensaje = "Mensaje informativo";

	switch ($bot) {
		case 'guardar':
		$objEmpleados = new Empleados($ide, $nom, $fot, $hvi, $tel, $ema, $dir, $x, $y, $fke, $fki);
		$objControlEmpleados = new ControlEmpleados($objEmpleados);
		$msj=$objControlEmpleados->guardar();
		/*echo '<script type="text/javascript">
			    alert("El Empleado '.$objEmpleados->getNombre().' se registró correctamente");
			    window.location.href="clientes.html";
			    </script>';*/
		$mensaje = "El Empleado ".$nom." se registró correctamente";
		break;

		case 'consultar':
		$objEmpleados = new Empleados($ide,"","","","","","","","","","");
		$objControlEmpleados = new ControlEmpleados($objEmpleados);
		$objEmpleados = $objControlEmpleados->consultar();
		$fkA=$objEmpleados->getFkArea();
		/* echo '<script type="text/javascript">
		alert('.$fkA.');
		window.location.href="Empleados.html";
		</script>'; */
		$idr=$objEmpleados->getIdEmpleado();
	

		try{
			if(strlen(trim($idr)) != 0){

		$nom=$objEmpleados->getNombre();
		$fot=$objEmpleados->getFoto();
		$hvi=$objEmpleados->getHojaVida();
		$tel=$objEmpleados->getTelefono();
		$ema=$objEmpleados->getEmail();
		$dir=$objEmpleados->getDireccion();
		$x=$objEmpleados->getX();
		$y=$objEmpleados->getY();
		$fke=$objEmpleados->getFkEmple_Jefe();
		$fki=$objEmpleados->getFkArea();
				$mensaje = "<h4>Datos del cargo:</h4>
								<div class='container'>		
									<div class='row justify-content-center'>
									<ul  class='list-group'>
										<li class='list-group-item'>Id Empleado</li>
										<li class='list-group-item'>Nombre</li>
										
										<li class='list-group-item'>Foto</li>
										
										<li class='list-group-item'>Hoja de Vida</li>
										
										<li class='list-group-item'>Telefono</li>
										
										<li class='list-group-item'>Email</li>
										
										<li class='list-group-item'>Dirección</li>
										
										<li class='list-group-item'>X</li>
										
										<li class='list-group-item'>Y</li>
										
										<li class='list-group-item'>FKEmpleJefe</li>
										
										<li class='list-group-item'>FkArea</li>

									</ul>
									<ul class='list-group'>
										<li class='list-group-item'>".$ide."</li>
										<li class='list-group-item'>".$nom."</li>
										
										<li class='list-group-item'>".$fot."</li>
										
										<li class='list-group-item'>".$hvi."</li>
										
										<li class='list-group-item'>".$tel."</li>
										
										<li class='list-group-item'>".$ema."</li>
										
										<li class='list-group-item'>".$dir."</li>
										
										<li class='list-group-item'>".$x."</li>
										
										<li class='list-group-item'>".$y."</li>
										
										<li class='list-group-item'>".$fke."</li>
										
										<li class='list-group-item'>".$fki."</li>
											
									</ul>
									</div>
								</div>";	
			}else{
				$mensaje = "No se encuentra registrada ningún área con el id: ".$idc;
			}
		}catch(Exception $e){
			$mensaje = "No se pudo consultar el área: ".$e->getMessage();
		}
			break;

		case 'modificar':
		$objEmpleados = new Empleados($ide, $nom, $fot, $hvi, $tel, $ema, $dir, $x, $y, $fke, $fki);
		$objControlEmpleados = new ControlEmpleados($objEmpleados);
		$objEmpleados = $objControlEmpleados->Consultar();
		$idr=$objEmpleados->getIdEmpleado();
		/* $nom=$objEmpleados->getNombre();
		$fot=$objEmpleados->getFoto();
		$hvi=$objEmpleados->getHojaVida();
		$tel=$objEmpleados->getTelefono();
		$ema=$objEmpleados->getEmail();
		$dir=$objEmpleados->getDireccion();
		$x=$objEmpleados->getX();
		$y=$objEmpleados->getY();
		$fke=$objEmpleados->getFkEmple_Jefe();
		$fki=$objEmpleados->getFkArea(); */

		if(strcmp($idr, $ide) == 0){
		
			if(strlen(trim($nom)) == 0){
				$nom=$objEmpleados->getNombre();
			}
			if(strlen(trim($fot)) == 0){
				$fot=$objEmpleados->getFoto();
			}
			if(strlen(trim($hvi)) == 0){
				$hvi=$objEmpleados->getHojaVida();
			}
			if(strlen(trim($tel)) == 0){
				$tel=$objEmpleados->getTelefono();
			}
			if(strlen(trim($ema)) == 0){
				$ema=$objEmpleados->getEmail();
			}
			if(strlen(trim($dir)) == 0){
				$dir=$objEmpleados->getDireccion();
			}
			if(strlen(trim($x)) == 0){
				$x=$objEmpleados->getX();
			}
			if(strlen(trim($y)) == 0){
				$y=$objEmpleados->getY();
			}
			if(strlen(trim($fke)) == 0){
				$fke=$objEmpleados->getFkEmple_Jefe();
			}
			if(strlen(trim($fki)) == 0){
				$fki=$objEmpleados->getFkArea();
			}
			$objEmpleados = new Empleados($idr, $nom, $fot,$hvi,$tel,$ema,$dir,$x,$y,$fke,$fki);
			$objControlEmpleados = new ControlEmpleados($objEmpleados);
			$objControlEmpleados->Modificar();
			$mensaje = "<h4>Los nuevos datos del Empleado son:</h4>
			<div class='container'>		
				<div class='row'>
						<ul class='list-group'>
							<li class='list-group-item'>Id Área</li>
							<li class='list-group-item'>Nombre Área</li>
							<li class='list-group-item'>Foto</li>
							<li class='list-group-item'>Hoja de Vida</li>
							<li class='list-group-item'>Teléfono</li>
							<li class='list-group-item'>Email</li>
							<li class='list-group-item'>Dirección</li>
							<li class='list-group-item'>X</li>
							<li class='list-group-item'>Y</li>
							<li class='list-group-item'>FkEmple_Jefe</li>
							<li class='list-group-item'>FkArea</li>
						</ul>
						<ul class='list-group'>
							<li class='list-group-item'>".$idr."</li>
							<li class='list-group-item'>".$nom."</li>
							<li class='list-group-item'>".$fot."</li>
							<li class='list-group-item'>".$hvi."</li>
							<li class='list-group-item'>".$tel."</li>
							<li class='list-group-item'>".$ema."</li>
							<li class='list-group-item'>".$dir."</li>
							<li class='list-group-item'>".$x."</li>
							<li class='list-group-item'>".$y."</li>
							<li class='list-group-item'>".$fke."</li>
							<li class='list-group-item'>".$fki."</li>
						</ul>
				</div>
			</div>";
		}else{
			$mensaje = "No se encuentra registrada ningún área con el id: ".$ida;
		}

		break;
			
	/* 	$objControlEmpleados->modificar();
				$mensaje = "<h4>Los nuevos datos del Empleado son:</h4>
								<div class='container'>		
								<div class='row justify-content-center'>
										<ul class='list-group'>
											<li class='list-group-item'>Id Empleado</li>
											<li class='list-group-item'>Nombre</li>
											<li class='list-group-item'>Teléfono</li>
											<li class='list-group-item'>Cargo</li>
											<li class='list-group-item'>Email</li>
											<li class='list-group-item'>Fk Id Área</li>
											<li class='list-group-item'>Fk Emple</li>
										</ul>
										<ul class='list-group'>
											<li class='list-group-item'>".$ide."</li>
											<li class='list-group-item'>".$nom."</li>
											<li class='list-group-item'>".$tel."</li>
											<li class='list-group-item'>".$car."</li>
											<li class='list-group-item'>".$ema."</li>
											<li class='list-group-item'>".$fki."</li>
											<li class='list-group-item'>".$fke."</li>
										</ul>
								</div>
								</div>";
		break; */

		case 'borrar':
		$objEmpleados = new Empleados($ide,"","","","","","");
		$objControlEmpleados = new ControlEmpleados($objEmpleados);
		$objControlEmpleados->borrar();
		$mensaje = "<h4>Se eliminó el Empleado con id: ".$ide."";
		break;
		
		default:
			# code...
			break;
	}
	
	echo "<script type='text/javascript'>
		$(document).ready(function(){
		$('#ModalMensaje').modal('show');
		});
		</script>";
?>

<div class="modal fade" id="ModalMensaje" role="dialog">
        <div class="modal-dialog modal-lg" role="document"> 
          <!-- Modal contenido-->
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Mensaje del sistema</h5>
              <button type="button" class="close" data-dismiss="modal" onclick="window.location.href='empleados.html';" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
              <div id="conte-modal">
              	<?php echo $mensaje ?>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="window.location.href='empleados.html';" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>

</body>

</html>