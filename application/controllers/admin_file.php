<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_file extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('get_model', 'get');
        $this->load->model('set_model', 'set');
        $this->load->library("kmt_authentication");
        $this->kmt_authentication->check_login_admin();
    }
    
    function index(){
	    $this->file_group();
	}
    
    function file_group(){
        $data['main_content'] = 'admin_page/kmt_file/file_group';
        $order = array('STT'=>'ASC','idNF'=>'DESC');
        $data['file_group'] = $this->get->kmt_get_where('kmt_nhomfile',null,$order);
        $data['count_row'] = count($data['file_group']);
        $this->load->view('back_end_template/content', $data);
    }
    
    function add_file_group($stt=null){
        $data['stt'] = $stt;
        $data['main_content'] = 'admin_page/kmt_file/add_file_group';
        $this->load->view('back_end_template/content', $data);
    }
    
    function save_file_group(){
        $MaHinh = 'NF_'.time();
        $TenNhom_vi = $this->input->post('TenNhom_vi');
        $TenNhom_en = $this->input->post('TenNhom_en');
        $UrlHinh = $this->input->post('UrlHinh');
        $now = date("Y-m-d G:i:s");
        
        if($TenNhom_vi==null){
            $this->add_file_group('name_empty');
        }else{
            if($TenNhom_en==null){
                $TenNhom_en = $TenNhom_vi;
            }
            $data = array(
                'MaHinh' => $MaHinh,
                'TenNhom_vi' => $TenNhom_vi,
                'TenNhom_en' => $TenNhom_en,
                'NgayTao' => $now,
                'NgayCapNhat' => $now
            );
            
            $rs = $this->set->kmt_insert_data('kmt_nhomfile', $data);
            
            if ($rs) { 
                if ($UrlHinh == null) {
                    $UrlHinh = base_url() . 'public/img/no-img.png';
                }
                    
                $data_img = array(
                    'idLH' => 10,
                    'MaHinh'=>$MaHinh,
                    'UrlHinh' => $UrlHinh,
                    'NgayTao' => $now,
                    'NgayCapNhat' => $now
                );
                $this->set->kmt_insert_data('kmt_hinhanh', $data_img);
                
                redirect('admin_file/file_group/success');
            } else {
                redirect('admin_file/file_group/fail');
            }
        }
    }
    
    function edit_file_group($idNF,$stt=null){
        $data['stt'] = $stt;
        $data['file_group'] = $this->get->kmt_get_where('kmt_nhomfile', array("idNF" =>$idNF));
        $data['main_content'] = 'admin_page/kmt_file/edit_file_group';
        $this->load->view('back_end_template/content', $data);
    }
    
    function update_file_group(){
        $MaHinh = $this->input->post('MaHinh');
        $idNF = $this->input->post('idNF');
        $TenNhom_vi = $this->input->post('TenNhom_vi');
        $TenNhom_en = $this->input->post('TenNhom_en');
        $UrlHinh = $this->input->post('UrlHinh');
        $now = date("Y-m-d G:i:s");
        
        if($TenNhom_vi==null){
            $this->edit_file_group($idNF,'name_empty');
        }else{
            if($TenNhom_en==null){
                $TenNhom_en = $TenNhom_vi;
            }
            $data = array(
                'TenNhom_vi' => $TenNhom_vi,
                'TenNhom_en' => $TenNhom_en,
                'NgayCapNhat' => $now
            );
            
            $rs = $this->set->kmt_update_data('kmt_nhomfile', $data, array('idNF' => $idNF));
            
            if ($rs) { 
                if ($UrlHinh == null) {
                    $UrlHinh = base_url() . 'public/img/no-img.png';
                }
                    
                $data_img = array(
                    'UrlHinh' => $UrlHinh,
                    'NgayCapNhat' => $now
                );
                
                $this->set->kmt_update_data('kmt_hinhanh', $data_img,array('MaHinh'=>$MaHinh));
                
                redirect('admin_file/file_group/success');
            } else {
                redirect('admin_file/file_group/fail');
            }
        }
    }
    
    
    function file(){
        $order = array('idNF' => 'ASC','STT' => 'ASC', 'idF' => 'DESC');
        
        $config['base_url'] = site_url('admin_file/file');
        $config['total_rows'] = $this->get->kmt_get_count('kmt_file');
        $config['per_page'] = 20;
        $config['uri_segment'] = 3;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['file'] = $this->get->kmt_get_where('kmt_file', null, $order,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();

        $data['count_row'] = count($data['file']);
        
        $order_fg = array('STT'=>'ASC','idNF'=>'DESC');
        $data['file_group'] = $this->get->kmt_get_where('kmt_nhomfile',null,$order_fg);
        
        $data['main_content'] = 'admin_page/kmt_file/file';
        $this->load->view('back_end_template/content', $data);
    }
    
    function file_filter($idNF){
        
        $data['idNF_f'] = $idNF;
        $con = array('idNF'=>$idNF); 
        $order = array('idNF' => 'ASC', 'STT' => 'ASC', 'idF' => 'DESC');
        
        $config['base_url'] = site_url('admin_file/file_filter/'.$idNF);
        $config['total_rows'] = $this->get->kmt_get_count('kmt_file', $con);
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['file'] = $this->get->kmt_get_where('kmt_file', $con, $order,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();

        $data['count_row'] = count($data['file']);
        
        $order_fg = array('STT'=>'ASC','idNF'=>'DESC');
        $data['file_group'] = $this->get->kmt_get_where('kmt_nhomfile',null,$order_fg);
        
        $data['main_content'] = 'admin_page/kmt_file/file_filter';
        $this->load->view('back_end_template/content', $data);
    }
    
    function add_file(){
        $order_fg = array('STT'=>'ASC','idNF'=>'DESC');
        $data['file_group'] = $this->get->kmt_get_where('kmt_nhomfile',null,$order_fg);
        
        $data['main_content'] = 'admin_page/kmt_file/add_file';
        $this->load->view('back_end_template/content', $data);
    }
    
    function save_file(){
        $idNF = $this->input->post('idNF');
        $MaHinh = $this->input->post('MaHinh');
        $Size = $this->input->post('Size');
        $TenFile_vi = $this->input->post('TenFile_vi');
        $TenFile_en = $this->input->post('TenFile_en');
        $MoTa_vi = $this->input->post('MoTa_vi');
        $MoTa_en = $this->input->post('MoTa_en');
        $YeuCau_vi = $this->input->post('YeuCau_vi');
        $YeuCau_en = $this->input->post('YeuCau_en');
        $Url_file = $this->input->post('Url_file');
        $now = date("Y-m-d G:i:s");

        
        $data = array(
                'MaHinh'=>$MaHinh,
                'idNF'=>$idNF,
                'Size'=>$Size,
                'TenFile_vi'=>$TenFile_vi,
                'TenFile_en'=>$TenFile_en,
                'MoTa_vi'=>$MoTa_vi,
                'MoTa_en'=>$MoTa_en,
                'YeuCau_vi'=>$YeuCau_vi,
                'YeuCau_en'=>$YeuCau_en,
                'Url_file'=>$Url_file,
                'NgayTao'=>$now,
                'NgayCapNhat'=>$now
                );
                
        $rs = $this->set->kmt_insert_data('kmt_file', $data);
        
        if($rs){
           redirect('admin_file/file/success');
        }else{
           redirect('admin_file/file/fail'); 
        }
        
    }
    
    function edit_file($idF){
        $data['file'] = $this->get->kmt_get_where('kmt_file',array('idF'=>$idF));
        
        $order_fg = array('STT'=>'ASC','idNF'=>'DESC');
        $data['file_group'] = $this->get->kmt_get_where('kmt_nhomfile',null,$order_fg);
        $data['main_content'] = 'admin_page/kmt_file/edit_file';
        $this->load->view('back_end_template/content', $data);
    }
    
    function update_file(){
        $idF = $this->input->post('idF');
        $idNF = $this->input->post('idNF');
        $MaHinh = $this->input->post('MaHinh');
        $Size = $this->input->post('Size');
        $TenFile_vi = $this->input->post('TenFile_vi');
        $TenFile_en = $this->input->post('TenFile_en');
        $MoTa_vi = $this->input->post('MoTa_vi');
        $MoTa_en = $this->input->post('MoTa_en');
        $YeuCau_vi = $this->input->post('YeuCau_vi');
        $YeuCau_en = $this->input->post('YeuCau_en');
        $Url_file = $this->input->post('Url_file');
        $now = date("Y-m-d G:i:s");

        $data = array(
                'idNF'=>$idNF,
                'Size'=>$Size,
                'TenFile_vi'=>$TenFile_vi,
                'TenFile_en'=>$TenFile_en,
                'MoTa_vi'=>$MoTa_vi,
                'MoTa_en'=>$MoTa_en,
                'YeuCau_vi'=>$YeuCau_vi,
                'YeuCau_en'=>$YeuCau_en,
                'Url_file'=>$Url_file,
                'NgayCapNhat'=>$now
                );
                
        $rs = $this->set->kmt_update_data('kmt_file',$data,array('idF'=>$idF));
        
        if($rs){
               redirect('admin_file/file/success');
        }else{
               redirect('admin_file/file/fail'); 
        }
    }
    
    function video($MaHinh){
        
        $data['MaHinh'] =  $MaHinh;
        $con = array('MaHinh'=>$MaHinh);
        $order = array('STT'=>'ASC','idV'=>'DESC');
        $config['base_url'] = site_url('admin_file/video');
        $config['total_rows'] = $this->get->kmt_get_count('kmt_video',$con);
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['video'] = $this->get->kmt_get_where('kmt_video', $con, $order,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();

        $data['count_row'] = count($data['video']);
        $data['main_content'] = 'admin_page/kmt_file/video/video';
        $this->load->view('back_end_template/content', $data);
    }
    
    function add_video($MaHinh){
        $data['MaHinh'] =  $MaHinh;
        $data['main_content'] = 'admin_page/kmt_file/video/add_video';
        $this->load->view('back_end_template/content', $data);
    }
    
    function save_video(){
        $MaHinh = $this->input->post('MaHinh');
        $TenV_vi = $this->input->post('TenV_vi');
        $TenV_en = $this->input->post('TenV_en');
        $MoTa_vi = $this->input->post('MoTa_vi');
        $MoTa_en = $this->input->post('MoTa_en');
        $Url_video = $this->input->post('Url_video');
        $now = date("Y-m-d G:i:s");

        if($TenV_en==''){
            $TenV_en = $TenV_vi;
        }
        $data = array(
                'MaHinh'=>$MaHinh,
                'TenV_vi'=>$TenV_vi,
                'TenV_en'=>$TenV_en,
                'MoTa_vi'=>$MoTa_vi,
                'MoTa_en'=>$MoTa_en,
                'Url_video'=>$Url_video,
                'NgayTao'=>$now,
                'NgayCapNhat'=>$now
                );
                
        $rs = $this->set->kmt_insert_data('kmt_video', $data);
        
        if($rs){
            redirect('admin_file/video/'.$MaHinh.'/success');
        }else{
            redirect('admin_file/video/'.$MaHinh.'/fail'); 
        }
        
    }
    
    function edit_video($idV){
        $data['video'] = $this->get->kmt_get_where('kmt_video',array('idV'=>$idV));
        $data['main_content'] = 'admin_page/kmt_file/video/edit_video';
        $this->load->view('back_end_template/content', $data);
    }
    
    function update_video(){
        $idV = $this->input->post('idV');
        $MaHinh = $this->input->post('MaHinh');

        $TenV_vi = $this->input->post('TenV_vi');
        $TenV_en = $this->input->post('TenV_en');
        $MoTa_vi = $this->input->post('MoTa_vi');
        $MoTa_en = $this->input->post('MoTa_en');
        $Url_video = $this->input->post('Url_video');
        $now = date("Y-m-d G:i:s");

        if($TenV_en==''){
            $TenV_en = $TenV_vi;
        }
        $data = array(
                'TenV_vi'=>$TenV_vi,
                'TenV_en'=>$TenV_en,
                'MoTa_vi'=>$MoTa_vi,
                'MoTa_en'=>$MoTa_en,
                'Url_video'=>$Url_video,
                'NgayCapNhat'=>$now
                );
                
        $rs = $this->set->kmt_update_data('kmt_video',$data,array('idV'=>$idV));
        
        if($rs){
               redirect('admin_file/video/'.$MaHinh.'/success');
        }else{
               redirect('admin_file/video/'.$MaHinh.'/fail'); 
        }
    }
}
