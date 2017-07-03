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
        <h1>THÔNG TIN TÀI KHOẢN QUẢN LÝ WEBSITE</h1>
        <div id="kmt_admin_content">
            
            <!-- Begin kmt_admin_bar_1-->
            <div class="kmt_admin_bar_1">
                
                <div class="kmt_admin_search">
                    <span class="note" style="padding: 0px 10px;">
                        <?php
                            if($rs=="success"){
                                echo 'Thao tác thành công';
                            }elseif($rs=="fail"){
                                echo 'Thao tác thất bại vui lòng nhập đúng mật khẩu quản trị';
                            }else{}
                        ?>
                    </span>
                </div>
                
            </div>
            <!-- End kmt_admin_bar_1-->
            <?php
                foreach($users as $value){
                    $TaiKhoan = $value->TaiKhoan;
                    $HoTen = $value->HoTen;
                    $Email = $value->Email;
                }
            ?>
            
            <form action="<?=base_url()?>users_method/update_admin" method="post">
                <input type="hidden" value="<?=$value->idU?>" name="idU"/>
                <table class="kmt_admin_addarticles">
                    <tr>
                        <td class="right">Tài khoản:</td>
                        <td class="left">
                            <input class="kmt_textinput" value="<?=$TaiKhoan?>" type="text" readonly="readonly"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="right">Họ tên:</td>
                        <td class="left">
                            <input class="kmt_textinput" name="HoTen" value="<?=$HoTen?>" type="text"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="right">Email:</td>
                        <td class="left">
                            <input class="kmt_textinput" name="Email" value="<?=$Email?>" type="email"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="right">Mật khẩu mới:</td>
                        <td class="left">
                            <input class="kmt_textinput" autocomplete="off" name="MatKhau" type="password" placeholder="Nhập nếu muốn đổi mật khẩu khác"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="right">Mật khẩu quản trị:</td>
                        <td class="left">
                            <input class="kmt_textinput" autocomplete="off" name="MatKhauCu" type="password" placeholder="Bắt buộc nhập nếu muốn thay đổi thông tin" required="required"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" class="kmt_buttoninput" value="Cập nhật thông tin"/>
                            <input type="reset" class="kmt_buttoninput" value="Nhập lại"/>
                        </td>
                    </tr>
                </table>

            
            </form>
            
            <div style="color: red;padding: 10px;">
                <p>- Email tài khoản để phục hồi mật khẩu.</p>
                <p>- Nhập lại mật khẩu cũ để thay đổi thông tin.</p>
                <p>- Bỏ qua mật khẩu mới nếu không muốn đổi mật khẩu.</p>
                <p>- Trường hợp quên tên đăng nhập vui lòng liên hệ kỹ thuật.</p>
            </div>
            
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->