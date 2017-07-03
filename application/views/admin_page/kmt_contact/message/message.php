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
        <h1>THÔNG TIN PHẢN HỒI</h1>
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
                        <td>STT</td>
                        <td>Tiêu đề</td>
                        <td>Người gửi</td>
                        <td>Tên công ty</td>
                        <td>Email</td>
                        <td>SDT</td>
                        <td>Nội dung tin nhắn</td>
                        <td>Thao tác</td>
                        <td>Ngày gửi</td>
                    </tr>
                    <?php 
                     $i=1;
                     foreach ($message as $value){
                        $url = base_url().'same_method/udp_status/kmt_lienhe/'.$value->idMS.'/';
                    ?>
                    <input type="hidden" name="id[]" value="<?=$value->idMS?>"/>
                    <tr <?php if($i%2==0){echo "class='kmt_admin_c1'";}else{echo "class='kmt_admin_c2'";}?>>
                        <td><input class="item" type="checkbox" value="<?=$value->idMS?>" name="id_check[]"/></td>
                        <td><?=$i?></td>
                        <td><?=$value->TieuDe?></td>
                        <td><?=$value->HoTen?></td>
                        <td><?=$value->TenCTY?></td>
                        <td><?=$value->Email?></td>
                        <td><?=$value->SDT?></td>
                        <td><?=$value->NoiDung?></td>
                        <td><a onclick="return confirm('Bạn có chắc muốn xóa tin nhắn đã chọn!')" href="<?=base_url()?>same_method/del_one/kmt_lienhe/<?=$value->idMS?>"><img src="<?=base_url()?>public/admin/img/b_drop.png"/></a></td>
                        <td><?=date('d-m-Y h:i:s',strtotime($value->NgayTao))?></td>
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
	        var url = "<?=base_url()?>same_method/del_all/kmt_lienhe";
            if(confirm(' Bạn có chắc muốn xóa các tin nhắn đã chọn?')==true){
                $("#form").attr("action", url);
                $('#form').submit();
            }else{
                return false;
            }
       });

</script>