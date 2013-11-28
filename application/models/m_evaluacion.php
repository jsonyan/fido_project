<?php
class M_evaluacion extends CI_Model {
   function __construct()
   {
      parent::__construct();
   }

   public function nro()
   {
      return $this->db->count_all_results('evaluacion');
   }

   public function lista($limit, $offset)
   {
      $this->db->limit($limit, $offset);
      $this->db->order_by('fecha_solicitud','desc');      
      $query = $this->db->get('evaluacion');      
      return $query->result();
   }
   
    public function inserta()
        {
                $correo=$this->input->post('adoptante');
                $consulta = $this->db->get_where('usuarios',array('email' => $correo));
                
                foreach($consulta->result_array() as $fila)
                    $id=$fila['id_usuario'];
           /* $code = rand(1000,9999999);*/
            $data = array(
/*                'id_evaluacion'=>$code,*/
                'usuario_id'=>$id,
                'animal_id'=>$this->input->post('id_animal'),
                'tipo_vivienda'=> $this->input->post('tipo_vivienda'),
                'permite_animal1'=> $this->input->post('permite_animal1'),
                'jardin'=> $this->input->post('jardin'),
                'patio'=> $this->input->post('patio'),
                'terraza'=> $this->input->post('terraza'),
                'duplex'=> $this->input->post('duplex'),                            
                'su_vivienda_es'=> $this->input->post('vivienda'),
                'no_propio'=> $this->input->post('permite2'),
                'propietario'=>$this->input->post('dueno'),
                'fono_propietario'=>$this->input->post('teldueno'),
                'nro_persona'=> $this->input->post('nro_persona'),
                'ninos'=> $this->input->post('ninos'),
                'nro_ninos'=> $this->input->post('nro_ninos'),
                'edad_ninos'=> $this->input->post('edad_ninos'),                
                'dia'=> $this->input->post('dia'),
                'noche'=> $this->input->post('noche'),
                'cadena'=> $this->input->post('pcadena'),
                'motivo_cadena'=> $this->input->post('motivo'),
                'deacuerdo_esterilizado'=> $this->input->post('deacuerdo'),
                'otros_animales'=> $this->input->post('otros_animales'),
                'nperro'=>$this->input->post('nperro'),
                'nhp'=>$this->input->post('nhp'),
                'nmp'=>$this->input->post('nmp'),
                'edad_perro'=>$this->input->post('edad_perro'),
                'raza_perro'=> $this->input->post('raza_perro'),
                'ngato'=>$this->input->post('ngato'),
                'nhg'=>$this->input->post('nhg'),
                'nmg'=>$this->input->post('nmg'),
                'edad_gato'=>$this->input->post('edad_gato'),
                'raza_gato'=> $this->input->post('raza_gato'),
                'otros_animales2'=>$this->input->post('otros_animales2'),
                'estan_esterilizado'=> $this->input->post('estan_esterilizado'),
                'porque'=> $this->input->post('porque'),
                'estos_son'=> $this->input->post('estos_son'),
                'con_veterinario'=> $this->input->post('con_veterinario'),
                'dir_veterinario'=> $this->input->post('dir_veterinario'),                
                'ya_adopto'=> $this->input->post('ya_adopto'),
                'donde_adopto'=> $this->input->post('adopto'),
                'comentario'=> $this->input->post('comentario'),
                'leido'=>'0',
                'aceptado'=>'0'
                );
        $this->db->set( 'fecha_solicitud','NOW()',false); 
        $this->db->insert('evaluacion',$data);
        }
   public function lee_solicitud($codigo)
   {
        $query = $this->db->get_where('evaluacion', array('id_evaluacion' =>$codigo));
        return $query->result();
   }
   public function datos_adoptante($codigo)
   {
        $this->db->select('usuario_id');
        $query=$this->db->get_where('evaluacion', array('id_evaluacion' =>$codigo));
        foreach($query->result_array() as $fila)
                    $id=$fila['usuario_id'];                    
        $consulta=$this->db->get_where('usuarios', array('id_usuario' =>$id));
        return $consulta->result();
   }
   public function datos_animal($codigo)
   {
        $this->db->select('animal_id');
        $query = $this->db->get_where('evaluacion', array('id_evaluacion' =>$codigo));
        foreach($query->result_array() as $fila)
                    $id=$fila['animal_id'];
                    
        $consulta=$this->db->get_where('animal', array('id_animal' =>$id));
        return $consulta->result();
   }
     
     public function ver_estado($code)
     {
        $consulta =$this->db->get_where('evaluacion',array('id_evaluacion'=>$code,'leido'=>'1'));
        if($consulta->num_rows() == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
     }
   public function marcar_leido($cod)
   {
        $this->db->where('id_evaluacion',$cod);
        $this->db->update('evaluacion',array('leido'=>'1'));
   }
   public function marcar_rechazar($cod)
   {
        $this->db->where('id_evaluacion',$cod);
        $this->db->update('evaluacion',array('aceptado'=>'1'));
   }
   public function marcar_aceptar($cod)
   {
        $this->db->where('id_evaluacion',$cod);
        $this->db->update('evaluacion',array('aceptado'=>'2'));
   }
   public function no_leidos()
   {
    $consulta=$this->db->query('SELECT count(leido) as nro FROM `evaluacion` WHERE leido=0');
        return $consulta->result();
   }
    public function delete_evaluacion($id)
    {
        $this->db->delete('evaluacion',array('id_evaluacion'=>$id));
    }
    public function verifica_si_existe($id)
    {
         $consulta = $this->db->get_where('evaluacion',array('id_evaluacion' => $id));
        if($consulta->num_rows() > 0)
        {
            return $consulta->row_array();
        }
        else
        {
            return false;
        }
    }
    public function envio_email()
    {
         $this->load->library('email');

        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html';
        $config['protocol'] = 'smtp';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['smtp_host'] = 'mx1.hostinger.com.ar';
        $config['smtp_port'] = 2525;
        $config['smtp_user'] = 'aplab@aplab.hol.es';
        $config['smtp_pass'] = '123456';
        $config['validation'] = TRUE; 
        $config['wordwrap'] = TRUE;
        $this->email->initialize($config);
        $this->email->clear();

        $this->email->from('aplab@aplab.hol.es','oscar');
        $this->email->to($this->input->post('email',TRUE));
        $this->email->cc($this->input->post('alternativo',TRUE)); 
        $this->email->subject($this->input->post('asunto',TRUE));
        $this->email->message($this->input->post('mensaje',TRUE));
        $this->email->send(); 

    }
   
}