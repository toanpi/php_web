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
    
    foreach($type_article as $value_t){
        $Nhom = $value_t->Nhom;
        $Has_child = $value_t->Has_child;
        $HinhAnh = $value_t->HinhAnh;
        $TieuBieu = $value_t->TieuBieu;
    }
                     
?>
<!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1 style="text-transform: uppercase;">KẾT QUẢ TÌM KIẾM BÀI VIẾT THUỘC MỤC - <?=$title_type_articles?></h1>
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
                    <form action="<?=base_url()?>admin_articles/articles_search" method="post">
                        <input name="keyword" type="text" required="required" placeholder="Nhập từ khóa ..."/>
                        <input name="idLBV" value="<?=$idLBV?>" type="hidden"/>
                        <input type="submit" value="Tìm kiếm"/>
                    </form>
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
                        <td>Tiêu đề bài viết</td>
                        <?php
                            if($Has_child == 1){
                        ?>
                        <td>Bài viết con</td>
                        <?php }?>
                        <?php
                            if($HinhAnh == 1){
                        ?>
                        <td>Hình đại diện</td>
                        <?php }?>
                        <?php
                            if($Nhom == 1){
                        ?>
                        <td>Thuộc nhóm</td>
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
                     foreach($articles as $value){
                        $url_p = str_replace('success','',str_replace('fail','',current_url()));
                        $head = base_url();
                        $url_p = 'to/'.str_replace($head,'',$url_p).'/end';
                        $url = base_url().'same_method/udp_status/kmt_baiviet/'.$value->idBV.'/';
                    ?>
                     <input type="hidden" name="id[]" value="<?=$value->idBV?>"/>
                     <tr <?php if($i%2==0){echo "class='kmt_admin_c1'";}else{echo "class='kmt_admin_c2'";}?>>
                        <td><input class="item" type="checkbox" value="<?=$value->idBV?>" name="id_check[]"/></td>
                        <td><a href="<?=base_url()?>admin_articles/edit_articles/<?=$value->idBV?>"><img src="<?=base_url()?>public/admin/img/b_edit.png"/></a></td>
                        <td><input type="text" value="<?=$value->STT?>" name="stt[]"/></td>
                        <td>
                               <?php if($value->TrangThai==1){?>
                                 <a href="javascript:void(0)" onclick="udp_status('<?=$url?>','idBV','TrangThai', 0)">
                                    <img src="<?=base_url()?>public/admin/img/on.gif"/>
                                 </a>
                               <?php }else{?>
                                 <a href="javascript:void(0)" onclick="udp_status('<?=$url?>','idBV','TrangThai', 1)">
                                    <img src="<?=base_url()?>public/admin/img/off.gif"/>
                                 </a>
                               <?php }?>
                        </td>
                        <td><?=$value->TieuDe_vi?></td>
                        <?php
                            if($Has_child == 1){
                        ?>
                        <td>
                            <a href="<?php echo base_url('admin_articles/articles_child/'.$value->idBV)?>">Danh sách bài viết</a>
                        </td>
                        <?php }?>
                        <?php
                            if($HinhAnh == 1){
                        ?>
                        <td>
                                <?php
                                    $MaHinh = $value->MaHinh;
                                    $con_img = array('MaHinh'=>$MaHinh);
                                    $UrlHinh = base_url().$this->get->kmt_get_col_where('kmt_hinhanh','UrlHinh',$con_img);
                                ?>
                                <a href="<?=$UrlHinh?>" class="fancybox"><img src="<?=$UrlHinh?>" width="60px"/></a>
                        </td>
                        <?php }?>
                        <?php
                            if($Nhom == 1){
                        ?>
                        <td>
                            <?php
                                $idNBV = $value->idNBV;
                                echo $this->get->kmt_get_col_where('kmt_nhombaiviet','TenNhom_vi',array('idNBV'=>$idNBV));
                            ?>
                        </td>
                        <?php }?>
                        <?php
                            if($TieuBieu == 1){
                        ?>
                        <td>
                               <?php if($value->TieuBieu==1){?>
                                 <a href="javascript:void(0)" onclick="udp_status('<?=$url?>','idBV','TieuBieu', 0)">
                                    <img src="<?=base_url()?>public/admin/img/on.gif"/>
                                 </a>
                               <?php }else{?>
                                 <a href="javascript:void(0)" onclick="udp_status('<?=$url?>','idBV','TieuBieu', 1)">
                                    <img src="<?=base_url()?>public/admin/img/off.gif"/>
                                 </a>
                               <?php }?>
                        </td>
                        <?php }?>
                        <td><a onclick="return confirm('Bạn có chắc muốn xóa bài viết đã chọn!Nếu còn bài viết con bạn sẽ không xóa được bài viết này!')" href="<?=base_url()?>same_method/del_one_check/kmt_baiviet/<?=$value->idBV?>"><img src="<?=base_url()?>public/admin/img/b_drop.png"/></a></td>
                        <td><?=date('d-m-Y h:i:s',strtotime($value->NgayCapNhat))?></td>
                    </tr>
                    <?php $i++;}?>
                </table>
            
            </form>
            <!-- Begin kmt_admin_bar_3-->
            <div class="kmt_admin_bar_3">
                <p>
                    <a href="<?=base_url()?>admin_articles/add_articles/<?=$idLBV?>"><input type="button" value="Thêm mới"/></a>
                    <input class="button_admin bt_ud" type="button" value="Sắp xếp"/>
                    
                    <select class="selectBox">
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
                    <input class="button_admin bt_copy" type="button" value="Sao chép"/>
                    <input class="button_admin bt_del" type="submit" value="Xóa chọn"/>
                    
                </p>
            </div>
            <!-- End kmt_admin_bar_3-->
            <p style="margin-top: 25px;clear: both;">Tổng số hàng : <span style="color: red;font-weight: bold;"><?=$count_row?></span></p>
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->

<script type="text/javascript">
	   $(this).on('click', '.bt_ud', function() { 
	        var url = "<?=base_url()?>same_method/ud_numbers/kmt_baiviet/idBV";
            if(confirm('Bạn có chắc muốn cập nhật thay đổi thứ tự?')==true){
                $("#form").attr("action", url);
                $('#form').submit();
            }else{
                return false;
            }
       });
       
       $(this).on('click', '.bt_copy', function() { 
	        var url = "<?=base_url()?>admin_articles/articles_copy/<?=$idLBV?>";
            if(confirm('Bạn có chắc muốn sao chép các bài viết đã chọn?')==true){
                $("#form").attr("action", url);
                $('#form').submit();
            }else{
                return false;
            }
       });
       
        $(this).on('click', '.bt_del', function() { 
	        var url = "<?=base_url()?>same_method/del_all_check/kmt_baiviet";
            if(confirm(' Bạn có chắc muốn xóa các bài viết đã chọn? Nếu còn bài viết con bạn sẽ không xóa được bài viết này!')==true){
                $("#form").attr("action", url);
                $('#form').submit();
            }else{
                return false;
            }
       });
       
       $(this).on('change','.idNBV_filter', function() { 
            if(this.value=='0'){
                window.location='<?php echo base_url()?>admin_articles/articles/'+<?php echo $idLBV?>;
            }else{
                window.location='<?php echo base_url()?>admin_articles/articles_filter/'+this.value+'/'+<?php echo $idLBV?>;
            }
       });
       
       $(this).on('change','.idMN_1_filter', function() { 
            if(this.value=='0'){
                window.location='<?php echo base_url()?>admin_articles/articles/'+<?php echo $idLBV?>;
            }else{
                window.location='<?php echo base_url()?>admin_articles/articles_filter_item/'+this.value+'/'+<?php echo $idLBV?>;
            }
       });
       
       $(this).on('change','.selectBox', function() {
    	   var selectedValue = this.value;
           var url = "<?=base_url()?>same_method/upp_status_list/kmt_baiviet/idBV/1";
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
                        url = "<?=base_url()?>same_method/upp_status_list/kmt_baiviet/idBV/2";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;
                    case '3': 
                        url = "<?=base_url()?>same_method/upp_status_list/kmt_baiviet/idBV/3";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;      
                    case '4': 
                        url = "<?=base_url()?>same_method/upp_status_list/kmt_baiviet/idBV/4";
                        $("#form").attr("action", url);
                        $('#form').submit();
                        break;
                    default:
                        if(confirm('Bạn có chắc muốn xóa những bài viết này ko?Nếu còn bài viết con bạn sẽ không xóa được bài viết này!')==true){
                            var url = "<?=base_url()?>same_method/del_all_check/kmt_baiviet";
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