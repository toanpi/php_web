<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Del_model extends CI_Model{
    
    public function kmt_del($table,$id,$con_o = null){

        Switch($table){
            
            Case 'kmt_hinhanh':  
            $colu = 'MaHinh'; 
            break;
            
            Case 'kmt_lienhe':  
            $colu = 'idMS'; 
            break;
            
            Case 'kmt_video':  
            $colu = 'idV'; 
            break;
            
            Case 'kmt_nguoidung':  
            $colu = 'idU'; 
            break;
            
            Case 'kmt_donhang':  
            echo $table;
            $colu = 'idDH'; 
            $name_license = $this->get->kmt_get_col_where('kmt_donhang','File_name',array('idDH'=>$id));
            
            $file_real = '/home/www/diagnosticsoftcom/wwwdiagnosticsoft/' . 'upload/real/'.$name_license;
            $file_temp = '/home/www/diagnosticsoftcom/wwwdiagnosticsoft/' . 'upload/temp/'.$name_license;
            
            if(file_exists($file_real)){
                unlink($file_real);
            }
            if(file_exists($file_temp)){
                unlink($file_temp);
            }
            break;
            
            Case 'kmt_list_prices':  
            $colu = 'idPL'; 
            break;
            
            Default:
                $colu = 'idIT';
                break;                
        }
        $this->db->where($table.'.'.$colu,$id);
        if($con_o!=null){
            foreach($con_o as $u=>$v){
                $this->db->where($table.'.'.$u,$v);
            }
        }
        
        return $this->db->delete($table);
    }
    
    public function kmt_del_has_img($table,$id,$con_o = null){
        $this->load->model('get_model', 'get');
        $this->load->model('check_model', 'check');
        $np_img = 'public/img/no-img.png';
        
        Switch($table){
            
            Case 'kmt_menu':  
                $colu = 'idMN';
                $mahinh = $this->get->kmt_get_col_where($table,'MaHinh',array($colu=>$id));
            break;
            
            Case 'kmt_menu_1':  
                $colu = 'idMN_1';
                $mahinh = $this->get->kmt_get_col_where($table,'MaHinh',array($colu=>$id));
            break;
            
            Case 'kmt_menu_2':  
                $colu = 'idMN_2';
                $mahinh = $this->get->kmt_get_col_where($table,'MaHinh',array($colu=>$id));
            break;  
            
            Case 'kmt_menu_3':  
                $colu = 'idMN_3';
                $mahinh = $this->get->kmt_get_col_where($table,'MaHinh',array($colu=>$id));
            break; 
            
            Case 'kmt_nhombaiviet':  
                $colu = 'idNBV';
                $mahinh = $this->get->kmt_get_col_where($table,'MaHinh',array($colu=>$id));
            break; 
            
            Case 'kmt_baiviet':  
                $colu = 'idBV';
                $mahinh = $this->get->kmt_get_col_where($table,'MaHinh',array($colu=>$id));
                
            break; 
            
            

            Case 'kmt_hinhanh':  
            $colu = 'idH'; 
            $idLH = $this->get->kmt_get_col_where($table,'idLH',array($colu=>$id));
            $url_img = $this->get->kmt_get_col_where($table,'UrlHinh',array($colu=>$id));
            $check_img = $this->check->kmt_check_child('kmt_hinhanh','UrlHinh',$url_img);
            if($url_img!=$np_img && $check_img==1){
                $this->kmt_del_img($url_img);
            }
            $mahinh = null;
            break; 
            
            Case 'kmt_file':  
            $colu = 'idF'; 
            $url_file = $this->get->kmt_get_col_where($table,'Url_file',array($colu=>$id));
            $check_file = $this->check->kmt_check_child('kmt_file','Url_file',$url_file);
            if($check_file==1){
                $this->kmt_del_img($url_file);
            }
            $mahinh = null;
            break; 
            
            Default:
                $colu = 'idIT';
                $mahinh = $this->get->kmt_get_col_where($table,'MaHinh',array($colu=>$id));
                $list_img = $this->get->kmt_get_where('kmt_hinhanh',array('MaHinh'=>$mahinh));
                $this->del_prices($id);
                $this->del_video($mahinh);
                //$this->del_size($mahinh);
                foreach($list_img as $value){
                    $check_img = $this->check->kmt_check_child('kmt_hinhanh','UrlHinh',$value->UrlHinh);
                    if($check_img==1){
                        $this->kmt_del_img($value->UrlHinh);
                    } 
                }
                $this->kmt_del('kmt_hinhanh',$mahinh);
                $mahinh = null;
                break;                
        }
        
        if($mahinh!=null){
            $url_img = $this->get->kmt_get_col_where('kmt_hinhanh','UrlHinh',array('MaHinh'=>$mahinh));
            $check_img = $this->check->kmt_check_child('kmt_hinhanh','UrlHinh',$url_img);
            
            if($url_img!=$np_img && $check_img==1){
                //echo $url_img;
                $this->kmt_del_img($url_img);  
            }  
            $this->kmt_del('kmt_hinhanh',$mahinh);
            
        }
        
        $this->db->where($table.'.'.$colu,$id);
        
        if($con_o!=null){
            foreach($con_o as $u=>$v){
                $this->db->where($table.'.'.$u,$v);
            }
        }
        return $this->db->delete($table);
    }
    

    public function kmt_del_all($table,$con){
         $stt = '';
         $sucess = 0;
         $fail = 0;
         
         $num_array = count($con);

            if($num_array>0){
                     for($i=1;$i<=$num_array;$i++){
                        $id = $con[$i-1];
                        Switch($table){

                            Case 'kmt_lienhe':  
                                $rs = $this->kmt_del($table,$id);
                                if($rs){
                                    $sucess++;
                                }else{
                                    $fail++;
                                }
                            break;
                            
                            Case 'kmt_video':  
                                $rs = $this->kmt_del($table,$id);
                                if($rs){
                                    $sucess++;
                                }else{
                                    $fail++;
                                }
                            break;
                           
                            Case 'kmt_donhang':  
                            
                            $TrangThai = $this->get->kmt_get_col_where('kmt_donhang','TrangThai',array('idDH'=>$id));
                            $rs = $this->del->kmt_del($table,$id);
                                if($rs){
                                    $sucess++;
                                }else{
                                    $fail++;
                                }
                                $sucess = $TrangThai.$sucess;
                                $fail = $TrangThai.$fail;
                            break;
                            
                            
                            Case 'kmt_email':  
                                $rs = $this->kmt_del($table,$id);
                                if($rs){
                                    $sucess++;
                                }else{
                                    $fail++;
                                }
                            break;
                            
                            Case 'kmt_nguoidung':  
                                $rs = $this->kmt_del($table,$id);
                                if($rs){
                                    $sucess++;
                                }else{
                                    $fail++;
                                }
                            break;
                            
                            Case 'kmt_list_prices':  
                                $rs = $this->kmt_del($table,$id);
                                if($rs){
                                    $sucess++;
                                }else{
                                    $fail++;
                                }
                            break;
                            
                            Default:
                                $rs = $this->kmt_del_has_img($table,$id);
                                if($rs){
                                    $sucess++;
                                }else{
                                    $fail++;
                                }
                                break;
                            
                        }    
                     }  
             }

         $stt = $sucess.'-'.$fail;    
         return $stt;
    }
    
    public function kmt_del_all_check($table,$con){
         $this->load->model('check_model', 'check');
         $stt = '';
         $sucess = 0;
         $fail = 0;
         
         $num_array = count($con);

            if($num_array>0){
                     for($i=1;$i<=$num_array;$i++){
                        $id = $con[$i-1];

                        Switch($table){
                                Case 'kmt_menu':  
                                $check_menu = $this->check->kmt_check_child('kmt_menu','idMN_p',$id);
                                $check_item = $this->check->kmt_check_child('kmt_item_in_menu','idMN',$id);
                                if($check_menu==0 && $check_item==0){
                                     $rs = $this->del->kmt_del_has_img($table,$id);
                                     if($rs){
                                        $sucess++;
                                     }else{
                                        $fail++;
                                     }
                                }else{
                                    $fail++;
                                }
                                break;
                                
                             Case 'kmt_menu_1':  
                                $check_menu_2 = $this->check->kmt_check_child('kmt_menu_2','idMN_1',$id);
                                $check_menu_3 = $this->check->kmt_check_child('kmt_menu_3','idMN_1',$id);
                                $check_item = $this->check->kmt_check_child('kmt_item','idMN_1',$id);
                                if($check_menu_2==0 && $check_menu_3==0 && $check_item==0){
                                     $rs = $this->del->kmt_del_has_img($table,$id);
                                     if($rs){
                                        $sucess++;
                                     }else{
                                        $fail++;
                                     }
                                }else{
                                    $fail++;
                                }
                                break;
                            
                            Case 'kmt_menu_2':  
                                $check_menu_3 = $this->check->kmt_check_child('kmt_menu_3','idMN_2',$id);
                                $check_item = $this->check->kmt_check_child('kmt_item','idMN_2',$id);
                                if($check_menu_3==0 && $check_item==0){
                                   $rs = $this->del->kmt_del_has_img($table,$id);
                                    if($rs){
                                        $sucess++;
                                    }else{
                                        $fail++;
                                    }
                                }else{
                                    $fail++;
                                }
                                break;
                            
                            Case 'kmt_menu_3':  
                                $check_item = $this->check->kmt_check_child('kmt_item','idMN_3',$id);
                                if($check_item==0){
                                   $rs = $this->del->kmt_del_has_img($table,$id);
                                    if($rs){
                                        $sucess++;
                                    }else{
                                        $fail++;
                                    }
                                }else{
                                    $fail++;
                                }
                                break;
                            
                            Case 'kmt_baiviet':  
                                $check_item = $this->check->kmt_check_child('kmt_baiviet','idBV_p',$id);
                                if($check_item==0){
                                   $rs = $this->del->kmt_del_has_img($table,$id);
                                    if($rs){
                                        $sucess++;
                                    }else{
                                        $fail++;
                                    }
                                }else{
                                    $fail++;
                                }
                                break;
                                
                           
                            Case 'kmt_nhombaiviet':  
                            $check = $this->check->kmt_check_child('kmt_baiviet','idNBV',$id);
                            if($check==0){
                                   $rs = $this->del->kmt_del_has_img($table,$id);
                                    if($rs){
                                        $sucess++;
                                    }else{
                                        $fail++;
                                    }
                                }else{
                                    $fail++;
                                }
                                break;
                            
                            Case 'kmt_nhomfile':  
                            $check = $this->check->kmt_check_child('kmt_file','idNF',$id);
                            if($check==0){
                                   $rs = $this->del->kmt_del($table,$id);
                                    if($rs){
                                        $sucess++;
                                    }else{
                                        $fail++;
                                    }
                                }else{
                                    $fail++;
                                }
                                break;
                            
                            Default:
                                $rs = $this->kmt_del_has_img($table,$id);
                                if($rs){
                                    $sucess++;
                                }else{
                                    $fail++;
                                }
                                break;
                            
                        }    
                     }  
             }

         $stt = $sucess.'-'.$fail;    
         return $stt;
    }
    
    public function kmt_del_img($url_img){
        $url_img = base_url($url_img);
        $url = '';
        $url_thumbs = '';
                
        $mang = explode("/",$url_img);
        $total =  count($mang);
        for($i=3;$i<$total;$i++){
            $url = $url.'/'.$mang[$i];
        }

        for($i=3;$i<$total;$i++){
            if($mang[$i]=='images'){
                $mang[$i] = '_thumbs/Images';
            }elseif($mang[$i]=='files'){
                $mang[$i] = '_thumbs/Files';
            }else{
                        
            }
            $url_thumbs = $url_thumbs.'/'.$mang[$i];       
        }
        
        //$fileName = $_SERVER['DOCUMENT_ROOT'] . $url;
        //$fileNameThumbnail = $_SERVER['DOCUMENT_ROOT'] . $url_thumbs;
              
        $fileName = '/home/www/diagnosticsoftcom/wwwdiagnosticsoft' . $url;
        $fileNameThumbnail = '/home/www/diagnosticsoftcom/wwwdiagnosticsoft' . $url_thumbs;
        
        //$fileName = '/home/www/comvn/thienanhconscom' . $url;
		//$fileNameThumbnail = '/home/www/comvn/thienanhconscom' . $url_thumbs;
        
        if(file_exists($fileName)){
            unlink($fileName);
            if(file_exists($fileNameThumbnail)){
                unlink($fileNameThumbnail);
            }
        }
        
        
    }
    
    function del_prices($idIT){
        $this->db->where('kmt_list_prices.idIT',$idIT);
        return $this->db->delete('kmt_list_prices');
    }
    
    function del_video($MaHinh){
        $this->db->where('kmt_video.MaHinh',$MaHinh);
        return $this->db->delete('kmt_video');
    }
    
    function del_file($MaHinh){
        $this->db->where('kmt_file.MaHinh',$MaHinh);
        return $this->db->delete('kmt_file');
    }
    
    function del_articles_child($idBV){
        $this->db->where('kmt_baiviet.idBV',$idBV);
        return $this->db->delete('kmt_baiviet');
    }
}