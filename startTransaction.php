<?php 
	require_once('./public/view/layout.php');
 ?>

<?php if(isset($_POST['bank'])){ ?>
<div class="container-fluid">		
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1" style="margin-top: 20px">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h1 class="panel-title" style="color: black">Pagos PSE</h1>
				</div>
				<div class="panel-body">
					<form id="formTransaction" role="form" data-fv-framework="bootstrap" novalidate="novalidate" class="fv-form fv-form-bootstrap" method="post">
					    <div id="header">
					        <div class="main">
					            <div class="container nopadding">
					                <div class="logo-pse col-xs-10 col-xs-offset-2">
					                    <img src="public/images/logo-pse.png" alt="PSE - Pagos Seguros en Línea" title="PSE - Pagos Seguros en Línea">
					                    <p>
					                        Fácil, rápido y seguro</p>
					                </div>
					            </div>
					        </div>
					    </div>					    
					    <div class="container-fluid">
					        <h2 class="title text-center">
					            Por favor, selecciona la opción deseada:</h2>
				            <input id="tipoPersona" hidden>
				            <input type="text" name="bank" value="<?= $_POST['bank'] ?>" hidden>
					        <div class="col-xs-12 col-md-12 col-centered box-content">
					            <div class="list-person">
					                <div class="col-xs-12 col-sm-6 col-sm-offset-3 nopadding">					             	
					                    <div class="col-xs-6 left nopadding">					                    					
					                    	<label>
					                            <input class="tipoPersona" type="radio" id="rdUsertype0" onclick="userType0()" name="tipoPersona"
					                            	<?php
					                            	if(isset($_POST['tipoPersona'])){ 
					                            		if($_POST['tipoPersona'] == 0){ 
					                            		?>
					                             checked="checked"
					                             	<?php }} ?> value=0>
					                            <span>
					                                <img src="public/images/icon-user.png"></span>
					                            <p>
					                                Persona natural</p>
					                        </label>
					                    </div>
					                    <div class="col-xs-6 right nopadding">
					                        <label>
					                            <input type="radio" id="rdUsertype1" class="tipoPersona" name="tipoPersona" onclick="userType1();"
					                            <?php 
				                            	if(isset($_POST['tipoPersona'])){
					                            	if($_POST['tipoPersona'] == 1){ ?>
					                             checked="checked"
					                             	<?php }} ?> value=1>
					                            <span><i class="fa fa-building-o"></i></span>
					                            <p>
					                                Persona juridica</p>
					                        </label>
					                    </div>
					                </div>
					            </div>
					            <div class="clear">
					            </div>
					            <div class="list-option">
					                <label>
					                    <input type="radio" id="rdUserRegistered" name="action_person" onclick="crearOContinuar(0);flag = 1;" >
					                    <span><i class="fa fa-check-circle-o"></i>Soy un usuario registrado</span>
					                </label>
					                <label>
					                    <input type="radio" id="rdOptionCreate" name="action_person" onclick="crearOContinuar(1); flag = 0;" >
					                    <span><i class="fa fa-user-plus"></i>Quiero registrarme ahora</span>
					                </label>
					            </div>
					            <div class="clear"></div>
					            <br>
					            <div class="row" id="emailOculto" hidden>
					            	<div class="col-md-6 col-md-offset-3 col-xs-12">					            		
						            	<div class="form-group">
						            		<label>Email</label>
						            		<input class="form-control" type="email" name="email" placeholder="Email registrado en PSE" required id="email" >
						            	</div>
					            	</div>
					            	<div class="col-md-6 col-md-offset-3 col-xs-12" id="divNit" hidden>					            		
						            	<div class="form-group">
						            		<label>NIT</label>
						            		<input class="form-control" type="text" name="nit" placeholder="NIT" required id="nit" >
						            	</div>
					            	</div>
					            </div>
					            <div class="clear">
					            </div>               
					            <div class="row visible-lg visible-md visible-xs">
					                <div class="col-lg-12 col-md-12 col-xs-12">
					                    <div class="text-center btns">
					                        <button type="button" id="btnRegressar" class="btn btn-primary" onclick="window.location.href='index.php';">
					                            Abandonar el pago</button>
					                        <button type="submit" id="btnSeguir" class="btn btn-primary" >
					                            Seguir</button>
					                    </div>
					                </div>
					            </div>					           
					        </div>  
					    </div>
					</form>
				</div>
				<div class="panel-footer">
					<h1 class="panel-title">
						Pagos PSE
					</h1>
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
							  <strong>¡Error!</strong> Debe tener seleccionado al menos un banco, por favor intente de nuevo.
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