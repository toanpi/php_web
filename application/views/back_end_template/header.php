<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="<?php echo base_url()?>public/img/favi.gif" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản trị <?php echo DOMAIN_NAME?></title>
<link href="<?php echo base_url()?>public/admin/css/admin_style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>public/css/jquery.fancybox.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url()?>public/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>public/js/jquery.fancybox.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>public/admin/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>public/admin/ckfinder/ckfinder.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>public/admin/js/kmt_script.js" type="text/javascript"></script>
<script type="text/javascript">
		$(document).ready(function() {
			$(".fancybox").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});
            
            triggered = false;
            $("body").on("mouseleave", function (e) {
                console.log(e.offsetY, $(window).scrollTop())
                if (e.offsetY - $(window).scrollTop() < 0 && !triggered) {
                    //triggered = true;
                    //alert("leave");
                }
            });
		});
</script>
<script type="text/javascript">
	$(document).ready(function() {
        $(".tabs-menu a").click(function(event) {
            event.preventDefault();
            $(this).parent().addClass("current");
            $(this).parent().siblings().removeClass("current");
            var tab = $(this).attr("href");
            $(".tab-content").not(tab).css("display", "none");
            $(tab).fadeIn();
        });
    });
</script>

</head>
<body>

 <!-- Begin kmt_admin_top-->
 <div id="kmt_admin_top">
    
    <div id="kmt_admin_top_all">
        <div id="kmt_admin_logo">
            <a href="<?php echo base_url()?>admin_home"><img src="<?php echo base_url()?>public/admin/img/logo_admin.png"/></a>
        </div>

        <div id="kmt_admin_icon">
            <p style="text-transform: uppercase;">
                HỆ THỐNG QUẢN TRỊ <?php echo DOMAIN_NAME?><br />
                XIN CHÀO : <a href="<?php echo base_url()?>users_method/admin"><?php echo  $this->session->userdata('HoTen'); ?></a>
            </p>
            <p>
                <a href="<?php echo base_url()?>admin_login/logout" title="Đăng xuất"><img src="<?php echo base_url()?>public/admin/img/exit.png"/></a>
            </p>
        </div>
    </div>
    
 </div>
 <!-- End kmt_admin_top-->
 
 <!-- Begin kmt_admin_middle-->
 <div id="kmt_admin_middle">
    
    <!-- Begin kmt_admin_middle_left-->
    <div id="kmt_admin_middle_left">
        
        <ul id="kmt_admin_menuleft">
            
            <li class="kmt_admin_titlemenu">Quản lý phần mềm</li>
            <li><a href="<?php echo base_url()?>admin_menu/menu_1">&#10140; Phần mềm</a></li>
            <li><a href="<?php echo base_url()?>admin_item/item">&#10140; Phiên bản</a></li>
            
            <li class="kmt_admin_titlemenu">Quản lý bài viết</li>
            <li><a href="<?php echo base_url()?>admin_articles/articles/1">&#10140; Giới thiệu</a></li>
            <li><a href="<?php echo base_url()?>admin_articles/articles/2">&#10140; Tin tức</a></li>
            <li><a href="<?php echo base_url()?>admin_articles/articles/3">&#10140; Hướng dẫn mua hàng</a></li>
            <li><a href="<?php echo base_url()?>admin_articles/articles/4">&#10140; Hỗ trợ</a></li>
            
            <li class="kmt_admin_titlemenu">Quản lý file</li>
            <li><a href="<?php echo base_url()?>admin_file/file">&#10140; File</a></li>
            
            <li class="kmt_admin_titlemenu">Quản lý đơn hàng</li>
            <li><a href="<?=base_url()?>admin_cart/index/0">&#10140; Đơn hàng mới</a></li>
            <li><a href="<?=base_url()?>admin_cart/index/1">&#10140; Đơn hàng đã duyệt</a></li>
            
            <li class="kmt_admin_titlemenu">Quản lý thành viên</li>
            <li><a href="<?=base_url()?>users_method/member/1">&#10140; Tài khoản đang hoạt động</a></li>
            <li><a href="<?=base_url()?>users_method/member/0">&#10140; Tài khoản tạm khóa</a></li>
            
            <li class="kmt_admin_titlemenu">Quản lý chung</li>
            <li><a href="<?php echo base_url()?>admin_contact/message">&#10140; Thông tin phản hồi</a></li>
            <li><a href="<?php echo base_url()?>admin_seo">&#10140; Tiêu đề - Mô tả - Từ khóa</a></li>
            <li><a href="<?php echo base_url()?>admin_contact/social">&#10140; Mạng xã hội</a></li>
            <li class="kmt_hidden"><a href="<?php echo base_url()?>admin_contact/support">&#10140; Hỗ trợ trực tuyến</a></li>
            <li><a href="<?php echo base_url()?>admin_contact">&#10140; Địa chỉ công ty</a></li>
            <li><a href="<?php echo base_url()?>admin_contact/info_system">&#10140; Thông tin hệ thống</a></li>
            <li><a href="<?php echo base_url()?>users_method/admin">&#10140; Tài khoản quản trị</a></li>
        </ul>
        
    </div>
    <!-- Begin kmt_admin_middle_left-->