<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Auth
{
	
	protected $ci;	
	public function __construct()
	{
		
		$this->ci =& get_instance();
		
	}

	public function token()
    {
    	
        $token = md5(uniqid(rand(),true));
        $this->ci->session->set_userdata('token',$token);
        return $token;
		
    }
	public function is_logged()
	{
		
		return $this->ci->session->userdata('email') !== FALSE ? TRUE : FALSE;
			
	}
	
	public function campos_formulario()
	{
		
		$campos = array('input_email' => 
					array(  'name'    => 'email',
						    'id'      => 'email',
						    'type'    => 'email',
							'required'    => 'true',
							'placeholder' => 'Introduce tu email',
							'maxlength'   => '100',
							'value'       =>  set_value('email')),
					  'input_password' => 
					 array( 'name'        => 'pass',
							'id'          => 'pass',
							'placeholder' => 'Introduce tu password',
							'maxlength'   => '100',
							'value'       =>  set_value('pass')
						   )	          
				      );
					  
		return $campos;		
	}
	
	public function validar()
	{
		
		//si es el formulario de registro validamos el captcha
		if($this->ci->input->post('recaptcha_challenge_field'))
		{
			
			$this->ci->form_validation->set_rules('recaptcha_response_field', 'codigo captcha','callback_verifica_captcha|xss_clean');

		}
		
            $this->ci->form_validation->set_rules('nombre','Nombre','required');
            $this->ci->form_validation->set_rules('apellidos','Apellidos','required');
            $this->ci->form_validation->set_rules('ci','ci','required');
            $this->ci->form_validation->set_rules('face');
            $this->ci->form_validation->set_rules('fijo');
            $this->ci->form_validation->set_rules('movil','celular','required');
            $this->ci->form_validation->set_rules('ciudad','ciudad','required');
            $this->ci->form_validation->set_rules('direccion','direccion','required');
            $this->ci->form_validation->set_rules('ocupacion','ocupacion','required');
            $this->ci->form_validation->set_rules('dd','dia','required');
            $this->ci->form_validation->set_rules('mm','mes','required');
            $this->ci->form_validation->set_rules('aa','aa','required');
            
		$this->ci->form_validation->set_rules('email', 'email', 'required|trim|min_length[2]|valid_email|max_length[100]|xss_clean');
        $this->ci->form_validation->set_rules('pass', 'pass', 'required|trim|min_length[4]|max_length[100]|xss_clean');
        
        
        $this->ci->form_validation->set_message('required', 'El %s es requerido');
		$this->ci->form_validation->set_message('valid_email', 'El %s no es correcto');
        $this->ci->form_validation->set_message('min_length', 'El %s debe tener al menos %s carácteres');
        $this->ci->form_validation->set_message('max_length', 'El %s debe tener al menos %s carácteres');
		
		if($this->ci->form_validation->run() == FALSE)
		{
			
			return FALSE;
			
		}
		
		return TRUE;
		
	}
    	public function registro_usuario($email,$password)
	{
		
		$query = $this->ci->db->get_where('users', array('email' => $email));
		$query1 = $this->ci->db->get_where('usuarios', array('email' => $email));
        	
		if($query->num_rows() == 1 or $query1->num_rows() == 1)
		{
				
			return TRUE;
				
		}else{
			
		    $hash = $this->ci->bcrypt->hash_password($password);      
            if ($this->ci->bcrypt->check_password($password, $hash))
            {
            		
				$data = array('email' => $email, 'password' => $hash,'rol'=>'adoptante');	
				$this->ci->db->insert('users',$data);
				
			}
				
		}
		
	}
		
	public function login_user($email,$password)
	{
		
		$this->ci->db->where('email',$email);
		
        $query = $this->ci->db->get('users');
		    
        if($query->num_rows() == 1)
        {
            $user = $query->row();
            $pass = $user->password;
		  if($this->ci->bcrypt->check_password($password, $pass))
		  {
				$query = $this->ci->db->get_where('users', array('email' => $email,'password' => $pass));
					
				if($query->num_rows() == 0)
				{
						
					return FALSE;
						
				}else{
						
					return TRUE;
						
				}
		  }

	   }
	
	}
    //para iniciar sesion
    public function validate()
	{
		
		//si es el formulario de registro validamos el captcha
		$this->ci->form_validation->set_rules('email', 'email', 'required');
        $this->ci->form_validation->set_rules('pass', 'pass', 'required');
        
        $this->ci->form_validation->set_message('required', 'El %s es requerido');		
        
		if($this->ci->form_validation->run() == FALSE)
		{
			
			return FALSE;
			
		}
		
		return TRUE;
		
	}
	
	//para crear sessioness----
	public function crear_sesiones($email,$password)
	{
		
		$data = array('email' => $email, 'pass' => $this->ci->bcrypt->hash_password($password));
		
		$this->ci->session->set_userdata($data);
		
	}
	
	
	public function send_mail($email,$password)
	{
		
		$config['useragent'] = "CodeIgniter";
		$config['mailpath']	 = "/usr/sbin/sendmail";	
		$config['protocol']	 = "smtp";	
		$config['smtp_host'] = "ssl://smtp.gmail.com";	
		$config['smtp_user'] = "oscar.yavi@gmail.com";	
		$config['smtp_pass'] = "oscar";
		$config['smtp_port'] = "465";
		$config['mailtype']	= "html";
		$config['charset'] = "utf-8";			
					
		$this->ci->load->library('email',$config);
		$this->ci->email->set_newline("\r\n");
		$this->ci->email->from('Codeigniter','Librería de login');
        $this->ci->email->to($email);
        $this->ci->email->subject('Se ha registrado correctamente.');
        $this->ci->email->message('Sus datos de acceso:<br /><br />Email: '.$email. '<br />Password: '.$password);
        $this->ci->email->send();	
			
	}
	
	public function logout()
	{
				
		$this->ci->session->unset_userdata(array('email', 'pass'));
		$this->ci->session->sess_destroy();	
		$this->ci->session->sess_create(); 
		$this->ci->session->set_flashdata('cerrada','La sessi&oacute;n se ha cerrado.');
		redirect(base_url('frontend/inicio','refresh'));			
		
	}
		
}
