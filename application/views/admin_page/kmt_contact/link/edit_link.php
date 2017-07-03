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
        <h1>C?P NH?T LIÊN K?T</h1>
        <div id="kmt_admin_content">
            
            <!-- Begin kmt_admin_bar_1-->
            <div class="kmt_admin_bar_1">
                
                <div class="kmt_admin_search">
                    <span class="note" style="padding: 0px 10px;">
                        <?php
                            if($rs=="success"){
                                echo 'Thao tác thành công';
                            }elseif($rs=="fail"){
                                echo 'Thao tác th?t b?i';
                            }else{}
                        ?>
                    </span>
                </div>
                
            </div>
            <!-- End kmt_admin_bar_1-->
                <?php
                    foreach($link_web as $value){
                   
                ?>
                <form action="<?=base_url()?>admin_contact/update_link" method="post">
                    <input type="hidden" value="<?=$value->idLK?>" name="idLK"/>
                    <table class="kmt_admin_addarticles">
                        <tr>
                            <td class="right" style="width: 200px;">Tên liên kết:</td>
                            <td class="left">
                                <input name="TenLK_vi" value="<?=$value->TenLK_vi?>" class="kmt_textinput" type="text" placeholder="Nh?p tên liên k?t ..." required="required"/>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="right" style="width: 200px;">Đường dẫn:</td>
                            <td class="left">
                                <input name="Link" value="<?=$value->Link?>" class="kmt_textinput" type="text" placeholder="Nhập đường dẫn ..." required="required"/>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>&nbsp;</td>
                            <td class="left">
                                 <input type="submit" value="Cập nhật thông tin"/>
                                <a href="<?=base_url()?>admin_contact/link_web">
                                    <input type="button" value="Quay lại"/>
                                </a>
                            </td>
                        </tr>
    
                    </table>
                </form>
                <?php }?>
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->