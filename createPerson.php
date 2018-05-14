<?php require_once('./public/view/layout.php');
 ?>

<div class="container-fluid">       
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1" style="margin-top: 20px">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h1 class="panel-title" style="color: black">Pagos PSE</h1>
                </div>
                <div class="panel-body">
                    <button type="submit" class="fv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
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
                                Al diligenciar el formulario dale clic al botón "Registrar" y listo, podrás empezar a realizar tus pagos con PSE y disfrutar sus beneficios.</h2>
                            <div class="col-xs-12 col-md-12 col-centered box-content">
                                <div class="list-person">
                                    <div class="col-xs-12 col-sm-6 col-sm-offset-3 nopadding">
                                        <div class="col-xs-6 left nopadding">
                                            <label>
                                                <input type="radio" onclick="habilitarFormulario(this.value)" name="person_option"
                                                    <?php 
                                                    if(isset($_POST['tipoPersona'])){ 
                                                        if($_POST['tipoPersona'] == 0){ ?>
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
                                                <input type="radio" onclick="habilitarFormulario(this.value)" name="person_option"
                                                <?php
                                                if(isset($_POST['tiposPersona'])){ 
                                                    if($_POST['tipoPersona'] == 1){ 
                                                    ?>
                                                 checked="checked"
                                                    <?php }} ?> value=1 >
                                                <span><i class="fa fa-building-o"></i></span>
                                                <p>
                                                    Persona juridica</p>
                                            </label>
                                        </div>
                                    </div>
                                </div>                               
                                <div class="clear">
                                </div>
                                <div class="row" id="personaForm" hidden>
                                    <form method="post" action="database/servicios.php?id=0">
                                        <div class="row">
                                            <hr style="width: 80%">
                                            <div class="col-md-5 col-md-offset-1 col-xs-12">                          
                                                <div class="form-group">
                                                    <label class="label-form">Tipo de identificación</label>
                                                     <select id="ddTipoIdentificacion" class="form-control" data-toggle="tooltip" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="El campo Tipo de Identificación es requerido" title="SELECCIONE UNA OPCIÓN:" data-original-title="Selecciona el tipo de identificación de la lista" name="tipoDocumento" required>
                                                        <option value="CC">Cedula de ciudadania</option>
                                                        <option value="CE">Cedula de extranjeria</option>
                                                        <option value="TI">Tarjeta de identidad</option>
                                                        <option value="PPN">Pasaporte</option>
                                                        <option value="SSN">Documento de identificacion extranjero</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-xs-12">
                                                <div class="form-group">
                                                    <label class="label-form">Número de identificación</label>
                                                    <input class="form-control" placeholder="Número de identificación" type="text" name="numIdenti" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">                                            
                                            <hr style="width: 80%">
                                            <div class="col-md-5 col-md-offset-1 col-xs-12">
                                                <div class="form-group">
                                                    <label class="label-form">Nombres</label>
                                                    <input class="form-control" placeholder="Nombres" type="text" name="nombres" required>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-xs-12">
                                                <div class="form-group">
                                                    <label class="label-form">Apellidos</label>
                                                    <input class="form-control" placeholder="Apellidos" type="text" name="apellidos" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">                                            
                                            <hr style="width: 80%">
                                            <div class="col-md-5 col-md-offset-1 col-xs-12">
                                                <div class="form-group">
                                                    <label class="label-form">Número de celular</label>
                                                    <input class="form-control" placeholder="Número de celular" type="number" name="celular" required>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-xs-12">
                                                <div class="form-group">
                                                    <label class="label-form">Dirección</label>
                                                    <input class="form-control" placeholder="Dirección de residencia o trabajo" type="text" name="direccion" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">                                            
                                            <hr style="width: 80%">
                                            <div class="col-md-5 col-md-offset-1 col-xs-12">
                                                <div class="form-group">
                                                    <label class="label-form">E-mail</label>
                                                    <input class="form-control" placeholder="E-mail" type="email" name="email" required>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-xs-12">
                                                <div class="form-group">
                                                    <label class="label-form">Confirmar e-mail</label>
                                                    <input class="form-control" placeholder="Confirmar e-mail" type="email" name="confirmE" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <hr style="width: 80%">
                                            <div class="col-md-5 col-md-offset-1 col-xs-12">                          
                                                <div class="form-group">
                                                    <label class="label-form">Pregunta secreta</label>
                                                    <select id="ddPregunta1" class="form-control" data-toggle="tooltip" data-placement="top" title="" data-fv-notempty="true" data-fv-notempty-message="El campo pregunta desafío 1 es requerido" data-original-title="Selecciona una de las preguntas de seguridad disponibles. Las preguntas de seguridad son utilizadas para actualizar o eliminar tu registro" aria-describedby="tooltip168129" name="idPregunta" required>
                                                        <option value="16">¿Colegio en el cual obtuvo su título de bachiller?</option><option value="17">¿Cuál es el nombre de su abuelo o su abuela?</option>
                                                        <option value="18">¿Nombre de la empresa donde tuvo su primer empleo?</option><option value="19">¿Colegio o universidad de la cual se graduó su pareja?</option>
                                                        <option value="20">¿En qué hospital o clínica nació?</option>
                                                        <option value="21">¿Cuál es la marca de su primer carro?</option>
                                                        <option value="22">¿En qué año se graduó de bachiller?</option>
                                                        <option value="23">¿Municipio o Ciudad donde nació su abuela?</option>
                                                        <option value="24">¿En cuál iglesia se casaron sus padres?</option>
                                                        <option value="25">¿Cuál fue su apodo en el colegio o barrio?</option>
                                                        <option value="26">¿Cuál es el nombre de su primer jefe?</option>
                                                        <option value="27">¿Cuál es el nombre de su mejor amigo(a) de infancia?</option>
                                                        <option value="28">¿Cuál es el regalo que le dieron en la infancia que más recuerda?</option>
                                                        <option value="29">¿Nombre del profesor(a) que más recuerda de su colegio?</option>
                                                        <option value="30">¿Cuál es el nombre del esposo(a) de su hermano(a)?</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-xs-12">
                                                <div class="form-group">
                                                    <label class="label-form">Respuesta</label>
                                                    <input class="form-control" placeholder="Respuesta" type="text" name="respuesta" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <hr style="width: 80%">
                                            <div class="col-xs-12 col-md-8 col-md-offset-2">
                                                    <div id="chkDisclaimer2Div" class="checkbox checkbox-success" data-toggle="tooltip" data-placement="left"  title="" data-original-title="Esta opción te permite recibir información adicional sobre los  servicios de ACH Colombia">     
                                                        <input class="checkbox checkbox-success" id="chkDisclaimer2" name="chkDisclaimer2" type="checkbox" value="" data-toggle="tooltip" data-placement="top" data-original-title="" title="">
                                                        <label for="chkDisclaimer2">
                                                            Quiero mantenerme al día con las novedades de PSE.</label>
                                                    </div>
                                                    <div id="chkDisclaimerDiv" data-toggle="tooltip" data-placement="left" class="checkbox checkbox-success" title="" data-original-title="Debes aceptar los términos, condiciones y el aviso de privacidad para completar el registro">
                                                        <input id="chkDisclaimer" name="chkDisclaimer" type="checkbox" value="" data-toggle="tooltip" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="Debes aceptar los términos, condiciones y el aviso de privacidad para completar el registro." data-fv-field="chkDisclaimer" data-original-title="" title="" required>
                                                        <label for="chkDisclaimer">
                                                            Acepto voluntariamente los términos, condiciones y el aviso de Política de Privacidad
                                                            de ACH Colombia S.A.<a href="#">Ver
                                                                más</a></label>
                                                    </div>
                                            </div>                                            
                                        </div>
                                        <div class="row">
                                            <div class="text-center btns clearfix">
                                                <div class="col-xs-12 col-md-4 col-md-offset-2 text-left">
                                                    <input type="button" id="btnRegresar" formnovalidate="" class="btn btn-primary pull-left" role="button" value="Regresar" onclick="window.location.href='startTransaction.php';">
                                                </div>
                                                <div class="col-xs-12 col-md-4 text-right">
                                                    <input type="submit" id="btnRegistrar" class="btn btn-primary" role="button" value="Registrar" >          
                                                </div>
                                            </div>
                                        </div>                                        
                                    </form>
                                </div>             
                                <div class="row" id="juridicaForm" hidden>                                    
                                    <form method="post" action="database/servicios.php?id=1">
                                        <div class="row">
                                            <hr style="width: 80%">
                                            <div class="col-md-5 col-md-offset-1 col-xs-12">                          
                                                <div class="form-group">
                                                    <label class="label-form">Nit</label>
                                                    <input type="text" name="nit" value="NIT" hidden>
                                                    <input class="form-control" type="text" placeholder="Número de Identificación Tributario" name="nNit" required> 
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-xs-12">
                                                <div class="form-group">
                                                    <label class="label-form">Nombre de la empresa</label>
                                                    <input class="form-control" placeholder="Nombre de la epresa" type="text" name="nEmpresa" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">                                            
                                            <hr style="width: 80%">
                                            <div class="col-md-5 col-md-offset-1 col-xs-12">
                                                <div class="form-group">
                                                    <label class="label-form">Número de celular</label>
                                                    <input class="form-control" placeholder="Número de celular" type="text" name="numEmp" required>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-xs-12">
                                                <div class="form-group">
                                                    <label class="label-form">Dirección</label>
                                                    <input class="form-control" placeholder="Dirección" type="text" name="dirEmp" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">                                            
                                            <hr style="width: 80%">
                                            <div class="col-md-5 col-md-offset-1 col-xs-12">
                                                <div class="form-group">
                                                    <label class="label-form">E-mail</label>
                                                    <input class="form-control" placeholder="E-mail" type="email" name="emailEmp" required>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-xs-12">
                                                <div class="form-group">
                                                    <label class="label-form">Confirmar e-mail</label>
                                                    <input class="form-control" placeholder="Confirmar e-mail" type="text" name="confirmE" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <hr style="width: 80%">
                                            <div class="col-md-5 col-md-offset-1 col-xs-12">                          
                                                <div class="form-group">
                                                    <label class="label-form">Pregunta secreta</label>
                                                    <select id="ddPregunta1" class="form-control" data-toggle="tooltip" data-placement="top" title="" data-fv-notempty="true" data-fv-notempty-message="El campo pregunta desafío 1 es requerido" data-original-title="Selecciona una de las preguntas de seguridad disponibles. Las preguntas de seguridad son utilizadas para actualizar o eliminar tu registro" aria-describedby="tooltip168129" name="idPregunta" required>
                                                        <option value="16">¿Colegio en el cual obtuvo su título de bachiller?</option><option value="17">¿Cuál es el nombre de su abuelo o su abuela?</option>
                                                        <option value="18">¿Nombre de la empresa donde tuvo su primer empleo?</option><option value="19">¿Colegio o universidad de la cual se graduó su pareja?</option>
                                                        <option value="20">¿En qué hospital o clínica nació?</option>
                                                        <option value="21">¿Cuál es la marca de su primer carro?</option>
                                                        <option value="22">¿En qué año se graduó de bachiller?</option>
                                                        <option value="23">¿Municipio o Ciudad donde nació su abuela?</option>
                                                        <option value="24">¿En cuál iglesia se casaron sus padres?</option>
                                                        <option value="25">¿Cuál fue su apodo en el colegio o barrio?</option>
                                                        <option value="26">¿Cuál es el nombre de su primer jefe?</option>
                                                        <option value="27">¿Cuál es el nombre de su mejor amigo(a) de infancia?</option>
                                                        <option value="28">¿Cuál es el regalo que le dieron en la infancia que más recuerda?</option>
                                                        <option value="29">¿Nombre del profesor(a) que más recuerda de su colegio?</option>
                                                        <option value="30">¿Cuál es el nombre del esposo(a) de su hermano(a)?</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-xs-12">
                                                <div class="form-group">
                                                    <label class="label-form">Respuesta</label>
                                                    <input class="form-control" placeholder="Número de identificación" type="text" name="respuesta" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <hr style="width: 80%">
                                            <div class="col-xs-12 col-md-8 col-md-offset-2">
                                                    <div id="chkDisclaimer2Div" class="checkbox checkbox-success" data-toggle="tooltip" data-placement="left"  title="" data-original-title="Esta opción te permite recibir información adicional sobre los  servicios de ACH Colombia">     
                                                        <input class="checkbox checkbox-success" id="chkDisclaimer2" name="chkDisclaimer2" type="checkbox" value="" data-toggle="tooltip" data-placement="top" data-original-title="" title="">
                                                        <label for="chkDisclaimer2">
                                                            Quiero mantenerme al día con las novedades de PSE.</label>
                                                    </div>
                                                    <div id="chkDisclaimerDiv" data-toggle="tooltip" data-placement="left" class="checkbox checkbox-success" title="" data-original-title="Debes aceptar los términos, condiciones y el aviso de privacidad para completar el registro">
                                                        <input id="chkDisclaimer" name="chkDisclaimer" type="checkbox" value="" data-toggle="tooltip" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="Debes aceptar los términos, condiciones y el aviso de privacidad para completar el registro." data-fv-field="chkDisclaimer" data-original-title="" title="" required>
                                                        <label for="chkDisclaimer">
                                                            Acepto voluntariamente los términos, condiciones y el aviso de Política de Privacidad
                                                            de ACH Colombia S.A.<a href="#">Ver
                                                                más</a></label>
                                                    </div>
                                            </div>                                            
                                        </div>
                                        <div class="row">
                                            <div class="text-center btns clearfix">
                                                <div class="col-xs-12 col-md-4 col-md-offset-2 text-left">
                                                    <input type="button" id="btnRegresar" formnovalidate="" class="btn btn-primary pull-left" role="button" value="Regresar" onclick="window.location.href='startTransaction.php';">
                                                </div>
                                                <div class="col-xs-12 col-md-4 text-right">
                                                    <input type="submit" id="btnRegistrar" class="btn btn-primary" role="button" value="Registrar">                
                                                </div>
                                            </div>
                                        </div>                                        
                                    </form>
                                </div>                                
                            </div>  
                        </div>                
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