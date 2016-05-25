<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Model {

  	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_data()
    {
        $this->db->select('from,s,t,f');
		$this->db->from('APP_01');
		$query = $this->db->get();
       	return $query->result();
    }

}