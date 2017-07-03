<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Set_model extends CI_Model{
    
    function kmt_update_data($table,$data,$con){
        foreach($con as $u=>$v){
            $this->db->where($table.'.'.$u,$v);
        }
        return $this->db->update($table, $data); 
    }
    
    function kmt_update_list_data($table,$data,$con,$col){
        $stt = "";
        $sucess = 0;
        $fail = 0;
        $num_array = count($con);
              if($num_array>0){
                     for($i=1;$i<=$num_array;$i++){
                        $id = $con[$i-1];
                        $this->db->where($table.'.'.$col,$id);
                        $rs = $this->db->update($table, $data);
                        if($rs){
                            $sucess++;
                        }else{
                            $fail++;
                        }
                     }  
             }
        $stt = $sucess.'-'.$fail;    
        return $stt;
    }
    
    function kmt_insert_data($table,$data){
        $rs = $this->db->insert($table,$data);
        return $rs;
    }

}