<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uptime extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
        $this->table  = 'uptime';
        $this->table2  = 'SLA112014';
        $this->table3  = 'APP_01';
        $this->table4  = 'APP_02';
    }
    
    function get_suma($avg,$diff){
        
        if($avg == "") {
            $sql="SELECT ADDTIME('00:00:00','$diff') as ATIME";
            $query = $this->db->query($sql);
            
            if ($query->num_rows() > 0)
            {
            foreach ($query->result() as $row)
            {
              return $row->ATIME;
            }
        }
        }
        
        else{
            $sql="SELECT ADDTIME('$avg','$diff') as ATIME";
            $query = $this->db->query($sql);
            
            if ($query->num_rows() > 0)
            {
            foreach ($query->result() as $row)
            {
              return $row->ATIME;
            }
        }
            
        }
        
    }
   
    function get_financiador_details( $select = null,$search = null,$limit = null,$ext_search_fields = array()) {
       
        if ($select == "") {
        $sql =  "SELECT  id,financiador,cod_financiador as cod_fin,  EXTRACT(YEAR from timestamp) AS year, timestamp,estado";
        }
        else {  //user defined value is setting to select section
            $sql = "SELECT $select ";
        }
        
        $sql .= " FROM $this->table";
        
        if($search != "") {
                $sql .= " WHERE financiador LIKE '%$search%' AND estado=0 AND Bono3=1";
        }
        else {
                $sql .= " WHERE estado=0 AND Bono3=1 ";
        }
        
        $ext_search = "";
        
        if (!empty($ext_search_fields)) {
            $and = "";
            if (isset($ext_search_fields['from_date']) && $ext_search_fields['from_date'] != "") {
                if ($ext_search_fields['to_date'] == "")
                    $ext_search_fields['to_date'] = date('Y-m-d');
                if ($ext_search != "") {
                    $and = " AND ";
                }
                $ext_search .= $and . " (DATE_FORMAT(timestamp,'%Y-%m-%d') >= '{$ext_search_fields['from_date']}' AND DATE_FORMAT(timestamp,'%Y-%m-%d') <= '{$ext_search_fields['to_date']}')";
            }
          
        }
        
        if ($ext_search != "") {
                $sql .= " AND " . $ext_search;
        }
        
        $sql.=" ORDER BY id DESC";
        
        if($limit != "") {
            $sql .= " LIMIT $limit ";
        }
        
        //print_r($sql);die();
        $query = $this->db->query($sql);
        return $query->result();
        
    }
    
    
    function get_view_financiador($id) {
         
        $query = $this->db->query("select EXTRACT(MINUTE from timestamp) AS min from uptime where id<$id AND estado=1 ORDER BY id DESC limit 1");
        
        $min=0;
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
              $min=$row->min;
            }
        }
        
        $query = $this->db->query("select MAX(id) as max from uptime");

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
              $max=$row->max;
            }
        }
        
        $query = $this->db->query("SELECT WEEKDAY(timestamp) as dow FROM uptime where id=$id");
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
              $dow=$row->dow;
              $dow=$dow + 1;
            }
        }

        $query = $this->db->query("SELECT cod_financiador FROM uptime where id=$id");
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
              $cod=$row->cod_financiador;
            }
            
        }
        
        print_r($min);echo " "; print_r($max); echo "  "; print_r($dow); echo " ";  echo " ";
               
        $sql=   "    SELECT distinct f.financiador,s.BonosResBonos as resumen, s.NamePrestador,s.Dayxweek, f.timestamp,"
                 . " EXTRACT(HOUR FROM f.timestamp) AS HORAU, EXTRACT(MINUTE FROM f.timestamp) AS MINUTE, CONCAT (s.Hour,':',s.Minute) AS HORA, CONCAT ('20',Week) AS YEAR "
                 . " FROM $this->table f, $this->table2 s"
                 . " WHERE f.estado=1 AND f.financiador=s.NameFinanciador AND f.cod_financiador=$cod " 
                 . " AND s.Hour=EXTRACT(HOUR FROM f.timestamp)"
                 . " AND s.Dayxweek=$dow"
                 . " AND s.Dayxweek<>'$max'" 
                 . " AND s.Minute BETWEEN  EXTRACT(MINUTE FROM f.timestamp) AND '$min'"; 
        
        $query = $this->db->query($sql);
      
        if ($query) { 
            return $query->result();
        } else
            return array();
        }
    
    function get_financiador_count() {
        $sql="select count(1) AS count from $this->table where estado=0";
        $query = $this->db->query($sql);
        if($query) {
            $result = $query->result();
            return $result[0]->count;
        }
        return 0; 
    }
    
    
    function get_status($id,$cod_fin) {
       
        $sql   ="select timestamp,cod_financiador from uptime where id<$id AND estado=1 AND cod_financiador=$cod_fin  ORDER BY id DESC limit 1";
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                return $row->timestamp;
        }
    }   
    }
        
    function get_diff_time($time1,$time2){
        
        $sql="SELECT  TIMEDIFF('$time1','$time2') as time";
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
            return $row->time;
        }
    }   
    
    }
      
    function get_tiempo($id){
        
        $query = $this->db->query("select timestamp from uptime where id<$id AND estado=1 ORDER BY id DESC limit 1");

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
             return $row->timestamp;
            }
        }
    
    }
    
    function get_charts_details() {
        $sql="select `from`,s,t,f from $this->table3 as resultado";
               
        $query = $this->db->query($sql);
        if($query) {
            return $query->result();
        }
        return 0; 
    }
    
    function get_data_charts()
    {
        $sql="select `from`,value  from $this->table3 as resultado where cat=0";
        $query = $this->db->query($sql);
        
        if($query) {
            return $query->result();   
        }
        return 0; 
    }
    
    function get_data_charts_2()
    {
        $sql="select `from`,value  from $this->table3 as resultad where cat=1";
                
        $query = $this->db->query($sql);
        if($query) {
            return $query->result();   
        }
        return 0; 
    }
    
    function get_data_charts_3()
    {
        $sql="select `from`,value  from $this->table4 as resultad";
        $query = $this->db->query($sql);
        
        if($query) {
            return $query->result();   
        }
        return 0; 
    }
    
    function get_avg_app()
    {
        $sql=" SELECT AVG(value) AS PROMEDIO FROM $this->table3 WHERE cat=0" ;
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
        return $row->PROMEDIO;
        }
    }   
    }
    
    function get_avg_app_01()
    {
        $sql=" SELECT AVG(value) AS PROMEDIO FROM $this->table3 WHERE cat=1" ;
        $query = $this->db->query($sql);
     
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
        return $row->PROMEDIO;
        }
    }   
        
    }
    
    function get_avg_app_02()
    {
        $sql=" SELECT AVG(value) AS PROMEDIO FROM $this->table4" ;
        $query = $this->db->query($sql);
     
        if ($query->num_rows() > 0) {
             foreach ($query->result() as $row) {
        return $row->PROMEDIO;
        }
    }   
        
    }
    
    function get_fin()
    {
        
        
        $query = $this->db->query('SELECT distinct financiador as financiador FROM uptime');
        return $query->result();
        
    }
    
}