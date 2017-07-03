<?php
    $rs = -1;
    $stt = 0;
    if($this->uri->segment_array()>$rs){
        $rs = end($this->uri->segment_array());
        $list_stt = explode('-',$rs);
        if(count($list_stt)==1){
            $rs = $list_stt[0];
        }else{
            $stt = 1;
            $s = $list_stt[0];
            $f = $list_stt[1];
        }
    }
    
    $arr = array();
    $arr_mn2 = array();
    foreach($menu_1 as $value_mn1){
        $arr[] = $value_mn1->idMN_1;
    }
    
    foreach($menu_2 as $value_mn2){
        $arr_mn2[] = $value_mn2->idMN_2;
    }
    $idMN_1_aj = reset($arr);
    $idMN_2_aj = reset($arr_mn2);
?>

<script>
        $.post('<?php echo base_url()?>admin_menu/list_menu_2/'+<?php echo $idMN_1_aj?>, {}, function(data){
            $('#idMN_2_filter').html(data);
        });
        
        $.post('<?php echo base_url()?>admin_menu/list_menu_3/'+<?php echo $idMN_1_aj?>+'/'+<?php echo $idMN_2_aj?>, {}, function(data){
            $('#idMN_3_filter').html(data);
        });
        
        $(document).on('change','#idMN_1_filter',function(){
            idMN_1 = $(this).val();
            $.post('<?php echo base_url()?>admin_menu/list_menu_2/'+idMN_1, {}, function(data){
            $('#idMN_2_filter').html(data);
            });
        });
        
        $(document).on('change','#idMN_2_filter',function(){
            idMN_1 = $('#idMN_1_filter').val();
            idMN_2 = $(this).val();
            $.post('<?php echo base_url()?>admin_menu/list_menu_3/'+idMN_1+'/'+idMN_2, {}, function(data){
            $('#idMN_3_filter').html(data);
            });
        });      
