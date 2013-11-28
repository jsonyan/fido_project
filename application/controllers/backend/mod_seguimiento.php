<?php

class Mod_seguimiento extends CI_Controller {

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
		$data['mod_activo'] = "seguimientos";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
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
		$data['mod_activo'] = "seguimientos";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
		$this->load->view("backend/v_header",$data);
		$this->load->view("backend/v_top_menu");
		$this->load->view("backend/v_user_menu",$data);
		$this->load->view("backend/mod_seguimiento/v_asignar",$data);//Aqui cargas la vista de tu modulo
		$this->load->view("backend/v_footer");
            }
        }

	
	public function inicio_seguimiento($clave = ''){
		$this->load->library('pagination');
		$opciones = array();
		$desde = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
		$opciones['full_tag_open'] = '<div class="pagination pagination-small pagination-centered"><ul>';
		$opciones['full_tag_close'] = '</ul></div>';
		$opciones['next_link'] = 'Sig.';
		$opciones['next_tag_open'] = '<li>';
		$opciones['next_tag_close'] = '</li>';
		$opciones['prev_link'] = 'Prev.';
		$opciones['prev_tag_open'] = '<li>';
		$opciones['prev_tag_close'] = '</li>';
		$opciones['num_tag_open'] = '<li>';
		$opciones['num_tag_close'] = '</li>';
		$opciones['cur_tag_open'] = '<li class="active"><span>';
		$opciones['cur_tag_close'] = '</span></li>';

		$opciones['per_page'] = 10;
		$opciones['base_url'] = base_url().'index.php/backend/mod_animales/ver_todos';
		$opciones['uri_segment'] = 4;
                
                $clave = $this->input->post('clave');
                if($clave == ''){
                    $datos['fichas'] = $this->m_seguimiento->get_voluntarios_limite(10,$desde);
                    $opciones['total_rows'] = $this->m_seguimiento->get_nro_voluntarios();
                }else{
                    $datos['fichas'] = $this->m_animales->get_animales_limite_word_key(10,$desde,$clave);
                    $opciones['total_rows'] = $this->m_animales->get_animales_nro_animales_word_key(10,$desde,$clave);
                }
		$this->pagination->initialize($opciones);
		$datos['paginacion'] = $this->pagination->create_links(); 


		$datos['mod_activo'] = "seguimientos";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
		$this->load->view("backend/v_header",$datos);
		$this->load->view("backend/v_top_menu");
		$this->load->view("backend/v_user_menu",$datos);
		$this->load->view("backend/mod_seguimiento/v_inicio_seguimiento",$datos);//Aqui cargas la vista de tu modulo
		$this->load->view("backend/v_footer");

//		$this->load->view('v_inicio-animal',$datos);
	
	}
        function guardar_seguimiento(){
            $data['animal_id'] = $this->input->post('id_animal');
            $data['voluntario_id'] = $this->input->post('id_voluntario');
            $data['caso'] = $this->input->post('caso');
            $data['monto'] = $this->input->post('monto');
            $data['tareas'] = $this->input->post('tareas');
            $data['fecha_inicio'] = $this->input->post('fecha_inicio');
            $data['fecha_fin'] = $this->input->post('fecha_fin');
            $this->db->insert('asigna_seguimiento',$data);
            $msg = "<div class=\"alert alert-success span8\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Bien hecho!</strong></div>";
	    echo $msg;
        }
	
}
?>