<div class="col-lg-9 col-md-8" style="margin-top:20px;">
            	
                <div class="row block_center">
                	
                    <div class="col-lg-12">
                    	<div class="kmt_title kmt_red"><span><?php if($this->lan=='vi'){echo 'Sản phẩm nổi bật';}else{echo 'Featured products';}?></span></div>
                        
                        <div class="row">
                        	
                            <?php
                               foreach($item as $value){
                                   $MaHinh = $value->MaHinh;
                                   $UrlHinh = base_url().$this->get->kmt_get_col_where('kmt_hinhanh','UrlHinh',array('MaHinh'=>$MaHinh,'TieuBieu'=>1),null,array(1,0));
                                   $idIT = $value->idIT;
                                   $DonGia = $value->DonGia;
                                   $DonVi = $value->DonVi;
                                   if($this->lan=='vi'){
                                     $Ten = $value->Ten_vi;
                                     $Url_it = base_url().'san-pham/'.mb_strtolower(url_title(removesign($Ten))).'-'.$idIT;
                                   }else{
                                     $Ten = $value->Ten_en;
                                     $Url_it = base_url().'product/'.mb_strtolower(url_title(removesign($Ten))).'-'.$idIT;
                                   }
                            ?>
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4 wrap_item">
                                <div class="block_item">
                                	<div class="img_item">
                                    	<a href="<?php echo $Url_it?>" title="<?php echo $Ten?>"><img src="<?php echo $UrlHinh?>" title="<?php echo $Ten?>" alt="<?php echo $Ten?>"/></a>
                                    </div>
                                    <h3 title="<?php echo $Ten?>"><a href="<?php echo $Url_it?>" title="<?php echo $Ten?>"><?php echo word_limiter($Ten,6)?></a></h3>
        							<h4><?php echo $DonVi?></h4>
                                    <?php
                                      if($DonGia>0){
                                    ?>
                                    <p><?=number_format($DonGia, 0, ',', '.').' đ'?></p>
                                    <?php }else{?>
                                    <p><a href="<?php echo base_url('contact')?>"><?php if($this->lan=='vi'){echo 'Liên hệ';}else{echo 'Contact us';}?></a></p>
                                    <?php }?>
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