<?php
class M_denuncias extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function nro()
    {           
        return $this->db->query('SELECT * FROM denuncia')->num_rows();
    }

    public function listar($limit,$offset)
    {                                                  
      $this->db->limit($limit, $offset);
      $query = $this->db->get('denuncia');
      return $query->result();
    }       
}