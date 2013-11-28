<?php 
class Mod_reportes extends CI_Controller {
	public function index() {
            $this->load->model('m_reportes');
            $data['mod_activo'] = "reportes";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
            $resultados['mod_activo'] = "reportes";//Indicamos el modulo activo(clave: animales, adopciones, medico, seguimientos, usuarios, donaciones, reportes, config)
            $resultados['sexo'] = $this->m_reportes->animales_por_sexo();
            $resultados['especie'] = $this->m_reportes->animales_por_especie();
            $resultados['raza'] = $this->m_reportes->animales_por_raza();
            $resultados['entrada'] = $this->m_reportes->animales_por_entrada();
            $resultados['esterilizado'] = $this->m_reportes->animales_por_esterilizado();
            $resultados['registrados_mes'] = $this->m_reportes->registrados_mes();
            $resultados['registrados_anio'] = $this->m_reportes->registrados_anio();
            
            $this->load->view("backend/v_header",$data);
            $this->load->view("backend/v_top_menu",$data);
            $this->load->view("backend/v_user_menu",$data);
            $this->load->view("backend/mod_reportes/v_reportes",$resultados);//Aqui cargas la vista de tu modulo
            $this->load->view("backend/v_footer");
	}
        
} 
?>
