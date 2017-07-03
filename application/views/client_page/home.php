
    
    <!-- Begin wrap_block_2 -->
    <div id="wrap_block_2" class="container">
        
         
        <div class="row wrap_center">
        	<?php
               foreach($intro as $value){
                  $idBV = $value->idBV;
                  if($this->lan=='vi'){
                     $TieuDe = $value->TieuDe_vi;
                     $TomTat = $value->TomTat_vi;
                     $Url = base_url().'gioi-thieu/'.mb_strtolower(url_title(removesign($TieuDe))).'-'.$idBV;
                  }else{
                    $TieuDe = $value->TieuDe_en;
                    $TomTat = $value->TomTat_en;
                    $Url = base_url().'about/'.mb_strtolower(url_title(removesign($TieuDe))).'-'.$idBV;  
                  }
             ?>
            <div class="col-lg-8 col-md-8 col-xs-12 wrap_intro">
            	
                <div class="kmt_title"><?php echo $TieuDe?></div>
                
                <div class="content_article">
                    <?php echo $TomTat?>
                </div>
                
            </div>
            <?php }?>
            
            <div class="col-lg-4 col-md-4 col-xs-12 wrap_menu_note">
            	<?php
                 foreach($menu_note as $value){
                    $idMN_1 = $value->idMN_1;
                    $UrlHinh = $this->get->kmt_get_col_where('kmt_hinhanh','UrlHinh',array('MaHinh'=>$value->MaHinh));
                    if($this->lan=='vi'){
                       $Ten = $value->Ten_vi;
                       $Url = base_url().'phan-mem/'.mb_strtolower(url_title(removesign($Ten))).'-'.$idMN_1;
                    }else{
                       $Ten = $value->Ten_en;
                       $Url = base_url().'software/'.mb_strtolower(url_title(removesign($Ten))).'-'.$idMN_1;
                    }
                ?> 
                <div class="block_menu_note">
                	
                    <div class="img_menu_note">
                    	<a href="<?php echo $Url?>"><img src="<?php echo base_url($UrlHinh)?>" title="<?php echo $Ten?>" alt="<?php echo $Ten?>"/></a>
                    </div>
                    <h2><a href="<?php echo $Url?>"><?php echo $Ten?></a></h2>
                    		
                </div>
                <?php }?>
            </div>
            
        </div>
        
        <div class="row wrap_center">
        	
           <div class="kmt_title"><?php if($this->lan=='vi'){echo 'Tin tức';}else{echo 'Related news';}?></div>
           
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
            
        </div>
        
        <p class="read_more"><a href="<?php echo base_url('news')?>"><?php if($this->lan=='vi'){echo 'Xem tất cả';}else{echo 'View all';}?></a></p>
        
    </div>
    <!-- End wrap_block_2 -->
    
    