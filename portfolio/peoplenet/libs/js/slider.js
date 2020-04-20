$(function(){
    var $list = $('ul.slide_content');
	var size = $list.children().outerWidth();
	var len =  $list.children().length;
	var speed = 2000;
	var timer = null;
	var auto = true;
	var cnt = 1;

	$list.css('width',len*size);

	if(auto) timer = setInterval(autoSlide, speed);

	$list.children().bind({
		'mouseenter': function(){
			if(!auto) return false;
			clearInterval(timer);
			auto = false;
		},
		'mouseleave': function(){
			timer = setInterval(autoSlide, speed);
			auto = true;
		}
	})

	$('.slider_btn').children().bind({
		'click': function(){
			var idx = $('.slider_btn').children().index(this);
			cnt = idx;
			autoSlide();
			return false;
		},
		'mouseenter': function(){
			if(!auto) return false;
			clearInterval(timer);
			auto = false;
		},
		'mouseleave': function(){
			timer = setInterval(autoSlide, speed);
			auto = true;
		}
	});

	function autoSlide(){
		if(cnt>len-1){
			cnt = 0;
		}
		$list.animate({'left': -(cnt*size)+'px' },'normal');

		var source2 = $('.slider_btn').children().eq(cnt).addClass('active').siblings().removeClass('active')

		cnt++;
	}
})
