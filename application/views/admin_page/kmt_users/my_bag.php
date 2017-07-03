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
        <h1 style="text-transform: uppercase;">
            DANH SÁCH ĐƠN HÀNG CỦA <?=$HoTen?> [ Mã thành viên: <?=$MaKH?> ]
        </h1>
        <div id="kmt_admin_content">
            
            <!-- Begin kmt_admin_bar_1-->
            <div class="kmt_admin_bar_1">
                
                <div class="kmt_admin_search">
                    <span class="note" style="padding: 0px 10px;">
                        <?php
                            if($stt==0){
                                if($rs=="success"){
                                    echo 'Thành công';
                                }elseif($rs=="fail"){
                                    echo 'Thất bại';
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
                        <td>Mã DH</td>
                        <td>Tổng giá trị</td>
                        <td>Thao tác</td>
                        <td>Ngày đặt hàng</td>
                    </tr>
                    <?php 
                     $i=1;
                     foreach ($order as $value){
                        $url = base_url().'same_method/udp_status/kmt_donhang/'.$value->idDH.'/';
                    ?>
                    <input type="hidden" name="id[]" value="<?=$value->idDH?>"/>
                    <tr <?php if($i%2==0){echo "class='kmt_admin_c1'";}else{echo "class='kmt_admin_c2'";}?>>
                        <td><input class="item" type="checkbox" value="<?=$value->idDH?>" name="id_check[]"/></td>
                        <td><a href="<?=base_url()?>admin_contact/edit_support/<?=$value->idDH?>"><img src="<?=base_url()?>public/admin/img/b_edit.png"/></a></td>
                        <td><?=$i;?></td>
                        <td>
                           <a href="<?=base_url()?>admin_cart/cart_details/<?=$value->idDH?>" target="_blank"><?=$value->MaDH?></a>
                        </td>
                        <td><?=number_format($value->TongTien,0,'.',',')?> vnđ</td>
                        <td><a onclick="return confirm('Bạn có chắc muốn xóa đơn hàng đã chọn!')" href="<?=base_url()?>same_method/del_one/kmt_donhang/<?=$value->idDH?>"><img src="<?=base_url()?>public/admin/img/b_drop.png"/></a></td>
                        <td><?=date('d-m-Y h:i:s',strtotime($value->NgayCapNhat))?></td>
                    </tr>
                    <?php $i++;}?>
                </table>
            </form>
            <!-- Begin kmt_admin_bar_3-->
            <div class="kmt_admin_bar_3">
                <p>
                    <input class="button_admin" id="bt_del" type="submit" value="Xóa chọn"/>
                </p>
            </div>
            <!-- End kmt_admin_bar_3-->
            <p style="margin-top: 25px;clear: both;">Tổng số hàng : <span style="color: red;font-weight: bold;"><?=$count_row?></span></p>
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->

<script type="text/javascript">

       
       $('#bt_del').click(function() {
	        var url = "<?=base_url()?>same_method/del_all/kmt_donhang";
            if(confirm('Bạn có chắc muốn xóa đơn hàng đã chọn?')==true){
                $("#form").attr("action", url);
                $('#form').submit();
            }else{
                return false;
            }
       });

</script>