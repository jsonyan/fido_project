<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
class Util{
     public function __construct()     {         
	 	// Hacer algo con $params     
	 }

         /**
          * @access public
          * @name $verificaCodigo
          * @param string $codigo Codigo de animal en formato cadena
          * @return bool Retorna true si es valido, false si no es valido el codigo.
          */	 
         public function esCodigoValido($codigo){
            $regex = "/^[GP][HM][0-9][0-9][0-9][0-9][0-9]$/";
            if(preg_match($regex,$codigo)){
                return true;
            }else{
                return false;
            }
         }

         public function generaCodigo($especie, $sexo, $contador){
		$sexCode = $sexo == "hembra" ? "H" : "M";
		$espCode = $especie == "perro" ? "P" : "G";
		$cont = $contador + 1;
		$cant = strlen($cont."");
		$codigo = "";
		if($cant==1)
			$codigo = $espCode.$sexCode."0000".$cont;
		if($cant==2)
			$codigo = $espCode.$sexCode."000".$cont;
		if($cant==3)
			$codigo = $espCode.$sexCode."00".$cont;
		if($cant==4)
			$codigo = $espCode.$sexCode."0".$cont;
		if($cant==5)
			$codigo = $espCode.$sexCode."".$cont;
	 	return $codigo;
	 }
	 public function cuentaFotos($cadena, $comodin){
		$tok = strtok($cadena,$comodin);
		$counter = 0;
		if(strlen($cadena)==1)
			return 0;
			
		while($tok !=false){
			$counter++;
			$tok = strtok("*");
		}
		return $counter;	
	 }
	 
	 /**
          * @access public
          * @name $creaPaginacion
          * @param int $porPagina Numero de elementos a mostrar por pagina
          * @param int $uriSeg  Numero del segmento URI fuente.
          * @param string $urlApp URL que llama a esta funcion: ej.: base_url/controlador/funcion
          * @param int $totalFilas  Numero total de filas de todo el conjunto de datos.
          * @return array Retorna un array de opciones de paginacion
          */
         public function creaPaginacion($porPagina, $uriSeg, $urlApp,$totalFilas){
		$opciones = array();
		$opciones['full_tag_open'] = '<div class="pagination pagination-small pagination-centered"><ul>';
		$opciones['full_tag_close'] = '</ul></div>';
		$opciones['next_link'] = 'Sig.';
		$opciones['next_tag_open'] = '<li>';
		$opciones['next_tag_close'] = '</li>';
		$opciones['prev_link'] = 'Prev.';
		$opciones['prev_tag_open'] = '<li>';
		$opciones['prev_tag_close'] = '</li>';
		$opciones['num_tag_open'] = '<li>';
		$opciones['num_tag_close'] = '</li>';
		$opciones['cur_tag_open'] = '<li class="active"><span>';
		$opciones['cur_tag_close'] = '</span></li>';

		$opciones['per_page'] = $porPagina;
		$opciones['base_url'] = $urlApp;
		$opciones['uri_segment'] = $uriSeg;
                $opciones['total_rows'] = $totalFilas;
                return $opciones;
         }
}
?>
