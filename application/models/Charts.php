<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charts extends CI_Model {
	
    function __construct() {
        parent::__construct();
        $this->table   = 'APP_01';
        $this->table2   = 'APP_02';
       
    }
    
    
    function get_data_charts()
    {
        $sql="select TIME(`from`) AS `from`,s,t,f from $this->table  where cat=0";
                
        $query = $this->db->query($sql);
        if($query) {
            return $query->result();   
        }
        return 0; 
    }
    
    function get_success()
    {
        $sql="select `from`,`s` from $this->table where cat=0";
                
        $query = $this->db->query($sql);
        if($query) {
            return $query->result();   
        }
        return 0; 
    }       
    
    function get_tolerant()
    {
        $sql="select `from`,t from $this->table where cat=0";
                
        $query = $this->db->query($sql);
        if($query) {
            return $query->result();   
        }
        return 0; 
    }
    
    function get_failed()
    {
        $sql="select `from`,f from $this->table2 where cat=0";
                
        $query = $this->db->query($sql);
        if($query) {
            return $query->result();   
        }
        return 0; 
    }
    
}