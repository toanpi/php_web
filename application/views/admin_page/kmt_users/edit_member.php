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
        <h1>CẬP NHẬT THÔNG TIN TÀI KHOẢN</h1>
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
                <?php
                    foreach($member as $value){
                        $idU = $value->idU; 
                        $Email = $value->Email; 
                        $Name = $value->HoTen;
                        $Gender = $value->GioiTinh;
                        $Birth_d = explode('-',$value->NgaySinh);
                        $Phone = $value->SDT;
                        $Address = $value->DiaChi;  
                    }
                ?>
                <form action="<?=base_url()?>users_method/update_member" method="post">
                    <input type="hidden" value="<?=$idU?>" name="idU"/>
                    <table class="kmt_admin_addarticles">
                        <tr>
                            <td class="right" style="width: 200px;">Email:</td>
                            <td class="left">
                                <input name="email" value="<?=$Email?>" class="kmt_textinput" type="email" readonly="readonly"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="right" style="width: 200px;">Mật khẩu:</td>
                            <td class="left">
                                <input name="pass" class="kmt_textinput" type="text" placeholder="Nhập mật khẩu nếu muốn thay dổi ..." />
                            </td>
                        </tr>
                        <tr>
                            <td class="right" style="width: 200px;">Tên tài khoản:</td>
                            <td class="left">
                                <input name="name" value="<?=$Name?>" class="kmt_textinput" required="required" type="text" placeholder="Nhập tên đại lý ..." />
                            </td>
                        </tr>
                        <tr>
                            <td class="right" style="width: 200px;">Số điện thoại:</td>
                            <td class="left">
                                <input name="phone" value="<?=$Phone?>" class="kmt_textinput" required="required" type="text" placeholder="Vui lòng nhập số điện thoại..." />
                            </td>
                        </tr>
                        <tr>
                            <td class="right" style="width: 200px;">Địa chỉ:</td>
                            <td class="left">
                                <input name="address" value="<?=$Address?>" class="kmt_textinput" required="required" type="text" placeholder="Vui lòng nhập số điện thoại..." />
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td class="left">
                                 <input type="submit" class="kmt_buttoninput" value="Cập nhật"/>
                                <a href="<?=base_url()?>users_method/member">
                                    <input type="button" class="kmt_buttoninput" value="Quay lại"/>
                                </a>
                            </td>
                        </tr>
    
                    </table>
                </form>
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->