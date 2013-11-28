<?php
class M_reportes extends CI_Model {
        function __construct(){
	    parent::__construct();
	}
        /**
        * @access public
        * @name $animales_por_sexo
        * @return array Retorna una tabla de la BD con la cantidad de animales agrupados por sexo
        */
        public function animales_por_sexo(){
            $consulta = "select sexo_animal as sexo, count(sexo_animal) as cantidad 
                        from animal 
                        group by sexo_animal;";
            $resultado = $this->db->query($consulta);
            return $resultado->result_array();
        }
        /**
        * @access public
        * @name $animales_por_especie
        * @return array Retorna una tabla de la BD con la cantidad de animales agrupados por especie
        */
        public function animales_por_especie(){
            $consulta = "select especie, count(especie) as cantidad
                        from animal
                        group by especie;";
            $resultado = $this->db->query($consulta);
            return $resultado->result_array();
        }
        /**
        * @access public
        * @name $animales_por_raza
        * @return array Retorna una tabla de la BD con la cantidad de animales agrupados por raza
        */
        public function animales_por_raza(){
            $consulta = "select raza, count(raza) as cantidad
                        from animal
                        group by raza;";
            $resultado = $this->db->query($consulta);
            return $resultado->result_array();
        }
        /**
        * @access public
        * @name $animales_por_entrada
        * @return array Retorna una tabla de la BD con la cantidad de animales agrupados por entrada
        */
        public function animales_por_entrada(){
            $consulta = "select motivo_entrada as entrada, count(motivo_entrada) as cantidad
                        from animal
                        group by motivo_entrada;";
            $resultado = $this->db->query($consulta);
            return $resultado->result_array();
        }
        /**
        * @access public
        * @name $animales_por_esterilizado
        * @return array Retorna una tabla de la BD con la cantidad de animales agrupados por esterilizado/no esterilizado
        */
        public function animales_por_esterilizado(){
            $consulta = "select esterilizado, count(esterilizado) as cantidad
                        from animal
                        group by esterilizado;";
            $resultado = $this->db->query($consulta);
            return $resultado->result_array();
        }
        /**
        * @access public
        * @name $registrados_mes
        * @return array Retorna una tabla de la BD con la cantidad de animales registrados por dia, del mes actual
        */
        public function registrados_mes(){
            $consulta = "select dayofmonth(fecha_reg_animal) as dia, count(fecha_reg_animal) as cantidad_por_dia, monthname(now()) as mes
                        from animal
                        where month(fecha_reg_animal) = month(now())
                        group by day(fecha_reg_animal);";
            $resultado = $this->db->query($consulta);
            return $resultado->result_array();
        }
        /**
        * @access public
        * @name $registrados_mes_k
        * @param int $mes Numero del mes Enero=1,Febrero=2...
        * @return array Retorna una tabla de la BD con la cantidad de animales registrados por dia, del mes k-esimo
        */
        public function registrados_mes_k($mes){
            $consulta = "select dayofmonth(fecha_reg_animal) as dia, count(fecha_reg_animal) as cantidad_por_dia
                        from animal
                        where month(fecha_reg_animal) = ".$mes."
                        group by day(fecha_reg_animal);";
            $resultado = $this->db->query($consulta);
            return $resultado->result_array();
        }
        /**
        * @access public
        * @name $registrados_anio
        * @return array Retorna una tabla de la BD con la cantidad de animales registrados por mes, del anio actual
        */
        public function registrados_anio(){
            $consulta = "select monthname(fecha_reg_animal) as mes, count(fecha_reg_animal) as registrados_por_mes
                        from animal
                        where year(fecha_reg_animal) = year(now())
                        group by month(fecha_reg_animal);";
            $resultado = $this->db->query($consulta);
            return $resultado->result_array();
        }
        /**
        * @access public
        * @name $registrados_anio_k
        * @param int $anio Anio a consultar
        * @return array Retorna una tabla de la BD con la cantidad de animales registrados por mes, del anio k
        */
        public function registrados_anio_k($anio){
            $consulta = "select monthname(fecha_reg_animal) as mes, count(fecha_reg_animal) as registrados_por_mes
                        from animal
                        where year(fecha_reg_animal) = ".$anio."
                        group by month(fecha_reg_animal);";
            $resultado = $this->db->query($consulta);
            return $resultado->result_array();
        }
}
?>