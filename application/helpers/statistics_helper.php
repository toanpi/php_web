<?php

/**
 * Redirect to previous page if http referer is set. Otherwise to server root.
 */
 
if ( ! function_exists('visitors'))
{
    function visitors()
    {   
        $time_now = time();
        $time_out = 900;
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $CI =& get_instance();
        $CI->load->model('statistics_model','statistics');
        $CI->statistics->deleteDbCount();
        $CI->statistics->themKetNoiMoi($time_now,$time_out,$ip_address);
        $data = $CI->statistics->userOnline($time_now,$time_out,$ip_address)->num_rows();
        return $data;
    }
}

if ( ! function_exists('separation_of_some'))
{
    function separation_of_some($int)
    {   
        if($int>0){
                $v = $int%10;
                $u = floor($int/10);
                array_push($this->array_temp, $v);
                $this->tachSo($u);
        }
    }
}

?>