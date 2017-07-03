<!-- Begin wrap_block_2 -->
    <div id="wrap_block_2" class="container kmt_inside">
        
        
        
        <div class="row wrap_center">
        	
           <div class="col-lg-3 col-md-4 col-xs-12 wrap_support_left">
           		<div class="kmt_title"><?php if($this->lan=='vi'){echo 'Hỗ trợ';}else{echo 'Support';}?></div>
                <?php
                foreach($list_articles as $value){
                    $idBV = $value->idBV;
                    if($this->lan=='vi'){
                       $TieuDe = $value->TieuDe_vi;
                       $Url = base_url().'ho-tro/'.mb_strtolower(url_title(removesign($TieuDe))).'-'.$idBV;
                    }else{
                      $TieuDe = $value->TieuDe_en;
                      $Url = base_url().'support/'.mb_strtolower(url_title(removesign($TieuDe))).'-'.$idBV;  
                    }
                ?>
                <p><a <?php if($idBV_c==$idBV){echo 'class="active_left"';}?> href="<?php echo $Url?>">&#8226;&nbsp; <?php echo $TieuDe?></a></p>
                <?php }?>
           </div>
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
           <div class="col-lg-9 col-md-8 col-xs-12">
           		<div class="kmt_title"><span><?php echo $TieuDe?></span></div>
                <div class="content_article" style="min-height: 500px;">
                	<?php echo $NoiDung?>
                </div>
           </div>
           
        </div>
        
    </div>
    <!-- End wrap_block_2 -->