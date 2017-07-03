    <!-- Begin wrap_block_2 -->
    <div id="wrap_block_2" class="container kmt_inside">
        
        
        
        <div class="row wrap_center">
        	
           <div class="kmt_title"><span><?php if($this->lan=='vi'){echo 'Tải';}else{echo 'Downloads';}?></span></div>
           <div class="content_article">
           	    You can download evaluation versions of our products and try them for 30 days. You can also download these files if you'd like to upgrade your product to the latest version. To download a product, click on a link in the Download Link column. Each product includes a detailed help file in the English language. Most of our products come with a multilingual interface. For help documentation in PDF format, technical specifications, data sheets, and tutorials, as well as help files in many languages, see the Manuals & Help Files section.
           </div>
           
           <div id="wrap_download">
           		<h5>Main Downloads</h5>
                <div class="col-xs-12" style="padding:3px;border:1px solid #ccc;border-radius:3px;">
                	
                    <div class="row download_title">
                    	
                        <div class="col-md-4">
                        	<?php if($this->lan=='vi'){echo 'Sản phẩm và mô tả';}else{echo 'Product and description';}?>
                        </div>
                        <div class="col-md-2 kmt_center">
                        	<?php if($this->lan=='vi'){echo 'Kích thước';}else{echo 'File size';}?>
                        </div>
                        <div class="col-md-4">
                        	<?php if($this->lan=='vi'){echo 'Hệ điều hành';}else{echo 'OS version';}?>
                        </div>
                        <div class="col-md-2 kmt_center">
                        	<?php if($this->lan=='vi'){echo 'Đường dẫn tải file';}else{echo 'Download link';}?>
                        </div>
                        
                    </div>
                    
                    <?php 
                        $i=1;
                        foreach($list_download as $value){
                            $Url_file = $value->Url_file;
                            $Size = $value->Size;
                            if($this->lan=='vi'){
                                $Ten = $value->TenFile_vi;
                                $MoTa = $value->MoTa_vi;
                                $YeuCau = $value->YeuCau_vi;
                            }else{
                                $Ten = $value->TenFile_en;
                                $MoTa = $value->MoTa_en;
                                $YeuCau = $value->YeuCau_en;
                            }
                    ?>
                    <div class="row download_element <?php if($i%2!=0){echo 'has_color';}?>">
                    	
                        <div class="col-md-4 col-xs-12">
                        	<h2><span>Product : </span><?php echo $Ten?></h2>
                            <div class="element_des">
                            	<span><?php if($this->lan=='vi'){echo 'Mô tả';}else{echo 'Description';}?> : </span>
                                <?php echo $MoTa?>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-12 kmt_center kmt_bold">
                        	<p><span><?php if($this->lan=='vi'){echo 'Kích thước';}else{echo 'File size';}?> : </span><?php echo $Size?></p>
                        </div>
                        <div class="col-md-4 col-xs-12">
                        	<div class="element_des">
                            	<span><?php if($this->lan=='vi'){echo 'Hệ điều hành';}else{echo 'OS version';}?> : </span>
                                <?php echo $YeuCau?>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-12 kmt_center">
                        	<span><?php if($this->lan=='vi'){echo 'Đường dẫn tải xuống';}else{echo 'Download link';}?> : </span> <a download href="<?php echo $Url_file?>" target="_blank" rel="nofollow"><img src="<?php echo base_url()?>public/img/icon_download.png" title="Download" alt="Download"/></a>
                        </div>
                        
                    </div>
                    <?php $i++;}?>
                    
                </div>
                
           </div>
          
            
        </div>
        
    </div>
    <!-- End wrap_block_2 -->