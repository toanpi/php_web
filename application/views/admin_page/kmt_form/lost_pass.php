<?php
    $rs = -1;
    if($this->uri->segment_array()>$rs){
        $rs = end($this->uri->segment_array());
        $list_stt = explode('-',$rs);
        $rs = $list_stt[0]; 
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="<?=base_url()?>public/img/favi.gif" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link href="<?=base_url()?>public/admin/css/admin_style.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <div id="kmt_wrap_login">
        
        <h1>Vui lòng nhập địa chỉ email quản trị để tiến hành khôi phục mật khẩu.</h1>
        <div id="kmt_form_login">
            <div id="kmt_form_login_left">
                
                <div>
                    <img src="<?=base_url()?>public/img/logo.png"/>
                </div>
                
            </div>
            <div id="kmt_form_login_right">
                <form action="<?=base_url()?>khoi-phuc-mat-khau-quan-tri" method="post">
                    <ul class="kmt_title_form_login">
                        <li>Email quản trị:</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                    </ul>
                    <ul class="kmt_element_form_login">
                        <li><input name="email" class="input_text" type="email" placeholder="Nhập email quản trị ...." required="required"/></li>
                        <li>
                            <input class="bt_ad" type="submit" value="Lấy lại mật khẩu"/>
                            <a href="<?=base_url(URL_ADMIN)?>"><input class="bt_ad" type="button" value="Quay lại"/></a>
                        </li>
                    </ul>
                </form>
                <p class="note" style="text-align: center;padding: 0px 10px;line-height: 20px;"><br />
                <?php if($rs=="success"){?>
                    Mật khẩu đã được phục hồi, vui lòng vào Email quản trị để lấy mật khẩu mới.
                <?php }elseif($rs=="fail"){?>
                    Vui lòng nhập đúng Email quản trị.
                <?php }else{}?>
                </p>
            </div>
        </div>
        
    </div>

</body>
</html>