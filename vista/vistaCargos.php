
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

	include '../modelo/Cargos.php';
	include '../control/ControlCargos.php';
	include '../control/ControlConexion.php';

	$idc = $_POST["txtIdCargo"];
	$nom = $_POST["txtNombreCargo"];
	
	$bot = $_POST["btn"];
	$mensaje = "Mensaje informativo";

	switch ($bot) {
		case 'guardar':
			if(strlen(trim($nom)) == 0){
				$mensaje = "No se puede registrar un cargo sin nombre.";
				break;
			}
				
		$objCargos = new Cargos($idc, "");
		$objControlCargos = new ControlCargos($objCargos);
		$objCargos = $objControlCargos->consultar();
		$idr=$objCargos->getIdCargo();

		if(strcmp($idr, $idc) == 0){
			$mensaje = "Ya se encuentra registrado un cargo con el id que ingresó, id: ".$ida;		
		}else if (strlen(trim($idc)) != 0){
			$objCargos = new Cargos($idc, $nom);
			$objControlCargos = new ControlCargos($objCargos);
			$objControlCargos->guardar();
			$mensaje = "El Cargo con id: ".$idc." se registró correctamente.";
		}

		break;

		case 'consultar':

			
			$objCargos = new Cargos($idc, "");
			$objControlCargos = new ControlCargos($objCargos);
			$objCargos = $objControlCargos->consultar();
			$idr=$objCargos->getIdCargo();
			$nom=$objCargos->getNombre();
	
			try{
				if(strlen(trim($idr)) != 0){
					$mensaje = "<h4>Datos del cargo:</h4>
									<div class='container'>		
										<div class='row'>
												<ul class='list-group'>
													<li class='list-group-item'>Id Cargo</li>
													<li class='list-group-item'>Nombre</li>
												</ul>
												<ul class='list-group'>
													<li class='list-group-item'>".$idr."</li>
													<li class='list-group-item'>".$nom."</li>
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
			$objCargos = new Cargos($idc, "");
			$objControlCargos = new ControlCargos($objCargos);
			$objCargos = $objControlCargos->Consultar();
			$idr=$objCargos->getIdCargo();
			$objControlCargos->modificar();

			if(strcmp($idr, $idc) == 0){
				if(strlen(trim($nom)) == 0){
					$nom=$objCargos->getNombre();
				}
				$objCargos = new Cargos($idc, $nom);
				$objControlCargos = new ControlCargos($objCargos);
				$objControlCargos->Modificar();
				$mensaje = "<h4>Los nuevos datos del Área son:</h4>
				<div class='container'>		
					<div class='row'>
							<ul class='list-group'>
								<li class='list-group-item'>Id Cargo</li>
								<li class='list-group-item'>Nombre</li>
							</ul>
							<ul class='list-group'>
								<li class='list-group-item'>".$idc."</li>
								<li class='list-group-item'>".$nom."</li>
							</ul>
					</div>
				</div>";
			}else{
				$mensaje = "No se encuentra registrada ningún área con el id: ".$ida;
			}
		break;

		case 'borrar':
				$objCargos = new Cargos($idc,"");
				$objControlCargos = new ControlCargos($objCargos);
				$objControlCargos->borrar();
				$mensaje = "<h4>Se eliminó el cargo con id: ".$idc."";
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
              <button type="button" class="close" data-dismiss="modal" onclick="window.location.href='cargos.html';" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
              <div id="conte-modal">
              	<?php echo $mensaje ?>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="window.location.href='cargos.html';" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>

</body>

</html>