<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uptime extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
        $this->table  = 'uptime';
        $this->table2  = 'SLA112014';
        $this->table3  = 'APP_01';
        
    }
   
    
   function get_financiador_details($select = null, $where = null, $sort = null, $limit = null, $ext_join = null) {
        $sort = 'cod_financiador';
        //$select variable assign the different table fields, default value is null
        if ($select == "") {
            $sql = "SELECT  financiador,cod_financiador as cod_fin,  EXTRACT(YEAR from timestamp) AS year, timestamp,estado";
        } 
            
        //adding default table and joins to query 
        $sql .= " FROM $this->table";

        if ($ext_join != "") {
            $sql .= " $ext_join ";
        }

        //adding where conditions to query
        if ($where != "") {
            $sql .= " WHERE $where";
        }

        if ($sort != "") {
            $sql .= " ORDER BY $sort ";
        }

        if ($limit != "") {
            $sql .= " LIMIT $limit ";
        }
         
        $query = $this->db->query($sql);
       //var_dump($query);die();

        if ($query) { 
            return $query->result();
        } else
            return array();
    }
    
    
     function get_view_financiador($cod) {
   
         $sql=   "   SELECT distinct f.financiador,s.SRBMTotal as sumab, s.NamePrestador,s.Dayxweek, f.timestamp,"
                 . " EXTRACT(HOUR FROM f.timestamp) AS HORAU, EXTRACT(MINUTE FROM f.timestamp) AS MINUTE, CONCAT (s.Hour,':',s.Minute) AS HORA, CONCAT ('20',Week) AS YEAR "
                 . " FROM $this->table f, $this->table2 s"
                 . " WHERE f.estado=1 AND f.financiador=s.NameFinanciador AND f.cod_financiador=$cod " 
                 . " AND s.Hour=EXTRACT(HOUR FROM f.timestamp)"
                 . " AND s.Minute=EXTRACT(MINUTE FROM f.timestamp) AND s.Dayxweek=2";
         
        
        $query = $this->db->query($sql);
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
            //var_dump(json_encode($result, JSON_NUMERIC_CHECK));die();
           // print json_encode($result);
            //return $query->result();
        
        }


        return 0; 
    }
    
    
}