// JavaScript Document
$(document).ready(function() {
	
$('.wedPics').cycle();

	// responsive run
	 responsive();	
	 
	 // grab url
	 var url = self.document.location.hash.substring(1); 	 
	 if(url === 'thanks'){
	 $('.thankswrap').css('display', 'block');	 
	 $("html, body").animate({ scrollTop: $('.thanks').offset().top }, 1000);	 
	 }
	else  { }
	 
	 // logo redirect
	$('.logo').click( function() {
	window.location.href = "http://www.jamthunderdj.com/";
});

// Package Hover
$('.deals').not('.active').hover(function() {
	var grab = $(this).attr('id');
	var newPackage = "." + grab;
	
	$(this).addClass('hover');	
	$(this).find('.slide').stop().animate({ top: '0px'}, 500, function () {
	
	});
	
 },function() {
	 $(this).removeClass('hover')
	$(this).find('.slide').stop().animate({ top: '-281px'}, 500, function () {
			
	});
	
 }); 
 
 // Package select -- Packages in control
 $('.slide').find('h3').click( function() {
	   
	
		$('.deals.active').removeClass('active');
		var current = $(this).parent().parent().attr('id');
		$(this).parent().parent().addClass('active')
		
		// Form Changing -- Packages in control
		 var curID = $(this).prop('id');	
		$('form option').prop('selected', false);
		$('.form option').each(function() {	
		$(this).removeClass('chosen').removeAttr('selected');
     	if($(this).val() === curID) {
          $(this).prop('selected', 'selected');   
		  	 $("html, body").animate({ scrollTop: $('.contact').offset().top }, 1000);	
			 $('select').addClass('activeChoose'); 

        } else { }
		
    });
		
		});
 
	
// Form changing -- Form in control	
	 $('select').change(function() {
	$('select option.chosen').removeClass('chosen')
	 $("select option:selected").each(function () {
		
  $(this).addClass('chosen')
  $('select').addClass('activeChoose'); 

 var formchose =  $('.chosen').attr('value');
 
  // Packages changing -- Form in control	
  $('.deals').each(function() {
	 $(this).removeClass('active');  
	 
    if(formchose == $(this).attr('id')) {
	$(this).addClass('active')
		
	}else { }

  });
  
  
	
	});

});
	
	
 // Form Validation
   $('.submit').click(function() { 
 
   var emailReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;	
	 
 var errors = false;
 
 $('.errors, .errors1').remove();
 
 if($('.name').val() == $('.name').attr('value')) {
    $('.name').after('<span class="errors">Please add your first name!</span>');	
	errors = true; 
 } 
 
 if($('.email').val() == $('.email').attr('value')) {
    $('.email').after('<span class="errors">Please add your email!</span>');	
	errors = true; 
 }else if(!emailReg.test($('.email').val())){
 $('.email').after('<span class="errors">Not a valid email!</span>');	
	errors = true;  
	 
 }
 
  if($('.phone').val() == $('.phone').attr('value')) {
    $('.phone').after('<span class="errors">Please add your phone number!</span>');	
	errors = true; 
 }
 
   if($('textarea').val() === 'Message') {
	    $('.message').after('<span class="errors1">Please add your message!</span>');	
	errors = true; 
 }
 
 
 if(errors == true){
	return false; 
 } else {
	return true; 
 }
 
 
 });
 
 /* clear form field out..for IE*/
 
 
 
 
 
 $('input').each(function() {	 
	 
	var Input = $(this);
    var default_value = Input.val();

    $(Input).focus(function() {
		
        if($(this).val() == default_value)
        {
             $(this).val("");
			  
			 }
		
    }).blur(function(){
		
        if($(this).val().length == 0) 
        {
            $(this).val(default_value);
        }
    }); 
	
  });
  
  
 

 
   
   $('textarea').focus(function() {
	   
	   if($('textarea').val() === 'Message')        {
			
             $('textarea').val('');
			 			  
		}
	 
	}).blur(function(){
		
		if($('textarea').val() === '') 
		
        {   
            $('textarea').val('Message');
        }
		
	});
    

  
  
   
 

 
  // Fancybox
$('.fancybox-media, .fancybox')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});
		
		
		$('.bxslider').bxSlider({
  adaptiveHeight: true,
  mode: 'fade',
  auto: true,
  autoControls: false,
  speed: 5000
});




 // Navigation Scroll down
$('nav ul li a, .navigation ul li a').click(function(){
/*$('.navigation').fadeOut('slow');*/
var el = $(this).attr('href');
var elWrapped = $(el);
scrollToDiv(elWrapped,40);
return false;
	
});
	
function scrollToDiv(element,navheight){
var offset = element.offset();
var offsetTop = offset.top;
var totalScroll = offsetTop-navheight;
		
$('body,html').animate({
scrollTop: totalScroll
}, 500);
	
}

/*$("a[href='#top']").click(function() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});*/


   // Scroll Up
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        }); 
 
        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });
		
		  // Logo Animation
	if($('body').hasClass('iphone')) {
	  $('.jamthunder').delay(600).animate({ 'top':'130px'}, 1000, function() {
   $('.logo h1').fadeIn('slow', function () {
   $('.logo h2').fadeIn('fast');  
   });    
  });	
		
	}else {
		  
  $('.jamthunder').delay(600).animate({ 'top':'125px'}, 1000, function() {
   $('.logo h1').fadeIn('slow', function () {
   $('.logo h2').fadeIn('fast', function() {
   $('.hat').fadeIn('slow');	 
   	});  
   });   
  });
  
}
  
  
    // Device
  function responsive(){		
		
        var winWidth = $(window).width();
        if(winWidth >= 1024) { //tablet
		$('body').removeClass('iphone'); 
		$('body').removeClass('ipad'); 
		
        } 
        else if(winWidth <= 568){  //mobile
        $('body').addClass('iphone'); 
		$('body').removeClass('ipad');   
        }
		 else if(winWidth >= 768 && winWidth <= 1024){  //mobile
        $('body').addClass('ipad');   
		$('body').removeClass('iphone');
		
		
        }
		
        else{  //desktop
		/*$('body').removeClass('iphone');*/   

        }
    }
	
	 // scrolling testimonials
	$('.blurb').cycle({ 
    fx:    'scrollRight', 
    delay: 5000 
});


   $('.mobilenav').click( function(){
   $('.navigationwrap').toggleClass('activeNav') 
    
   /*$('.navigation').fadeIn('slow');*/
 });  
    
	
if($('body').hasClass('iphone')) {
   $('.packageinfo').find('.hoverpack').html('<span class="hoverpack">Tap and choose the <span class="number-contract">Package</span> thats right for you:</span>')
	
}else if ($('body').hasClass('ipad')) {
 $('.packageinfo').find('.hoverpack').html('<span class="hoverpack">Tap and choose the <span class="number-contract">Package</span> thats right for you:</span>')	
} else {}
	

 // Christmas Script
 /*$('.christmas').mouseover(function() {
 $('.bigger').css('color', '#3e7324');			
	}).mouseleave(function() {
			$('.bigger').css('color', '#fff');
		});*/
		

  $('.book-wedding').click(function() {
 $("html, body").animate({ scrollTop: $('.contact').offset().top }, 1000);	
   
});  

	

 
});
