<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Kmt_seo {
    
    public $title = NAME_VI;
    public $description = NAME_VI;
    public $keywords = NAME_VI;

    public $page;
    
    function get_seo($id,$lan)
    {
       $CI =& get_instance();
       $CI->load->model('get_model','get');

       $idP = $id;
       $this->page = $id;
       $list_key = $CI->get->kmt_get_where('kmt_tukhoa',array('idP'=>$id));
       if(count($list_key)>0){
           foreach($list_key as $key){
                $TieuDe_vi = $key->TieuDe_vi; 
                $TieuDe_en = $key->TieuDe_en;
                $NoiDung_vi = $key->NoiDung_vi;
                $NoiDung_en = $key->NoiDung_en;
                $TuKhoa_vi = $key->TuKhoa_vi;
                $TuKhoa_en = $key->TuKhoa_en;
                $Page = $key->idP;
           }
           
           if($lan=='vi'){
                $this->title = $TieuDe_vi;
                $this->description = $NoiDung_vi;
                $this->keywords = $TuKhoa_vi;
           }else{
                $this->title = $TieuDe_en;
                $this->description = $NoiDung_en;
                $this->keywords = $TuKhoa_en;
           }
           $this->page = $Page;
       }
    }
    
}