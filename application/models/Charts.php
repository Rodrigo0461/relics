<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charts extends CI_Model {
	
    function __construct() {
        parent::__construct();
        $this->table   = 'APP_01';
       
    }
    
    
     function get_data_charts()
    {
        $sql="select TIME(`from`) AS `from`,s,t,f from $this->table as resultado where cat=0";
                
        $query = $this->db->query($sql);
        if($query) {
            return $query->result();   
        }
        return 0; 
    }
}