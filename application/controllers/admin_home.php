<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_home extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('get_model', 'get');
        $this->load->library("kmt_authentication");
        $this->kmt_authentication->check_login_admin();
    }
    
    function index()
	{
	    $data['main_content'] = 'admin_page/kmt_articles/home';
        $this->load->view('back_end_template/content', $data);
	}
    
    
}
