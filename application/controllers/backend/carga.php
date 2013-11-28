<?php 
class Carga extends CI_Controller {
	public function index() {
		$data['mod_activo'] = "adopciones";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
		$this->load->view("backend/v_header");
		$this->load->view("backend/v_top_menu");
		$this->load->view("backend/v_user_menu",$data);
		$this->load->view("backend/mod_animales/v_form-animal");//Aqui cargas la vista de tu modulo
		$this->load->view("backend/v_footer");
	}
} 
?>
