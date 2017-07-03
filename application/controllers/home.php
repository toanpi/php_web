<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public $menu;
    public $address;
    public $social;
    public $useronline;
    public $visitor;
    public $lan=null;
    
    function __construct(){
        parent::__construct();
        
        $this->lan = $this->kmt_load->check_lan();
        $this->menu = $this->kmt_load->get_menu(array('TrangThai'=>1));
        $this->support =  $this->kmt_load->get_support(array('TieuBieu'=>1,'TrangThai'=>1),array(1,0));
        $this->address =  $this->kmt_load->get_address();
        $this->social =  $this->kmt_load->get_social();
        
        $this->useronline =  $this->kmt_load->get_useronline();
        $this->visitor =  $this->kmt_load->get_visitor();
    }
    
    function index()
	{
	    
	    $this->kmt_seo->get_seo(1,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url('public/img/logo.png');
        $data['url_page'] = base_url();
        $data['page'] = $this->kmt_seo->page;
        
        $con_intro = array('TrangThai'=>1,'idLBV'=>1);
        $order_intro = array('STT'=>'ASC','idBV'=>'DESC');
        $data['intro'] = $this->get->kmt_get_where('kmt_baiviet',$con_intro,$order_intro,array(1,0)); 
        
        $con_menu = array('TrangThai'=>1,'TieuBieu'=>1);
        $order_menu = array('STT'=>'ASC','idMN_1'=>'DESC');
        $data['menu_note'] = $this->get->kmt_get_where('kmt_menu_1',$con_menu,$order_menu,array(1,0)); 
        
        $con_news = array('TrangThai'=>1,'idLBV'=>2,'TieuBieu'=>1);
        $data['news'] = $this->get->kmt_get_where('kmt_baiviet',$con_news,$order_intro); 
        
	    $data['main_content'] = 'client_page/home';
        $this->load->view('front_end_template/content', $data);
	}
    
}
