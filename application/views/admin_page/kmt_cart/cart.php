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
        <h1>
            <?php if($TrangThai=='0'){echo 'ĐƠN HÀNG MỚI';}else{echo 'ĐƠN HÀNG ĐÃ DUYỆT';}?>
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
                        <?php echo $link?>
                    </div>
                </div>
                
            </div>
            <!-- End kmt_admin_bar_1-->
            
            <form action="" method="post" id="form">
                <table class="kmt_admin_table">
                    <tr class="kmt_admin_titletable">
                        <td><input type="checkbox" onclick="checkall('item', this)" class="checkbox"/></td>
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
                    <input type="hidden" name="id[]" value="<?php echo $value->idDH?>"/>
                    <tr <?php if($i%2==0){echo "class='kmt_admin_c1'";}else{echo "class='kmt_admin_c2'";}?>>
                        <td><input class="item" type="checkbox" value="<?php echo $value->idDH?>" name="id_check[]"/></td>
                        <td><?php echo $i;?></td>
                        <td>
                           <a href="<?php echo base_url()?>admin_cart/cart_details/<?php echo $value->idDH?>"><?php echo $value->MaDH?></a>
                        </td>
                        <td>$<?php echo $value->TongTien?></td>
                        <td><a onclick="return confirm('Bạn có chắc muốn xóa đơn hàng đã chọn!')" href="<?php echo base_url()?>same_method/del_one/kmt_donhang/<?php echo $value->idDH?>"><img src="<?php echo base_url()?>public/admin/img/b_drop.png"/></a></td>
                        <td><?php echo date('d-m-Y G:i:s',strtotime($value->NgayCapNhat))?></td>
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
            <p style="margin-top: 25px;clear: both;">Tổng số hàng : <span style="color: red;font-weight: bold;"><?php echo $count_row?></span></p>
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->

<script type="text/javascript">

       
       $('#bt_del').click(function() {
	        var url = "<?php echo base_url()?>same_method/del_all/kmt_donhang";
            if(confirm('Bạn có chắc muốn xóa đơn hàng đã chọn?')==true){
                $("#form").attr("action", url);
                $('#form').submit();
            }else{
                return false;
            }
       });

</script>