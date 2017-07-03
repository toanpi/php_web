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
        	
           <div class="kmt_title"><span><?php echo $TieuDe?></span></div>
           
           <div class="content_article">
           		<?php echo $NoiDung?>
           </div>
            
        </div>
        
    </div>
    <!-- End wrap_block_2 -->