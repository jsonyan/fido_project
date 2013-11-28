<?php
class M_historial extends CI_Model {
    function __construct(){
	    parent::__construct();
	}
	function get_animales_limite($limit,$start)
	{
		$this->db->where('revision_medica',1);
		$this->db->limit($limit,$start);
                $this->db->order_by("fecha_reg_animal","desc");
		$resultado = $this->db->get("animal");
		return $resultado->result_array();
	}	
	function get_animales_limite_word_key($limit,$start,$key)
	{
		$this->db->where('revision_medica',1);
                $this->db->like('nombre_animal',$key);
                $this->db->or_like('id_animal',$key);
                $this->db->or_like('sexo_animal',$key);
                $this->db->or_like('motivo_entrada',$key);
                $this->db->or_like('especie',$key);
                $this->db->or_like('raza',$key);
                $this->db->or_like('tamano',$key);
                $this->db->or_like('color',$key);
                $this->db->or_like('edad',$key);
                $this->db->or_like('fecha_reg_animal',$key);
                $this->db->or_like('fecha_nacimiento',$key);
                $this->db->or_like('caracteristicas',$key);
                $this->db->or_like('fecha_muerte',$key);
                $this->db->or_like('motivo_muerte',$key);
                $this->db->or_like('estado_encontrado',$key);
                $this->db->or_like('encontrado_por',$key);
                $this->db->or_like('direccion_encontrado',$key);
		$this->db->limit($limit,$start);
                $this->db->order_by("fecha_reg_animal","desc");
		$resultado = $this->db->get("animal");
	 
		return $resultado->result_array();
	}	
	function get_animales_nro_animales_word_key($limit,$start,$key)
	{
		$this->db->where('revision_medica',1);
                $this->db->like('nombre_animal',$key);
                $this->db->or_like('id_animal',$key);
                $this->db->or_like('sexo_animal',$key);
                $this->db->or_like('motivo_entrada',$key);
                $this->db->or_like('especie',$key);
                $this->db->or_like('raza',$key);
                $this->db->or_like('tamano',$key);
                $this->db->or_like('color',$key);
                $this->db->or_like('edad',$key);
                $this->db->or_like('fecha_reg_animal',$key);
                $this->db->or_like('fecha_nacimiento',$key);
                $this->db->or_like('caracteristicas',$key);
                $this->db->or_like('fecha_muerte',$key);
                $this->db->or_like('motivo_muerte',$key);
                $this->db->or_like('estado_encontrado',$key);
                $this->db->or_like('encontrado_por',$key);
                $this->db->or_like('direccion_encontrado',$key);
                $this->db->from('animal');
		$this->db->limit($limit,$start);
                $this->db->order_by("fecha_reg_animal","desc");
	 
		return $this->db->count_all_results();
	}
        function getHistoria($id){
            $this->db->where('animal_id',$id);
            $this->db->order_by("fecha_inicio", "desc");             
            $resultado = $this->db->get("ficha_medica");
            return $resultado->result_array();
        }

        
}
?>