var kmt_stt;

(function ($) {
    
    "use strict";
   
    $(document).ready(function () {
		
		
		
		$('.info_booking').on('shown.bs.modal', function( e ) {
		   $('#kmt_date_in').html($('#date_in').val());
		   $('#date_in_sb').val($('#date_in').val());
		   $('#kmt_date_out').html($('#date_out').val());
		   $('#date_out_sb').val($('#date_out').val());
		   $('#kmt_adults').html($('#adults').val());
		   $('#adults_sb').val($('#adults').val());
		   $('#kmt_child').html($('#child').val());
		   $('#child_sb').val($('#child').val());
		})
			
        $('.info_booking').on('hidden.bs.modal', function ( e ) {
		  	$('#kmt_booking')[0].reset();
		})  
		
		$(this).on('submit', '#kmt_booking', function () {
			kmt_stt = 0;
			var numberReg =  /^[0-9]+$/;
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			
			var hoten = $("form#kmt_booking input[name='hoten']").val();
			var hoten = $("form#kmt_booking input[name='diachi']").val();
			var sdt = $("form#kmt_booking input[name='sdt']").val();
			var email = $("form#kmt_booking input[name='email']").val();
			var code = $("form#kmt_booking input[name='code']").val();
			var cap = $("form#kmt_booking input[name='cap']").val();
			
		   
			//Check email
			if(email == "") {
				if(lang=='vi'){
					var tb = 'Vui lòng nhập email!';
				}else{
					var tb = 'Please enter your email!';
				}
				$('.kmt_note').html(tb);
				kmt_stt = 1;
			}else{
				if(!emailReg.test(email)){
					if(lang=='vi'){
						var tb = 'Vui lòng nhập đúng cú pháp email!';
					}else{
						var tb = 'Please enter a valid email syntax!';
					}
					$('.kmt_note').html(tb);
					kmt_stt = 1; 
				}
			 }
			 
			  //Check phone
			  if(sdt==""){
				if(lang=='vi'){
				   var tb = 'Vui lòng nhập số điện thoại!';
				}else{
					var tb = 'Please enter your phone number!';
				}
				$('.kmt_note').html(tb);
				kmt_stt = 1;
			  }else{
				if(!numberReg.test(sdt)){
					if(lang=='vi'){
						var tb = 'Số điện thoại không bao gồm ký tự!';
					}else{
						var tb = 'Phone numbers do not include characters!';
					}
					$('.kmt_note').html(tb);
					kmt_stt = 1;
				}
			  }
			  
			if(hoten == "") {
				if(lang=='vi'){
				   var tb = 'Vui lòng nhập họ tên!';
				}else{
					var tb = 'Please enter your name!';
				}
				$('.kmt_note').html(tb);
				kmt_stt = 1;
			}
			
			
			//Check Capcha
			if(code == "") {
				
				if(lang=='vi'){
					var tb = 'Vui lòng nhập mã xác nhận!';
				}else{
					var tb = 'Please enter code!';
				}
				$('.kmt_note').html(tb);
				kmt_stt = 1; 
				
			}else{
				if(code!=cap){
					if(lang=='vi'){
						var tb = 'Mã xác nhận không đúng!';
					}else{
						var tb = 'Incorrect code!';
					}
					$('.kmt_note').html(tb);
					kmt_stt = 1;
				}
				
			 }
				
				if(kmt_stt == 1){
					return false;
				}else{
					$.post($('#kmt_booking').attr('action'), $('#kmt_booking').serialize(), function (res) {
						if(res==1){
							$('.kmt_note').html("Send booking sucess");
							$('#kmt_booking').trigger("reset");
						}else{
							$('.kmt_note').html("Send booking failed, please try again");
						}
						
					});
					return false;
				}
			
				kmt_stt = 0;
			
			});
	         
    });

})(window.jQuery);
     
     
        
    
          

