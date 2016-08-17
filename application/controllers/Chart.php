<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chart extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language', 'security'));
        $this->load->model(array('charts')); 
        $this->load->helper('array');
        $this->data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
        
    }
    function index()
            
	{
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        } 
       
        $this->load->view('templates/header');
        $this->load->view('charts/charts_list');
	}
        
    function success()
	{
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        } 
    
        $data=  $this->charts->get_success('');
        
        $series = array();
        $result = array();

        foreach ($data as $row)
		{
                    $time    = strtotime($row->from)*1000;
		    $series  = array($time,$row->s);
                    array_push($result,$series);
		}
                $days_array_asc = array_reverse($result);
                
        print (json_encode($result, JSON_NUMERIC_CHECK));      
	}    
        
    function tolerant()
            
	{
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        } 
    
        $data=  $this->charts->get_tolerant('');
        
        $series = array();
        $result = array();

        foreach ($data as $row)
		{
                    $time = strtotime($row->from)*1000;
		    $series=array($time,$row->t);
                    array_push($result,$series);
		}
                $days_array_asc = array_reverse($result);
                
        print (json_encode($result, JSON_NUMERIC_CHECK));      
	}    
       
    function failed()
            
	{
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        } 
    
        $data=  $this->charts->get_failed('');
        
        $series = array();
        $result = array();

        foreach ($data as $row)
		{
                    $time = strtotime($row->from)*1000;
		    $series=array($time,$row->f);
                    array_push($result,$series);
		}
                $days_array_asc = array_reverse($result);
                
        print (json_encode($result, JSON_NUMERIC_CHECK));      
	}    
    
}