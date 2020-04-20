$(document).ready(function(){
	
	var nav_box = $('.nav_box');
	var video = $('.video');
	var nav_box = $('.nav_box');

	TweenMax.to(".nav_box",1, {right:0,delay:1, onComplete:function(){
		TweenMax.to(".notice_wrap", 0.5, {opacity:1, delay:0.5});
	}});
	TweenMax.to(".video", 1, {right:0,delay:0});
	TweenMax.to(".header_wrap", 1, {transform:"scale(1,1)", opacity:1, delay:1});
	TweenMax.to(".mtxt", 1, {opacity:1, delay:2});
	TweenMax.to(".footer", 1, {opacity:1, delay:2});
	

	var n = 0;
	var _screenScroll = 0;

	$('.scroll, .nc_cont_wrap, .recr_top_bn').mousewheel(function(e) {
		if(e.deltaY == -1){			
			//e.deltaY/=-40;
			if( _screenScroll == 1) return false;
			if( n < 1){
				_screenScroll = 1;
				n++; 
				mouseenter();
				snsbg();
				$('video')[0].pause();
				setTimeout( function(){_screenScroll = 0;},1000);
			}
			
		}else if (e.deltaY == 1){
			//e.deltaY/=40;
			if( _screenScroll == 1) return false;
			
			if( n > 0){
				_screenScroll = 1;
				n--;
				mouseleave();
				$('video')[0].play();
				snsbg_off();
				setTimeout( function(){_screenScroll = 0;},1000);
			}
		}
	});

	function mouseenter(){
		TweenMax.to(".notice_wrap", 0.5, {opacity:0, oncComplete:function(){
			TweenMax.to(".nav_box", 1.5, {right:"-20%"});
		}});
		TweenMax.to(".header_wrap", 0.5, {transform:"scale(1,1)", opacity:1,});
		TweenMax.to(".video", 1, {transform:"translateY(-364px)", delay:1});
		TweenMax.to(".nc_cont_wrap", 1, {bottom:0,delay:1});
		TweenMax.to(".nc_cont", 1, {transform:"scale(1,1)",opacity:1, delay:1.6});
		TweenMax.to(".mtxt", 1, {opacity:0, delay:1});
		TweenMax.to(".arrow", 1, {opacity:1, delay:2});
		TweenMax.to(".recr_top_bn", 1, {top:0, delay:1.5});
	}
	
	function mouseleave(){
		TweenMax.to(".nc_cont", 0.5, {transform:"scale(0)",opacity:0});
		TweenMax.to(".nc_cont_wrap", 1, {bottom:"-100%",delay:0.5});
		TweenMax.to(".video", 1, {transform:"translateY(0)",delay:0.5});
		TweenMax.to(".nav_box",1, {right:0,delay:1, onComplete:function(){
			TweenMax.to(".notice_wrap", 1, {opacity:1, delay:0.5});
		}});
		TweenMax.to(".mtxt", 1, { opacity:1, delay:1})
		TweenMax.to(".arrow", 0.2, {opacity:0,});
		TweenMax.to(".recr_top_bn",1, {top:'-100%', delay:0.5});
		TweenMax.to(".notice_wrap", 1, {top:'50px', delay:1});
	}


	function footer(){
		TweenMax.to(".nc_cont", 0.5, {transform:"scale(0)",opacity:0});	
	}

	$('.intun_btn').on('click',function(){
		main_link_click();
	});

	function main_link_click(){
		TweenMax.to(".nc_cont", 0.5, {transform:"scale(0)",opacity:0});
		TweenMax.to(".nc_cont_wrap", 1, {opacity:0,delay:0.5});
		TweenMax.to(".recruitment_list_wrap", 1.5, {display:'block', opacity:1, delay:1, onCompleat:function(){
		}});
	}



	function snsbg(){
		$('.footer ul li.f_facebook a').css({
			'background':'#425175',
			'transition':'3s',
			'border':'0'
		});

		$('.footer ul li.f_twitter a').css({
			'background':'#669cbe',
			'transition':'3s',
			'border':'0'
		});

		$('.footer ul li.f_youtube a').css({
			'background':'#b41717',
			'transition':'3s',
			'border':'0'
		});
	};

	function snsbg_off(){
		$('.footer ul li.f_facebook a').css({
			'background':'transparent',
			'transition':'3s',
			'border':'1px solid #fff'
		});

		$('.footer ul li.f_twitter a').css({
			'background':'transparent',
			'transition':'3s',
			'border':'1px solid #fff'
		});

		$('.footer ul li.f_youtube a').css({
			'background':'transparent',
			'transition':'3s',
			'border':'1px solid #fff'
		});
	};

	$('.nc_cont ul li').mouseenter(function(){
		$(this).children('.cont_icon').css({
			'animation':'square-to-circle 2s 0.1s infinite cubic-bezier(1,.015,.295,1.225) alternate',
			'box-shadow':'none'
		});

		$(this).mouseleave(function(){
			$(this).children('.cont_icon').css({
				'animation':'none',
				'box-shadow':'inset 4px 4px 8px -3px #000000'
			});	
		});
	});

	$('.tlt').textillate({ 
		loop: false,
		minDisplayTime: 2000,
		in: { 
			effect: 'fadeInLeft',
			shuffle: true,
		}
	});

	$('.tlt2').textillate({ 
		loop: false,
		minDisplayTime: 2000,
		in: { 
			effect: 'fadeInLeft',
			shuffle: true,
		}
	});

	$('.tlt3').textillate({ 
		loop: true,
		minDisplayTime: 2000,
		in: { 
			effect: 'fadeIn',
			shuffle: true,
		},
		out:{
			effect: 'fadeOut',
			shuffle: true,
		}
	});
	
	

	$('.menu_list li').on('mouseover',function(){
		
		$(this).addClass('on')
		$(this).siblings('li').addClass('dim')

		$('.menu_list li.on a .txt_wrap').animate({opacity:1},500)
		$('.menu_list li.dim a .txt_wrap').animate({opacity:0.5},500)

		TweenLite.to('.menu_list li',0.2,{
			width:'20%'
		});

		TweenLite.to(this,0.2,{
			width:'40%'
		});

	});

	$('.menu_list li').on('mouseleave',function(){
		$(this).removeClass('on')
		$(this).siblings('li').removeClass('dim')

	});

	$('.menu_list').on('mouseleave',function(){
		$('.menu_list li a .txt_wrap').animate({opacity:1},500)
		TweenLite.to('.menu_list li',0.2,{
			width:'25%'
		});
	});



	$('.nav li').on('click', 'a', function(){
		$(this).parent().addClass('active').siblings().removeClass('active');
		navContent_Show();
		$('video')[0].pause();
	});

	$('.nav li').on('click','.recruitment', function(){
		recruitments();
		aboutUsEnd();
	});

	$('.close_nav_cont').on('click', function(){
		navContent_Hide();
		recruitments_end();
		aboutUsEnd();
		apply_out();
		$('.nav li').removeClass('active');
		$('video')[0].play();
	});

	$('.nav li').on('click', '.aboutus', function(){
		recruitments_end();
		aboutUs();
		ps_round_end();		
	});

	$('.notice_small').on('click', 'a', function(){
		notice_open();
	});

	$('.notice_big_off').on('click', function(){
		notice_end();
	});

	function notice_open(){
		TweenMax.to(".notice_box", 0.5, {width:'392px', background:'#1f3263',delay:0.5});
		TweenMax.to(".notice_small", 0.5, {opacity:0,display:"none",delay:0.5});
		TweenMax.to(".notice_big", 1, {opacity:1,display:"block",delay:1});
	}

	function notice_end(){
		TweenMax.to(".notice_box", 0.5, {width:'57px', background:'#cba26d',delay:0.5});
		TweenMax.to(".notice_small", 1, {opacity:1, display:"block",delay:1});
		TweenMax.to(".notice_big", 0.1, {opacity:0, display:"none",delay:0.1});
	}

	function navContent_Show(){
		TweenMax.to(".close_nav_cont", 1, {display:"inline-block",opacity:1, delay:1.2});
	}

	function navContent_Hide(){
		TweenMax.to(".close_nav_cont", 1, {display:"none",opacity:0, delay:0.5});
	}

	function aboutUs(){
		TweenMax.to(".menu_list", 0.5, {display:"block"});
		TweenMax.to(".dimm", {display:"none"});
		TweenMax.to(".login_link", 0.5, {display:"none"});
		TweenMax.to('.menu_list li:nth-child(1) .txt_wrap, .menu_list li:nth-child(1) .menu_list_img', 0.8, {opacity:1,left:0,delay:0.9});
		TweenMax.to('.menu_list li:nth-child(2) .txt_wrap, .menu_list li:nth-child(2) .menu_list_img', 0.8, {opacity:1,left:0,delay:1});
		TweenMax.to('.menu_list li:nth-child(3) .txt_wrap, .menu_list li:nth-child(3) .menu_list_img', 0.8, {opacity:1,left:0,delay:1.1});
		TweenMax.to('.menu_list li:nth-child(4) .txt_wrap, .menu_list li:nth-child(4) .menu_list_img', 0.8, {opacity:1,left:0,delay:1.2});
	}

	function aboutUsEnd(){
		TweenMax.to(".menu_list", 1.5, {display:"none"});
		TweenMax.to(".dimm", {display:"block"});
		TweenMax.to(".login_link", 1, {display:"block", delay:1.2});
		TweenMax.to('.menu_list li:nth-child(1) .txt_wrap, .menu_list li:nth-child(1) .menu_list_img', 0.8, {opacity:0, left:"-100%", delay:0.8});
		TweenMax.to('.menu_list li:nth-child(2) .txt_wrap, .menu_list li:nth-child(2) .menu_list_img', 0.8, {opacity:0, left:"-100%", delay:0.6});
		TweenMax.to('.menu_list li:nth-child(3) .txt_wrap, .menu_list li:nth-child(3) .menu_list_img', 0.8, {opacity:0, left:"-100%", delay:0.4});
		TweenMax.to('.menu_list li:nth-child(4) .txt_wrap, .menu_list li:nth-child(4) .menu_list_img', 0.8, {opacity:0, left:"-100%", delay:0.2});	
	}

	function recruitments(){
		TweenMax.to(".nav_box", 0.5, { right:"0", delay:1 });
		TweenMax.to(".recruitments", 1, { left:"0", delay:1 });
		TweenMax.to(".recr_hastag", 1.5, { margin:'0', delay:1.5 });
		TweenMax.to(".recr_list", 3, { top:'0', delay:2.5 });

		setTimeout( function(){
			$('.grid').masonry({
				percentPosition: true,
			})
		},3000);
		ps_round();
	}

	function recruitments_end(){
		TweenMax.to(".nav_box", 1.5, {padding:'0 0 0 35px',right:"0", delay:1.5 });
		TweenMax.to(".recruitments", 1, {left:"-100%", delay:1 });
	}

	function ps_round(){
		TweenMax.to(".round_1", 3.1, { width:'90px', height:"90px", top:'15px', left:"-20px", delay:2 });
		TweenMax.to(".round_2", 3.2, { width:'70px', height:"70px", top:'25px', left:"96px", delay:2.1 });
		TweenMax.to(".round_3", 3.3, { width:'89px', height:"89px", top:'11px', left:"238px", delay:2.2 });
		TweenMax.to(".round_4", 3.4, { width:'90px', height:"90px", top:'93px', left:"50px", delay:2.3 });
		TweenMax.to(".round_5", 3.5, { width:'114px', height:"114px", top:'71px', left:"146px", delay:2.4 });
		TweenMax.to(".round_6", 3.6, { width:'75px', height:"75px", top:'113px', left:"262px", delay:2.5 });
		TweenMax.to(".round_7", 3.7, { width:'114px', height:"114px", top:'184px', left:"3px", delay:2.6 });
		TweenMax.to(".round_8", 3.8, { width:'88px', height:"88px", top:'199px', left:"122px", delay:2.7 });
		TweenMax.to(".round_9", 3.9, { width:'76px', height:"76px", top:'175px', left:"212px", delay:2.8 });
		TweenMax.to(".round_10", 4, { width:'114px', height:"114px", top:'291px', left:"-45px", delay:2.9 });
		TweenMax.to(".round_11", 4.1, { width:'114px', height:"114px", top:'283px', left:"72px", delay:3 });
		TweenMax.to(".round_12", 4.2, { width:'113px', height:"113px", top:'260px', left:"200px", delay:3.1 });
		TweenMax.to(".round_13", 4.3, { width:'101px', height:"101px", top:'390px', left:"23px", delay:3.2 });
		TweenMax.to(".round_14", 4.5, { width:'100px', height:"100px", top:'367px', left:"158px", delay:3.4 });
		TweenMax.to(".round_15", 4.6, { width:'114px', height:"114px", top:'499px', left:"0px", delay:3.5 });
		TweenMax.to(".round_16", 4.7, { width:'89px', height:"89px", top:'460px', left:"112px", delay:3.6 });
		TweenMax.to(".round_17", 4.7, { width:'113px', height:"113px", top:'460px', left:"210px", delay:3.6 });
		TweenMax.set(".hastag_round ul li", {className:"-=active_1", delay:20})
		TweenMax.set(".hastag_round ul li", {className:"-=active_2", delay:20})
		TweenMax.set(".hastag_round ul li", {className:"-=active_3", delay:20})
		TweenMax.set(".hastag_round ul li", {className:"-=active_4", delay:20})
		TweenMax.set(".hastag_round ul li", {className:"-=active_5", delay:20})
		TweenMax.set(".hastag_round ul li", {className:"-=active_6", delay:20})
	}

	function ps_round_end() {
		TweenMax.to(".recr_hastag", 1, { margin:'0 0 0 -320px ', delay:2 });
		TweenMax.to(".recr_list", 1, { top:'100%', delay:3 });
		TweenMax.to(".hastag_round ul li", 3.1, { width:'20px', height:"20px", top:'auto',bottom:'0', left:"48%", delay:3 });
		TweenMax.set(".hastag_round ul li:nth-child(1)", {className:"+=active_1", delay:1})
		TweenMax.set(".hastag_round ul li:nth-child(14)", {className:"+=active_1", delay:1})
		TweenMax.set(".hastag_round ul li:nth-child(3)", {className:"+=active_2", delay:1})
		TweenMax.set(".hastag_round ul li:nth-child(5)", {className:"+=active_3", delay:1})
		TweenMax.set(".hastag_round ul li:nth-child(8)", {className:"+=active_4", delay:1})
		TweenMax.set(".hastag_round ul li:nth-child(10)", {className:"+=active_5", delay:1})
		TweenMax.set(".hastag_round ul li:nth-child(15)", {className:"+=active_6", delay:1})
	}


	// JOB NAV DEPTH2
	$('.recer_depth1 li a').on('click',function(){
		$('.recer_depth2').removeClass('open')
		$(this).parent().addClass('active').siblings().removeClass('active');
		$(this).parents('li').children('.recer_depth2').addClass('open');
	});

	$('.hastag_round ul li').on('click',function(){
		var random_num = Math.floor( Math.random() * ( 6 - 1)) + 1;
		for(i=1; i<=6; i++ ){
			$('.hastag_round ul li').removeClass("active_"+i);
		}
		$(this).addClass("active_" + random_num);
	});
	

	$(".recr_list").scroll( function() {
		$grid = $('#grid')
		var elem = $(".recr_list");
		if(elem[0].scrollHeight - elem.scrollTop() == elem.outerHeight()){ 
			var $items = $("<li><div class='grid_cont'><div class='grid_thumb grid_thumb_none'><a href='http://drbl.in/fWMM'><img src='./img/list_thumb.png'></a></div><div class='grid_txt'><div class='dday_count'><img src='./img/dday01.png' alt=''></div><div class='kind_job'>Development</div><div class='extra_line'></div><div class='job_intro'><dl><dt>빅데이터 엔지니어</dt><dd>국내외 게임 데이터의 전사에 제공하기 위한<br/>데이터 수집/가공 플랫폼 개발 및 게임<br/>데이터를 활용한 분석 지표 개발</dd></dl></div><div class='job_day'><div class='job_daycount'><span><img src='./img/list_month.png' alt=''></span><span>18.05.01 ~ 18.05.31</span></div><div class='joy_dday'>D - 30</div></div></div></div></li><li><div class='grid_cont'><div class='grid_thumb'><a href='http://drbl.in/fWMM'><img src='./img/list_thumb.png'></a></div><div class='grid_txt'><div class='dday_count'><img src='./img/dday01.png' alt=''></div><div class='kind_job'>Development</div><div class='extra_line'></div><div class='job_intro'><dl><dt>빅데이터 엔지니어</dt><dd>국내외 게임 데이터의 전사에 제공하기 위한<br/>데이터 수집/가공 플랫폼 개발 및 게임<br/>데이터를 활용한 분석 지표 개발</dd></dl></div><div class='job_day'><div class='job_daycount'><span><img src='./img/list_month.png' alt=''></span><span>18.05.01 ~ 18.05.31</span></div><div class='joy_dday'>D - 30</div></div></div></div></li><li><div class='grid_cont'><div class='grid_thumb'><a href='http://drbl.in/fWMM'><img src='./img/list_thumb.png'></a></div><div class='grid_txt'><div class='dday_count'><img src='./img/dday01.png' alt=''></div><div class='kind_job'>Development</div><div class='extra_line'></div><div class='job_intro'><dl><dt>빅데이터 엔지니어</dt><dd>국내외 게임 데이터의 전사에 제공하기 위한<br/>데이터 수집/가공 플랫폼 개발 및 게임<br/>데이터를 활용한 분석 지표 개발</dd></dl></div><div class='job_day'><div class='job_daycount'><span><img src='./img/list_month.png' alt=''></span><span>18.05.01 ~ 18.05.31</span></div><div class='joy_dday'>D - 30</div></div></div></div></li>");
			$grid.append($items)
			.masonry( 'appended', $items );
		}
	});

	var swiper = new Swiper('.nc_cont_slide', {
		autoplay: {
			delay: 2500,
			disableOnInteraction: false,
		},
		pagination: {
			el: '.swiper-pagination',
		},
    });

	$('.grid_thumb').on('click', 'a', function(){
		apply();
	})

	$('.temp_save').on('click', function(){
		apply_out();
	});

	function apply() {
		TweenMax.to(".recer_list_cont", 0.5, {display:'none', opacity:0 });
		TweenMax.to("#apply_wrap", 1, {display:'block', paddingTop:0, opacity:1, delay:0.5 });
		TweenMax.to(".recer_list_tab", 0.5, { display:"none",opacity:0,  });
	}

	function apply_out() {
		TweenMax.to(".recer_list_cont", 1, {display:'block', opacity:1, delay:0.5 });
		TweenMax.to("#apply_wrap", 0.5, {display:'none', opacity:0 });
		TweenMax.to(".recer_list_tab", 1, { display:"block", opacity:1,});
	}

});