</script>
<!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1>PHIÊN BẢN PHẦN MỀM</h1>
        <div id="kmt_admin_content">
            
            <!-- Begin kmt_admin_bar_1-->
            <div class="kmt_admin_bar_1">
                <p class="note" style="padding: 5px 0px;">
                        <?php
                            if($stt==0){
                                if($rs=="success"){
                                    echo 'Thao tác thành công';
                                }elseif($rs=="fail"){
                                    echo 'Thao tác thất bại';
                                }else{}
                            }else{
                                 if($f == '0'){
                                    echo 'Xóa thành công '.$s;
                                 }else{
                                    echo 'Xóa thành công '.$s.', thất bại '.$f.'. Vui lòng kiểm tra lại!';
                                 }
                            }
                        ?>
                </p>
                <div class="kmt_admin_search">
                    <form action="<?php echo base_url()?>admin_item/item_search" method="post">
                        <input name="keyword" type="text" required="required" placeholder="Nhập từ khóa ..."/>
                        <input type="hidden" value=""/>
                        <input type="submit" value="Tìm kiếm"/>
                    </form>
                </div>
                <div class="kmt_admin_page">
                    <div class="page_in">
                        <?php echo $link?>
                    </div>
                </div>
                
            </div>
            <!-- End kmt_admin_bar_1-->
            <!-- Begin kmt_admin_bar_3-->
            <div class="kmt_admin_bar_3" style="border-radius: 0px;">
                <p style="width: 100%;text-align: left;">
                    
                    <a href="<?php echo base_url()?>admin_item/add_item"><input type="button" value="Thêm mới"/></a>
                    <input class="button_admin bt_ud" type="button" value="Sắp xếp"/>
                    
                    <select class="selectBox">
                        <option value="0">Thao tác nhanh</option>
                        <option value="1" class="kmt_hidden">Chọn là phiên bản nổi bật</option>
                        <option value="2" class="kmt_hidden">Bỏ chọn phiên bản nổi bật</option>
                        <option value="3">Hiền thị</option>
                        <option value="4">Không hiền thị</option>
                        <option value="5" class="kmt_hidden">phiên bản mới</option>
                        <option value="6" class="kmt_hidden">Bỏ chọn phiên bản mới</option>
                        <option value="10">Xóa</option>
                    </select>
                    
                    <input class="button_admin bt_copy" type="button" value="Sao chép"/>
                    <input class="button_admin bt_del" type="submit" value="Xóa chọn"/>
                
                </p>
                
                
            </div>
            <!-- End kmt_admin_bar_3-->
            <form action="" method="post" id="form">
                <table class="kmt_admin_table">
                    <tr class="kmt_admin_titletable">
                        <td><input type="checkbox" onclick="checkall('item', this)" class="checkbox"/></td>
                        <td>&nbsp;</td>
                        <td>STT</td>
                        <td>Hiển thị</td>
                        <td>Tên phiên bản</td>
                        <td>Mã số</td>
                        <td>Ảnh chụp</td>
                        <td>Thuộc phần mềm</td>
                        <td class="kmt_hidden">Danh mục 2</td>
                        <td class="kmt_hidden">Danh mục 3</td>
                        <td class="kmt_hidden">Tiêu biểu</td>
                        <td class="kmt_hidden">Mới</td>
                        <td class="kmt_hidden">File</td>
                        <td>Video</td>
                        <td>Thao tác</td>
                        <td>Lần hiệu chỉnh trước</td>
                    </tr>
                    <?php 
                     $i=1;
                     foreach ($item as $value){
                        $url = base_url().'same_method/udp_status/kmt_item/'.$value->idIT.'/';
                    ?>
                    <input type="hidden" name="id[]" value="<?php echo $value->idIT?>"/>
                    <tr <?php if($i%2==0){echo "class='kmt_admin_c1'";}else{echo "class='kmt_admin_c2'";}?>>
                        <td><input class="item" type="checkbox" value="<?php echo $value->idIT?>" name="id_check[]"/></td>
                        <td><a href="<?php echo base_url()?>admin_item/edit_item/<?php echo $value->idIT?>"><img src="<?php echo base_url()?>public/admin/img/b_edit.png"/></a></td>
                        <td><input type="text" value="<?php echo $value->STT?>" name="stt[]"/></td>
                        <td>
                           <?php if($value->TrangThai==1){?>
                             <a href="javascript:void(0)" onclick="udp_status('<?php echo $url?>','idIT','TrangThai', 0)">
                                <img src="<?php echo base_url()?>public/admin/img/on.gif"/>
                             </a>
                           <?php }else{?>
                             <a href="javascript:void(0)" onclick="udp_status('<?php echo $url?>','idIT','TrangThai', 1)">
                                <img src="<?php echo base_url()?>public/admin/img/off.gif"/>
                             </a>
                           <?php }?>
                        </td>
                        <td title="Bảng giá"><a href="<?php echo base_url('admin_item/list_prices/'.$value->idIT)?>"><?php echo $value->Ten_vi?></a></td>
                        <td><?php echo $value->MaSo?></td>
                        <td>
                            <?php
                                $MaHinh = $value->MaHinh;
                                $con_img = array('MaHinh'=>$MaHinh,'TieuBieu'=>1);
                                $UrlHinh = $this->get->kmt_get_col_where('kmt_hinhanh','UrlHinh',$con_img);
                            ?>
                            <a href="<?php echo base_url()?>admin_item/img_child/<?php echo $value->MaHinh?>"><img src="<?php echo base_url($UrlHinh)?>" width="60px"/></a>
                        </td>
                        <td>
                            <?php
                                $idMN_1 = $value->idMN_1;
                                echo $this->get->kmt_get_col_where('kmt_menu_1','Ten_vi',array('idMN_1'=>$idMN_1));
                            ?>
                        </td>
                        <td class="kmt_hidden">
                            <?php
                                $idMN_2 = $value->idMN_2;
                                echo $this->get->kmt_get_col_where('kmt_menu_2','Ten_vi',array('idMN_2'=>$idMN_2));
                            ?>
                        </td>
                        <td class="kmt_hidden">
                            <?php
                                $idMN_3 = $value->idMN_3;
                                echo $this->get->kmt_get_col_where('kmt_menu_3','Ten_vi',array('idMN_3'=>$idMN_3));
                            ?>
                        </td>
                        
                        <td class="kmt_hidden">
                           <?php if($value->TieuBieu==1){?>
                             <a href="javascript:void(0)" onclick="udp_status('<?php echo $url?>','idIT','TieuBieu', 0)">
                                <img src="<?php echo base_url()?>public/admin/img/on.gif"/>
                             </a>
                           <?php }else{?>
                             <a href="javascript:void(0)" onclick="udp_status('<?php echo $url?>','idIT','TieuBieu', 1)">
                                <img src="<?php echo base_url()?>public/admin/img/off.gif"/>
                             </a>
                           <?php }?>
                        </td>
                        <td class="kmt_hidden">
                           <?php if($value->BanChay==1){?>
                             <a href="javascript:void(0)" onclick="udp_status('<?php echo $url?>','idIT','BanChay', 0)">
                                <img src="<?php echo base_url()?>public/admin/img/on.gif"/>
                             </a>
                           <?php }else{?>
                             <a href="javascript:void(0)" onclick="udp_status('<?php echo $url?>','idIT','BanChay', 1)">
                                <img src="<?php echo base_url()?>public/admin/img/off.gif"/>
                             </a>
                           <?php }?>
                        </td>
                        <td class="kmt_hidden"><a href="<?php echo base_url()?>admin_file/file/1/<?php echo $value->MaHinh?>">File</a></td>
                        <td><a href="<?php echo base_url()?>admin_file/video/<?php echo $value->MaHinh?>">Video</a></td>
                        <td><a onclick="return confirm('Bạn có chắc muốn xóa các phiên bản đã chọn?')" href="<?php echo base_url()?>same_method/del_one/kmt_item/<?php echo $value->idIT?>"><img src="<?php echo base_url()?>public/admin/img/b_drop.png"/></a></td>
                        <td><?php echo date('d-m-Y G:i:s',strtotime($value->NgayCapNhat))?></td>
                    </tr>
                    <?php $i++;}?>
                </table>
            </form>
            <!-- Begin kmt_admin_bar_3-->
            <div class="kmt_admin_bar_3">
                
                
                <p style="width: 50%;text-align: left;margin-bottom: 5px;">
                    
                    <a href="<?php echo base_url()?>admin_item/add_item"><input type="button" value="Thêm mới"/></a>
                    <input class="button_admin bt_ud" type="button" value="Sắp xếp"/>
                    
                    <select class="selectBox">
                        <option value="0">Thao tác nhanh</option>
                        <option value="1" class="kmt_hidden">Chọn là phiên bản tiêu biểu</option>
                        <option value="2" class="kmt_hidden">Bỏ chọn phiên bản tiêu biểu</option>
                        <option value="3">Hiền thị</option>
                        <option value="4">Không hiền thị</option>
                        <option value="5" class="kmt_hidden">phiên bản mới</option>
                        <option value="6" class="kmt_hidden">Bỏ chọn phiên bản mới</option>
                        <option value="10">Xóa</option>
                    </select>
                    
                    <input class="button_admin bt_copy" type="button" value="Sao chép"/>
                    <input class="button_admin bt_del" type="submit" value="Xóa chọn"/>
                    
                    
                </p>
                
                <p style="width: 50%;text-align: right;">
                    <select id="idMN_1_filter">
                        <option value="0">Chọn phần mềm</option>
                        <?php
                            foreach($menu_1 as $value){
                        ?>
                            <option value="<?php echo $value->idMN_1?>"><?php echo $value->Ten_vi?></option>
                        <?php } ?>
                    </select>
                    <select id="idMN_2_filter" class="kmt_hidden"></select>
                    <select id="idMN_3_filter" class="kmt_hidden"></select>
                    <input type="button" value="Lọc" class="button" onclick="window.location='<?php echo base_url()?>admin_item/item_filter/'+document.getElementById('idMN_1_filter').value+'/'+document.getElementById('idMN_2_filter').value"/>
                </p>
                
                
            </div>
            <!-- End kmt_admin_bar_3-->
            <p style="margin-top: 25px;clear: both;">Tổng số hàng : <span style="color: red;font-weight: bold;"><?php echo $count_row?></span></p>
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->

