    <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chart extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language', 'security'));
        $this->load->model(array('uptime')); 
     
        $this->data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
        
    }
    public function index()
            
	{
        if (!$this->ion_auth->logged_in()) {
           
            redirect('auth/login', 'refresh');

        } 
        
         $this->data = $this->uptime->get_avg_app('');
         $this->data2 = $this->uptime->get_avg_app_01('');
         
         
        $rows=array();
        
         
        foreach ($this->data as $row)
	{
                $rows ['data'][] = $row->PROMEDIO;
	}
                
        foreach ($this->data2 as $row2)
	{
                $rows2 ['data'][] = $row2->PROMEDIO;
        }
        
                $result = array();
                array_push($result,$rows);
                array_push($result,$rows2);
                $this->load->view('templates/header');
		$this->load->view('charts/charts_list', $result);
	}
        
   
     public function data()
	{
         
                if (!$this->ion_auth->logged_in()) {
                      redirect('auth/login', 'refresh');
                } 
		
                $data = $this->uptime->get_data_charts('');
                
                $data2 = $this->uptime->get_data_charts_2('');

                ///////////////////////////////////
                $series = array();
		$series['name'] = 'date';
		
		$series1 = array();
		$series1['name'] = 'Certificación';
		
//		$series2 = array();
//		$series2['name'] = 'Tolerant';
//		
//		$series3 = array();
//		$series3['name'] = 'Failed';
                ///////////////////////////////////
                
                $ser = array();
		$ser['name'] = 'date';
		
		$ser1 = array();
		$ser1['name'] = 'Valorización';
		
//		$ser2 = array();
//		$ser2['name'] = 'V Tolerant';
//		
//		$ser3 = array();
//		$ser3['name'] = 'V Failed';
		
		foreach ($data as $row)
		{
                        $series ['data'][] = $row->from;
			$series1['data'][] = $row->value;
//			$series2['data'][] = $row->t;
//			$series3['data'][] = $row->f;
		}
                
                foreach ($data2 as $row2)
		{
                        $ser ['data'][] = $row2->from;
			$ser1['data'][] = $row2->value;
//			$ser2['data'][] = $row2->t;
//			$ser3['data'][] = $row2->f;
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
                ///////////////////////////////////
                $series = array();
		$series['name'] = 'date';
		
		$series1 = array();
		$series1['name'] = 'Success';
		
		$series2 = array();
		$series2['name'] = 'Tolerant';
		
		$series3 = array();
		$series3['name'] = 'Failed';
                ///////////////////////////////////
                
               
		foreach ($data as $row)
		{
                        $series ['data'][] = $row->from;
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