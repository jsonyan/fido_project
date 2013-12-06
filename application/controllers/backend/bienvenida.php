<?php 
class Bienvenida extends CI_Controller {
	function __construct()
   {
      parent::__construct();
      if($this->auth->is_logged() == FALSE)
		{
			
			redirect(base_url('frontend/inicio'));
			
		}
   }

    public function index() {
	 
        $this->load->model('m_evaluacion');
        $this->load->model('m_usuarios');
        /// PARA MOSTRAR NRO DE SOLICITUDES ENVIADAS
        $nro_sol=$this->m_evaluacion->no_leidos();        
        foreach ($nro_sol as $row)
        {
           $nro_sol1=$row->nro;           
        }
        /////PARA MOSTRAR SOLICITUDES NUEVAS DE VOLUNTARIOS
        $nro_vol=$this->m_usuarios->vol_no_aceptados();
        foreach ($nro_vol as $fila)
        {
           $nro_vol1=$fila->nro;           
        }
        $data['nro_sol_vol']=$nro_vol1;
        $data['nro_de_solicitudes']=$nro_sol1;
		$data['mod_activo'] = "";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
		$this->load->view("backend/v_header");
		$this->load->view("backend/v_top_menu");
		$this->load->view("backend/v_user_menu",$data);
		$this->load->view("backend/v_bienvenida");//Aqui cargas la vista de tu modulo
		$this->load->view("backend/v_footer");
	}
    public function logout_user()
	{
		$this->auth->logout();
	}
    
} 
?>
