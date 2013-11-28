<?php
class M_usuarios extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function very($variable,$campo)
    {
        $consulta = $this->db->get_where('usuarios',array($campo=>$variable));
        if($consulta->num_rows() == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    
    public function ver_perfil()
    {
        $consulta =$this->db->get_where('users',array(
                                    'email'=>$this->input->post('email',TRUE)
                                    ));
        if($consulta->num_rows() == 1)
        {   
            foreach($consulta->result_array() as $fila)
                    $perfil=$fila['rol'];
            return $perfil;
        }
        else
        {
            return false;
        }
    }
    
    public function add_user($imagen)
    {
        $bandera1=$this->input->post('perfil');
        $bandera=0;
        if($bandera==0)
        {                   
            $this->db->set( 'fecha_registro','NOW()',false); 
            $this->db->insert('usuarios',array(
                            /*'id_usuario'=>$code,*/
                            'nombre'=>$this->input->post('nombre',TRUE),
                            'apellidos'=>$this->input->post('apellidos',TRUE),
                            'ci'=>$this->input->post('ci',TRUE),
                            'email'=>$this->input->post('email',TRUE),
                            'red_social'=>$this->input->post('face',TRUE),
                            //'pass'=>$this->input->post('pass',TRUE),
                            'telefono'=>$this->input->post('fijo'),
                            'celular'=>$this->input->post('movil',TRUE),
                            //'fecha_registro'=> date('Y-m-d H:i:s'),
                            'ciudad'=>$this->input->post('ciudad',TRUE),
                            'direccion'=>$this->input->post('direccion',TRUE),
                            'ocupacion'=>$this->input->post('ocupacion',TRUE),
                            'fecha_nacimiento'=>$this->input->post('aa',TRUE).'-'.$this->input->post('mm',TRUE).'-'.$this->input->post('dd',TRUE),
                            'foto' => $imagen
                            ));
            $bandera=1;
        }
        $password=$this->input->post('pass',TRUE);
        $email=$this->input->post('email',TRUE);
        
        $correo=$this->input->post('email');
        
        $consulta = $this->db->get_where('usuarios',array('email' => $correo));                
        foreach($consulta->result_array() as $fila){
            $id_usuario=$fila['id_usuario'];
            }
                  //por web  
            if($bandera==1 and $bandera1=='pweb')
            {                                                   
                $this->db->insert('adoptante',array(
                    'usuario_id'=>$id_usuario,
                    ));      
                           
            }
            //por adminitrador
                if($bandera==1 and $bandera1=='padopt')
            {                                                   
                $this->db->insert('adoptante',array(
                    'usuario_id'=>$id_usuario,
                    ));      
                    
                    //Registrado por usuario      
                $hash = $this->bcrypt->hash_password($password);      
                if ($this->bcrypt->check_password($password, $hash))
                {
                		
    				$data = array('email' => $email, 'password' => $hash, 'rol'=>'adoptante');	
    				$this->db->insert('users',$data);
    				
    			}        
            }
                if($bandera==1 and $bandera1=='padmin')
                {                    
                    $this->db->insert('administrador',array(                    
                    'usuario_id'=>$id_usuario,
                    'cargo'=>$this->input->post('cargo'),
                    'otro_cargo'=>$this->input->post('otro_cargo'),
                    ));
                    $hash = $this->bcrypt->hash_password($password);      
                    if ($this->bcrypt->check_password($password, $hash))
                    {
                    		
        				$data = array('email' => $email, 'password' => $hash, 'rol'=>'administrador');	
        				$this->db->insert('users',$data);
        				
        			}                                                    
                }
                if($bandera==1 and $bandera1=='pdonan')
                {                     
                    $hash = $this->bcrypt->hash_password($password);      
                    if ($this->bcrypt->check_password($password, $hash))
                    {                    		
        				$data = array('email' => $email, 'password' => $hash, 'rol'=>'donante');	
        				$this->db->insert('users',$data);        				
        			}            
                    $this->db->insert('donante',array(                
                    'usuario_id'=>$id_usuario,                    
                    ));                    
                }
                if($bandera==1 and $bandera1=='pveter')
                {                                                                    
                    $hash = $this->bcrypt->hash_password($password);      
                    if ($this->bcrypt->check_password($password, $hash))
                    {
                    		
        				$data = array('email' => $email, 'password' => $hash, 'rol'=>'veterinario');	
        				$this->db->insert('users',$data);
        				
        			}                                                
                    $this->db->insert('veterinario',array(            
                    'usuario_id'=>$id_usuario,
                    'matricula_profesional'=>$this->input->post('matricula_profesional'),
                    ));
                    }
                if($bandera==1 and $bandera1=='pvolun')
                {
                    $hash = $this->bcrypt->hash_password($password);      
                    if ($this->bcrypt->check_password($password, $hash))
                    {
                    		
        				$data = array('email' => $email, 'password' => $hash, 'rol'=>'voluntario');	
        				$this->db->insert('users',$data);
        				
        			}                    
                            $this->db->insert('voluntario',array(                    
                            'usuario_id'=>$id_usuario,
                            'estado'=>$this->input->post('estado'),
                            'aceptado'=>0,
                            'tipo_ayuda'=>$this->input->post('parque').'--'.$this->input->post('hogar').'--'.$this->input->post('albergue').'--'.$this->input->post('campana').'--'.$this->input->post('asistencia')                                                
                            ));                            
                        }                    
                
   }
        
    public function very_sesion()  
    {
        $consulta =$this->db->get_where('acceso',array(
                                    'correo'=>$this->input->post('email',TRUE),
                                    'password' => $this->input->post('pass',TRUE)));
        if($consulta->num_rows() == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function update_user($code)
    {
        $this->db->where('codigo',$code);
        $this->db->update('usuarios',array('estado'=>'1'));
    }
    public function mostrar_administrativos()
    {
        $consulta=$this->db->query('SELECT id_usuario, nombre, apellidos, ci, email, red_social, telefono, celular FROM usuarios u, administrador a WHERE u.id_usuario = a.usuario_id');
        return $consulta->result();
    }
    public function mostrar_voluntarios()
    {
        $consulta=$this->db->query('SELECT id_usuario, nombre, apellidos, ci, email, red_social, telefono, celular FROM usuarios u, voluntario v WHERE u.id_usuario = v.usuario_id');
        return $consulta->result();
    }
    public function mostrar_adoptantes()
    {
        $consulta=$this->db->query('SELECT id_usuario, nombre, apellidos, ci, email, red_social, telefono, celular FROM usuarios u, adoptante a WHERE u.id_usuario = a.usuario_id');
        return $consulta->result();
    }
    public function mostrar_donantes()
    {
        $consulta=$this->db->query('SELECT id_usuario, nombre, apellidos, ci, email, red_social, telefono, celular FROM usuarios u, donante d WHERE u.id_usuario = d.usuario_id');
        return $consulta->result();
    }
    public function mostrar_veterinarios()
    {
        $consulta=$this->db->query('SELECT id_usuario, nombre, apellidos, ci, email, red_social, telefono, celular FROM usuarios u, veterinario v WHERE u.id_usuario = v.usuario_id');
        return $consulta->result();
    }
        
    public function verifica_id($id,$tabla)
    {
        $tablas = array('usuarios','tabla2'=>$tabla);
        $this->db->where('id_usuario',$id);
        $this->db->where('usuario_id',$id);
        $consulta = $this->db->get($tablas);
        if($consulta->num_rows() > 0)
        {
            return $consulta->row_array();
        }
        else
        {
            return false;
        }
    }

    public function editar_usuario($imagen)
    {
        //para editar
        $bandera1=$this->input->post('pedit');
        $bandera=0;
        if($bandera==0)
        {
            $this->db->where('id_usuario',$this->input->post('id_usuario')); 
            $this->db->update('usuarios',array(
    
                            'nombre'=>$this->input->post('nombre',TRUE),
                            'apellidos'=>$this->input->post('apellidos',TRUE),
                            'ci'=>$this->input->post('ci',TRUE),
                            'email'=>$this->input->post('email',TRUE),    
                            'telefono'=>$this->input->post('fijo'),
                            'celular'=>$this->input->post('movil',TRUE),                            
                            'ciudad'=>$this->input->post('ciudad',TRUE),
                            'direccion'=>$this->input->post('direccion',TRUE),
                            'ocupacion'=>$this->input->post('ocupacion',TRUE),
                            'fecha_nacimiento'=>$this->input->post('nacimiento',TRUE),
                            ));
                if($imagen!='anonimo.jpg')
                {
                    $this->db->where('id_usuario',$this->input->post('id_usuario'));
                    $this->db->update('usuarios',array(
                                        'foto' => $imagen,                         
                                                    ));
                }
                                            
            $bandera=1;
        }
                if($bandera==1 and $bandera1=='padmin')
                {
                    $this->db->where('usuario_id',$this->input->post('id_usuario'));
                    $this->db->update('administrador',array(                    
                    'cargo'=>$this->input->post('cargo'),
                    'otro_cargo'=>$this->input->post('otro_cargo'),
                    ));                    
                }
                if($bandera==1 and $bandera1=='pveter')
                {
                    $this->db->where('usuario_id',$this->input->post('id_usuario'));
                    $this->db->update('veterinario',array(                    
                    'matricula_profesional'=>$this->input->post('matricula_profesional'),
                    ));
                }
                if($bandera==1 and $bandera1=='pvolun')
                {
                    $this->db->where('usuario_id',$this->input->post('id_usuario'));
                    $this->db->update('voluntario',array(                
                    'tipo_ayuda'=>$this->input->post('tipo'),
                    'estado'=>$this->input->post('estado'),
                    ));
                }                                        
    }
    public function vol_no_aceptados()
    {   
    $consulta=$this->db->query('SELECT count(aceptado) as nro FROM `voluntario` WHERE aceptado=0');
        return $consulta->result();
    }
}