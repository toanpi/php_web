<!-- Begin wrap_block_2 -->
    <div id="wrap_block_2" class="container kmt_inside">
        
        
        
        <div class="row wrap_center">
        	
           <div class="kmt_title"><span><?php if($this->lan=='vi'){echo 'Quên mật khẩu đăng nhập';}else{echo 'Forgot login password';}?></span></div>
           
           <div class="col-lg-12">
                    	
                        
                        <div class="row kmt_form" style="margin-top:50px;">
                        	<form class="form-horizontal" role="form" action="<?=base_url('get-pass')?>" method="post">

                               <div class="form-group">
                                 <label for="kmt_email" class="col-sm-3 control-label"><?php if($this->lan=='vi'){echo 'Email đã đăng ký';}else{echo 'Email registered';}?> <span>*</span></label>
                                 <div class="col-sm-7">
                                     <input type="email" name="email" class="form-control" id="kmt_email" placeholder="<?php if($this->lan=='vi'){echo 'Nhập địa chỉ Email';}else{echo 'Enter your email address';}?>"/>
                                  </div>
                               </div>
                
                               <div class="form-group">
                                  <div class="col-sm-offset-3 col-sm-9">
                                      <button type="submit" class="btn btn-default"><?php if($this->lan=='vi'){echo 'Lấy lại mật khẩu';}else{echo 'Password retrieval';}?></button>
                                      <button type="reset" class="btn btn-default"><?php if($this->lan=='vi'){echo 'Nhập lại';}else{echo 'Retype';}?></button>
                                  </div>
                              </div>
                              <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <p class="kmt_note" style="text-align:left">
                                                    <a href="javascript:void(0)">
                                                	<?php
                                                    if($stt!= null){
                                                        if($stt==0){
                                                            if($this->lan=='vi'){
                                                                echo 'Vui lòng kiểm tra email để lấy lại mật khẩu!';
                                                            }else{
                                                                echo 'Please check email to get back your password!';
                                                            }
                                                        }else{
                                                            if($this->lan=='vi'){
                                                                echo 'Vui lòng nhập đúng email đã đăng ký!';
                                                            }else{
                                                                echo 'Please enter the correct registered email!';
                                                            }
                                                           
                                                        }
                                                    }
                                                    ?>
                                                    </a>
                                                </p>
                                            </div>
                                          </div>
                              
                           </form>
                        </div>
                    </div>
            
        </div>
        
    </div>
    <!-- End wrap_block_2 -->