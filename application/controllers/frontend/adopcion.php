<?php
class Adopcion extends CI_Controller {
   function __construct()
   {
      parent::__construct();
      
      $this->db = $this->load->database('default', TRUE); 
      $this->load->library('pagination');
      $this->load->model('m_animal', 'modelo');
      $this->load->helper(array('url'));
   }

   public function index($offset='')
   {
        $data = array('titulo' => 'iniciar session',
            'campos' => $this->auth->campos_formulario(),
            'token'  => $this->auth->token()       
	);
      	$data['mod_activo'] = "adopciones";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
		$this->load->view("frontend/v_header");
		$this->load->view("frontend/v_top_menu_inicio",$data);
		//$this->load->view("frontend/v_user_menu",$data);
		$this->load->view("frontend/v_animales");//Aqui cargas la vista de tu modulo
        $this->load->view("frontend/v_social");
		$this->load->view("frontend/v_footer");
        //$this->load->view('backend/v_evaluaciones'); // solo cargaremos la vista
   }

   public function lista($offset='')
   {
      $limit = 2;
      $total = $this->modelo->nro_adoptables();
      $data['animales_en_adopcion'] = $this->modelo->listar($limit, $offset);
      $config['base_url'] = base_url().'frontend/adopcion/lista/';
      $config['total_rows'] = $total;
      $config['per_page'] = $limit;
      $config['uri_segment'] = '4';
      $this->pagination->initialize($config);
      $data['pag_links'] = $this->pagination->create_links();
      $data['title'] = 'Pagination';
      //$data['total_rows'] = $total;      
      $this->load->view('frontend/v_lista_animales', $data);
   }
}