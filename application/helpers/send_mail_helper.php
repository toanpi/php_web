<?php
 
if ( ! function_exists('send_mail'))
{
    function send_mail($email_ca,$pass_ca,$from,$to,$subject,$content_email,$name=DOMAIN_NAME){
		$rs = false;
        
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_timeout' => 60,
            'smtp_user' => $email_ca,
            'smtp_pass' => $pass_ca,
            'charset' => 'utf-8',
            'mailtype'  => 'html'
            );
            
            $CI =& get_instance();
            $CI->load->library('email', $config);
            $CI->email->set_newline("\r\n");
            $CI->email->from($from,$name);
            $CI->email->to($to); 
            $CI->email->subject($subject);
            $CI->email->message($content_email); 
            
            if($CI->email->send()){
                $rs = true;
            }
        
        return $rs;
    }
}

?>