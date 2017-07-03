<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_contact extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('get_model', 'get');
        $this->load->model('set_model', 'set');
    }
    
    function index()
	{
	    $con_top = array('idVT'=>1);
        $con_bottom = array('idVT'=>2);
        $data['address_top'] = $this->get->kmt_get_where('kmt_diachi',$con_top);
        $data['address_bottom'] = $this->get->kmt_get_where('kmt_diachi',$con_bottom);
        
	    $data['main_content'] = 'admin_page/kmt_contact/address/address';
        $this->load->view('back_end_template/content', $data);
	}
    
    function edit_address($idVT){
        $data['address'] = $this->get->kmt_get_where('kmt_diachi',array('idVT'=>$idVT));
        
        $data['main_content'] = 'admin_page/kmt_contact/address/edit_address';
        $this->load->view('back_end_template/content', $data);
    }
    
    function update_address(){
        $idVT = $this->input->post('idVT');
        $BanDo = $this->input->post('BanDo');
        $NoiDung_vi = $this->input->post('NoiDung_vi');
        $NoiDung_en = $this->input->post('NoiDung_en');
        if ($BanDo == "") {
           $data = array(
            'NoiDung_vi' => $NoiDung_vi,
            'NoiDung_en' => $NoiDung_en
            );
        }else{
            $data = array(
            'NoiDung_vi' => $NoiDung_vi,
            'NoiDung_en' => $NoiDung_en,
            'BanDo' => $BanDo
            );
        }

        $rs = $this->set->kmt_update_data('kmt_diachi',$data,array('idVT'=>$idVT));
        if($rs){
           redirect('admin_contact/index/success');
        }else{
           redirect('admin_contact/index/fail'); 
        }
    }
    
    function support(){
        $order = array('STT' => 'ASC', 'idHT' => 'DESC');
        $config['base_url'] = site_url('admin_contact/support');
        $config['total_rows'] = $this->get->kmt_get_count('kmt_hotro', null);
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['support'] = $this->get->kmt_get_where('kmt_hotro', null, $order,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();

        $data['count_row'] = count($data['support']);
        $data['main_content'] = 'admin_page/kmt_contact/support/support';
        $this->load->view('back_end_template/content', $data);
    }
    
    function add_support(){
        $data['main_content'] = 'admin_page/kmt_contact/support/add_support';
        $this->load->view('back_end_template/content', $data);
    }
    
    function save_support(){
        $TenTK_vi = $this->input->post('TenTK_vi');
        $TenTK_en = $this->input->post('TenTK_en');
        $Yahoo = $this->input->post('Yahoo');
        $Skype = $this->input->post('Skype');
        $SDT = $this->input->post('SDT');
        $Email = $this->input->post('Email');
        
        $data = array(
            'TenTK_vi' => $TenTK_vi,
            'TenTK_en' => $TenTK_en,
            'Yahoo' => $Yahoo,
            'Skype' => $Skype,
            'SDT' => $SDT,
            'Email' => $Email
        );

        $rs = $this->set->kmt_insert_data('kmt_hotro',$data);
        if($rs){
           redirect('admin_contact/support/success');
        }else{
           redirect('admin_contact/support/fail'); 
        }
    }
    
    function edit_support($idHT){
        $data['support'] = $this->get->kmt_get_where('kmt_hotro',array('idHT'=>$idHT));
        $data['main_content'] = 'admin_page/kmt_contact/support/edit_support';
        $this->load->view('back_end_template/content', $data);
    }
    
    function update_support(){
        $idHT = $this->input->post('idHT');
        $TenTK_vi = $this->input->post('TenTK_vi');
        $TenTK_en = $this->input->post('TenTK_en');
        $Yahoo = $this->input->post('Yahoo');
        $Skype = $this->input->post('Skype');
        $SDT = $this->input->post('SDT');
        $Email = $this->input->post('Email');
        
        $data = array(
            'TenTK_vi' => $TenTK_vi,
            'TenTK_en' => $TenTK_en,
            'Yahoo' => $Yahoo,
            'Skype' => $Skype,
            'SDT' => $SDT,
            'Email' => $Email
        );

        $rs = $this->set->kmt_update_data('kmt_hotro',$data,array('idHT'=>$idHT));
        if($rs){
           redirect('admin_contact/support/success');
        }else{
           redirect('admin_contact/support/fail'); 
        }
    }
    
    function social()
	{
	    $data['social'] = $this->get->kmt_get_where('kmt_mangxahoi');
	    $data['main_content'] = 'admin_page/kmt_contact/social/social';
        $this->load->view('back_end_template/content', $data);
	}
    
    function edit_social(){
        $data['social'] = $this->get->kmt_get_where('kmt_mangxahoi');
        $data['main_content'] = 'admin_page/kmt_contact/social/edit_social';
        $this->load->view('back_end_template/content', $data);
    }
    
    function update_social(){
        $Facebook = $this->input->post('Facebook');
        $Google = $this->input->post('Google');
        $Twitter = $this->input->post('Twitter');
        $Instagram = $this->input->post('Instagram');
        $Youtube = $this->input->post('Youtube');
        $Fanpage = $this->input->post('Fanpage');
        
        $data = array(
            'Facebook' => $Facebook,
            'Google' => $Google,
            'Twitter' => $Twitter,
            'Instagram' => $Instagram,
            'Youtube' => $Youtube,
            'Fanpage' => $Fanpage
        );

        $rs = $this->set->kmt_update_data('kmt_mangxahoi',$data,array('idMXH'=>1));
        if($rs){
           redirect('admin_contact/social/success');
        }else{
           redirect('admin_contact/social/fail'); 
        }
    }
    
    function message(){
        $order = array('idMS' => 'DESC');
        $config['base_url'] = site_url('admin_contact/message');
        $config['total_rows'] = $this->get->kmt_get_count('kmt_lienhe', null);
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['message'] = $this->get->kmt_get_where('kmt_lienhe', null, $order,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();

        $data['count_row'] = count($data['message']);
        $data['main_content'] = 'admin_page/kmt_contact/message/message';
        $this->load->view('back_end_template/content', $data);
    }
    
    function info_system(){
        $data['info'] = $this->get->kmt_get_where('kmt_system');
        $data['main_content'] = 'admin_page/kmt_contact/info_system';
        $this->load->view('back_end_template/content', $data);
    }
    
    function edit_info_system(){
        $data['info'] = $this->get->kmt_get_where('kmt_system');
        $data['main_content'] = 'admin_page/kmt_contact/edit_info_system';
        $this->load->view('back_end_template/content', $data);
    }
    
    function update_info_system(){
        $Email_mess = $this->input->post('Email_mess');
        $Email_order = $this->input->post('Email_order');
        $TyGia = max(1,$this->input->post('TyGia'));
        $Css_code = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $this->input->post('Css_code'));
        
        
        $data = array(
            'Email_mess' => $Email_mess,
            'Email_order' => $Email_order,
            'TyGia' => $TyGia,
            'Css_code' => $Css_code
        );

        $rs = $this->set->kmt_update_data('kmt_system',$data,array('idST'=>1));
        if($rs){
           redirect('admin_contact/info_system/success');
        }else{
           redirect('admin_contact/info_system/fail'); 
        }
    }
    
    function link_web(){
        $order = array('STT' => 'ASC', 'idLK' => 'DESC');
        $data['link_web'] = $this->get->kmt_get_where('kmt_lienket', null, $order);
        $data['count_row'] = count($data['link_web']);
        $data['main_content'] = 'admin_page/kmt_contact/link/link';
        $this->load->view('back_end_template/content', $data);
    }
    
    function add_link(){
        $data['main_content'] = 'admin_page/kmt_contact/link/add_link';
        $this->load->view('back_end_template/content', $data);
    }
    
    function save_link(){
        $TenLK_vi = $this->input->post('TenLK_vi');
        $TenLK_en = $this->input->post('TenLK_en');
        $Link = $this->input->post('Link');
        $now = date("Y-m-d h:i:s");
        
        $data = array(
            'TenLK_vi' => $TenLK_vi,
            'TenLK_en' => $TenLK_en,
            'Link' => $Link,
            'NgayTao' => $now,
            'NgayCapNhat' => $now
        );

        $rs = $this->set->kmt_insert_data('kmt_lienket',$data);
        if($rs){
           redirect('admin_contact/link_web/success');
        }else{
           redirect('admin_contact/link_web/fail'); 
        }
    }
    
    function edit_link($idLK){
        $data['link_web'] = $this->get->kmt_get_where('kmt_lienket',array('idLK'=>$idLK));
        $data['main_content'] = 'admin_page/kmt_contact/link/edit_link';
        $this->load->view('back_end_template/content', $data);
    }
    
    function update_link(){
        $idLK = $this->input->post('idLK');
        $TenLK_vi = $this->input->post('TenLK_vi');
        $TenLK_en = $this->input->post('TenLK_en');
        $Link = $this->input->post('Link');
        $now = date("Y-m-d h:i:s");
        
        $data = array(
            'TenLK_vi' => $TenLK_vi,
            'TenLK_en' => $TenLK_en,
            'Link' => $Link,
            'NgayCapNhat' => $now
        );

        $rs = $this->set->kmt_update_data('kmt_lienket',$data,array('idLK'=>$idLK));
        if($rs){
           redirect('admin_contact/link_web/success');
        }else{
           redirect('admin_contact/link_web/fail'); 
        }
    }
}
