<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="<?php echo base_url()?>public/img/favi.gif" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<title><?php echo $title?></title>
<!-- Seo Meta --> 
<meta name="description" content="<?php echo $description?>"/> 
<meta name="keywords" content="<?php echo $keywords?>"/> 
<!-- Facebook meta -->  
<meta property="og:locale" content="vi_VN"/> 
<meta property="og:type" content="article"/> 
<meta property="og:title" content="<?php echo $title?>"/> 
<meta property="og:description" content="<?php echo $description?>"/> 
<meta property="og:image" content="<?php echo base_url($image_page)?>" />
<meta property="og:image:width" content="250" />
<meta property="og:image:height" content="250" />
<meta property="og:url" content="<?php echo $url_page?>" />
<meta property="og:site_name" content="<?php echo NAME_VI?>"/> 
<link href="<?php echo base_url()?>public/css/bootstrap.min.css" rel="stylesheet"/>
<link href="<?php echo base_url()?>public/css/mb_styles.css" rel="stylesheet"/>
<link href="<?php echo base_url()?>public/css/mb_kmt_styles.css" rel="stylesheet"/>
<link href="<?php echo base_url()?>public/css/slideshow.css" rel="stylesheet" />
<link href="<?php echo base_url()?>public/css/minimal-menu.css" rel="stylesheet" />
<link href="<?php echo base_url()?>public/css/font-awesome.min.css" rel="stylesheet" />	
<script src="<?php echo base_url()?>public/js/jquery-1.7.2.min.js"></script>
    
</head>

