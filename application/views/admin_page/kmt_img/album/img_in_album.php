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
    
    foreach($type_img as $value_t){
        $Page = $value_t->Page;
        $TieuBieu = $value_t->TieuBieu;
        $NhieuHinh = $value_t->NhieuHinh;
    }
                     
?>
<!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1 style="text-transform: uppercase;">HÌNH ẢNH THUỘC <?=$TenAB?></h1>
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
                        <td>Tiêu đề hình ảnh</td>
                        <td>Hình đại diện</td>
                        <?php
                            if($Page == 1){
                        ?>
                        <td>Thuộc trang</td>
                        <?php }?>
                        <?php
                            if($TieuBieu == 1){
                        ?>
                        <td>Tiêu biểu</td>
                        <?php }?>
                        <td>Thao tác</td>
                        <td>Lần hiệu chỉnh trước</td>
                    </tr>
                    <?php 
                     $i=1;
                     foreach($img as $value){
                        $url_p = str_replace('success','',str_replace('fail','',current_url()));
                        $head = base_url();
                        $url_p = 'to/'.str_replace($head,'',$url_p).'/end';
                        $url = base_url().'same_method/udp_status/kmt_hinhanh/'.$value->idH.'/';
                    ?>
                     <input type="hidden" name="id[]" value="<?=$value->idH?>"/>
                     <tr <?php if($i%2==0){echo "class='kmt_admin_c1'";}else{echo "class='kmt_admin_c2'";}?>>
                        <td><input class="item" type="checkbox" value="<?=$value->idH?>" name="id_check[]"/></td>
                        <td><a href="<?=base_url()?>admin_img/edit_img_album/<?=$value->idH?>"><img src="<?=base_url()?>public/admin/img/b_edit.png"/></a></td>
                        <td><input type="text" value="<?=$value->STT?>" name="stt[]"/></td>
                        <td>
                               <?php if($value->TrangThai==1){?>
                                 <a href="javascript:void(0)" onclick="udp_status('<?=$url?>','idH','TrangThai', 0)">
                                    <img src="<?=base_url()?>public/admin/img/on.gif"/>
                                 </a>
                               <?php }else{?>
                                 <a href="javascript:void(0)" onclick="udp_status('<?=$url?>','idH','TrangThai', 1)">
                                    <img src="<?=base_url()?>public/admin/img/off.gif"/>
                                 </a>
                               <?php }?>
                        </td>
                        <td><?=$value->TenHinh_vi?></td>
                        <td>
                                <?php
                                    $UrlHinh = $value->UrlHinh;
                                ?>
                                <a href="<?=base_url($UrlHinh)?>" class="fancybox"><img src="<?=base_url($UrlHinh)?>" height="50px"/></a>
                        </td>
                        <?php
                            if($Page == 1){
                        ?>
                        <td>
                            <?php
                                $idP = $value->idP;
                                if($idP==0){
                                    echo 'Hình chung';
                                }else{
                                    echo $this->get->kmt_get_col_where('kmt_trangweb','TenTrang',array('idP'=>$idP));
                                }
                            ?>
                        </td>
                        <?php }?>
                        <?php
                            if($TieuBieu == 1){
                        ?>
                        <td>
                               <?php if($value->TieuBieu==1){?>
                                 <a href="javascript:void(0)" onclick="udp_status('<?=$url?>','idH','TieuBieu', 0)">
                                    <img src="<?=base_url()?>public/admin/img/on.gif"/>
                                 </a>
                               <?php }else{?>
                                 <a href="javascript:void(0)" onclick="udp_status('<?=$url?>','idH','TieuBieu', 1)">
                                    <img src="<?=base_url()?>public/admin/img/off.gif"/>
                                 </a>
                               <?php }?>
                        </td>
                        <?php }?>
                        <td><a onclick="return confirm('Bạn có chắc muốn xóa hình ảnh đã chọn!')" href="<?=base_url()?>same_method/del_one/kmt_hinhanh/<?=$value->idH?>"><img src="<?=base_url()?>public/admin/img/b_drop.png"/></a></td>
                        <td><?=date('d-m-Y h:i:s',strtotime($value->NgayCapNhat))?></td>
                    </tr>
                    <?php $i++;}?>
                </table>
            
            </form>
            <!-- Begin kmt_admin_bar_3-->
            <div class="kmt_admin_bar_3">
                <p>
                    <a href="<?=base_url()?>admin_img/add_img_album/<?=$MaHinh?>"><input type="button" value="Thêm một hình"/></a>
                    
                    <input class="button_admin" id="bt_ud" type="button" value="Sắp xếp"/>
                    
                    <select onchange="changeForm();" id="selectBox">
                        <option value="0">Thao tác nhanh</option>
                        <?php
                            if($TieuBieu == 1){
                        ?>
                        <option value="1">Chọn là tiêu biểu</option>
                        <option value="2">Bỏ chọn là tiêu biểu</option>
                        <?php }?>
                        <option value="3">Hiền thị</option>
                        <option value="4">Không hiền thị</option>
                        <option value="5">Xóa</option>
                    </select>
                    
                </p>
                
                <p>
                    <?php
                        if($NhieuHinh == 1){
                    ?>
                    <a href="<?=base_url()?>admin_img/add_list_img_album/<?=$MaHinh?>"><input type="button" value="Thêm nhiều hình"/></a>
                    <?php }?>
                    <input class="button_admin" id="bt_del" type="submit" value="Xóa chọn"/>
                    <?php
                        if($Page == 1){
                    ?>
                    <select id="idP_filter">
                        <?php
                            foreach($list_page as $value_p){
                        ?>
                            <?php 
                            if($idP_f == 0){
                            ?>
                                <option value="<?=$value_p->idP?>"><?=$value_p->TenTrang?></option>
                            
                            <?php }else{?>
                                <option <?php if($idP_f == $value_p->idP){ echo 'selected="selected"';}?> value="<?=$value_p->idP?>"><?=$value_p->TenTrang?></option>
                            <?php }?>
                        <?php }?>
                            
                    </select>
                    <input type="button" value="Lọc" class="button" onclick="window.location='<?=base_url()?>admin_img/img_filter/'+document.getElementById('idP_filter').value+'/'+<?=$idLH?>"/>
                    <?php } ?>
                </p>
            </div>
            <!-- End kmt_admin_bar_3-->
            <p style="margin-top: 25px;clear: both;">Tổng số hàng : <span style="color: red;font-weight: bold;"><?=$count_row?></span></p>
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->

