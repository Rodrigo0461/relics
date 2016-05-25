<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uptime extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
        $this->table  = 'uptime';
        $this->table2  = 'SLA112014';
        $this->table3  = 'APP_01';
        $this->table4  = 'APP_02';
        
    }
   
    
   function get_financiador_details() {
        //$sort = 'cod_financiador';
        //$select variable assign the different table fields, default value is null
       
        $sql = "SELECT  id,financiador,cod_financiador as cod_fin,  EXTRACT(YEAR from timestamp) AS year, timestamp,estado";
        
            
        //adding default table and joins to query 
        $sql .= " FROM $this->table ";
        
        $query = $this->db->query($sql);
       //var_dump($query);die();

        if ($query) { 
            return $query->result();
        } else
            return array();
    }
    
    
     function get_view_financiador($id) {
   
         $sql=   "   SELECT distinct f.financiador,s.SRBMTotal as sumab, s.NamePrestador,s.Dayxweek, f.timestamp,"
                 . " EXTRACT(HOUR FROM f.timestamp) AS HORAU, EXTRACT(MINUTE FROM f.timestamp) AS MINUTE, CONCAT (s.Hour,':',s.Minute) AS HORA, CONCAT ('20',Week) AS YEAR "
                 . " FROM $this->table f, $this->table2 s"
                 . " WHERE f.estado=1 AND f.financiador=s.NameFinanciador AND f.id=$id " 
                 . " AND s.Hour=EXTRACT(HOUR FROM f.timestamp)"
                 . " AND s.Minute=EXTRACT(MINUTE FROM f.timestamp) AND s.Dayxweek=2";
         
        
        $query = $this->db->query($sql);
        
      //  print_r($query);die();
         if ($query) { 
            return $query->result();
        } else
            return array();
     }
    
    
    
       function get_financiador_count() {
        $sql="select count(1) AS count from (select distinct financiador from $this->table  ) as resultado";
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
        $sql="select TIME(`from`) AS `from`,s,t,f from $this->table3 as resultado where cat=0";
                
        $query = $this->db->query($sql);
        if($query) {
            return $query->result();   
        }
        return 0; 
    }
    
     function get_data_charts_2()
    {
        $sql="select `from`,s,t,f from $this->table3 as resultad where cat=1";
        
                
        $query = $this->db->query($sql);
        if($query) {
            return $query->result();   
        }
        return 0; 
    }
    
     function get_data_charts_3()
    {
        $sql="select `from`,s,t,f from $this->table4 as resultad";
        
                
        $query = $this->db->query($sql);
        if($query) {
            return $query->result();   
        }
        return 0; 
    }
    
    
    
}