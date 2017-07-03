        <div class="row">
        	<p class="title_nc"><?php if($this->lan=='vi'){echo 'hàng khuyến mãi';}else{echo 'Sale Products';}?></p>
            
            <?php
                                foreach($item as $value){
                                     $MaHinh = $value->MaHinh;
                                     $UrlHinh = base_url().$this->get->kmt_get_col_where('kmt_hinhanh','UrlHinh',array('MaHinh'=>$MaHinh,'TieuBieu'=>1),null,array(1,0));
                                     $idIT = $value->idIT;
                                     $Gia = $value->DonGia;
                                     $DonGiaKM = $value->DonGiaKM;
                                     $TyGia = $this->kmt_load->get_tygia();
                                     if($DonGiaKM>0){
                                        $Gia = $DonGiaKM;
                                     }
                                     if($this->lan=='vi'){
                                         $Ten = $value->Ten_vi;
                                         $Url_it = base_url().'san-pham/'.mb_strtolower(url_title(removesign($Ten))).'-'.$idIT;
                                     }else{
                                         $Ten = $value->Ten_en;
                                         $Url_it = base_url().'product/'.mb_strtolower(url_title(removesign($Ten))).'-'.$idIT;
                                     }
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 wrap_item">
            	<div class="block_item">
                	<div class="img_item_home">
                        <a href="<?php echo $Url_it?>"><img src="<?php echo $UrlHinh?>" title="<?php echo $Ten?>" alt="<?php echo $Ten?>"/></a>
                    </div>
                    <h2><a href="<?php echo $Url_it?>"><?php echo $Ten?></a></h2>
                    <p>
                            <?php
                                if($value->DonGia>0 && $TyGia>0){
                                    if($this->lan=='vi'){
                                        echo number_format($Gia, 0, ',', '.').' VNĐ';
                                    }else{
                                        echo round($Gia/$TyGia,1).' USD';
                                    }
                                }else{
                                    echo "<a href='".base_url()."contact'>contact us</a>";
                                }
                            ?>
                   </p>
                </div>
            </div>
            <?php }?>
            
        </div>
        
        <div class="kmt_page text-center">
              <ul class="pagination pagination-sm">
                <?=$link?>                      
              </ul>
        </div>