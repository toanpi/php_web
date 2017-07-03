<!-- Begin wrap_block_2 -->
    <div id="wrap_block_2" class="container kmt_inside">
        
        
        
        <div class="row wrap_center">
        	
           <div class="kmt_title"><span><?php if($this->lan=='vi'){echo 'Giới thiệu sản phẩm';}else{echo 'Products Overview';}?></span></div>
           
           
           <?php
                       foreach($item as $value){
                          $idMN_1 = $value->idMN_1;
                          $MaHinh = $value->MaHinh;
                          $UrlHinh = base_url().$this->get->kmt_get_col_where('kmt_hinhanh','UrlHinh',array('MaHinh'=>$MaHinh));
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
           <div class="col-xs-12 wrap_product">
           	
            	<div class="col-lg-1 col-xs-2 img_product">
                	<a href="<?php echo $Url?>" title="<?php echo $Ten?>"><img src="<?php echo $UrlHinh?>" title="<?php echo $Ten?>" alt="<?php echo $Ten?>"/></a>
                </div>
                <div class="col-lg-11 col-xs-10 info_product">
                	<div class="content_article">
                	   <?php echo $MoTa?> <a href="<?php echo $Url?>"><?php if($this->lan=='vi'){echo 'Xem thêm';}else{echo 'More';}?> ...</a>
                    </div>
                </div>
            
           </div>
           <?php }?>
           
            
        </div>
        
    </div>
    <!-- End wrap_block_2 -->