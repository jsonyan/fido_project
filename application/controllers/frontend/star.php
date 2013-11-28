<?php if ( ! ('BASEPATH')) exit('No direct script access allowed'); 

class Star extends CI_Controller
{
	
	public function __construct()
	{
		
		parent::__construct();
		
		if($this->auth->is_logged() == TRUE)
		{
			
			redirect(base_url('backend/bienvenida'));
			
		}
        $this->load->model('m_inicio','modelo');
        $this->db = $this->load->database('default', TRUE); 
      $this->load->library('pagination');
      $this->load->helper(array('url'));
			
	}

   public function index($offset='')
   {
        $data = array('titulo' => 'iniciar session',
					  'campos' => $this->auth->campos_formulario(),
					  'token'  => $this->auth->token()       
				      );
		$this->load->view("frontend/v_header");
		$this->load->view("frontend/v_top_menu_inicio",$data);		
		$this->load->view("frontend/v_star");//Aqui cargas la vista de tu modulo
        $this->load->view("frontend/v_social");
		$this->load->view("frontend/v_footer");        
   }

 public function lista($offset='')
   {
       
      $limit = 2;
      $total = $this->modelo->nro_star();
      $data['animales_en_star'] = $this->modelo->listar_star($limit, $offset);
      $config['base_url'] = base_url().'frontend/star/lista/';
      $config['total_rows'] = $total;
      $config['per_page'] = $limit;
      $config['uri_segment'] = '4';
      $this->pagination->initialize($config);
      $data['pag_links'] = $this->pagination->create_links();
      $data['title'] = 'Pagination';
      $data['hay'] = $total;
      $this->load->view('frontend/v_lista_star', $data);
   }
}