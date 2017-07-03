<!-- Begin wrap_block_2 -->
    <div id="wrap_block_2" class="container kmt_inside">
        
        
        
        <div class="row wrap_center">
        	
           <div class="kmt_title"><span><?php if($this->lan=='vi'){echo 'Cập nhật mật khẩu';}else{echo 'Update password';}?></span></div>
           
           <div class="col-lg-12">
                        <div class="row kmt_form" style="margin-top:50px;">
                        <form class="form-horizontal" role="form" action="<?php echo base_url('update-pass')?>" method="post">
    
                                <input name="idU" type="hidden" value="<?php echo $idU?>"/>
                                <input name="MaKH" type="hidden" value="<?php echo $MaKH?>"/>  
    
                                 <div class="form-group">
                                     <label for="kmt_pass" class="col-sm-3 control-label"><?php if($this->lan=='vi'){echo 'Mật khẩu mới';}else{echo 'New password';}?> <span>*</span></label>
                                     <div class="col-sm-7">
                                         <input type="password" name="pass" class="form-control" id="kmt_pass" placeholder="<?php if($this->lan=='vi'){echo 'Chọn mật khẩu từ 6-12 ký tự';}else{echo 'Choose a password between 6 and 12 characters';}?>" required="required"/>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label for="kmt_repass" class="col-sm-3 control-label"><?php if($this->lan=='vi'){echo 'Nhập lại mật khẩu';}else{echo 'Retype the password';}?> <span>*</span></label>
                                     <div class="col-sm-7">
                                         <input type="password" name="repass" class="form-control" id="kmt_repass" placeholder="<?php if($this->lan=='vi'){echo 'Nhập lại mật khẩu';}else{echo 'Retype the password';}?>" required="required"/>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <div class="col-sm-offset-3 col-sm-9">
                                          <button type="submit" class="btn btn-default"><?php if($this->lan=='vi'){echo 'Cập nhật';}else{echo 'Update';}?></button>
                                          <button type="reset" class="btn btn-default"><?php if($this->lan=='vi'){echo 'Nhập lại';}else{echo 'Retype';}?></button>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <p class="kmt_note" style="text-align:left">
                                            <a href="javascript:void(0)">
                                        	<?php
                                                if($stt!=null){
                                                        if($this->lan=='vi'){
                                                            Switch($stt){
                                                            Case '0':
                                                                echo "Vui lòng chọn mật khẩu mới!";
                                                            break;  
                                                            
                                                            Case '1':
                                                                echo "Mật khẩu phải từ 6 tới 12 ký tự!";
                                                            break;   
                                                            
                                                            Case '2':
                                                                echo "Hai mật khẩu không khớp";
                                                            break; 
                                                        
                                                            Default:
                                                                echo "Mật khẩu đã được cập nhật";
                                                            break;
                                                    
                                                        }
                                                        }else{
                                                            Switch($stt){
                                                            Case '0':
                                                                echo "Please select a new password!";
                                                            break;  
                                                            
                                                            Case '1':
                                                                echo "Password must be between 6 and 12 characters!";
                                                            break;   
                                                            
                                                            Case '2':
                                                                echo "Two passwords do not match";
                                                            break; 
                                                        
                                                            Default:
                                                                echo "Password has been updated";
                                                            break;
                                                    
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