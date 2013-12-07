<?php

class Mod_animales extends CI_Controller {

	function __construct()
	{
		parent::__construct();
                if($this->auth->is_logged() == FALSE)
                         {

                                 redirect(base_url('frontend/inicio'));

                         }
	}
	
	function index(){
		show_404();
	}

	public function nuevo_animal()
	{
		$data['razas_perros'] = $this->edita_config->getRazasPerros();
		$data['razas_gatos'] = $this->edita_config->getRazasGatos();

		$data['mod_activo'] = "animales";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
		$this->load->view("backend/v_header",$data);
		$this->load->view("backend/v_top_menu");
		$this->load->view("backend/v_user_menu",$data);
		$this->load->view("backend/mod_animales/v_form-animal",$data);//Aqui cargas la vista de tu modulo
		$this->load->view("backend/v_footer");
	}
	
	public function ver_todos($clave = ''){
                $url = base_url().'index.php/backend/mod_animales/ver_todos';
		$desde = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
                $clave = $this->input->post('clave');

                if($clave == ''){
                    $datos['fichas'] = $this->m_animales->get_animales_limite(10,$desde);
                    $totalFilas = $this->db->count_all_results('animal');
                }else{
                    $datos['fichas'] = $this->m_animales->get_animales_limite_word_key(10,$desde,$clave);
                    $totalFilas = $this->m_animales->get_animales_nro_animales_word_key(10,$desde,$clave);
                }
		$opciones = $this->util->creaPaginacion(10,4,$url,$totalFilas);
        $this->pagination->initialize($opciones);
		$datos['paginacion'] = $this->pagination->create_links(); 


		$datos['mod_activo'] = "animales";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
		$this->load->view("backend/v_header",$datos);
		$this->load->view("backend/v_top_menu");
		$this->load->view("backend/v_user_menu",$datos);
		$this->load->view("backend/mod_animales/v_inicio-animal",$datos);//Aqui cargas la vista de tu modulo
		$this->load->view("backend/v_footer");

	}
	
        /**
        * @access public
        * @name $mostrar_ficha
        * @param string $codigo Codigo de animal en formato cadena
        * @return bool Retorna true si es valido, false si no es valido el codigo.
        */	 
        public function mostrar_ficha($idAnimal = ''){
		if(strlen($idAnimal) != 7)
			show_404();

		$queryStr = "SELECT * FROM `animal` WHERE id_animal = '".$idAnimal."'";
		$query = $this->db->query($queryStr);
		$datos = array();
		foreach($query->result_array() as $fila){
			$datos['id'] = $fila['id_animal'];
			$datos['nombre'] = $fila['nombre_animal'];
			$datos['sexo'] = $fila['sexo_animal'];
			$datos['entrada'] = $fila['motivo_entrada'];
			$datos['especie'] = $fila['especie'];
			$datos['raza'] = $fila['raza'];
			$datos['tamano'] = $fila['tamano'];
			$datos['color'] = $fila['color'];
			$datos['nacimiento'] = $fila['fecha_nacimiento'];
			$datos['esterilizado'] = $fila['esterilizado'];
			$datos['adoptable'] = $fila['adoptable'];
			$datos['revision'] = $fila['revision_medica'];
			$datos['estado_encontrado'] = $fila['estado_encontrado'];
			$datos['encontrado_por'] = $fila['encontrado_por'];
			$datos['direccion_encontrado'] = $fila['direccion_encontrado'];
			$datos['tatuaje'] = $fila['tatuaje'];
			$datos['caracteristicas'] = $fila['caracteristicas'];
			$datos['muerte'] = $fila['fecha_muerte'];
			$datos['motivo_muerte'] = $fila['motivo_muerte'];
			$datos['foto_animal'] = $fila['foto_animal'];
		}

		$datos['mod_activo'] = "animales";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
//		$datos['voluntarios'] = $this->m_animales->getVoluntarios();
		$datos['razas_perros'] = $this->edita_config->getRazasPerros();
		$datos['razas_gatos'] = $this->edita_config->getRazasGatos();
		$this->load->view("backend/v_header",$datos);
		$this->load->view("backend/v_top_menu");
		$this->load->view("backend/v_user_menu",$datos);
		$this->load->view("backend/mod_animales/v_form-animal",$datos);//Aqui cargas la vista de tu modulo
		$this->load->view("backend/v_footer");

	}
        
