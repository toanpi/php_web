<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_seo extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('get_model', 'get');
        $this->load->model('set_model', 'set');
    }
    
    function index()
	{
	    $order = array('idK' => 'DESC');
        $data['seo'] = $this->get->kmt_get_where('kmt_tukhoa');
        $data['count_row'] = count($data['seo']);
	    $data['main_content'] = 'admin_page/kmt_seo/seo';
        $this->load->view('back_end_template/content', $data);
	}
    
    public function edit_seo($idK){
        $data['main_content'] = 'admin_page/kmt_seo/edit_seo';
        $con_s = array('idK'=>$idK);
        $data['seo'] = $this->get->kmt_get_where('kmt_tukhoa',$con_s);
        $this->load->view('back_end_template/content', $data);
    }
    
    public function update_seo(){
        $now = date("Y-m-d G:i:s");
        $idK= $this->input->post('idK');
        $TieuDe_vi = $this->input->post('TieuDe_vi');
        $TieuDe_en = $this->input->post('TieuDe_en');
        $NoiDung_vi = $this->input->post('NoiDung_vi');
        $NoiDung_en = $this->input->post('NoiDung_en');
        $TuKhoa_vi = $this->input->post('TuKhoa_vi');
        $TuKhoa_en = $this->input->post('TuKhoa_en');
        
        $data = array(
                'TieuDe_vi' => $TieuDe_vi,
                'TieuDe_en' => $TieuDe_en,
                'NoiDung_vi' => $NoiDung_vi,
                'NoiDung_en' => $NoiDung_en,
                'TuKhoa_vi' => $TuKhoa_vi,
                'TuKhoa_en' => $TuKhoa_en,
                'NgayCapNhat' => $now
        );
        $rs = $this->set->kmt_update_data('kmt_tukhoa',$data,array('idK'=>$idK));
        
        if($rs){
            redirect("admin_seo/index/success");
        }else{
            redirect("admin_seo/index/fail");
        }
    }
    
}
