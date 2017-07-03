var lang = 'vi';
var check;
(function ($) {
    
    "use strict";
   
    $(document).ready(function () {
		
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		var yyyy = today.getFullYear();
		
		if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} 
        var today = dd+'/'+mm+'/'+yyyy;
        var temp = parseInt(dd) + 1;
        var mm1 = mm;
        var yyyy1 = yyyy;
		
        if(dd == '31'){
            if(mm=='12'){
                mm1 = '01';
                temp = '1';
                yyyy1 = parseInt(yyyy) + 1;
            }else{
            temp = '1';
            mm1 = parseInt(mm) + 1;
            }
        }
		
        var today1 = temp + '/'+ mm1 + '/' + yyyy1;
		
		$("#date_in").val(today);
		$("#date_out").val(today1);
		
		$(this).on('click', '#kmt_sb_room', function () {
			
			check = 0;
			var dg =  $("#date_in").val();
			var db =  $("#date_out").val();
			var kmt_adults = $("#adults").val();
			var kmt_child = $("#child").val();
            
            
             var regExpr = new RegExp("^\d*\.?\d*$");
             if (!regExpr.test(kmt_adults)) {
                kmt_adults = 0;
             }else{
                kmt_adults = Math.max(0,$("#adults").val());;
             }
             
             if (!regExpr.test(kmt_child)) {
                kmt_child = 0;
             }else{
                kmt_child = Math.max(0,$("#child").val());;
             }
             
            
			if(kmt_adults == 0){
                if(lang =='vi'){
                    alert('Vui lòng chọn số người lớn!');
                 }else{
                     alert('Please select adult!'); 
                 }
                 check = 1;
            }
            
            if(kmt_child>0){
                if(kmt_adults==0){
                    if(lang =='vi'){
                        alert('Trẻ em phải có người lớn đi cùng!');
                    }else{
                        alert('Children must be accompanied by adults!'); 
                    }
                    check = 1;
                }
                
            }
			
            
            var a = dg.replace(/-/g, "/");
            var b = db.replace(/-/g, "/");
            var c = today.replace(/-/g, "/");
            
            function parseDate(str) {
                var mdy = str.split('/');
                return new Date(mdy[2], mdy[1], mdy[0]);
            }
            
            var startDate = parseDate(a).getTime();
            var endDate = parseDate(b).getTime();
            var currentDate = parseDate(c).getTime();
            
            if (startDate > endDate){
                if(lang =='vi'){
                    alert('Ngày trả phòng không phù hợp, vui lòng kiểm tra lại!');
                }else{
                    alert('Check-out date does not match, please check again!'); 
                }
                check = 1;
            }
            else{
                if(startDate < currentDate || startDate == endDate){
                    if(lang =='vi'){
                        alert('Ngày nhận phòng không phù hợp, vui lòng kiểm tra lại!');
                    }else{
                        alert('Check-in date is not correct, please check again!'); 
                    }
                    check = 1;
                }
            }
			
			
			if(check == 1){
				$('.info_booking').modal('hide'); 
			}else{
				$('.info_booking').modal('show'); 
			}
			
			check = 0;

			
		});
		
		
	         
    });

})(window.jQuery);
     
     
        
    
          

