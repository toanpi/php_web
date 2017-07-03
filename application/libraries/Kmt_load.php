<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
    
    $Css_code = '';
class Kmt_load {
    
    
    
    function __construct(){
        $CI =& get_instance();
        $CI->load->model('get_model','get');
        $CI->TyGia = $CI->get->kmt_get_col_where('kmt_system','TyGia'); 
        $CI->Css_code = $CI->get->kmt_get_col_where('kmt_system','Css_code'); 
    }
    
    function get_tygia(){
        $CI =& get_instance();
        $CI->load->model('get_model','get');
        return $CI->get->kmt_get_col_where('kmt_system','TyGia'); 
    }
    
    public function check_lan()
    {
        $CI =& get_instance();
        $lan = $CI->session->userdata('lan');
		if(!isset($lan) || $lan != TRUE){
			return 'en';
		}else{
		    return $CI->session->userdata('lan');
		}
    }
    
    function get_banner($con,$limit=null)
    {
        $CI =& get_instance();
        $CI->load->model('get_model','get');
        $order = array('STT'=>'ASC','idH'=>'DESC');
        return $CI->get->kmt_get_where('kmt_hinhanh',$con,$order,$limit); 
    }
    
    function get_menu($con=null,$limit=null)
    {
        $CI =& get_instance();
        $CI->load->model('get_model','get');
        $order = array('STT'=>'ASC','idMN_1'=>'DESC');
        return $CI->get->kmt_get_where('kmt_menu_1',$con,$order,$limit); 
    }
    
    function get_menu_2($con=null,$limit=null)
    {
        $CI =& get_instance();
        $CI->load->model('get_model','get');
        $order = array('STT'=>'ASC','idMN_2'=>'DESC');
        return $CI->get->kmt_get_where('kmt_menu_2',$con,$order,$limit); 
    }
    
    function get_item($con=null,$limit=null)
    {
        $CI =& get_instance();
        $CI->load->model('get_model','get');
        $order = array('STT'=>'ASC','idIT'=>'DESC');
        return $CI->get->kmt_get_where('kmt_item',$con,$order,$limit); 
    }
    
    function get_group_articles($con=null)
    {
        $CI =& get_instance();
        $CI->load->model('get_model','get');
        $order = array('STT'=>'ASC','idNBV'=>'DESC');
        return $CI->get->kmt_get_where('kmt_nhombaiviet',$con,$order); 
    }
    
    function get_group_file($con=null)
    {
        $CI =& get_instance();
        $CI->load->model('get_model','get');
        $order = array('STT'=>'ASC','idNF'=>'DESC');
        return $CI->get->kmt_get_where('kmt_nhomfile',$con,$order); 
    }
    
    function get_articles($con,$limit=null)
    {
        $CI =& get_instance();
        $CI->load->model('get_model','get');
        $order = array('STT'=>'ASC','idBV'=>'DESC');
        return $CI->get->kmt_get_where('kmt_baiviet',$con,$order,$limit); 
    }
    
    function get_support($con=null,$limit=null)
    {
       $CI =& get_instance();
       $CI->load->model('get_model','get');
       $order = array('STT'=>'ASC','idHT'=>'DESC');
       return $CI->get->kmt_get_where('kmt_hotro',$con,$order,$limit); 
    }
    
    function get_video($con=null,$limit=null)
    {
       $CI =& get_instance();
       $CI->load->model('get_model','get');
       $order = array('STT'=>'ASC','idV'=>'DESC');
       return $CI->get->kmt_get_where('kmt_video',$con,$order,$limit); 
    }
    
    function get_file($con=null,$limit=null)
    {
       $CI =& get_instance();
       $CI->load->model('get_model','get');
       $order = array('STT'=>'ASC','idF'=>'DESC');
       return $CI->get->kmt_get_where('kmt_file',$con,$order,$limit); 
    }
    
    function get_link($con=null,$limit=null)
    {
       $CI =& get_instance();
       $CI->load->model('get_model','get');
       $order = array('STT'=>'ASC','idLK'=>'DESC');
       return $CI->get->kmt_get_where('kmt_lienket',$con,$order,$limit); 
    }
    
    function get_address()
    {
        $CI =& get_instance();
        $CI->load->model('get_model','get');
        return $CI->get->kmt_get_where('kmt_diachi',array('idVT'=>2)); 
    }
    
    function get_social()
    {
        $CI =& get_instance();
        $CI->load->model('get_model','get');
        return $CI->get->kmt_get_where('kmt_mangxahoi');
    }
    
    function get_useronline(){
        return visitors();
    }
    
    function get_visitor(){
        $CI =& get_instance();
        $CI->load->model('get_model','get');
        return $CI->get->kmt_get_col_where('kmt_thongke','LuotTruyCap');
    }
}