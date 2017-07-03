<!-- Begin wrap_block_2 -->
    <div id="wrap_block_2" class="container kmt_inside">
        
        
        
        <div class="row wrap_center">
        	
           <div class="kmt_title"><span><?php if($this->lan=='vi'){echo 'Đăng nhập';}else{echo 'Login';}?></span></div>
           
           <div class="col-lg-12">
                        <div class="row kmt_form" style="margin-top:50px;">
                        <form class="form-horizontal" role="form" action="<?=base_url('check-login')?>" method="post">

                           <div class="form-group">
                                <label for="kmt_email" class="col-sm-3 control-label">Email <span>*</span></label>
                                <div class="col-sm-7">
                                     <input type="email" name="email" class="form-control" id="kmt_email" placeholder="<?php if($this->lan=='vi'){echo 'Nhập địa chỉ Email';}else{echo 'Enter email';}?>" required="required"/>
                                </div>
                           </div>
                           <div class="form-group">
                                <label for="kmt_pass" class="col-sm-3 control-label"><?php if($this->lan=='vi'){echo 'Mật khẩu';}else{echo 'Password';}?> <span>*</span></label>
                                <div class="col-sm-7">
                                    <input type="password" name="pass" class="form-control" id="kmt_pass" placeholder="<?php if($this->lan=='vi'){echo 'Nhập mật khẩu';}else{echo 'Enter the password';}?>" required="required"/>
                                </div>
                           </div>
                           <div class="form-group">
                              <label for="kmt_pass" class="col-sm-3 control-label">&nbsp;</label>
                              <div class="col-sm-7"><a href="<?=base_url()?>forgot-password"><?php if($this->lan=='vi'){echo 'Quên mật khẩu';}else{echo 'Forgot password';}?></a></div>
                           </div>
                           <div class="form-group">
                               <div class="col-sm-offset-3 col-sm-9">
                                  <button type="submit" class="btn btn-default"><?php if($this->lan=='vi'){echo 'Đăng nhập';}else{echo 'Login';}?></button>
                                  <button type="reset" class="btn btn-default"><?php if($this->lan=='vi'){echo 'Nhập lại';}else{echo 'Retype';}?></button>
                               </div>
                            </div>
                            <div class="form-group">
                               <div class="col-sm-offset-3 col-sm-9">
                                  <p class="kmt_note" style="text-align:left">
                                       <?php
                                        if($stt!=null){
                                            Switch($stt){
                                                Case '1':
                                                if($this->lan=='vi'){
                                                    echo 'Kiểm tra lại email và mật khẩu!';
                                                }else{
                                                    echo 'Check your email and password!';
                                                }
                                                break; 
                                                
                                                Case '2':
                                                if($this->lan=='vi'){
                                                    echo 'Đăng ký thành công!';
                                                }else{
                                                    echo 'Sign Up Success!';
                                                }
                                                break;  
                                            
                                                Default:
                                                echo '';
                                                break;
                                            }
                                        }
                                        ?>
                                  </p>
                               </div>
                            </div>
                           </form>
                        </div>
                    </div>
            
        </div>
        
    </div>
    <!-- End wrap_block_2 -->