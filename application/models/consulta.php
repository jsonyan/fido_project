<?php
class Consulta extends CI_Model {
    function __construct(){
	    parent::__construct();
//		$this->load->database();     
	}
	function getDatos(){
		$query = $this->db->query('SELECT Nombre, Edad FROM usertest');
		return $query->result_array();
	}
	function obtEdades(){
		$query = $this->db->query('SELECT Edad FROM usertest');
		echo '<ul>';
		foreach ($query->result_array() as $row) 
		{
		     echo '<li>'.$row['Edad'].'</li>';     
	    }
		echo '</ul>';
		
	}
	function obtNombres(){
		$query = $this->db->query('SELECT Nombre FROM usertest');
		echo '<ul>';
		foreach ($query->result_array() as $row) 
		{
		     echo '<li>'.$row['Nombre'].'</li>';     
	    }
		echo '</ul>';
		
	}
	
	function guardarDatos(){
		
	}
}
?>