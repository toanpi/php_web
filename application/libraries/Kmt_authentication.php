<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Kmt_authentication {

    public function check_login_admin()
    {
        $CI =& get_instance();
        $admin_login = $CI->session->userdata('admin_login');
		if(!isset($admin_login) || $admin_login != TRUE){
			redirect(URL_ADMIN);
		}
    }
}