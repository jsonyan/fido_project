<?php
class M_seguimiento extends CI_Model {
        function __construct(){
	    parent::__construct();
	}
        function get_voluntario_id($id){
		$queryStr = "SELECT * FROM usuarios, voluntario WHERE voluntario.usuario_id = usuarios.id_usuario AND id_voluntario = '".$id."'";
		$query = $this->db->query($queryStr);
		return $query->result_array();
        }
        function get_animales(){
		$queryStr = "SELECT * FROM animal WHERE en_seguimiento = 0";
		$query = $this->db->query($queryStr);
		return $query->result_array();
        }
        function get_casos($id){
		$queryStr = "SELECT * FROM asigna_seguimiento, animal WHERE voluntario_id =".$id." AND animal_id = id_animal";
		$query = $this->db->query($queryStr);
		return $query->result_array();
        }
	function get_voluntarios_limite($limit,$start)
	{
		$queryStr = "SELECT * FROM usuarios JOIN voluntario ON voluntario.usuario_id = usuarios.id_usuario";
		$this->db->limit($limit,$start);
		$resultado = $this->db->query($queryStr);
		return $resultado->result_array();
	}	
	function get_nro_voluntarios()
	{
		$this->db->where('voluntario.usuario_id','usuarios.id_usuario');
		$this->db->get('voluntario,usuarios');

                return $this->db->count_all_results();
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
            $this->db->where('id_animal',$id);
            $this->db->order_by("fecha_inicio", "desc");             
            $resultado = $this->db->get("ficha_medica");
            return $resultado->result_array();
        }

        
}
?>