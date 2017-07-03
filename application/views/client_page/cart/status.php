    <!-- Begin wrap_block_2 -->
    <div id="wrap_block_2" class="container kmt_inside">
        
        <div class="row wrap_center">
        	
           <div class="kmt_title"><span><?php if($this->lan=='vi'){echo 'Trạng thái giao dịch';}else{echo 'Transaction status';}?></span></div>
           
          <div id="status_paypal" class="col-xs-12">
                        <?php
                                        if($this->lan=='vi'){
                                            Switch($check){
                                                Case '1':
                                                    echo '<h2>Giao dịch chưa được chứng thực! Vui lòng kiểm tra tài khoản paypal của bạn</h2>';
                                                break;  
                                                
                                                Case '2':
                                                    echo '<h2>Giao dịch thất bại!</h2>';
                                                break;   
                                                
                                                Case '3':
                                                    echo '<h2>Cảm ơn bạn đã lựa chọn sản phẩm tại '.DOMAIN_NAME.', chúng tôi sẽ liên lạc với bạn để xác nhận đơn đặt. Nhấn vào <a href="'.base_url().'">đây</a> để xem các sản phẩm khác.</h2>';
                                                break; 
                                                
                                            
                                                Default:
                                                    echo '<h2>Giao dịch đã hủy bỏ</h2>';
                                                break;
                                        
                                            }  
                                        }else{
                                            Switch($check){
                                                Case '1':
                                                    echo '<h2>Transaction has not been authenticated! Please check your paypal account</h2>';
                                                break;  
                                                
                                                Case '2':
                                                    echo '<h2>Transaction failure!</h2>';
                                                break;   
                                                
                                                Case '3':
                                                    echo '<h2>Thank you for choosing '.DOMAIN_NAME.' products, we will be in contact with you to confirm the order. Click <a href="'.base_url().'">here</a> to see other products.</h2>';
                                                break; 
                                            
                                                Default:
                                                    echo '<h2>Your transaction has been canceled</h2>';
                                                break;
                                        
                                            }  
                                        }
                                   ?>
                        </div>
            
        </div>
        
    </div>
    <!-- End wrap_block_2 -->