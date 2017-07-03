<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_cart extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('get_model', 'get');
        $this->load->model('set_model', 'set');
        $this->load->library("kmt_authentication");
        $this->kmt_authentication->check_login_admin();
    }

    public function index($TrangThai){  

        $data['TrangThai'] = $TrangThai;
        $con_cart = array('TrangThai' => $TrangThai);
        $order_cart = array('idDH' => 'DESC');
        $config['base_url'] = site_url('admin_cart/index/'.$TrangThai.'/');
        $config['total_rows'] = $this->get->kmt_get_count('kmt_donhang',$con_cart);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['cur_tag_open'] = '<a class="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);
        //$file_real = '/home/www/diagnosticsoftcom/wwwdiagnosticsoft/' . 'upload/temp/[NetDiagnostic_V1.0.0]_[RL1Year]_06-08-2017.zip';
        //unlink($file_real); 

        $data['order'] = $this->get->kmt_get_where('kmt_donhang', $con_cart, $order_cart,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();
        $data['count_row'] = count($data['order']);
        $data['main_content'] = 'admin_page/kmt_cart/cart';
        $this->load->view('back_end_template/content', $data);
	}
    
    public function cart_details($idDH)
	{  
	    $con = array('idDH'=>$idDH);
        $cart_details = $this->get->kmt_get_where('kmt_donhang',$con);
        foreach($cart_details as $value){
            $data['MaDH'] = $value->MaDH;
            $data['MaSP'] = $value->MaSP;
            $data['idIT'] = $value->idIT;
            $data['idU'] = $value->idU;
            $data['idDH'] = $value->idDH;
            $data['HoTen'] = $value->HoTen;
            $data['Email'] = $value->Email;
            $data['SDT'] = $value->SDT;
            $data['DiaChi'] = $value->DiaChi;
            $data['TongTien'] = $value->TongTien;
            $data['File_img'] = $value->File_img;
            $data['File_name'] = $value->File_name;
            $data['HinhThucThanhToan'] = $value->HinhThucThanhToan;
            $data['idPL'] = $value->idPL;
            $data['Gia'] = $value->Gia;
            $data['Code'] = $value->Code;
            $data['GhiChu'] = $value->GhiChu;
            $data['TrangThai'] = $value->TrangThai;
        }
        $data['idDH'] = $idDH;
	    $data['main_content'] = 'admin_page/kmt_cart/cart_details';
        $this->load->view('back_end_template/content', $data);
	}
    
    public function confirm_order($idDH,$TrangThai){
        $now = date("Y-m-d G:i:s");
        $data = array('TrangThai'=>1,'NgayCapNhat'=>$now);
        $rs = $this->set->kmt_update_data('kmt_donhang',$data,array('idDH'=>$idDH));
        if($rs){
           redirect('admin_cart/index/'.$TrangThai.'/success');
        }else{
           redirect('admin_cart/index/'.$TrangThai.'/fail'); 
        }
    }
    
}
