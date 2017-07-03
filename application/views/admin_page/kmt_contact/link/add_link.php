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
        <h1>THÊM LIÊN KẾT</h1>
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
                <form action="<?=base_url()?>admin_contact/save_link" method="post">
                    <table class="kmt_admin_addarticles">
                        <tr>
                            <td class="right" style="width: 200px;">Tên liên kết:</td>
                            <td class="left">
                                <input name="TenLK_vi" class="kmt_textinput" type="text" placeholder="Nhập tên liên kết ..." required="required"/>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="right" style="width: 200px;">Đường dẫn:</td>
                            <td class="left">
                                <input name="Link" class="kmt_textinput" type="text" placeholder="Đường dẫn ..." required="required"/>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>&nbsp;</td>
                            <td class="left">
                                 <input type="submit" value="Thêm mới"/>
                                <a href="<?=base_url()?>admin_contact/link_web">
                                    <input type="button" value="Quay lại"/>
                                </a>
                            </td>
                        </tr>
    
                    </table>
                </form>
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->