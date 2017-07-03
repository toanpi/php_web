<link href="<?php echo base_url()?>public/css/jquery.fancybox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url()?>public/js/jquery.fancybox.js"></script>
<script type="text/javascript">
		$(document).ready(function() {
			$(".fancybox").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});
            
            $(document).on( "change",'#sb_cart_update select', function() {
    			$("#sb_cart_update").submit();
            });
            
            
		});
</script>
<?php
    if(count($this->cart->contents())>0){
?>
    <!-- Begin wrap_block_2 -->
    <div id="wrap_block_2" class="container kmt_inside">
        
        
        
        <div class="row wrap_center">
        	
           <div class="kmt_title"><span><?php if($this->lan=='vi'){echo 'Giỏ hàng của bạn';}else{echo 'Your cart';}?></span></div>
           
                <div class="col-lg-12">
                   
                        <div class="row kmt_title_cart" style="margin-top:30px">
                       		<div class="col-md-2 col-sm-2 col-xs-12" style="text-align:center"><?php if($this->lan=='vi'){echo 'Sản phẩm';}else{echo 'Item';}?></div>
                            <div class="col-md-3 col-sm-3 col-xs-12" style="text-align:center"><?php if($this->lan=='vi'){echo 'Tên sản phẩm';}else{echo 'Item name';}?></div>
                            <div class="col-md-2 col-sm-2 col-xs-12" style="text-align:center"><?php if($this->lan=='vi'){echo 'Đơn giá';}else{echo 'Price';}?></div>
                            <div class="col-md-3 col-sm-3 col-xs-12" style="text-align: center;"><?php if($this->lan=='vi'){echo 'Loại bản quyền';}else{echo 'License type';}?></div>
                            <div class="col-md-2 col-sm-2 col-xs-12" style="text-align: center;"><?php if($this->lan=='vi'){echo 'Tạm tính';}else{echo 'Total price';}?></div>
                        </div>
                        
                        <form action="<?php echo base_url('update-cart')?>" method="post" id="sb_cart_update">
                            <?php
                                $i=1;
                                foreach($this->cart->contents() as $value){
                                    $rowid = $value['rowid'];
                            ?>
                            <input type="hidden" name="rowid" value="<?php echo $rowid?>"/>
                            <div class="row kmt_con_cart">
                           		<div class="col-md-2 col-sm-2 col-xs-12 img_cart" style="text-align: center;">
                                   <a href="<?php echo $value['img']?>" class="fancybox" title=""><img src="<?php echo $value['img']?>" title="<?php echo $value['name']?>" alt="<?php echo $value['name']?>" style="max-height: 100px;max-width: 100%;"/></a>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12" style="text-align:center">
                                    <p><?php echo $value['name']?></p>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12" style="text-align: center;">
                                    $<?php echo $value['price'];?>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12" style="text-align: center;">
                                    <select name="idPL">
                                        <?php
                                            $con_prices = array('idIT'=>$value['id'],'TrangThai'=>1);
                                            $order_prices = array('idPL'=>'ASC');
                                            $list_prices = $this->get->kmt_get_where('kmt_list_prices',$con_prices,$order_prices);
                                            foreach($list_prices as $value_d){
                                        ?>
                                    	<option <?php if($value_d->idPL==$value['idPL']){echo 'selected="selected"';}?> value="<?php echo $value_d->idPL?>"><?php echo $value_d->ThoiGian?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12" style="text-align: center;color: #f00;">
                                    <p>
                                        $<?php echo $value['subtotal'];?>
                                    </p>
                                </div>
                            </div>
                            <?php $i++;}?>
                            
                            <div class="row">
                               <div class="col-md-12 kmt_submit_cart">
                                   <div class="form-group" style="padding-top:10px;">
                                       <div class="row" style="line-height:50px;font-weight: bold;">
                                           <?php if($this->lan=='vi'){echo 'TỔNG TIỀN';}else{echo 'TOTAL';}?> : <span>$<?php echo $this->cart->total();?></span>
                                       </div>
                                       <div class="row">
                                           <div class="col-sm-12 kmt_bt_sbc" >
                                                 <button type="submit" id="kmt_ud_mb" class="btn btn-default"><?php if($this->lan=='vi'){echo 'Cập nhật giỏ hàng';}else{echo 'Update cart';}?></button>
                                                 
                                                 <a href="<?php echo base_url('payment')?>">
                                                    <button type="button" class="btn btn-default"><?php if($this->lan=='vi'){echo 'Hoàn tất đơn hàng';}else{echo 'Complete order';}?></button>
                                                 </a>
                                                 <a href="<?php echo base_url('cancel')?>">
                                                    <button type="button" class="btn btn-default"><?php if($this->lan=='vi'){echo 'Hủy đơn hàng';}else{echo 'Cancel order';}?></button>
                                                 </a>
                                            </div>
                                       </div>
                                   </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>
           
        </div>
        
    </div>
    <!-- End wrap_block_2 -->
<?php }else{?>
<!-- Begin wrap_block_2 -->
    <div id="wrap_block_2" class="container kmt_inside">
        
        
        
        <div class="row wrap_center">
        	
           <div class="kmt_title"><span><?php if($this->lan=='vi'){echo 'Giỏ hàng của bạn';}else{echo 'Your cart';}?></span></div>
           
                <div class="col-lg-12">
                    	
                        <h3 class="kmt_note" style="text-align: center;font-size: 16px;line-height: 25px;margin-top: 50px;color: #222;text-align: center;">
                                <?php
                                    if($st!=null && $st==0){
                                ?>
                                <?php
                                   if($this->lan=='vi'){
                                ?>     
                                    <p>Bạn đã đặt hàng thành công, vui lòng nhấn vào <a style="font-size: 16px;" href="<?=base_url()?>">đây</a> để tiếp tục sử dụng các dịch vụ tại <?php echo DOMAIN_NAME?></p> 
                                    <p style="font-size: 16px;margin-top: 10px;">(Một email xác nhận đơn hàng đã được gửi đến hộp mail của bạn, nếu không tìm thấy email nó có thể nằm trong thư mục spam)</p>
                                    <?php }else{?>
                                    <p>You have successfully ordered, click <a style="font-size: 16px;" href="<?=base_url()?>">here</a> to continue using services in  <?php echo DOMAIN_NAME?></p>   
                                    <p style="font-size: 16px;margin-top: 10px;">(An order confirmation email has been sent to your mail box, if not it can find email in spam folder)</p>                 
                                    <?php }?>
                                
                                <?php }else{?>
                                    <?php
                                       if($this->lan=='vi'){
                                    ?>     
                                    Bạn chưa có sản phẩm nào trong giỏ hàng, nhấn vào <a style="font-size: 16px;" href="<?=base_url()?>">đây</a> để xem các sản phẩm mới nhất tại <?php echo DOMAIN_NAME?>.
                                    <?php }else{?>
                                    You do not have any products in your cart, click <a style="font-size: 16px;" href="<?=base_url()?>">here</a> to view the latest products in  <?php echo DOMAIN_NAME?>.                    
                                    <?php }?>
                                <?php }?>
                            </h3>
                        
                        
                    </div>
           
        </div>
        
    </div>
    <!-- End wrap_block_2 -->
<?php }?>