<body>

    <h1 style="display:none"><?php echo $title?></h1>
    
    <!-- Begin wrap_block_1 -->
    <div id="wrap_block_1" <?php if($page!=1){echo 'class="not_home"';}?>>
        
        <div class="container">
            <div class="row">
                
                <div class="col-lg-2 col-md-2 col-xs-12 wrap_logo">
                    <a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>public/img/logo.png" title="<?php if($this->lan=='vi'){echo NAME_VI;}else{echo NAME_EN;}?>" alt="<?php if($this->lan=='vi'){echo NAME_VI;}else{echo NAME_EN;}?>"/></a>
                </div>
                
                <div class="col-lg-10 col-md-10 col-xs-12 wrap_lang_menu_cart">
                    
                    <div class="row">
                        
                        <div class="col-xs-12 wrap_lang">
                            <a href="<?php echo base_url('change/vi')?>">VN</a>
                            <a href="<?php echo base_url('change/en')?>">EN</a>
                        </div>
                        
                                                                   
                        <div class="col-xs-12 wrap_menu_cart">
                            
                            <div class="row">
                                
                                <div class="col-lg-11 col-md-11 col-xs-12 wrap_menu">
                                    
                                    <!-- START - MINIMAL CSS3 MENU -->
                                    <label class="minimal-menu-button" for="mobile-nav">Menu</label>
                                    <input class="minimal-menu-button" type="checkbox" id="mobile-nav" name="mobile-nav" />
                                    <div class="minimal-menu clr-black">
                                        <?php
                                          if($this->lan=='vi'){
                                        ?>
                                        <ul>
                                           <li <?php if($page==1){echo 'id="active_top"';}?>><a href="<?php echo base_url()?>">Trang chủ</a></li>
                                           <li <?php if($page==3){echo 'id="active_top"';}?>>
                                           		<a href="<?php echo base_url('san-pham')?>">Sản phẩm</a>
                                           </li>
                                           <li <?php if($page==4){echo 'id="active_top"';}?> class="submenu">
                                                
                                                <a href="<?php echo base_url('mua-hang')?>">Mua hàng</a>
                                                <input class="show-submenu" type="checkbox" id="show-submenu-1" name="show-submenu-1"/>
                                                
                                           		<ul>
                                                   <?php
                                                        foreach($this->menu as $value){
                                                            $idMN_1 = $value->idMN_1;
                                                            $Ten = $value->Ten_vi;
                                                            $Url = base_url().'danh-muc-san-pham/'.mb_strtolower(url_title(removesign($Ten))).'-'.$idMN_1;
                                                   ?> 
                                                   <li><a href="<?php echo $Url?>">&#8226;&nbsp; <?php echo $Ten?></a></li>
                                                   <?php }?>
                                                </ul>
                                           </li>
                                           <li <?php if($page==5){echo 'id="active_top"';}?>><a href="<?php echo base_url('download')?>">Tải</a></li>
                                           <li <?php if($page==6){echo 'id="active_top"';}?>><a href="<?php echo base_url('ho-tro')?>">Hỗ trợ</a></li>
                                           <li <?php if($page==7){echo 'id="active_top"';}?>><a href="<?php echo base_url('lien-he')?>">Liên hệ</a></li>
                                           <li <?php if($page==2){echo 'id="active_top"';}?>><a href="<?php echo base_url('gioi-thieu')?>">Giới thiệu</a></li>
                                           <?php
                                                if($this->session->userdata('client_login')==TRUE){
                                           ?>
                                           <li <?php if($page==11){echo 'id="active_top"';}?>><a href="<?php echo base_url('my-account/'.$this->session->userdata('idU_c'))?>">Tài khoản</a></li>
                                           <li><a href="<?php echo base_url('logout')?>">Đăng xuất</a></li>
                                           <?php }else{?>
                                           <li <?php if($page==10){echo 'id="active_top"';}?>><a href="<?php echo base_url('register')?>">Đăng ký</a></li>
                                           <li <?php if($page==9){echo 'id="active_top"';}?>><a href="<?php echo base_url('login')?>">Đăng nhập</a></li>
                                           <?php }?>
                                           
                                         </ul>
                                        <?php }else{?>
                                        <ul class="kmt_menu">
                                           <li <?php if($page==1){echo 'id="active_top"';}?>><a href="<?php echo base_url()?>">Home</a></li>
                                           <li <?php if($page==3){echo 'id="active_top"';}?>>
                                           		<a href="<?php echo base_url('products')?>">Products</a>
                                           </li>
                                           <li <?php if($page==4){echo 'id="active_top"';}?> class="submenu">
                                           	    <a href="<?php echo base_url('purchase')?>">Purchase</a>
                                                <input class="show-submenu" type="checkbox" id="show-submenu-1" name="show-submenu-1"/>
                                                <ul>
                                                   <?php
                                                        foreach($this->menu as $value){
                                                            $idMN_1 = $value->idMN_1;
                                                            $Ten = $value->Ten_en;
                                                            $Url = base_url().'product-catalog/'.mb_strtolower(url_title(removesign($Ten))).'-'.$idMN_1;
                                                   ?> 
                                                   <li><a href="<?php echo $Url?>">&#8226;&nbsp; <?php echo $Ten?></a></li>
                                                   <?php }?>
                                                </ul>
                                           </li>
                                           <li <?php if($page==5){echo 'id="active_top"';}?>><a href="<?php echo base_url('download')?>">Downloads</a></li>
                                           <li <?php if($page==6){echo 'id="active_top"';}?>><a href="<?php echo base_url('support')?>">Support</a></li>
                                           <li <?php if($page==7){echo 'id="active_top"';}?>><a href="<?php echo base_url('contact')?>">Contact</a></li>
                                           <li <?php if($page==2){echo 'id="active_top"';}?>><a href="<?php echo base_url('about')?>">About Us</a></li>
                                           <?php
                                                if($this->session->userdata('client_login')==TRUE){
                                           ?>
                                           <li <?php if($page==11){echo 'id="active_top"';}?>><a href="<?php echo base_url('my-account/'.$this->session->userdata('idU_c'))?>">Account</a></li>
                                           <li><a href="<?php echo base_url('logout')?>">Logout</a></li>
                                           <?php }else{?>
                                           <li <?php if($page==10){echo 'id="active_top"';}?>><a href="<?php echo base_url('register')?>">Sign Up</a></li>
                                           <li <?php if($page==9){echo 'id="active_top"';}?>><a href="<?php echo base_url('login')?>">Log In</a></li>
                                           <?php }?> 
                                         </ul>
                                        <?php }?>
                                     </div>
                                     <!-- END - MINIMAL CSS3 MENU -->
                                    
                                </div>
                                
                                <div class="col-lg-1 col-md-1 col-xs-12 wrap_cart">
                                    <a href="<?php echo base_url('your-cart')?>">
                                       <i class="fa fa-shopping-cart" aria-hidden="true"></i> : (<?php echo count($this->cart->contents())?>)
                                     </a>
                                </div>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
            
            <?php if($page==1){?>
            <div class="row">
                <div class="col-xs-7 wrap_des_home">
                    <div class="slider">
                        <p class="title"><?php if($this->lan=='vi'){echo 'Sản phẩm nổi bật';}else{echo 'Featured Products';}?></p>
    
                        <div class="points">
                            <?php
                              $i=1;
                              foreach($this->menu as $value){
                                  $idMN_1 = $value->idMN_1;
                                  if($this->lan=='vi'){
                                    $Ten = $value->Ten_vi;
                                    $Url = base_url().'phan-mem/'.mb_strtolower(url_title(removesign($Ten))).'-'.$idMN_1;
                                  }else{
                                    $Ten = $value->Ten_en;
                                    $Url = base_url().'software/'.mb_strtolower(url_title(removesign($Ten))).'-'.$idMN_1;
                                  }
                            ?> 
                        	<span data-id="<?php echo $i?>" <?php if($i==1){echo 'class="active"';}?>></span>
                            <?php $i++;}?>
                        </div>
    
                        <div class="inner">
                            <div class="overflow">
                                <div class="line" style="left: 0px;">
                                    <?php
                                      $i=1;
                                      foreach($this->menu as $value){
                                          $idMN_1 = $value->idMN_1;
                                          if($this->lan=='vi'){
                                            $Ten = $value->Ten_vi;
                                            $MoTa = $value->MoTa_vi;
                                            $Url = base_url().'phan-mem/'.mb_strtolower(url_title(removesign($Ten))).'-'.$idMN_1;
                                          }else{
                                            $Ten = $value->Ten_en;
                                            $MoTa = $value->MoTa_en;
                                            $Url = base_url().'software/'.mb_strtolower(url_title(removesign($Ten))).'-'.$idMN_1;
                                          }
                                    ?>
                                    <div class="item" data-id="<?php echo $i?>">
                                        <p class="name"><?php echo $Ten?></p>
                                        <p class="text">
                                           <?php echo word_limiter($MoTa,35)?>
                                           <a href="<?php echo $Url?>"></a>
                                        </p>
                                    </div>
                                    <?php $i++;}?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
        
        </div>
        
    </div>
    <!-- End wrap_block_1 -->