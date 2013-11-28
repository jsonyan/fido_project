<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
      $this->load->model('m_animal', 'modelo');
      $this->load->helper(array('url'));
   }

   public function index($offset='')
   {
     
        $data = array(        
            'saludo'=>$this->session->userdata('usuario'),
            'perfil'=>$this->session->userdata('perfil'),
            'mod_activo'=>"adopciones",
   
        );
      	$data['mod_activo'] = "adopciones";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
		$this->load->view("frontend/v_header");
		$this->load->view("frontend/v_top_menu",$data);
		//$this->load->view("frontend/v_user_menu",$data);
		$this->load->view("frontend/v_adopciones");//Aqui cargas la vista de tu modulo
        $this->load->view("frontend/v_social");
		$this->load->view("frontend/v_footer");
        //$this->load->view('backend/v_evaluaciones'); // solo cargaremos la vista
   }

   public function lista($offset='')
   {
       
      $limit = 2;
      $total = $this->modelo->nro_adoptables();
      $data['animales_en_adopcion'] = $this->modelo->listar($limit, $offset);
      $config['base_url'] = base_url().'frontend/evaluacion/lista/';
      $config['total_rows'] = $total;
      $config['per_page'] = $limit;
      $config['uri_segment'] = '4';
      $this->pagination->initialize($config);
      $data['pag_links'] = $this->pagination->create_links();
      $data['title'] = 'Pagination';
      $data['saludo']=$this->session->userdata('usuario');
      $this->load->view('frontend/v_lista_adopciones', $data);
   }
    
    
    public function ver_formulario()
    {     
        if($this->input->post('id_a')!='')
        {
            $data = array(
                'titulo' => 'Bienvenidos',
                'codigo_a'=>$this->input->post('id_a'),                
                'saludo'=>$this->session->userdata('usuario'),
                'perfil'=>$this->session->userdata('perfil')
                
            );
            $data['mod_activo'] = "adopciones";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
    		$this->load->view("frontend/v_header");
    		$this->load->view("frontend/v_top_menu",$data);
    		//$this->load->view("frontend/v_user_menu",$data);
    		$this->load->view('frontend/v_form_evaluacion',$data);//i cargas la vista de tu modulo
            $this->load->view("frontend/v_social");
    		$this->load->view("frontend/v_footer");
        } 
        else
        {
            redirect(base_url().'frontend/evaluacion');
        }               
    }
    public function add_evaluacion()
    {        
        $this->load->model('m_evaluacion');
        if($this->input->post('submit'))
        {
            $this->m_evaluacion->inserta();
            $data1=array(
                    'mensaje'=>'Su solicitud fue enviada correctamente. pronto le enviaremos una Respuesta'
            );
            $data['mod_activo'] = "adopciones";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
    		$this->load->view("frontend/v_header");
    		$this->load->view("frontend/v_top_menu",$data);
    		//$this->load->view("frontend/v_user_menu",$data);
    		$this->load->view('frontend/v_adopciones',$data1);//i cargas la vista de tu modulo
            $this->load->view("frontend/v_social");
    		$this->load->view("frontend/v_footer");            
        }
        else
        {
            redirect(base_url().'frontend/evaluacion');
        }
}

	public function logout_user()
	{
		
		$this->auth->logout();

	}
}