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

        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect('welcome', 'refresh');
        } 
        else {
            $this->data= $this->uptime->get_financiador_details('');
            $this->load->view('templates/header');
            $this->load->view('home/index',$this->data);
           
        }
    }
    
    public function financiador_list() {

        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            //set the flash data error message if there is one
           
            $this->data['title'] = 'financiadores';

           
            $this->load->view('templates/header', $this->data);
            $this->load->view('financiador/search_filter', $this->data);
            $this->load->view('financiador/financiador_list', $this->data);
        
        }
    }
    
    public function financiador_table() {
        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = "cod_financiador";
        $aColumns = array('financiador', 'cod_financiador');
        $iDisplayStart = 0;
        $iDisplayLength = 5;
      

        $sLimit = "";
        $sort = "cod_financiador DESC";

        $financiador =  $this->input->get_post('financiador', true);
       
        
        if (isset($iDisplayStart) && $iDisplayLength != '-1') {
            $sLimit = $iDisplayStart . "," . $iDisplayLength;
        }
        // Ordering
        
        $search = "";
  
                    // querys to databases to uptime
        $financiadores      = $this->uptime->get_financiador_details();
        $totalfinanciadores = $this->uptime->get_financiador_count();
        
        //echo $totalfinanciadores;die();
        
        
        $output = array(
            "sEcho" => intval(@$_GET['sEcho']),
            "iTotalRecords" => $totalfinanciadores,
            "iTotalDisplayRecords" => $totalfinanciadores,
            "limit" => $sLimit,
            "aaData" => array()
        );

        if (!isset($count))
            $count = 1; 
        
      
        foreach ($financiadores as $aRow) {
            
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
              
                        $row[] = $aRow->$aColumns[$i];
            }

            $output['aaData'][] = $row;
            $count++;
        }

        echo json_encode($output);
    }
     
    
}