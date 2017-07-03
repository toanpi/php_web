<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_articles extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('get_model', 'get');
        $this->load->model('set_model', 'set');
        $this->load->library("kmt_authentication");
        $this->kmt_authentication->check_login_admin();
    }
    
    function index(){
	    $this->articles_group(3);
	}
    
    function articles_group($idP){
        
        $data['idP'] = $idP;
        $con = array('idP'=>$idP);
        $order = array('STT'=>'ASC','idNBV'=>'DESC');
        
        $config['base_url'] = site_url('admin_articles/articles_group/'.$idP.'/');
        $config['total_rows'] = $this->get->kmt_get_count('kmt_nhombaiviet', $con);
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['articles_group'] = $this->get->kmt_get_where('kmt_nhombaiviet', $con, $order,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();

        $data['count_row'] = count($data['articles_group']);
        
        $data['main_content'] = 'admin_page/kmt_articles/articles_group';
        $this->load->view('back_end_template/content', $data);
    }
    
    function add_articles_group($idP,$stt=null){
        $data['stt'] = $stt;
        $data['idP'] = $idP;
        $data['main_content'] = 'admin_page/kmt_articles/add_articles_group';
        $this->load->view('back_end_template/content', $data);
    }
    
    function save_articles_group(){
        
        $MaHinh = 'NBV_'.time();
        $idP = $this->input->post('idP');
        $TenNhom_vi = $this->input->post('TenNhom_vi');
        $TenNhom_en = $this->input->post('TenNhom_en');
        $TomTat_vi = $this->input->post('TomTat_vi');
        $TomTat_en = $this->input->post('TomTat_en');
        $NoiDung_vi = $this->input->post('NoiDung_vi');
        $NoiDung_en = $this->input->post('NoiDung_en');
        $base = base_url();
        $UrlHinh_temp = $this->input->post('UrlHinh');
        $UrlHinh = str_replace($base,'',$UrlHinh_temp);
        $now = date("Y-m-d G:i:s");
        
        if($TenNhom_vi==null){
            $this->add_articles_group('name_empty');
        }else{
            if($TenNhom_en==null){
                $TenNhom_en = $TenNhom_vi;
            }
            $data = array(
                'MaHinh' => $MaHinh,
                'TenNhom_vi' => $TenNhom_vi,
                'TenNhom_en' => $TenNhom_en,
                'TomTat_vi' => $TomTat_vi,
                'TomTat_en' => $TomTat_en,
                'NoiDung_vi' => $NoiDung_vi,
                'NoiDung_en' => $NoiDung_en,
                'idP' => $idP,
                'NgayTao' => $now,
                'NgayCapNhat' => $now
            );
            
            $rs = $this->set->kmt_insert_data('kmt_nhombaiviet', $data);
            
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
                redirect('admin_articles/articles_group/'.$idP.'/success');
            } else {
                redirect('admin_articles/articles_group/'.$idP.'/fail');
            }
        }
    }
    
    function edit_articles_group($idNBV,$stt=null){
        $data['stt'] = $stt;
        
        $data['idP'] = $this->get->kmt_get_col_where('kmt_nhombaiviet','idP',array('idNBV'=>$idNBV));
        
        $data['articles_group'] = $this->get->kmt_get_where('kmt_nhombaiviet', array("idNBV" =>$idNBV));
        $data['main_content'] = 'admin_page/kmt_articles/edit_articles_group';
        $this->load->view('back_end_template/content', $data);
    }
    
    function update_articles_group(){
        
        $idNBV = $this->input->post('idNBV');
        $MaHinh = $this->input->post('MaHinh');
        $idP = $this->input->post('idP');
        $TenNhom_vi = $this->input->post('TenNhom_vi');
        $TenNhom_en = $this->input->post('TenNhom_en');
        $TomTat_vi = $this->input->post('TomTat_vi');
        $TomTat_en = $this->input->post('TomTat_en');
        $NoiDung_vi = $this->input->post('NoiDung_vi');
        $NoiDung_en = $this->input->post('NoiDung_en');
        $base = base_url();
        $UrlHinh_temp = $this->input->post('UrlHinh');
        $UrlHinh = str_replace($base,'',$UrlHinh_temp);
        $now = date("Y-m-d G:i:s");
        
        if($TenNhom_vi==null){
            $this->edit_articles_group($idNBV,'name_empty');
        }else{
            if($TenNhom_en==null){
                $TenNhom_en = $TenNhom_vi;
            }
            $data = array(
                'TenNhom_vi' => $TenNhom_vi,
                'TenNhom_en' => $TenNhom_en,
                'TomTat_vi' => $TomTat_vi,
                'TomTat_en' => $TomTat_en,
                'NoiDung_vi' => $NoiDung_vi,
                'NoiDung_en' => $NoiDung_en,
                'idP' => $idP,
                'NgayCapNhat' => $now
            );
            
            $rs = $this->set->kmt_update_data('kmt_nhombaiviet', $data, array('idNBV' => $idNBV));
            
            if ($rs) { 
                
                if ($UrlHinh == null) {
                    $UrlHinh = 'public/img/no-img.png';
                }
                    
                $data_img = array(
                    'UrlHinh' => $UrlHinh,
                    'NgayCapNhat' => $now
                );
                
                 $this->set->kmt_update_data('kmt_hinhanh', $data_img,array('MaHinh'=>$MaHinh));
                redirect('admin_articles/articles_group/success');
            } else {
                redirect('admin_articles/articles_group/fail');
            }
        }
    }
    
    function articles($idLBV,$temp=null){
        $data['idLBV'] = $idLBV;
        $data['idNBV_f'] = 0;
        
        $con_cn = array('idLBV' => $idLBV,'idBV_p'=>0);
        $order_cn = array('idNBV'=>'ASC','idMN_1'=>'ASC','STT' => 'ASC', 'idBV' => 'DESC');
        
        $config['base_url'] = site_url('admin_articles/articles/'.$idLBV.'/');
        $config['total_rows'] = $this->get->kmt_get_count('kmt_baiviet', $con_cn);
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['articles'] = $this->get->kmt_get_where('kmt_baiviet', $con_cn, $order_cn,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();

        $order = array('STT' => 'ASC', 'idNBV' => 'DESC');
        $data['articles_group'] = $this->get->kmt_get_where('kmt_nhombaiviet', null, $order);
        
        $data['type_article'] = $this->get->kmt_get_where('kmt_loaibaiviet',array('idLBV'=>$idLBV));
        $data['title_type_articles'] = $this->get->kmt_get_col_where('kmt_loaibaiviet','TenLoai',array('idLBV'=>$idLBV));
        
        $data['count_row'] = count($data['articles']);
        $data['main_content'] = 'admin_page/kmt_articles/articles';
        $this->load->view('back_end_template/content', $data);
    }
    
    function articles_filter($idNBV,$idLBV){
        $data['idNBV_f'] = $idNBV;
        $data['idLBV'] = $idLBV;
        
        
        $con_cn = array('idLBV' => $idLBV,'idNBV'=>$idNBV);
        $order_cn = array('idNBV'=>'ASC','STT' => 'ASC', 'idBV' => 'DESC');
        
        $config['base_url'] = site_url('admin_articles/articles_filter/'.$idLBV.'/'.$idLBV);
        $config['total_rows'] = $this->get->kmt_get_count('kmt_baiviet', $con_cn);
        $config['per_page'] = 20;
        $config['uri_segment'] = 5;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['articles'] = $this->get->kmt_get_where('kmt_baiviet', $con_cn, $order_cn,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();

        $order = array('STT' => 'ASC', 'idNBV' => 'DESC');
        $data['articles_group'] = $this->get->kmt_get_where('kmt_nhombaiviet', null, $order);
        
        $data['type_article'] = $this->get->kmt_get_where('kmt_loaibaiviet',array('idLBV'=>$idLBV));
        $data['title_type_articles'] = $this->get->kmt_get_col_where('kmt_loaibaiviet','TenLoai',array('idLBV'=>$idLBV));
        
        $data['count_row'] = count($data['articles']);
        $data['main_content'] = 'admin_page/kmt_articles/articles_filter';
        $this->load->view('back_end_template/content', $data);
    }
    
    
    function articles_search(){
        $idLBV_temp = $this->input->post('idLBV');
        $keyword_temp = $this->input->post('keyword'); 
        
        if($keyword_temp==null){
            if($this->session->userdata('keyword')!== FALSE){
                $keyword = $this->session->userdata('keyword');
                $idLBV = $this->session->userdata('idNBV');
            }else{
                redirect('admin_articles/articles_search'); 
            }
        }else{
            $keyword = $keyword_temp;
            $idLBV = $idLBV_temp;
            $this->session->unset_userdata(array('keyword'=>''));
            $this->session->set_userdata(array('keyword'=>$keyword_temp));
            $this->session->unset_userdata(array('idNBV'=>''));
            $this->session->set_userdata(array('idNBV'=>$idLBV_temp));
        }
        
        $data['idLBV'] = $idLBV;
        
        
        $config['base_url'] = site_url('admin_articles/articles_search');
        $config['total_rows'] = $this->get->kmt_get_count_search_articles($idLBV,$keyword);
        $config['per_page'] = 10;
        
        if($this->uri->segment(3)!=null){
            $from = $this->uri->segment(3);
        }else{
            $from = 0;
        }

        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['articles'] = $this->get->kmt_get_search_articles($idLBV,$keyword);
        
        $order = array('STT' => 'ASC', 'idNBV' => 'DESC');
        $data['articles_group'] = $this->get->kmt_get_where('kmt_nhombaiviet', null, $order);
        
        $data['type_article'] = $this->get->kmt_get_where('kmt_loaibaiviet',array('idLBV'=>$idLBV));
        $data['title_type_articles'] = $this->get->kmt_get_col_where('kmt_loaibaiviet','TenLoai',array('idLBV'=>$idLBV));
        
        $data['count_row'] = count($data['articles']);
        
        $data['main_content'] = 'admin_page/kmt_articles/articles_search';
        $this->load->view('back_end_template/content', $data);
    }
    
    function add_articles($idLBV,$stt=null){
        $data['stt'] = $stt;
        $data['idLBV'] = $idLBV;
        
        $idP = 0;
        if($idLBV==3){
            $idP = 3;
        }
        
        if($idLBV==4){
            $idP = 6;
        }

        $order = array('STT' => 'ASC', 'idNBV' => 'DESC');
        $data['articles_group'] = $this->get->kmt_get_where('kmt_nhombaiviet', array('idP'=>$idP), $order);
        
        $data['type_article'] = $this->get->kmt_get_where('kmt_loaibaiviet',array('idLBV'=>$idLBV));
        $data['title_type_articles'] = $this->get->kmt_get_col_where('kmt_loaibaiviet','TenLoai',array('idLBV'=>$idLBV));
        
        $data['main_content'] = 'admin_page/kmt_articles/add_articles';
        $this->load->view('back_end_template/content', $data);
    }
    
    function articles_copy($idLBV){
        $list_id = $this->input->post('id_check');
        $num_array = count($list_id);
        if($list_id){
            $k=1;
            for($i=1;$i<=$num_array;$i++){
                $id = $list_id[$i-1];
                $articles = $this->get->kmt_get_where('kmt_baiviet',array('idBV'=>$id));
                foreach($articles as $value){
                   $idLBV = $value->idLBV;
                   $idNBV = $value->idNBV;
                   $idMN_1 = $value->idMN_1;
                   $TieuDe_vi = $value->TieuDe_vi.' - copy';
                   $TieuDe_en = $value->TieuDe_en.' - copy';
                   $TomTat_vi = $value->TomTat_vi;
                   $TomTat_en = $value->TomTat_en;
                   $NoiDung_vi = $value->NoiDung_vi;
                   $NoiDung_en = $value->NoiDung_en;
                   $UrlHinh = $this->get->kmt_get_col_where('kmt_hinhanh','UrlHinh',array('MaHinh'=>$value->MaHinh)); 
                }
                
                $MaHinh = 'BV_'.time().$k;
                $now = date("Y-m-d G:i:s");
                
                $data = array(
                    'MaHinh' => $MaHinh,
                    'idLBV' => $idLBV,
                    'idNBV' => $idNBV,
                    'idMN_1' => $idMN_1,
                    'TieuDe_vi' => $TieuDe_vi,
                    'TieuDe_en' => $TieuDe_en,
                    'TomTat_vi' => $TomTat_vi,
                    'TomTat_en' => $TomTat_en,
                    'NoiDung_vi' => $NoiDung_vi,
                    'NoiDung_en' => $NoiDung_en,
                    'NgayTao' => $now,
                    'NgayCapNhat' => $now
                );
                
                $rs = $this->set->kmt_insert_data('kmt_baiviet', $data);
                    
                $data_img = array(
                    'idLH' => 10,
                    'MaHinh'=>$MaHinh,
                    'UrlHinh' => $UrlHinh,
                    'NgayTao' => $now,
                    'NgayCapNhat' => $now
                );
                $this->set->kmt_insert_data('kmt_hinhanh', $data_img);
                $k++;
            }  
        }
        
        redirect('admin_articles/articles/'.$idLBV, 'refresh');
    }
    
    function save_articles(){
        
        $MaHinh = 'BV_'.time();
        $idLBV = $this->input->post('idLBV');
        $idNBV = $this->input->post('idNBV');
        $TieuDe_vi = $this->input->post('TieuDe_vi');
        $TieuDe_en = $this->input->post('TieuDe_en');
        $TomTat_vi = $this->input->post('TomTat_vi');
        $TomTat_en = $this->input->post('TomTat_en');
        $NoiDung_vi = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $this->input->post('NoiDung_vi'));
        $NoiDung_en = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $this->input->post('NoiDung_en'));
        
        $Seo_title_vi = $this->input->post('Seo_title_vi');
        $Seo_title_en = $this->input->post('Seo_title_en');
        $Seo_description_vi = $this->input->post('Seo_description_vi');
        $Seo_description_en = $this->input->post('Seo_description_en');
        $Seo_keyword_vi = $this->input->post('Seo_keyword_vi');
        $Seo_keyword_en = $this->input->post('Seo_keyword_en');
        
        
        
        $base = base_url();
        $UrlHinh_temp = $this->input->post('UrlHinh');
        $UrlHinh = str_replace($base,'',$UrlHinh_temp);
        $now = date("Y-m-d G:i:s");
        
        if($TieuDe_vi==null){
            $this->add_articles($idLBV,'name_empty');
        }else{
            if($TieuDe_en==null){
                $TieuDe_en = $TieuDe_vi;
            }
            
            if($NoiDung_en==null){
                $NoiDung_en = $NoiDung_vi;
            }
            
            if($Seo_title_vi==null){$Seo_title_vi = $TieuDe_vi;}
            if($Seo_title_en==null){$Seo_title_en = $TieuDe_en;}
            if($Seo_description_vi==null){$Seo_description_vi = $TieuDe_vi;}
            if($Seo_description_en==null){$Seo_description_en = $TieuDe_en;}
            if($Seo_keyword_vi==null){$Seo_keyword_vi = $TieuDe_vi;}
            if($Seo_keyword_en==null){$Seo_keyword_en = $TieuDe_en;}
            $data = array(
                'MaHinh' => $MaHinh,
                'idLBV' => $idLBV,
                'idNBV' => $idNBV,
                'TieuDe_vi' => $TieuDe_vi,
                'TieuDe_en' => $TieuDe_en,
                'TomTat_vi' => $TomTat_vi,
                'TomTat_en' => $TomTat_en,
                'NoiDung_vi' => $NoiDung_vi,
                'NoiDung_en' => $NoiDung_en,
                'Seo_title_vi' => $Seo_title_vi,
                'Seo_title_en' => $Seo_title_en,
                'Seo_description_vi' => $Seo_description_vi,
                'Seo_description_en' => $Seo_description_en,
                'Seo_keyword_vi' => $Seo_keyword_vi,
                'Seo_keyword_en' => $Seo_keyword_en,
                'NgayTao' => $now,
                'NgayCapNhat' => $now
            );
            
            $rs = $this->set->kmt_insert_data('kmt_baiviet', $data);
            
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
                redirect('admin_articles/articles/'.$idLBV.'/success');
            } else {
                redirect('admin_articles/articles/'.$idLBV.'/fail');
            }
        }
    }
    
    function edit_articles($idBV,$stt=null){
        $data['stt'] = $stt;
        $data['articles'] = $this->get->kmt_get_where('kmt_baiviet',array('idBV'=>$idBV));
        $data['articles_group'] = $this->get->kmt_get_where('kmt_nhombaiviet');
        
        
        $idLBV = $this->get->kmt_get_col_where('kmt_baiviet','idLBV',array('idBV'=>$idBV));
        $data['type_article'] = $this->get->kmt_get_where('kmt_loaibaiviet',array('idLBV'=>$idLBV));
        $data['title_type_articles'] = $this->get->kmt_get_col_where('kmt_loaibaiviet','TenLoai',array('idLBV'=>$idLBV));
        
        $data['main_content'] = 'admin_page/kmt_articles/edit_articles';
        $this->load->view('back_end_template/content', $data);
    }
    
    function update_articles(){
        
        $MaHinh = $this->input->post('MaHinh');
        $idBV = $this->input->post('idBV');
        $idLBV = $this->input->post('idLBV');
        $idNBV = $this->input->post('idNBV');
        $TieuDe_vi = $this->input->post('TieuDe_vi');
        $TieuDe_en = $this->input->post('TieuDe_en');
        $TomTat_vi = $this->input->post('TomTat_vi');
        $TomTat_en = $this->input->post('TomTat_en');
        $NoiDung_vi = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $this->input->post('NoiDung_vi'));
        $NoiDung_en = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $this->input->post('NoiDung_en'));
        
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
        
        if($Seo_title_vi==null){$Seo_title_vi = $TieuDe_vi;}
        if($Seo_title_en==null){$Seo_title_en = $TieuDe_en;}
        if($Seo_description_vi==null){$Seo_description_vi = $TieuDe_vi;}
        if($Seo_description_en==null){$Seo_description_en = $TieuDe_en;}
        if($Seo_keyword_vi==null){$Seo_keyword_vi = $TieuDe_vi;}
        if($Seo_keyword_en==null){$Seo_keyword_en = $TieuDe_en;}
        
        if($TieuDe_vi==null){
            $this->edit_articles($idBV,'name_empty');
        }else{
            if($TieuDe_en==null){
                $TieuDe_en = $TieuDe_vi;
            }
            if($NoiDung_en==null){
                $NoiDung_en = $NoiDung_vi;
            }
            
            if($Seo_title_vi==null){$Seo_title_vi = $TieuDe_vi;}
            if($Seo_title_en==null){$Seo_title_en = $TieuDe_en;}
            if($Seo_description_vi==null){$Seo_description_vi = $TieuDe_vi;}
            if($Seo_description_en==null){$Seo_description_en = $TieuDe_en;}
            if($Seo_keyword_vi==null){$Seo_keyword_vi = $TieuDe_vi;}
            if($Seo_keyword_en==null){$Seo_keyword_en = $TieuDe_en;}
            $data = array(
                'idLBV' => $idLBV,
                'idNBV' => $idNBV,
                'TieuDe_vi' => $TieuDe_vi,
                'TieuDe_en' => $TieuDe_en,
                'TomTat_vi' => $TomTat_vi,
                'TomTat_en' => $TomTat_en,
                'NoiDung_vi' => $NoiDung_vi,
                'NoiDung_en' => $NoiDung_en,
                'Seo_title_vi' => $Seo_title_vi,
                'Seo_title_en' => $Seo_title_en,
                'Seo_description_vi' => $Seo_description_vi,
                'Seo_description_en' => $Seo_description_en,
                'Seo_keyword_vi' => $Seo_keyword_vi,
                'Seo_keyword_en' => $Seo_keyword_en,
                'NgayCapNhat' => $now
            );
            
            $rs = $this->set->kmt_update_data('kmt_baiviet', $data, array('idBV' => $idBV));
            
            if ($rs) { 
                
                if ($UrlHinh == null) {
                    $UrlHinh = 'public/img/no-img.png';
                }
                    
                $data_img = array(
                    'UrlHinh' => $UrlHinh,
                    'NgayCapNhat' => $now
                );
                
                $this->set->kmt_update_data('kmt_hinhanh', $data_img,array('MaHinh'=>$MaHinh));
                 
                redirect('admin_articles/articles/'.$idLBV.'/success');
            } else {
                redirect('admin_articles/articles/'.$idLBV.'/fail');
            }
        }
    }
    
    function calendar(){
        $order = array('idDD' => 'DESC','idLH' => 'DESC','STT' => 'ASC', 'idCL' => 'DESC');
        
        $config['base_url'] = site_url('admin_img/calendar');
        $config['total_rows'] = $this->get->kmt_get_count('kmt_calendar');
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['calendar'] = $this->get->kmt_get_where('kmt_calendar', null, $order,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();
        
        $data['count_row'] = count($data['calendar']);
        
        $order_ca = array('STT'=>'ASC','idNBV'=>'DESC');
        $data['list_class'] = $this->get->kmt_get_where('kmt_nhombaiviet',array('idP'=>3),$order_ca);
        
        $data['list_area'] = $this->get->kmt_get_where('kmt_nhombaiviet',array('idP'=>6),$order_ca);
       
        
        $data['main_content'] = 'admin_page/kmt_articles/calendar/calendar';
        $this->load->view('back_end_template/content', $data);
    }
    
    function add_calendar()
	{  
	   $order = array('STT'=>'ASC','idNBV'=>'DESC');
       $data['list_class'] = $this->get->kmt_get_where('kmt_nhombaiviet',array('idP'=>3),$order);
        
       $data['list_area'] = $this->get->kmt_get_where('kmt_nhombaiviet',array('idP'=>6),$order);
       
	   $data['main_content'] = 'admin_page/kmt_articles/calendar/add_calendar';
       $this->load->view('back_end_template/content', $data);
	}
    
    function save_calendar()
	{  
	   $MaHinh = 'CAL_'.time();
       $idLH = $this->input->post('idLH');
       $idDD = $this->input->post('idDD');
       $Ten_vi = $this->input->post('Ten_vi');
       $Ten_en = $this->input->post('Ten_en');
       $Name = $this->input->post('Name');
       
       $base = base_url();
       $UrlHinh_temp = $this->input->post('UrlHinh');
       $UrlHinh = str_replace($base,'',$UrlHinh_temp);
       $now = date("Y-m-d G:i:s");
        
        if ($UrlHinh == null) {
            $UrlHinh = 'public/img/no-img.png';
        }
        
        if($Ten_en==null){
            $Ten_en = $Ten_vi;
        }
            
        $data = array(
                'MaHinh'=>$MaHinh,
                'idLH'=>$idLH,
                'idDD'=>$idDD,
                'UrlHinh'=>$UrlHinh,
                'Ten_vi'=>$Ten_vi,
                'Ten_en'=>$Ten_en,
                'NgayTao'=>$now,
                'NgayCapNhat'=>$now
                );
             
            
        $rs = $this->set->kmt_insert_data('kmt_calendar', $data);

        if($rs){
           redirect('admin_articles/calendar/success');
        }else{
           redirect('admin_articles/calendar/fail'); 
        }
	}
    
    function edit_calendar($idCL){
        $data['calendar'] = $this->get->kmt_get_where('kmt_calendar',array('idCL'=>$idCL));
        $order = array('STT'=>'ASC','idNBV'=>'DESC');
        $data['list_class'] = $this->get->kmt_get_where('kmt_nhombaiviet',array('idP'=>3),$order);
        $data['list_area'] = $this->get->kmt_get_where('kmt_nhombaiviet',array('idP'=>6),$order);
        
        $data['main_content'] = 'admin_page/kmt_articles/calendar/edit_calendar';
        $this->load->view('back_end_template/content', $data);
    }
    
    function update_calendar()
	{  
	   $idCL = $this->input->post('idCL');
       $idLH = $this->input->post('idLH');
       $idDD = $this->input->post('idDD');
       $Ten_vi = $this->input->post('Ten_vi');
       $Ten_en = $this->input->post('Ten_en');
       $Name = $this->input->post('Name');
       
       $base = base_url();
       $UrlHinh_temp = $this->input->post('UrlHinh');
       $UrlHinh = str_replace($base,'',$UrlHinh_temp);
       $now = date("Y-m-d G:i:s");
        
        if ($UrlHinh == null) {
            $UrlHinh = 'public/img/no-img.png';
        }
        
        if($Ten_en==null){
            $Ten_en = $Ten_vi;
        }
            
        $data = array(
                'idLH'=>$idLH,
                'idDD'=>$idDD,
                'UrlHinh'=>$UrlHinh,
                'Ten_vi'=>$Ten_vi,
                'Ten_en'=>$Ten_en,
                'NgayTao'=>$now,
                'NgayCapNhat'=>$now
                );
             
            
        $rs = $this->set->kmt_update_data('kmt_calendar',$data,array('idCL'=>$idCL));

        if($rs){
           redirect('admin_articles/calendar/success');
        }else{
           redirect('admin_articles/calendar/fail'); 
        }
	}
    
    function calendar_filter($idLH,$idDD){
        $data['idLH_f'] = $idLH;
        $data['idDD_f'] = $idDD;
        
        if($idLH==0 && $idDD==0){
            redirect('admin_articles/calendar');
        }else{
           $con = array_filter(array('idLH'=>$idLH,'idDD'=>$idDD)); 
        }

        $order = array('STT' => 'ASC', 'idCL' => 'DESC');
        
        $config['base_url'] = site_url('admin_articles/calendar_filter/'.$idLH.'/'.$idDD);
        $config['total_rows'] = $this->get->kmt_get_count('kmt_calendar', $con);
        $config['per_page'] = 10;
        $config['uri_segment'] = 5;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['calendar'] = $this->get->kmt_get_where('kmt_calendar', $con, $order,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();
        
        $order_ca = array('STT'=>'ASC','idNBV'=>'DESC');
        $data['list_class'] = $this->get->kmt_get_where('kmt_nhombaiviet',array('idP'=>3),$order_ca);
        $data['list_area'] = $this->get->kmt_get_where('kmt_nhombaiviet',array('idP'=>6),$order_ca);
        $data['count_row'] = count($data['calendar']);
        
        $data['main_content'] = 'admin_page/kmt_articles/calendar/calendar_filter';
        $this->load->view('back_end_template/content', $data);
    }
    
}
