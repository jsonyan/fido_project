<?php
class M_inicio extends CI_Model
{
    public function __construct()
    {
        parent::__construct();            
    }        
       
    public function nro()
        {
            return $this->db->query('SELECT a.id_animal, a.nombre_animal,a.sexo_animal, a.raza,a.edad, a.caracteristicas,a.foto_animal,a.sexo_animal
                                        FROM animal a
                                        WHERE a.motivo_muerte IS NULL 
                                            AND a.adoptable = "si"
                                            AND NOT EXISTS (
	                                                       SELECT animal_id
                                                        FROM adoptado ad
                                                    WHERE a.id_animal = ad.animal_id
	                                   )')->num_rows();
            
        }
        public function mostrar_animales_en_adopcion($per_page)
        {
             
            $datos=$this->db->get_where('animal', array('adoptable' =>'si', 'muerto'=>0,'adoptado'=>0),$per_page,$this->uri->segment(4));
            return $datos->result();
        }
        public function add_denuncia()
        {
            $this->db->set( 'fecha_registro','NOW()',false); 
            $this->db->insert('denuncia',array(
                            /*'id_usuario'=>$code,*/
                            'nombre'=>$this->input->post('nombre',TRUE),
                            'correo'=>$this->input->post('email',TRUE),
                            'asunto'=>$this->input->post('motivo',TRUE),
                            'descripcion'=>$this->input->post('hecho',TRUE),
                            'maltratado'=>$this->input->post('maltrato',TRUE),                            
                            ));
            $this->db->set( 'fecha_registro','NOW()',false);

        }
    public function nro_star()
    {
        {
            return $this->db->query('SELECT a.id_animal, a.nombre_animal,a.sexo_animal, a.raza,a.edad, a.caracteristicas,a.foto_animal,a.sexo_animal
                                        FROM animal a
                                        WHERE a.adoptable=0 and revision_medica=1')->num_rows();
            
        }
    }
    public function listar_star($limit,$offset)
    {                                                  
      $this->db->limit($limit, $offset);
      $query = $this->db->get_where('animal', array('revision_medica' =>'1','adoptable'=>'0'));
      return $query->result();
    }    
}