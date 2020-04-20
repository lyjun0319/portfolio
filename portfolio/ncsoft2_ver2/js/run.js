$(function(){
	var indexUrl = document.location.href;
	console.log(indexUrl)
	
	if(indexUrl == 'https://pub.mdplus.kr/ncsoft2_ver2/sub2.html'){
		$('html, body, .wrap').css({
			'overflow':'visible'
		});
	};

	if(indexUrl == 'http://pub.mdplus.kr/ncsoft2_ver2/sub2.html'){
		$('html, body, .wrap').css({
			'overflow':'visible'
		});
	};
	//상세페이지
	TweenLite.to('.detail_top p:nth-child(1)',1,{
		text:'ABOUT',
		ease:Linear.easeNone
	});

	TweenLite.to('.detail_top p:nth-child(2)',2,{
		text:'즐거움으로 연결된 새로운세상, 엔씨소프트가 만들어갑니다.',
		ease:Linear.easeNone
	});

	$(window).on('load',function(){
		//상세페이지
		TweenLite.to('.detail_top p:nth-child(1)',1,{
			text:'ABOUT',
			ease:Linear.easeNone
		});

		TweenLite.to('.detail_top p:nth-child(2)',2,{
			text:'즐거움으로 연결된 새로운세상, 엔씨소프트가 만들어갑니다.',
			ease:Linear.easeNone
		});
	});
});