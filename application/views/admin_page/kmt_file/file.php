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
        <h1 style="text-transform: uppercase;">File</h1>
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
                        <?=$link?>
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
                        <td>Tên file</td>
                        <td>Kích thước</td>
                        <td class="kmt_hidden">Thuộc nhóm</td>
                        <td>Thao tác</td>
                        <td>Lần hiệu chỉnh trước</td>
                    </tr>
                    <?php 
                     $i=1;
                     foreach($file as $value){
                        $url_p = str_replace('success','',str_replace('fail','',current_url()));
                        $head = base_url();
                        $url_p = 'to/'.str_replace($head,'',$url_p).'/end';
                        $url = base_url().'same_method/udp_status/kmt_file/'.$value->idF.'/';
                    ?>
                     <input type="hidden" name="id[]" value="<?=$value->idF?>"/>
                     <tr <?php if($i%2==0){echo "class='kmt_admin_c1'";}else{echo "class='kmt_admin_c2'";}?>>
                        <td><input class="item" type="checkbox" value="<?=$value->idF?>" name="id_check[]"/></td>
                        <td><a href="<?=base_url()?>admin_file/edit_file/<?=$value->idF?>"><img src="<?=base_url()?>public/admin/img/b_edit.png"/></a></td>
                        <td><input type="text" value="<?=$value->STT?>" name="stt[]"/></td>
                        <td>
                               <?php if($value->TrangThai==1){?>
                                 <a href="javascript:void(0)" onclick="udp_status('<?=$url?>','idF','TrangThai', 0)">
                                    <img src="<?=base_url()?>public/admin/img/on.gif"/>
                                 </a>
                               <?php }else{?>
                                 <a href="javascript:void(0)" onclick="udp_status('<?=$url?>','idF','TrangThai', 1)">
                                    <img src="<?=base_url()?>public/admin/img/off.gif"/>
                                 </a>
                               <?php }?>
                        </td>
                        <td><a href="<?=$value->Url_file?>" target="_blank"><?=$value->TenFile_vi?></a></td>
                        <td><?php echo $value->Size?></td>
                        <td class="kmt_hidden">
                             <?php echo $this->get->kmt_get_col_where('kmt_nhomfile','TenNhom_vi',array('idNF'=>$value->idNF)); ?>
                        </td>
                        <td><a onclick="return confirm('Bạn có chắc muốn xóa file đã chọn!')" href="<?=base_url()?>same_method/del_one/kmt_file/<?=$value->idF?>"><img src="<?=base_url()?>public/admin/img/b_drop.png"/></a></td>
                        <td><?=date('d-m-Y h:i:s',strtotime($value->NgayCapNhat))?></td>
                    </tr>
                    <?php $i++;}?>
                </table>
            
            </form>
            <!-- Begin kmt_admin_bar_3-->
            <div class="kmt_admin_bar_3">
                <p>
                    <a href="<?=base_url()?>admin_file/add_file"><input type="button" value="Thêm file"/></a>
                    
                    <input class="button_admin" id="bt_ud" type="button" value="Sắp xếp"/>
                    
                    <select onchange="changeForm();" id="selectBox">
                        <option value="0">Thao tác nhanh</option>
                        <option value="3">Hiền thị</option>
                        <option value="4">Không hiền thị</option>
                        <option value="5">Xóa</option>
                    </select>
                    
                </p>
                
                <p>
                    <input class="button_admin" id="bt_del" type="submit" value="Xóa chọn"/>
                    
                    <select id="idNF_filter" class="kmt_hidden">
                        <?php
                            foreach($file_group as $value_fg){
                        ?>
                            <?php 
                            if($idNF_f == 0){
                            ?>
                                <option value="<?=$value_fg->idNF?>"><?=$value_fg->TenNhom_vi?></option>
                            
                            <?php }else{?>
                                <option <?php if($idNF == $value_fg->idNF){ echo 'selected="selected"';}?> value="<?=$value_fg->idNF?>"><?=$value_fg->TenNhom_vi?></option>
                            <?php }?>
                        <?php }?>
                            
                    </select>
                    <input type="button" class="kmt_hidden" value="Lọc" class="button" onclick="window.location='<?=base_url()?>admin_file/file_filter/'+document.getElementById('idNF_filter').value"/>
                    
                </p>
            </div>
            <!-- End kmt_admin_bar_3-->
            <p style="margin-top: 25px;clear: both;">Tổng số hàng : <span style="color: red;font-weight: bold;"><?=$count_row?></span></p>
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->

<script type="text/javascript">
	   $('#bt_ud').click(function() {
	        var url = "<?=base_url()?>same_method/ud_numbers/kmt_file/idF";
            if(confirm('Bạn có chắc muốn cập nhật thay đổi thứ tự?')==true){
                $("#form").attr("action", url);
                $('#form').submit();
            }else{
                return false;
            }
       });
       
       $('#bt_del').click(function() {
	        var url = "<?=base_url()?>same_method/del_all/kmt_file";
            if(confirm(' Bạn có chắc muốn xóa các file đã chọn?')==true){
                $("#form").attr("action", url);
                $('#form').submit();
            }else{
                return false;
            }
       });
       
       function changeForm() {
    	   var selectBox = document.getElementById("selectBox");
    	   var selectedValue = selectBox.options[selectBox.selectedIndex].value;
           var url = "<?=base_url()?>same_method/upp_status_list/kmt_file/idF/1";
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
                        url = "<?=base_url()?>same_method/upp_status_list/kmt_file/idF/2";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;
                    case '3': 
                        url = "<?=base_url()?>same_method/upp_status_list/kmt_file/idF/3";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;      
                    case '4': 
                        url = "<?=base_url()?>same_method/upp_status_list/kmt_file/idF/4";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;
                    default:
                        if(confirm('Bạn có chắc muốn xóa những file này ko?')==true){
                            var url = "<?=base_url()?>same_method/del_all/kmt_file";
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