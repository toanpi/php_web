$(window).ready(function() {
    var kmt_stt;
    var count = 0;
    
    $(this).on('click', '#kmt_submit', function () {
         count = count + 1;
          console.log(count);
    });
    
    $( "form#kmt_contact_form" ).on( "submit", function() { 
       
        var kmt_stt = 0;
        var numberReg =  /^[0-9]+$/;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var text = /^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\_\s]+$/;
        
        
        var name = $("form#kmt_contact_form input[name='hoten']").val();
        var email = $("form#kmt_contact_form input[name='email']").val();
        var phone = $("form#kmt_contact_form input[name='sdt']").val();
        var code = $("form#kmt_contact_form input[name='code']").val();
        var cap = $("form#kmt_contact_form input[name='cap']").val();
        
        
        //Check email
        if(email == "") {
            $('#note_register').html('Please select an email!');
            $('.aj_email').html(tb);
            
            kmt_stt = 1;
        }else{
            if(!emailReg.test(email)){
                var tb = "<img src='"+ base_url +"public/img/tip_warn.png'/> Email is malformed!"
                $('.aj_email').html(tb);
                kmt_stt = 1; 
            }else{
                var tb = "<img src='"+ base_url +"public/img/tip_ok.png'/>"
                $('.aj_email').html(tb);
            }
         }
         
        
          //Check phone
          if(phone!=""){
            if(!numberReg.test(phone)){
                var tb = "<img src='"+ base_url +"public/img/tip_warn.png'/> Phone is number!"
                $('.aj_sdt').html(tb);
                kmt_stt = 1;
            }else{
                var tb = "<img src='"+ base_url +"public/img/tip_ok.png'/>"
                 $('.aj_sdt').html(tb);
            }
          }
          
         
        //Check Capcha
        if(code == "") {
            //$('#note_register').html("Please enter confirmation code!");
            var tb = "<img src='"+ base_url +"public/img/tip_warn.png'/> Please enter confirmation code!"
            $('.aj_code').html(tb);
            kmt_stt = 1; 
        }else{
            
           //var n = code.localeCompare(cap); 
          
           if(code!=cap){
                kmt_stt = 1;
                //$('#note_register').html("Incorrect code!");
                var tb = "<img src='"+ base_url +"public/img/tip_warn.png'/> Incorrect code!"
                $('.aj_code').html(tb);
                
            } else{
                var tb = "<img src='"+ base_url +"public/img/tip_ok.png'/>"
                $('.aj_code').html(tb);
            }
        }
        
        
        if(kmt_stt == 1){
            count = 0;
            return false;
        }
        
        if(count>1){
           return false;
        }
          
        kmt_stt = 0;
       
    });
   
    
    
    
    
});
