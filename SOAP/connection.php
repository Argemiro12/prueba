<?php 

class Connection {	
	public $webService;
	function __construct(){
		$service="https://test.placetopay.com/soap/pse/?wsdl"; 
		$param=array('trace' => true); 
		$this->webService = new SoapClient($service, $param);
		$this->webService->__setLocation('https://test.placetopay.com/soap/pse/');

	}

	function auth(){
		$login = "6dd490faf9cb87a9862245da41170ff2"; 
		$seed = date('c'); 
		$tranKey = '024h1IlD';
		$tranKey = sha1($seed.$tranKey); 
		$additional = array();

		$additional['name'] ='tipoPago';
		$additional['value'] = 'débito';

		$authentication = array();
		$authentication['login'] = $login;
		$authentication['tranKey'] = $tranKey;
		$authentication['seed'] = $seed;
		$authentication['additional'] = $additional;

		$auth = array();
		$auth['auth'] = $authentication;

		return $auth;		
	}

	function getBankList($auth){		
		return $this->webService->getBankList($auth);
	}

	function createTransaction($createTransaction){		
		return $this->webService->createTransaction($createTransaction);
	}

	function getTransactionInformation($transaction){
		return $this->webService->getTransactionInformation($transaction);
	}
}

?>