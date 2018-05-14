<?php 
	require_once('./public/view/layout.php');
	require_once('SOAP/connection.php');
	require_once('database/servicios.php');
	$connection = new connection(); 

  	$createTransaction = $connection->auth(); 
  	date_default_timezone_set('America/Bogota'); 
  	if(isset($_POST['tipoPersona'])){ 
  		if($_POST['tipoPersona'] == 0){
  			$personS = buscarPersona($_POST['email']); 
  		}elseif($_POST['tipoPersona'] == 1){
  			$personS = buscarEmpresa($_POST['email'],$_POST['nit']); 
  		}
  	} 
  	$companyS = buscarPersona("company@mail.com"); 

  	if(!empty($personS) && !empty($companyS) && isset($_POST['bank']) && isset($_POST['tipoPersona'])){ 
  		
  		$person = instanciatePerson($personS,$_POST['email']); 
  		$company = instanciateCompany($companyS); 
	  	$bank = $_POST['bank']; 
	  	$bankArray = explode("-",$bank); 

	  	$PSETransactionRequest = PSETransactionRequest($person,$company,$bankArray,$_POST['tipoPersona']);	  	

	  	$createTransaction['transaction'] = $PSETransactionRequest; 

	  	$transact = $connection->createTransaction($createTransaction); 
	  	if($transact->createTransactionResult->returnCode == "SUCCESS"){ 
	  		$transact2 = crearTransaccion($transact); 	
	  	}
  	}else{
  		echo '<script language="javascript">alert("El correo no está registrado");</script>'; 
  		header("Location: index.php");
  	}	
  	$ticketID = rand(100000,3500000);
?>
<?php if($transact->createTransactionResult->returnCode == "SUCCESS"){ ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-6 col-xs-offset-3" style="margin-top: 20px">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h1 class="panel-title">Pagos PSE</h1>
				</div>
				<div class="panel-body">
					<h1 class="panel-title"><b>Bienvenido al banco de Pruebas</b></h1>
					<hr style="width: 90%">
					<div class="row">
						<div class="col-xs-10 col-xs-offset-1 ">
							<form method="post" action="confirmTransactionPayment.php">
								<div class="form-group">
									<label class="label-form">Transaction ID:</label>
									<p><strong><?= $transact->createTransactionResult->transactionID ?></strong></p>
									<input type="text" name="transactionID" hidden value="<?= $transact->createTransactionResult->transactionID ?>">
								</div>								
								<div class="form-group">
									<label class="label-form">Service Code:</label>
									<p><strong>001</strong></p>
								</div>								
								<div class="form-group">
									<label class="label-form">Amount:</label>
									<p><strong><?=$PSETransactionRequest['totalAmount']?></strong></p>
									<input type="text" name="amount" hidden value="<?= $PSETransactionRequest['totalAmount'] ?>">
								</div>								
								<div class="form-group">
									<label class="label-form">Ticket ID:</label>
									<p><strong><?=$ticketID ?></strong></p>
									<input type="text" name="ticketID" hidden value="<?= $ticketID ?>">
								</div>								
								<div class="form-group">
									<label class="label-form">Solicit Date: </label>
									<p><strong><?= date("d/m/Y")?></strong></p>
									<input type="text" name="solicitDate" hidden value="<?= date("d/m/Y") ?>">
								</div>								
								<div class="form-group">
									<label class="label-form">Cycle Number: </label>
									<p><strong><?= rand(1,20) ?></strong></p>
								</div>								
								<div class="form-group">
									<label class="label-form">User Type: </label>
									<p><strong><?php
										if(isset($_POST['tipoPersona'])){   
											if($_POST['tipoPersona'] == 0){
												echo "Persona";
											}else{
												echo "Jurídica";
											}
										}

									?></strong></p>
								</div>								
								<div class="form-group">
									<label class="label-form">Reference Numbers:</label>
									<p><strong><?=getOriginIP().",".$person['documentType'].",".$person['document'] ?></strong></p>
								</div>								
								<div class="form-group">
									<label class="label-form">VAT Amount: </label>
									<p><strong>0</strong></p>
								</div>								
								<div class="form-group">
									<label class="label-form">Entity Code: </label>
									<p><strong><?= $bankArray[0] ?></strong></p>
									<input type="text" name="entityCode" hidden value="<?=$bankArray[0] ?>">
								</div>								
								<div class="form-group">
									<label class="label-form">Entity Name: </label>
									<p><strong><?= $bankArray[1] ?></strong></p>
								</div>								
								<div class="form-group">
									<label class="label-form">Financial Institute Code: </label>
									<p><strong><?= $bankArray[0] ?></strong></p>
									<input type="text" name="instituteCode" hidden value="<?=$bankArray[0] ?>">
								</div>								
								<div class="form-group">
									<label class="label-form">Payment Description: </label>
									<p><strong>Una compra cualquiera</strong></p>
								</div>	
								<hr style="width: 80%">							
								<div class="row">
									<div class="col-md-10 col-md-offset-2">
										<div class="row">												
											<div class="col-md-12">
												<div class="col-md-4 col-xs-12">
													<label class="label-form">Account Agency</label>
												</div>													
												<div class="col-md-8 col-xs-12"> 
													<input class="form-control" type="text" name="accAgency" >
												</div>		
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<div class="col-md-4 col-xs-12">
														<label class="label-form">Account Number</label>
													</div>													
													<div class="col-md-8 col-xs-12">										
														<input class="form-control" type="text" name="accNumber" >
													</div>
												</div>														
											</div>
										</div>		
										<div class="row">	
											<div class="col-md-12" style="margin-top: 10px;margin-bottom: 10px">
												<div class="form-group">
													<div class="col-xs-4" style="margin-top: 8px">									
														<label class="label-form">Password</label>
													</div>
													<div class="col-xs-8">										
														<input class="form-control" type="password" name="pwd" >
													</div>
												</div>
											</div>	
										</div>																
									</div>									
								</div>
								<div class="row">
									<div class="col-md-10 col-md-offset-2">		
										<div class="row">
											<div class="col-xs-12">		
												<input type="radio" name="call" checked>
												<label>Call ConfirmTransactionPayment</label>		
											</div>
										</div>
									</div>
								</div>
								<hr style="width: 80%;text-align: center;">		
								<div class="row text-center btns">
									<div class="col-md-3">
										<a class="btn btn-default" href="#">Pagar</a>
									</div>
									<div class="col-md-3">
										<a class="btn btn-default" href="index.php">Cancelar</a>
									</div>
									<div class="col-md-3">
										<button class="btn btn-default">Debug</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<h1 class="panel-title">Pagos PSE</h1>
				</div>
			</div>	
		</div>
	</div>	
</div>

<?php }else{ ?>

	<div class="container-fluid">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h1 class="panel-title">Pagos PSE</h1>				
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12">
						<div class="alert alert-info">
							  <strong>¡Error!</strong> <?= $transact->createTransactionResult->responseReasonText ?>
						</div>
						<a class="btn btn-primary" href="index.php">Regresar</a>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<h1 class="panel-title">Pagos PSE</h1>
			</div>
		</div>

	</div>
<?php } ?>