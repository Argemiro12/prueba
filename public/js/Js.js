function habilitarFormulario(value){ //Esta función es la que permite visualizar los formularios de registro de una persona o una empresa.
	switch(parseInt(value)){
		case 0:
			$('#juridicaForm').attr('hidden',true);
			$('#personaForm').removeAttr('hidden');			
			break;
		case 1:
			$('#personaForm').attr('hidden',true);
			$('#juridicaForm').removeAttr('hidden');
			break;
		default:
			break;
	}
}
function crearOContinuar(value){ // En esta función se valida si se va a crear una nueva persona 
								 // y le asigna la ruta deseada o si ya posee un correo registrado continuar directamente a la transacción.
	switch(parseInt(value)){
		case 0:
			$('#formTransaction').removeAttr('action');
			$('#formTransaction').attr('action','beginTransaction.php');
			$('#emailOculto').removeAttr('hidden');
			$('#email').attr('required',true);	
			if($('input:checked').val() == 1){
				$('#divNit').removeAttr('hidden');
				$('#nit').attr('required',true);				
			}else{				
				$('#divNit').attr('hidden',true);
			}
			$('#email').attr('required',true);
		break;
		case 1:		
			$('#formTransaction').removeAttr('action');
			$('#formTransaction').attr('action','createPerson.php');
			$('#emailOculto').attr('hidden',true);
			$('#email').removeAttr('required');
			$('#divNit').attr('hidden',true);
			$('#nit').removeAttr('required');
		break;
	}
}


function userType0(){
	$('#tipoPersona').attr('value',0);
	if(flag === 1){
		crearOContinuar(0);
	}
}

function userType1(){
	$('#tipoPersona').attr('value',1);
	if(flag === 1){
		crearOContinuar(0);
	}
}