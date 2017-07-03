<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
    
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
    
    function check_login_client(){
		$is_logged = $this->session->userdata('client_login');
		if(!isset($is_logged) || $is_logged != TRUE){
			redirect('home');
		}
    }
    
    function index()
	{
	    $this->kmt_seo->get_seo(3,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = base_url();
        $data['page'] = $this->kmt_seo->page;
        
        $con = array('TrangThai'=>1,'TieuBieu'=>1);
        $orther = array('STT'=>'ASC','idIT'=>'DESC');
        $data['product_note'] = $this->get->kmt_get_where('kmt_item',$con,$orther,array(3,0));
        
        $con = array('TrangThai'=>1);
        $orther = array('STT'=>'ASC','idIT'=>'DESC');
        $data['product_new'] = $this->get->kmt_get_where('kmt_item',$con,$orther,array(6,0));
        
	    $data['main_content'] = 'client_page/home';
        $this->load->view('front_end_template/content', $data);
	}
    
    
    function register(){
        $this->kmt_seo->get_seo(10,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = base_url();
        $data['page'] = $this->kmt_seo->page;
        
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
        
        $data['main_content'] = 'client_page/users/register';
        $this->load->view('front_end_template/content', $data);
    }
    
    function save_register(){
        $this->load->model('set_model', 'set');
        $Code = 'MKH_'.time();
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');
        $now = date("Y-m-d G:i:s");
        
        $data = array(
                'idN '=>2,
                'MaKH'=>$Code,
                'MatKhau'=>sha1($pass),
                'HoTen'=>$name,
                'Email'=>$email,
                'SDT'=>$phone,
                'DiaChi'=>$address,
                'NgayTao'=>$now,
                'NgayCapNhat'=>$now
                );
             
            
        $rs = $this->set->kmt_insert_data('kmt_nguoidung', $data);

        if($rs){
           redirect('login/2');
        }else{
           redirect('register'); 
        }
    }
    
    function login($stt=null){
        $data['stt'] = $stt;
        $this->kmt_seo->get_seo(9,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = base_url();
        $data['page'] = $this->kmt_seo->page;
        
        $data['main_content'] = 'client_page/users/login';
        $this->load->view('front_end_template/content', $data);
    }
    
    function check_login(){
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');
        
        $con_login = array('Email'=>$email,'MatKhau'=>sha1($pass),'idN'=>2,'TrangThai'=>1);
        $result = $this->get->kmt_get_where('kmt_nguoidung',$con_login);
        
        if(count($result)==1){
            
            foreach($result as $value){
              $HoTen = $value->HoTen;
              $idU = $value->idU;
            }
            
            $data = array('HoTen_c' => $HoTen,'idU_c' => $idU,'client_login' => TRUE);
            $this->session->set_userdata($data);
            redirect('home');
        }else{
            redirect('login/1');
        }
    }
    
    function logout(){
        $data = array('HoTen_c' => '','idU_c' => '','client_login' => '');
        $this->session->unset_userdata($data);
        redirect('home');
    }
    
    function forget_pass($stt=null){
        $data['stt'] = $stt;
        $this->kmt_seo->get_seo(9,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = base_url();
        $data['page'] = $this->kmt_seo->page;
        
        $data['main_content'] = 'client_page/users/forget_pass';
        $this->load->view('front_end_template/content', $data);
    }
    
    function get_pass(){
        $email = trim($email = $this->input->post('email'));
        $con = array('Email'=>$email,'idN'=>2);
        $result = $this->get->kmt_get_where('kmt_nguoidung',$con);
        
        if(count($result)==1){
            $this->load->model('set_model', 'set');
            $MaKH = '';
            foreach($result as $value){
                $MaKH = $value->MaKH;
            }
            $this->set->kmt_update_data('kmt_nguoidung', array('Auto_code'=>''), array('Email' => $email));
            
            $auto_code = 'mpca_'.time();
            $this->set->kmt_update_data('kmt_nguoidung', array('Auto_code'=>$auto_code), array('Email' => $email));
              
            $link_rp = "<a href='".base_url()."reset-pass/".$auto_code."'>Recover password</a>";
            $content_email = 'Bạn có một yêu cầu phục hồi mật khẩu từ '.DOMAIN_NAME.', nếu đúng là bạn vui lòng nhấn vào link bên dưới để phục hồi mật khẩu, nếu không phải là bạn, hãy bỏ qua email này. Xin cảm ơn<br/><br/>'.$link_rp;
        
            $this->load->helper('send_mail_helper');
            $Email_ca = $this->get->kmt_get_col_where('kmt_system','Email_ca');
            $Pass_ca = $this->get->kmt_get_col_where('kmt_system','Pass_ca');
            send_mail($Email_ca,$Pass_ca,$Email_ca,$email,'Email phục hồi mật khẩu',$content_email,'Forget password');
            redirect('forgot-password/0');
        }else{
            redirect('forgot-password/1');
        }
    }
    
    function reset_pass($Auto_code,$stt=null){
        
        $data['stt'] = $stt;
        
        $data['MaKH'] = $this->get->kmt_get_col_where('kmt_nguoidung','MaKH',array('Auto_code'=>$Auto_code));;
        if($data['MaKH']==null){
            redirect('home');
        }
        $this->kmt_seo->get_seo(11,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = base_url();
        $data['page'] = $this->kmt_seo->page;
        
        $con = array('MaKH'=>trim($data['MaKH']));
        $data['idU'] = $this->get->kmt_get_col_where('kmt_nguoidung','idU',$con);
        
        $data['main_content'] = 'client_page/users/reset_pass';
        $this->load->view('front_end_template/content', $data);
    }
    
    function update_pass(){
        $idU = $this->input->post('idU');
        $MaKH = $this->input->post('MaKH');
        $pass = $this->input->post('pass');
        $repass = $this->input->post('repass');
        
        if($pass==null || $repass==null){
            redirect('reset-pass/'.$MaKH.'/0');
        }else{
            if(strlen($pass)<6 || strlen($pass)>12){
                redirect('reset-pass/'.$MaKH.'/1');
            }elseif($pass!==$repass){
                redirect('reset-pass/'.$MaKH.'/2');
            }else{
                $now = date("Y-m-d G:i:s");
                $data = array('MatKhau'=>sha1($pass),'NgayCapNhat'=>$now,'Auto_code'=>'');
                $this->load->model('set_model', 'set');
                $this->set->kmt_update_data('kmt_nguoidung', $data, array('idU' => $idU));
                redirect('reset-pass/'.$MaKH.'/3');
            }
        }
    }
    
    public function check_email_aj(){
        $this->load->model('check_model','check');
        $email = $this->input->post('email_r');
        
        $check_email = $this->check->kmt_checkInfo('kmt_nguoidung','Email',$email);
        if($check_email){
            echo '1';
        }else{
            echo '0';
        }
        
    }
    
    function my_account($idU){
        $this->check_login_client();
        $this->kmt_seo->get_seo(11,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = base_url();
        $data['page'] = $this->kmt_seo->page;
        
        $con_u = array('idU'=>$idU,'TrangThai'=>1);
        $data['info_user'] = $this->get->kmt_get_where('kmt_nguoidung',$con_u);
        
        $data['main_content'] = 'client_page/users/my_account';
        $this->load->view('front_end_template/content', $data);
    }
    
    function edit_info($idU,$stt=null){
        $this->check_login_client();
        $this->kmt_seo->get_seo(11,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = base_url();
        $data['page'] = $this->kmt_seo->page;
        $data['stt'] = $stt;
        $con = array('idU'=>$idU,'TrangThai'=>1);
        $data['info_user'] = $this->get->kmt_get_where('kmt_nguoidung',$con);
        $data['main_content'] = 'client_page/users/edit_info';
        $this->load->view('front_end_template/content', $data);
    }
    
    function update_register(){
        $this->check_login_client();
        $this->load->model('set_model','set');
        
        $idU = $this->input->post('idU');
        $pass = $this->input->post('pass');
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');
        $now = date("Y-m-d G:i:s");
        
        if($pass!=null){
            $data = array(
                'MatKhau'=>sha1($pass),
                'HoTen'=>$name,
                'SDT'=>$phone,
                'DiaChi'=>$address,
                'NgayCapNhat'=>$now
                );    
        }else{
            $data = array(
                'HoTen'=>$name,
                'SDT'=>$phone,
                'DiaChi'=>$address,
                'NgayCapNhat'=>$now
            );    
        }
        
        
        $rs = $this->set->kmt_update_data('kmt_nguoidung', $data, array('idU' => $idU));
        redirect('my-account/'.$idU);
    }
    
    public function check_pass_aj(){
        $this->load->model('check_model','check');
        $pass = $this->input->post('pass_u');
        $idU = $this->input->post('idU_u');
        
        $con = array('idU'=>$idU,'MatKhau'=>sha1($pass));
        $result = $this->get->kmt_get_where('kmt_nguoidung',$con);
        if(count($result)==1){
            echo '1';
        }else{
            echo '0';
        }
        
    }
}