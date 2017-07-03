<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles extends CI_Controller {
    
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
    
    
    function index($idBV=null)
	{
	    
        if($idBV!=null){
            $con = array('idLBV'=>1,'idBV'=>$idBV);
        }else{
            $con = array('idLBV'=>1);
        }
        $order = array('STT'=>'ASC','idBV'=>'DESC');
        $data['articles'] = $this->get->kmt_get_where('kmt_baiviet',$con,$order);
        
        
	    $this->kmt_seo->get_seo(2,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url('public/img/logo.png');
        $data['url_page'] = base_url('gioi-thieu');
        $data['page'] = $this->kmt_seo->page;

	    $data['main_content'] = 'client_page/articles/intro';
        $this->load->view('front_end_template/content', $data);
	}
    
    function shopping_guide($idBV=null)
	{
	    
        if($idBV!=null){
            $con = array('idLBV'=>3,'idBV'=>$idBV);
        }else{
            $con = array('idLBV'=>3);
        }
        $order = array('STT'=>'ASC','idBV'=>'DESC');
        $data['articles'] = $this->get->kmt_get_where('kmt_baiviet',$con,$order);
        
        if($this->lan=='vi'){
            $Title = 'Hướng dẫn mua hàng';
        }else{
            $Title = 'Shopping Guide';
        }
                
	    $this->kmt_seo->get_seo(6,$this->lan);
        $data['title'] = $Title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url('public/img/logo.png');
        $data['url_page'] = base_url('huong-dan-mua-hang');
        $data['page'] = $this->kmt_seo->page;

	    $data['main_content'] = 'client_page/articles/shopping_guide';
        $this->load->view('front_end_template/content', $data);
	}
    
    
    function support($idBV=null){
        
        if($idBV!=null){
            $con = array('idLBV'=>4,'idBV'=>$idBV);
        }else{
            $con = array('idLBV'=>4);
        }
        $order = array('STT'=>'ASC','idBV'=>'DESC');
        $data['articles'] = $this->get->kmt_get_where('kmt_baiviet',$con,$order,array(1,0));
        $data['list_articles'] = $this->get->kmt_get_where('kmt_baiviet',array('idLBV'=>4),$order);
        
        $TieuDe = '';
        $Seo_title = '';
        $Seo_description = '';
        $Seo_keyword = '';
        $Url_a = base_url();
        
        
        foreach($data['articles'] as $value){
            $idBV = $value->idBV;
            if($this->lan=='vi'){
                $TieuDe = $value->TieuDe_vi;
                $Seo_title = $value->Seo_title_vi;
                $Seo_description = $value->Seo_description_vi;
                $Seo_keyword = $value->Seo_keyword_vi;
                $Url_a = base_url().'ho-tro/'.mb_strtolower(url_title(removesign($TieuDe))).'-'.$idBV;
            }else{
                $TieuDe = $value->TieuDe_en;
                $Seo_title = $value->Seo_title_en;
                $Seo_description = $value->Seo_description_en;
                $Seo_keyword = $value->Seo_keyword_en;
                $Url_a = base_url().'support/'.mb_strtolower(url_title(removesign($TieuDe))).'-'.$idBV;
            }
        }
        
        $data['idBV_c'] = $idBV;
        $this->kmt_seo->get_seo(6,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url('public/img/logo.png');
        $data['url_page'] = base_url('ho-tro');
        $data['page'] = $this->kmt_seo->page;

	    $data['main_content'] = 'client_page/articles/support';
        $this->load->view('front_end_template/content', $data);
    }
    
    function news()
	{
        $con = array('idLBV'=>2,'TrangThai'=>1);
        $order = array('STT'=>'ASC','idBV'=>'DESC');

        if($this->lan=='vi'){
            $config['base_url'] = site_url('tin-tuc');
        }else{
            $config['base_url'] = site_url('news');   
        }
        
        $config['total_rows'] = $this->get->kmt_get_count('kmt_baiviet',$con);
        $config['per_page'] = 6;  
        $config['uri_segment'] = 2;
        $config['cur_tag_open'] = '<li class="active"><a class="active" href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['news'] = $this->get->kmt_get_where('kmt_baiviet',$con,$order,array($config['per_page'], $this->uri->segment($config['uri_segment']))); 
        $data['link'] = $this->pagination->create_links();

        $this->kmt_seo->get_seo(11,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = $config['base_url'];
        $data['page'] = $this->kmt_seo->page;

	    $data['main_content'] = 'client_page/articles/news';
        $this->load->view('front_end_template/content', $data);
	}
    
    function group_news($idNBV)
	{
        $con = array('TrangThai'=>1,'idLBV'=>3,'idNBV'=>$idNBV);
        $order = array('STT'=>'ASC','idBV'=>'DESC');
        
        if($this->lan=='vi'){
            $listings['Ten'] =  $this->get->kmt_get_col_where('kmt_nhombaiviet','TenNhom_vi',array('idNBV'=>$idNBV));
            $url_n = mb_strtolower(url_title(removesign($listings['Ten']))).'-'.$idNBV;
            $config['base_url'] = site_url('nhom-tin/'.$url_n);
        }else{
            $listings['Ten'] =  $this->get->kmt_get_col_where('kmt_nhombaiviet','TenNhom_en',array('idNBV'=>$idNBV));
            $url_n = mb_strtolower(url_title(removesign($listings['Ten']))).'-'.$idNBV;
            $config['base_url'] = site_url('group-news/'.$url_n);
        }

        $config['total_rows'] = $this->get->kmt_get_count('kmt_baiviet',$con);
        $config['per_page'] = 9;  
        $config['uri_segment'] = 3;
        $config['cur_tag_open'] = '<li class="active"><a class="active" href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $listings['news'] = $this->get->kmt_get_where('kmt_baiviet',$con,$order,array($config['per_page'], $this->uri->segment($config['uri_segment']))); 
        $listings['link'] = $this->pagination->create_links();
        
        $this->kmt_seo->get_seo(6,$this->lan);
        $listings['title'] = $listings['Ten'].' - '.$this->kmt_seo->title;
        $listings['description'] =  $this->kmt_seo->description;
        $listings['keywords'] = $this->kmt_seo->keywords;
        $listings['image_page'] =  base_url().'public/img/logo.png';
        $listings['url_page'] = $config['base_url'];
        $listings['page'] = $this->kmt_seo->page;
        
	    $listings['main_content'] = 'client_page/articles/group_news';
        $this->load->view('front_end_template/content', $listings);
	}
    
    function details_news($idBV)
	{

        $con = array('idBV'=>$idBV);
        $order = array('STT'=>'ASC','idBV'=>'DESC');
        
        $data['articles'] =$this->get->kmt_get_where('kmt_baiviet',array('idBV'=>$idBV));
        
        $con_same = array('idLBV'=>2,'idBV < '=>$idBV);
        $order_same = array('STT'=>'ASC','idBV'=>'DESC');
        $data['same_articles'] = $this->get->kmt_get_where('kmt_baiviet',$con_same,$order_same,array(5,0));
        
        $TieuDe = '';
        $Seo_title = '';
        $Seo_description = '';
        $Seo_keyword = '';
        $Url_a = base_url();
                    
        foreach($data['articles'] as $value){
            $idNBV = $value->idNBV;
            if($this->lan=='vi'){
                    $TieuDe = $value->TieuDe_vi;
                    $Seo_title = $value->Seo_title_vi;
                    $Seo_description = $value->Seo_description_vi;
                    $Seo_keyword = $value->Seo_keyword_vi;
                    $Url_a = base_url().'tin-tuc/'.mb_strtolower(url_title(removesign($TieuDe))).'-'.$idBV;
                    $data['Ten'] =  $this->get->kmt_get_col_where('kmt_nhombaiviet','TenNhom_vi',array('idNBV'=>$idNBV));
                }else{
                    $TieuDe = $value->TieuDe_en;
                    $Seo_title = $value->Seo_title_en;
                    $Seo_description = $value->Seo_description_en;
                    $Seo_keyword = $value->Seo_keyword_en;
                    $Url_a = base_url().'news/'.mb_strtolower(url_title(removesign($TieuDe))).'-'.$idBV;
                    $data['Ten'] =  $this->get->kmt_get_col_where('kmt_nhombaiviet','TenNhom_en',array('idNBV'=>$idNBV));
                }
            $UrlHinh = $this->get->kmt_get_col_where('kmt_hinhanh','UrlHinh',array('MaHinh'=>$value->MaHinh));
        }
        
        $this->kmt_seo->get_seo(11,$this->lan);
        $data['title'] = $Seo_title;
        $data['description'] =  $Seo_description;
        $data['keywords'] = $Seo_keyword;
        $data['image_page'] =  $UrlHinh;
        $data['url_page'] = $Url_a;
        $data['page'] = $this->kmt_seo->page;

	    $data['main_content'] = 'client_page/articles/details_news';
        $this->load->view('front_end_template/content', $data);
	}
    
}
