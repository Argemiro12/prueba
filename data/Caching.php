<?php 


require_once('./SOAP/connection.php');
require_once('SaveData.php');


class Caching{
	
	
	public function get_content($file,$hours) {
		$current_time = time(); 
		$expire_time = $hours * 60 * 60; 
		$file_time = filemtime($file); 
		
		if(file_exists($file) && ($current_time - $expire_time < $file_time)) {
			$json = json_decode(file_get_contents($file)); 
			return $json;
		}
		else {
			$content = $this->get_url(); 
			return json_decode($content);
		}
	}

	public function get_url() {
		$connection = new connection(); 
	  	$auth = $connection->auth(); 

		$banks = $connection->getBankList($auth); 
		$json = null;
		if(!empty($banks)){		
			$json = json_encode($banks); 
			$saveData = new SaveData();
			$saveData->save($json);	 
		}

		return $json;
	}

}


?>