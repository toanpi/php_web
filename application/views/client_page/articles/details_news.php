 <?php
    $TieuDe = 'Updating ...';
    $NoiDung = 'Updating ...';
    foreach($articles as $value){
        if($this->lan=='vi'){
            $TieuDe = $value->TieuDe_vi;
            $NoiDung = $value->NoiDung_vi;
        }else{
            $TieuDe = $value->TieuDe_en;
            $NoiDung = $value->NoiDung_en;
        }
        
    } 
?>  

    <!-- Begin wrap_block_2 -->
    <div id="wrap_block_2" class="container kmt_inside">
        
        
        
        <div class="row wrap_center">
        	
           <div class="kmt_title"><span><?php if($this->lan=='vi'){echo 'Tin tức';}else{echo 'News';}?></span></div>
           
           <div class="content_article">
            <p class="kmt_title_article"><?php echo $TieuDe?></p>
           		<?php echo $NoiDung?>
           </div>
            <ul class="list_same">
                   <li class="same_title"><?php if($this->lan=='vi'){echo 'Bài viết khác';}elseif($this->lan=='en'){echo 'Other articles';}else{echo '其他文章';}?></li>
                   <?php
                        foreach($same_articles as $value){ 
                           $idBV = $value->idBV;
                           if($this->lan=='vi'){
                              $TieuDe = $value->TieuDe_vi;
                              $Url_a = base_url().'tin-tuc/'.mb_strtolower(url_title(removesign($TieuDe))).'-'.$idBV;
                           }else{
                              $TieuDe = $value->TieuDe_en;
                              $Url_a = base_url().'news/'.mb_strtolower(url_title(removesign($TieuDe))).'-'.$idBV;
                           }
                  ?>
                  <li><a href="<?=$Url_a?>">&#10141;&nbsp; <?php echo word_limiter($TieuDe, 45)?></a></li>
                  <?php }?>
                </ul>
        </div>
        
    </div>
    <!-- End wrap_block_2 -->