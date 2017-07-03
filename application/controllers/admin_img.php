<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_img extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('get_model', 'get');
        $this->load->model('set_model', 'set');
        $this->load->library("kmt_authentication");
        $this->kmt_authentication->check_login_admin();
    }
    
    function index(){
	    $this->img(1);
	}
    
    function img($idLH)
	{  
	    $data['idP_f'] = 0;
	    $data['idLH'] = $idLH;
        $con = array('idLH'=>$idLH);
        $order = array('STT' => 'ASC', 'idH' => 'DESC');
        
        $config['base_url'] = site_url('admin_img/img/'.$idLH);
        $config['total_rows'] = $this->get->kmt_get_count('kmt_hinhanh', $con);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['img'] = $this->get->kmt_get_where('kmt_hinhanh', $con, $order,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();
        
        $data['type_img'] = $this->get->kmt_get_where('kmt_loaihinhanh',array('idLH'=>$idLH));
        $data['title_type_img'] = $this->get->kmt_get_col_where('kmt_loaihinhanh','TenLoaiHinh',array('idLH'=>$idLH));
        $data['list_page'] = $this->get->kmt_get_where('kmt_trangweb',null,array('idP'=>'ASC'));
        
        $data['count_row'] = count($data['img']);
	    $data['main_content'] = 'admin_page/kmt_img/img';
        $this->load->view('back_end_template/content', $data);
	}
    
    function img_filter($idP,$idLH)
	{  
	    $data['idP_f'] = $idP;
	    $data['idLH'] = $idLH;
        
        $con = array('idLH'=>$idLH,'idP'=>$idP);
        $order = array('STT' => 'ASC', 'idH' => 'DESC');
        
        $config['base_url'] = site_url('admin_img/img_filter/'.$idP.'/'.$idLH);
        $config['total_rows'] = $this->get->kmt_get_count('kmt_hinhanh', $con);
        $config['per_page'] = 10;
        $config['uri_segment'] = 5;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['img'] = $this->get->kmt_get_where('kmt_hinhanh', $con, $order,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();
        
        $data['type_img'] = $this->get->kmt_get_where('kmt_loaihinhanh',array('idLH'=>$idLH));
        $data['title_type_img'] = $this->get->kmt_get_col_where('kmt_loaihinhanh','TenLoaiHinh',array('idLH'=>$idLH));
        $data['list_page'] = $this->get->kmt_get_where('kmt_trangweb',null,array('idP'=>'ASC'));
        
        $data['count_row'] = count($data['img']);
	    $data['main_content'] = 'admin_page/kmt_img/img';
        $this->load->view('back_end_template/content', $data);
	}
    
    function add_img($idLH,$stt=null)
	{  
	    $data['stt'] = $stt;
	    $data['idLH'] = $idLH;
        $data['type_img'] = $this->get->kmt_get_where('kmt_loaihinhanh',array('idLH'=>$idLH));
        $data['title_type_img'] = $this->get->kmt_get_col_where('kmt_loaihinhanh','TenLoaiHinh',array('idLH'=>$idLH));
        
        $data['list_page'] = $this->get->kmt_get_where('kmt_trangweb',null,array('idP'=>'ASC'));
        
	    $data['main_content'] = 'admin_page/kmt_img/add_img';
        $this->load->view('back_end_template/content', $data);
	}
    
    function save_img(){
        $idLH = $this->input->post('idLH');
        $tdn = $this->get->kmt_get_col_where('kmt_loaihinhanh','TiepDauNgu',array('idLH'=>$idLH));
        
        $MaHinh = $tdn.'_'.time();

        $idP = $this->input->post('idP');
        $TenHinh_vi = $this->input->post('TenHinh_vi');
        $TenHinh_en = $this->input->post('TenHinh_en');
        $Name = $this->input->post('Name');
        $MoTa_vi = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $this->input->post('MoTa_vi'));
        $MoTa_en = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $this->input->post('MoTa_en'));
        
        $Link = $this->input->post('Link');
        
        $base = base_url();
        $UrlHinh_temp = $this->input->post('UrlHinh');
        $UrlHinh = str_replace($base,'',$UrlHinh_temp);
        
        $now = date("Y-m-d G:i:s");
        
        if ($UrlHinh == null) {
            $UrlHinh = 'public/img/no-img.png';
        }
        
        $data = array(
                'MaHinh'=>$MaHinh,
                'idLH'=>$idLH,
                'idP'=>$idP,
                'TenHinh_vi'=>$TenHinh_vi,
                'TenHinh_en'=>$TenHinh_en,
                'Name' => $Name,
                'MoTa_vi'=>$MoTa_vi,
                'MoTa_en'=>$MoTa_en,
                'Link'=>$Link,
                'UrlHinh'=>$UrlHinh,
                'NgayTao'=>$now,
                'NgayCapNhat'=>$now
                );
             
            
        $rs = $this->set->kmt_insert_data('kmt_hinhanh', $data);

        if($rs){
           redirect('admin_img/img/'.$idLH.'/success');
        }else{
           redirect('admin_img/img/'.$idLH.'/fail'); 
        }
        
    }
    
    function edit_img($idH,$MaHinh=null)
	{   
	    
	    $idLH = $this->get->kmt_get_col_where('kmt_hinhanh','idLH',array('idH'=>$idH));
        $con = array('idH'=>$idH);
        $data['img'] = $this->get->kmt_get_where('kmt_hinhanh',$con);
        
        $data['type_img'] = $this->get->kmt_get_where('kmt_loaihinhanh',array('idLH'=>$idLH));
        $data['title_type_img'] = $this->get->kmt_get_col_where('kmt_loaihinhanh','TenLoaiHinh',array('idLH'=>$idLH));
        $data['list_page'] = $this->get->kmt_get_where('kmt_trangweb',null,array('idP'=>'ASC'));
        
        if($idLH!=11){
            $MaHinh_t = null;
        }else{
            $MaHinh_t = $MaHinh;            
        }
	    $data['MaHinh'] = $MaHinh_t;
        
        $data['main_content'] = 'admin_page/kmt_img/edit_img';
        $this->load->view('back_end_template/content', $data);
	}
    
    function update_img(){
        $MaHinh = $this->input->post('MaHinh');
        $idH = $this->input->post('idH');
        $idLH = $this->input->post('idLH');
        $idP = $this->input->post('idP');
        $TenHinh_vi = $this->input->post('TenHinh_vi');
        $TenHinh_en = $this->input->post('TenHinh_en');
        $Name = $this->input->post('Name');
        $MoTa_vi = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $this->input->post('MoTa_vi'));
        $MoTa_en = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $this->input->post('MoTa_en'));
        
        $Link = $this->input->post('Link');
        
        $base = base_url();
        $UrlHinh_temp = $this->input->post('UrlHinh');
        $UrlHinh = str_replace($base,'',$UrlHinh_temp);
        
        
        $now = date("Y-m-d G:i:s");
        
        if ($UrlHinh == null) {
            $UrlHinh = 'public/img/no-img.png';
        }
        
        $data = array(
                'idP'=>$idP,
                'TenHinh_vi'=>$TenHinh_vi,
                'TenHinh_en'=>$TenHinh_en,
                'Name' => $Name,
                'MoTa_vi'=>$MoTa_vi,
                'MoTa_en'=>$MoTa_en,
                'Link'=>$Link,
                'UrlHinh'=>$UrlHinh,
                'NgayTao'=>$now,
                'NgayCapNhat'=>$now
                );
             
            
        $rs = $this->set->kmt_update_data('kmt_hinhanh',$data,array('idH'=>$idH));
        
        if($MaHinh!=null && $MaHinh){
            if($rs){
               redirect('admin_item/img_child/'.$MaHinh.'/success');
            }else{
               redirect('admin_item/img_child/'.$MaHinh.'/fail'); 
            }    
        }else{
            if($rs){
               redirect('admin_img/img/'.$idLH.'/success');
            }else{
               redirect('admin_img/img/'.$idLH.'/fail'); 
            }
        }  
    }
    
    function album(){
        $order = array('STT' => 'ASC', 'idAB' => 'DESC');
        
        $config['base_url'] = site_url('admin_img/album');
        $config['total_rows'] = $this->get->kmt_get_count('kmt_album');
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['album'] = $this->get->kmt_get_where('kmt_album', null, $order,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();

        $data['count_row'] = count($data['album']);
	    $data['main_content'] = 'admin_page/kmt_img/album/album';
        $this->load->view('back_end_template/content', $data);
    }
    
    function add_album($stt=null){
        $data['stt'] = $stt;
        $data['main_content'] = 'admin_page/kmt_img/album/add_album';
        $this->load->view('back_end_template/content', $data);
    }
    
    function save_album(){
        
        $MaHinh = 'AB_'.time();
        $Ten_album_vi = $this->input->post('Ten_album_vi');
        $Ten_album_en = $this->input->post('Ten_album_en');
        $now = date("Y-m-d h:i:s");
        
        if($Ten_album_vi==null || $Ten_album_en==null){
            $this->add_album('name_empty');
        }else{
            $data = array(
                'MaHinh' => $MaHinh,
                'Ten_album_vi' => $Ten_album_vi,
                'Ten_album_en' => $Ten_album_en,
                'NgayTao' => $now,
                'NgayCapNhat' => $now
            );
            
            $rs = $this->set->kmt_insert_data('kmt_album', $data);
            
            if ($rs) { 
                redirect('admin_img/album/success');
            } else {
                redirect('admin_img/album/fail');
            }
        }
    }
    
    function edit_album($idAB,$stt=null){
        $data['stt'] = $stt;
        $data['album'] = $this->get->kmt_get_where('kmt_album', array("idAB" =>$idAB));
        $data['main_content'] = 'admin_page/kmt_img/album/edit_album';
        $this->load->view('back_end_template/content', $data);
    }
    
    function update_album(){
        $idAB = $this->input->post('idAB');
        $Ten_album_vi = $this->input->post('Ten_album_vi');
        $Ten_album_en = $this->input->post('Ten_album_en');
        $now = date("Y-m-d h:i:s");

        $data = array(
                'Ten_album_vi'=>$Ten_album_vi,
                'Ten_album_en'=>$Ten_album_en,
                'NgayCapNhat'=>$now
                );
             
            
        $rs = $this->set->kmt_update_data('kmt_album',$data,array('idAB'=>$idAB));

        if($rs){
           redirect('admin_img/album/success');
        }else{
           redirect('admin_img/album/fail'); 
        }
        
    }
    
    function img_in_album($MaHinh){
        $data['idLH'] = 2;
        $data['MaHinh'] = $MaHinh;
        $data['TenAB'] = $this->get->kmt_get_col_where('kmt_album','Ten_album_vi',array('MaHinh'=>$MaHinh));
        $con = array('MaHinh'=>$MaHinh);
        $order = array('STT' => 'ASC', 'idH' => 'DESC');
        
        $config['base_url'] = site_url('admin_img/img_in_album/'.$MaHinh);
        $config['total_rows'] = $this->get->kmt_get_count('kmt_hinhanh', $con);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['img'] = $this->get->kmt_get_where('kmt_hinhanh', $con, $order,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();
        
        $data['type_img'] = $this->get->kmt_get_where('kmt_loaihinhanh',array('idLH'=>2));
        $data['count_row'] = count($data['img']);
        
        $data['main_content'] = 'admin_page/kmt_img/album/img_in_album';
        $this->load->view('back_end_template/content', $data);
    }
    
    function add_img_album($MaHinh,$stt=null)
	{  
	    $data['stt'] = $stt;
	    $data['MaHinh'] = $MaHinh;
        $data['idLH'] = 2;
        $data['type_img'] = $this->get->kmt_get_where('kmt_loaihinhanh',array('idLH'=>2));
        $data['title_type_img'] = $this->get->kmt_get_col_where('kmt_loaihinhanh','TenLoaiHinh',array('idLH'=>2));
	    $data['main_content'] = 'admin_page/kmt_img/album/add_img_album';
        $this->load->view('back_end_template/content', $data);
	}
    
    function save_img_album(){
        $MaHinh = $this->input->post('MaHinh');
        $idLH = 2;

        $idP = $this->input->post('idP');
        $TenHinh_vi = $this->input->post('TenHinh_vi');
        $TenHinh_en = $this->input->post('TenHinh_en');
        $MoTa_vi = $this->input->post('MoTa_vi');
        $MoTa_en = $this->input->post('MoTa_en');
        $Link = $this->input->post('Link');
        $base = base_url();
        $UrlHinh_temp = $this->input->post('UrlHinh');
        $UrlHinh = str_replace($base,'',$UrlHinh_temp);
        $now = date("Y-m-d h:i:s");
        
        if ($UrlHinh == null) {
            $UrlHinh = 'public/img/no-img.png';
        }
        
        $data = array(
                'MaHinh'=>$MaHinh,
                'idLH'=>$idLH,
                'idP'=>$idP,
                'TenHinh_vi'=>$TenHinh_vi,
                'TenHinh_en'=>$TenHinh_en,
                'MoTa_vi'=>$MoTa_vi,
                'MoTa_en'=>$MoTa_en,
                'Link'=>$Link,
                'UrlHinh'=>$UrlHinh,
                'NgayTao'=>$now,
                'NgayCapNhat'=>$now
                );
             
            
        $rs = $this->set->kmt_insert_data('kmt_hinhanh', $data);

        if($rs){
           redirect('admin_img/img_in_album/'.$MaHinh.'/success');
        }else{
           redirect('admin_img/img_in_album/'.$MaHinh.'/fail'); 
        }
        
    }
    
    function edit_img_album($idH)
	{  
	    $idLH = $this->get->kmt_get_col_where('kmt_hinhanh','idLH',array('idH'=>$idH));
        $con = array('idH'=>$idH);
        $data['img'] = $this->get->kmt_get_where('kmt_hinhanh',$con);
        
        $data['type_img'] = $this->get->kmt_get_where('kmt_loaihinhanh',array('idLH'=>$idLH));
        $data['title_type_img'] = $this->get->kmt_get_col_where('kmt_loaihinhanh','TenLoaiHinh',array('idLH'=>$idLH));
        $data['list_page'] = $this->get->kmt_get_where('kmt_trangweb',null,array('idP'=>'ASC'));
        
        $data['main_content'] = 'admin_page/kmt_img/album/edit_img_album';
        $this->load->view('back_end_template/content', $data);
	}
    
    function update_img_album(){
        $MaHinh = $this->input->post('MaHinh');
        $idH = $this->input->post('idH');
        $idLH = $this->input->post('idLH');
        $idP = $this->input->post('idP');
        $TenHinh_vi = $this->input->post('TenHinh_vi');
        $TenHinh_en = $this->input->post('TenHinh_en');
        $MoTa_vi = $this->input->post('MoTa_vi');
        $MoTa_en = $this->input->post('MoTa_en');
        $Link = $this->input->post('Link');
        $base = base_url();
        $UrlHinh_temp = $this->input->post('UrlHinh');
        $UrlHinh = str_replace($base,'',$UrlHinh_temp);
        $now = date("Y-m-d h:i:s");
        
        if ($UrlHinh == null) {
            $UrlHinh = 'public/img/no-img.png';
        }
        
        $data = array(
                'idP'=>$idP,
                'TenHinh_vi'=>$TenHinh_vi,
                'TenHinh_en'=>$TenHinh_en,
                'MoTa_vi'=>$MoTa_vi,
                'MoTa_en'=>$MoTa_en,
                'Link'=>$Link,
                'UrlHinh'=>$UrlHinh,
                'NgayTao'=>$now,
                'NgayCapNhat'=>$now
                );
             
            
        $rs = $this->set->kmt_update_data('kmt_hinhanh',$data,array('idH'=>$idH));

        if($rs){
           redirect('admin_img/img_in_album/'.$MaHinh.'/success');
        }else{
           redirect('admin_img/img_in_album/'.$MaHinh.'/fail'); 
        }
        
    }
    
    function add_list_img($idLH){
	    $data['idLH'] = $idLH;
        $data['title_type_img'] = $this->get->kmt_get_col_where('kmt_loaihinhanh','TenLoaiHinh',array('idLH'=>$idLH));
	    $data['main_content'] = 'admin_page/kmt_img/add_list_img';
        $this->load->view('back_end_template/content', $data);
    }
    
    function add_list_img_album($MaHinh){
	    $data['idLH'] = 2;
        $data['MaHinh'] = $MaHinh;
        $data['title_type_img'] = $this->get->kmt_get_col_where('kmt_loaihinhanh','TenLoaiHinh',array('idLH'=>4));
	    $data['main_content'] = 'admin_page/kmt_img/album/add_list_img_album';
        $this->load->view('back_end_template/content', $data);
    }
    
    function save_list_img(){
        $idLH = $this->input->post('idLH'); 
        
        $tdn = $this->get->kmt_get_col_where('kmt_loaihinhanh','TiepDauNgu',array('idLH'=>$idLH));
        $now = date("Y-m-d h:i:s");
                      
        $height = $this->get->kmt_get_col_where('kmt_loaihinhanh','Rong',array('idLH'=>$idLH));
        $path = './upload/files/chung/';
        $this->load->library('upload');
        $this->upload->initialize(array(
            "upload_path"=>$path,
            "allowed_types"=>'gif|jpg|png',
            "max_size"=>'2048'
        ));
            
        if($this->upload->do_multi_upload("myfile")){
            $list_file = $this->upload->get_multi_upload_data();
            $i=1;
            foreach($list_file as $value){
                $file =  $value['full_path'];
                $url = 'upload/files/chung/'.$value['file_name'];

                $name =  $value['raw_name'];
                $is_img =  $value['is_image'];
                
                if($is_img==1){
                    $MaHinh = $tdn.'_'.time().$i;
                    
                    $data = array(
                        'MaHinh'=>$MaHinh,
                        'idLH'=>$idLH,
                        'idP'=>0,
                        'TenHinh_vi'=>$name,
                        'TenHinh_en'=>$name,
                        'Link' => 'http://vietwave.vn',
                        'UrlHinh'=>$url,
                        'NgayTao'=>$now,
                        'NgayCapNhat'=>$now
                        );
                    
                    //print_r($data);
                    $this->set->kmt_insert_data('kmt_hinhanh', $data);
                    $this->resize($file,$height);
                }else{
                    unlink($file);
                }
               $i++; 
            }
            
            redirect('admin_img/img/'.$idLH.'/success');
        }else{
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error_ud', $error);
            redirect('admin_img/add_list_img/'.$idLH);
        }
    }
    
    function save_list_img_album(){
        $idLH = $this->input->post('idLH'); 
        $MaHinh = $this->input->post('MaHinh'); 
        
        $tdn = $this->get->kmt_get_col_where('kmt_loaihinhanh','TiepDauNgu',array('idLH'=>$idLH));
        $now = date("Y-m-d h:i:s");
                      
        $height = $this->get->kmt_get_col_where('kmt_loaihinhanh','Rong',array('idLH'=>$idLH));
        $path = './upload/files/album/';
        $this->load->library('upload');
        $this->upload->initialize(array(
            "upload_path"=>$path,
            "allowed_types"=>'gif|jpg|png',
            "max_size"=>'2048'
        ));
            
        if($this->upload->do_multi_upload("myfile")){
            $list_file = $this->upload->get_multi_upload_data();
            $i=1;
            foreach($list_file as $value){
                $file =  $value['full_path'];
                $url = 'upload/files/album/'.$value['file_name'];

                $name =  $value['raw_name'];
                $is_img =  $value['is_image'];
                
                if($is_img==1){
                    
                    $data = array(
                        'MaHinh'=>$MaHinh,
                        'idLH'=>$idLH,
                        'TenHinh_vi'=>$name,
                        'TenHinh_en'=>$name,
                        'UrlHinh'=>$url,
                        'NgayTao'=>$now,
                        'NgayCapNhat'=>$now
                        );
                    
                    //print_r($data);
                    $this->set->kmt_insert_data('kmt_hinhanh', $data);
                    $this->resize($file,$height);
                }else{
                    unlink($file);
                }
               $i++; 
            }
            
            redirect('admin_img/img_in_album/'.$MaHinh.'/success');
        }else{
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error_ud', $error);
            redirect('admin_img/add_list_img_album/'.$MaHinh);
        }
    }
    
    function resize($file,$height){
        $config['image_library'] = 'gd2';
        $config['source_image']	= $file;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = TRUE;
        $config['master_dim'] = 'height';
        $config['quality'] = '90%';
        $config['width'] = '1';
        $config['height'] = $height;
        
        $this->load->library('image_lib');
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();
    }
}
