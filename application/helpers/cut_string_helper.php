<?php

/**
 * Redirect to previous page if http referer is set. Otherwise to server root.
 */
 
if ( ! function_exists('cut_string'))
{
    function cut_string ($string,$con_max,$get_max){
		$list_temp = array();
		$arr = array();
        $string_rs = null;
		$check = 0;
        if(strlen($string)>$con_max){
			$string_temp =  mb_substr($string,0,$get_max,'UTF-8'); 
			$list_temp = explode(' ',$string_temp); 
			$stop = count($list_temp);
			unset($list_temp[$stop-1]);  
			$check = 1; 
        }else{
            $string_temp = $string;
			$list_temp = explode(' ',$string_temp); 
        }
		
        foreach($list_temp as $value){
            $arr[] = $value;
        }
        
        
        foreach($arr as $value){
            $string_rs .= $value.' ';
        }
        
		if($check==1){
			$string_short = trim($string_rs).' ...';
		}else{
			$string_short = trim($string_rs);
		}
        
        return $string_short;
    }
}

?>