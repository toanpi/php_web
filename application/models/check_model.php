<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Check_model extends CI_Model{
    
    function kmt_checkLogin($user,$pass,$idN,$stt=null){
        if($stt!=null){
            $test = $this->db->get_where('kmt_nguoidung',array('TaiKhoan'=>$user,'MatKhau'=>sha1($pass),'idN'=>$idN,'TrangThai'=>$stt));
        }else{
            $test = $this->db->get_where('kmt_nguoidung',array('TaiKhoan'=>$user,'MatKhau'=>sha1($pass),'idN'=>$idN));
        }
		
        if($test->num_rows() == 1){
            return true;
        }else{
            return false;
        }
    }
    
    function kmt_checkInfo($table,$col,$value){
		$test = $this->db->get_where($table,array($col=>$value));
        if($test->num_rows() == 1){
            return true;
        }else{
            return false;
        }
    }
    
    function kmt_check_child($table,$col,$id){
        $this->load->model('get_model', 'get');
        $rs = $this->get->kmt_get_count($table,array($col=>$id));
        return $rs;
    }
    
}