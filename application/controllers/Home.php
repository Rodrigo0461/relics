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
            redirect('auth/login', 'refresh');

        } 
        else {
            $this->data= $this->uptime->get_financiador_details('');
            $this->load->view('templates/header');
            $this->load->view('financiador/financiador_list', $this->data);
            //$this->load->view('home/index',$this->data);
           // var_dump($expression);die();
           
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
            $this->load->view('financiador/financiador_list', $this->data);
        
        }
    }
    
    public function financiador_table() {
        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = "id";
        $aColumns = array(
            'id',
            'cod_fin',
            'financiador',
            'year',
            'timestamp',
            'estado',
            'actions'
        );
        
      
        $sLimit = "";
        $financiador =  $this->input->get_post('financiador', true);
       
        
        if (isset($iDisplayStart) && $iDisplayLength != '-1') {
            $sLimit = $iDisplayStart . "," . $iDisplayLength;
        }
        
        $search = "";
  
        $financiadores      = $this->uptime->get_financiador_details();
       // print_r($financiadores);die();
       
        $totalfinanciadores = $this->uptime->get_financiador_count();

        $output = array(
            "iTotalRecords" => 20,
            "iTotalDisplayRecords" => 20,
            "limit" => $sLimit,
            "aaData" => array()
        );
        if (!isset($count))
            $count = 1; 
        
      
        foreach ($financiadores as $aRow) {
            
            $row = array();
            for($i=0;$i<count($aColumns);$i++)
            {
                switch ($aColumns[$i])
                {

                    case 'actions':
                        $btn = '<div class="btn-group" role="group">';
                        $btn .= '<a class="btn btn-primary"  href="view_financiador/'.$aRow->id.'" role="button">Detalle</a>';
                        $btn .= '</div>';
                        $row[] = $btn;
                        break;
                    default:
                        $row[] = $aRow->$aColumns[$i];
                        break;
                }
            }
            $output['aaData'][] = $row;
            $count++;
        }
          //print_r($output);die();
        echo json_encode($output);
         
    }
    
    public function view_financiador($id) {
        
        $this->data=$this->uptime->get_view_financiador($id);
        $this->load->view('templates/header', $this->data);
        $this->load->view('uptimes/index', $this->data);
        
         
     }
     
      public function charts_list() {
        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            //set the flash data error message if there is one
           
            $this->data['title'] = 'charts';
            $this->data= json_encode($this->uptime->get_charts_details(''));
           // var_dump($this->data);die();
          //  $this->load->view('templates/header', $this->data);
            $this->load->view('charts/charts_list', $this->data);
        
        }
    }
     
     
     
    
     
}