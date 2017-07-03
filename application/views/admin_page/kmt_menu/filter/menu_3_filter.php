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
    foreach($menu_1 as $value_mn1){
        $arr[] = $value_mn1->idMN_1;
    }
    $idMN_1_aj = reset($arr);
?>

<script>
        $.post('<?=base_url()?>admin_menu/list_menu_2_edit/'+<?=$idMN_1_aj?>+'/'+<?=$idMN_2_f?>, {}, function(data){
            $('#idMN_2_filter').html(data);
        });
        
        $(document).on('change','#idMN_1_filter',function(){
            idMN_1 = $(this).val();
            $.post('<?=base_url()?>admin_menu/list_menu_2/'+idMN_1, {}, function(data){
            $('#idMN_2_filter').html(data);
            });
        });      
</script>
<!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1>DANH MỤC CẤP 3</h1>
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
                        <td>Tên danh mục</td>
                        <td class="kmt_hidden">Hình đại diện</td>
                        <td>Thuộc danh mục cấp 1</td>
                        <td>Thuộc danh mục cấp 2</td>
                        <td class="kmt_hidden">Tiêu biểu</td>
                        <td>Thao tác</td>
                        <td>Lần hiệu chỉnh trước</td>
                    </tr>
                    <?php 
                     $i=1;
                     foreach ($menu as $value){
                        $url = base_url().'same_method/udp_status/kmt_menu_3/'.$value->idMN_3.'/';
                    ?>
                    <input type="hidden" name="id[]" value="<?=$value->idMN_3?>"/>
                    <tr <?php if($i%2==0){echo "class='kmt_admin_c1'";}else{echo "class='kmt_admin_c2'";}?>>
                        <td><input class="item" type="checkbox" value="<?=$value->idMN_3?>" name="id_check[]"/></td>
                        <td><a href="<?=base_url()?>admin_menu/edit_menu_3/<?=$value->idMN_3?>"><img src="<?=base_url()?>public/admin/img/b_edit.png"/></a></td>
                        <td><input type="text" value="<?=$value->STT?>" name="stt[]"/></td>
                        <td>
                           <?php if($value->TrangThai==1){?>
                             <a href="javascript:void(0)" onclick="udp_status('<?=$url?>','idMN_3','TrangThai', 0)">
                                <img src="<?=base_url()?>public/admin/img/on.gif"/>
                             </a>
                           <?php }else{?>
                             <a href="javascript:void(0)" onclick="udp_status('<?=$url?>','idMN_3','TrangThai', 1)">
                                <img src="<?=base_url()?>public/admin/img/off.gif"/>
                             </a>
                           <?php }?>
                        </td>
                        <td><?=$value->Ten_vi?></td>
                        <td class="kmt_hidden">
                            <?php
                                $MaHinh = $value->MaHinh;
                                $con_img = array('MaHinh'=>$MaHinh);
                                $UrlHinh = $this->get->kmt_get_col_where('kmt_hinhanh','UrlHinh',$con_img);
                            ?>
                            <a href="<?=$UrlHinh?>" class="fancybox"><img src="<?=$UrlHinh?>" width="60px"/></a>
                        </td>
                        <td>
                            <?php
                                $idMN_1 = $value->idMN_1;
                                echo $this->get->kmt_get_col_where('kmt_menu_1','Ten_vi',array('idMN_1'=>$idMN_1));
                            ?>
                        </td>
                        <td>
                            <?php
                                $idMN_2 = $value->idMN_2;
                                echo $this->get->kmt_get_col_where('kmt_menu_2','Ten_vi',array('idMN_2'=>$idMN_2));
                            ?>
                        </td>
                        <td class="kmt_hidden">
                           <?php if($value->TieuBieu==1){?>
                             <a href="javascript:void(0)" onclick="udp_status('<?=$url?>','idMN_3','TieuBieu', 0)">
                                <img src="<?=base_url()?>public/admin/img/on.gif"/>
                             </a>
                           <?php }else{?>
                             <a href="javascript:void(0)" onclick="udp_status('<?=$url?>','idMN_3','TieuBieu', 1)">
                                <img src="<?=base_url()?>public/admin/img/off.gif"/>
                             </a>
                           <?php }?>
                        </td>
                        <td><a onclick="return confirm('Bạn có chắc muốn xóa các danh mục đã chọn, nếu vẫn còn bài viết nào thuộc danh mục này bạn sẽ không được xóa nó!')" href="<?=base_url()?>same_method/del_one_check/kmt_menu_3/<?=$value->idMN_3?>"><img src="<?=base_url()?>public/admin/img/b_drop.png"/></a></td>
                        <td><?=date('d-m-Y h:i:s',strtotime($value->NgayCapNhat))?></td>
                    </tr>
                    <?php $i++;}?>
                </table>
            </form>
            <!-- Begin kmt_admin_bar_3-->
            <div class="kmt_admin_bar_3">
                <p>
                    <a href="<?=base_url()?>admin_menu/add_menu_3"><input type="button" value="Thêm mới"/></a>
                    <input class="button_admin" id="bt_ud" type="button" value="Sắp xếp"/>
                    
                    <select onchange="changeForm();" id="selectBox">
                        <option value="0">Thao tác nhanh</option>
                        <option value="1">Chọn là tiêu biểu</option>
                        <option value="2">Bỏ chọn là tiêu biểu</option>
                        <option value="3">Hiền thị</option>
                        <option value="4">Không hiền thị</option>
                        <option value="10">Xóa</option>
                    </select>
                    
                </p>
                
                <p>
                    <input class="button_admin" id="bt_del" type="submit" value="Xóa chọn"/>
                    <select id="idMN_1_filter">
                        <option value="0">Chọn danh mục cấp 1</option>
                        <?php
                            foreach($menu_1 as $value){
                        ?>
                            <?php 
                            if($idMN_1_f == 0){
                            ?>
                                <option value="<?=$value->idMN_1?>"><?=$value->Ten_vi?></option>
                            
                            <?php }else{?>
                                <option <?php if($idMN_1_f == $value->idMN_1){ echo 'selected="selected"';}?> value="<?=$value->idMN_1?>"><?=$value->Ten_vi?></option>
                            <?php }?>
                        <?php } ?>
                    </select>
                    <select id="idMN_2_filter"></select>
                    <input type="button" value="Lọc" class="button" onclick="window.location='<?=base_url()?>admin_menu/menu_3_filter/'+document.getElementById('idMN_1_filter').value+'/'+document.getElementById('idMN_2_filter').value"/>
                </p>
            </div>
            <!-- End kmt_admin_bar_3-->
            <p style="margin-top: 25px;clear: both;">Tổng số hàng : <span style="color: red;font-weight: bold;"><?=$count_row?></span></p>
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->

