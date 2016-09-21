<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chart_ps extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language', 'security'));
        $this->load->model(array('chart_pss')); 
        $this->load->helper('array');
        $this->data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
        
    }
    
    function index()
	{
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        } 
       
        $this->load->view('templates/header');
        $this->load->view('charts/charts_ps');
	}
    
}