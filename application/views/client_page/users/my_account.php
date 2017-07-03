<!-- Begin wrap_block_2 -->
    <div id="wrap_block_2" class="container kmt_inside">
        
        
        
        <div class="row wrap_center">
        	
           <div class="kmt_title"><span><?php if($this->lan=='vi'){echo 'Tài khoản của bạn';}else{echo 'Your account';}?></span></div>
           
           <div class="col-lg-12">
                        <div class="row kmt_form" style="margin-top:20px;">
                            
                            <?php
                                foreach($info_user as $value){
                                    $idU = $value->idU; 
                                    $Email = $value->Email; 
                                    $Name = $value->HoTen;
                                    $Phone = $value->SDT;
                                    $Address = $value->DiaChi;  
                                }
                            ?>
                        	<div class="col-md-12 kmt_account">
                                   
                                	<p>
                                        <div>Email :</div>
                                        <div><?=$Email?></div>
                                    </p>
                                    <p>
                                        <div>Họ và tên :</div>
                                        <div><?=$Name?></div>
                                    </p>
                                    <p>
                                        <div>Số điện thoại :</div>
                                        <div><?=$Phone?></div>
                                    </p>
                                    <p>
                                        <div>Địa chỉ :</div>
                                        <div><?=$Address?></div>
                                    </p>
                                    <p style="margin-top: 20px;">
                                        <a href="<?=base_url('edit-account/'.$idU)?>">
                                           <?php if($this->lan=='vi'){echo 'Chỉnh sửa thông tin';}else{echo 'Edit information';}?>
                                        </a>
                                        <a href="#" style="display: none;">
                                           Lịch sử mua hàng
                                        </a>
                                    </p>
                                </div>
                        
                        </div>
                        
                        
                    </div>
            
        </div>
        
    </div>
    <!-- End wrap_block_2 -->