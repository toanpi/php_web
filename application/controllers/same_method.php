<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Same_method extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('get_model', 'get');
        $this->load->model('set_model', 'set');
    }
    
    public function index(){}
    
    public function udp_status($table,$id,$key,$col,$value){
        $data = array($col => $value,'NgayCapNhat' => date("Y-m-d h:i:s"));
        $rs = $this->set->kmt_update_data($table,$data,array($key=>$id));
        redirect_back('success');
    }
    
    public function upp_status_list($table,$col_temp,$act)
    {
        
        $list_id = $this->input->post('id_check');
        
        if ($list_id) {
            Switch($act){
            
            Case '1':  
                $data = array('TieuBieu' => 1, 'NgayCapNhat' => date("Y-m-d h:i:s"));
                $rs = $this->set->kmt_update_list_data($table, $data, $list_id, $col_temp);
                break;
            
            Case '2':  
                $data = array('TieuBieu' => 0, 'NgayCapNhat' => date("Y-m-d h:i:s"));
                $rs = $this->set->kmt_update_list_data($table, $data, $list_id, $col_temp); 
                break;  
            
            Case '3':  
                $data = array('TrangThai' => 1, 'NgayCapNhat' => date("Y-m-d h:i:s"));
                $rs = $this->set->kmt_update_list_data($table, $data, $list_id, $col_temp); 
                break;
            
            Case '4':  
                $data = array('TrangThai' => 0, 'NgayCapNhat' => date("Y-m-d h:i:s"));
                $rs = $this->set->kmt_update_list_data($table, $data, $list_id, $col_temp);
                break;
            
            Case '5':  
                $data = array('BanChay' => 1, 'NgayCapNhat' => date("Y-m-d h:i:s"));
                $rs = $this->set->kmt_update_list_data($table, $data, $list_id, $col_temp);
                break;
                 
            Default:
                $data = array('BanChay' => 0, 'NgayCapNhat' => date("Y-m-d h:i:s"));
                $rs = $this->set->kmt_update_list_data($table, $data, $list_id, $col_temp);
                break;
            }
            redirect_back();
        } else {
            redirect_back();
        }
    }
    
    public function convert($lang){
       $this->session->set_userdata(array('lan' => $lang));
       redirect_back();
    }
    
    public function ud_numbers($table,$col_temp){

        $list_id = $this->input->post('id');
        $list_v = $this->input->post('stt');
        $num_array = count($list_id);
        if($num_array>0){
            for($i=1;$i<=$num_array;$i++){
                $id = $list_id[$i-1];
                $value = round($list_v[$i-1]);
                $data = array('STT'=>$value);
                $con = array($col_temp=>$id);
                $this->set->kmt_update_data($table,$data,$con);
            }  
        }
        redirect_back();
    }
    
    public function del_one($table,$id)
    {
        $this->load->model('del_model', 'del');
        
        Switch($table){

          Case 'kmt_baiviet':  
            $idLBV = $this->get->kmt_get_col_where('kmt_baiviet','idLBV',array('idBV'=>$id));
            $rs = $this->del->kmt_del_has_img($table,$id);
            if($rs){
                redirect_back('success');
            }else{
                redirect_back('fail');
            }
            break;
          
          
          Case 'kmt_nguoidung':  
            $rs = $this->del->kmt_del($table,$id);
                if($rs){
                    redirect_back('success');
                }else{
                    redirect_back('fail');
                }
            break;
          
          
          Case 'kmt_video':  
            $rs = $this->del->kmt_del($table,$id);
                if($rs){
                    redirect_back('success');
                }else{
                    redirect_back('fail');
                }
            break;
          
         
          Case 'kmt_donhang':  
            $TrangThai = $this->get->kmt_get_col_where('kmt_donhang','TrangThai',array('idDH'=>$id));
            $rs = $this->del->kmt_del($table,$id);
                if($rs){
                    redirect('admin_cart/index/'.$TrangThai.'/success');
                }else{
                    redirect('admin_cart/index/'.$TrangThai.'/fail');
                }
            break;
          
          Case 'kmt_lienhe':  
            $rs = $this->del->kmt_del($table,$id);
                if($rs){
                    redirect_back('success');
                }else{
                    redirect_back('fail');
                }
            break;
          
          Case 'kmt_list_prices':  
            $rs = $this->del->kmt_del($table,$id);
                if($rs){
                    redirect_back('success');
                }else{
                    redirect_back('fail');
                }
            break;  
            
          
        Default:
            $rs = $this->del->kmt_del_has_img($table,$id);
                if($rs){
                    redirect_back('success');
                }else{
                    redirect_back('fail');
                }
            break;
        
        }
    }
    
    public function del_one_check($table,$id)
    {
        $this->load->model('check_model', 'check');
        $this->load->model('del_model', 'del');
        
        Switch($table){
          Case 'kmt_menu':  
            $check_menu = $this->check->kmt_check_child('kmt_menu','idMN_p',$id);
            $check_item = $this->check->kmt_check_child('kmt_item_in_menu','idMN',$id);
            if($check_menu==0 && $check_item==0){
                $rs = $this->del->kmt_del_has_img($table,$id);
                if($rs){
                    redirect_back('success');
                }else{
                    redirect_back('fail');
                }
            }else{
                redirect_back('fail');
            }
            break;
            
          Case 'kmt_menu_1':  
            $check_menu_2 = $this->check->kmt_check_child('kmt_menu_2','idMN_1',$id);
            $check_menu_3 = $this->check->kmt_check_child('kmt_menu_3','idMN_1',$id);
            $check_item = $this->check->kmt_check_child('kmt_item','idMN_1',$id);
            if($check_menu_2==0 && $check_menu_3==0 && $check_item==0){
                $rs = $this->del->kmt_del_has_img($table,$id);
                if($rs){
                    redirect_back('success');
                }else{
                    redirect_back('fail');
                }
            }else{
                redirect_back('fail');
            }
            break;
          
          Case 'kmt_menu_2':  
            $check_menu_3 = $this->check->kmt_check_child('kmt_menu_3','idMN_2',$id);
            $check_item = $this->check->kmt_check_child('kmt_item','idMN_2',$id);
            if($check_menu_3==0 && $check_item==0){
               $rs = $this->del->kmt_del_has_img($table,$id);
               if($rs){
                    redirect_back('success');
                }else{
                    redirect_back('fail');
                }
            }else{
               redirect_back('fail');
            }
            break; 
           
          Case 'kmt_menu_3':  
            $check_item = $this->check->kmt_check_child('kmt_item','idMN_3',$id);
            if($check_item==0){
               $rs = $this->del->kmt_del_has_img($table,$id);
               if($rs){
                    redirect_back('success');
                }else{
                    redirect_back('fail');
                }
            }else{
               redirect_back('fail');
            }
            break;
          
          Case 'kmt_baiviet':  
            $check_item = $this->check->kmt_check_child('kmt_baiviet','idBV_p',$id);
            if($check_item==0){
               $rs = $this->del->kmt_del_has_img($table,$id);
               if($rs){
                    redirect_back('success');
                }else{
                    redirect_back('fail');
                }
            }else{
               redirect_back('fail');
            }
            break;
            
          
          
          Case 'kmt_nhombaiviet':  
            $check = $this->check->kmt_check_child('kmt_baiviet','idNBV',$id);
            if($check==0){
               $rs = $this->del->kmt_del_has_img($table,$id);
               if($rs){
                    redirect_back('success');
                }else{
                    redirect_back('fail');
                }
            }else{
               redirect_back('fail');
            }
            break;  
         
             
        Default:
            redirect('admin_home');
            break;
        
        }
    }
    
    public function del_all($table)
    {
        $this->load->model('del_model', 'del');
        $id = $this->input->post('id_check');
        $rs = 'rs/'.$this->del->kmt_del_all($table, $id);
        redirect_back($rs);
    }
    
    public function del_all_check($table)
    {
        $this->load->model('del_model', 'del');
        $id = $this->input->post('id_check');
        $rs = 'rs/'.$this->del->kmt_del_all_check($table, $id);
        redirect_back($rs);
    }
}

