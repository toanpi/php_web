<?php
if ( ! function_exists('redirect_back'))
{
    function redirect_back($st=null)
    {   
        if($st!=null){
            $st = '/'.$st;    
        }
        
        if(isset($_SERVER['HTTP_REFERER']))
        {
            $url =  str_replace('/fail','',str_replace('/success','',$_SERVER['HTTP_REFERER']));
            redirect($url.$st);
        }
        else
        {
            redirect('http://'.$url.$st);
        }
        exit;
    }
}

?>