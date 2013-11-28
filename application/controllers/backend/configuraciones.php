<?php 
class Configuraciones extends CI_Controller {
	public function index() {
            show_404();
	}
        
        public function editar(){
		$data['razas_perros'] = $this->edita_config->getRazasPerros();
		$data['razas_gatos'] = $this->edita_config->getRazasGatos();

		$data['mod_activo'] = "config";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
		$this->load->view("backend/v_header");
		$this->load->view("backend/v_top_menu");
		$this->load->view("backend/v_user_menu",$data);
		$this->load->view("backend/configuracion/v_config",$data);//Aqui cargas la vista de tu modulo
		$this->load->view("backend/v_footer");
        }
        public function guardar1(){
                $perros = $this->input->post('perros');
                $gatos = $this->input->post('gatos');
                echo $perros;
                echo "<hr/>";
                echo $gatos;
        }
        public function guardar(){
                $perros = $this->input->post('perros');
                $gatos = $this->input->post('gatos');
                $band = $this->edita_config->guardar($perros,$gatos);
                if($band){
                    $data['msg'] = "<div class=\"alert alert-success span7\">
					 <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
					 <strong>Bie hecho!</strong> Datos guardados exitosamente.
					 <span id=\"code\" style=\"font-size:0px; display:inline;\">nuevo</span>
				  </div>";
                }else{
                    $data['msg'] = "<div class=\"alert alert-error span7\">
					 <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
					 <strong>Error!</strong> Hubo problemas al guardar el archivo.
					 <span id=\"code\" style=\"font-size:0px; display:inline;\">nuevo</span>
				  </div>";
                }
                $data['razas_perros'] = $this->edita_config->getRazasPerros();
                $data['razas_gatos'] = $this->edita_config->getRazasGatos();
                $data['script'] = "window.setTimeout(function() { $(\".alert\").alert('close'); }, 3000);";
		$data['mod_activo'] = "config";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
		$this->load->view("backend/v_header");
		$this->load->view("backend/v_top_menu");
		$this->load->view("backend/v_user_menu",$data);
		$this->load->view("backend/configuracion/v_config",$data);//Aqui cargas la vista de tu modulo
		$this->load->view("backend/v_footer");
        }
} 
?>
