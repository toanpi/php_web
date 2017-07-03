<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Get_model extends CI_Model{
    
    var $array_temp = array();
    
    function tachSo($value){
            if($value>0){
                $v = $value%10;
                $u = floor($value/10);
                array_push($this->array_temp, $v);
                $this->tachSo($u);
            }
    }
    
    function kmt_get_current_page() {
         $pageURL = 'http';
         if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
         $pageURL .= "://";
         if ($_SERVER["SERVER_PORT"] != "80") {
          $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
         } else {
          $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
         }
         return $pageURL;
    }

    
    function kmt_get_col_where($table,$col,$con=null,$order=null,$limit=null){
        $val = null;
        $this->db->select($table.'.'.$col, FALSE);
        $this->db->from($table);
        if($con!=null){
            foreach($con as $u=>$v){
                $this->db->where($table.'.'.$u,$v);
            }
        }
        
        if($order!=null){
            foreach($order as $u=>$v){
                 $this->db->order_by($table.'.'.$u,$v);
            }
        }
        
        if($limit!=null){
            $this->db->limit($limit[0], $limit[1]);
        }
        
        $query = $this->db->get();
        foreach($query->result() as $value){
            $val = $value->$col;
        }
        return $val;
    }
    
    function kmt_get_min($table,$col){
        $id = 0;
        $this->db->select_min($col);
        $query = $this->db->get($table);
        foreach($query->result() as $value){
            $id = $value->$col;
        }
        return $id;
    }
    
    function kmt_get_max($table,$col){
        $id = 0;
        $this->db->select_max($col);
        $query = $this->db->get($table);
        foreach($query->result() as $value){
            $id = $value->$col;
        }
        return $id;
    }
    
    function kmt_get_where($table,$con=null,$order=null,$limit=null,$group=null){
        $this->db->select($table.'.*', FALSE);
        $this->db->from($table);
        if($con!=null){
            foreach($con as $u=>$v){
                $this->db->where($u,$v);
            }
        }
        if($order!=null){
            foreach($order as $u=>$v){
                 $this->db->order_by($table.'.'.$u,$v);
            }
        }
        
        if($group!=null){
            $this->db->group_by($table.'.'.$group); 
        }
        
        if($limit!=null){
            $this->db->limit($limit[0], $limit[1]);
        }
        
        $query = $this->db->get();  
        return $query->result();
    }

    function kmt_get_count($table,$con=null,$order=null,$group=null){
        $this->db->select($table.'.*', FALSE);
        $this->db->from($table);
        if($con!=null){
            foreach($con as $u=>$v){
                $this->db->where($table.'.'.$u,$v);
            }
        }
        if($order!=null){
            foreach($order as $u=>$v){
                 $this->db->order_by($table.'.'.$u,$v);
            }
        }
        
        if($group!=null){
            $this->db->group_by($table.'.'.$group); 
        }
        
        $query = $this->db->get();  
        return $query->num_rows();
    }
    
    function kmt_get_where_arr($table,$con=null,$order=null,$limit=null,$group=null){
        $this->db->select($table.'.*', FALSE);
        $this->db->from($table);
        if($con!=null){
            foreach($con as $u=>$v){
                foreach($v as $x=>$y){
                    $this->db->or_where($table.'.'.$u,$y);
                }
            }
        }
        if($order!=null){
            foreach($order as $u=>$v){
                 $this->db->order_by($table.'.'.$u,$v);
            }
        }
        
        if($group!=null){
            $this->db->group_by($table.'.'.$group); 
        }
        
        if($limit!=null){
            $this->db->limit($limit[0], $limit[1]);
        }
        
        $query = $this->db->get();  
        return $query->result();
    }
    
    function kmt_get_count_arr($table,$con=null,$order=null,$group=null){
        $this->db->select($table.'.*', FALSE);
        $this->db->from($table);
        if($con!=null){
            foreach($con as $u=>$v){
                foreach($v as $x=>$y){
                    $this->db->or_where($table.'.'.$u,$y);
                }
            }
        }
        if($order!=null){
            foreach($order as $u=>$v){
                 $this->db->order_by($table.'.'.$u,$v);
            }
        }
        
        if($group!=null){
            $this->db->group_by($table.'.'.$group); 
        }
        
        $query = $this->db->get();  
        return $query->num_rows();
    }
    
    function kmt_get_count_search($table,$data){    
        $this->db->select($table.'.*', FALSE);
        $this->db->from($table);
        $this->db->or_like($data);
        $query = $this->db->get()->num_rows();   
        return $query; 
    }
    
    function kmt_get_search($table,$data,$to,$form){
        $this->db->select($table.'.*', FALSE);
        $this->db->from($table);
        $this->db->or_like($data);
        $this->db->limit($to, $form);
        $query = $this->db->get();   
        return $query->result(); 
    }
    
    function kmt_get_count_search_where($table,$data,$con=null){    
        $this->db->select($table.'.*', FALSE);
        $this->db->from($table);
        if($con!=null){
            foreach($con as $u=>$v){
                $this->db->where($u,$v);
            }
        }

        $this->db->or_like($data);
        $this->db->bracket('close','like');
        $query = $this->db->get()->num_rows();   
        return $query; 
    }
    
    function kmt_get_search_where($table,$data,$to,$form,$con=null){
        $this->db->select($table.'.*', FALSE);
        $this->db->from($table);
        if($con!=null){
            foreach($con as $u=>$v){
                $this->db->where($u,$v);
            }
        }
        
        $this->db->or_like($data);
        $this->db->bracket('close','like');
        $this->db->limit($to, $form);
        $query = $this->db->get();   
        return $query->result(); 
    }
    
    function kmt_get_count_search_articles($idLBV,$keyword){
        $sql = "SELECT * FROM kmt_baiviet
                 WHERE kmt_baiviet.idLBV=$idLBV AND 
                 (kmt_baiviet.TieuDe_vi like '%$keyword%' 
                 OR kmt_baiviet.TieuDe_en like '%$keyword%'
                 OR kmt_baiviet.TomTat_vi LIKE '%$keyword%'
                 OR kmt_baiviet.TomTat_en LIKE '%$keyword%'
                 OR kmt_baiviet.NoiDung_vi LIKE '%$keyword%'
                 OR kmt_baiviet.NoiDung_en LIKE '%$keyword%'
                 )";    
               
        $query = $this->db->query($sql);
        return count($query->result());
    }
        
    function kmt_get_search_articles($idLBV,$keyword){
        $sql = "SELECT * FROM kmt_baiviet
                 WHERE kmt_baiviet.idLBV=$idLBV AND 
                 (kmt_baiviet.TieuDe_vi like '%$keyword%' 
                 OR kmt_baiviet.TieuDe_en like '%$keyword%'
                 OR kmt_baiviet.TomTat_vi LIKE '%$keyword%'
                 OR kmt_baiviet.TomTat_en LIKE '%$keyword%'
                 OR kmt_baiviet.NoiDung_vi LIKE '%$keyword%'
                 OR kmt_baiviet.NoiDung_en LIKE '%$keyword%'
                 ) ORDER BY kmt_baiviet.idBV DESC";
        
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function kmt_get_count_search_it($idMN_1=0,$idL=0,$keyword){
        if($idMN_1!=0 && $idL!=0){
            $sql = "SELECT * FROM kmt_item
                 WHERE kmt_item.idMN_1=$idMN_1 AND kmt_item.idL=$idL AND 
                 (kmt_item.Ten_vi like '%$keyword%' 
                 OR kmt_item.Ten_en like '%$keyword%'
                 OR kmt_item.MaSo LIKE '%$keyword%'
                 OR kmt_item.MoTa_vi LIKE '%$keyword%'
                 OR kmt_item.MoTa_en LIKE '%$keyword%'
                 )";
        }elseif($idMN_1!=0 && $idL==0){
            $sql = "SELECT * FROM kmt_item
                 WHERE kmt_item.idMN_1=$idMN_1 AND 
                 (kmt_item.Ten_vi like '%$keyword%' 
                 OR kmt_item.Ten_en like '%$keyword%'
                 OR kmt_item.MaSo LIKE '%$keyword%'
                 OR kmt_item.MoTa_vi LIKE '%$keyword%'
                 OR kmt_item.MoTa_en LIKE '%$keyword%'
                 )";
        }else{
            $sql = "SELECT * FROM kmt_item
                 WHERE kmt_item.idL=$idL AND 
                 (kmt_item.Ten_vi like '%$keyword%' 
                 OR kmt_item.Ten_en like '%$keyword%'
                 OR kmt_item.MaSo LIKE '%$keyword%'
                 OR kmt_item.MoTa_vi LIKE '%$keyword%'
                 OR kmt_item.MoTa_en LIKE '%$keyword%'
                 )";
        }

        $query = $this->db->query($sql);
        return count($query->result());
    }
    
    function kmt_get_search_it($idMN_1=0,$idL=0,$keyword,$from,$to){
        if($idMN_1!=0 && $idL!=0){
            $sql = "SELECT * FROM kmt_item
                 WHERE kmt_item.idMN_1=$idMN_1 AND kmt_item.idL=$idL AND 
                 (kmt_item.Ten_vi like '%$keyword%' 
                 OR kmt_item.Ten_en like '%$keyword%'
                 OR kmt_item.MaSo LIKE '%$keyword%'
                 OR kmt_item.MoTa_vi LIKE '%$keyword%'
                 OR kmt_item.MoTa_en LIKE '%$keyword%'
                 ) ORDER BY kmt_item.idIT DESC LIMIT $from,$to";
        }elseif($idMN_1!=0 && $idL==0){
            $sql = "SELECT * FROM kmt_item
                 WHERE kmt_item.idMN_1=$idMN_1 AND 
                 (kmt_item.Ten_vi like '%$keyword%' 
                 OR kmt_item.Ten_en like '%$keyword%'
                 OR kmt_item.MaSo LIKE '%$keyword%'
                 OR kmt_item.MoTa_vi LIKE '%$keyword%'
                 OR kmt_item.MoTa_en LIKE '%$keyword%'
                 ) ORDER BY kmt_item.idIT DESC LIMIT $from,$to";
        }else{
            $sql = "SELECT * FROM kmt_item
                 WHERE kmt_item.idL=$idL AND 
                 (kmt_item.Ten_vi like '%$keyword%' 
                 OR kmt_item.Ten_en like '%$keyword%'
                 OR kmt_item.MaSo LIKE '%$keyword%'
                 OR kmt_item.MoTa_vi LIKE '%$keyword%'
                 OR kmt_item.MoTa_en LIKE '%$keyword%'
                 ) ORDER BY kmt_item.idIT DESC LIMIT $from,$to";
        }
        
        
        $query = $this->db->query($sql);
        return $query->result();
    }
    

}
