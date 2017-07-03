$(window).ready(function() {
    var kmt_stt;
    var count_payment = 0;
    
    $(this).on('click', '#kmt_submit_payment', function () {
         count_payment = count_payment + 1;
         
    });
    $('#kmt_payment_form').submit(function() {
        var kmt_stt = 0;
        var numberReg =  /^[0-9]+$/;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var text = /^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\_\s]+$/;
        
        
        var name = $("form#kmt_payment_form input[name='name']").val();
        var add = $("form#kmt_payment_form input[name='add']").val();
        var phone = $("form#kmt_payment_form input[name='phone']").val(); 
        var email = $("form#kmt_payment_form input[name='email']").val();
        var code = $("form#kmt_payment_form input[name='code']").val();
        var cap = $("form#kmt_payment_form input[name='cap']").val();
        var ship_prices = $("form#kmt_payment_form select[name='ship_prices']").val();
        
        if(ship_prices == 0) {
            var tb = "<img src='"+ base_url +"public/img/tip_warn.png'/> Plesae select a country"
            $('.aj_ship').html(tb);
            kmt_stt = 1;
        }
        
        //Check email
        if(email == "") {
            var tb = "<img src='"+ base_url +"public/img/tip_warn.png'/> Enter your email!"
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
                $('.aj_phone').html(tb);
                kmt_stt = 1;
            }else{
                var tb = "<img src='"+ base_url +"public/img/tip_ok.png'/>"
                 $('.aj_phone').html(tb);
            }
          }
         
        if(name != "") {
            var tb = "<img src='"+ base_url +"public/img/tip_ok.png'/>"
            $('.aj_name').html(tb);
        }
        
        if(text.test(name.replace(/\s/g, ''))){
           var tb = "<img src='"+ base_url +"public/img/tip_ok.png'/>"
            $('.aj_name').html(tb);
        }else{
           var tb = "<img src='"+ base_url +"public/img/tip_warn.png'/> Name include letters!"
           $('.aj_name').html(tb);
        }
         
        //Check Capcha
        if(code == "") {
            var tb = "<img src='"+ base_url +"public/img/tip_warn.png'/> Please enter confirmation code!"
            $('.aj_code').html(tb);
            
            kmt_stt = 1; 
        }else{
           if(code!=cap){
                var tb = "<img src='"+ base_url +"public/img/tip_warn.png'/> Incorrect code!"
                $('.aj_code').html(tb);
                kmt_stt = 1;
            } else{
                var tb = "<img src='"+ base_url +"public/img/tip_ok.png'/>"
                $('.aj_code').html(tb);
            }
        }

        //return false;
        

        if(kmt_stt == 1){
            count_payment = 0;
            return false;
        }
        
        if(count_payment>1){
           return false;
        }
        
        kmt_stt = 0;
        
    });
    
    
});