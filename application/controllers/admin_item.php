<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_item extends CI_Controller {
    
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
    
    function item(){
        $order = array('STT' => 'ASC', 'idIT' => 'DESC');
        
        $config['base_url'] = site_url('admin_item/item');
        $config['total_rows'] = $this->get->kmt_get_count('kmt_item', null);
        $config['per_page'] = 20;
        $config['uri_segment'] = 3;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['item'] = $this->get->kmt_get_where('kmt_item', null, $order,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();
        
        $order_mn_1 = array('STT'=>'ASC','idMN_1'=>'DESC');
        $data['menu_1'] = $this->get->kmt_get_where('kmt_menu_1',null,$order_mn_1);
        
        $order_mn_2 = array('STT'=>'ASC','idMN_2'=>'DESC');
        $data['menu_2'] = $this->get->kmt_get_where('kmt_menu_2',null,$order_mn_2);
        
        $data['count_row'] = count($data['item']);
        $data['main_content'] = 'admin_page/kmt_item/item';
        $this->load->view('back_end_template/content', $data);
    }
    
    function item_note(){
        $con = array('TieuBieu'=>1);
        $order = array('STT' => 'ASC', 'idIT' => 'DESC');
        
        $config['base_url'] = site_url('admin_item/item');
        $config['total_rows'] = $this->get->kmt_get_count('kmt_item', $con);
        $config['per_page'] = 20;
        $config['uri_segment'] = 3;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['item'] = $this->get->kmt_get_where('kmt_item', $con, $order,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();
        
        $order_mn_1 = array('STT'=>'ASC','idMN_1'=>'DESC');
        $data['menu_1'] = $this->get->kmt_get_where('kmt_menu_1',null,$order_mn_1);
        
        $order_mn_2 = array('STT'=>'ASC','idMN_2'=>'DESC');
        $data['menu_2'] = $this->get->kmt_get_where('kmt_menu_2',null,$order_mn_2);
        
        $data['count_row'] = count($data['item']);
        $data['main_content'] = 'admin_page/kmt_item/item_note';
        $this->load->view('back_end_template/content', $data);
    }
    
    function item_hot(){
        $con = array('BanChay'=>1);
        $order = array('STT' => 'ASC', 'idIT' => 'DESC');
        
        $config['base_url'] = site_url('admin_item/item');
        $config['total_rows'] = $this->get->kmt_get_count('kmt_item', $con);
        $config['per_page'] = 20;
        $config['uri_segment'] = 3;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['item'] = $this->get->kmt_get_where('kmt_item', $con, $order,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();
        
        $order_mn_1 = array('STT'=>'ASC','idMN_1'=>'DESC');
        $data['menu_1'] = $this->get->kmt_get_where('kmt_menu_1',null,$order_mn_1);
        
        $order_mn_2 = array('STT'=>'ASC','idMN_2'=>'DESC');
        $data['menu_2'] = $this->get->kmt_get_where('kmt_menu_2',null,$order_mn_2);
        
        $data['count_row'] = count($data['item']);
        $data['main_content'] = 'admin_page/kmt_item/item_hot';
        $this->load->view('back_end_template/content', $data);
    }
    
    function item_filter($idMN_1,$idMN_2=0,$idMN_3=0){
        
        if($idMN_1==0 && $idMN_2==0 && $idMN_3==0){
            redirect('admin_item/item');
        }else{
            $con = array('idMN_1'=>$idMN_1,'idMN_2'=>$idMN_2,'idMN_3'=>$idMN_3);
            foreach($con as $key=>$value){
                if($value==0){
                     unset($con[$key]);
                }
            }
        }

        $order = array('STT' => 'ASC', 'idIT' => 'DESC');
        
        $config['base_url'] = site_url('admin_item/item_filter/'.$idMN_1.'/'.$idMN_2.'/'.$idMN_3);
        $config['total_rows'] = $this->get->kmt_get_count('kmt_item', $con);
        $config['per_page'] = 20;
        $config['uri_segment'] = 6;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['item'] = $this->get->kmt_get_where('kmt_item', $con, $order,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();
        
        $order_mn_1 = array('STT'=>'ASC','idMN_1'=>'DESC');
        $data['menu_1'] = $this->get->kmt_get_where('kmt_menu_1',null,$order_mn_1);
        
        $order_mn_2 = array('STT'=>'ASC','idMN_2'=>'DESC');
        $data['menu_2'] = $this->get->kmt_get_where('kmt_menu_2',null,$order_mn_2);
        
        $data['count_row'] = count($data['item']);
        $data['main_content'] = 'admin_page/kmt_item/item_filter';
        $this->load->view('back_end_template/content', $data);
    }
    
    function item_search(){
        $keyword_temp = $this->input->post('keyword');
        if($keyword_temp==null){
            if($this->session->userdata('keyword')!== FALSE){
                $keyword = $this->session->userdata('keyword');
            }else{
                redirect('admin_item/item'); 
            }
        }else{
            $keyword = $keyword_temp;
            $this->session->unset_userdata(array('keyword'=>''));
            $this->session->set_userdata(array('keyword'=>$keyword_temp));
        }

        $list_col = array('kmt_item.Ten_vi' => $keyword, 
                           'kmt_item.Ten_en' => $keyword,
                           'kmt_item.MaSo' => $keyword
                           ); 
        
        $config['base_url'] = site_url('admin_item/item_search');
        $config['total_rows'] = $this->get->kmt_get_count_search('kmt_item',$list_col);
        $config['per_page'] = 20;
        $config['uri_segment'] = 3;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['item'] = $this->get->kmt_get_search('kmt_item',$list_col,$config['per_page'], $this->uri->segment($config['uri_segment'])); 
        $data['link'] = $this->pagination->create_links();

        $data['count_row'] = count($data['item']);
        $data['main_content'] = 'admin_page/kmt_item/item_search';
        $this->load->view('back_end_template/content', $data);
    }
    
    function add_item($stt=null){
        $data['stt'] = $stt;
        $order_mn_1 = array('STT'=>'ASC','idMN_1'=>'DESC');
        $data['menu_1'] = $this->get->kmt_get_where('kmt_menu_1',null,$order_mn_1);
        
        $order_mn_2 = array('STT'=>'ASC','idMN_2'=>'DESC');
        $data['menu_2'] = $this->get->kmt_get_where('kmt_menu_2',null,$order_mn_2);
        
        $data['main_content'] = 'admin_page/kmt_item/add_item';
        $this->load->view('back_end_template/content', $data);
    }
    
    function item_copy(){
        $list_id = $this->input->post('id_check');
        $num_array = count($list_id);
        if($list_id){
            $k=1;
            for($i=1;$i<=$num_array;$i++){
                $id = $list_id[$i-1];
                $item = $this->get->kmt_get_where('kmt_item',array('idIT'=>$id));
                foreach($item as $value){
                   $idMN_1 = $value->idMN_1;
                   $idMN_2 = $value->idMN_2;
                   $idMN_3 = $value->idMN_3;
                   $Ten_vi = $value->Ten_vi.' - copy';
                   $Ten_en = $value->Ten_en.' - copy';
                   $MaSo = $value->MaSo;
                   $DonGia = $value->DonGia;
                   $DonGiaKM = $value->DonGiaKM;
                   $MoTa_vi = $value->MoTa_vi;
                   $MoTa_en = $value->MoTa_en;
                   $TomTat_vi = $value->TomTat_vi;
                   $TomTat_en = $value->TomTat_en;
                   $Tag_vi = $value->Tag_vi;
                   $Tag_en = $value->Tag_en;
                   //$UrlHinh = $this->get->kmt_get_col_where('kmt_hinhanh','UrlHinh',array('MaHinh'=>$value->MaHinh,'TieuBieu'=>1)); 
                   $List_img = $this->get->kmt_get_where('kmt_hinhanh',array('MaHinh'=>$value->MaHinh)); 
                   $List_video = $this->get->kmt_get_where('kmt_video',array('MaHinh'=>$value->MaHinh)); 
                   
                }
                
                $MaHinh = 'IT_'.time().$k;
                $now = date("Y-m-d G:i:s");
                
                $data = array(
                    'MaHinh' => $MaHinh,
                    'idMN_1' => $idMN_1,
                    'idMN_2' => $idMN_2,
                    'idMN_3' => $idMN_3,
                    'Ten_vi' => $Ten_vi,
                    'Ten_en' => $Ten_en,
                    'MaSo' => $MaSo,
                    'DonGia' => $DonGia,
                    'DonGiaKM' => $DonGiaKM,
                    'TomTat_vi' => $TomTat_vi,
                    'TomTat_en' => $TomTat_en,
                    'MoTa_vi' => $MoTa_vi,
                    'MoTa_en' => $MoTa_en,
                    'Tag_vi' => $Tag_vi,
                    'Tag_en' => $Tag_en,
                    'NgayTao' => $now,
                    'NgayCapNhat' => $now
                );
                
                $rs = $this->set->kmt_insert_data('kmt_item', $data);
                    
                foreach($List_img as $value){    
                    $data_img = array(
                        'STT' => $value->STT,
                        'idLH' => $value->idLH,
                        'TieuBieu'=>$value->TieuBieu,
                        'MaHinh'=>$MaHinh,
                        'UrlHinh' => $value->UrlHinh,
                        'NgayTao' => $now,
                        'NgayCapNhat' => $now
                    );
                
                    $this->set->kmt_insert_data('kmt_hinhanh', $data_img);
                }
                
                foreach($List_video as $value){    
                    $data_video = array(
                        'MaHinh'=>$MaHinh,
                        'STT' => $value->STT,
                        'TenV_vi' => $value->TenV_vi,
                        'TenV_en' => $value->TenV_en,
                        'MoTa_vi' => $value->MoTa_vi,
                        'MoTa_en' => $value->MoTa_en,
                        'Url_video' => $value->Url_video,
                        'NgayTao' => $now,
                        'NgayCapNhat' => $now
                    );
                
                    $this->set->kmt_insert_data('kmt_video', $data_video);
                }
                $k++;
            }  
        }
        
        redirect('admin_item/item/', 'refresh');
    }
    
    function save_item(){
        $MaHinh = 'IT_'.time();
        $idMN_1 = $this->input->post('idMN_1');
        $idMN_2 = $this->input->post('idMN_2');
        $idMN_3 = $this->input->post('idMN_3');
        $Ten_vi = $this->input->post('Ten_vi');
        $Ten_en = $this->input->post('Ten_en');
        
        
        $MaSo = $this->input->post('MaSo');
        $DonGia = $this->input->post('DonGia');
        $DonGiaKM = $this->input->post('DonGiaKM');
        $TomTat_vi = $this->input->post('TomTat_vi');
        $TomTat_en = $this->input->post('TomTat_en');
        $MoTa_vi = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $this->input->post('MoTa_vi'));
        $MoTa_en = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $this->input->post('MoTa_en'));
        
        $Tag_vi = $this->input->post('Tag_vi');
        $Tag_en = $this->input->post('Tag_en');
        $base = base_url();
        $UrlHinh_temp = $this->input->post('UrlHinh');
        $UrlHinh = str_replace($base,'',$UrlHinh_temp);
        $now = date("Y-m-d G:i:s");
        
        $Seo_title_vi = $this->input->post('Seo_title_vi');
        $Seo_title_en = $this->input->post('Seo_title_en');
        $Seo_description_vi = $this->input->post('Seo_description_vi');
        $Seo_description_en = $this->input->post('Seo_description_en');
        $Seo_keyword_vi = $this->input->post('Seo_keyword_vi');
        $Seo_keyword_en = $this->input->post('Seo_keyword_en');
        
        
        if($Ten_vi==null){
            $this->add_item('name_empty');
        }else{
            if($Ten_en==null){
                $Ten_en = $Ten_vi;
            }
            
            if($MoTa_en==null){
                $MoTa_en = $MoTa_vi;
            }
            
            if($Seo_title_vi==null){$Seo_title_vi = $Ten_vi;}
            if($Seo_title_en==null){$Seo_title_en = $Ten_en;}
            if($Seo_description_vi==null){$Seo_description_vi = $Ten_vi;}
            if($Seo_description_en==null){$Seo_description_en = $Ten_en;}
            if($Seo_keyword_vi==null){$Seo_keyword_vi = $Ten_vi;}
            if($Seo_keyword_en==null){$Seo_keyword_en = $Ten_en;}
        
            $data = array(
                'idMN_1' => $idMN_1,
                'idMN_2' => $idMN_2,
                'idMN_3' => $idMN_3,
                'MaHinh' => $MaHinh,
                'Ten_vi' => $Ten_vi,
                'Ten_en' => $Ten_en,
                'MaSo' => $MaSo,
                'DonGia' => $DonGia,
                'DonGiaKM' => $DonGiaKM,
                'TomTat_vi' => $TomTat_vi,
                'TomTat_en' => $TomTat_en,
                'MoTa_vi' => $MoTa_vi,
                'MoTa_en' => $MoTa_en,
                'Tag_vi' => $Tag_vi,
                'Tag_en' => $Tag_en,
                'Seo_title_vi' => $Seo_title_vi,
                'Seo_title_en' => $Seo_title_en,
                'Seo_description_vi' => $Seo_description_vi,
                'Seo_description_en' => $Seo_description_en,
                'Seo_keyword_vi' => $Seo_keyword_vi,
                'Seo_keyword_en' => $Seo_keyword_en,
                'NgayTao' => $now,
                'NgayCapNhat' => $now
            );
            
            $rs = $this->set->kmt_insert_data('kmt_item', $data);
            
            if ($rs) { 
                
                if ($UrlHinh == null) {
                    $UrlHinh = 'public/img/no-img.png';
                }
                    
                $data_img = array(
                    'idLH' => 11,
                    'MaHinh'=>$MaHinh,
                    'UrlHinh' => $UrlHinh,
                    'TieuBieu' =>1,
                    'NgayTao' => $now,
                    'NgayCapNhat' => $now
                );
                
                $this->set->kmt_insert_data('kmt_hinhanh', $data_img);
                
                
                redirect('admin_item/item/success');
            } else {
                redirect('admin_item/item/fail');
            }
        }
    }
    
    function edit_item($idIT,$stt=null){
        $data['stt'] = $stt;
        $data['item'] = $this->get->kmt_get_where('kmt_item', array("idIT" =>$idIT));
        
        $order_mn_1 = array('STT'=>'ASC','idMN_1'=>'DESC');
        $data['menu_1'] = $this->get->kmt_get_where('kmt_menu_1',null,$order_mn_1);
        
        $data['idMN_1_c'] = $this->get->kmt_get_col_where('kmt_item', 'idMN_1', array('idIT' =>
                $idIT));
        
        $data['idMN_2_c'] = $this->get->kmt_get_col_where('kmt_item', 'idMN_2', array('idIT' =>
                $idIT));
        
        $data['idMN_3_c'] = $this->get->kmt_get_col_where('kmt_item', 'idMN_3', array('idIT' =>
                $idIT));
        
              
        $data['main_content'] = 'admin_page/kmt_item/edit_item';
        $this->load->view('back_end_template/content', $data);
    }
    
    function update_item(){
        $MaHinh = $this->input->post('MaHinh');
        $Kmt_url = $this->input->post('Kmt_url');
        $idIT = $this->input->post('idIT');
        $idMN_1 = $this->input->post('idMN_1');
        $idMN_2 = $this->input->post('idMN_2');
        $idMN_3 = $this->input->post('idMN_3');
        $Ten_vi = $this->input->post('Ten_vi');
        $Ten_en = $this->input->post('Ten_en');
        $MaSo = $this->input->post('MaSo');
        $DonGia = $this->input->post('DonGia');
        $DonGiaKM = $this->input->post('DonGiaKM');
        $TomTat_vi = $this->input->post('TomTat_vi');
        $TomTat_en = $this->input->post('TomTat_en');
        $MoTa_vi = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $this->input->post('MoTa_vi'));
        $MoTa_en = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $this->input->post('MoTa_en'));
        
        $Tag_vi = $this->input->post('Tag_vi');
        $Tag_en = $this->input->post('Tag_en');
        $base = base_url();
        $UrlHinh_temp = $this->input->post('UrlHinh');
        $UrlHinh = str_replace($base,'',$UrlHinh_temp);
        $now = date("Y-m-d G:i:s");
        
        $Seo_title_vi = $this->input->post('Seo_title_vi');
        $Seo_title_en = $this->input->post('Seo_title_en');
        $Seo_description_vi = $this->input->post('Seo_description_vi');
        $Seo_description_en = $this->input->post('Seo_description_en');
        $Seo_keyword_vi = $this->input->post('Seo_keyword_vi');
        $Seo_keyword_en = $this->input->post('Seo_keyword_en');
        
        if($Ten_vi==null || $Ten_en==null){
            $this->edit_item($idIT,'name_empty');
        }else{
            if($Ten_en==null){
                $Ten_en = $Ten_vi;
            }
            
            if($MoTa_en==null){
                $MoTa_en = $MoTa_vi;
            }
            
            if($Seo_title_vi==null){$Seo_title_vi = $Ten_vi;}
            if($Seo_title_en==null){$Seo_title_en = $Ten_en;}
            if($Seo_description_vi==null){$Seo_description_vi = $Ten_vi;}
            if($Seo_description_en==null){$Seo_description_en = $Ten_en;}
            if($Seo_keyword_vi==null){$Seo_keyword_vi = $Ten_vi;}
            if($Seo_keyword_en==null){$Seo_keyword_en = $Ten_en;}
            
            $data = array(
                'idMN_1' => $idMN_1,
                'idMN_2' => $idMN_2,
                'idMN_3' => $idMN_3,
                'Ten_vi' => $Ten_vi,
                'Ten_en' => $Ten_en,
                'MaSo' => $MaSo,
                'DonGia' => $DonGia,
                'DonGiaKM' => $DonGiaKM,
                'TomTat_vi' => $TomTat_vi,
                'TomTat_en' => $TomTat_en,
                'MoTa_vi' => $MoTa_vi,
                'MoTa_en' => $MoTa_en,
                'Tag_vi' => $Tag_vi,
                'Tag_en' => $Tag_en,
                'Seo_title_vi' => $Seo_title_vi,
                'Seo_title_en' => $Seo_title_en,
                'Seo_description_vi' => $Seo_description_vi,
                'Seo_description_en' => $Seo_description_en,
                'Seo_keyword_vi' => $Seo_keyword_vi,
                'Seo_keyword_en' => $Seo_keyword_en,
                'NgayCapNhat' => $now
            );
            
            $rs = $this->set->kmt_update_data('kmt_item', $data, array('idIT' => $idIT));
            if ($rs) { 
                
                if ($UrlHinh == null) {
                    $UrlHinh = 'public/img/no-img.png';
                }
                    
                $data_img = array(
                    'UrlHinh' => $UrlHinh,
                    'NgayCapNhat' => $now
                );
                
                
                //$this->set->kmt_update_data('kmt_hinhanh', $data_img,array('MaHinh'=>$MaHinh));
                redirect($Kmt_url.'/success');
            } else {
                redirect($Kmt_url.'/fail');
            }
        }
    }
    
    function img_child($MaHinh){
        $con = array('MaHinh'=>$MaHinh);
        $order = array('STT'=>'ASC','idH'=>'DESC');
        
        $data['img'] = $this->get->kmt_get_where('kmt_hinhanh',$con,$order);
        
        $data['idLH'] = 11;
        $data['MaHinh'] = $MaHinh;
        $data['count_row'] = count($data['img']);
        $data['main_content'] = 'admin_page/kmt_item/img/img_child';
        $this->load->view('back_end_template/content', $data);
    }
    
    function add_img_child($idLH,$MaHinh,$stt=null)
	{  
	    $data['stt'] = $stt;
	    $data['MaHinh'] = $MaHinh;
        $data['idLH'] = $idLH;
        $data['type_img'] = $this->get->kmt_get_where('kmt_loaihinhanh',array('idLH'=>$idLH));
        $data['title_type_img'] = $this->get->kmt_get_col_where('kmt_loaihinhanh','TenLoaiHinh',array('idLH'=>$idLH));
	    $data['main_content'] = 'admin_page/kmt_item/img/add_img_child';
        $this->load->view('back_end_template/content', $data);
	}
    
    function save_img_child(){
        $idLH = $this->input->post('idLH');
        $MaHinh = $this->input->post('MaHinh');
        $TenHinh_vi = $this->input->post('TenHinh_vi');
        $TenHinh_en = $this->input->post('TenHinh_en');
        $MoTa_vi = $this->input->post('MoTa_vi');
        $MoTa_en = $this->input->post('MoTa_en');
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
           redirect('admin_item/img_child/'.$MaHinh.'/success');
        }else{
           redirect('admin_item/img_child/'.$MaHinh.'/fail'); 
        }
        
    }
    
    function edit_img_child($idH)
	{   
	    
	    $idLH = $this->get->kmt_get_col_where('kmt_hinhanh','idLH',array('idH'=>$idH));
        $con = array('idH'=>$idH);
        $data['img'] = $this->get->kmt_get_where('kmt_hinhanh',$con);
        
        $data['type_img'] = $this->get->kmt_get_where('kmt_loaihinhanh',array('idLH'=>$idLH));
        $data['title_type_img'] = $this->get->kmt_get_col_where('kmt_loaihinhanh','TenLoaiHinh',array('idLH'=>$idLH));

        $data['main_content'] = 'admin_page/kmt_item/img/edit_img_child';
        $this->load->view('back_end_template/content', $data);
	}
    
    function update_img_child(){
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
        $now = date("Y-m-d G:i:s");
        
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
               redirect('admin_item/img_child/'.$MaHinh.'/success');
        }else{
               redirect('admin_item/img_child/'.$MaHinh.'/fail'); 
        }    
    }
    
    function add_list_img_child($idLH,$MaHinh){
	    $data['idLH'] = $idLH;
        $data['MaHinh'] = $MaHinh;
        $data['title_type_img'] = $this->get->kmt_get_col_where('kmt_loaihinhanh','TenLoaiHinh',array('idLH'=>11));
	    $data['main_content'] = 'admin_page/kmt_item/img/add_list_img_child';
        $this->load->view('back_end_template/content', $data);
    }
    
    function save_list_img_child(){
        $idLH = $this->input->post('idLH'); 
        $MaHinh = $this->input->post('MaHinh'); 
        $tdn = $this->get->kmt_get_col_where('kmt_loaihinhanh','TiepDauNgu',array('idLH'=>$idLH));
        $now = date("Y-m-d G:i:s");
                      
        //$height = $this->get->kmt_get_col_where('kmt_loaihinhanh','Rong',array('idLH'=>$idLH));
        $path = './upload/files/screenshots/';
        $this->load->library('upload');
        $this->upload->initialize(array(
            "upload_path"=>$path,
            "allowed_types"=>'gif|jpg|png',
            "max_size"=>'4096'
        ));
            
        if($this->upload->do_multi_upload("myfile")){
            $list_file = $this->upload->get_multi_upload_data();
            foreach($list_file as $value){
                $file =  $value['full_path'];
                $url = 'upload/files/screenshots/'.$value['file_name'];

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
                    //$this->resize($file,$height);
                }else{
                    unlink($file);
                }
            }
            
            redirect('admin_item/img_child/'.$MaHinh.'/success');
        }else{
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error_ud', $error);
            redirect('admin_item/add_list_img_child/'.$idLH.'/'.$MaHinh);
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
    
    function list_prices($idIT){
        $data['idIT'] = $idIT;
        $con = array('idIT'=>$idIT);
        $order = array('DonGia' => 'ASC');
        $data['list_prices'] = $this->get->kmt_get_where('kmt_list_prices', $con, $order);
        
        $data['count_row'] = count($data['list_prices']);
        $data['main_content'] = 'admin_page/kmt_item/prices/list_prices';
        $this->load->view('back_end_template/content', $data);
    }
    
    function add_list_prices($idIT){
        $data['idIT'] = $idIT;
        $data['main_content'] = 'admin_page/kmt_item/prices/add_list_prices';
        $this->load->view('back_end_template/content', $data);
    }
    
    function save_list_prices(){
        $idIT = $this->input->post('idIT');
        $MaSo = $this->input->post('MaSo');
        $DonGia = $this->input->post('DonGia');
        $ThoiGian = $this->input->post('ThoiGian');
        $now = date("Y-m-d G:i:s");
        
            $data = array(
                'idIT' => $idIT,
                'MaSo' => $MaSo,
                'DonGia' => $DonGia,
                'ThoiGian' => $ThoiGian,
                'NgayTao' => $now,
                'NgayCapNhat' => $now
            );
            
        $rs = $this->set->kmt_insert_data('kmt_list_prices', $data);
            
        if($rs){ 
           redirect('admin_item/list_prices/'.$idIT.'/success');
        }else{
           redirect('admin_item/list_prices/'.$idIT.'/fail');
        }
    }
    
    function edit_list_prices($idPL){
        $data['list_prices'] = $this->get->kmt_get_where('kmt_list_prices', array("idPL" =>$idPL));
        
        $data['main_content'] = 'admin_page/kmt_item/prices/edit_list_prices';
        $this->load->view('back_end_template/content', $data);
    }
    
    function update_list_prices(){
        $idIT = $this->input->post('idIT');
        $idPL = $this->input->post('idPL');
        $MaSo = $this->input->post('MaSo');
        $DonGia = $this->input->post('DonGia');
        $ThoiGian = $this->input->post('ThoiGian');
        $now = date("Y-m-d G:i:s");
        
            $data = array(
                'MaSo' => $MaSo,
                'DonGia' => $DonGia,
                'ThoiGian' => $ThoiGian,
                'NgayCapNhat' => $now
            );
            
        $rs = $this->set->kmt_update_data('kmt_list_prices', $data, array('idPL' => $idPL));
        if($rs){ 
           redirect('admin_item/list_prices/'.$idIT.'/success');
        }else{
           redirect('admin_item/list_prices/'.$idIT.'/fail');
        }
        
    }
}
