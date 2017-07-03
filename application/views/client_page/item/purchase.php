
    <!-- Begin wrap_block_2 -->
    <div id="wrap_block_2" class="container kmt_inside">
        
        
        
        <div class="row wrap_center">
        	
          <div class="col-lg-8 col-xs-12 wrap_purchase_left">
          		<div class="kmt_title"><span><?php if($this->lan=='vi'){echo 'Loại sản phẩm';}else{echo 'Product Catalog';}?></span></div>
                <form action="<?php echo base_url('upload-file')?>" method="post" enctype="multipart/form-data" id="kmt_multi_order">
                    <input type="hidden" id="kmt_IT" name="kmt_name_c" value=""/>
                    <input type="hidden" id="kmt_code" name="kmt_code" value=""/>
                    <?php
                        foreach($list_menu as $value){
                            $idMN_1 = $value->idMN_1;
                        $con_item = array('TrangThai'=>1,'idMN_1'=>$idMN_1);
                        $order_item = array('STT'=>'ASC','idIT'=>'DESC');
                        $list_item = $this->get->kmt_get_where('kmt_item',$con_item,$order_item);
                        
                        foreach($list_item as $value){
                            $idIT = $value->idIT;
                            $MaSo = $value->MaSo;
                            if($this->lan=='vi'){
                              $Ten = $value->Ten_vi;
                              $TomTat = $value->TomTat_vi;
                            }else{
                              $Ten = $value->Ten_en;
                              $TomTat = $value->TomTat_en;
                            }
                           
                            $Url = base_url().'version/'.mb_strtolower(url_title(removesign($Ten))).'-'.$idIT;
                            
                            
                            $con_prices = array('idIT'=>$idIT,'TrangThai'=>1);
                            $order_prices = array('DonGia'=>'ASC');
                            $list_prices = $this->get->kmt_get_where('kmt_list_prices',$con_prices,$order_prices);
                    ?>
                    <div class="row wrap_purchase">
                    	
                        <div class="col-lg-7 col-md-7 wrap_info_purchase">
                        	<h2><a href="<?php echo $Url?>"><?php echo $Ten?></a></h2>
                            <div class="content_article">
                            	<?php echo $TomTat?>
                            </div>
                            <p><a href="<?php echo $Url?>"><?php if($this->lan=='vi'){echo 'Xem chi tiết';}else{echo 'More info';}?></a></p>
                        </div>
                        
                        <div class="col-lg-5 col-md-5 wrap_action_purchase">
                            <?php
                                $prices_bg = 0;
                                $idPL_bg = 0;
                                if(isset($list_prices[0])){
                                    $idPL_bg = $list_prices[0]->idPL;
                                    $prices_bg = $list_prices[0]->DonGia;
                                }
                            ?>
                        	<h3>$<?php echo $prices_bg?></h3>
                            <p><?php if($this->lan=='vi'){echo 'Loại bản quyền';}else{echo 'License type';}?>:</p>
                            <p>
                            	<select id="kmt_select_<?php echo $idIT?>">
                                    <?php
                                        foreach($list_prices as $value){
                                    ?>
                                	<option data-code="<?php echo $value->MaSo?>" value="<?php echo $value->idPL.'|'.$value->DonGia?>"><?php echo $value->ThoiGian?></option>
                                    <?php }?>
                                </select>
                            </p>
                            <div class="kmt_bt_purchase">
                            	<?php if($this->lan=='vi'){echo 'Tải lên tệp yêu cầu gia hạn (zip,rar)';}else{echo 'Upload request license file (zip,rar)';}?>: 
                                <a href="javascript:void(0)" class="img_upload"><img src="<?php echo base_url()?>public/img/icon_upload.png" title="<?php echo $Ten?>" alt="<?php echo $Ten?>"/></a>
    							<input class="bt_upload" type="file" data-code="<?php echo $MaSo?>" name="file_<?php echo $idIT?>" />
                                
                            </div>
                            <h4 class="odb_version"><a data-href="<?php echo base_url('add-to-cart/'.$idIT)?>" href="<?php echo base_url('add-to-cart/'.$idIT.'/'.$idPL_bg)?>"><?php if($this->lan=='vi'){echo 'Mua';}else{echo 'Order';}?></a></h4>
                        </div>
                        
                    </div>
                    <?php }}?>
                </form>
          </div>
          
          <div class="col-lg-4 col-xs-12">
          		<div class="kmt_title"><?php if($this->lan=='vi'){echo 'Hướng dẫn mua hàng';}else{echo 'How to purchase our products';}?></div>
                <div class="content_article">
                     <?php
                        $TieuDe = 'Updating ...';
                        $NoiDung = 'Updating ...';
                        foreach($articles as $value){
                            if($this->lan=='vi'){
                                echo $value->NoiDung_vi;
                            }else{
                                echo $value->NoiDung_en;
                            }
                            
                        } 
                    ?> 
                    
                </div>
          </div>
           
           
            
        </div>
        
    </div>
    <!-- End wrap_block_2 -->