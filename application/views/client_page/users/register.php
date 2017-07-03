<script src="<?php echo base_url('public/js/kmt_validation_register.js')?>"></script>

    <!-- Begin wrap_block_2 -->
    <div id="wrap_block_2" class="container kmt_inside">
        
        
        
        <div class="row wrap_center">
        	
           <div class="kmt_title"><span><?php if($this->lan=='vi'){echo 'Đăng ký tài khoản';}else{echo 'Register account';}?></span></div>
           
           <div class="col-lg-12">
                <div class="row kmt_form" style="margin-top:50px;">
                        	
                            <form class="form-horizontal" role="form" action="<?php echo base_url('save-register')?>" method="post" id="kmt_register_form">
                                 <input name="cap" type="hidden" value="<?php echo $cap?>"/>
                                 <div class="form-group">
                                    <label for="kmt_email" class="col-sm-2 control-label">Email <span>*</span></label>
                                    <div class="col-sm-9">
                                          <input type="email" name="email" class="form-control" id="kmt_email" placeholder="<?php if($this->lan=='vi'){echo 'Nhập địa chỉ Email';}else{echo 'Enter your email address';}?>"/>
                                    </div>
                                    <div class="col-sm-1 aj_email_ok"></div>
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10 aj_email"></div>
                                     </div>
                                 </div>
                                 
                                 <div class="form-group">
                                   <label for="kmt_pass" class="col-sm-2 control-label"><?php if($this->lan=='vi'){echo 'Mật khẩu';}else{echo 'Password';}?> <span>*</span></label>
                                   <div class="col-sm-9">
                                     <input type="password" name="pass" class="form-control" id="kmt_pass" placeholder="<?php if($this->lan=='vi'){echo 'Chọn một mật khẩu từ 6 tới 12 ký tự';}else{echo 'Choose a password of 6 to 12 characters';}?>"/>
                                   </div>
                                   <div class="col-sm-1 aj_pass_ok"></div>
                                   <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10 aj_pass"></div>
                                   </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="kmt_repass" class="col-sm-2 control-label"><?php if($this->lan=='vi'){echo 'Nhập lại mật khẩu';}else{echo 'Retype password';}?> <span>*</span></label>
                                    <div class="col-sm-9">
                                      <input type="password" name="repass" class="form-control" id="kmt_repass" placeholder="<?php if($this->lan=='vi'){echo 'Nhập lại mật khẩu';}else{echo 'Retype password';}?>"/>
                                    </div>
                                    <div class="col-sm-1 aj_repass_ok"></div>
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10 aj_repass"></div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                     <label for="kmt_name" class="col-sm-2 control-label"><?php if($this->lan=='vi'){echo 'Họ tên';}else{echo 'Fullname';}?> <span>*</span></label>
                                     <div class="col-sm-9">
                                       <input type="text" name="name" class="form-control" id="kmt_name" placeholder="<?php if($this->lan=='vi'){echo 'Nhập họ tên';}else{echo 'Enter your name';}?>" required="required"/>
                                     </div>
                                     <div class="col-sm-1 aj_name_ok"></div>
                                 	 <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10 aj_name"></div>
                                     </div>
                                  </div>
                                  <div class="form-group">
                                     <label for="kmt_add" class="col-sm-2 control-label"><?php if($this->lan=='vi'){echo 'Địa chỉ';}else{echo 'Address';}?> <span>*</span></label>
                                     <div class="col-sm-9">
                                         <input type="text" name="address" class="form-control" id="kmt_add" placeholder="<?php if($this->lan=='vi'){echo 'Nhập địa chỉ';}else{echo 'Enter the address';}?>" required="required"/>
                                     </div>
                                     <div class="col-sm-1 aj_add_ok"></div>
                                  	 <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10 aj_add"></div>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="kmt_phone_re" class="col-sm-2 control-label"><?php if($this->lan=='vi'){echo 'Điện thoại';}else{echo 'Phone';}?> <span>*</span></label>
                                 <div class="col-sm-9">
                                     <input type="text" name="phone" class="form-control" id="kmt_phone_re" placeholder="<?php if($this->lan=='vi'){echo 'Nhập số điện thoại';}else{echo 'Enter your phone number';}?>" required="required"/>
                                    </div>
                                    <div class="col-sm-1 aj_phone_ok"></div>
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10 aj_phone"></div>
                                    </div>
                                 </div>
                				 <div class="form-group">
                                   <label for="kmt_content" class="col-sm-2 control-label">&nbsp;</label>
                                    <div class="col-sm-9">
                                        <span class="kmt_captcha"><?php echo $cap?></span>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                     <label for="kmt_code" class="col-sm-2 control-label"><?php if($this->lan=='vi'){echo 'Mã xác nhận';}else{echo 'Code verification';}?> <span>*</span></label>
                                     <div class="col-sm-9">
                                        <input type="text" name="code" class="form-control" id="kmt_code" placeholder="<?php if($this->lan=='vi'){echo 'Mã xác nhận';}else{echo 'Code verification';}?>" required="required"/>
                                     </div>
                                     <div class="col-sm-1 aj_code_ok"></div>
                                     <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10 aj_code"></div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                     <div class="col-sm-offset-2 col-sm-9">
                                          <button type="submit" class="btn btn-default"><?php if($this->lan=='vi'){echo 'Gửi';}else{echo 'Send';}?></button>
                                          <button type="reset" class="btn btn-default"><?php if($this->lan=='vi'){echo 'Nhập lại';}else{echo 'Reset';}?></button>
                                     </div>
                                 </div>
                           </form>
                            
                        </div>
                    </div>
            
        </div>
        
    </div>
    <!-- End wrap_block_2 -->