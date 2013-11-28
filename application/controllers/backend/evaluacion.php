<?php

class Evaluacion extends CI_Controller {
   function __construct()
   {
      parent::__construct();
       if($this->auth->is_logged() == FALSE)
		{
			
			redirect(base_url('frontend/inicio'));
			
		}

      $this->db = $this->load->database('default', TRUE); 
      $this->load->library('pagination');
      $this->load->model('m_evaluacion', 'modelo');
      $this->load->helper(array('url'));
      $this->load->library(array('session'));
      $this->load->helper(array('url'));
   }

   public function index($offset='')
   {
        $data = array(
            'mod_activo'=>"adopciones",
   
        );
      	$data['mod_activo'] = "adopciones";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
		$this->load->view("backend/v_header");
		$this->load->view("backend/v_top_menu",$data);
		$this->load->view("backend/v_user_menu",$data);
		$this->load->view("backend/v_evaluaciones");//Aqui cargas la vista de tu modulo
		$this->load->view("backend/v_footer");
        //$this->load->view('backend/v_evaluaciones'); // solo cargaremos la vista
   }

   public function lista($offset='')
   {
      
      $limit = 4;
      $total = $this->modelo->nro();
      $data['evaluaciones'] = $this->modelo->lista($limit, $offset);
      $config['base_url'] = base_url().'backend/Evaluacion/lista/';
      $config['total_rows'] = $total;
      $config['per_page'] = $limit;
      $config['uri_segment'] = '4';
      $this->pagination->initialize($config);
      $data['pag_links'] = $this->pagination->create_links();
      $data['title'] = 'Pagination';
      $this->load->view('backend/v_lista_evaluaciones', $data);      
   }
   public function leer_solicitud($codigo)
   {
        $this->load->model('m_evaluacion');
        $data = array(  
            'saludo'=>$this->session->userdata('usuario'),
            'perfil'=>$this->session->userdata('perfil'),
            'mod_activo'=>"adopciones",
            'eva'=>$this->modelo->lee_solicitud($codigo),
            'adoptante'=>$this->m_evaluacion->datos_adoptante($codigo),
            'animal'=>$this->modelo->datos_animal($codigo)   
        );
        $data['mod_activo'] = "adopciones";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
		$this->load->view("backend/v_header");
		$this->load->view("backend/v_top_menu",$data);
		$this->load->view("backend/v_user_menu",$data);
		$this->load->view("backend/v_solicitud",$data);//Aqui cargas la vista de tu modulo
		$this->load->view("backend/v_footer");            
   }
   public function leido($cod)
   {
        $this->load->model('m_evaluacion');
        $this->m_evaluacion->marcar_leido($cod);
        $data = array('eva'=>$this->modelo->lee_solicitud($cod),
                        'adoptante'=>$this->m_evaluacion->datos_adoptante($cod),
                        'animal'=>$this->modelo->datos_animal($cod),            
                        'mensaje1' => 'Esta soliditud ha sido marcado como LEIDO!! ahora puede ACEPTAR O RECHAZAR o simplemte salir');
                
                $data['mod_activo'] = "adopciones";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
        		$this->load->view("backend/v_header");
        		$this->load->view("backend/v_top_menu");
        		$this->load->view("backend/v_user_menu",$data);
        		$this->load->view("backend/v_solicitud",$data);//Aqui cargas la vista de tu modulo
        		$this->load->view("backend/v_footer");
                
   }
   public function rechazar($cod)
   {       
        $variable = $this->modelo->ver_estado($cod);
        if($variable == true)
            {
                
                $this->modelo->marcar_rechazar($cod);
                redirect(base_url().'backend/evaluacion');                
            }
            else
            {
                $data = array(          'eva'=>$this->modelo->lee_solicitud($cod),
                                        'adoptante'=>$this->modelo->datos_adoptante($cod),
                                        'animal'=>$this->modelo->datos_animal($cod),            
                                        'mensaje' => 'No puede rechazar la solicitud antes de LEERLO y marcarlo como Leido.');
                
                $data['mod_activo'] = "adopciones";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
        		$this->load->view("backend/v_header");
        		$this->load->view("backend/v_top_menu");
        		$this->load->view("backend/v_user_menu",$data);
        		$this->load->view("backend/v_solicitud",$data);//Aqui cargas la vista de tu modulo
        		$this->load->view("backend/v_footer");
            }
        
   }
   public function aceptar($cod)
   {
           
        $variable = $this->modelo->ver_estado($cod);
        if($variable == true)
            {
                
                $this->modelo->marcar_aceptar($cod);
                redirect(base_url().'backend/evaluacion');                
            }
            else
            {
                $data = array(          'eva'=>$this->modelo->lee_solicitud($cod),
                                        'adoptante'=>$this->modelo->datos_adoptante($cod),
                                        'animal'=>$this->modelo->datos_animal($cod),            
                                        'mensaje2' => 'No puede ACEPTAR la solicitud antes de LEERLO y marcarlo como Leido.');
                
                $data['mod_activo'] = "adopciones";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
        		$this->load->view("backend/v_header");
        		$this->load->view("backend/v_top_menu");
        		$this->load->view("backend/v_user_menu",$data);
        		$this->load->view("backend/v_solicitud",$data);//Aqui cargas la vista de tu modulo
        		$this->load->view("backend/v_footer");
            }
   
   }
      public function delete_evaluacion($id)
    {
        $verificar = $this->modelo->verifica_si_existe($id);
        
        if($verificar == false)
        {
            echo "La evaluacion No Existe";            
        }
        else
        {
            $this->modelo->delete_evaluacion($id);
            redirect(base_url().'backend/evaluacion');
        }
    }
    
   public function envio_de_email()
   {
        if($this->input->post('enviar'))
        {
          $this->modelo->envio_email();
          $mensaje = "Su mensaje fue enviado";
          $data = array('mensaje'=>$mensaje);
          redirect(base_url().'backend/evaluacion'); 
        }                         
   }
}
    