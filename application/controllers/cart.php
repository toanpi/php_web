<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {
    
    public $menu;
    public $address;
    public $social;
    public $useronline;
    public $visitor;
    public $lan=null;
    
    function __construct(){
        parent::__construct();
        
        $this->lan = $this->kmt_load->check_lan();
        $this->menu = $this->kmt_load->get_menu(array('TrangThai'=>1));
        $this->support =  $this->kmt_load->get_support(array('TieuBieu'=>1,'TrangThai'=>1),array(1,0));
        $this->address =  $this->kmt_load->get_address();
        $this->social =  $this->kmt_load->get_social();
        
        $this->useronline =  $this->kmt_load->get_useronline();
        $this->visitor =  $this->kmt_load->get_visitor();
    }
     
	public function index($st=null){
	    $data['st'] = $st;
	    $this->kmt_seo->get_seo(8,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = base_url();
        $data['page'] = $this->kmt_seo->page;
        
        $possible = '23456788bcdfghjkmnpqrstvwxyz';
        $code = '';
        $i = 0;
        while ($i < 6) { 
        $code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
        $i++;
        }
        $randomkey=$code;
        $cap =  mb_convert_case($randomkey, MB_CASE_UPPER, "UTF-8");
        $data['cap'] = $cap;
        
	    $data['main_content'] = 'client_page/cart/index';    
        $this->load->view('front_end_template/content', $data);
	}
    
    function view_your_cart(){
        $this->kmt_seo->get_seo(8,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = base_url();
        $data['page'] = $this->kmt_seo->page;
        
        $kmt_madh = $this->session->userdata('kmt_madh');
        $con = array('MaDH'=>$kmt_madh);
        $cart_details = $this->get->kmt_get_where('kmt_donhang',$con);
        foreach($cart_details as $value){
            $data['MaDH'] = $value->MaDH;
            $data['idIT'] = $value->idIT;
            $data['idU'] = $value->idU;
            $data['idDH'] = $value->idDH;
            $data['HoTen'] = $value->HoTen;
            $data['Email'] = $value->Email;
            $data['SDT'] = $value->SDT;
            $data['DiaChi'] = $value->DiaChi;
            $data['TongTien'] = $value->TongTien;
            $data['SL'] = $value->SL;
            $data['GhiChu'] = $value->GhiChu;
            $data['TrangThai'] = $value->TrangThai;
        }
        $data['kmt_madh'] = $kmt_madh;
        
	    $data['main_content'] = 'client_page/cart/view_your_cart';    
        $this->load->view('front_end_template/content', $data);
    }
    
    function add_single($idIT,$idPL) {
        
        $info = $this->get->kmt_get_where('kmt_item',array('idIT'=>$idIT));
        $price = $this->get->kmt_get_col_where('kmt_list_prices','DonGia',array('idPL'=>$idPL));
        
        $MaSo = '';
        $Url = base_url();
        
        foreach($info as $value){
            $idMN_1 = $value->idMN_1;
            $MaSo = $value->MaSo;
            if($this->lan=='vi'){
                $Ten = $value->Ten_vi;
            }else{
                $Ten = $value->Ten_en;
            }
            $Url = base_url().'version/'.mb_strtolower(url_title(removesign($Ten))).'-'.$idIT;
                            
        }   
        $MaHinh = $this->get->kmt_get_col_where('kmt_menu_1','MaHinh',array('idMN_1'=>$idMN_1));
        $UrlHinh = $this->get->kmt_get_col_where('kmt_hinhanh','UrlHinh',array('MaHinh'=>$MaHinh));
        
        
        $MaSo_sess = trim($this->session->userdata('Maso'));
        $TenFile_sess = trim($this->session->userdata('file_name'));
        
        
        
		if(!isset($MaSo_sess) && $MaSo_sess == ''){
			redirect($Url);
		}
        
        if(isset($TenFile_sess) && $TenFile_sess != ''){
            foreach($this->cart->contents() as $value){
                $rowid = $value['rowid']; 
                $this->cart->update(array(
                    'rowid' => $rowid,
                    'qty' => 0
                ));   
            }
            
			$insert = array(
                'id' => $idIT,
                'idPL' => $idPL,
                'code' => $MaSo,
                'img' => $UrlHinh,
                'price' => $price,
                'file_name' => $TenFile_sess,
                'name'  => $Ten,
                'qty' => 1,
            );
            
            $this->cart->insert($insert);
            
		}else{
		   redirect($Url);
		}
        
        redirect('your-cart');
        
        
    }
    
    
    function update(){
        $rowid = $this->input->post('rowid');
        $idPL = $this->input->post('idPL');
        $price = $this->get->kmt_get_col_where('kmt_list_prices','DonGia',array('idPL'=>$idPL));
        
        $data = array(
                    'rowid' => $rowid,
                    'qty' => 1,
                    'idPL' => $idPL,
                    'price' => $price,
                );
        //print_r($data);
        $this->cart->update($data);
        redirect('your-cart');
    }

    
    function remove($rowid) {
        
        $this->cart->update(array(
            'rowid' => $rowid,
            'qty' => 0
        ));
        
        redirect('your-cart');
        
    }
    
    function remove_cart(){
        $this->cart->destroy();        
        redirect('your-cart');
    }
    
    function payment($st = null){
        $this->kmt_seo->get_seo(8,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = base_url();
        $data['page'] = $this->kmt_seo->page;
        $con_s = array('TrangThai'=>1);
        
            
        $data['st'] = $st;
            $possible = '23456788bcdfghjkmnpqrstvwxyz';
            $code = '';
            $i = 0;
            while ($i < 6) { 
            $code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
            $i++;
            }
            $randomkey=$code;
            $cap =  mb_convert_case($randomkey, MB_CASE_UPPER, "UTF-8");
            $data['cap'] = $cap;
            
            $data['main_content'] = 'client_page/cart/payment';
            $this->load->view('front_end_template/content', $data);
        
        
    }
    
    function payment_paypal($st = null){
        $this->kmt_seo->get_seo(8,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = base_url();
        $data['page'] = $this->kmt_seo->page;
        $con_s = array('TrangThai'=>1);
        
        $data['st'] = $st;
            $possible = '23456788bcdfghjkmnpqrstvwxyz';
            $code = '';
            $i = 0;
            while ($i < 6) { 
            $code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
            $i++;
            }
            $randomkey=$code;
            $cap =  mb_convert_case($randomkey, MB_CASE_UPPER, "UTF-8");
            $data['cap'] = $cap;
            
            $data['main_content'] = 'client_page/cart/payment_paypal';
            $this->load->view('front_end_template/content', $data);
        
        
    }
    
    function finish_cart(){
        $this->load->model('set_model', 'set');
        $TyGia = $this->kmt_load->get_tygia();
        $err = 0;
        $err_o = 0;
        
        $now = date("Y-m-d G:i:s");
        $MaDH = 'MDH_'.time();
        $idU = $this->input->post('idU');
        $HoTen = $this->input->post('name');
        $Email_order = $this->input->post('email');
        $SDT = $this->input->post('phone');
        $DiaChi = $this->input->post('add');  
        $GhiChu = $this->input->post('note');
        
        
            $file_name = '';
            $img = '';
            $code = '';
            $idIT = '';
            $Gia = '';
            $idPL = '';
            $content_product = '';
            $count = count($this->cart->contents());
            $i=1;
            foreach($this->cart->contents() as $value){
                $file_name = $value['file_name'];
                $data_id = explode('-',$value['id']);
                if($i<$count){
                    $idIT .= $data_id[0].',';
                    $Gia .= $value['price'].',';
                    $idPL .= $value['idPL'].',';
                }else{
                    $idIT .= $data_id[0];
                    $Gia .= $value['price'];
                    $idPL .= $value['idPL'];
                }
                
                
                $name = $value['name'];
                $code = $value['code'];
                $img = $value['img'];
                $date = $this->get->kmt_get_col_where('kmt_list_prices','ThoiGian',array('idPL'=>$value['idPL']));
                $Gia_temp = '$'.$value['price'];
                $subtotal = '$'.$value['subtotal'];
                $total_pm = '$'.$this->cart->total();
                
                 $content_product .= '<tr>
                                    <td>'.$i.'</td>
                                    <td><img src="'.base_url($img).'" height="100px"/></td>
                                    <td>'.$name.'</td>
                                    <td>'.$code.'</td>
                                    <td>'.$date.'</td>
                                    <td>'.$Gia_temp.'</td>
                                    <td>'.$subtotal.'</td>
                                    </tr>
                                    ';
                $i++;
            }
            
            $invoice = random_string('numeric',8);
            $tieude = 'Email order confirmation from '.DOMAIN_NAME.' - Code: '.$invoice;
            
            $total = '<td colspan="7"> Total bill: $'.$this->cart->total().'</td>';
            
             $content = $this->curl($this->get_content_email());
             $content = $this->replace_content('@@code@@',$invoice,$content);
             $content = $this->replace_content('@@name@@',$HoTen,$content);
             $content = $this->replace_content('@@add@@',$DiaChi,$content);
             $content = $this->replace_content('@@phone@@',$SDT,$content);
             $content = $this->replace_content('@@note@@',$GhiChu,$content);
             $content = $this->replace_content('@@content_product@@',$content_product,$content);
             $content = $this->replace_content('@@total@@',$total,$content);
             
            $data_order= array(
                'idIT'=>$idIT,
                'Gia'=>$Gia,
                'idPL'=>$idPL,
                'idU'=>$idU,
                'MaDH'=>$MaDH,
                'MaSP'=>$code,
                'Code'=>$invoice,
                'File_img'=>$img,
                'File_name'=>$file_name,
                'HoTen'=>$HoTen,
                'Email'=>$Email_order,
                'HinhThucThanhToan'=>'Temporarily',
                'SDT'=>$SDT,
                'DiaChi'=>$DiaChi,
                'GhiChu'=>$GhiChu,
                'TongTien'=>$this->cart->total(),
                'Content_email'=>$content,
                'NgayTao'=>$now,
                'NgayCapNhat'=>$now
             );
             
             
             $this->set->kmt_insert_data('kmt_donhang',$data_order);
             
             
             $this->load->helper('send_mail_helper');
             $Email_ca = $this->get->kmt_get_col_where('kmt_system','Email_ca');
             $Email_mess = $this->get->kmt_get_col_where('kmt_system','Email_order');
             $Pass_ca = $this->get->kmt_get_col_where('kmt_system','Pass_ca');
                       
             $tieude = '[Email order confirmation from '.DOMAIN_NAME.' - Code: '.$invoice.']';
             $Email_order = $this->get->kmt_get_col_where('kmt_donhang','Email',array('Code'=>$invoice));
             $content = $this->get->kmt_get_col_where('kmt_donhang','Content_email',array('Code'=>$invoice));
             if($file_name!=''){
                copy('upload/temp/'.$file_name, 'upload/real/'.$file_name);
                $url_file = $_SERVER['DOCUMENT_ROOT'].'/diagesoft/upload/temp/'.$file_name;
                unlink($url_file);
                send_mail($Email_ca,$Pass_ca,$Email_mess,array($Email_order,$Email_mess),$tieude,$content,DOMAIN_NAME);
             }
             $this->cart->destroy();
             redirect('your-cart/0');
             //$this->do_purchase($invoice,$content); 
    }
    
    function finish_cart_paypal(){
        $this->load->model('set_model', 'set');
        
        $err = 0;
        $err_o = 0;
        
        $now = date("Y-m-d G:i:s");
        $MaDH = 'MDH_'.time();
        $idU = $this->input->post('idU');
        $HoTen = $this->input->post('name');
        $Email_order = $this->input->post('email');
        $SDT = $this->input->post('phone');
        $DiaChi = $this->input->post('add');  
        $GhiChu = $this->input->post('note');
        
            $file_name = '';
            $img = '';
            $code = '';
            $idIT = '';
            $Gia = '';
            $idPL = '';
            $content_product = '';
            $count = count($this->cart->contents());
            $i=1;
            foreach($this->cart->contents() as $value){
                $file_name = $value['file_name'];
                $data_id = explode('-',$value['id']);
                if($i<$count){
                    $idIT .= $data_id[0].',';
                    $Gia .= $value['price'].',';
                    $idPL .= $value['idPL'].',';
                }else{
                    $idIT .= $data_id[0];
                    $Gia .= $value['price'];
                    $idPL .= $value['idPL'];
                }
                
                $name = $value['name'];
                $code = $value['code'];
                $img = $value['img'];
                $date = $this->get->kmt_get_col_where('kmt_list_prices','ThoiGian',array('idPL'=>$value['idPL']));
                $Gia_temp = '$'.$value['price'];
                $subtotal = '$'.$value['subtotal'];
                $total_pm = '$'.$this->cart->total();
                
                 $content_product .= '<tr>
                                    <td>'.$i.'</td>
                                    <td><img src="'.base_url($img).'" height="100px"/></td>
                                    <td>'.$name.'</td>
                                    <td>'.$code.'</td>
                                    <td>'.$date.'</td>
                                    <td>'.$Gia_temp.'</td>
                                    <td>'.$subtotal.'</td>
                                    </tr>
                                    ';
                $i++;
            }
            
            $invoice = random_string('numeric',8);
            $tieude = 'Email order confirmation from '.DOMAIN_WEB.' - Code: '.$invoice;
            
            $total = '<td colspan="7"> Total bill: $'.$this->cart->total().'</td>';
            
             $content = $this->curl($this->get_content_email());
             $content = $this->replace_content('@@code@@',$invoice,$content);
             $content = $this->replace_content('@@name@@',$HoTen,$content);
             $content = $this->replace_content('@@add@@',$DiaChi,$content);
             $content = $this->replace_content('@@phone@@',$SDT,$content);
             $content = $this->replace_content('@@note@@',$GhiChu,$content);
             $content = $this->replace_content('@@content_product@@',$content_product,$content);
             $content = $this->replace_content('@@total@@',$total,$content);
             
            $data_order= array(
                'idIT'=>$idIT,
                'Gia'=>$Gia,
                'idPL'=>$idPL,
                'idU'=>$idU,
                'MaDH'=>$MaDH,
                'MaSP'=>$code,
                'Code'=>$invoice,
                'File_img'=>$img,
                'File_name'=>$file_name,
                'HoTen'=>$HoTen,
                'Email'=>$Email_order,
                'HinhThucThanhToan'=>'Temporarily',
                'SDT'=>$SDT,
                'DiaChi'=>$DiaChi,
                'GhiChu'=>$GhiChu,
                'TongTien'=>$this->cart->total(),
                'Content_email'=>$content,
                'NgayTao'=>$now,
                'NgayCapNhat'=>$now
             );
             
             
             $this->set->kmt_insert_data('kmt_donhang',$data_order);
             $this->do_purchase($invoice,$Ship_prices,$content); 
    }
    
    public function do_purchase($invoice,$Ship_prices,$content_email)
	{
		$config['business'] 			= 'diagnosticsoft@gmail.com';
        //$config['business'] 			= 'anhle100890-facilitator@gmail.com';
		$config['cpp_header_image'] 	= ''; //Image header url [750 pixels wide by 90 pixels high]
		$config['return'] 				= base_url().'status-payment/3';
		$config['cancel_return'] 		= base_url().'cancel-payment/'.$invoice;
		//$config['notify_url'] 			= base_url().'cart/notify_payment'; //IPN Post
        $config['notify_url'] 			= base_url().'ipn_paypal/ipn'; //IPN Post
        $config["rm"]                   = '2';
		$config['production'] 			= TRUE; //Its false by default and will use sandbox
		//$config['shipping_1'] 			= $Ship_prices;
        
        //$config['discount_rate_cart'] 	= 20; //This means 20% discount
        //$random = random_string('numeric',8);
		$config["invoice"]				=  $invoice;//The invoice id
		
		$this->load->library('paypal',$config);
		
		#$this->paypal->add(<name>,<price>,<quantity>[Default 1],<code>[Optional]);
		//$tax = $this->get->kmt_get_col_where('kmt_system','Tax');
		foreach($this->cart->contents() as $value){
            $price = round($value['price'],1);
            $name = removesign($value['name']);
            $type = $this->get->kmt_get_col_where('kmt_list_prices','ThoiGian',array('idPL'=>$value['idPL']));
            $this->paypal->add($name,$price,1,$value['code'],$type); //Third item with code  
        }
		
		$this->paypal->pay(); //Proccess the payments
        $this->cart->destroy();
	}
    
    
    public function load_page($check){
        $this->cart->destroy();
        $this->kmt_seo->get_seo(8,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = base_url().'your-basket';
        $data['page'] = $this->kmt_seo->page;
        
	    $data['check'] = $check;
       
	    $data['main_content'] = 'client_page/cart/status';
        $this->load->view('front_end_template/content', $data);
    }
    
    
    public function update_qty($invoice=null){
        
            
             $idPS = $this->get->kmt_get_col_where('kmt_donhang','idPS',array('Code'=>$invoice));
             $SL = $this->get->kmt_get_col_where('kmt_donhang','SL',array('Code'=>$invoice));
                            
             $list_idPS = explode(',',$idPS);
             $list_SL = explode(',',$SL);
                                             
              for($k=0;$k<count($list_idPS);$k++){ 
                  $Qty = $this->get->kmt_get_col_where('kmt_ps','Qty',array('idPS'=>$list_idPS[$k]));
                  $data_ud= array('Qty'=>$Qty-$list_SL[$k]);
                  $this->set->kmt_update_data('kmt_ps', $data_ud, array('idPS' => $list_idPS[$k]));
              }
            
        
        
    }
    
    
    public function cancel_payment($invoice)
	{
	    $this->kmt_seo->get_seo(8,$this->lan);
        $data['title'] = $this->kmt_seo->title;
        $data['description'] =  $this->kmt_seo->description;
        $data['keywords'] = $this->kmt_seo->keywords;
        $data['image_page'] =  base_url().'public/img/logo.png';
        $data['url_page'] = base_url().'your-basket';
        $data['page'] = $this->kmt_seo->page;
        $this->load->model('set_model', 'set');
        $data_ud= array('HinhThucThanhToan'=>'Cancel');
        $this->set->kmt_update_data('kmt_donhang', $data_ud, array('Code' => $invoice));
        
	   $data['check'] = 0;
	   $data['main_content'] = 'client_page/cart/status';
       $this->load->view('front_end_template/content', $data);
	}
    
    function curl($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
     }
    
    function replace_content($string,$string_replace,$content){
         $new_content = str_replace($string,$string_replace,$content);
         return $new_content;
    }
    
    function get_content_email(){
        //$url = '/home/www/candeblanccom/wwwcandeblanc/public/email_template/email_temp_en.html';
        $url = base_url().'public/email_template/email_temp_en.html';
        return $url;
    }
    
}
