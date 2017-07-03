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
        <h1>ĐƯỜNG DẪN MẠNG XÃ HỘI</h1>
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
                     foreach($social as $value){
                    ?>
                    <tr>
                        <td class="right" style="width: 200px;">Facebook:</td>
                        <td class="left"><?=$value->Facebook?></td>
                    </tr>
                    <tr>
                        <td class="right" style="width: 200px;">Google +:</td>
                        <td class="left"><?=$value->Google?></td>
                    </tr>
                    <tr>
                        <td class="right" style="width: 200px;">Twitter:</td>
                        <td class="left"><?=$value->Twitter?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td class="left">
                            <a href="<?=base_url()?>admin_contact/edit_social">
                                <input type="button" class="kmt_buttoninput" value="Chỉnh sửa thông tin"/>
                            </a>
                        </td>
                    </tr>
                    <?php }?>
                </table>
            
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->