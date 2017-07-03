
    <!-- Begin wrap_block_2 -->
    <div id="wrap_block_2" class="container kmt_inside">
        
        
        
        <div class="row wrap_center">
        	
           <div class="kmt_title"><span><?php if($this->lan=='vi'){echo 'Tin tức';}else{echo 'News';}?></span></div>
           
           <?php
            foreach($news as $value){
                $idBV = $value->idBV;
                if($this->lan=='vi'){
                   $TieuDe = $value->TieuDe_vi;
                   $TomTat = $value->TomTat_vi;
                   $Url = base_url().'tin-tuc/'.mb_strtolower(url_title(removesign($TieuDe))).'-'.$idBV;
                }else{
                  $TieuDe = $value->TieuDe_en;
                  $TomTat = $value->TomTat_en;
                  $Url = base_url().'news/'.mb_strtolower(url_title(removesign($TieuDe))).'-'.$idBV;  
                }
           ?>
           <div class="col-lg-4 col-xs-12 wrap_news">
              
              <div class="block_news">
              		<h3><a href="<?php echo $Url?>"><?php echo word_limiter($TieuDe,15)?></a></h3>
					<div><?php echo word_limiter($TomTat,50)?></div>
                    <p><a href="<?php echo $Url?>"> <?php if($this->lan=='vi'){echo 'Xem thêm';}else{echo 'More info';}?></a></p>
              </div>
              
           </div>
           <?php }?>
           
           <div class="kmt_page text-center">
              <ul class="pagination pagination-sm">
                 <?php echo $link?>                      
              </ul>
            </div>
            
        </div>
        
    </div>
    <!-- End wrap_block_2 -->