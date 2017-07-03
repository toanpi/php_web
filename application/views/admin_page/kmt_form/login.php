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
        
        <h1>Xin chào bạn đã đến với trang quản trị <?php echo DOMAIN_NAME?></h1>
        <div id="kmt_form_login">
            <div id="kmt_form_login_left">
                
                <div>
                    <img src="<?=base_url()?>public/img/logo.png"/>
                </div>
                
            </div>
            <div id="kmt_form_login_right">
                <form action="<?=base_url()?>kiem-tra-dang-nhap-quan-tri" method="post">
                    <ul class="kmt_title_form_login">
                        <li>Tên truy cập :</li>
                        <li>Mật khẩu :</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                    </ul>
                    <ul class="kmt_element_form_login">
                        <li><input name="user" class="input_text" type="text" placeholder="Nhập tên truy cập ...." required="required"/></li>
                        <li><input name="pass" class="input_text" type="password" placeholder="Nhập mật khẩu ...." required="required"/></li>
                        <li>
                            <input class="bt_ad" type="submit" value="Đăng nhập"/>
                            <input class="bt_ad" type="reset" value="Nhập lại"/>
                        </li>
                        <li><a href="<?=base_url()?>quen-mat-khau-quan-tri">Quên mật khẩu ?</a></li>
                    </ul>
                </form>
            </div>
        </div>
        
    </div>

</body>
</html>