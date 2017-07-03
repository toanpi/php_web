
(function ($) {
    
    "use strict";
  
    $(document).ready(function () {
         
		var kmt_width = $( window ).width();
		console.log(kmt_width);
		if($("#slider4").length){
			
			$("#slider4").responsiveSlides({
				auto: true,
				pager: false,
				nav: true,
				speed: 800,
				namespace: "callbacks",
			}); 
			
			$( ".callbacks_nav" ).hide();
			/* Begin hover callbacks_nav */
			$( ".callbacks_container" ).hover(function() { 
				$(this).find(".callbacks_nav").show();
			},function(){
				$(this).find(".callbacks_nav").hide();
			});
			/* Begin hover callbacks_nav */
		
		}
		
		if($("#wrap_screen").length){
			$("#wrap_screen").SoSlider({
				auto		: 	8000,
				type		:   '',
				speed		: 	700,
				visible		: 	4,
				show_buttons:   0,
				start		:	0,
				scroll		:   1,
				divIds      :   '',
				pause       :   0,
				btnPrev		: 	'#kmt_pre',
				btnNext		: 	'#kmt_next'
			});
		}
		
		$('.img_upload').bind("click" , function () {
			$(this).parent().find(".bt_upload").click();
		});
		
        $('.wrap_action_purchase input[type="file"]').change(function(e){
            e.preventDefault();
            var fileName = $(this).prop("files")[0]['name'];;
            var result = fileName.match(/]_\[(.*)\]/);
            if(result){
                if(result[1]){
                    selectByText($(this).parent().parent().find('p').children('select').attr('id'),result[1]);
                }
            }
            //var fileName = e.target.files[0].mozFullPath;
            //var tmppath = URL.createObjectURL(e.target.files[0]);
            //console.log(tmppath);
            //$('#kmt_multi_order').submit();
                var bt_oder = $(this).parent().parent().find('h4 a');
                var kmt_pr = $(this).parent().parent();
                var kmt_field = $(this).attr('name');
                var kmt_maso = $(this).attr('data-code');
                $('#kmt_IT').val(kmt_field);
                $('#kmt_code').val(kmt_maso);
                
                var url = $('#kmt_multi_order').attr('action');
                var formData = new FormData(document.getElementById("kmt_multi_order"));
                $.ajax({
                    type: "POST",
                    processData: false,
                    contentType: false,
                    url: url,
                    data: formData,
                    success: function (response) {
                        $('.st_version').remove();
                        var stt = response.split('|');
                        if(stt){
                            if(stt[1]){
                                if(stt[1]==0){
                                    bt_oder.css('visibility','visible');
                                }else{
                                    bt_oder.css('visibility','hidden');
                                }
                                kmt_pr.after('<div class="st_version">'+stt[0]+'</div>');
                            }
                        }
                        $('#kmt_multi_order').trigger("reset");
                    }
                });
                
                return false;
                
        });
        
        $(document).on( "change",'.wrap_action_purchase select', function() {
			var prices = $(this).val().split('|');
            if(prices){
                if(prices[1]){
                    $(this).parent().parent().children('h3').text('$'+prices[1]);
                    var href = $(this).parent().parent().find('h4.odb_version a').attr('data-href');
                    if(($(this).parent().parent().find('h4.odb_version')).length){
                       $(this).parent().parent().find('h4.odb_version a').attr('href', href + '/' + prices[0]);
                    }else{
                       return false; 
                    }
                }else{
                   return false; 
                }
            }
        });
        
        $('.wrap_action_purchase_dt input[type="file"]').change(function(e){
            e.preventDefault();
            var fileName = $(this).prop("files")[0]['name'];;
            var result = fileName.match(/]_\[(.*)\]/);
            
            if(result){
                if(result[1]){
                //console.log($(this).parent().parent().find('p').children('select').attr('id'));
                    selectByText_dt($(this).parent().parent().find('p').children('select').attr('id'),result[1]);
                }
            }
                var bt_oder = $(this).parent().parent().find('h4 a');
                var kmt_pr = $(this).parent().parent();
                var kmt_field = $(this).attr('name');
                var kmt_maso = $(this).attr('data-code');
                $('#kmt_IT').val(kmt_field);
                $('#kmt_code').val(kmt_maso);
                
                var url = $('#kmt_multi_order').attr('action');
                var formData = new FormData(document.getElementById("kmt_multi_order"));
                $.ajax({
                    type: "POST",
                    processData: false,
                    contentType: false,
                    url: url,
                    data: formData,
                    success: function (response) {
                        $('.st_version').remove();
                        var stt = response.split('|');
                        
                        if(stt){
                            if(stt[1]){
                                if(stt[1]==0){
                                    bt_oder.css('visibility','visible');
                                }else{
                                    bt_oder.css('visibility','hidden');
                                }
                                kmt_pr.after('<div class="st_version">'+stt[0]+'</div>');
                            }
                        }
                        $('#kmt_multi_order').trigger("reset");
                    }
                });
                
                return false;
                
        });
        
        $(document).on( "change",'.wrap_action_purchase_dt select', function() {
			var prices = $(this).val().split('|');
            
            if(prices){
                if(prices[1]){
                    $(this).parent().parent().parent().children('h3').text('$'+prices[1]);
                    var href = $(this).parent().parent().parent().find('h4.odb_version a').attr('data-href');
                    if(($(this).parent().parent().parent().find('h4.odb_version')).length){
                       $(this).parent().parent().parent().find('h4.odb_version a').attr('href', href + '/' + prices[0]);
                    }else{
                       return false; 
                    }
                }else{
                    return false; 
                }
            }
        });
		          
    });

})(window.jQuery);

