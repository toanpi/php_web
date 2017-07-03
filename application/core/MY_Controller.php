<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class MY_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->check_login();
        $this->load->model('get_model', 'get');
        $this->load->model('set_model', 'set');
        $this->load->model('check_model','check');
    }
    
    function check_login(){
		$is_logged = $this->session->userdata('islogged');
		if(!isset($is_logged) || $is_logged != TRUE){
			redirect('quanlykmt_boss');
		}
    }

}
