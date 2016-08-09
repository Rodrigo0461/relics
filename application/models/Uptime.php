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
   
    function get_financiador_details( $select = null,$search = null,$limit = null,$ext_search_fields = array(),$bono= null) {
       
        if ($select == "") {
             $sql =  "SELECT  id,financiador,cod_financiador as cod_fin,  EXTRACT(YEAR from timestamp) AS year, timestamp,estado";
        }
        else {  
             $sql = "SELECT $select ";
        }
        
        $sql .= " FROM $this->table";
        
        if($search != "") {
                $sql .= " WHERE financiador='$search' AND estado=0 AND Bono3=$bono";
        }
        else {
                $sql .= " WHERE estado=0 AND Bono3=$bono ";
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
        
        $query = $this->db->query($sql);
        return $query->result();
        
    }
    
    
    function get_view_financiador($id) {
       
        $query = $this->db->query("select DATE_FORMAT(timestamp,'%H:%i:%s') as t1,financiador from uptime where id<$id AND estado=1 ORDER BY id DESC limit 1");
        
        $min=0;
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
              $t1=$row->t1;
              $f1=$row->financiador;
            }
        }
        
        $query = $this->db->query("SELECT WEEKDAY(timestamp) as dow FROM uptime where id=$id");
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
              $dow=$row->dow;
             
            }
        }

        $query = $this->db->query("SELECT DATE_FORMAT(timestamp,'%H:%i:%s') AS horas, cod_financiador,financiador FROM uptime where id=$id");
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
              $cod=$row->cod_financiador;
              $t2=$row->horas;
              $financiadors=$row->financiador;
            }
            
        }
        
        $sql =  " SELECT BonosResBonos,NameFinanciador,NamePrestador,time "
                . "FROM  $this->table2  "
                . "WHERE Dayxweek=$dow AND NameFinanciador='$financiadors' AND time >'$t1' AND  time <'$t2' AND Dayxweek='$dow' ";
        
        $query = $this->db->query($sql);
        
        if ($query) { 
            return $query->result();
        } else
            return array();
        }
    
    function get_financiador_count($search,$ext_search_fields = array(),$bono = null ) {
        
       if($search == "") {
                $sql = " SELECT COUNT(1) AS count from $this->table where Bono3=$bono ";
               
        }
        else {
                $sql = " SELECT COUNT(1) AS count from $this->table where estado=0 and financiador='$search' and Bono3=$bono "; 
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