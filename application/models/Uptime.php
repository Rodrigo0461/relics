<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uptime extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
        $this->table  = 'uptime';
        
    }
    //function for adding client details to Cliente table
   
    
    public function get_financiador_details($select = null, $where = null, $sort = null, $limit = null, $ext_join = null) {
        $sort = 'cod_financiador';
        //$select variable assign the different table fields, default value is null
        if ($select == "") {
            $sql = "SELECT DISTINCT financiador,cod_financiador";
        } 
            
        //adding default table and joins to query 
        $sql .= " FROM $this->table";

       // echo $sql;die();
        //adding extra joins to query, if any joins passed with parmeter $ext_join
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
        if ($query) {
            return $query->result();
        } else
            return array();
    }
    

}