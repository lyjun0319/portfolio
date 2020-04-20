$(function(){
	var win_h = $(window).height();
	$('.section01').css('height', win_h);

	$(window).resize(function(){
		var win_h = $(window).height();
		$('.section01').css('height', win_h);
	});

	$('.nav_open_btn').on('click', function(){
		$(this).parents('.header').addClass('active');
	});

	$('.nav_close_btn').on('click', function(){
		$(this).parents('.header').removeClass('active');
	})
	
	

	//sets time, jumping to new value just like seek()

	function slide01(){
		TweenMax.to(".mtxt", 1, {left:'18%', delay:0.5, opacity:1});
		TweenMax.to(".slide_line_bg", 1, {bottom:'0', delay:1, opacity:1});
		TweenMax.to(".slide_bg", 1, {bottom:'0', delay:1.5, opacity:1, onComplete:function(){
			TweenMax.to(".mtxt", 1, {left:'0', delay:1, opacity:0});
			TweenMax.to(".slide_line_bg", 1, {bottom:'-100px',delay:1, opacity:0});
			TweenMax.to(".slide_bg", 1, {bottom:'-100px',delay:1, opacity:0, onComplete:function(){
				slide02();
			}});

		}});
	}

	function slide02(){
		TweenMax.to(".mtxt02", 1, {left:'18%', delay:0.5, opacity:1});
		TweenMax.to(".slide_line_bg02", 1, {bottom:'0', delay:1, opacity:1});
		TweenMax.to(".slide_bg02", 1, {bottom:'0', delay:1.5, opacity:1, onComplete:function(){
			TweenMax.to(".mtxt02", 1, {left:'0', delay:1, opacity:0});
			TweenMax.to(".slide_line_bg02", 1, {bottom:'-100px',delay:1, opacity:0});
			TweenMax.to(".slide_bg02", 1, {bottom:'-100px',delay:1, opacity:0, onComplete:function(){
				slide03();
			}});
		}});
	}

	function slide03(){
		TweenMax.to(".mtxt03", 1, {left:'18%', delay:0.5, opacity:1});
		TweenMax.to(".slide_line_bg03", 1, {bottom:'0', delay:1, opacity:1});
		TweenMax.to(".slide_bg03", 1, {bottom:'0', delay:1.5, opacity:1, onComplete:function(){
			TweenMax.to(".mtxt03", 1, {left:'0', delay:1, opacity:0});
			TweenMax.to(".slide_line_bg03", 1, {bottom:'-100px',delay:1, opacity:0});
			TweenMax.to(".slide_bg03", 1, {bottom:'-100px',delay:1, opacity:0, onComplete:function(){
				slide01();
			}});
		}});
	}
	slide01();
});

