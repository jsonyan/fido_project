<?php

class Mod_refugios extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	function index(){
		show_404();
	}
        function llenar_asignacion(){
                $data['id_animal'] = $this->input->post('id_animal');
                $datillo = array(
                    'en_seguimiento' => 1
                );
                $this->db->where('id_animal',$this->input->post('id_animal'));
                $this->db->update('animal',$datillo);
                
                $data['id_voluntario'] =  $this->input->post('id_voluntario');
		$data['mod_activo'] = "refugios";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
		$this->load->view("backend/v_header",$data);
		$this->load->view("backend/v_top_menu");
		$this->load->view("backend/v_user_menu",$data);
		$this->load->view("backend/mod_seguimiento/v_form_seguimiento",$data);//Aqui cargas la vista de tu modulo
		$this->load->view("backend/v_footer");
        }
        function asignar($id_voluntario = ''){
            if($id_voluntario == ''){
                show_404 ();
            }else{
                $data['id_voluntario'] = $id_voluntario;
		$data['animales'] = $this->m_seguimiento->get_animales();
		$data['casos'] = $this->m_seguimiento->get_casos($id_voluntario);
		$data['voluntario'] = $this->m_seguimiento->get_voluntario_id($id_voluntario);
		$data['mod_activo'] = "refugios";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
		$this->load->view("backend/v_header",$data);
		$this->load->view("backend/v_top_menu");
		$this->load->view("backend/v_user_menu",$data);
		$this->load->view("backend/mod_seguimiento/v_inicio",$data);//Aqui cargas la vista de tu modulo
		$this->load->view("backend/v_footer");
            }
        }
        
        public function ubicar(){
		$datos['mod_activo'] = "refugios";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
		$this->load->view("backend/v_header_map2",$datos);
		$this->load->view("backend/v_top_menu");
		$this->load->view("backend/v_user_menu",$datos);
		$this->load->view("backend/mod_refugios/v_ubicar",$datos);//Aqui cargas la vista de tu modulo
		$this->load->view("backend/v_footer");
        }

	
	public function inicio(){
		$datos['mod_activo'] = "refugios";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
		$this->load->view("backend/v_header_map1",$datos);
		$this->load->view("backend/v_top_menu");
		$this->load->view("backend/v_user_menu",$datos);
		$this->load->view("backend/mod_refugios/v_inicio",$datos);//Aqui cargas la vista de tu modulo
		$this->load->view("backend/v_footer");

//		$this->load->view('v_inicio-animal',$datos);
	
	}
	
}
?>