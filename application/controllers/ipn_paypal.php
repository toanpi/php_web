<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ipn_paypal extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('get_model', 'get');
        $this->load->model('set_model', 'set');
    }
    
    public function index(){}
    
    function ipn() {
        //$ipn_post_data = $this->input->post();
        
        $raw_post_data = file_get_contents('php://input');
        $raw_post_array = explode('&', $raw_post_data);
        
        $url_temp = 'https://www.paypal.com/cgi-bin/webscr?cmd=_notify-validate';
        $req = '';
        $req_cmh = '';
        $invoice = '';
        $payment_status = '';
        $myPost = array();
        
        foreach ($raw_post_array as $keyval) {
            $keyval = explode('=', $keyval);
            if (count($keyval) == 2) {
                // Since we do not want the plus in the datetime string to be encoded to a space, we manually encode it.
                //if ($keyval[0] === 'payment_date') {
                    //if (substr_count($keyval[1], '+') === 1) {
                        //$keyval[1] = str_replace('+', '%2B', $keyval[1]);
                    //}
                //}
                
                if ($keyval[0] === 'invoice') {
                    $invoice = $keyval[1];
                }
                
                if ($keyval[0] === 'payment_status') {
                    $payment_status = $keyval[1];
                }
                
                $myPost[$keyval[0]] = urldecode(stripslashes($keyval[1]));
            }
        }
        
        foreach ($myPost as $key => $value) {
            $req_cmh .= "&$key=$value";
            $value_dmh = urlencode(stripslashes($value));
            $req .= "&$key=$value_dmh";
        }
        
        $now = date("Y-m-d G:i:s");
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $data_ud_t = array('Invoice'=>$invoice,'NoiDung'=>$req,'NoiDung_cmh'=>$raw_post_data,'IP_add'=>$ip_address,'NgayTao'=>$now);
        $this->set->kmt_insert_data('kmt_ipn', $data_ud_t);
        
        $url = $url_temp.$req;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_REFERER, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close', 'User-Agent: company-name'));
        $result = curl_exec($ch);
        curl_close($ch);
                if (strcmp (trim($result), "VERIFIED") == 0) {
				    
                    if($payment_status=='Completed'){
                            
                         $data_ud= array('HinhThucThanhToan'=>'Paypal ('.$payment_status.')');
                         $this->set->kmt_update_data('kmt_donhang', $data_ud, array('Code' => $invoice));
                              
                         $this->load->helper('send_mail_helper');
                         $Email_ca = $this->get->kmt_get_col_where('kmt_system','Email_ca');
                         $Email_mess = $this->get->kmt_get_col_where('kmt_system','Email_order');
                         $Pass_ca = $this->get->kmt_get_col_where('kmt_system','Pass_ca');
                           
                         $tieude = '[Email order confirmation from '.DOMAIN_NAME.' - Code: '.$invoice.' - '.$payment_status.']';
                         $Email_order = $this->get->kmt_get_col_where('kmt_donhang','Email',array('Code'=>$invoice));
                         $content = $this->get->kmt_get_col_where('kmt_donhang','Content_email',array('Code'=>$invoice));
                         send_mail($Email_ca,$Pass_ca,$Email_mess,array($Email_order,$Email_mess),$tieude,$content,DOMAIN_NAME);
                     }    
                        
                }else{
                    $data_ud= array('HinhThucThanhToan'=>'Paypal (giao dịch chưa được chứng thực!)');
                    $this->set->kmt_update_data('kmt_donhang', $data_ud, array('Code' => $invoice));
                }
        
    }
    
    function encode(){
        $str = 'mc_gross_1=1.00&num_cart_items=1&option_name1_1=Package+type&option_selection1_1=15+days&payer_id=MZNWKZC7XBNTS&address_country_code=VN&ipn_track_id=57379ba8a2f0b&address_zip=760000&invoice=55020717&charset=UTF-8&payment_gross=1.00&address_status=confirmed&address_street=440%0D%0ABinh+Quoi&receipt_id=3379-3202-7895-4812&verify_sign=Ai1PaghZh5FmBLCDCTQpwG8jB264AvqnJTkzDjYRtnKezjkz9eWx.hnP&txn_type=cart&receiver_id=K5SRBGSNKZ8V8&payment_fee=0.34&item_number1=NetDiagnostic_V1.0.0&mc_currency=USD&transaction_subject=&custom=&protection_eligibility=Ineligible&quantity1=1&address_country=Vietnam&payer_status=unverified&first_name=HUU+PHUC&item_name1=Bkav+Home&address_name=VO+HUU+PHUC&mc_gross=1.00&payment_date=00%3A04%3A50+Jun+16%2C+2017+PDT&payment_status=Completed&business=diagnosticsoft%40gmail.com&last_name=VO&address_state=H%E1%BB%92+CH%C3%8D+MINH&txn_id=6CR357731G857344D&mc_fee=0.34&resend=true&payment_type=instant&notify_version=3.8&payer_email=vohuuphuc88%40gmail.com&receiver_email=diagnosticsoft%40gmail.com&address_city=Binh+Thanh&residence_country=VN';
        
        $raw_post_array = explode('&', $str);
        $myPost = array();
        foreach ($raw_post_array as $keyval) {
            $keyval = explode('=', $keyval);
            if (count($keyval) == 2) {
                // Since we do not want the plus in the datetime string to be encoded to a space, we manually encode it.
                if ($keyval[0] === 'payment_date') {
                    if (substr_count($keyval[1], '+') === 1) {
                        $keyval[1] = str_replace('+', '%2B', $keyval[1]);
                    }
                }
                $myPost[$keyval[0]] = $keyval[1];
            }
        }
        // Build the body of the verification post request, adding the _notify-validate command.
        $req = 'https://www.paypal.com/cgi-bin/webscr?cmd=_notify-validate';
        
        foreach ($myPost as $key => $value) {
            
            $value = urldecode(stripslashes($value));
            $req .= "&$key=$value";
        }
        
        echo $req;
        //echo '<br><br>';
        $req_t = 'https://www.paypal.com/cgi-bin/webscr?cmd=_notify-validate&mc_gross_1=1.00&num_cart_items=1&option_name1_1=Package%2Btype&option_selection1_1=15%2Bdays&payer_id=MZNWKZC7XBNTS&address_country_code=VN&ipn_track_id=57379ba8a2f0b&address_zip=760000&invoice=55020717&charset=UTF-8&payment_gross=1.00&address_status=confirmed&address_street=440%250D%250ABinh%2BQuoi&receipt_id=3379-3202-7895-4812&verify_sign=AFcWxV21C7fd0v3bYYYRCpSSRl31ADxAYhWGIKTfty.O7lhSo0ldpTpW&txn_type=cart&receiver_id=K5SRBGSNKZ8V8&payment_fee=0.34&item_number1=NetDiagnostic_V1.0.0&mc_currency=USD&transaction_subject=&custom=&protection_eligibility=Ineligible&quantity1=1&address_country=Vietnam&payer_status=unverified&first_name=HUU%2BPHUC&item_name1=Bkav%2BHome&address_name=VO%2BHUU%2BPHUC&mc_gross=1.00&payment_date=00%253A04%253A50%2BJun%2B16%252C%2B2017%2BPDT&payment_status=Completed&business=diagnosticsoft%2540gmail.com&last_name=VO&address_state=H%25E1%25BB%2592%2BCH%25C3%258D%2BMINH&txn_id=6CR357731G857344D&mc_fee=0.34&resend=true&payment_type=instant&notify_version=3.8&payer_email=vohuuphuc88%2540gmail.com&receiver_email=diagnosticsoft%2540gmail.com&address_city=Binh%2BThanh&residence_country=VN';
        //header("Location: $req");
        
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, $req);
        curl_setopt($ch, CURLOPT_REFERER, $req);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close', 'User-Agent: company-name'));
        $result = curl_exec($ch);
        curl_close($ch);
        //echo $result;
        
    }
   
    function send_post(){
        $str = 'mc_gross_1=1.00&num_cart_items=1&option_name1_1=Package+type&option_selection1_1=15+days&payer_id=MZNWKZC7XBNTS&address_country_code=VN&ipn_track_id=57379ba8a2f0b&address_zip=760000&invoice=55020717&charset=UTF-8&payment_gross=1.00&address_status=confirmed&address_street=440%0D%0ABinh+Quoi&receipt_id=3379-3202-7895-4812&verify_sign=Ai1PaghZh5FmBLCDCTQpwG8jB264AvqnJTkzDjYRtnKezjkz9eWx.hnP&txn_type=cart&receiver_id=K5SRBGSNKZ8V8&payment_fee=0.34&item_number1=NetDiagnostic_V1.0.0&mc_currency=USD&transaction_subject=&custom=&protection_eligibility=Ineligible&quantity1=1&address_country=Vietnam&payer_status=unverified&first_name=HUU+PHUC&item_name1=Bkav+Home&address_name=VO+HUU+PHUC&mc_gross=1.00&payment_date=00%3A04%3A50+Jun+16%2C+2017+PDT&payment_status=Completed&business=diagnosticsoft%40gmail.com&last_name=VO&address_state=H%E1%BB%92+CH%C3%8D+MINH&txn_id=6CR357731G857344D&mc_fee=0.34&resend=true&payment_type=instant&notify_version=3.8&payer_email=vohuuphuc88%40gmail.com&receiver_email=diagnosticsoft%40gmail.com&address_city=Binh+Thanh&residence_country=VN';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"http://diagnosticsoft.com/ipn_paypal/ipn");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"$str");
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $server_output = curl_exec ($ch);
        
        curl_close ($ch);
        
        echo $server_output;
    }
}

