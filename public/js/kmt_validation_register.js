base_url = 'http://localhost/myphamchauau/';
$(document).ready(function() {
    var kmt_stt;
    $("#kmt_register_form").submit(function() {
        
        var kmt_stt = 0;
        var numberReg =  /^[0-9]+$/;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var text = /^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\_\s]+$/;
        
        var email = $("form#kmt_register_form input[name='email']").val();
        var pass = $("form#kmt_register_form input[name='pass']").val();
        var repass = $("form#kmt_register_form input[name='repass']").val();
        var name = $("form#kmt_register_form input[name='name']").val();
        var address = $("form#kmt_register_form input[name='address']").val();
        var phone = $("form#kmt_register_form input[name='phone']").val();
        
        var code = $("form#kmt_register_form input[name='code']").val();
        var cap = $("form#kmt_register_form input[name='cap']").val();
        
        
        
        
        //Check email
        if(email == "") {
            $('#note_register').html('Please select an email!');
            $('.aj_email').html(tb);
			$('.aj_email_ok').html('');
            kmt_stt = 1;
        }else{
            if(!emailReg.test(email)){
                var tb = "<img src='"+ base_url +"public/img/tip_warn.png'/> Email is malformed!"
                $('.aj_email').html(tb);
				$('.aj_email_ok').html('');
                kmt_stt = 1; 
            }else{
				
                $.ajaxSetup({async: false});
                $.post(base_url+'users/check_email_aj',{email_r: email}, function (data) {
                    if(data=='1'){
                        var tb = "<img src='"+ base_url +"public/img/tip_warn.png'/> Email existing!"
                        $('.aj_email').html(tb);
                        kmt_stt = 1;
                    }else{
                        var tb = "<img src='"+ base_url +"public/img/tip_ok.png'/>"
                        $('.aj_email_ok').html(tb);
                    }
                 }); 
                 $.ajaxSetup({async: true});   
				 
            }
         }
         
          //Check phone
          if(phone!=""){
            if(!numberReg.test(phone)){
                var tb = "<img src='"+ base_url +"public/img/tip_warn.png'/> Phone is number!"
                $('.aj_phone').html(tb);
				$('.aj_phone_ok').html('');
                kmt_stt = 1;
            }else{
                var tb = "<img src='"+ base_url +"public/img/tip_ok.png'/>"
                $('.aj_phone_ok').html(tb);
				$('.aj_phone').html('');
            }
          }
        
        //Check pass
        if(pass == "") {
            var tb = "<img src='"+ base_url +"public/img/tip_warn.png'/> Select your password!"
            $('.aj_pass').html(tb);
            $('.aj_pass_ok').html('');    
            kmt_stt = 1;
        }else{
            if(pass.length < 6 || pass.length >12) {
                //$('#note_register').html('Passwords must be from 6 to 12 characters!');
                var tb = "<img src='"+ base_url +"public/img/tip_warn.png'/> Passwords must be from 6 to 12 characters!"
                $('.aj_pass').html(tb);
            	$('.aj_pass_ok').html('');
                kmt_stt = 1;
            }else {
    			if(pass != repass) {
    				var tb = "<img src='"+ base_url +"public/img/tip_warn.png'/> The passwords do not match!"
                    $('.aj_pass').html(tb);
                    $('.aj_repass').html(tb);
                    $('.aj_pass_ok').html('');
                    $('.aj_repass_ok').html('');
    				kmt_stt = 1;
    			}else{
    			     var tb = "<img src='"+ base_url +"public/img/tip_ok.png'/>"
                     $('.aj_pass_ok').html(tb);
                     $('.aj_repass_ok').html(tb);
					 $('.aj_pass').html('');
					 $('.aj_repass').html('');
    			}
    		}
        }
        
        if(name != "") {
            var tb = "<img src='"+ base_url +"public/img/tip_ok.png'/>"
            $('.aj_name_ok').html(tb);
			$('.aj_name').html('');
        }
        
        if(address != "") {
            var tb = "<img src='"+ base_url +"public/img/tip_ok.png'/>"
            $('.aj_add_ok').html(tb);
			$('.aj_add').html('');
        }
       
        
        //Check Capcha
        if(code == "") {
            var tb = "<img src='"+ base_url +"public/img/tip_warn.png'/> Please enter confirmation code!"
            $('.aj_code').html(tb);
            $('.aj_code_ok').html('');
            kmt_stt = 1; 
        }else{
           if(code!=cap){
                var tb = "<img src='"+ base_url +"public/img/tip_warn.png'/> Incorrect code!"
                $('.aj_code').html(tb);
				$('.aj_code_ok').html('');
                kmt_stt = 1;
            } else{
                var tb = "<img src='"+ base_url +"public/img/tip_ok.png'/>"
                $('.aj_code_ok').html(tb);
				$('.aj_code').html('');
            }
        }
        
        
        if(kmt_stt == 1){
            return false;
        }
        kmt_stt = 0;
        
    });
    
    
    
});
