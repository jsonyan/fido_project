<?php 
class Usuarios extends CI_Controller 
{
     public function __construct()
    {
        parent::__construct();
        //$this->very_sesion();
        if($this->auth->is_logged() == FALSE)
		{
			
			redirect(base_url('frontend/inicio'));
			
		}
        $this->load->library('form_validation');
        $this->load->model('m_usuarios');
    }    
	public function index() {
	   //$this->very_sesion();
       $data = array(
        
            'saludo'=>$this->session->userdata('usuario'),
            'perfil'=>$this->session->userdata('perfil')
        );
		$data['mod_activo'] = "usuarios";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
		$this->load->view("backend/v_header");
		$this->load->view("backend/v_top_menu",$data);
		$this->load->view("backend/v_user_menu",$data);
		$this->load->view("backend/v_registrado_por_administrador");//Aqui cargas la vista de tu modulo
		$this->load->view("backend/v_footer");
	}
     
     public function mostrar_usuarios_aplab()
    {
        //$this->very_sesion();
        $data = array(
        
            'saludo'=>$this->session->userdata('usuario'),
            'perfil'=>$this->session->userdata('perfil'),
            'mod_activo'=>"usuarios",
   
        );
        
        $data1 = array(
        
        //    'saludo'=>$this->session->userdata('usuario'),
            'usuarios_admin'=>$this->m_usuarios->mostrar_administrativos(),
            'usuarios_volun'=>$this->m_usuarios->mostrar_voluntarios(),
            'usuarios_adopt'=>$this->m_usuarios->mostrar_adoptantes(),
            'usuarios_veter'=>$this->m_usuarios->mostrar_veterinarios(),
            'usuarios_donan'=>$this->m_usuarios->mostrar_donantes()
        );
        $data['mod_activo'] = "usuarios";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
		$this->load->view("backend/v_header");
		$this->load->view("backend/v_top_menu",$data);
		$this->load->view("backend/v_user_menu",$data);
		$this->load->view('backend/v_usuarios_registrados',$data1);
		$this->load->view("backend/v_footer");
                   
    }

    
    
