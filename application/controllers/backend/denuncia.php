<?php

class Denuncia extends CI_Controller {
   function __construct()
   {
      parent::__construct();
      if($this->auth->is_logged() == FALSE)
		{
			
			redirect(base_url('frontend/inicio'));
			
		}
      $this->db = $this->load->database('default', TRUE); 
      $this->load->library('pagination');
      $this->load->model('m_denuncias', 'modelo');
      $this->load->helper(array('url'));
      $this->load->library(array('session'));     
   }

   public function index($offset='')
   {
        $data = array(        
            'saludo'=>$this->session->userdata('usuario'),
            'perfil'=>$this->session->userdata('perfil'),
            'mod_activo'=>"animales",   
        );
        
      	$data['mod_activo'] = "adopciones";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
		$this->load->view("backend/v_header");
		$this->load->view("backend/v_top_menu",$data);
		$this->load->view("backend/v_user_menu",$data);
		$this->load->view("backend/v_denuncias");//Aqui cargas la vista de tu modulo
		$this->load->view("backend/v_footer");
        //$this->load->view('backend/v_evaluaciones'); // solo cargaremos la vista
   }
   
   public function lista($offset='')
   {
      
      $limit = 4;
      $total = $this->modelo->nro();
      $data['denuncias'] = $this->modelo->listar($limit, $offset);
      $config['base_url'] = base_url().'backend/denuncia/lista/';
      $config['total_rows'] = $total;
      $config['per_page'] = $limit;
      $config['uri_segment'] = '4';
      $this->pagination->initialize($config);
      $data['pag_links'] = $this->pagination->create_links();
      $data['title'] = 'Pagination';
      $this->load->view('backend/v_lista_denuncias', $data);
   }
    }