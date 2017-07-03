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
        <h1>INFO SYSTEM</h1>
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
                     foreach($info as $value){
                    ?>
                    <tr>
                        <td class="right" style="width: 200px;">Email nhận phản hồi :</td>
                        <td class="left"><?=$value->Email_mess?></td>
                    </tr>
                    <tr>
                        <td class="right" style="width: 200px;">Email nhận đặt hàng :</td>
                        <td class="left"><?=$value->Email_order?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td class="left">
                            <a href="<?=base_url()?>admin_contact/edit_info_system">
                                <input type="button" class="kmt_buttoninput" value="Chỉnh sửa"/>
                            </a>
                        </td>
                    </tr>
                    <?php }?>
                </table>
            
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->