        public function guardaParaAdopcion(){
		$flag = $this->input->post('flag_seguimiento');
                $revision = $this->input->post('revision');
                $adoptable = $this->input->post('adoptable');
                if($adoptable != 1)
                    $adoptable = 0;
                if($revision != 1)
                    $revision = 0;
		$data = array(
                          'adoptable' => $adoptable,
                    'revision_medica' => $revision
                );
                if($flag == 'nuevo'){
                    echo "<div id=\"msg\"><p class=\"alert alert-error\"><a class=\"close\" data-dismiss=\"alert\" href=\"#\">&times;</a><i class=\"icon-thumbs-down\"></i> Error</p></div>";
                }else{
			$this->db->where('id_animal',$flag);
			$this->db->update('animal',$data);
                    
                    echo "<div id=\"msg\"><p class=\"alert alert-success\"><a class=\"close\" data-dismiss=\"alert\" href=\"#\">&times;</a><i class=\"icon-thumbs-up\"></i> Hecho</p></div>";
                }
        }
        public function guardarDatos(){
            $data = array(
                            'nombre_animal' => $this->input->post('nombre'),
                              'sexo_animal' => $this->input->post('sexo'),
                                  'especie' => $this->input->post('especie'),
                                     'raza' => $this->input->post('raza'),
                                    'color' => $this->input->post('color'),
                                   'tamano' => $this->input->post('tamanio'),
                           'motivo_entrada' => $this->input->post('motivo_entrada'),
                             'esterilizado' => $this->input->post('esterilizado'),
                                  'tatuaje' => $this->input->post('tatuaje'),
                          'caracteristicas' => $this->input->post('caracteristicas'),
                        'estado_encontrado' => $this->input->post('estado_encontrado'),
                           'encontrado_por' => $this->input->post('encontrado_por'),
                     'direccion_encontrado' => $this->input->post('direccion_encontrado'),
                         'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
                             'fecha_muerte' => $this->input->post('fecha_muerte'),
                            'motivo_muerte' => $this->input->post('motivo_muerte')
            );

            $flag = $this->input->post('flag_animal');
            if($flag === 'nuevo'){
                //Si el registro es NUEVO
                $raza = $this->input->post('raza');
                $especie = $this->input->post('especie');
                $sexo = $this->input->post('sexo');
                if($raza === '0' || $especie === '0' || $sexo === '0'){
                        //Si NO se llenaron los datos, se envia un error
			$msg = "<div class=\"alert alert-error span8\">
					 <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
					 <strong>Error!</strong> Llene los campos obligatorios.
					 <span id=\"code\" style=\"font-size:0px; display:inline;\">nuevo</span>
				  </div>";
			echo $msg;
                }else{
                        // Guardamos los datos en un nuevo registro
                        $codigo = $this->util->generaCodigo($especie,$sexo,$this->db->count_all('animal'));
                        $data['id_animal'] = $codigo;
                        $this->db->set('fecha_reg_animal','NOW()',false);
                        $this->db->insert('animal', $data);
                        $msg = "<div class=\"alert alert-success span8\">
                                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                                  <strong>Bien hecho!</strong> Los datos se guardaron correctamente.
                                  <span id=\"code\" style=\"font-size:0px; display:inline;\">".$codigo."</span>
                                </div>";
                        echo $msg;
                }
            }else{
                //Actualizamos datos
                if($this->util->esCodigoValido($flag)){
                    $this->db->where('id_animal',$flag);
                    $this->db->update('animal',$data);
                    $msg = "<div class=\"alert alert-success span8\">
                                 <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                                 <strong>Bien hecho!</strong> Datos actualizados exitosamente.
                                 <span id=\"code\" style=\"font-size:0px; display:inline;\">".$flag."</span>
                            </div>";
                    echo $msg;
                }else{
                    $msg = "<div class=\"alert alert-warning span8\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                                <strong>Oops!</strong> Los datos se estan alterando. 
                                <span id=\"code\" style=\"font-size:0px; display:inline;\">".$flag."</span>
                            </div>";
                    echo $msg;
                }
            }
        }

	public function subirfoto()
	{
		$config['upload_path'] = './uploads/fotos-animal';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['overwrite']	= TRUE;
		$config['max_size']	= '700';
//		$config['max_width']  = '1024';
//		$config['max_height']  = '768';

		$flagimg = $this->input->post('flag_img');
		
		$strImgDB = "";

		if(strlen($flagimg)==7){
			//obteniendo la cadena foto_animal de la base de datos
			//$query = $this->db->select('foto_animal')->from('animal')->where('id_animal',$flagimg);
			$queryStr = "SELECT foto_animal FROM `animal` WHERE id_animal = '".$flagimg."'";
			$query = $this->db->query($queryStr);
			foreach($query->result_array() as $row)
				$strImgDB = $row['foto_animal'];
				
			$contador = $this->util->cuentaFotos($strImgDB,"*");
			$filename = $flagimg."_".$contador.".jpg";
			$config['file_name'] = $filename;
		}

		$this->load->library('upload', $config);
		
		//para comprobar si ya hay codigo o no

		if (strcmp($flagimg,"nuevo")==0 or ! $this->upload->do_upload() )
		{
			$msg = "<div class=\"alert alert-error span2\">
						  <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
						  <strong>Oops!</strong> Hubo un error al subir la foto.
						 <span id=\"imgpath\" style=\"font-size:0px; display:inline;\">error</span>
					</div>";
			echo $msg;
/*			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);*/
		}
		else
		{
			$data = $this->upload->data();
			$dirBase = "uploads/fotos-animal/";
			$dirAnimal = "";
			$img_path = base_url()."".$dirBase.$dirAnimal.$data['file_name'];


			//preparando la cadena foto_animal para actualizar la base de datos (comodin * para separa NOMBRE de archivos)
			if(strcmp($strImgDB,"0")==0)
				$strImgDB = "*";

			$strImgDB = $strImgDB.$data['file_name']."*";	
			$data = array('foto_animal'=>$strImgDB);
			//actualizando la base de datos
			$this->db->where('id_animal',$flagimg);
			$this->db->update('animal',$data);
			

			$msg = "<div class=\"alert alert-success span2\">
						  <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
						  <strong>Bien hecho!</strong> Foto guardada en la galeria.
						 <span id=\"imgpath\" style=\"font-size:0px; display:inline;\">".$img_path."</span>
					</div>";
			echo $msg;
		}
	}
}
?>