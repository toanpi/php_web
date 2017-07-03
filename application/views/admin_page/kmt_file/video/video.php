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
?>
<!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1 style="text-transform: uppercase;">VIDEOS</h1>
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
                <div class="kmt_admin_page" style="width: 100%;">
                    <div class="page_in">
                        <?php echo $link?>
                    </div>
                </div>
                
            </div>
            <!-- End kmt_admin_bar_1-->
            
            <form action="" method="post" id="form">
            
                <table class="kmt_admin_table">
                    <tr class="kmt_admin_titletable">
                        <td><input type="checkbox" onclick="checkall('item', this)" class="checkbox"/></td>
                        <td>&nbsp;</td>
                        <td>STT</td>
                        <td>Hiển thị</td>
                        <td>Tên video</td>
                        <td>Thao tác</td>
                        <td>Lần hiệu chỉnh trước</td>
                    </tr>
                    <?php 
                     $i=1;
                     foreach($video as $value){
                        $url_p = str_replace('success','',str_replace('fail','',current_url()));
                        $head = base_url();
                        $url_p = 'to/'.str_replace($head,'',$url_p).'/end';
                        $url = base_url().'same_method/udp_status/kmt_video/'.$value->idV.'/';
                    ?>
                     <input type="hidden" name="id[]" value="<?php echo $value->idV?>"/>
                     <tr <?php if($i%2==0){echo "class='kmt_admin_c1'";}else{echo "class='kmt_admin_c2'";}?>>
                        <td><input class="item" type="checkbox" value="<?php echo $value->idV?>" name="id_check[]"/></td>
                        <td><a href="<?php echo base_url()?>admin_file/edit_video/<?php echo $value->idV?>"><img src="<?php echo base_url()?>public/admin/img/b_edit.png"/></a></td>
                        <td><input type="text" value="<?php echo $value->STT?>" name="stt[]"/></td>
                        <td>
                               <?php if($value->TrangThai==1){?>
                                 <a href="javascript:void(0)" onclick="udp_status('<?php echo $url?>','idV','TrangThai', 0)">
                                    <img src="<?php echo base_url()?>public/admin/img/on.gif"/>
                                 </a>
                               <?php }else{?>
                                 <a href="javascript:void(0)" onclick="udp_status('<?php echo $url?>','idV','TrangThai', 1)">
                                    <img src="<?php echo base_url()?>public/admin/img/off.gif"/>
                                 </a>
                               <?php }?>
                        </td>
                        <td><a href="https://www.youtube.com/watch?v=<?php echo $value->Url_video?>" target="_blank"><?php echo $value->TenV_vi?></a></td>
                        <td><a onclick="return confirm('Bạn có chắc muốn xóa video đã chọn!')" href="<?php echo base_url()?>same_method/del_one/kmt_video/<?php echo $value->idV?>"><img src="<?php echo base_url()?>public/admin/img/b_drop.png"/></a></td>
                        <td><?php echo date('d-m-Y h:i:s',strtotime($value->NgayCapNhat))?></td>
                    </tr>
                    <?php $i++;}?>
                </table>
            
            </form>
            <!-- Begin kmt_admin_bar_3-->
            <div class="kmt_admin_bar_3">
                <p>
                    <a href="<?php echo base_url()?>admin_file/add_video/<?php echo $MaHinh?>"><input type="button" value="Thêm video"/></a>
                    
                    <input class="button_admin bt_ud" type="button" value="Sắp xếp"/>
                    
                    <select onchange="changeForm();" id="selectBox">
                        <option value="0">Thao tác nhanh</option>
                        
                        <option value="3">Hiền thị</option>
                        <option value="4">Không hiền thị</option>
                        <option value="5">Xóa</option>
                    </select>
                        <a href="<?php echo base_url()?>admin_item/item"><input type="button" class="button_admin" value="Quay lại"/></a>
                
                </p>
                
                <p>
                    <input class="button_admin bt_del" type="submit" value="Xóa chọn"/>
                </p>
            </div>
            <!-- End kmt_admin_bar_3-->
            <p style="margin-top: 25px;clear: both;">Tổng số hàng : <span style="color: red;font-weight: bold;"><?php echo $count_row?></span></p>
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->

<script type="text/javascript">
	   
       
       $(this).on('click', '.bt_ud', function() { 
	        var url = "<?php echo base_url()?>same_method/ud_numbers/kmt_video/idV";
            if(confirm('Bạn có chắc muốn cập nhật thay đổi thứ tự?')==true){
                $("#form").attr("action", url);
                $('#form').submit();
            }else{
                return false;
            }
       });
       
       $(this).on('click', '.bt_del', function() { 
	        var url = "<?php echo base_url()?>same_method/del_all/kmt_video";
            if(confirm(' Bạn có chắc muốn xóa các video đã chọn?')==true){
                $("#form").attr("action", url);
                $('#form').submit();
            }else{
                return false;
            }
       });
       
       function changeForm() {
    	   var selectBox = document.getElementById("selectBox");
    	   var selectedValue = selectBox.options[selectBox.selectedIndex].value;
           var url = "<?php echo base_url()?>same_method/upp_status_list/kmt_video/idV/1";
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
                        url = "<?php echo base_url()?>same_method/upp_status_list/kmt_video/idV/2";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;
                    case '3': 
                        url = "<?php echo base_url()?>same_method/upp_status_list/kmt_video/idV/3";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;      
                    case '4': 
                        url = "<?php echo base_url()?>same_method/upp_status_list/kmt_video/idV/4";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;
                    default:
                        if(confirm('Bạn có chắc muốn xóa những video này ko?')==true){
                            var url = "<?php echo base_url()?>same_method/del_all/kmt_video";
                            $("#form").attr("action", url);
                            $('#form').submit();
                        }else{
                            return false; 
                        }
                        break;
                }
                //end Swich
           }
   	   }
</script>