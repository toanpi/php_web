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
        <h1>Bảng giá</h1>
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
                
            </div>
            <!-- End kmt_admin_bar_1-->
            
            <form action="" method="post" id="form">
                <table class="kmt_admin_table">
                    <tr class="kmt_admin_titletable">
                        <td>&nbsp;</td>
                        <td>STT</td>
                        <td>Hiển thị</td>
                        <td>Mã số</td>
                        <td>Thời hạn</td>
                        <td>Đơn giá</td>
                        <td>Thao tác</td>
                        <td>Lần hiệu chỉnh trước</td>
                    </tr>
                    <?php 
                     $i=1;
                     foreach ($list_prices as $value){
                        $url = base_url().'same_method/udp_status/kmt_list_prices/'.$value->idPL.'/';
                    ?>
                    <input type="hidden" name="id[]" value="<?php echo $value->idPL?>"/>
                    <tr <?php if($i%2==0){echo "class='kmt_admin_c1'";}else{echo "class='kmt_admin_c2'";}?>>
                        <td><a href="<?php echo base_url()?>admin_item/edit_list_prices/<?php echo $value->idPL?>"><img src="<?php echo base_url()?>public/admin/img/b_edit.png"/></a></td>
                        <td><?php echo $i;?></td>
                        <td>
                           <?php if($value->TrangThai==1){?>
                             <a href="javascript:void(0)" onclick="udp_status('<?php echo $url?>','idPL','TrangThai', 0)">
                                <img src="<?php echo base_url()?>public/admin/img/on.gif"/>
                             </a>
                           <?php }else{?>
                             <a href="javascript:void(0)" onclick="udp_status('<?php echo $url?>','idPL','TrangThai', 1)">
                                <img src="<?php echo base_url()?>public/admin/img/off.gif"/>
                             </a>
                           <?php }?>
                        </td>
                        <td><?php echo $value->MaSo?></td>
                        <td><?php echo $value->ThoiGian?></td>
                        <td>$<?php echo $value->DonGia?></td>
                        
                        <td><a onclick="return confirm('Bạn có chắc muốn xóa các đơn giá đã chọn?')" href="<?php echo base_url()?>same_method/del_one/kmt_list_prices/<?php echo $value->idPL?>"><img src="<?php echo base_url()?>public/admin/img/b_drop.png"/></a></td>
                        <td><?php echo date('d-m-Y h:i:s',strtotime($value->NgayCapNhat))?></td>
                    </tr>
                    <?php $i++;}?>
                </table>
            </form>
            <!-- Begin kmt_admin_bar_3-->
            <div class="kmt_admin_bar_3">
                <p>
                    <a href="<?php echo base_url()?>admin_item/add_list_prices/<?php echo $idIT?>"><input type="button" value="Thêm mới"/></a>
                    <a href="<?php echo base_url()?>admin_item/item"><input type="button" value="Quay lại"/></a>
                
                </p>
                
            </div>
            <!-- End kmt_admin_bar_3-->
            <p style="margin-top: 25px;clear: both;">Tổng số hàng : <span style="color: red;font-weight: bold;"><?php echo $count_row?></span></p>
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->
