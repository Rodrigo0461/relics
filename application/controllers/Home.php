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
    
    public function index($page = 'home', $id = NULL, $source = NULL) {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');

        } 
        else {
            $this->data= $this->uptime->get_financiador_details('');
            $this->load->view('templates/header');
            $this->load->view('financiador/financiador_list', $this->data);
        }
    }
    
    public function financiador_list() {
        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $this->data['title'] = 'Financiadores';
            $this->load->view('templates/header', $this->data);
            $this->load->view('financiador/qbf_search_filter', $this->data);
        
        }
    }
    
    public function financiador_table() {
        $iDisplayStart  = $this->input->get_post('iDisplayStart', true);
        $iDisplayLength = $this->input->get_post('iDisplayLength', true);
        $sSearch        = $this->input->get_post('sSearch', true);
         
        $sIndexColumn = "id";
        $aColumns = array(
            'cod_fin',
            'financiador',
            'timestamp',
            'estado',
            'actions'
        );
        
        $from_date = $this->input->get_post('from_date', true);
        $to_date = $this->input->get_post('to_date', true);
        
        //
        $sLimit = "";
        if (isset($iDisplayStart) && $iDisplayLength != '-1') {
            $sLimit = $iDisplayStart . "," . $iDisplayLength;
        }
        
        $search = "";
        
        if (isset($sSearch) && !empty($sSearch)) {
            for ($i = 0; $i < count($aColumns); $i++) {
                $bSearchable = $this->input->get_post('bSearchable_' . $i, true);
                if (isset($bSearchable) && $bSearchable == 'true') {
                    $search = $this->db->escape_like_str($sSearch);
                }
            }
        }
             
        $ext_search_fields = array(
            'from_date' => $from_date,
            'to_date' => $to_date,
        );
        
        $financiadores      = $this->uptime->get_financiador_details('',$sSearch,$sLimit,$ext_search_fields);
        $totalfinanciadores = $this->uptime->get_financiador_count($sSearch,$ext_search_fields);

        //print_r($totalfinanciadores);die();
       
        $output = array(
            "iTotalRecords" => $totalfinanciadores,
            "iTotalDisplayRecords" => $totalfinanciadores,
            "limit" => $sLimit,
            "aaData" => array()
        );

       // print_r($output);//die();
        if (!isset($count)) 
            $count = 1; 
        
        $avg='';
        
        foreach ($financiadores as $aRow) {
          
            $row = array();
           
            $time =$this->uptime->get_status($aRow->id,$aRow->cod_fin);
            $diff =$this->uptime->get_diff_time($aRow->timestamp,$time);
            $avg = $this->uptime->get_suma($avg,$diff);
           
            
            for($i=0;$i<count($aColumns);$i++)
            {
                switch ($aColumns[$i])
                {
                    case 'estado':
                        $time =$this->uptime->get_status($aRow->id,$aRow->cod_fin);
                        $diff =$this->uptime->get_diff_time($aRow->timestamp,$time);
                        $row[] ='<strong>'.$diff.'</strong>';
                       
                        break;
                    
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
            }//termina el for
           
            $output['aaData'][] = $row;
            $count++;
        }//termina foreach
       
        
        echo json_encode($output);
         
    }
    public function view_financiador($id) {
        
        $this->data=$this->uptime->get_view_financiador($id);
        
       // print_r($this->data);die();
        $this->load->view('templates/header', $this->data);
        $this->load->view('uptimes/index', $this->data);
     }
     
    public function charts_list() {
        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $this->data['title'] = 'charts';
            $this->data= json_encode($this->uptime->get_charts_details(''));
            $this->load->view('charts/charts_list', $this->data);
        }
    }
}