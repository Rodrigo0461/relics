<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language', 'security'));
        $this->load->model(array('uptime')); 
        $this->load->helper('array');
     
        $this->data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
        
    }
    public function index()
            
	{
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        } 
       
        $array=array();
        $array['PROMEDIO_01']=$this->uptime->get_avg_app('');
        $array['PROMEDIO_02']=$this->uptime->get_avg_app_01('');
        $array['PROMEDIO_03']=$this->uptime->get_avg_app_02('');

        $this->load->view('templates/header');
        $this->load->view('charts/charts_list', $array);
	}
        
    public function data()
	{
        if (!$this->ion_auth->logged_in()) {
                      redirect('auth/login', 'refresh');
        } 
		
        $data = $this->uptime->get_data_charts('');
        $data2 = $this->uptime->get_data_charts_2('');

              
        $series = array();
	$series['name'] = 'date';
		
	$series1 = array();
	$series1['name'] = 'Certificación';

        $ser = array();
	$ser['name'] = 'date';
		
	$ser1 = array();
	$ser1['name'] = 'Valorización';

        foreach ($data as $row)
		{
                    $series ['data'][] = $row->from;
		    $series1['data'][] = $row->value;
		}
                
        foreach ($data2 as $row2)
		{
                    $ser ['data'][] = $row2->from;
		    $ser1['data'][] = $row2->value;
		}
		
	$result = array();
               
	array_push($result,$series);
	array_push($result,$series1);
        array_push($result,$ser);
	array_push($result,$ser1);
                
        print (json_encode($result, JSON_NUMERIC_CHECK));       
	}
        
    public function data2()
    {
		
        $data = $this->uptime->get_data_charts_3('');
               
        $series = array();
	$series['name'] = 'date';
		
	$series1 = array();
	$series1['name'] = 'Certificación';
		
	foreach ($data as $row)
                {
                $series ['data'][] = $row->from;
		$series1['data'][] = $row->value;
		}
		
        $result = array();
               
	array_push($result,$series);
	array_push($result,$series1);
        
	print (json_encode($result, JSON_NUMERIC_CHECK));
	}
        
}