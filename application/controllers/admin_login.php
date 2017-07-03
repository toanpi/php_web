<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_login extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('get_model', 'get');
        $this->load->model('set_model', 'set');
        $this->load->model('check_model','check');
    }
    
    function index()
	{
	    $this->load->view('admin_page/kmt_form/login');
	}
    
    function validate_login(){
        $result = $this->check->kmt_checkLogin($this->input->post('user'), $this->input->post('pass'),1);
        $con_login = array('TaiKhoan'=>$this->input->post('user'));
        $temp = $this->get->kmt_get_where('kmt_nguoidung',$con_login);
        foreach($temp as $value){
              $HoTen = $value->HoTen;
              $idU = $value->idU;
            
        }

        if($result == TRUE){
            $data = array('HoTen' => $HoTen,'idU' => $idU,'admin_login' => TRUE);
            $this->session->set_userdata($data);
            redirect('admin_home');
        }else{
            redirect(URL_ADMIN);
        }
    }
    
    function lost_pass($stt=null){  
        $this->load->view('admin_page/kmt_form/lost_pass');
	}
    
    function reset_pass(){
        $email = $this->input->post('email');
        $check_email = $this->check->kmt_checkInfo('kmt_nguoidung','Email',$email);
        
        if($check_email){
            
    		$pass=time();
            
            $content_email = 'Mật khẩu mới của bạn là: <'. $pass .'>. Vui lòng thay đổi ngay khi đăng nhập vào trang quản trị!';
        
            $this->load->helper('send_mail_helper');
            
            if(send_mail('noreply.this.system.email@gmail.com','vietw@ve340','noreply.this.system.email@gmail.com',$email,'Email phục hồi mật khẩu quản trị '.DOMAIN_NAME,$content_email)){
                $this->set->kmt_update_data('kmt_nguoidung', array('MatKhau'=>sha1($pass)), array('Email' => $email));
                redirect('quen-mat-khau-quan-tri/success');
            }else{
                redirect('quen-mat-khau-quan-tri/fail');
            }
        }else{
             redirect('quen-mat-khau-quan-tri/fail');
        }
    }
    
    function logout(){
        $data = array('HoTen' => '','idU' => '','admin_login' => '');
        $this->session->unset_userdata($data);
        $this->index();
    }
    
}
