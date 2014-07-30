// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();

$(document).ready(function() { 


	// --------------------------------------------------------------------
	var test = $(".dropdown").prev('a').html(); // mobile collapsed menu


	//console.log($('.top-bar-section').html());
	$(".top-bar-section li").each(function(){


		//console.log($(this).html()+'\n\n');
	});
	// --------------------------------------------------------------------
	// verweisanker fuer energeieausweis form setzen
$("#formEnergieausweis").attr("action",$("#formEnergieausweis").attr("action") + '#formEnergieausweis');


	// --------------------------------------------------------------------
	//  menüfix temp für mobile

		$(".has-dropdown ul").append('<li>&nbsp;</li>'); // mobile collapsed menu

		$("#navCollapsed .dropdown").each(function(){

			var linktext = $(this).prev('a').html(); 
			var target = $(this).prev('a').attr('href');
			$(this).closest('LI').find('.back:first').after('<li><a href="' + target  + '">' + linktext + '</a></li>'); 

		});

	// ende menüfix
	// --------------------------------------------------------------------
	
	fixFooter();

	window.onresize = fixFooter;

	function fixFooter()
	{


		var content = document.querySelector('#content');

		var div = document.querySelector('#footer');

		var footerHeight = div.offsetHeight;
		var footerBottom =  div.offsetTop + footerHeight;
		var innerHeight = window.innerHeight;

		var currStylePos = document.getElementById('footer').style.position;
		var gap = innerHeight - footerBottom;

		if(gap > 0)
		{
			var cHeight = innerHeight - footerHeight - content.offsetTop;
			document.getElementById('content').style.height = cHeight+ 'px';

		}
	}


	// --------------------------------------------------------------------
	
	// set pagination classes to achieve foundation styled pagination without tweaking codeigniters pagination function outside this theme. 
	$('div.pagination').next().addClass('pagination');
	$("div.pagination ul").first().addClass('pagination');


	//	$('.property_footer .columns').height($('.property_footer').height() - 20);


	// iosslidwer

	$('.iosSlider').iosSlider({
		snapToChildren: true,
		desktopClickDrag: true,
		infiniteSlider: true,
		snapSlideCenter: true,
		keyboardControls: true,
		navNextSelector: $('.next'),
		navPrevSelector: $('.prev'),
		navSlideSelector: $('.selectors .item'),
		onSlideComplete: slideComplete,
		onSliderLoaded: sliderLoaded,
		onSlideChange: slideChange,
		
		autoSlide:true
	});


	function slideChange(args) {

		$('.selectors .item').removeClass('selected');
		$('.selectors .item:eq(' + (args.currentSlideNumber - 1) + ')').addClass('selected');

	}



	function slideComplete(args) {

		if(!args.slideChanged) return false;

		var myElement = document.querySelector("#logoTop"); 
		var position = getPosition(myElement);

		var left = position.x + parseInt(250);
		var top = position.y;

		if($(window).width() < 640)
		{
			left = 10;
		}

		$(args.sliderObject).find('.text1, .text2').attr('style', '');

		$(args.currentSlideObject).find('.text1').animate({
			left: left +'px',
			opacity: '0.8'
		}, 700, 'easeOutQuint');

		$(args.currentSlideObject).find('.text2').delay(200).animate({
			left: left + parseInt(30) +'px',
			opacity: '0.8'
		}, 600, 'easeOutQuint');

	}





	function sliderLoaded(args) {

		var myElement = document.querySelector("#logoTop"); 
		var position = getPosition(myElement);

		var left = position.x + parseInt(250);
		var top = position.y;

		if($(window).width() < 640)
		{

			left = 10;
		}

		$(args.sliderObject).find('.text1, .text2').attr('style', '');

		$(args.currentSlideObject).find('.text1').animate({
			
			left: left +'px',
			opacity: '0.8'
		}, 700, 'easeOutQuint');

		$(args.currentSlideObject).find('.text2').delay(200).animate({
			left: left  + parseInt(30) +'px',
			opacity: '0.8'
		}, 600, 'easeOutQuint');

		slideChange(args);

	}


	function getPosition(element) {
		var xPosition = 0;
		var yPosition = 0;

		while(element) {
			xPosition += (element.offsetLeft - $(window).scrollLeft() + element.clientLeft);
			yPosition += (element.offsetTop - $(window).scrollTop + element.clientTop);
			element = element.offsetParent;
		}
		return { x: xPosition, y: yPosition };
	}

	$('.inner').removeClass('hide'); // prevent fouc


	// end slider


	// navi semitransp wenn Ã¼ber content 
	/*$(window).scroll(function(){    
	  var top =  $('#content'); 
	  
	  if ($(this).scrollTop() > 196){
	  $('#topnav').addClass('topnacOpq');
	  }
	  else{
	  $('#topnav').removeClass('topnacOpq');

	  }
	  });
	*/



	// ende
	$('#logoTop').stellar({
		scrollProperty: 'transform'
	});
	$.stellar({
		horizontalOffset: 40,
		verticalOffset: 150
	});


	// --------------------------------------------------------------------
	
	// kontaktform 
	$('input[name="contact-submit"]').addClass('buton small	right').val('Versenden');
	$('#custUpl').click(function(){

		$('#contact_attachment').trigger('click');
	});
	// ende kontaktform

	//callback form widged
	$('.widget input[name="contact-submit"]').addClass('buton tiny	expand').val('Bitte um R\u00fcckruf absenden');

	$('.widget div[class="error"]').css({"position":"relative", "top":"-75px"});

	// callback form 
	// --------------------------------------------------------------------
	
}); // end doc ready 


jQuery.fn.center = function () {
	// this.css("position","fixed");
	//    // this.css("top", ( $(window).height() - this.height() ) / 2+$(window).scrollTop() + "px");
	//    this.css("left", ( $(window).width() - this.width() ) / 2+$(window).scrollLeft() + "px");
	//    this.css("z-index", "99");
	//    return this;
}

