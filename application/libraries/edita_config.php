<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
class Edita_config{
     public function __construct()     {         
	 	// Hacer algo con $params     
	 }
	public function getRazasPerros(){
		if (file_exists('config.xml')){
                        $env_perros = array();
                        $i = 0;
			$xml = simplexml_load_file('config.xml');
			foreach($xml->perros->raza as $raza){
                            $env_perros[$i] = $raza;
                            $i++;
                        }
                        return $env_perros;
		}else{
			exit('Error abriendo el archivo de configuracion.');
		}
	}
	public function getRazasGatos(){
		if (file_exists('config.xml')){
                        $env_gatos = array();
                        $i = 0;
			$xml = simplexml_load_file('config.xml');
			foreach($xml->gatos->raza as $raza){
                            $env_gatos[$i] = $raza;
                            $i++;
                        }
                        return $env_gatos;
		}else{
			exit('Error abriendo el archivo de configuracion.');
		}
	}
	public function addRaza($flag_raza, $item_raza){
		if (file_exists('config.xml')) {
			$xml = simplexml_load_file('config.xml');
			if($flag == 'perros'){
				$xml->perros->addChild('raza',$item_raza);
			}else{	
				$xml->gatos->addChild('raza',$item_raza);
			}	
			$salida = $xml->asXML();
			file_put_contents('config.xml',$salida);
		}else{
			exit('Error abriendo el archivo de configuracion.');
		}		
	}
	public function borrarRaza($flag, $item_raza){
		$xml = simplexml_load_file('config.xml');
		$target = 0;
		$i = 0;	
		
		if($flag == 'perros'){
			foreach($xml->perros->raza as $raza){
				if($raza == $item_raza){
					$target = $i;
					break;
				}
				$i++;
			}
			if($target != 0)
				unset($xml->perros->raza[$target]);
		}else{
			foreach($xml->gatos->raza as $raza){
				if($raza == $item_raza){
					$target = $i;
					break;
				}
				$i++;
			}
			if($target != 0)
				unset($xml->gatos->raza[$target]);
		}
		$salida = $xml->asXML();
		file_put_contents('config.xml',$salida);
	}
	 
	 
}
?>
