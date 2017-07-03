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
        $.post('<?=base_url()?>admin_menu/list_menu_2/'+<?=$idMN_1_aj?>, {}, function(data){
            $('#idMN_2_filter').html(data);
        });
        
        $.post('<?=base_url()?>admin_menu/list_menu_3/'+<?=$idMN_1_aj?>+'/'+<?=$idMN_2_aj?>, {}, function(data){
            $('#idMN_3_filter').html(data);
        });
        
        $(document).on('change','#idMN_1_filter',function(){
            idMN_1 = $(this).val();
            $.post('<?=base_url()?>admin_menu/list_menu_2/'+idMN_1, {}, function(data){
            $('#idMN_2_filter').html(data);
            });
        });
        
        $(document).on('change','#idMN_2_filter',function(){
            idMN_1 = $('#idMN_1_filter').val();
            idMN_2 = $(this).val();
            $.post('<?=base_url()?>admin_menu/list_menu_3/'+idMN_1+'/'+idMN_2, {}, function(data){
            $('#idMN_3_filter').html(data);
            });
        });      
</script>
<!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1>DANH MỤC sản phẩm mới</h1>
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
                    <form action="<?=base_url()?>admin_item/item_search" method="post">
                        <input name="keyword" type="text" required="required" placeholder="Nhập từ khóa ..."/>
                        <input type="hidden" value=""/>
                        <input type="submit" value="Tìm kiếm"/>
                    </form>
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
                        <td>Tên sản phẩm</td>
                        <td>Hình đại diện</td>
                        <td>Danh mục 1</td>
                        <td>Danh mục 2</td>
                        <td class="kmt_hidden">Danh mục 3</td>
                        <td>Mới</td>
                        <td class="kmt_hidden">File</td>
                        <td class="kmt_hidden">Video</td>
                        <td>Thao tác</td>
                        <td>Lần hiệu chỉnh trước</td>
                    </tr>
                    <?php 
                     $i=1;
                     foreach ($item as $value){
                        $url = base_url().'same_method/udp_status/kmt_item/'.$value->idIT.'/';
                    ?>
                    <input type="hidden" name="id[]" value="<?=$value->idIT?>"/>
                    <tr <?php if($i%2==0){echo "class='kmt_admin_c1'";}else{echo "class='kmt_admin_c2'";}?>>
                        <td><input class="item" type="checkbox" value="<?=$value->idIT?>" name="id_check[]"/></td>
                        <td><a href="<?=base_url()?>admin_item/edit_item/<?=$value->idIT?>"><img src="<?=base_url()?>public/admin/img/b_edit.png"/></a></td>
                        <td><input type="text" value="<?=$value->STT?>" name="stt[]"/></td>
                        <td>
                           <?php if($value->TrangThai==1){?>
                             <a href="javascript:void(0)" onclick="udp_status('<?=$url?>','idIT','TrangThai', 0)">
                                <img src="<?=base_url()?>public/admin/img/on.gif"/>
                             </a>
                           <?php }else{?>
                             <a href="javascript:void(0)" onclick="udp_status('<?=$url?>','idIT','TrangThai', 1)">
                                <img src="<?=base_url()?>public/admin/img/off.gif"/>
                             </a>
                           <?php }?>
                        </td>
                        <td><?=$value->Ten_vi?></td>
                        <td>
                            <?php
                                $MaHinh = $value->MaHinh;
                                $con_img = array('MaHinh'=>$MaHinh,'TieuBieu'=>1);
                                $UrlHinh = $this->get->kmt_get_col_where('kmt_hinhanh','UrlHinh',$con_img);
                            ?>
                            <a href="<?=base_url($UrlHinh)?>" class="fancybox"><img src="<?=base_url($UrlHinh)?>" width="60px"/></a>
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
                            <?php
                                $idMN_3 = $value->idMN_3;
                                echo $this->get->kmt_get_col_where('kmt_menu_3','Ten_vi',array('idMN_3'=>$idMN_3));
                            ?>
                        </td>
                        
                        <td>
                           <?php if($value->BanChay==1){?>
                             <a href="javascript:void(0)" onclick="udp_status('<?=$url?>','idIT','BanChay', 0)">
                                <img src="<?=base_url()?>public/admin/img/on.gif"/>
                             </a>
                           <?php }else{?>
                             <a href="javascript:void(0)" onclick="udp_status('<?=$url?>','idIT','BanChay', 1)">
                                <img src="<?=base_url()?>public/admin/img/off.gif"/>
                             </a>
                           <?php }?>
                        </td>
                        
                        <td class="kmt_hidden"><a href="<?=base_url()?>admin_file/file/1/<?=$value->MaHinh?>">File</a></td>
                        <td class="kmt_hidden"><a href="<?=base_url()?>admin_file/video/1/<?=$value->MaHinh?>">Video</a></td>
                        <td><a onclick="return confirm('Bạn có chắc muốn xóa các sản phẩm đã chọn?')" href="<?=base_url()?>same_method/del_one/kmt_item/<?=$value->idIT?>"><img src="<?=base_url()?>public/admin/img/b_drop.png"/></a></td>
                        <td><?=date('d-m-Y h:i:s',strtotime($value->NgayCapNhat))?></td>
                    </tr>
                    <?php $i++;}?>
                </table>
            </form>
            <!-- Begin kmt_admin_bar_3-->
            <div class="kmt_admin_bar_3">
                <p style="width: 100%;text-align: left;">
                    <a href="<?=base_url()?>admin_item/add_item"><input type="button" value="Thêm mới"/></a>
                    <input class="button_admin" id="bt_ud" type="button" value="Sắp xếp"/>
                    
                    <select onchange="changeForm();" id="selectBox">
                        <option value="0">Thao tác nhanh</option>
                        <option value="5">Sản phẩm mới</option>
                        <option value="6">Bỏ chọn sản phẩm mới</option>
                        <option value="3">Hiền thị</option>
                        <option value="4">Không hiền thị</option>
                        <option value="10">Xóa</option>
                    </select>
                    <input class="button_admin" id="bt_del" type="submit" value="Xóa chọn"/>
                    
                </p>
                
                
            </div>
            <!-- End kmt_admin_bar_3-->
            <p style="margin-top: 25px;clear: both;">Tổng số hàng : <span style="color: red;font-weight: bold;"><?=$count_row?></span></p>
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->

