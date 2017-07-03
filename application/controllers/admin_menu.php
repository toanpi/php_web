<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_menu extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('get_model', 'get');
        $this->load->model('set_model', 'set');
        $this->load->library("kmt_authentication");
        $this->kmt_authentication->check_login_admin();
    }
    
    function index(){
	    redirect('admin_home');
	}
    
    
    /* Begin method menu_1 */
    
    function menu_1(){
        $order = array('STT' => 'ASC', 'idMN_1' => 'DESC');
        
        $config['base_url'] = site_url('admin_menu/menu_1');
        $config['total_rows'] = $this->get->kmt_get_count('kmt_menu_1', null);
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['menu'] = $this->get->kmt_get_where('kmt_menu_1', null, $order,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();

        $data['count_row'] = count($data['menu']);
        $data['main_content'] = 'admin_page/kmt_menu/menu_1';
        $this->load->view('back_end_template/content', $data);
    }
    
    function add_menu_1($stt=null){
        $data['stt'] = $stt;
        $data['main_content'] = 'admin_page/kmt_menu/add_menu_1';
        $this->load->view('back_end_template/content', $data);
    }
    
    function save_menu_1(){
        $MaHinh = 'DM1_'.time();
        $Ten_vi = $this->input->post('Ten_vi');
        $Ten_en = $this->input->post('Ten_en');
        $TomTat_vi = $this->input->post('TomTat_vi');
        $TomTat_en = $this->input->post('TomTat_en');
        $MoTa_vi = $this->input->post('MoTa_vi');
        $MoTa_en = $this->input->post('MoTa_en');
        $base = base_url();
        $UrlHinh_temp = $this->input->post('UrlHinh');
        $UrlHinh = str_replace($base,'',$UrlHinh_temp);
        $now = date("Y-m-d G:i:s");
        
        if($Ten_vi==null){
            $this->add_menu_1('name_empty');
        }else{
            if($Ten_en==null){
                $Ten_en = $Ten_vi;
            }
            $data = array(
                'MaHinh' => $MaHinh,
                'Ten_vi' => $Ten_vi,
                'Ten_en' => $Ten_en,
                'TomTat_vi' => $TomTat_vi,
                'TomTat_en' => $TomTat_en,
                'MoTa_vi' => $MoTa_vi,
                'MoTa_en' => $MoTa_en,
                'NgayTao' => $now,
                'NgayCapNhat' => $now
            );
            
            $rs = $this->set->kmt_insert_data('kmt_menu_1', $data);
            
            if ($rs) { 
                
                if ($UrlHinh == null) {
                    $UrlHinh = 'public/img/no-img.png';
                }
                    
                $data_img = array(
                    'idLH' => 10,
                    'MaHinh'=>$MaHinh,
                    'UrlHinh' => $UrlHinh,
                    'NgayTao' => $now,
                    'NgayCapNhat' => $now
                );
                $this->set->kmt_insert_data('kmt_hinhanh', $data_img);
                redirect('admin_menu/menu_1/success');
            } else {
                redirect('admin_menu/menu_1/fail');
            }
        }
    }
    
    function edit_menu_1($idMN_1,$stt=null){
        $data['stt'] = $stt;
         $data['menu'] = $this->get->kmt_get_where('kmt_menu_1', array("idMN_1" =>$idMN_1));
        
        $data['main_content'] = 'admin_page/kmt_menu/edit_menu_1';
        $this->load->view('back_end_template/content', $data);
    }
    
    function update_menu_1(){
        $idMN_1 = $this->input->post('idMN_1');
        $MaHinh = $this->input->post('MaHinh');
        $Ten_vi = $this->input->post('Ten_vi');
        $Ten_en = $this->input->post('Ten_en');
        $TomTat_vi = $this->input->post('TomTat_vi');
        $TomTat_en = $this->input->post('TomTat_en');
        $MoTa_vi = $this->input->post('MoTa_vi');
        $MoTa_en = $this->input->post('MoTa_en');
        $base = base_url();
        $UrlHinh_temp = $this->input->post('UrlHinh');
        $UrlHinh = str_replace($base,'',$UrlHinh_temp);
        $now = date("Y-m-d G:i:s");
        
        if($Ten_vi==null){
            $this->edit_menu_1($idMN_1,'name_empty');
        }else{
            if($Ten_en==null){
                $Ten_en = $Ten_vi;
            }
            $data = array(
                'Ten_vi' => $Ten_vi,
                'Ten_en' => $Ten_en,
                'TomTat_vi' => $TomTat_vi,
                'TomTat_en' => $TomTat_en,
                'MoTa_vi' => $MoTa_vi,
                'MoTa_en' => $MoTa_en,
                'NgayTao' => $now,
                'NgayCapNhat' => $now
            );
            
            $rs = $this->set->kmt_update_data('kmt_menu_1', $data, array('idMN_1' => $idMN_1));
            if ($rs) { 
                
                if ($UrlHinh == null) {
                    $UrlHinh = 'public/img/no-img.png';
                }
                    
                $data_img = array(
                    'UrlHinh' => $UrlHinh,
                    'NgayCapNhat' => $now
                );
                
                $this->set->kmt_update_data('kmt_hinhanh', $data_img,array('MaHinh'=>$MaHinh));
                redirect('admin_menu/menu_1/success');
            } else {
                redirect('admin_menu/menu_1/fail');
            }
        }
    }
    
    /* End method menu_1 */
    
    /* Begin method menu_2 */
    
    function menu_2(){
        $order = array('idMN_1'=>'ASC','STT' => 'ASC', 'idMN_2' => 'DESC');
        
        $config['base_url'] = site_url('admin_menu/menu_2');
        $config['total_rows'] = $this->get->kmt_get_count('kmt_menu_2', null);
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['menu'] = $this->get->kmt_get_where('kmt_menu_2', null, $order,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();
        
        $order_mn_1 = array('STT'=>'ASC','idMN_1'=>'DESC');
        $data['menu_1'] = $this->get->kmt_get_where('kmt_menu_1',null,$order_mn_1);
        
        $data['count_row'] = count($data['menu']);
        $data['main_content'] = 'admin_page/kmt_menu/menu_2';
        $this->load->view('back_end_template/content', $data);
    }
    
    function add_menu_2($stt=null){
        $data['stt'] = $stt;
        $order_mn_1 = array('STT'=>'ASC','idMN_1'=>'DESC');
        $data['menu_1'] = $this->get->kmt_get_where('kmt_menu_1',null,$order_mn_1);
        
        $data['main_content'] = 'admin_page/kmt_menu/add_menu_2';
        $this->load->view('back_end_template/content', $data);
    }
    
    function save_menu_2(){
        $MaHinh = 'DM2_'.time();
        $idMN_1 = $this->input->post('idMN_1');
        $Ten_vi = $this->input->post('Ten_vi');
        $Ten_en = $this->input->post('Ten_en');
        $TomTat_vi = $this->input->post('TomTat_vi');
        $TomTat_en = $this->input->post('TomTat_en');
        $MoTa_vi = $this->input->post('MoTa_vi');
        $MoTa_en = $this->input->post('MoTa_en');
        $base = base_url();
        $UrlHinh_temp = $this->input->post('UrlHinh');
        $UrlHinh = str_replace($base,'',$UrlHinh_temp);
        $now = date("Y-m-d G:i:s");
        
        if($Ten_vi==null){
            $this->add_menu_2('name_empty');
        }else{
            if($Ten_en==null){
                $Ten_en = $Ten_vi;
            }
            $data = array(
                'idMN_1' => $idMN_1,
                'MaHinh' => $MaHinh,
                'Ten_vi' => $Ten_vi,
                'Ten_en' => $Ten_en,
                'TomTat_vi' => $TomTat_vi,
                'TomTat_en' => $TomTat_en,
                'MoTa_vi' => $MoTa_vi,
                'MoTa_en' => $MoTa_en,
                'NgayTao' => $now,
                'NgayCapNhat' => $now
            );
            
            $rs = $this->set->kmt_insert_data('kmt_menu_2', $data);
            
            if ($rs) { 
                
                if ($UrlHinh == null) {
                    $UrlHinh = 'public/img/no-img.png';
                }
                    
                $data_img = array(
                    'idLH' => 10,
                    'MaHinh'=>$MaHinh,
                    'UrlHinh' => $UrlHinh,
                    'NgayTao' => $now,
                    'NgayCapNhat' => $now
                );
                $this->set->kmt_insert_data('kmt_hinhanh', $data_img);
                redirect('admin_menu/menu_2/success');
            } else {
                redirect('admin_menu/menu_2/fail');
            }
        }
    }
    
    function edit_menu_2($idMN_2,$stt=null){
        $data['stt'] = $stt;
        $data['menu'] = $this->get->kmt_get_where('kmt_menu_2', array("idMN_2" =>$idMN_2));
        
        $order_mn_1 = array('STT'=>'ASC','idMN_1'=>'DESC');
        $data['menu_1'] = $this->get->kmt_get_where('kmt_menu_1',null,$order_mn_1);
        $data['main_content'] = 'admin_page/kmt_menu/edit_menu_2';
        $this->load->view('back_end_template/content', $data);
    }
    
    function update_menu_2(){
        $idMN_2 = $this->input->post('idMN_2');
        $idMN_1 = $this->input->post('idMN_1');
        $MaHinh = $this->input->post('MaHinh');
        $Ten_vi = $this->input->post('Ten_vi');
        $Ten_en = $this->input->post('Ten_en');
        $TomTat_vi = $this->input->post('TomTat_vi');
        $TomTat_en = $this->input->post('TomTat_en');
        $MoTa_vi = $this->input->post('MoTa_vi');
        $MoTa_en = $this->input->post('MoTa_en');
        $base = base_url();
        $UrlHinh_temp = $this->input->post('UrlHinh');
        $UrlHinh = str_replace($base,'',$UrlHinh_temp);
        $now = date("Y-m-d G:i:s");
        
        if($Ten_vi==null){
            $this->edit_menu_2($idMN_2,'name_empty');
        }else{
            if($Ten_en==null){
                $Ten_en = $Ten_vi;
            }
            $data = array(
                'idMN_1' => $idMN_1,
                'Ten_vi' => $Ten_vi,
                'Ten_en' => $Ten_en,
                'TomTat_vi' => $TomTat_vi,
                'TomTat_en' => $TomTat_en,
                'MoTa_vi' => $MoTa_vi,
                'MoTa_en' => $MoTa_en,
                'NgayTao' => $now,
                'NgayCapNhat' => $now
            );
            
            $rs = $this->set->kmt_update_data('kmt_menu_2', $data, array('idMN_2' => $idMN_2));
            if ($rs) { 
                
                $data_mn = array('idMN_1'=>$idMN_1);
                $this->set->kmt_update_data('kmt_menu_3', $data_mn, array('idMN_2' => $idMN_2));
                $this->set->kmt_update_data('kmt_item', $data_mn, array('idMN_2' => $idMN_2));
                
                if ($UrlHinh == null) {
                    $UrlHinh = 'public/img/no-img.png';
                }
                    
                $data_img = array(
                    'UrlHinh' => $UrlHinh,
                    'NgayCapNhat' => $now
                );
                
                $this->set->kmt_update_data('kmt_hinhanh', $data_img,array('MaHinh'=>$MaHinh));
                redirect('admin_menu/menu_2/success');
            } else {
                redirect('admin_menu/menu_2/fail');
            }
        }
    }
    
    /* End method menu_2 */
    
    /* Begin method menu_2 */
    
    function menu_3(){
        $order = array('idMN_1'=>'ASC','idMN_2'=>'ASC','STT' => 'ASC', 'idMN_3' => 'DESC');
        
        $config['base_url'] = site_url('admin_menu/menu_3');
        $config['total_rows'] = $this->get->kmt_get_count('kmt_menu_3', null);
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['menu'] = $this->get->kmt_get_where('kmt_menu_3', null, $order,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();
        
        $order_mn_1 = array('STT'=>'ASC','idMN_1'=>'DESC');
        $data['menu_1'] = $this->get->kmt_get_where('kmt_menu_1',null,$order_mn_1);
        
        $data['count_row'] = count($data['menu']);
        $data['main_content'] = 'admin_page/kmt_menu/menu_3';
        $this->load->view('back_end_template/content', $data);
    }
    
    function add_menu_3($stt=null){
        $data['stt'] = $stt;
        $order_mn_1 = array('STT'=>'ASC','idMN_1'=>'DESC');
        $data['menu_1'] = $this->get->kmt_get_where('kmt_menu_1',null,$order_mn_1);
        
        $data['main_content'] = 'admin_page/kmt_menu/add_menu_3';
        $this->load->view('back_end_template/content', $data);
    }
    
    function save_menu_3(){
        $MaHinh = 'DM3_'.time();
        $idMN_1 = $this->input->post('idMN_1');
        $idMN_2 = $this->input->post('idMN_2');
        $Ten_vi = $this->input->post('Ten_vi');
        $Ten_en = $this->input->post('Ten_en');
        $TomTat_vi = $this->input->post('TomTat_vi');
        $TomTat_en = $this->input->post('TomTat_en');
        $MoTa_vi = $this->input->post('MoTa_vi');
        $MoTa_en = $this->input->post('MoTa_en');
        $UrlHinh = $this->input->post('UrlHinh');
        $now = date("Y-m-d G:i:s");
        
        if($Ten_vi==null){
            $this->add_menu_3('name_empty');
        }else{
            if($Ten_en==null){
                $Ten_en = $Ten_vi;
            }
            $data = array(
                'idMN_1' => $idMN_1,
                'idMN_2' => $idMN_2,
                'MaHinh' => $MaHinh,
                'Ten_vi' => $Ten_vi,
                'Ten_en' => $Ten_en,
                'TomTat_vi' => $TomTat_vi,
                'TomTat_en' => $TomTat_en,
                'MoTa_vi' => $MoTa_vi,
                'MoTa_en' => $MoTa_en,
                'NgayTao' => $now,
                'NgayCapNhat' => $now
            );
            
            $rs = $this->set->kmt_insert_data('kmt_menu_3', $data);
            
            if ($rs) { 
                
                if ($UrlHinh == null) {
                    $UrlHinh = 'public/img/no-img.png';
                }
                    
                $data_img = array(
                    'idLH' => 10,
                    'MaHinh'=>$MaHinh,
                    'UrlHinh' => $UrlHinh,
                    'NgayTao' => $now,
                    'NgayCapNhat' => $now
                );
                $this->set->kmt_insert_data('kmt_hinhanh', $data_img);
                redirect('admin_menu/menu_3/success');
            } else {
                redirect('admin_menu/menu_3/fail');
            }
        }
    }
    
    function edit_menu_3($idMN_3,$stt=null){
        $data['stt'] = $stt;
        $data['menu'] = $this->get->kmt_get_where('kmt_menu_3', array("idMN_3" =>$idMN_3));
        
        $order_mn_1 = array('STT'=>'ASC','idMN_1'=>'DESC');
        $data['menu_1'] = $this->get->kmt_get_where('kmt_menu_1',null,$order_mn_1);
        
        $data['idMN_1_c'] = $this->get->kmt_get_col_where('kmt_menu_3', 'idMN_1', array('idMN_3' =>
                $idMN_3));
        
        $data['idMN_2_c'] = $this->get->kmt_get_col_where('kmt_menu_3', 'idMN_2', array('idMN_3' =>
                $idMN_3));
        
        $data['main_content'] = 'admin_page/kmt_menu/edit_menu_3';
        $this->load->view('back_end_template/content', $data);
    }
    
    function update_menu_3(){
        $idMN_3 = $this->input->post('idMN_3');
        $idMN_2 = $this->input->post('idMN_2');
        $idMN_1 = $this->input->post('idMN_1');
        $MaHinh = $this->input->post('MaHinh');
        $Ten_vi = $this->input->post('Ten_vi');
        $Ten_en = $this->input->post('Ten_en');
        $TomTat_vi = $this->input->post('TomTat_vi');
        $TomTat_en = $this->input->post('TomTat_en');
        $MoTa_vi = $this->input->post('MoTa_vi');
        $MoTa_en = $this->input->post('MoTa_en');
        $UrlHinh = $this->input->post('UrlHinh');
        $now = date("Y-m-d G:i:s");
        
        if($Ten_vi==null){
            $this->edit_menu_3($idMN_3,'name_empty');
        }else{
            if($Ten_en==null){
                $Ten_en = $Ten_vi;
            }
            $data = array(
                'idMN_1' => $idMN_1,
                'idMN_2' => $idMN_2,
                'Ten_vi' => $Ten_vi,
                'Ten_en' => $Ten_en,
                'TomTat_vi' => $TomTat_vi,
                'TomTat_en' => $TomTat_en,
                'MoTa_vi' => $MoTa_vi,
                'MoTa_en' => $MoTa_en,
                'NgayTao' => $now,
                'NgayCapNhat' => $now
            );
            
            $rs = $this->set->kmt_update_data('kmt_menu_3', $data, array('idMN_3' => $idMN_3));
            if ($rs) { 
                
                $data_mn = array('idMN_1'=>$idMN_1,'idMN_2'=>$idMN_2);
                $this->set->kmt_update_data('kmt_item', $data_mn, array('idMN_3' => $idMN_3));
                
                if ($UrlHinh == null) {
                    $UrlHinh = 'public/img/no-img.png';
                }
                    
                $data_img = array(
                    'UrlHinh' => $UrlHinh,
                    'NgayCapNhat' => $now
                );
                
                $this->set->kmt_update_data('kmt_hinhanh', $data_img,array('MaHinh'=>$MaHinh));
                redirect('admin_menu/menu_3/success');
            } else {
                redirect('admin_menu/menu_3/fail');
            }
        }
    }
    
    /* End method menu_3 */
    
    /* Begin method filter */
    
    function menu_2_filter($idMN_1){
        $data['idMN_1_f'] = $idMN_1;
        
        if($idMN_1==0){
            redirect('admin_menu/menu_2');
        }else{
           $con = array('idMN_1'=>$idMN_1); 
        }

        $order = array('STT' => 'ASC', 'idMN_2' => 'DESC');
        
        $config['base_url'] = site_url('admin_menu/menu_2_filter/'.$idMN_1);
        $config['total_rows'] = $this->get->kmt_get_count('kmt_menu_2', $con);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['menu'] = $this->get->kmt_get_where('kmt_menu_2', $con, $order,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();
        
        $order_mn_1 = array('STT'=>'ASC','idMN_1'=>'DESC');
        $data['menu_1'] = $this->get->kmt_get_where('kmt_menu_1',null,$order_mn_1);
        
        $data['count_row'] = count($data['menu']);
        $data['main_content'] = 'admin_page/kmt_menu/filter/menu_2_filter';
        $this->load->view('back_end_template/content', $data);
        
    }
    
    function menu_3_filter($idMN_1,$idMN_2){
        $data['idMN_1_f'] = $idMN_1;
        $data['idMN_2_f'] = $idMN_2;
        
        if($idMN_1==0){
            if($idMN_2==0){
                redirect('admin_menu/menu_3');
            }else{
                $con = array('idMN_2'=>$idMN_2);
            }
        }else{
            if($idMN_2==0){
                $con = array('idMN_1'=>$idMN_1);
            }else{
                $con = array('idMN_1'=>$idMN_1,'idMN_2'=>$idMN_2);
            }
        }

        $order = array('STT' => 'ASC', 'idMN_3' => 'DESC');
        
        $config['base_url'] = site_url('admin_menu/menu_3_filter/'.$idMN_1.'/'.$idMN_2);
        $config['total_rows'] = $this->get->kmt_get_count('kmt_menu_3', $con);
        $config['per_page'] = 10;
        $config['uri_segment'] = 5;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['menu'] = $this->get->kmt_get_where('kmt_menu_3', $con, $order,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();
        
        $order_mn_1 = array('STT'=>'ASC','idMN_1'=>'DESC');
        $data['menu_1'] = $this->get->kmt_get_where('kmt_menu_1',null,$order_mn_1);
        
        $data['count_row'] = count($data['menu']);
        $data['main_content'] = 'admin_page/kmt_menu/filter/menu_3_filter';
        $this->load->view('back_end_template/content', $data);
        
    }
    
    /* End method filter */
    
    /* Begin ajax method */
    
    function list_menu_2($idMN_1){
        $con = array('idMN_1' => $idMN_1);
        $order = array('STT' => 'ASC', 'idMN_2' => 'DESC');
        $data['menu_2'] = $this->get->kmt_get_where('kmt_menu_2', $con, $order);
        $this->load->view('admin_page/kmt_menu/ajax/list_menu_2', $data);
    }
    
    function list_menu_2_edit($idMN_1,$idMN_2){
        $data['idMN_2_f'] = $idMN_2;
        $con = array('idMN_1' => $idMN_1);
        $order = array('STT' => 'ASC', 'idMN_2' => 'DESC');
        $data['menu_2'] = $this->get->kmt_get_where('kmt_menu_2', $con, $order);
        $this->load->view('admin_page/kmt_menu/ajax/list_menu_2_edit', $data);
    }
    
    function list_menu_3($idMN_1,$idMN_2){
        $con = array('idMN_1' => $idMN_1,'idMN_2' => $idMN_2);
        $order = array('STT' => 'ASC', 'idMN_3' => 'DESC');
        $data['menu_3'] = $this->get->kmt_get_where('kmt_menu_3', $con, $order);
        $this->load->view('admin_page/kmt_menu/ajax/list_menu_3', $data);
    }
    
    function list_menu_3_edit($idMN_1,$idMN_2,$idMN_3){
        $data['idMN_3_f'] = $idMN_3;
        $con = array('idMN_1' => $idMN_1,'idMN_2' => $idMN_2);
        $order = array('STT' => 'ASC', 'idMN_3' => 'DESC');
        $data['menu_3'] = $this->get->kmt_get_where('kmt_menu_3', $con, $order);
        $this->load->view('admin_page/kmt_menu/ajax/list_menu_3_edit', $data);
    }
    
    /* End ajax method */
}
