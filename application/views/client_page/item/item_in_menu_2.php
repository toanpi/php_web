            <div class="col-lg-9 col-md-8 col-xs-12">
                	
                    <div class="row block_content">
                    	
                        <div class="col-lg-12">
                        	
                            <div class="kmt_title_right kmt_uppercase"><span><?php echo $Ten2?></span></div>
                            
                            <div class="row">
                            	
                                <?php
                                               foreach($item as $value){
                                                   $MaHinh = $value->MaHinh;
                                                   $UrlHinh = base_url().$this->get->kmt_get_col_where('kmt_hinhanh','UrlHinh',array('MaHinh'=>$MaHinh,'TieuBieu'=>1),null,array(1,0));
                                                   $idIT = $value->idIT;
                                                   if($this->lan=='vi'){
                                                     $Ten = $value->Ten_vi;
                                                     $Url_it = base_url().'san-pham/'.mb_strtolower(url_title(removesign($Ten))).'-'.$idIT;
                                                   }else{
                                                     $Ten = $value->Ten_en;
                                                     $Url_it = base_url().'product/'.mb_strtolower(url_title(removesign($Ten))).'-'.$idIT;
                                                   }
                                ?>
                                <div class="col-lg-4 col-xs-6 wrap_item">
                                	<div class="block_item">
                                    	<div class="img_item">
                                        	<a href="<?php echo $Url_it?>" title="<?php echo $Ten?>"><img src="<?php echo $UrlHinh?>" title="<?php echo $Ten?>" alt="<?php echo $Ten?>"/></a>
                                        </div>
                                        <h3 class="kmt_uppercase"><a href="<?php echo $Url_it?>"><?php echo $Ten?></a></h3>
                                        <p><a href="<?php echo $Url_it?>"><?php if($this->lan=='vi'){echo 'Chi tiết';}else{echo 'Details';}?></a></p> 
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
                
            </div>