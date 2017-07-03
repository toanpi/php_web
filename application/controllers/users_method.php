<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_method extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('get_model', 'get');
        $this->load->model('set_model', 'set');
        $this->load->model('check_model', 'check');
    }
    
    function index(){}
    
    function admin(){
        $con = array('idN'=>1,'TrangThai'=>1);
        $data['users'] = $this->get->kmt_get_where('kmt_nguoidung',$con);
        $data['main_content'] = 'admin_page/kmt_users/admin';
        $this->load->view('back_end_template/content', $data);
    }
    
    function update_admin(){
        $idU = $this->input->post('idU');
        $HoTen = $this->input->post('HoTen');
        $Email = $this->input->post('Email');
        $MatKhau = $this->input->post('MatKhau');
        $MatKhauCu = $this->input->post('MatKhauCu');
        $Check_pass = $this->check->kmt_checkLogin('admin',$MatKhauCu,1,1);
        
        if($Check_pass){
            if($MatKhau==null){
                $data = array(
                    'HoTen' => $HoTen,
                    'Email' => $Email
                );
            }else{
                $data = array(
                    'HoTen' => $HoTen,
                    'Email' => $Email,
                    'MatKhau' => sha1($MatKhau)
                );
            }
            
            $rs = $this->set->kmt_update_data('kmt_nguoidung', $data, array('idU' => $idU));
            if($rs){
                redirect('users_method/admin/success');
            }else{
                redirect('users_method/admin/fail');
            }
        }else{
           redirect('users_method/admin/fail'); 
        }

    }
    
    function member($TrangThai){
        $con = array('idN'=>2,'TrangThai'=>$TrangThai);
        $order = array('idU'=>'DESC');
        $config['base_url'] = site_url('users_method/member/'.$TrangThai);
        $config['total_rows'] = $this->get->kmt_get_count('kmt_nguoidung', $con);
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['cur_tag_open'] = '<a id="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['member'] = $this->get->kmt_get_where('kmt_nguoidung', $con, $order,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();

        $data['count_row'] = count($data['member']);
        
        $data['main_content'] = 'admin_page/kmt_users/member';
        $this->load->view('back_end_template/content', $data);
    }
    
    function add_member(){
        $data['main_content'] = 'admin_page/kmt_users/add_member';
        $this->load->view('back_end_template/content', $data);
    }
    
    function save_member(){
        $Code = 'MDL_'.time();
        $email = $this->input->post('email');
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');
        $now = date("Y-m-d h:i:s");
        
        $data = array(
                'idN '=>2,
                'MaKH'=>$Code,
                'MatKhau'=>sha1('123456'),
                'HoTen'=>$name,
                'Email'=>$email,
                'SDT'=>$phone,
                'DiaChi'=>$address,
                'NgayTao'=>$now,
                'NgayCapNhat'=>$now
                );
             
            
        $rs = $this->set->kmt_insert_data('kmt_nguoidung', $data);
        if($rs){
            redirect('users_method/member/success');
        }else{
            redirect('users_method/member/fail');
        }
    }
    
    function edit_member($idU){
        $con = array('idN'=>2,'idU'=>$idU);
        $data['member'] = $this->get->kmt_get_where('kmt_nguoidung', $con);
        $data['main_content'] = 'admin_page/kmt_users/edit_member';
        $this->load->view('back_end_template/content', $data);
    }
    
    function update_member(){
        $idU = $this->input->post('idU');
        $Name = $this->input->post('name');
        $Pass = $this->input->post('pass');
        $Phone = $this->input->post('phone');
        $Address = $this->input->post('address');
        $now = date("Y-m-d h:i:s");
        $TrangThai = $this->get->kmt_get_col_where('kmt_nguoidung','TrangThai',array('idU'=>$idU));
        
        if($Pass!=null){
            $data = array(
                'MatKhau'=>sha1($Pass),
                'HoTen'=>$Name,
                'SDT'=>$Phone,
                'DiaChi'=>$Address,
                'NgayCapNhat'=>$now
                );    
        }else{
            $data = array(
                'HoTen'=>$Name,
                'SDT'=>$Phone,
                'DiaChi'=>$Address,
                'NgayCapNhat'=>$now
            );    
        }

        $rs = $this->set->kmt_update_data('kmt_nguoidung', $data, array('idU' => $idU));
        if($rs){
            redirect('users_method/member/'.$TrangThai.'/success');
        }else{
            redirect('users_method/member/'.$TrangThai.'/fail');
        }
    }
    
    function my_bag($MaDL){
        $data['HoTen'] = $this->get->kmt_get_col_where('kmt_nguoidung','HoTen',array('MaKH'=>$MaDL));
        $data['MaKH'] = $this->get->kmt_get_col_where('kmt_nguoidung','MaKH',array('MaKH'=>$MaDL));
        $idU = $this->get->kmt_get_col_where('kmt_nguoidung','idU',array('MaKH'=>$MaDL));
        $con_cart = array('idU' => $idU);
        $order_cart = array('idDH' => 'DESC');
        $config['base_url'] = site_url('users_method/my_bag/'.$MaDL.'/');
        $config['total_rows'] = $this->get->kmt_get_count('kmt_donhang',$con_cart);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['cur_tag_open'] = '<a class="current_page" href="">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $data['order'] = $this->get->kmt_get_where('kmt_donhang', $con_cart, $order_cart,
            array($config['per_page'], $this->uri->segment($config['uri_segment'])));
        $data['link'] = $this->pagination->create_links();
        $data['count_row'] = count($data['order']);
        $data['main_content'] = 'admin_page/kmt_users/my_bag';
        $this->load->view('back_end_template/content', $data);
    }

}
