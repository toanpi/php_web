<!-- Begin wrap_block_2 -->
    <div id="wrap_block_2" class="container kmt_inside">
        
        
        
        <div class="row wrap_center">
        	
           <div class="kmt_title"><span><?php if($this->lan=='vi'){echo 'Cập nhật tài khoản';}else{ echo 'Update account';}?></span></div>
           
           <div class="col-lg-12">
              <div class="row kmt_form" style="margin-top:50px;">
                  <?php
                                      foreach($info_user as $value){
                                           $idU = $value->idU;
                                           $Email = $value->Email; 
                                           $Name = $value->HoTen;
                                           $Phone = $value->SDT;
                                           $Address = $value->DiaChi;  
                                     }
                            ?>
                            <form class="form-horizontal" role="form" action="<?=base_url('update-register')?>" method="post" id="kmt_update_form">
                                 <input name="idU" type="hidden" value="<?=$idU?>"/>  
                                 <div class="form-group">
                                    <label for="kmt_email" class="col-sm-2 control-label">Email <span>*</span></label>
                                    <div class="col-sm-9">
                                          <input type="email" name="email" value="<?=$Email?>" class="form-control" id="kmt_email" placeholder="Nhập địa chỉ Email" readonly="readonly"/>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                     <label for="kmt_name" class="col-sm-2 control-label"><?php if($this->lan=='vi'){echo 'Họ tên';}else{echo 'Fullname';}?> <span>*</span></label>
                                     <div class="col-sm-9">
                                       <input type="text" name="name" value="<?=$Name?>" class="form-control" id="kmt_name" placeholder="Nhập họ tên" required="required"/>
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
                                         <input type="text" name="address" value="<?=$Address?>" class="form-control" id="kmt_add" placeholder="Nhập địa chỉ" required="required"/>
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
                                         <input type="text" name="phone" value="<?=$Phone?>" class="form-control" id="kmt_phone_re" placeholder="Nhập số điện thoại" required="required"/>
                                     </div>
                                    <div class="col-sm-1 aj_phone_ok"></div>
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10 aj_phone"></div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                   <label for="kmt_pass" class="col-sm-2 control-label"><?php if($this->lan=='vi'){echo 'Mật khẩu';}else{echo 'Password';}?> <span>*</span></label>
                                   <div class="col-sm-9">
                                     <input type="password" name="pass" autocomplete="off" class="form-control" id="kmt_pass" placeholder="<?php if($this->lan=='vi'){echo 'Chọn một mật khẩu từ 6 tới 12 ký tự';}else{echo 'Choose a password of 6 to 12 characters';}?>"/>
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
                                      <input type="password" name="repass" autocomplete="off" class="form-control" id="kmt_repass" placeholder="<?php if($this->lan=='vi'){echo 'Nhập lại mật khẩu';}else{echo 'Retype password';}?>"/>
                                    </div>
                                    <div class="col-sm-1 aj_repass_ok"></div>
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10 aj_repass"></div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="kmt_oldpass" class="col-sm-2 control-label">Mật khẩu cũ *</label>
                                    <div class="col-sm-9">
                                       <input type="password" autocomplete="off" name="oldpassword" class="form-control" id="kmt_oldpass" required="required"/>
                                    </div>
                                    <div class="col-sm-1 aj_oldpass_ok"></div>
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10 aj_oldpass"></div>
                                    </div>
                                 </div>
                                 
                                 <div class="form-group">
                                     <div class="col-sm-offset-2 col-sm-9">
                                          <button type="submit" class="btn btn-default"><?php if($this->lan=='vi'){echo 'Cập nhật';}else{echo 'Update';}?></button>
                                          <button type="reset" class="btn btn-default"><?php if($this->lan=='vi'){echo 'Nhập lại';}else{echo 'Reset';}?></button>
                                     </div>
                                 </div>
                           </form>      
              </div>
           </div>
            
        </div>
        
    </div>
    <!-- End wrap_block_2 -->