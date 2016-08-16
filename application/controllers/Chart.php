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
        
        
    function chart_prestador()
            
	{
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        } 
    
        $data=  $this->charts->get_prestador('Clinica Las Lilas S.A.');
        
        $series = array();
        $result = array();

        foreach ($data as $row)
		{
                    $time = strtotime($row->timestamp)*1000;
		    $series=array($time,$row->rb);
                    array_push($result,$series);
		}
                $days_array_asc = array_reverse($result);
                
        print (json_encode($result, JSON_NUMERIC_CHECK));      
	}    
        
            
    public function data()
	{
		
                $data = $this->charts->get_data_charts('');
                ///////////////////////////////////
                $series = array();
		$series1 = array();
                $series2 = array();
        	$series3 = array();

		foreach ($data as $row)
		{
                        $series['data'][] = $row->from;
			$series1['data'][] = $row->s;
			$series2['data'][] = $row->t;
			$series3['data'][] = $row->f;
		}
                
		
		$result = array();
		array_push($result,$series);
		array_push($result,$series1);
		array_push($result,$series2);
		array_push($result,$series3);
                
		print (json_encode($result, JSON_NUMERIC_CHECK));
	}
    
}