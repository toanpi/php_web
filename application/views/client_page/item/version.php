<!-- Begin wrap_block_2 -->
    <div id="wrap_block_2" class="container kmt_inside">
        
        
        <?php
                 foreach($item as $value){  
                    $idIT = $value->idIT;
                    $MaSo = $value->MaSo;
                    $MaHinh = $value->MaHinh;
                    $list_img = $this->get->kmt_get_where('kmt_hinhanh',array('MaHinh'=>$MaHinh));
                    $list_video = $this->get->kmt_get_where('kmt_video',array('MaHinh'=>$MaHinh));
                                       
                    if($this->lan=='vi'){
                        $TenIT = $value->Ten_vi;
                        $MoTa = $value->MoTa_vi;
                    }else{
                        $TenIT = $value->Ten_en;
                        $MoTa = $value->MoTa_en;
                    }
                    
                 }                       
        ?>
        <div class="row wrap_center">
        
           <div class="col-lg-9 col-md-8 col-xs-12 wrap_detail_pd_left">
           		<div class="kmt_title"><span><?php echo $Ten?></span></div>
                
                <div class="row">
                	
                    <p class="title_dt_pd"><?php if($this->lan=='vi'){echo 'Tổng quan';}else{echo 'Overview';}?></p>
                    
                    <div class="content_article">
                    	<?php echo $MoTa?>
                    </div>
                    
                </div>
                
           </div>
           
           <div class="col-lg-3 col-md-4 col-xs-12 wrap_detail_pd_right wrap_action_purchase_dt kmt_left">
               <form action="<?php echo base_url('upload-file')?>" method="post" enctype="multipart/form-data" id="kmt_multi_order">
                   <input type="hidden" id="kmt_IT" name="kmt_name_c" value=""/>
                   <input type="hidden" id="kmt_code" name="kmt_code" value=""/>
                        
                    <?php
                        $con_prices = array('idIT'=>$idIT,'TrangThai'=>1);
                        $order_prices = array('DonGia'=>'ASC');
                        $list_prices = $this->get->kmt_get_where('kmt_list_prices',$con_prices,$order_prices);
                        $prices_bg = 0;
                        $idPL_bg = 0;
                        if(isset($list_prices[0])){
                          $idPL_bg = $list_prices[0]->idPL;
                          $prices_bg = $list_prices[0]->DonGia;
                        }
                    ?>
                	<h3>$<?php echo $prices_bg?></h3>
                    <h4><?php echo $TenIT?></h4>
                    <div>
                    	<p><?php if($this->lan=='vi'){echo 'Loại bản quyền';}else{echo 'License type';}?>:</p>
                        <p>
                            	<select id="kmt_select_<?php echo $idIT?>">
                                    <?php
                                        foreach($list_prices as $value){
                                    ?>
                                	<option data-code="<?php echo $value->MaSo?>" value="<?php echo $value->idPL.'|'.$value->DonGia?>"><?php echo $value->ThoiGian?></option>
                                    <?php }?>
                                </select>
                        </p>
                        
                    </div>
                    <div class="kmt_bt_purchase">
                       <?php if($this->lan=='vi'){echo 'Tải lên tệp yêu cầu gia hạn (zip,rar)';}else{echo 'Upload request license file (zip,rar)';}?>: 
                       <a href="javascript:void(0)" class="img_upload"><img src="<?php echo base_url()?>public/img/icon_upload.png" title="<?php $TenIT?>" alt="<?php $TenIT?>"/></a>
        			   <input class="bt_upload" type="file" data-code="<?php echo $MaSo?>" name="file_<?php echo $idIT?>" />
                                    
                    </div>
                    <h4 class="odb_version"><a data-href="<?php echo base_url('add-to-cart/'.$idIT)?>" href="<?php echo base_url('add-to-cart/'.$idIT.'/'.$idPL_bg)?>"><?php if($this->lan=='vi'){echo 'Mua';}else{echo 'Order';}?></a></h4>
                        
                    <ul>
                    	<li><a href="<?php echo base_url('purchase')?>">&#8226;&nbsp; <?php if($this->lan=='vi'){echo 'Danh mục sản phẩm';}else{echo 'Product Catalog';}?></a></li>
                        <li><a href="<?php echo base_url('shopping-guide')?>">&#8226;&nbsp; <?php if($this->lan=='vi'){echo 'Hướng dẫn mua hàng';}else{echo 'Shopping Guide';}?></a></li>
                    </ul>
                </form>
           </div>
        	
        </div>
        
        <script type="text/javascript" src="<?php echo base_url()?>public/js/jquery.fancybox.js?v=2.1.5"></script>
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/jquery.fancybox.css?v=2.1.5" media="screen" />
    
    
    
    	<script type="text/javascript">
    		$(document).ready(function() {
    
                $('.fancybox-buttons').fancybox({
    				openEffect  : 'none',
    				closeEffect : 'none',
                    prevEffect : 'none',
    				nextEffect : 'none',
                    closeBtn  : true,
    			});
                
            });
    	</script>

        
        <div class="row" style="margin-bottom:20px;">
            <p class="title_dt_pd"><?php if($this->lan=='vi'){echo 'Ảnh chụp màn hình';}else{echo 'Screenshots';}?></p>
            <p><?php if($this->lan=='vi'){echo 'Click vào ảnh để phóng to';}else{echo 'Click on the image to enlarge';}?></p>
            
            <div class="kmt_arr" id="kmt_pre">
               <a href="javascript:void(0)"><span></span></a>
            </div>
            <div id="wrap_screen">
            	
                <ul class="wrap_screen">
                	<?php
                        foreach($list_img as $value){
                    ?>
                    <li>
                    	<a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo base_url($value->UrlHinh)?>"><img src="<?php echo base_url($value->UrlHinh)?>" title="<?php echo $TenIT?>" alt="<?php echo $TenIT?>"/></a>
                    </li>
                    <?php }?>
                </ul>
                
            </div>
            <div class="kmt_arr" id="kmt_next">
                  <a href="javascript:void(0)"><span></span></a>
            </div>
                    
        </div>
        
        <div class="row" style="margin-bottom:20px;">
            <p class="title_dt_pd"><?php if($this->lan=='vi'){echo 'Video tổng quan';}else{echo 'Video Tours';}?></p>
                    
            <?php
               foreach($list_video as $value){
                    $Url_video = $value->Url_video;
                    if($this->lan=='vi'){
                        $Ten = $value->TenV_vi;
                        $MoTa = $value->MoTa_vi;
                    }else{
                        $Ten = $value->TenV_en;
                        $MoTa = $value->MoTa_en;
                    }
            ?>
            <div class="col-lg-3 col-xs-6 wrap_video">
                <div class="block_video">
                  	<div class="video_dt">
                    	<iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $Url_video?>" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <h3><a target="_blank" href="https://www.youtube.com/embed/<?php echo $Url_video?>"><?php echo $Ten?></a></h3>
                    <div>
                    	<?php echo $MoTa?>
                    </div>
                </div>
            </div>
            <?php }?>        
         </div>
        
    </div>
    <!-- End wrap_block_2 -->