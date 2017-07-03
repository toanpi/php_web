$(window).ready(function() {
    var kmt_stt;
    var count_reg = 0;
    
    $(this).on('click', '#kmt_submit_reg', function () {
         count_reg = count_reg + 1;
         console.log(count_reg);
    });
    
    $('#kmt_update_form').submit(function() {   
        var kmt_stt = 0;
        var numberReg =  /^[0-9]+$/;
        var text = /^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\_\s]+$/;
        
        var idU = $("form#kmt_update_form input[name='idU']").val();
        var pass = $("form#kmt_update_form input[name='pass']").val();
        var repass = $("form#kmt_update_form input[name='repass']").val();
        var opass = $("form#kmt_update_form input[name='oldpassword']").val();
        
        var name = $("form#kmt_update_form input[name='name']").val();
        var address = $("form#kmt_update_form input[name='address']").val();
        var phone = $("form#kmt_update_form input[name='phone']").val();
        
        //Check pass
        if(pass != "") {
            if(pass.length < 6 || pass.length >12) {
                //$('#note_register').html('Passwords must be from 6 to 12 characters!');
                var tb = "<img src='"+ base_url +"public/img/tip_warn.png'/> Passwords must be from 6 to 12 characters!"
                $('.aj_pass').html(tb);
                kmt_stt = 1;
            }else {
    			if(pass != repass) {
    				//$('#note_register').html("The passwords do not match");
                    var tb = "<img src='"+ base_url +"public/img/tip_warn.png'/> The passwords do not match!"
                    $('.aj_pass').html(tb);
                    $('.aj_repass').html(tb);
    				kmt_stt = 1;
    			}
    		}
        }

        //Check phone
          if(phone!=""){
            if(!numberReg.test(phone)){
                var tb = "<img src='"+ base_url +"public/img/tip_warn.png'/> Phone is number!"
                $('.aj_phone').html(tb);
                kmt_stt = 1;
            }else{
                var tb = "<img src='"+ base_url +"public/img/tip_ok.png'/>"
                 $('.aj_phone').html(tb);
            }
          }
          

        //Check Old pass
        if(opass == "") {
            //$('#note_register').html("Please enter your current password!");
            var tb = "<img src='"+ base_url +"public/img/tip_warn.png'/> Please enter your current password!"
            $('.aj_oldpass').html(tb);
                
            kmt_stt = 1;
        }else{
            //alert(idU);
            $.ajaxSetup({async: false});
            $.post(base_url+'users/check_pass_aj',{pass_u: opass,idU_u: idU}, function (data) {
                //alert(data);
                if(data=='0'){
                    //$('#note_register').html('Current password is not correct!');
                    var tb = "<img src='"+ base_url +"public/img/tip_warn.png'/> Current password is not correct!"
                    $('.aj_oldpass').html(tb);
                    kmt_stt = 1;
                }
            }); 
            $.ajaxSetup({async: true});  
         }
         
        if(name != "") {
            var tb = "<img src='"+ base_url +"public/img/tip_ok.png'/>"
            $('.aj_name').html(tb);
        }
        
        
        if(address != "") {
            var tb = "<img src='"+ base_url +"public/img/tip_ok.png'/>"
            $('.aj_add').html(tb);
        }
        
        //return false;
        
        if(kmt_stt == 1){
            count_reg = 0;
            return false;
        }
        
        if(count_reg>1){
           return false;
        }
        
        kmt_stt = 0;
        
    });
    
    
});