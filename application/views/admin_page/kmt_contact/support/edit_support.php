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
        <h1>CẬP NHẬT HỖ TRỢ TRỰC TUYẾN</h1>
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
                <?php
                    foreach($support as $value){
                        $Yahoo = $value->Yahoo;
                        $Skype = $value->Skype;
                        $SDT = $value->SDT;
                        $Email = $value->Email;
                    }
                ?>
                <form action="<?=base_url()?>admin_contact/update_support" method="post">
                    <input type="hidden" value="<?=$value->idHT?>" name="idHT"/>
                    <table class="kmt_admin_addarticles">
                        <tr>
                            <td class="right" style="width: 200px;">Tên tài khoản:</td>
                            <td class="left">
                                <input name="TenTK_vi" value="<?=$value->TenTK_vi?>" class="kmt_textinput" type="text" placeholder="Nhập tên tài khoản ..." />
                            </td>
                        </tr>
                        <tr class="kmt_hidden">
                            <td class="right" style="width: 200px;">Tên tài khoản (en):</td>
                            <td class="left">
                                <input name="TenTK_en" value="<?=$value->TenTK_en?>" class="kmt_textinput" type="text" placeholder="Nhập tên tài khoản ..." />
                            </td>
                        </tr>
                        <tr>
                            <td class="right" style="width: 200px;">Skype:</td>
                            <td class="left"> 
                                <input name="Skype" value="<?=$Skype?>" class="kmt_textinput" type="text" placeholder="Nhập tài khoản skype ..."/>
                            </td>
                        </tr>
                        <tr>
                            <td class="right" style="width: 200px;">Điện thoại:</td>
                            <td class="left">
                                <input name="SDT" value="<?=$SDT?>" class="kmt_textinput" type="text" placeholder="Nhập số điện thoại ..." required="required"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="right" style="width: 200px;">Email:</td>
                            <td class="left">
                                <input name="Email" value="<?=$Email?>" class="kmt_textinput" type="text" placeholder="Nhập email hỗ trợ ..."/>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td class="left">
                                 <input type="submit" class="kmt_buttoninput" value="Cập nhật thông tin"/>
                                <a href="<?=base_url()?>admin_contact/support">
                                    <input class="kmt_buttoninput" type="button" value="Quay lại"/>
                                </a>
                            </td>
                        </tr>
    
                    </table>
                </form>
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->