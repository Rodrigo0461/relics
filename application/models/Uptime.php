<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uptime extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
        $this->table  = 'uptime';
        $this->table2  = 'SLA112014';
        $this->table3  = 'APP_01';
        $this->table4  = 'APP_02';
        
    }
   
   function get_financiador_details( $search = null,$limit = null) {
            
        $sql = "SELECT  id,financiador,cod_financiador as cod_fin,  EXTRACT(YEAR from timestamp) AS year, timestamp,estado";
        $sql .= " FROM $this->table";
        
        if($search != "") {
          
                $sql .= " WHERE financiador LIKE '%$search%' ";
        }

        if($limit != "") {
            $sql .= " LIMIT $limit ";
        }
       
        $query = $this->db->query($sql);

        
        if ($query) { 
            return $query->result();
        } else
            return array();
    }
    
    
    function get_view_financiador($id) {
         
        $query = $this->db->query("select EXTRACT(MINUTE from timestamp) AS MINI from uptime where id>$id AND estado=0 limit 1");

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
              $min=$row->MINI;
           }
        }
        
        
        $query = $this->db->query("select MAX(id) as max from uptime");

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
              $max=$row->max;
           }
        }
        
        
        $query = $this->db->query("SELECT WEEKDAY(timestamp) as dow FROM uptime where id=$id");
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
              $dow=$row->dow;
            }
        }

        $sql=   "   SELECT distinct f.financiador,s.BonosResBonos as resumen, s.NamePrestador,s.Dayxweek, f.timestamp,"
                 . " EXTRACT(HOUR FROM f.timestamp) AS HORAU, EXTRACT(MINUTE FROM f.timestamp) AS MINUTE, CONCAT (s.Hour,':',s.Minute) AS HORA, CONCAT ('20',Week) AS YEAR "
                 . " FROM $this->table f, $this->table2 s"
                 . " WHERE f.estado=1 AND f.financiador=s.NameFinanciador AND f.id=$id " 
                 . " AND s.Hour=EXTRACT(HOUR FROM f.timestamp)"
                 . " AND s.Dayxweek=$dow"
                 . " AND s.Dayxweek<>'$max'" 
                 . " AND s.Minute BETWEEN  EXTRACT(MINUTE FROM f.timestamp) AND '$min'"; 
        
        $query = $this->db->query($sql);
        
      
         if ($query) { 
            return $query->result();
        } else
            return array();
     }
    
    function get_financiador_count() {
        $sql="select count(1) AS count from $this->table";
        $query = $this->db->query($sql);
        if($query) {
            $result = $query->result();
            //print_r($result);die();
            return $result[0]->count;
        }

        return 0; 
    }
    
    function get_charts_details() {
        $sql="select `from`,s,t,f from $this->table3 as resultado";
        
                
        $query = $this->db->query($sql);
        if($query) {
            return $query->result();
        
        }
        return 0; 
    }
    
     function get_data_charts()
    {
        $sql="select `from`,value  from $this->table3 as resultado where cat=0";
                
        $query = $this->db->query($sql);
        
        if($query) {
            return $query->result();   
        }
        return 0; 
    }
    
     function get_data_charts_2()
    {
        $sql="select `from`,value  from $this->table3 as resultad where cat=1";
                
        $query = $this->db->query($sql);
        if($query) {
            return $query->result();   
        }
        return 0; 
    }
    
     function get_data_charts_3()
    {
        $sql="select `from`,value  from $this->table4 as resultad";
                
        $query = $this->db->query($sql);
        
        
        if($query) {
            return $query->result();   
        }
        return 0; 
    }
    
     function get_avg_app()
    {
        $sql=" SELECT AVG(value) AS PROMEDIO FROM $this->table3 WHERE cat=0" ;
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
        return $row->PROMEDIO;
        }
    }   
    }
    
    function get_avg_app_01()
    {
        $sql=" SELECT AVG(value) AS PROMEDIO FROM $this->table3 WHERE cat=1" ;
        $query = $this->db->query($sql);
     
         
         if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
         return $row->PROMEDIO;
        }
    }   
        
    }
    
     function get_avg_app_02()
    {
        $sql=" SELECT AVG(value) AS PROMEDIO FROM $this->table4" ;
        $query = $this->db->query($sql);
     
         
         if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
         return $row->PROMEDIO;
        }
    }   
        
    }
    
  
}