<script type="text/javascript">
	   $('#bt_ud').click(function() {
	        var url = "<?=base_url()?>same_method/ud_numbers/kmt_hinhanh/idH";
            if(confirm('Bạn có chắc muốn cập nhật thay đổi thứ tự?')==true){
                $("#form").attr("action", url);
                $('#form').submit();
            }else{
                return false;
            }
       });
       
       $('#bt_del').click(function() {
	        var url = "<?=base_url()?>same_method/del_all/kmt_hinhanh";
            if(confirm(' Bạn có chắc muốn xóa các hình ảnh đã chọn?')==true){
                $("#form").attr("action", url);
                $('#form').submit();
            }else{
                return false;
            }
       });
       
       function changeForm() {
    	   var selectBox = document.getElementById("selectBox");
    	   var selectedValue = selectBox.options[selectBox.selectedIndex].value;
           var url = "<?=base_url()?>same_method/upp_status_list/kmt_hinhanh/idH/1";
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
                        url = "<?=base_url()?>same_method/upp_status_list/kmt_hinhanh/idH/2";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;
                    case '3': 
                        url = "<?=base_url()?>same_method/upp_status_list/kmt_hinhanh/idH/3";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;      
                    case '4': 
                        url = "<?=base_url()?>same_method/upp_status_list/kmt_hinhanh/idH/4";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;
                    default:
                        if(confirm('Bạn có chắc muốn xóa những hình ảnh này ko?')==true){
                            var url = "<?=base_url()?>same_method/del_all/kmt_hinhanh";
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