<script src="<?php echo base_url()?>public/js/kmt_validation_contact.js"></script>
    
    <!-- Begin wrap_block_2 -->
    <div id="wrap_block_2" class="container kmt_inside">
        
        
        
        <div class="row wrap_center">
        	
           <div class="kmt_title"><span><?php if($this->lan=='vi'){echo 'Liên hệ';}else{echo 'Contact';}?></span></div>
           
           <div class="col-lg-6 col-xs-12">
           		
                <div id="wrap_add_p" class="content_article">
                	<?php
                       foreach($address as $value){
                            if($this->lan=='vi'){
                                echo $value->NoiDung_vi;
                            }else{
                                echo $value->NoiDung_en;
                            }
                            $BanDo = $value->BanDo;
                       }
                    ?>
                </div>
                
                <div class="wrap_form_contact" style="margin-top: 20px;">
                      <form class="form-horizontal" role="form" action="<?php echo base_url('send-mess')?>" method="post" id="kmt_contact_form">
                                          <input name="cap" type="hidden" value="<?php echo $cap?>"/>
                                            <div class="form-group">
                                                <div class="col-sm-8" style="color: #f00;">
                                                <?php if($this->lan=='vi'){echo '(*) là các trường bắt buộc';}else{echo '(*) is required';}?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                               <div class="col-sm-8">
                                                  <input type="text" name="hoten" class="form-control" id="kmt_name" placeholder="<?php if($this->lan=='vi'){echo 'Họ tên';}else{echo 'Full name';}?> (*)" required="required"/>
                                               </div>
                                             </div>
                                             <div class="form-group">
                                                 <div class="col-sm-8">
                                                      <input type="text" name="tieude" class="form-control" id="kmt_title" placeholder="<?php if($this->lan=='vi'){echo 'Tên công ty';}else{echo 'Company name';}?>"/>
                                                 </div>
                                             </div>
                                             <div class="form-group">
                                                 <div class="col-sm-8">
                                                   <input type="text" name="sdt" class="form-control" id="kmt_phone_c" placeholder="<?php if($this->lan=='vi'){echo 'Điện thoại';}else{echo 'Phone number';}?> (*)" required="required"/>
                                                 </div>
                                                 <div class="col-md-4 aj_sdt">
                                            
                                                  </div>
                                             </div>
                                             <div class="form-group">
                                                  <div class="col-sm-8">
                                                     <input type="email" name="email" class="form-control" id="kmt_email" placeholder="<?php if($this->lan=='vi'){echo 'Thư điện tử';}else{echo 'Email';}?> (*)" required="required"/>
                                                  </div>
                                                      
                                                  <div class="col-md-4 aj_email">
                                            
                                                  </div>
                                             </div>
                                             <div class="form-group">
                                                  <div class="col-sm-8">
                                                       <textarea rows="5" class="form-control" name="noidung" id="kmt_content" placeholder="<?php if($this->lan=='vi'){echo 'Nội dung';}else{echo 'Content';}?> (*)" required="required"></textarea>
                                                   </div>
                                              </div>
                                              <div class="form-group">
                                                 <div class="col-sm-8">
                                                       <span class="kmt_captcha"><?php echo $cap?></span>
                                                 </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-8">
                                                     <input type="text" name="code" class="form-control" id="kmt_code" placeholder="<?php if($this->lan=='vi'){echo 'Mã xác nhận';}else{echo 'Verification code';}?> (*)" required="required"/>
                                                  </div>
                                                  <div class="col-md-4 aj_code">
                                        
                                                    </div>
                                              </div>
                                              <div class="form-group">
                                                   <div class="col-sm-9">
                                                       <button type="submit" id="kmt_submit" class="btn btn-default"><?php if($this->lan=='vi'){echo 'Gửi';}else{echo 'Send';}?></button>
                                                       <button type="reset" class="btn btn-default"><?php if($this->lan=='vi'){echo 'Nhập lại';}else{echo 'Reset';}?></button>
                                                    </div>
                                              </div>
                                    <div class="form-group">
                                                 <div class="col-sm-9 kmt_note" style="margin-bottom: 10px;color: #f00;">
                                                    <?php
                                                             if($st!=null){
                                                                   if($st==1){
                                                                        if($this->lan=='vi'){
                                                                            echo 'Vui lòng kiểm tra địa chỉ email';
                                                                        }else{
                                                                             echo 'Please check email address';
                                                                        }
                                                                   }elseif($st==2){
                                                                        if($this->lan=='vi'){
                                                                            echo 'Vui lòng nhập đúng mã xác nhận';
                                                                        }else{
                                                                            echo 'Please enter the correct confirmation code';
                                                                        }
                                                                       
                                                                   }else{
                                                                        if($this->lan=='vi'){
                                                                            echo 'Cảm ơn bạn đã đóng góp ý kiến cho '.DOMAIN_NAME;
                                                                        }else{
                                                                            echo 'Thank you for your feedback for '.DOMAIN_NAME;
                                                                        }
                                                                       
                                                                   }
                                                             }
                                                      ?>
                                                </div>
                                            </div>  
                       </form>  
                </div>
                
           </div>
           <div class="col-lg-6 col-xs-12 wrap_map">
           		<?php echo $BanDo?>
           </div>
            
        </div>
        
    </div>
    <!-- End wrap_block_2 -->