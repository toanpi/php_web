<div class="col-lg-9 col-md-8 col-xs-12">
                	
                    <div class="row block_content">
                    	
                        <div class="col-lg-12">
                        	
                            <div class="kmt_title_right kmt_uppercase"><span><?php echo $Ten?></span></div>
                            
                            <div class="row">
                                <?php
                                foreach($news as $value){
                                    $idBV = $value->idBV;
                                    $UrlHinh = base_url().$this->get->kmt_get_col_where('kmt_hinhanh','UrlHinh',array('MaHinh'=>$value->MaHinh));
                                    if($this->lan=='vi'){
                                       $TieuDe = $value->TieuDe_vi;
                                       $TomTat = $value->TomTat_vi;
                                       $Url_n = base_url().'tin-tuc/'.mb_strtolower(url_title(removesign($TieuDe))).'-'.$idBV;
                                    }else{
                                       $TieuDe = $value->TieuDe_en;
                                       $TomTat = $value->TomTat_en;
                                       $Url_n = base_url().'news/'.mb_strtolower(url_title(removesign($TieuDe))).'-'.$idBV;  
                                    }
                                ?>
                            	<div class="col-lg-4 col-xs-6 wrap_news">
                                    <div class="block_news">
                                        <div class="img_news">
                                            <a href="<?php echo $Url_n?>"><img src="<?php echo $UrlHinh?>" title="<?php echo $TieuDe?>" alt="<?php echo $TieuDe?>"/></a>
                                        </div>
                                        <h2 title="<?php echo $TieuDe?>"><a href="<?php echo $Url_n?>"><?php echo word_limiter($TieuDe, 15)?></a></h2>
                                        <div class="content_news">
                                            <?php echo word_limiter($TomTat, 38)?>
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