<script type="text/javascript">
	   $(this).on('click', '.bt_ud', function() { 
	        var url = "<?php echo base_url()?>same_method/ud_numbers/kmt_item/idIT";
            if(confirm('Bạn có chắc muốn cập nhật thay đổi thứ tự?')==true){
                $("#form").attr("action", url);
                $('#form').submit();
            }else{
                return false;
            }
       });
       
       $(this).on('click', '.bt_copy', function() { 
	        var url = "<?php echo base_url()?>admin_item/item_copy";
            if(confirm('Bạn có chắc muốn sao chép các phiên bản đã chọn?')==true){
                $("#form").attr("action", url);
                $('#form').submit();
            }else{
                return false;
            }
       });
       
       $(this).on('click', '.bt_del', function() { 
	        var url = "<?php echo base_url()?>same_method/del_all/kmt_item";
            if(confirm(' Bạn có chắc muốn xóa các phiên bản đã chọn?')==true){
                $("#form").attr("action", url);
                $('#form').submit();
            }else{
                return false;
            }
       });
       
       $(this).on('change','.selectBox', function() {
    	   var selectedValue = this.value;
           var url = "<?php echo base_url()?>same_method/upp_status_list/kmt_item/idIT/1";
           if(selectedValue=='0'){
        	   return false;
           }else{
               //begin Swich
               switch (selectedValue) { 
                    case '1': 
                        $("#form").attr("action", url);
                        $('#form').submit(); 
                        break;
                    case '2': 
                        url = "<?php echo base_url()?>same_method/upp_status_list/kmt_item/idIT/2";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;
                    case '3': 
                        url = "<?php echo base_url()?>same_method/upp_status_list/kmt_item/idIT/3";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;      
                    case '4': 
                        url = "<?php echo base_url()?>same_method/upp_status_list/kmt_item/idIT/4";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;
                    case '5': 
                        url = "<?php echo base_url()?>same_method/upp_status_list/kmt_item/idIT/5";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;      
                    case '6': 
                        url = "<?php echo base_url()?>same_method/upp_status_list/kmt_item/idIT/6";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;
                    default:
                        if(confirm('Bạn có chắc muốn xóa những phiên bản này ko?')==true){
                            var url = "<?php echo base_url()?>same_method/del_all/kmt_item";
                            $("#form").attr("action", url);
                            $('#form').submit();
                        }else{
                            return false; 
                        }
                        break;
                }
                //end Swich
           }
   	   });
</script>