<script type="text/javascript">
	   $('#bt_ud').click(function() {
	        var url = "<?=base_url()?>same_method/ud_numbers/kmt_menu_3/idMN_3";
            if(confirm('Bạn có chắc muốn cập nhật thay đổi thứ tự?')==true){
                $("#form").attr("action", url);
                $('#form').submit();
            }else{
                return false;
            }
       });
       
       $('#bt_del').click(function() {
	        var url = "<?=base_url()?>same_method/del_all_check/kmt_menu_3";
            if(confirm(' Bạn có chắc muốn xóa các danh mục đã chọn?\n Nếu vẫn còn sản phẩm hay danh mục con nào thuộc danh mục này bạn sẽ không được xóa nó!')==true){
                $("#form").attr("action", url);
                $('#form').submit();
            }else{
                return false;
            }
       });
       
       function changeForm() {
    	   var selectBox = document.getElementById("selectBox");
    	   var selectedValue = selectBox.options[selectBox.selectedIndex].value;
           var url = "<?=base_url()?>same_method/upp_status_list/kmt_menu_3/idMN_3/1";
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
                        url = "<?=base_url()?>same_method/upp_status_list/kmt_menu_3/idMN_3/2";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;
                    case '3': 
                        url = "<?=base_url()?>same_method/upp_status_list/kmt_menu_3/idMN_3/3";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;      
                    case '4': 
                        url = "<?=base_url()?>same_method/upp_status_list/kmt_menu_3/idMN_3/4";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;
                    default:
                        if(confirm('Bạn có chắc muốn xóa những danh mục này ko?')==true){
                            var url = "<?=base_url()?>same_method/del_all_check/kmt_menu_3";
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