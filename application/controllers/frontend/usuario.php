<?php 
class Usuario extends CI_Controller 
{
     public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_usuarios');
    }    
    public function index() {
	   $data = array(					  					         
	     'titulo' => 'Registro de usuarios',
	     'campos' => $this->auth->campos_formulario(),
	     'token'  => $this->auth->token(),
	     'key'    => '6Len39QSAAAAAB1GgcnsXOPtciZD6-1ak67Z1qiY'	              
	   );                     
		$this->load->view("frontend/v_header");
		$this->load->view("frontend/v_top_menu_inicio",$data);
		$this->load->view("frontend/v_registro_usuario",$data);//Aqui cargas la vista de tu modulo
        $this->load->view("frontend/v_social");
		$this->load->view("frontend/v_footer");
	}

    public function verifica_captcha()
	{    
		$privatekey = "6Len39QSAAAAAD45j6p0zU681XeuHXfxC1i717_P ";
		$resp = recaptcha_check_answer ($privatekey,
		                                $_SERVER["REMOTE_ADDR"],
		                                $this->input->post("recaptcha_challenge_field"),
		                                $this->input->post("recaptcha_response_field"));	
		  if (!$resp->is_valid) {
	
		    $this->form_validation->set_message('verifica_captcha','El %s es incorrecto');
				 return FALSE;
		  } 
	}
	public function registro_nuevo()
	{
		
		if($this->input->post('submit_registro'))
		{
			//prevenimos ataques Cross-Site Request Forgery (CSRF)
			if($this->input->post('token') == $this->session->userdata('token'))
			{
			
				if($this->auth->validar() == FALSE)
				{					
					$this->index();					
				}else
                {					
					$email = $this->input->post('email');
					$password = $this->input->post('pass');				
                    					
					if($this->auth->registro_usuario($email,$password) == TRUE){
					
						$this->session->set_flashdata('existe','El email ingresado ya existe');
						redirect(base_url('frontend/usuario','refresh'));				
					
					}else{						           
                            $this->m_usuarios->add_user('anonimo.jpg');
                            $mensaje = "El Usuario Se Registro Correctamente";                                                                                 
                            $data1 = array(
                                    'campos' => $this->auth->campos_formulario(),
                                    'token'  => $this->auth->token(),
                                    'key'	 => '6Len39QSAAAAAB1GgcnsXOPtciZD6-1ak67Z1qiY',
                                    'mensaje'=>$mensaje);                                                                            
   		                   $this->load->view("frontend/v_header");
                      		$this->load->view("frontend/v_top_menu_inicio",$data1);                            
                      		$this->load->view("frontend/v_registro_usuario",$data1);//Aqui cargas la vista de tu modulo
                            $this->load->view("frontend/v_social");
                      		$this->load->view("frontend/v_footer");
						
					}
					
				} 
				
			}
			
		}else{
			
			redirect(base_url('frontend/usuario'));
			
		}
		
	}                                      	
    
    function upload_image()
    {
        $config['upload_path'] = 'files/imagenes/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= 2*1024;
		$config['max_width']  = '1024';
		$config['max_height']  = '1024';
        $config['file_name']  = $this->input->post('nombre').$this->input->post('apellidos');
        $config['remove_spaces'] = TRUE;
		
		$this->load->library('upload', $config);
	
		if ( !$this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			return $error;
		}	
		else
		{
		    $data = $this->upload->data(); 
			$this->create_thumb($data['file_name']);
			
			return $data['file_name'];
		}
    }
    
    function create_thumb($imagen)
    {
        $config['image_library'] = 'gd2';
        $config['source_image']	= 'files/imagenes/'.$imagen;
        $config['new_image']	= 'files/imagenes/thumbs/';
        $config['thumb_marker']	= '';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width']	 = 150;
        $config['height']	= 150;
        
        $this->load->library('image_lib', $config); 
        $this->image_lib->resize();
    }
    function very_correo($correo)
    {
        $variable = $this->m_usuarios->very($correo,'email');
        if($variable == true)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
  public function reg_voluntario()
    {
        
            if($this->input->post('reg_vol'))
        {
            $this->form_validation->set_rules('nombre','Nombre','required');
            $this->form_validation->set_rules('apellidos','Apellidos','required');
            $this->form_validation->set_rules('email','E-Mail','required|trim|valid_email|callback_very_correo');
            $this->form_validation->set_rules('pass','Contrase�a','required|trim|min_length[6]');
            $this->form_validation->set_rules('repass','Confirme Contrase�a','required|trim|matches[pass]');            
            $this->form_validation->set_message('required','El Campo %s Es Obligatorio');
            $this->form_validation->set_message('valid_email','Ingrese un %s V�lido');
            $this->form_validation->set_message('matches','El Campo %s no es igual que el campos %s');
            $this->form_validation->set_message('min_length','El Campo %s debe tener como minimo 6 caracteres');
            $this->form_validation->set_message('very_correo','El Campo %s Ya Existe');

            if($this->form_validation->run() != FALSE)
            {
                if($_FILES['userfile']['name'] != '')
                {
                    $respuesta = $this->upload_image();
                    
                    if(!is_array($respuesta))
                    {
                        $this->m_usuarios->add_user($respuesta);
                        $mensaje = "El Usuario Se Registro Correctamente";
                    }
                    else
                    {
                        $mensaje = $respuesta;
                    }
                }
                else
                {
                    $this->m_usuarios->add_user('anonimo.jpg');
                    $mensaje = "El Usuario Se Registro Correctamente";
                }
                
                
                $data1 = array('mensaje'=>$mensaje);
                
                $data['mod_activo'] = "usuarios";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
        		$this->load->view("frontend/v_header");
        		$this->load->view("frontend/v_top_menu");
        		//$this->load->view("frontend/v_user_menu",$data);
        		$this->load->view("frontend/v_voluntarios",$data1);//Aqui cargas la vista de tu modulo
        		$this->load->view("frontend/v_footer");
            }
            else
            {                              
                $data['mod_activo'] = "usuarios";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
        		$this->load->view("frontend/v_header");
        		$this->load->view("frontend/v_top_menu");
        		//$this->load->view("frontend/v_user_menu",$data);
        		$this->load->view("frontend/v_voluntarios");//Aqui cargas la vista de tu modulo
        		$this->load->view("frontend/v_footer");
            }
        }
        else
        {
            redirect(base_url().'frontend/usuario');
        }

    }
}
  
?>