<script type="text/javascript">
	   $('#bt_ud').click(function() {
	        var url = "<?=base_url()?>same_method/ud_numbers/kmt_item/idIT";
            if(confirm('Bạn có chắc muốn cập nhật thay đổi thứ tự?')==true){
                $("#form").attr("action", url);
                $('#form').submit();
            }else{
                return false;
            }
       });
       
       $('#bt_del').click(function() {
	        var url = "<?=base_url()?>same_method/del_all/kmt_item";
            if(confirm(' Bạn có chắc muốn xóa các sản phẩm đã chọn?')==true){
                $("#form").attr("action", url);
                $('#form').submit();
            }else{
                return false;
            }
       });
       
       function changeForm() {
    	   var selectBox = document.getElementById("selectBox");
    	   var selectedValue = selectBox.options[selectBox.selectedIndex].value;
           var url = "<?=base_url()?>same_method/upp_status_list/kmt_item/idIT/1";
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
                        url = "<?=base_url()?>same_method/upp_status_list/kmt_item/idIT/2";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;
                    case '3': 
                        url = "<?=base_url()?>same_method/upp_status_list/kmt_item/idIT/3";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;      
                    case '4': 
                        url = "<?=base_url()?>same_method/upp_status_list/kmt_item/idIT/4";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;
                    case '5': 
                        url = "<?=base_url()?>same_method/upp_status_list/kmt_item/idIT/5";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;      
                    case '6': 
                        url = "<?=base_url()?>same_method/upp_status_list/kmt_item/idIT/6";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;
                    default:
                        if(confirm('Bạn có chắc muốn xóa những sản phẩm này ko?')==true){
                            var url = "<?=base_url()?>same_method/del_all/kmt_item";
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