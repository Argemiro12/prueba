<?php 
	require_once('./public/view/layout.php');

	require_once('data/Caching.php');	
	error_reporting(E_ERROR | E_PARSE | E_NOTICE);
	$caching = new Caching();
	$banks = $caching->get_content('banks.json',24);
?>
<body>
	<div class="container-fluid" style="margin-top: 20px">
		<div class="col-xs-10 col-xs-offset-1">
			<div class="panel panel-info">
				<div class="panel-heading" style="color:black">
					<h1 class="panel-title">Pagos PSE</h1>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-6">							
							<form method="post" action="startTransaction.php" >
								<?php if(empty($banks)){ ?>
								<div class="alert alert-danger">
								  	<p><strong>¡Error!</strong>No pudimos cargar la lista de bancos, intente de nuevo más tarde.</i></p>
								</div>
								<?php }?>
								<div class="form-group">
									<div class="row">
										<div class="col-xs-12">										
											<label class="form-label">Seleccione el tipo de cuenta con la cual realizará el pago:</label>
										</div>
									</div>									
									<select class="selectpicker" title="SELECIONE UNA OPCIÓN:" name="tipoPersona" required>
										<option value="0">PERSONA</option>
										<option value="1">EMPRESAS</option>
									</select>
								</div>								
								<div class="form-group">
									<div class="row">
										<div class="col-xs-12">										
											<label class="form-label">Seleccione de la lista la entidad financiera con la que desea realizar el pago:</label>
										</div>
									</div>									
									<select class="selectpicker" title="SELECIONE UNA OPCIÓN:" name="bank" data-live-search="true" data-size="8" required>
										<?php for($i = 1; $i<count($banks->getBankListResult->item)-1;$i++){ ?>
											<option value="<?=$banks->getBankListResult->item[$i]->bankCode.'-'.$banks->getBankListResult->item[$i]->bankName ?>"><?= $banks->getBankListResult->item[$i]->bankName ?></option>
										<?php } ?>
									</select>
								</div>								
								<div class="form-group">
									<?php if(!empty($banks)) ?>
									<input class="btn btn-warning" type="submit" name="enviar" value="Continuar">				
								</div>
							</form>			
						</div>
						<div class="col-xs-3 col-xs-offset-1">
							<div class="logo-pse col-xs-12 ">
			                    <img src="public/images/logo-pse.png" alt="PSE - Pagos Seguros en Línea" title="PSE - Pagos Seguros en Línea">
			                </div>
						</div>
					</div>
				</div>
				<div class="panel-footer" style="color: :black">
					<h1 class="panel-title">
						Pagos PSE
					</h1>
				</div>
			</div>
		</div>
	</div>
</body>