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
        <h1>TÀI KHOẢN THÀNH VIÊN</h1>
        <div id="kmt_admin_content">
            
            <!-- Begin kmt_admin_bar_1-->
            <div class="kmt_admin_bar_1">
                
                <div class="kmt_admin_search">
                    <span class="note" style="padding: 0px 10px;">
                        <?php
                            if($stt==0){
                                if($rs=="success"){
                                    echo 'Successful';
                                }elseif($rs=="fail"){
                                    echo 'Fail';
                                }else{}
                            }else{
                                 if($f == '0'){
                                    echo 'Delete successful '.$s;
                                 }else{
                                    echo 'Delete successful '.$s.', fails '.$f.'. Please check!';
                                 }
                            }
                        ?>
                    </span>
                </div>
                
                <div class="kmt_admin_page">
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
                        <td>Kích hoạt</td>
                        <td>Mã tài khoản</td>
                        <td>Tên tài khoản</td>
                        <td class="kmt_hidden">Typical</td>
                        <td>Thao tác</td>
                        <td>Lần hiệu chỉnh gần đây</td>
                    </tr>
                    <?php 
                     $i=1;
                     foreach ($member as $value){
                        $url = base_url().'same_method/udp_status/kmt_nguoidung/'.$value->idU.'/';
                    ?>
                    <input type="hidden" name="id[]" value="<?=$value->idU?>"/>
                    <tr <?php if($i%2==0){echo "class='kmt_admin_c1'";}else{echo "class='kmt_admin_c2'";}?>>
                        <td><input class="item" type="checkbox" value="<?=$value->idU?>" name="id_check[]"/></td>
                        <td><a href="<?=base_url()?>users_method/edit_member/<?=$value->idU?>"><img src="<?=base_url()?>public/admin/img/b_edit.png"/></a></td>
                        <td><?=$i;?></td>
                        <td>
                           <?php if($value->TrangThai==1){?>
                             <a href="javascript:void(0)" onclick="udp_status('<?=$url?>','idU','TrangThai', 0)">
                                <img src="<?=base_url()?>public/admin/img/on.gif"/>
                             </a>
                           <?php }else{?>
                             <a href="javascript:void(0)" onclick="udp_status('<?=$url?>','idU','TrangThai', 1)">
                                <img src="<?=base_url()?>public/admin/img/off.gif"/>
                             </a>
                           <?php }?>
                        </td>
                        <td><a href="<?=base_url()?>users_method/my_bag/<?=$value->MaKH?>" title="Danh sách đơn hàng"><?=$value->MaKH?></a></td>
                        <td><?=$value->HoTen?></td>
                        <td class="kmt_hidden">
                           <?php if($value->TieuBieu==1){?>
                             <a href="javascript:void(0)" onclick="udp_status('<?=$url?>','idU','TieuBieu', 0)">
                                <img src="<?=base_url()?>public/admin/img/on.gif"/>
                             </a>
                           <?php }else{?>
                             <a href="javascript:void(0)" onclick="udp_status('<?=$url?>','idU','TieuBieu', 1)">
                                <img src="<?=base_url()?>public/admin/img/off.gif"/>
                             </a>
                           <?php }?>
                        </td>
                        <td><a onclick="return confirm('Bạn có chắc muốn xóa tài khoản này!')" href="<?=base_url()?>same_method/del_one/kmt_nguoidung/<?=$value->idU?>"><img src="<?=base_url()?>public/admin/img/b_drop.png"/></a></td>
                        <td><?=date('d-m-Y h:i:s',strtotime($value->NgayCapNhat))?></td>
                    </tr>
                    <?php $i++;}?>
                </table>
            </form>
            <!-- Begin kmt_admin_bar_3-->
            <div class="kmt_admin_bar_3">
                <p>
                    <a href="<?=base_url()?>users_method/add_member"><input type="button" value="Thêm mới tài khoản"/></a>
                    
                    <select onchange="changeForm();" id="selectBox">
                        <option value="0">Thao tác nhanh</option>
                        <option value="3">Kích hoạt</option>
                        <option value="4">Bỏ kích hoạt</option>
                        <option value="10">Xóa</option>
                    </select>
                    
                </p>
                
                <p>
                    <input class="button_admin" id="bt_del" type="submit" value="Xóa chọn"/>
                </p>
            </div>
            <!-- End kmt_admin_bar_3-->
            <p style="margin-top: 25px;clear: both;">Tổng số hàng: <span style="color: red;font-weight: bold;"><?=$count_row?></span></p>
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->

<script type="text/javascript">
	   $('#bt_ud').click(function() {
	        var url = "<?=base_url()?>same_method/ud_numbers/kmt_nguoidung/idU";
            if(confirm('Bạn có muốn cập nhật tài khoản này?')==true){
                $("#form").attr("action", url);
                $('#form').submit();
            }else{
                return false;
            }
       });
       
       $('#bt_del').click(function() {
	        var url = "<?=base_url()?>same_method/del_all/kmt_nguoidung";
            if(confirm('Bạn có chắc muốn xóa tài khoản này?')==true){
                $("#form").attr("action", url);
                $('#form').submit();
            }else{
                return false;
            }
       });
       
       function changeForm() {
    	   var selectBox = document.getElementById("selectBox");
    	   var selectedValue = selectBox.options[selectBox.selectedIndex].value;
           var url = "<?=base_url()?>same_method/upp_status_list/kmt_nguoidung/idU/1";
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
                        url = "<?=base_url()?>same_method/upp_status_list/kmt_nguoidung/idU/2";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;
                    case '3': 
                        url = "<?=base_url()?>same_method/upp_status_list/kmt_nguoidung/idU/3";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;      
                    case '4': 
                        url = "<?=base_url()?>same_method/upp_status_list/kmt_nguoidung/idU/4";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;
                    default:
                        if(confirm('Bạn có chắc muốn xóa tài khoản này?')==true){
                            var url = "<?=base_url()?>same_method/del_all/kmt_nguoidung";
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