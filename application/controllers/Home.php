<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language', 'security'));
        $this->load->model(array('uptime')); 
     
        $this->data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
        
    }
    
    function index($page = 'home', $id = NULL, $source = NULL) {
         //header("Content-type: application/json");

        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect('welcome', 'refresh');
        } 
        else {
            $this->data= $this->uptime->get_financiador_details('');
           // echo json_encode($this->data);die();
     
            $this->load->view('templates/header');
            $this->load->view('home/index',$this->data);
           
        }
    }
     
    
}