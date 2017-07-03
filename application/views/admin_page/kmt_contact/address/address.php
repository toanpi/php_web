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
        <h1>ĐỊA CHỈ LIÊN HỆ</h1>
        <div id="kmt_admin_content">
            
            <!-- Begin kmt_admin_bar_1-->
            <div class="kmt_admin_bar_1">
                
                <div class="kmt_admin_search">
                    <span class="note" style="padding: 0px 10px;">
                        <?php
                            if($rs=="success"){
                                echo 'Thao tác thành công';
                            }elseif($rs=="fail"){
                                echo 'Thao tác thất bại';
                            }else{}
                        ?>
                    </span>
                </div>
                
            </div>
            <!-- End kmt_admin_bar_1-->

                
                <table class="kmt_admin_addarticles">
                    <?php 
                     foreach($address_top as $value_top){
                    ?>
                    <tr>
                        <td colspan="2"><h2>Địa chỉ trang liên hệ</h2></td>
                    </tr>
                    <tr>
                        <td class="right" style="width: 200px;">Địa chỉ:</td>
                        <td class="left"><?php echo $value_top->NoiDung_vi?></td>
                    </tr>
                    <tr>
                        <td class="right" style="width: 200px;">Bản đồ :</td>
                        <td class="left" style="height: 350px;"><?php echo $value_top->BanDo?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td class="left">
                            <a href="<?php echo base_url()?>admin_contact/edit_address/1">
                                <input class="kmt_buttoninput" type="button" value="Chỉnh sửa thông tin"/>
                            </a>
                        </td>
                    </tr>
                    <?php }?>
                    
                    

                </table>
                
                <table class="kmt_admin_addarticles">
                    <?php 
                     foreach($address_bottom as $value_bottom){
                    ?>
                    <tr>
                        <td colspan="2"><h2>Địa chỉ chân trang</h2></td>
                    </tr>
                    <tr>
                        <td class="right" style="width: 200px;">Địa chỉ:</td>
                        <td class="left"><?php echo $value_top->NoiDung_vi?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td class="left">
                            <a href="<?php echo base_url()?>admin_contact/edit_address/2">
                                <input class="kmt_buttoninput" type="button" value="Chỉnh sửa thông tin"/>
                            </a>
                        </td>
                    </tr>
                    <?php }?>
                    
                    

                </table>
            
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->