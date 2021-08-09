
$(document).ready(function() {
	//service
	/*$('.primary-menu').slideUp();*/
	$('.icon-menu-m').click(function(event){
		$('.primary-menu').slideToggle();
	});



	$(function() {
	  var text = $(".text");
	  $(window).scroll(function() {
	    var scroll = $(window).scrollTop();

	    if (scroll >= 50) {
	      text.removeClass("hidden");
	    } else {
	      text.addClass("hidden");
	    }
	  });
	});


	/*ADMIN*/
	$('#menu-action').click(function() {
	  $('.sidebar').toggleClass('active');
	  $('.main').toggleClass('active');
	  $(this).toggleClass('active');

	  if ($('.sidebar').hasClass('active')) {
	    $(this).find('i').addClass('fa-close');
	    $(this).find('i').removeClass('fa-bars');
	  } else {
	    $(this).find('i').addClass('fa-bars');
	    $(this).find('i').removeClass('fa-close');
	  }
	});

	// Add hover feedback on menu
	$('#menu-action').hover(function() {
	    $('.sidebar').toggleClass('hovered');
	});


});

