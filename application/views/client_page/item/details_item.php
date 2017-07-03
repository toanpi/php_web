<link href="<?php echo base_url()?>public/css/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url()?>public/js/jquery.fancybox.js" type="text/javascript" ></script>
<script type="text/javascript">
            $(document).ready(function() {
                $(".fancybox").fancybox({
    				helpers: {title : {type : 'outside'},overlay : {speedOut : 0}}
    			});
    
            });
    
            
    
</script>  
<!-- Begin wrap_block_8 -->
    <div id="wrap_block_8" class="container">
        
        <div class="row">
        	
            <div class="col-lg-12">
            	
                <div class="kmt_title_left">
                	<span><?php echo $Ten?></span>
                </div>
                
                <?php
                 foreach($item as $value){  
                    $idIT = $value->idIT;
                    $MaHinh = $value->MaHinh;
                    $UrlHinh = base_url().$this->get->kmt_get_col_where('kmt_hinhanh','UrlHinh',array('MaHinh'=>$MaHinh,'TieuBieu'=>1),null,array(1,0));
                    $list_img = $this->get->kmt_get_where('kmt_hinhanh',array('MaHinh'=>$MaHinh),array('TieuBieu'=>'DESC'));
                                         
                    if($this->lan=='vi'){
                        $TenIT = $value->Ten_vi;
                        $HangMuc = $value->HangMuc_vi;
                        $TienDo = $value->TienDo_vi;
                        $DiaChi = $value->DiaChi_vi;
                        $KhachHang = $value->KhachHang_vi;
                        $Url_it  = base_url().'du-an/'.mb_strtolower(url_title(removesign($TenIT))).'-'.$idIT;
                    }else{
                        $TenIT = $value->Ten_en;
                        $HangMuc = $value->HangMuc_vi;
                        $TienDo = $value->TienDo_vi;
                        $DiaChi = $value->DiaChi_en;
                        $KhachHang = $value->KhachHang_en;
                        $Url_it  = base_url().'project/'.mb_strtolower(url_title(removesign($TenIT))).'-'.$idIT;
                    }
                 }                       
                ?>
                <!-- Begin wrap_img_project_dt -->
                <div id="wrap_img_project_dt">
                    <a href="<?php echo  $UrlHinh?>" class="fancybox"><img src="<?php echo  $UrlHinh?>" title="<?php echo  $TenIT?>" alt="<?php echo  $TenIT?>"/></a>
                </div>
                <!-- End wrap_img_project_dt -->
                
                <ul id="list_thumbs">
                	<?php
                      foreach($list_img as $value_thumb){
                           $UrlHinh = base_url().$value_thumb->UrlHinh;
                   ?>
                    <li>
                        <a href="<?php echo $UrlHinh?>" title="<?php echo $TenIT?>"><img src="<?php echo $UrlHinh?>" title="<?php echo $TenIT?>" alt="<?php echo $TenIT?>"/></a>
                    </li>
                    <?php }?>
                
                </ul>
                
                <div class="row wrap_info_pj">
                	
                    <div class="col-lg-4 col-md-4 col-xs-6 info_pj">
                    	<h4><?php if($this->lan=='vi'){echo 'Tên công trình';}else{echo 'The name of construction';}?> : </h4>
                        <p class="kmt_red"><?php echo $TenIT?></p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-6 info_pj">
                    	<h4><?php if($this->lan=='vi'){echo 'Hạng mục';}else{echo 'Item';}?> : </h4>
                        <p><?php echo $HangMuc?></p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-6 info_pj">
                    	<h4><?php if($this->lan=='vi'){echo 'Tiến độ';}else{echo 'Progress';}?> : </h4>
                        <p><?php echo $TienDo?></p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-6 info_pj">
                    	<h4><?php if($this->lan=='vi'){echo 'Địa chỉ';}else{echo 'Address';}?> : </h4>
                        <p><?php echo $DiaChi?></p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-6 info_pj">
                    	<h4><?php if($this->lan=='vi'){echo 'Khách hàng';}else{echo 'Customer';}?> : </h4>
                        <p><?php echo $KhachHang?></p>
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
        <div class="row" style="margin-top:30px;">
        	
            <div class="col-lg-12">
            	
                <div class="kmt_title_left">
                	<span><?php if($this->lan=='vi'){echo 'Dự án khác';}else{echo 'Other projects';}?></span>
                </div>
                
                <div class="row">
                	
                    <?php
                       foreach($same_item as $value){
                          $MaHinh = $value->MaHinh;
                          $UrlHinh = base_url().$this->get->kmt_get_col_where('kmt_hinhanh','UrlHinh',array('MaHinh'=>$MaHinh,'TieuBieu'=>1),null,array(1,0));
                          $idIT = $value->idIT;
                          if($this->lan=='vi'){
                              $Ten = $value->Ten_vi;
                              $HangMuc = $value->HangMuc_vi;
                              $TienDo = $value->TienDo_vi;
                              $Url_it = base_url().'du-an/'.mb_strtolower(url_title(removesign($Ten))).'-'.$idIT;
                          }else{
                               $Ten = $value->Ten_en;
                               $HangMuc = $value->HangMuc_en;
                               $TienDo = $value->TienDo_en;
                               $Url_it = base_url().'project/'.mb_strtolower(url_title(removesign($Ten))).'-'.$idIT;
                          }
                    ?>
                    
                    <div class="col-lg-3 col-md-4 col-xs-6 wrap_project">
                    	
                        <div class="block_project">
                        	<div class="img_project">
                            	<a href="<?php echo $Url_it?>" title="<?php echo $Ten?>"><img src="<?php echo $UrlHinh?>" title="<?php echo $Ten?>" alt="<?php echo $Ten?>"/></a>
                            </div>
                            <div class="hover_project" onclick="window.location='<?php echo $Url_it?>'">
                            	<h3><?php echo $Ten?></h3>
                                <p><?php if($this->lan=='vi'){echo 'Hạng mục';}else{echo 'Item';}?> : <?php echo $HangMuc?></p>
                                <p><?php if($this->lan=='vi'){echo 'Tiến độ';}else{echo 'Progress';}?> : <?php echo $TienDo?></p>
                            </div>
                        </div>
                        
                    </div>
                    <?php }?>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    <!-- End wrap_block_8 -->