
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

	include '../modelo/Areas.php';
	include '../control/ControlAreas.php';
	include '../control/ControlConexion.php';

	$ida = $_POST["txtIdArea"];
	$nom = $_POST["txtNombreArea"];
	$fke = $_POST["txtFkEmple"];
	$bot = $_POST["btn"];
	$mensaje = "Mensaje informativo";

	switch ($bot) {
		case 'guardar':
		if(strlen(trim($nom)) == 0){
			$mensaje = "No se puede registrar un área sin nombre.";
			break;
		}
		if(strlen(trim($fke)) == 0){
			$mensaje = "No se puede registrar un área el fkemple.";
			break;
		}
		$objAreas = new Areas($ida, "", "");	
		$objControlAreas = new ControlAreas($objAreas);
		$objAreas = $objControlAreas->Consultar();
		$idr=$objAreas->getIdArea();

		if(strcmp($idr, $ida) == 0){
			$mensaje = "Ya se encuentra registrada un Área con el id que ingresó, id: ".$ida;		
		}else if (strlen(trim($ida)) != 0){
			$objAreas = new Areas($ida, $nom, $fke);
			$objControlAreas = new ControlAreas($objAreas);
			$objControlAreas->guardar();
			$mensaje = "El Área con id: ".$ida." se registró correctamente.";
		}

		break;

		case 'consultar':
		$objAreas = new Areas($ida,"","");
		$objControlAreas = new ControlAreas($objAreas);
		$objAreas = $objControlAreas->consultar();
		$idr=$objAreas->getIdArea();
		

		try{
			if(strlen(trim($idr)) != 0){
				
				$nom=$objAreas->getNombre();
				$fke=$objAreas->getFkEmple();
				$mensaje = "<h4>Datos del Área:</h4>
								<div class='container'>		
									<div class='row'>
											<ul class='list-group'>
												<li class='list-group-item'>Id Área</li>
												<li class='list-group-item'>Nombre Área</li>
												<li class='list-group-item'>FkEmple</li>
											</ul>
											<ul class='list-group'>
												<li class='list-group-item'>".$idr."</li>
												<li class='list-group-item'>".$nom."</li>
												<li class='list-group-item'>".$fke."</li>
											</ul>
									</div>
								</div>";	
			}else{
				$mensaje = "No se encuentra registrada ningún área con el id: ".$ida;
			}
		}catch(Exception $e){
			$mensaje = "No se pudo consultar el área: ".$e->getMessage();
		}

		break;

		case 'modificar':
		$objAreas = new Areas($ida, "", "");
		$objControlAreas = new ControlAreas($objAreas);
		$objAreas = $objControlAreas->Consultar();
		$idr=$objAreas->getIdArea();

		if(strcmp($idr, $ida) == 0){
			if(strlen(trim($nom)) == 0){
				$nom=$objAreas->getNombre();
			}
			if(strlen(trim($fke)) == 0){
				$fke=$objAreas->getFkEmple();
			}
			$objAreas = new Areas($ida, $nom, $fke);
			$objControlAreas = new ControlAreas($objAreas);
			$objControlAreas->Modificar();
			$mensaje = "<h4>Los nuevos datos del Área son:</h4>
			<div class='container'>		
				<div class='row'>
						<ul class='list-group'>
							<li class='list-group-item'>Id Área</li>
							<li class='list-group-item'>Nombre Área</li>
							<li class='list-group-item'>FkRmple</li>
						</ul>
						<ul class='list-group'>
							<li class='list-group-item'>".$ida."</li>
							<li class='list-group-item'>".$nom."</li>
							<li class='list-group-item'>".$fke."</li>
						</ul>
				</div>
			</div>";
		}else{
			$mensaje = "No se encuentra registrada ningún área con el id: ".$ida;
		}

		break;

		case 'borrar':
		$objAreas = new Areas($ida,"","");
		$objControlAreas = new ControlAreas($objAreas);
		$objControlAreas->borrar();
		$mensaje = "<h4>Se eliminó el Área con id: ".$ida."";
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
        <div class="modal-dialog" role="document"> 
          <!-- Modal contenido-->
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Mensaje del sistema</h5>
              <button type="button" class="close" data-dismiss="modal" onclick="window.location.href='areas.html';" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
              <div id="conte-modal">
              	<?php echo $mensaje ?>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="window.location.href='areas.html';" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>

</body>

</html>