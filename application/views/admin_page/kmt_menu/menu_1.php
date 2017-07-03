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
        <h1>PHẦN MỀM</h1>
        <div id="kmt_admin_content">
            
            <!-- Begin kmt_admin_bar_1-->
            <div class="kmt_admin_bar_1">
                
                <div class="kmt_admin_search">
                    <span class="note" style="padding: 0px 10px;">
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
                    </span>
                </div>
                
                <div class="kmt_admin_page">
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
                        <td>Tên phần mềm</td>
                        <td>Hình đại diện</td>
                        <td>Tiêu biểu</td>
                        <td>Thao tác</td>
                        <td>Lần hiệu chỉnh trước</td>
                    </tr>
                    <?php 
                     $i=1;
                     foreach ($menu as $value){
                        $url = base_url().'same_method/udp_status/kmt_menu_1/'.$value->idMN_1.'/';
                    ?>
                    <input type="hidden" name="id[]" value="<?php echo $value->idMN_1?>"/>
                    <tr <?php if($i%2==0){echo "class='kmt_admin_c1'";}else{echo "class='kmt_admin_c2'";}?>>
                        <td><input class="item" type="checkbox" value="<?php echo $value->idMN_1?>" name="id_check[]"/></td>
                        <td><a href="<?php echo base_url()?>admin_menu/edit_menu_1/<?php echo $value->idMN_1?>"><img src="<?php echo base_url()?>public/admin/img/b_edit.png"/></a></td>
                        <td><input type="text" value="<?php echo $value->STT?>" name="stt[]"/></td>
                        <td>
                           <?php if($value->TrangThai==1){?>
                             <a href="javascript:void(0)" onclick="udp_status('<?php echo $url?>','idMN_1','TrangThai', 0)">
                                <img src="<?php echo base_url()?>public/admin/img/on.gif"/>
                             </a>
                           <?php }else{?>
                             <a href="javascript:void(0)" onclick="udp_status('<?php echo $url?>','idMN_1','TrangThai', 1)">
                                <img src="<?php echo base_url()?>public/admin/img/off.gif"/>
                             </a>
                           <?php }?>
                        </td>
                        <td><?php echo $value->Ten_vi?></td>
                        <td>
                            <?php
                                $MaHinh = $value->MaHinh;
                                $con_img = array('MaHinh'=>$MaHinh);
                                $UrlHinh = $this->get->kmt_get_col_where('kmt_hinhanh','UrlHinh',$con_img);
                            ?>
                            <a href="<?php echo base_url($UrlHinh)?>" class="fancybox"><img src="<?php echo base_url($UrlHinh)?>" width="60px"/></a>
                        </td>
                        <td>
                           <?php if($value->TieuBieu==1){?>
                             <a href="javascript:void(0)" onclick="udp_status('<?php echo $url?>','idMN_1','TieuBieu', 0)">
                                <img src="<?php echo base_url()?>public/admin/img/on.gif"/>
                             </a>
                           <?php }else{?>
                             <a href="javascript:void(0)" onclick="udp_status('<?php echo $url?>','idMN_1','TieuBieu', 1)">
                                <img src="<?php echo base_url()?>public/admin/img/off.gif"/>
                             </a>
                           <?php }?>
                        </td>
                        <td><a onclick="return confirm('Bạn có chắc muốn xóa các phần mềm đã chọn, nếu vẫn còn bài viết nào thuộc phần mềm này bạn sẽ không được xóa nó!')" href="<?php echo base_url()?>same_method/del_one_check/kmt_menu_1/<?php echo $value->idMN_1?>"><img src="<?php echo base_url()?>public/admin/img/b_drop.png"/></a></td>
                        <td><?php echo date('d-m-Y h:i:s',strtotime($value->NgayCapNhat))?></td>
                    </tr>
                    <?php $i++;}?>
                </table>
            </form>
            <!-- Begin kmt_admin_bar_3-->
            <div class="kmt_admin_bar_3">
                <p>
                    <a href="<?php echo base_url()?>admin_menu/add_menu_1"><input type="button" value="Thêm mới"/></a>
                    <input class="button_admin" id="bt_ud" type="button" value="Sắp xếp"/>
                    
                    <select onchange="changeForm();" id="selectBox">
                        <option value="0">Thao tác nhanh</option>
                        <option value="1" class="kmt_hidden">Chọn là tiêu biểu</option>
                        <option value="2" class="kmt_hidden">Bỏ chọn là tiêu biểu</option>
                        <option value="3">Hiền thị</option>
                        <option value="4">Không hiền thị</option>
                        <option value="10">Xóa</option>
                    </select>
                    
                </p>
                
                <p>
                    <input class="button_admin" id="bt_del" type="submit" value="Xóa chọn"/>
                </p>
            </div>
            <!-- End kmt_admin_bar_3-->
            <p style="margin-top: 25px;clear: both;">Tổng số hàng : <span style="color: red;font-weight: bold;"><?php echo $count_row?></span></p>
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->

<script type="text/javascript">
	   $('#bt_ud').click(function() {
	        var url = "<?php echo base_url()?>same_method/ud_numbers/kmt_menu_1/idMN_1";
            if(confirm('Bạn có chắc muốn cập nhật thay đổi thứ tự?')==true){
                $("#form").attr("action", url);
                $('#form').submit();
            }else{
                return false;
            }
       });
       
       $('#bt_del').click(function() {
	        var url = "<?php echo base_url()?>same_method/del_all_check/kmt_menu_1";
            if(confirm(' Bạn có chắc muốn xóa các phần mềm đã chọn?\n Nếu vẫn còn sản phẩm hay phần mềm con nào thuộc phần mềm này bạn sẽ không được xóa nó!')==true){
                $("#form").attr("action", url);
                $('#form').submit();
            }else{
                return false;
            }
       });
       
       function changeForm() {
    	   var selectBox = document.getElementById("selectBox");
    	   var selectedValue = selectBox.options[selectBox.selectedIndex].value;
           var url = "<?php echo base_url()?>same_method/upp_status_list/kmt_menu_1/idMN_1/1";
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
                        url = "<?php echo base_url()?>same_method/upp_status_list/kmt_menu_1/idMN_1/2";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;
                    case '3': 
                        url = "<?php echo base_url()?>same_method/upp_status_list/kmt_menu_1/idMN_1/3";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;      
                    case '4': 
                        url = "<?php echo base_url()?>same_method/upp_status_list/kmt_menu_1/idMN_1/4";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;
                    default:
                        if(confirm('Bạn có chắc muốn xóa những phần mềm này ko?')==true){
                            var url = "<?php echo base_url()?>same_method/del_all_check/kmt_menu_1";
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