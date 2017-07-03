<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends CI_Controller {
    
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
	    $con = array('TrangThai'=>1);
        $order = array('STT'=>'ASC','idMN_1'=>'DESC');

        if($this->lan=='vi'){
            $config['base_url'] = site_url('san-pham');
        }else{
            $config['base_url'] = site_url('products');   
        }
        
        $config['total_rows'] = $this->get->kmt_get_count('kmt_menu_1',$con);
        $config['per_page'] = 12;  
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
        $data['item'] = $this->get->kmt_get_where('kmt_menu_1',$con,$order,array($config['per_page'], $this->uri->segment($config['uri_segment']))); 
        $data['link'] = $this->pagination->create_links();

        $this->kmt_seo->get_seo(3,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url('public/img/logo.png');
        $data['url_page'] = $config['base_url'];
        $data['page'] = $this->kmt_seo->page;

	    $data['main_content'] = 'client_page/item/item';
        $this->load->view('front_end_template/content', $data);
	}
    
    function purchase()
	{
	    $con = array('TrangThai'=>1);
        $order = array('STT'=>'ASC','idMN_1'=>'DESC');

        if($this->lan=='vi'){
            $config['base_url'] = site_url('mua-hang');
        }else{
            $config['base_url'] = site_url('purchase');   
        }
        
        
        $data['list_menu'] = $this->get->kmt_get_where('kmt_menu_1',$con,$order); 
       
        $this->kmt_seo->get_seo(4,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url('public/img/logo.png');
        $data['url_page'] = $config['base_url'];
        $data['page'] = $this->kmt_seo->page;
        
        $con_ht = array('TrangThai'=>1,'idLBV'=>3);
        $order_ht = array('STT'=>'ASC','idBV'=>'DESC');
        $data['articles'] = $this->get->kmt_get_where('kmt_baiviet',$con_ht,$order_ht,array(1,0));
        
        
	    $data['main_content'] = 'client_page/item/purchase';
        $this->load->view('front_end_template/content', $data);
	}
    
    function item_note()
	{
	    $con = array('TrangThai'=>1,'TieuBieu'=>1);
        $order = array('STT'=>'ASC','idIT'=>'DESC');

         if($this->lan=='vi'){
            $config['base_url'] = site_url('san-pham-noi-bat');
        }else{
            $config['base_url'] = site_url('featured-products');   
        }
        
        $config['total_rows'] = $this->get->kmt_get_count('kmt_item',$con);
        $config['per_page'] = 16;  
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
        $data['item'] = $this->get->kmt_get_where('kmt_item',$con,$order,array($config['per_page'], $this->uri->segment($config['uri_segment']))); 
        $data['link'] = $this->pagination->create_links();

        $this->kmt_seo->get_seo(3,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = $config['base_url'];
        $data['page'] = $this->kmt_seo->page;

	    $data['main_content'] = 'client_page/item/item_note';
        $this->load->view('front_end_template/content', $data);
	}
    
    
    
    function item_hot()
	{
	    $con = array('TrangThai'=>1,'BanChay'=>1);
        $order = array('STT'=>'ASC','idIT'=>'DESC');
        
        if($this->lan=='vi'){
            $config['base_url'] = site_url('hang-khuyen-mai');
        }else{
            $config['base_url'] = site_url('sale-products');   
        }
        
        
        $config['total_rows'] = $this->get->kmt_get_count('kmt_item',$con);
        $config['per_page'] = 8;  
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
        $data['item'] = $this->get->kmt_get_where('kmt_item',$con,$order,array($config['per_page'], $this->uri->segment($config['uri_segment']))); 
        $data['link'] = $this->pagination->create_links();

        $this->kmt_seo->get_seo(5,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = $config['base_url'];
        $data['page'] = $this->kmt_seo->page;

	    $data['main_content'] = 'client_page/item/item_hot';
        $this->load->view('front_end_template/content', $data);
	}

    function item_in_menu_1($idMN_1)
	{
	    $this->id_1 = $idMN_1;
        $this->news =  $this->kmt_load->get_articles(array('TrangThai'=>1,'idLBV'=>3,'TieuBieu'=>1,'idMN_1'=>$idMN_1),array(5,0));
        
        $con = array('TrangThai'=>1,'idMN_1'=>$idMN_1);
        $order = array('STT'=>'ASC','idIT'=>'DESC');
        
        if($this->lan=='vi'){
            $data['Ten'] =  $this->get->kmt_get_col_where('kmt_menu_1','Ten_vi',array('idMN_1'=>$idMN_1));
            $url_mn_1 = mb_strtolower(url_title(removesign($data['Ten']))).'-'.$idMN_1;
            $config['base_url'] = site_url('mn-1/'.$url_mn_1);
        }else{
            $data['Ten'] =  $this->get->kmt_get_col_where('kmt_menu_1','Ten_en',array('idMN_1'=>$idMN_1));
            $url_mn_1 = mb_strtolower(url_title(removesign($data['Ten']))).'-'.$idMN_1;
            $config['base_url'] = site_url('mn-1/'.$url_mn_1); 
        }

        $config['total_rows'] = $this->get->kmt_get_count('kmt_item',$con);
        $config['per_page'] = 12;  
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
        $data['item'] = $this->get->kmt_get_where('kmt_item',$con,$order,array($config['per_page'], $this->uri->segment($config['uri_segment']))); 
        $data['link'] = $this->pagination->create_links();
        
        $this->kmt_seo->get_seo(7,$this->lan);
        $data['title'] = $data['Ten'].' - '.$this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = $config['base_url'];
        $data['page'] = $this->kmt_seo->page;
        
	    $data['main_content'] = 'client_page/item/item_in_menu_1';
        $this->load->view('front_end_template/content', $data);
	}
    
    function item_in_menu_2($idMN_2)
	{
        
        $con = array('TrangThai'=>1,'idMN_2'=>$idMN_2);
        $order = array('STT'=>'ASC','idIT'=>'DESC');
        
        $idMN_1 = $this->get->kmt_get_col_where('kmt_menu_2','idMN_1',array('idMN_2'=>$idMN_2));
        $this->id_1 = $idMN_1;
        $this->news =  $this->kmt_load->get_articles(array('TrangThai'=>1,'idLBV'=>3,'TieuBieu'=>1,'idMN_1'=>$idMN_1),array(5,0));
        
        if($this->lan=='vi'){
            $data['Ten'] =  $this->get->kmt_get_col_where('kmt_menu_1','Ten_vi',array('idMN_1'=>$idMN_1));
            $data['Ten2'] =  $this->get->kmt_get_col_where('kmt_menu_2','Ten_vi',array('idMN_2'=>$idMN_2));
            $url_mn_2 = mb_strtolower(url_title(removesign($data['Ten2']))).'-'.$idMN_2;
            $config['base_url'] = site_url('mn-2/'.$url_mn_2);
        }else{
            $data['Ten'] =  $this->get->kmt_get_col_where('kmt_menu_1','Ten_en',array('idMN_1'=>$idMN_1));
            $data['Ten2'] =  $this->get->kmt_get_col_where('kmt_menu_2','Ten_en',array('idMN_2'=>$idMN_2));
            $url_mn_2 = mb_strtolower(url_title(removesign($data['Ten2']))).'-'.$idMN_2;
            $config['base_url'] = site_url('mn-2/'.$url_mn_2);
        }
        
        $config['total_rows'] = $this->get->kmt_get_count('kmt_item',$con);
        $config['per_page'] = 16;  
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
        $data['item'] = $this->get->kmt_get_where('kmt_item',$con,$order,array($config['per_page'], $this->uri->segment($config['uri_segment']))); 
        $data['link'] = $this->pagination->create_links();
        
        $this->kmt_seo->get_seo(3,$this->lan);
        $data['title'] = $data['Ten2'].' - '.$this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = $config['base_url'];
        $data['page'] = $this->kmt_seo->page;
        
	    $data['main_content'] = 'client_page/item/item_in_menu_2';
        $this->load->view('front_end_template/content', $data);
	}
    
    function item_in_menu_3($idMN_3)
	{

        $con = array('TrangThai'=>1,'idMN_3'=>$idMN_3);
        $order = array('STT'=>'ASC','idIT'=>'DESC');
        
        $idMN_1 = $this->get->kmt_get_col_where('kmt_menu_3','idMN_1',array('idMN_3'=>$idMN_3));
        $idMN_2 = $this->get->kmt_get_col_where('kmt_menu_3','idMN_2',array('idMN_3'=>$idMN_3));
        
        $this->id_1 = $idMN_1;
        $this->news =  $this->kmt_load->get_articles(array('TrangThai'=>1,'idLBV'=>3,'TieuBieu'=>1,'idMN_1'=>$idMN_1),array(5,0));
        
        if($this->lan=='vi'){
            $data['Ten'] =  $this->get->kmt_get_col_where('kmt_menu_1','Ten_vi',array('idMN_1'=>$idMN_1));
            $data['Ten2'] =  $this->get->kmt_get_col_where('kmt_menu_2','Ten_vi',array('idMN_2'=>$idMN_2));
            $data['Ten3'] =  $this->get->kmt_get_col_where('kmt_menu_3','Ten_vi',array('idMN_3'=>$idMN_3));
            
            $url_mn_2 = mb_strtolower(url_title(removesign($data['Ten2']))).'-'.$idMN_2;
            $config['base_url'] = site_url('mn-2/'.$url_mn_2);
            $url_mn_3 = mb_strtolower(url_title(removesign($data['Ten3']))).'-'.$idMN_3;
        
        }else{
            $data['Ten'] =  $this->get->kmt_get_col_where('kmt_menu_1','Ten_en',array('idMN_1'=>$idMN_1));
            $data['Ten2'] =  $this->get->kmt_get_col_where('kmt_menu_2','Ten_en',array('idMN_2'=>$idMN_2));
            $data['Ten3'] =  $this->get->kmt_get_col_where('kmt_menu_3','Ten_en',array('idMN_3'=>$idMN_3));
            
            $url_mn_2 = mb_strtolower(url_title(removesign($data['Ten2']))).'-'.$idMN_2;
            $config['base_url'] = site_url('mn-2/'.$url_mn_2);
            $url_mn_3 = mb_strtolower(url_title(removesign($data['Ten3']))).'-'.$idMN_3;
        
        }
        
        
        
        $config['base_url'] = site_url('mn-3/'.$url_mn_3);
        $config['total_rows'] = $this->get->kmt_get_count('kmt_item',$con);
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
        $data['item'] = $this->get->kmt_get_where('kmt_item',$con,$order,array($config['per_page'], $this->uri->segment($config['uri_segment']))); 
        $data['link'] = $this->pagination->create_links();
        
        $this->kmt_seo->get_seo(3,$this->lan);
        $data['title'] = $data['Ten3'].' - '.$this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = $config['base_url'];
        $data['page'] = $this->kmt_seo->page;
        
	    $data['main_content'] = 'client_page/item/item_in_menu_3';
        $this->load->view('front_end_template/content', $data);
	}
    
    function details_item($idIT)
	{  
	    $idMN_1 = $this->get->kmt_get_col_where('kmt_item','idMN_1',array('idIT'=>$idIT));
        $idMN_2 = $this->get->kmt_get_col_where('kmt_item','idMN_2',array('idIT'=>$idIT));
        $idMN_3 = $this->get->kmt_get_col_where('kmt_item','idMN_3',array('idIT'=>$idIT));
        
        if($this->lan=='vi'){
            $data['Ten'] =  $this->get->kmt_get_col_where('kmt_menu_1','Ten_vi',array('idMN_1'=>$idMN_1));
            $url_1 = mb_strtolower(url_title(removesign($data['Ten']))).'-'.$idMN_1;
            $data['Url_1'] = site_url('mn-1/'.$url_1);
            $data['Ten2'] =  $this->get->kmt_get_col_where('kmt_menu_2','Ten_vi',array('idMN_2'=>$idMN_2));
            $url_2 = mb_strtolower(url_title(removesign($data['Ten2']))).'-'.$idMN_1;
            $data['Url_2'] = site_url('mn-2/'.$url_2);
            $data['Ten3'] =  $this->get->kmt_get_col_where('kmt_menu_3','Ten_vi',array('idMN_3'=>$idMN_3));
            $url_3 = mb_strtolower(url_title(removesign($data['Ten3']))).'-'.$idMN_1;
            $data['Url_3'] = site_url('mn-3/'.$url_3);
        }else{
            $data['Ten'] =  $this->get->kmt_get_col_where('kmt_menu_1','Ten_en',array('idMN_1'=>$idMN_1));
            $url_1 = mb_strtolower(url_title(removesign($data['Ten']))).'-'.$idMN_1;
            $data['Url_1'] = site_url('mn-1/'.$url_1);
            $data['Ten2'] =  $this->get->kmt_get_col_where('kmt_menu_2','Ten_en',array('idMN_2'=>$idMN_2));
            $url_2 = mb_strtolower(url_title(removesign($data['Ten2']))).'-'.$idMN_1;
            $data['Url_2'] = site_url('mn-2/'.$url_2);
            $data['Ten3'] =  $this->get->kmt_get_col_where('kmt_menu_3','Ten_en',array('idMN_3'=>$idMN_3));
            $url_3 = mb_strtolower(url_title(removesign($data['Ten']))).'-'.$idMN_1;
            $data['Url_3'] = site_url('mn-3/'.$url_3);
        }
        
        
        $con = array('idIT'=>$idIT);
        $data['item'] = $this->get->kmt_get_where('kmt_item',$con);
        
        $con_same = array('TrangThai'=>1,'idIT !='=>$idIT,'idMN_1'=>$idMN_1);
        $order_same = array('STT'=>'ASC','idIT'=>'DESC');
        $data['same_item'] = $this->get->kmt_get_where('kmt_item',$con_same,$order_same,array(8,0));
        
        $Ten_it = '';
        $Seo_title = '';
        $Seo_description = '';
        $Seo_keyword = '';
        $Url = base_url();
        $MaHinh = '';
        
        foreach($data['item'] as $value){
            $MaHinh = $value->MaHinh;
            if($this->lan=='vi'){
                $Ten_it = $value->Ten_vi;
                $Seo_title = $value->Seo_title_vi;
                $Seo_description = $value->Seo_description_vi;
                $Seo_keyword = $value->Seo_keyword_vi;
                $Url = base_url().'du-an/'.mb_strtolower(url_title(removesign($Ten_it))).'-'.$idIT;
            }else{
                $Ten_it = $value->Ten_en;
                $Seo_title = $value->Seo_title_en;
                $Seo_description = $value->Seo_description_en;
                $Seo_keyword = $value->Seo_keyword_en;
                $Url = base_url().'project/'.mb_strtolower(url_title(removesign($Ten_it))).'-'.$idIT;
            }
            $UrlHinh = $this->get->kmt_get_col_where('kmt_hinhanh','UrlHinh',array('MaHinh'=>$MaHinh));
        }
        
        
        $this->kmt_seo->get_seo(7,$this->lan);
        $data['title'] = $Seo_title;
        $data['description'] =  $Seo_description;
        $data['keywords'] = $Seo_keyword;
        $data['image_page'] =  $UrlHinh;
        $data['url_page'] = $Url;
        $data['page'] = $this->kmt_seo->page;
        
        $data['main_content'] = 'client_page/item/details_item';
        $this->load->view('front_end_template/content', $data);
	}
    
    function item_search(){
        $this->kmt_seo->get_seo(3,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = base_url();
        $data['page'] = $this->kmt_seo->page;
        
        $keyword_temp = $this->input->post('key_word');
        if($keyword_temp==null){
            if($this->session->userdata('key_word')!== FALSE){
                $keyword = $this->session->userdata('key_word');
            }else{
                redirect_back(); 
            }
        }else{
            $keyword = $keyword_temp;
            $this->session->unset_userdata(array('key_word'=>''));
            $this->session->set_userdata(array('key_word'=>$keyword_temp));
        }

        $list_col = array('kmt_item.DonGia' => $keyword, 
                           'kmt_item.DonGiaKM' => $keyword,
                           'kmt_item.Ten_vi' => $keyword,
                           'kmt_item.Ten_en' => $keyword,
                           'kmt_item.MaSo' => $keyword,
                           'kmt_item.DonVi' => $keyword,
                           'kmt_item.MoTa_vi' => $keyword,
                           'kmt_item.MoTa_en' => $keyword,
                           'kmt_item.TomTat_vi' => $keyword,
                           'kmt_item.TomTat_en' => $keyword
                           ); 
        
        $config['base_url'] = site_url('search');
        $config['total_rows'] = $this->get->kmt_get_count_search('kmt_item',$list_col);
        $config['per_page'] = 20;
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

        $data['item'] = $this->get->kmt_get_search('kmt_item',$list_col,$config['per_page'], $this->uri->segment($config['uri_segment'])); 
        $data['link'] = $this->pagination->create_links();
        
        $data['main_content'] = 'client_page/item/item_search';
        $this->load->view('front_end_template/content', $data);
    }
    
    function software($idMN_1){
        $con_it = array('idMN_1'=>$idMN_1,'TrangThai'=>1);
        $order_it = array('idIT'=>'DESC');
        $idIT = $this->get->kmt_get_col_where('kmt_item','idIT',$con_it,$order_it,array(1,0));
        $this->version($idIT);
        
        /*
        $this->kmt_seo->get_seo(4,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = base_url();
        $data['page'] = $this->kmt_seo->page;
        
        $con_ht = array('TrangThai'=>1,'idLBV'=>3);
        $order_ht = array('STT'=>'ASC','idBV'=>'DESC');
        $data['articles'] = $this->get->kmt_get_where('kmt_baiviet',$con_ht,$order_ht,array(1,0));
        
        $con_item = array('TrangThai'=>1,'idMN_1'=>$idMN_1);
        $order_item = array('STT'=>'ASC','idIT'=>'DESC');
        $data['list_item'] = $this->get->kmt_get_where('kmt_item',$con_item,$order_item);
        
        
        $data['main_content'] = 'client_page/item/software';
        $this->load->view('front_end_template/content', $data);
        */
    }
    
    function catalog($idMN_1){
        
        $this->kmt_seo->get_seo(3,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = base_url();
        $data['page'] = $this->kmt_seo->page;
        
        $con_ht = array('TrangThai'=>1,'idLBV'=>3);
        $order_ht = array('STT'=>'ASC','idBV'=>'DESC');
        $data['articles'] = $this->get->kmt_get_where('kmt_baiviet',$con_ht,$order_ht,array(1,0));
        
        $con_item = array('TrangThai'=>1,'idMN_1'=>$idMN_1);
        $order_item = array('STT'=>'ASC','idIT'=>'DESC');
        $data['list_item'] = $this->get->kmt_get_where('kmt_item',$con_item,$order_item);
        
        
        $data['main_content'] = 'client_page/item/software';
        $this->load->view('front_end_template/content', $data);
        
    }
    
    function version($idIT){
        $idMN_1 = $this->get->kmt_get_col_where('kmt_item','idMN_1',array('idIT'=>$idIT));
        $idMN_2 = $this->get->kmt_get_col_where('kmt_item','idMN_2',array('idIT'=>$idIT));
        $idMN_3 = $this->get->kmt_get_col_where('kmt_item','idMN_3',array('idIT'=>$idIT));
        
        if($this->lan=='vi'){
            $data['Ten'] =  $this->get->kmt_get_col_where('kmt_menu_1','Ten_vi',array('idMN_1'=>$idMN_1));
            $url_1 = mb_strtolower(url_title(removesign($data['Ten']))).'-'.$idMN_1;
            $data['Url_1'] = site_url('danh-muc-san-pham/'.$url_1);
        }else{
            $data['Ten'] =  $this->get->kmt_get_col_where('kmt_menu_1','Ten_en',array('idMN_1'=>$idMN_1));
            $url_1 = mb_strtolower(url_title(removesign($data['Ten']))).'-'.$idMN_1;
            $data['Url_1'] = site_url('product-catalog/'.$url_1);
         }
        
        
        $con = array('idIT'=>$idIT);
        $data['item'] = $this->get->kmt_get_where('kmt_item',$con);
        
        $con_same = array('TrangThai'=>1,'idIT !='=>$idIT,'idMN_1'=>$idMN_1);
        $order_same = array('STT'=>'ASC','idIT'=>'DESC');
        $data['same_item'] = $this->get->kmt_get_where('kmt_item',$con_same,$order_same,array(8,0));
        
        $Ten_it = '';
        $Seo_title = '';
        $Seo_description = '';
        $Seo_keyword = '';
        $Url = base_url();
        $MaHinh = '';
        
        foreach($data['item'] as $value){
            $MaHinh = $value->MaHinh;
            if($this->lan=='vi'){
                $Ten_it = $value->Ten_vi;
                $Seo_title = $value->Seo_title_vi;
                $Seo_description = $value->Seo_description_vi;
                $Seo_keyword = $value->Seo_keyword_vi;
                $Url = base_url().'du-an/'.mb_strtolower(url_title(removesign($Ten_it))).'-'.$idIT;
            }else{
                $Ten_it = $value->Ten_en;
                $Seo_title = $value->Seo_title_en;
                $Seo_description = $value->Seo_description_en;
                $Seo_keyword = $value->Seo_keyword_en;
                $Url = base_url().'project/'.mb_strtolower(url_title(removesign($Ten_it))).'-'.$idIT;
            }
            $UrlHinh = $this->get->kmt_get_col_where('kmt_hinhanh','UrlHinh',array('MaHinh'=>$MaHinh));
        }
        
        $this->kmt_seo->get_seo(3,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url('public/img/logo.png');
        $data['url_page'] = base_url();
        $data['page'] = $this->kmt_seo->page;
        
        $data['main_content'] = 'client_page/item/version';
        $this->load->view('front_end_template/content', $data);
    }
    
    
    function upload_file(){
        $code = 0;
        $name = $this->input->post('kmt_name_c');
        $kmt_code = $this->input->post('kmt_code');
        
        
        
        
            $this->load->library('upload');
            $this->upload->initialize(array(
                "upload_path"=>'./upload/temp',
                "allowed_types"=>'zip|rar',
                "overwrite"=>FALSE
            ));
            
             $upload_data = $this->upload->data(); 
             $file_name = $_FILES[$name]['name'];
             
             $temp_str = strrev($file_name);
             $temp_arr = explode('.',$temp_str);
             
             if(isset($temp_arr[0])){
                if( strrev($temp_arr[0]) != 'zip' &&  strrev($temp_arr[0])!='rar'){
                    if($this->lan=='vi'){
                        echo 'Vui lòng tải lên tệp dạng nén zip hoặc rar!|1';
                    }else{
                        echo 'Upload request zip or rar file!|1';
                    }
                }else{
                    
                    preg_match_all("/\[([^\]]*)\]/", $file_name, $matches);
                     if(isset($matches[1][0])){
                        $code = $matches[1][0];
                     }
                     
                     if(md5($code)==md5($kmt_code)){
                    
                         if($this->upload->do_upload($name)){
                            $upload_data = $this->upload->data(); 
                            $file_name_c =   $upload_data['file_name'];
                            $data = array('file_name' => $file_name_c,'Maso' => $code);
                            $this->session->set_userdata($data);
                            $this->load->model('set_model', 'set');
                            $data_temp = array(
                                'ip_address' => $_SERVER['REMOTE_ADDR'],
                                'Date' => date("Y-m-d G:i:s"),
                                'Filename' => $file_name_c
                            );
                            
                            $this->set->kmt_insert_data('kmt_file_temp', $data_temp); 
                            //copy('upload/temp/'.$file_name_c, 'upload/real/'.$file_name_c);
                            if($this->lan=='vi'){
                                echo 'Chọn loại bản quyền khác nếu muốn thay đổi và nhấn nút mua để tiếp tục|0';
                            }else{
                                echo 'Choose another license type if you want to change and click the order button to continue|0';
                            }
                         }else{
                            $this->session->unset_userdata('file_name');
                            $this->session->unset_userdata('Maso');
                            $error = $this->upload->display_errors();
                            echo $error.'|1';
                         }
                    }else{
                        $this->session->unset_userdata('file_name');
                        $this->session->unset_userdata('Maso');
                        if($this->lan=='vi'){
                            echo 'Vui lòng kiểm tra lại phiên bản của phần mềm!|2';
                        }else{
                            echo 'Please check the software version!|2';
                        }
                    }
                
                }
            
            }else{
                if($this->lan=='vi'){
                    echo 'Vui lòng tải lên tệp yêu cầu gia hạn!|1';
                }else{
                    echo 'Upload request license file!|1';
                }
            }

    }   
}
