<?php 
class SaveData{
	
	public function save($json){
		$f1 = fopen('banks.json','w');
		fwrite($f1, $json);
		fclose($f1);
	}
}
?>