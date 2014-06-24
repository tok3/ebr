// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();


$(document).ready(function() 
{ 

	var viewportWidth = $(window).width();

	function realignFooter()
	{
		if(sticky_footer != 'off')
		{
			if ((sticky_footer == 'allways') || (sticky_footer == 'on_less_content' && $("body").height() < $(window).height())) {

				var footerWidth = document.getElementById('footer').offsetWidth;

				document.getElementById('footer').style.position = "fixed"; 
				document.getElementById('footer').style.bottom = "0"; 
				$( "<p></p>" ).insertAfter( "#content");
				
				if(footer_width == 'content')
				{
					document.getElementById('footer').style.width = footerWidth + "px"; 
				}
			}
			
			if(sticky_footer == 'on_less_content' && $("body").height() > $(window).height()) 
			{			
				document.getElementById('footer').style.position = "relative"; 

			}

		}
	}

	if(viewportWidth > 640)
	{
		realignFooter();
		$('#topnav').center();

		window.onresize = function() {
			realignFooter();
			$('#topnav').center();
		};
	}

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


// navi semitransp wenn über content 
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



// kontaktform 
$('input[name="contact-submit"]').addClass('buton small	right').val('Versenden');
$('#custUpl').click(function(){

	$('#contact_attachment').trigger('click');
});

// ende kontaktform

}); // end doc ready 


jQuery.fn.center = function () {
	// this.css("position","fixed");
 //    // this.css("top", ( $(window).height() - this.height() ) / 2+$(window).scrollTop() + "px");
 //    this.css("left", ( $(window).width() - this.width() ) / 2+$(window).scrollLeft() + "px");
 //    this.css("z-index", "99");
 //    return this;
}

