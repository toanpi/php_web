<!-- Begin wrap_block_8 -->
    <div id="wrap_block_8" class="container">
        
        <div class="row">
        	
            <div class="col-lg-12">
            	
                <div class="kmt_title_left">
                	<span><?php echo $Ten?></span>
                </div>
                
                <div class="row">
                	
                	
                    <?php
                       foreach($item as $value){
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
                
                <div class="kmt_page text-center">
                   <ul class="pagination pagination-sm">
                       <?=$link?>                      
                   </ul>
                </div>
                
            </div>
            
        </div>
        
    </div>
    <!-- End wrap_block_8 -->