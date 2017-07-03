    <!-- Begin wrap_block_2 -->
    <div id="wrap_block_2" class="container kmt_inside">
        
        
        <script src="<?php echo base_url()?>public/js/kmt_validation_payment.js"></script>
        <div class="row wrap_center">
        	
           <div class="kmt_title"><span><?php if($this->lan=='vi'){echo 'Thông tin thanh toán bằng thẻ tín dụng';}else{echo 'credit CARD PAYMENT INFOMATION';}?></span></div>
           
           <div class="col-lg-12">

                        <?php
                            $HoTen = '';
                            $SDT = '';
                            $Email = '';
                            $DiaChi = '';
                            if($this->session->userdata('client_login')=='TRUE'){
                                $info = $this->get->kmt_get_where('kmt_nguoidung',array('idU'=>$this->session->userdata('idU_c')));   
                                foreach($info as $value){
                                    $HoTen = $value->HoTen;
                                    $SDT = $value->SDT;
                                    $Email = $value->Email;
                                    $DiaChi = $value->DiaChi;
                                }
                            }
                        ?>
                        <div class="row" style="padding-top: 30px;">
                            <?php
                             if($this->lan=='vi'){
                            ?> 
                            <form class="form-horizontal" role="form" action="<?php echo base_url('finish-cart-paypal')?>" method="post" id="kmt_payment_form">
                                  <input name="cap" type="hidden" value="<?php echo $cap?>"/>
                                  <input name="idU" type="hidden" value="<?php echo $this->session->userdata('idU_c')?>"/>
                                  <div class="form-group">
                                    <label for="kmt_name_st" class="col-sm-3 control-label">&nbsp;</label>
                                    <div class="col-sm-9">
                                      <a href="<?php echo base_url('payment')?>">
                                        Bấm vào link này nếu bạn muốn thanh toán chuyển khoản?
                                      </a>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="kmt_name" class="col-sm-3 control-label">Họ tên <span>*</span> :</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="name" value="<?php echo $HoTen?>" class="form-control" id="kmt_name" placeholder="Nhập họ tên của bạn" required="required"/>
                                    </div>
                                    <div class="col-md-4 aj_name">
                                    
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="kmt_add" class="col-sm-3 control-label">Địa chỉ <span>*</span> :</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="add" value="<?php echo $DiaChi?>" class="form-control" id="kmt_add" placeholder="Nhập địa chỉ giao hàng" required="required"/>
                                    </div>
                                    <div class="col-md-4 aj_add">
                                    
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="kmt_phone_c" class="col-sm-3 control-label">Số điện thoại <span>*</span> :</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="phone" value="<?php echo $SDT?>" class="form-control" id="kmt_phone_c" placeholder="Nhập số điện thoại" required="required"/>
                                    </div>
                                    <div class="col-md-4 aj_phone">
                                    
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="kmt_email" class="col-sm-3 control-label">Email <span>*</span> :</label>
                                    <div class="col-sm-5">
                                      <input type="email" name="email" value="<?php echo $Email?>" class="form-control" id="kmt_email" placeholder="Nhập email của bạn" required="required"/>
                                    </div>
                                    <div class="col-md-4 aj_email">
                                    
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="kmt_content" class="col-sm-3 control-label">Ghi chú :</label>
                                    <div class="col-sm-5">
                                      <textarea name="note" class="form-control" id="kmt_content" placeholder="Ghi chú nếu có"></textarea>
                                    </div>
                                    
                                  </div>
                                  <div class="form-group">
                                    <label for="kmt_code" class="col-sm-3 control-label">&nbsp;</label>
                                    <div class="col-sm-5">
                                        <span class="kmt_captcha"><?php echo $cap?></span>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="kmt_code" class="col-sm-3 control-label">Mã xác nhận<span>*</span></label>
                                    <div class="col-sm-5">
                                      <input type="text" name="code" class="form-control" id="kmt_code" placeholder="Nhập mã xác nhận" required="required"/>
                                    </div>
                                    <div class="col-md-4 aj_code">
                                    
                                    </div>
                                  </div>
        
                                  <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                      <button type="submit" id="submit_cart" id="kmt_submit_payment" class="btn btn-default">Gửi thông tin</button>
                                      <button type="reset" class="btn btn-default">Nhập lại</button>
                                      
                                    </div>
                                  </div>
                                  
                                  <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                      <img width="260px" src="<?php echo base_url()?>public/img/paypal.png"/>
                                    </div>
                                  </div>
                                  
                            </form>
                            <?php }else{?>
                            <form class="form-horizontal" role="form" action="<?php echo base_url('finish-cart-paypal')?>" method="post" id="kmt_payment_form">
                                  <input name="cap" type="hidden" value="<?php echo $cap?>"/>
                                  <input name="idU" type="hidden" value="<?php echo $this->session->userdata('idU_c')?>"/>
                                  <div class="form-group">
                                    <label for="kmt_name_st" class="col-sm-3 control-label">&nbsp;</label>
                                    <div class="col-sm-9">
                                      <a href="<?php echo base_url('payment')?>">
                                        Click on this link if you want to pay by transfer?
                                      </a>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="kmt_name" class="col-sm-3 control-label">Your name <span>*</span> :</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="name" value="<?php echo $HoTen?>" class="form-control" id="kmt_name" placeholder="Enter your name" required="required"/>
                                    </div>
                                    <div class="col-md-4 aj_name">
                                    
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="kmt_add" class="col-sm-3 control-label">Address <span>*</span> :</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="add" value="<?php echo $DiaChi?>" class="form-control" id="kmt_add" placeholder="Enter your address" required="required"/>
                                    </div>
                                    <div class="col-md-4 aj_add">
                                    
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="kmt_phone_c" class="col-sm-3 control-label">Phone <span>*</span> :</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="phone" value="<?php echo $SDT?>" class="form-control" id="kmt_phone_c" placeholder="Enter your phone number" required="required"/>
                                    </div>
                                    <div class="col-md-4 aj_phone">
                                    
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="kmt_email" class="col-sm-3 control-label">Email <span>*</span> :</label>
                                    <div class="col-sm-5">
                                      <input type="email" name="email" value="<?php echo $Email?>" class="form-control" id="kmt_email" placeholder="Email" required="required"/>
                                    </div>
                                    <div class="col-md-4 aj_email">
                                    
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="kmt_content" class="col-sm-3 control-label">Note :</label>
                                    <div class="col-sm-5">
                                      <textarea name="note" class="form-control" id="kmt_content" placeholder="Note"></textarea>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="kmt_code" class="col-sm-3 control-label">&nbsp;</label>
                                    <div class="col-sm-7">
                                        <span class="kmt_captcha"><?php echo $cap?></span>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="kmt_code" class="col-sm-3 control-label">Code<span>*</span></label>
                                    <div class="col-sm-5">
                                      <input type="text" name="code" class="form-control" id="kmt_code" placeholder="Enter code" required="required"/>
                                    </div>
                                    <div class="col-md-4 aj_code">
                                    
                                    </div>
                                  </div>
        
                                  <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                      <button type="submit" id="submit_cart" id="kmt_submit_payment" class="btn btn-default">Sent info</button>
                                      <button type="reset" class="btn btn-default">Reset</button>
                                      
                                    </div>
                                  </div>
                                  
                                  <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                      <img width="260px" src="<?php echo base_url()?>public/img/paypal.png"/>
                                    </div>
                                  </div>
                                  
                            </form>                    
                            <?php }?>
                        
                        </div>
                        
                        
                    </div>
            
        </div>
        
    </div>
    <!-- End wrap_block_2 -->