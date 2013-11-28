<?php if ( ! ('BASEPATH')) exit('No direct script access allowed'); 

class Inicio extends CI_Controller
{
	
	public function __construct()
	{
		
		parent::__construct();
		
		if($this->auth->is_logged() == TRUE)
		{
			
			redirect(base_url('backend/bienvenida'));
			
		}
        $this->load->model('m_usuarios');
			
	}
		
	public function index()
	{
		
		$data = array('titulo' => 'iniciar session',
					  'campos' => $this->auth->campos_formulario(),
					  'token'  => $this->auth->token()       
				      );
		
		$this->load->view("frontend/v_header");
		$this->load->view("frontend/v_top_menu_inicio",$data);
        $this->load->view("frontend/v_bienvenida");	
        $this->load->view("frontend/v_social");			
		$this->load->view("frontend/v_footer");  		
	}
	public function user_login()
	{				
		if($this->input->post('submit'))
		{			
				
			if($this->input->post('token') == $this->session->userdata('token'))
			{
				if($this->auth->validate() == FALSE)
				{
					
					$this->index();
					
				}else{				
					
					$email = $this->input->post('email');
					$password = $this->input->post('pass');
					
					if($this->auth->login_user($email,$password) == FALSE){
					
						$this->session->set_flashdata('noexiste','El Email/Contrase&ntilde;a son Incorrectos');
						redirect(base_url('frontend/inicio','refresh'));				
					
					}else{
						
						$this->auth->crear_sesiones($email,$password);
						//redirect(base_url('frontend/evaluacion','refresh'));
                          $perfil=$this->m_usuarios->ver_perfil();
                            if($perfil  =='administrador')
                            {
                                redirect(base_url().'backend/bienvenida');    
                            }
                            if($perfil =='adoptante')
                            {
                                redirect(base_url().'frontend/evaluacion');    
                            }						
					}
					
				} 
			
			}

		}else{
			
			redirect(base_url('frontend/inicio'));
			
		}
			
	}     
	public function voluntariado()
    {
        $data = array('titulo' => 'iniciar session',
					  'campos' => $this->auth->campos_formulario(),
					  'token'  => $this->auth->token()       
				      );
        $this->load->view("frontend/v_header");
		$this->load->view("frontend/v_top_menu_inicio",$data);       
        $this->load->view("frontend/v_voluntarios");
        $this->load->view("frontend/v_social");				
		$this->load->view("frontend/v_footer");
    }

    public function politica()
    {
        $data = array('titulo' => 'iniciar session',
					  'campos' => $this->auth->campos_formulario(),
					  'token'  => $this->auth->token()       
				      );
        $this->load->view("frontend/v_header");
		$this->load->view("frontend/v_top_menu_inicio",$data);
        $this->load->view("frontend/v_politica");
        $this->load->view("frontend/v_social");				
		$this->load->view("frontend/v_footer");
    }
    public function historia()
    {
        $data = array('titulo' => 'iniciar session',
					  'campos' => $this->auth->campos_formulario(),
					  'token'  => $this->auth->token()       
				      );
        $this->load->view("frontend/v_header");
		$this->load->view("frontend/v_top_menu_inicio",$data);
        $this->load->view("frontend/v_historia");
        $this->load->view("frontend/v_social");				
		$this->load->view("frontend/v_footer");
    }
      public function somos()
    {
        $data = array('titulo' => 'iniciar session',
					  'campos' => $this->auth->campos_formulario(),
					  'token'  => $this->auth->token()       
				      );
        $this->load->view("frontend/v_header");
		$this->load->view("frontend/v_top_menu_inicio",$data);
        $this->load->view("frontend/v_somos");	
        $this->load->view("frontend/v_social");			
		$this->load->view("frontend/v_footer");
    }
    public function maltrato()
    {
        $data = array('titulo' => 'iniciar session',
					  'campos' => $this->auth->campos_formulario(),
					  'token'  => $this->auth->token()       
				      );
        $this->load->view("frontend/v_header");
		$this->load->view("frontend/v_top_menu_inicio",$data);
        $this->load->view("frontend/v_maltrato");
        $this->load->view("frontend/v_social");				
		$this->load->view("frontend/v_footer");
    }
    public function reg_maltrato()
    {
        if($this->input->post('denuncia'))        
            {
                $data = array('titulo' => 'iniciar session',
					  'campos' => $this->auth->campos_formulario(),
					  'token'  => $this->auth->token()       
				      );
                $this->m_inicio->add_denuncia();
                $mensaje='Su denucia fue enviada';
                $data1 = array('mensaje'=>$mensaje);
                $this->load->view("frontend/v_header");
        		$this->load->view("frontend/v_top_menu_inicio",$data);
                $this->load->view("frontend/v_maltrato",$data1);
                $this->load->view("frontend/v_social");				
        		$this->load->view("frontend/v_footer");
            }
    }
}
