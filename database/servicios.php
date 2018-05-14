<?php 

require_once('Database.php'); 
if(isset($_GET['id'])){  
	$id = $_GET['id']; 	
	switch ($id) { 
		case '0':
			crearPersona(); 
			header('Location: ../index.php');
			break;
		case '1':
			crearEmpresa();
			header('Location: ../index.php');
			break;
	}
}

	function crearPersona(){

		$consulta = "insert into person values 
		(null,:document,:documentType,:firstName,:lastName,null,:emailAddress,:address,null,null,null,null,:mobile)";

		$tipo = $_POST['tipoDocumento'];
		$nDocumento = $_POST['numIdenti'];
		$nombres = $_POST['nombres'];
		$apellidos = $_POST['apellidos'];
		$numero = $_POST['celular'];
		$direccion = $_POST['direccion'];
		$email = $_POST['email'];

	        try {
	            $cmd = Database::getInstance()->getDb()->prepare($consulta);
	            $cmd->execute(array(':document' =>$nDocumento ,':documentType' => $tipo,
	            					':firstName' => $nombres,':lastName' => $apellidos,':emailAddress' => $email,
	        						':address' => $direccion, ':mobile' => $numero ));            
	            return $cmd->fetchAll(PDO::FETCH_ASSOC);

	        } catch (PDOException $e) {
	            return false;
	        }        
	}

	function crearEmpresa(){
		$consulta = "insert into person values 
		(null,:document,'NIT',null,null,:company,:emailAddress,:address,null,null,null,null,:mobile)";

		$document = $_POST['nNit'];
		$company = $_POST['nEmpresa'];
		$mobile = $_POST['numEmp'];
		$address = $_POST['dirEmp'];
		$email = $_POST['emailEmp'];

	        try {
	            $cmd = Database::getInstance()->getDb()->prepare($consulta);
	            $cmd->execute(array(':document' =>$document ,':company' => $company,
	            					':emailAddress' => $email,
	        						':address' => $address, ':mobile' => $mobile ));            
	            return $cmd->fetchAll(PDO::FETCH_ASSOC);

	        } catch (PDOException $e) {
	            return false;
	        }  
	}

	function buscarPersona($email){
		$consulta = "select * from person where emailAddres = ?";		
		try {
	            $cmd = Database::getInstance()->getDb()->prepare($consulta);
	            $cmd->execute(array($email));            	            
	            
	            $row = $cmd->fetchAll(PDO::FETCH_ASSOC);
            	return $row;

	        } catch (PDOException $e) {
	            return false;
	        }    
	}

	function buscarEmpresa($email,$nit){
		$consulta = "select * from person where emailAddres = :email and document = :document";		
		try {
	            $cmd = Database::getInstance()->getDb()->prepare($consulta);
	            $cmd->execute(array(':email' => $email, ':document' => $nit));            	            
	            
	            $row = $cmd->fetchAll(PDO::FETCH_ASSOC);
            	return $row;

	        } catch (PDOException $e) {
	            return false;
	        }    
	}

	function crearTransaccion($transact){
		$consulta = "insert into transactionresult values(:transactionID,:sessionID,:returnCode,:trazabilityCode, :transactionCycle,		
		:bankCurrency,:bankFactor,:bankURL,:responseCode,:responseReasonCode,:responseReasonText)"; 
		$transaction = $transact->createTransactionResult; 

		$transactionID = $transaction->transactionID; 

		$sessionID = $transaction->sessionID;

		$returnCode = $transaction->returnCode;

		$trazabilityCode = $transaction->trazabilityCode;

		$transactionCycle = $transaction->transactionCycle;

		$bankCurrency = $transaction->bankCurrency;

		$bankFactor = $transaction->bankFactor;

		$bankURL = $transaction->bankURL;

		$responseCode = $transaction->responseCode;

		$responseReasonCode = $transaction->responseReasonCode;

		$responseReasonText = $transaction->responseReasonText;

	 	try {
            $cmd = Database::getInstance()->getDb()->prepare($consulta);
            $cmd->execute(array(':transactionID' =>$transactionID ,':sessionID' => $sessionID,
            					':returnCode' => $returnCode,':trazabilityCode' => $trazabilityCode,':transactionCycle' => $transactionCycle,
        						':bankCurrency' => $bankCurrency, ':bankFactor' => $bankFactor,':bankURL' => $bankURL,
        						':responseCode' => $responseCode,':responseReasonCode' => $responseReasonCode,':responseReasonText' => $responseReasonText ));                        
            $row = $cmd->fetchAll(PDO::FETCH_ASSOC);            
        	return $row;

        } catch (PDOException $e) {
            return false;
        }    
	}

	function instanciatePerson($personS,$email){
		$person = array(); 
	  	$person['documentType'] = $personS[0]['documentType'];
	  	$person['document'] = $personS[0]['document'];
	  	$person['firstName'] = $personS[0]['firstName'];
	  	$person['lastName'] = $personS[0]['lastName'];
	  	$person['company'] = null;
	  	$person['emailAddress'] = $email;
	  	$person['address'] = $personS[0]['address'];
	  	$person['city'] = null;
	  	$person['province'] = null;
	  	$person['country'] = null;
	  	$person['phone'] = null;
	  	$person['mobile'] = $personS[0]['mobile'];

	  	return $person;
	}

	function instanciateCompany($companyS){
		$company = array(); 
	  	$company['documentType'] = $companyS[0]['documentType'];
	  	$company['document'] = $companyS[0]['document'];
	  	$company['firstName'] = $companyS[0]['firstName'];
	  	$company['lastName'] = $companyS[0]['lastName'];
	  	$company['company'] = $companyS[0]['company'];
	  	$company['emailAddress'] = "company@mail.com";
	  	$company['address'] = $companyS[0]['address'];
	  	$company['city'] = null;
	  	$company['province'] = null;
	  	$company['country'] = null;
	  	$company['phone'] = null;
	  	$company['mobile'] = $companyS[0]['mobile'];

	  	return $company;
	}	

	function PSETransactionRequest($person,$company,$bank,$tipoPersona){

		$PSETransactionRequest = array(); 
	  	
	  	$PSETransactionRequest['bankCode'] = $bank[0];  
	  	$PSETransactionRequest['bankInterface'] = $tipoPersona; 
	  	$PSETransactionRequest['returnURL'] = "http://localhost:8080/pruebaBandit/confirmTransactionPayment.php";    	
	  	$PSETransactionRequest['reference'] = getOriginIP().",".$person['documentType'].",".$person['document'];
	  	$PSETransactionRequest['description'] = "Se paga una cantidad de dinero";
	  	$PSETransactionRequest['lenguaje'] = 'ES';
	  	$PSETransactionRequest['currency'] = 'COP';
	  	$PSETransactionRequest['totalAmount'] = rand(1000000,35000000);
	  	$PSETransactionRequest['taxAmount'] = 20.3;
	  	$PSETransactionRequest['devolutionBase'] = rand(10000,40000);
	  	$PSETransactionRequest['tipAmount'] = rand(10000,40000);
	  	$PSETransactionRequest['payer'] = $person;
	  	$PSETransactionRequest['buyin'] = $person;
	  	$PSETransactionRequest['shipping'] = $company;
	  	$PSETransactionRequest['ipAddress'] = getOriginIP();
	  	$PSETransactionRequest['userAgent'] = $_SERVER['HTTP_USER_AGENT'];

	  	return $PSETransactionRequest;
	}

	function getOriginIP() { 
         if (isset($_SERVER["HTTP_CLIENT_IP"])){

            return $_SERVER["HTTP_CLIENT_IP"];

        }elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){

            return $_SERVER["HTTP_X_FORWARDED_FOR"];

        }elseif (isset($_SERVER["HTTP_X_FORWARDED"])){

            return $_SERVER["HTTP_X_FORWARDED"];

        }elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])){

            return $_SERVER["HTTP_FORWARDED_FOR"];

        }elseif (isset($_SERVER["HTTP_FORWARDED"])){

            return $_SERVER["HTTP_FORWARDED"];

        }else{

            return $_SERVER["REMOTE_ADDR"];

        }
    }

    function findTransaction($transactionID){ 
    	$consulta = "select * from transactionresult where transactionID = ?";		
		try {
	            $cmd = Database::getInstance()->getDb()->prepare($consulta);
	            $cmd->execute(array($transactionID));            	            
	            
	            $row = $cmd->fetchAll(PDO::FETCH_ASSOC);
            	return $row;

	        } catch (PDOException $e) {
	            return false;
	        }    
    }

?>