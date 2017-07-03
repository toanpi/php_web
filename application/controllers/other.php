<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Other extends CI_Controller {
    
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
    
    
    function index($st = null)
	{
        $data['st'] = $st;
	    $this->kmt_seo->get_seo(7,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = base_url().'lien-he';
        $data['page'] = $this->kmt_seo->page;
        
        $data['address'] = $this->get->kmt_get_where('kmt_diachi',array('idVT'=>1));
        $possible = '23456789bcdfghjkmnpqrstvwxyz';
        $code = '';
        $i = 0;
        while ($i < 6) { 
        $code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
        $i++;
        }
        $randomkey=$code;
        $cap =  mb_convert_case($randomkey, MB_CASE_UPPER, "UTF-8");
        $data['cap'] = $cap;
        

	    $data['main_content'] = 'client_page/other/contact';
        $this->load->view('front_end_template/content', $data);
	}
    
    function send_mess(){
        $this->load->model('set_model', 'set');
        $tieude = $this->input->post('tieude');
        $tencty = $this->input->post('tencty');
        $cap = $this->input->post('cap');
        $code = $this->input->post('code');
        $hoten = $this->input->post('hoten');
        $diachi = $this->input->post('diachi');
        $sdt = $this->input->post('sdt');
        $email = $this->input->post('email');
        $noidung = $this->input->post('noidung');
        $now = date("Y-m-d h:i:s");
        

            $data = array(
                'HoTen'=>$hoten,
                'SDT'=>$sdt,
                'DiaChi'=>$diachi,
                'TieuDe'=>$tieude,
                'TenCTY'=>$tencty,
                'Email'=>$email,
                'NoiDung'=>$noidung,
                'NgayTao'=>$now
            ); 
            
            $noidung_email = '<p> Họ tên :'.$hoten.'</p>'; 
            $noidung_email .= '<p>Tên công ty :'.$tencty.'</p>'; 
            $noidung_email .= '<p> Điện thoại :'.$sdt.'</p>'; 
            $noidung_email .= '<p> Email :'.$email.'</p>'; 
            $noidung_email .= '<p> Nội dung :'.$noidung.'</p>'; 
           
                $this->load->helper('send_mail_helper');
                $this->set->kmt_insert_data('kmt_lienhe',$data);
                $Email_ca = $this->get->kmt_get_col_where('kmt_system','Email_ca');
                $Email_mess = $this->get->kmt_get_col_where('kmt_system','Email_mess');
                $Pass_ca = $this->get->kmt_get_col_where('kmt_system','Pass_ca');
                $rs = send_mail($Email_ca,$Pass_ca,$email,$Email_mess,$tieude,$noidung_email,$hoten);
                redirect('lien-he/0');
           

    }

    
    function partners()
	{
        $con = array('TrangThai'=>1,'idLH'=>2);
        $order = array('STT'=>'ASC','idH'=>'DESC');

        if($this->lan=='vi'){
            $config['base_url'] = site_url('khach-hang');
        }else{
            $config['base_url'] = site_url('partners');   
        }
        
        $config['total_rows'] = $this->get->kmt_get_count('kmt_hinhanh',$con);
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
        $data['partners'] = $this->get->kmt_get_where('kmt_hinhanh',$con,$order,array($config['per_page'], $this->uri->segment($config['uri_segment']))); 
        $data['link'] = $this->pagination->create_links();
        
        $this->kmt_seo->get_seo(12,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = $config['base_url'];
        $data['page'] = $this->kmt_seo->page;

	    $data['main_content'] = 'client_page/other/partners';
        $this->load->view('front_end_template/content', $data);
	}
    
    
    function trainer(){
        $this->slide = $this->kmt_load->get_banner(array('idLH'=>1,'TrangThai'=>1,'idP'=>5));
        
        $con_experts  = array('TrangThai'=>1,'idLH'=>2);
        $order_experts  = array('STT'=>'ASC','idH'=>'DESC');
        $data['list_experts'] = $this->get->kmt_get_where('kmt_hinhanh',$con_experts,$order_experts); 
        
        $con_trainer  = array('TrangThai'=>1,'idLH'=>3);
        $data['list_trainer'] = $this->get->kmt_get_where('kmt_hinhanh',$con_trainer,$order_experts); 
        
        $this->kmt_seo->get_seo(5,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url('public/img/logo.png');
        $data['url_page'] = base_url('huan-luyen-vien');
        $data['page'] = $this->kmt_seo->page;
        
	    $data['main_content'] = 'client_page/other/trainer';
        $this->load->view('front_end_template/content', $data);
    }
    
    function download(){
        $this->kmt_seo->get_seo(5,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = base_url();
        $data['page'] = $this->kmt_seo->page;
        
        $con_download  = array('TrangThai'=>1);
        $order_download  = array('STT'=>'ASC','idF'=>'DESC');
        $data['list_download'] = $this->get->kmt_get_where('kmt_file',$con_download,$order_download); 
        
        $data['main_content'] = 'client_page/other/download';
        $this->load->view('front_end_template/content', $data);
    }
    
}