    public function registro_very2()
    {
        //$this->very_sesion();
        if($this->input->post('submit_reg2'))
        {
            $this->form_validation->set_rules('nombre','Nombre','required');
            $this->form_validation->set_rules('apellidos','Apellidos','required');
            $this->form_validation->set_rules('email','E-Mail','required|trim|valid_email|callback_very_correo','required');
            $this->form_validation->set_rules('pass','Contraseña','required|trim|min_length[6]','required');
            $this->form_validation->set_rules('repass','Confirme Contraseña','required|trim|matches[pass]','required');
            
            $this->form_validation->set_message('required','El Campo %s Es Obligatorio');
            $this->form_validation->set_message('valid_email','Ingrese un %s Válido');
            $this->form_validation->set_message('matches','El Campo %s no es igual que el campos %s');
            $this->form_validation->set_message('min_length','El Campo %s debe tener como minimo 6 caracteres');
            $this->form_validation->set_message('very_correo','El Campo %s Ya Existe');
            
            $this->form_validation->set_rules('ci','carnet','required');
            $this->form_validation->set_rules('face','social','required');
            $this->form_validation->set_rules('fijo','Fijo','required');
            $this->form_validation->set_rules('movil','Movil','required');
            $this->form_validation->set_rules('ciudad','Ciudad','required');
            $this->form_validation->set_rules('direccion','Direccion','required');
            $this->form_validation->set_rules('ocupacion','Ocupacion','required');
            $this->form_validation->set_rules('dd','DD','required');
            $this->form_validation->set_rules('mm','MM','required');
            $this->form_validation->set_rules('aa','AA','required');
            
            

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
        		$this->load->view("backend/v_header");
        		$this->load->view("backend/v_top_menu");
        		$this->load->view("backend/v_user_menu",$data);
        		$this->load->view("backend/v_registrado_por_administrador",$data1);//Aqui cargas la vista de tu modulo
        		$this->load->view("backend/v_footer");
            }
            else
            {
                
                
                $data['mod_activo'] = "usuarios";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
        		$this->load->view("backend/v_header");
        		$this->load->view("backend/v_top_menu");
        		$this->load->view("backend/v_user_menu",$data);
        		$this->load->view("backend/v_registrado_por_administrador");//Aqui cargas la vista de tu modulo
        		$this->load->view("backend/v_footer");
            }
        }
        else
        {
            redirect(base_url().'backend/usuarios/registro2');
        }
    }
    function very_correo($correo)
    {
       // $this->very_sesion();
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
    /* function very_sesion()
        {
            if(!$this->session->userdata('usuario'))
            {
                redirect(base_url().'frontend/inicio');
            }
        }*/
    
    function upload_image()
    {
        //$this->very_sesion();
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
       // $this->very_sesion();
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
    
    public function confirmar($code)
    {
        $res = $this->m_usuarios->very($code,'codigo');
        if($res == false)
        {
            echo "Este Usuario No Existe";
        }
        else
        {
            $this->m_usuarios->update_user($code);
            echo "Usuario Confirmado Con Existo.<br>
                <a href='".base_url()."usuarios'>Inciar Sesion</a>";
        }
    }
    
    public function editar()
    {       
            //$this->very_sesion();
                if($_FILES['userfile']['name'] != '')
                {
                    $respuesta = $this->upload_image();
                    
                    if(!is_array($respuesta))
                    {
                        $this->m_usuarios->editar_usuario($respuesta);
                        //$mensaje = "El Usuario modificado Correctamente";
                        redirect(base_url().'backend/usuarios/mostrar_usuarios_aplab');                        
                    }
                    else
                    {
                        $mensaje = $respuesta;
                    }
                }
                else
                {
                    $this->m_usuarios->editar_usuario('anonimo.jpg');
                    //$mensaje = "Usuario Modificado Correctamente";                                        
                    redirect(base_url().'backend/usuarios/mostrar_usuarios_aplab');
                }
    }
    public function editar_usuario($id, $tabla)
    {
        //$this->very_sesion();
        $verificar = $this->m_usuarios->verifica_id($id,$tabla);
        if($verificar == false)
        {
            $data = array(
                    'titulo' => 'Editar Usuario',
                    'error' => 'Este Usuario No Existe'
                    );           
        }
        else
        {   
            if($tabla=='administrador')
            {
                $m='Ninguno';
                $e='Ninguno';
                $t='Ninguno';
                $c=$verificar['cargo'];
                $oc=$verificar['otro_cargo'];
                $per='padmin';                
            }
            if($tabla=='donante')
            {
                $m='Ninguno';
                $e='Ninguno';
                $t='Ninguno';
                $c='Ninguno';
                $per='pdonan';
                $oc='Ninguno';
            }
            if($tabla=='adoptante')
            {
                $m='Ninguno';
                $e='Ninguno';
                $t='Ninguno';
                $c='Ninguno';
                $per='padopt';
                $oc='Ninguno';
            }
            if($tabla=='veterinario')
            {
                $m=$verificar['matricula_profesional'];
                $e='Ninguno';
                $t='Ninguno';
                $c='Ninguno';
                $per='pveter';
                $oc='Ninguno';
            }
            if($tabla=='voluntario')
            {
                $m='Ninguno';
                $e=$verificar['estado'];
                $t=$verificar['tipo_ayuda'];
                $c='Ninguno';
                $per='pvolun';
                $oc='Ninguno';
            }
            
            $data1 = array(
                    'perfil_edit'=>$per,
                    'titulo' => 'Editar usuario',
                    'funcion'=>$c,
                    'otro'=>$oc,
                    //para 
                    
                    'matricula'=>$m,
                    'tipo'=>$t,
                    'estado'=>$e,
                    
                    //
                    'id_usuario' => $verificar['id_usuario'],
                    'nombre' => $verificar['nombre'],
                    'apellidos' => $verificar['apellidos'],
                    'ci'=>$verificar['ci'],
                    'email' => $verificar['email'],
                    'telefono' => $verificar['telefono'],
                    'celular' => $verificar['celular'],
                    'ciudad' => $verificar['ciudad'],
                    'direccion' => $verificar['direccion'],
                    'ocupacion' => $verificar['ocupacion'],
                    'nacimiento' => $verificar['fecha_nacimiento'],
                    'foto' => $verificar['foto']
                    );
        }
        $data['mod_activo'] = "usuarios";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
		$this->load->view("backend/v_header");
		$this->load->view("backend/v_top_menu");
		$this->load->view("backend/v_user_menu",$data);
		$this->load->view("backend/v_editar_usuarios",$data1);//Aqui cargas la vista de tu modulo
		$this->load->view("backend/v_footer");
    }    
    
} 
?>
