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
        <h1>THÔNG TIN HỆ THỐNG</h1>
        <div id="kmt_admin_content">
            
            <!-- Begin kmt_admin_bar_1-->
            <div class="kmt_admin_bar_1">
                
                <div class="kmt_admin_search">
                    <span class="note" style="padding: 0px 10px;">
                        <?php
                            if($rs=="success"){
                                echo 'Successful';
                            }elseif($rs=="fail"){
                                echo 'Fails';
                            }else{}
                        ?>
                    </span>
                </div>
                
            </div>
            <!-- End kmt_admin_bar_1-->

                <form action="<?php echo base_url()?>admin_contact/update_info_system" method="post">
                <table class="kmt_admin_addarticles">
                    <?php 
                     foreach($info as $value){
                    ?>
                    <tr>
                        <td class="right" style="width: 200px;">Email nhận phản hồi :</td>
                        <td class="left">
                            <input name="Email_mess" type="email" value="<?php echo $value->Email_mess?>" class="kmt_textinput" type="text" placeholder="Email nhận phản hồi  ..." required="required"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="right" style="width: 200px;">Email nhận đơn hàng :</td>
                        <td class="left">
                            <input name="Email_order" type="email" value="<?php echo $value->Email_order?>" class="kmt_textinput" type="text" placeholder="Email nhận phản hồi  ..." required="required"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="right" style="width: 200px;">Css code :</td>
                        <td class="left">
                            <textarea class="kmt_textarea" name="Css_code" style="height: 450px;"><?php echo $value->Css_code?></textarea>
                        </td>
                    </tr>
                    
                    <tr>
                            <td colspan="2">
                                <input type="submit" class="kmt_buttoninput" value="Cập nhật"/>
                                <input type="reset" class="kmt_buttoninput" value="Nhập lại"/>
                                <a href="<?php echo base_url()?>admin_contact/info_system"><input type="button" class="kmt_buttoninput" value="Quay lại"/></a>
                            </td>
                    </tr>
                    <?php }?>
                </table>
                </form>
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->