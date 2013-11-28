<?php
class M_animal extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function nro_adoptables()
    {           
        return $this->db->query('SELECT a.id_animal, a.nombre_animal,a.sexo_animal, a.raza,a.edad, a.caracteristicas,a.foto_animal,a.sexo_animal
                                        FROM animal a
                                        WHERE a.fecha_muerte IS NULL 
                                            AND a.adoptable = "1"
                                            AND NOT EXISTS (
	                                                       SELECT animal_id
                                                        FROM adoptado ad
                                                    WHERE a.id_animal = ad.animal_id
	                                   )

                                        ')->num_rows();
    }

    public function listar($limit,$offset)
    {                                                  
      $this->db->limit($limit, $offset);
      $query = $this->db->get_where('animal', array('adoptable' =>'1'));
      return $query->result();
    }       
}