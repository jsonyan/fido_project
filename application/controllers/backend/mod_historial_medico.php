<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_historial_medico extends CI_Controller {

	public function index()
	{
//		$this->load->view('v_form-ficha_medica');
			show_404();
	}
        
	public function ver_todos($clave = ''){
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
		$opciones['base_url'] = base_url().'index.php/backend/mod_historial_medico/ver_todos';
		$opciones['uri_segment'] = 4;
                
                $clave = $this->input->post('clave');
                if($clave == ''){
                    $datos['fichas'] = $this->m_historial->get_animales_limite(10,$desde);
                    $this->db->where('revision_medica',1);
                    $opciones['total_rows'] = $this->db->count_all_results('animal');
                }else{
                    $datos['fichas'] = $this->m_historial->get_animales_limite_word_key(10,$desde,$clave);
                    $opciones['total_rows'] = $this->m_historial->get_animales_nro_animales_word_key(10,$desde,$clave);
                }
		$this->pagination->initialize($opciones);
		$datos['paginacion'] = $this->pagination->create_links(); 


		$datos['mod_activo'] = "medico";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
		$this->load->view("backend/v_header",$datos);
		$this->load->view("backend/v_top_menu");
		$this->load->view("backend/v_user_menu",$datos);
		$this->load->view("backend/mod_historial_medico/v_inicio-historial",$datos);//Aqui cargas la vista de tu modulo
		$this->load->view("backend/v_footer");

	}

        
        public function ver_historia($id_animal = ""){
		if(strlen($id_animal)==0){
			show_404();
		}else{
			$queryStr = "SELECT * FROM `animal` WHERE id_animal = '".$id_animal."'";
			$query = $this->db->query($queryStr);
			$data['datos_animal']= $query->result_array();
                        $data['historia'] = $this->m_historial->getHistoria($id_animal);
                        $datos['mod_activo'] = "medico";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
                        $this->load->view("backend/v_header",$datos);
                        $this->load->view("backend/v_top_menu");
                        $this->load->view("backend/v_user_menu",$datos);
                        $this->load->view('backend/mod_historial_medico/v_historia',$data);
                        $this->load->view("backend/v_footer");
                 }
	}
        public function borrar_ficha(){
            $id_ficha = $this->input->post('id_ficha');
            $id_animal = $this->input->post('id_animal');
            $this->db->where('id_ficha', $id_ficha);
            $this->db->delete('ficha_medica'); 
            redirect(base_url()."index.php/backend/mod_historial_medico/ver_historia/".$id_animal);
        }
	public function guarda_ficha(){
            $id_veterinario = 1;
            $datos = array(
                'motivo_consulta'=>$this->input->post('motivo'),
                'diagnostico'=>$this->input->post('diagnostico'),
                'tratamiento'=>$this->input->post('tratamiento'),
                'vacunas'=>$this->input->post('vacunas'),
                'animal_id'=>$this->input->post('id_animal'),
                'veterinario_id'=>$id_veterinario
            );
            $this->db->set('fecha_inicio','NOW()',false);
            $this->db->insert('ficha_medica',$datos);
            $id_animal = $this->input->post('id_animal');
            redirect(base_url()."index.php/backend/mod_historial_medico/ver_historia/".$id_animal);

            echo "<div id=\"msg\"><p class=\"alert alert-success\"><a class=\"close\" data-dismiss=\"alert\" href=\"#\">&times;</a><i class=\"icon-ok\"></i> Guardado exitosamente</p></div>";
	}
        public function edita_ficha(){
            $id_animal = $this->input->post('id_animal');
            $id_ficha = $this->input->post('id_ficha');
            $datos = array(
                'motivo_consulta'=>$this->input->post('motivo'),
                'diagnostico'=>$this->input->post('diagnostico'),
                'tratamiento'=>$this->input->post('tratamiento'),
                'vacunas'=>$this->input->post('vacunas')
            );
            $this->db->where('id_ficha',$id_ficha);
            $this->db->update('ficha_medica',$datos);
            echo "<div id=\"msg\"><p class=\"alert alert-success\"><a class=\"close\" data-dismiss=\"alert\" href=\"#\">&times;</a><i class=\"icon-ok\"></i> Actualizado exitosamente</p></div>";
        }
}