function MPinitSlider() {
    // check page
    if(!$('.slider').length)
        return;

    // build anchors
    var items = $('.slider .item');

    $('.slider .points').html('');
    for(var i = 0; i < items.length; i++) {
        $('.slider .points').append('<span data-id="'+i+'"></span>');
    }
    $('.slider .points span').first().addClass('active');

    // add logic
    $('.slider .points span').bind('click', function() {
        var id = $(this).attr('data-id');

        $('.slider .line').stop(true, true).animate({left: -id * parseInt($('.slider').css('width'))}, 400);
        $(this).siblings('.active').removeClass('active');
        $(this).addClass('active');
    });

    $(".slider .overflow").swipe( {
        //Generic swipe handler for all directions
        swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
            var id = $('.slider .points span.active').attr('data-id');

            if(direction == 'left') {
                var newId = ++id;
                if(newId > $('.slider .points span').length - 1) {
                    id = 0
                    newId = id;
                }
                $('.slider .line').stop(true, true).animate({left: -id * parseInt($('.slider').css('width'))}, 400);
            } else {
                var newId = --id;
                if(newId < 0) {
                    id = $('.slider .points span').length - 1;
                    newId = id;
                }
                $('.slider .line').stop(true, true).animate({left: -id * parseInt($('.slider').css('width'))}, 400);
            }

            $('.slider .points span.active').removeClass('active');
            $('.slider .points span[data-id="'+newId+'"]').addClass('active');
        }
    });
    
}

function selectByText(kmt_select,txt) {
    $('#'+kmt_select).find('option').removeAttr("selected");
    $('#'+kmt_select+' option').filter(function() { return $.trim( $(this).attr('data-code') ) == txt; }).attr('selected',true);
    
    var prices = $('#'+kmt_select).val().split('|');
    if(prices[1].length){
      $('#'+kmt_select).parent().parent().children('h3').text('$'+prices[1]);
      var href = $('#'+kmt_select).parent().parent().find('h4.odb_version a').attr('data-href');
      if(($('#'+kmt_select).parent().parent().find('h4.odb_version')).length){
          $('#'+kmt_select).parent().parent().find('h4.odb_version a').attr('href', href + '/' + prices[0]);
      }else{
          return false; 
      }
   }
}

function selectByText_dt(kmt_select,txt) {
    $('#'+kmt_select).find('option').removeAttr("selected");
    $('#'+kmt_select+' option').filter(function() { return $.trim( $(this).attr('data-code') ) == txt; }).attr('selected',true);
    
    var prices = $('#'+kmt_select).val().split('|');
    if(prices[1].length){
      $('#'+kmt_select).parent().parent().parent().children('h3').text('$'+prices[1]);
      var href = $('#'+kmt_select).parent().parent().parent().find('h4.odb_version a').attr('data-href');
      if(($('#'+kmt_select).parent().parent().parent().find('h4.odb_version')).length){
          $('#'+kmt_select).parent().parent().parent().find('h4.odb_version a').attr('href', href + '/' + prices[0]);
      }else{
          return false; 
      }
   }
}

