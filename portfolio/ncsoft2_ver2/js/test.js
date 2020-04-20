
		/*
		var checkOrientation = function(){
		    mode = Math.abs(window.orientation) == 90 ? 'landscape' : 'portrait';
		     本例為希望在使用者用橫向瀏覽時，就秀出遮罩或警示訊息
		    if (mode == 'landscape')
		    {
		        警語遮罩 顯示
		       $("#mask").show();
		       alert('橫式');
		    } else {
		        警語遮罩 關閉
		       $("#mask").hide();
		       alert('直式');
		    }
		};
		window.addEventListener(“resize”, checkOrientation, false);
		window.addEventListener(“orientationchange”, checkOrientation, false);
		setInterval(checkOrientation, 500);
		*/

		$(window).load(function(){
			$('.loading,.overlay').fadeOut(500);
			// if ( /Android|iPad/i.test(navigator.userAgent) ) {
			    
			// }
			var _winWidth = $(window).width();
			if(/iPad/i.test(navigator.userAgent) && _winWidth <= 1024 && _winWidth >= 1001) {   
			    $('.pad-back').css({display:'block'});
			}  
		  	//偵測螢幕旋轉(寬度改變掉)就重新整理
		  	$(window).bind('orientationchange',function(e){
		  	    location.reload();
		  	});

			//mobile scroll
			$(window).scroll(function(){
				var _mScroll = $(window).scrollTop();
				//console.log(_mScroll);
				if( _mScroll >= 300 ){
					$('.m-scroll-down').fadeOut(500);
				}
				if( _mScroll >= 80){
					TweenMax.to(".m-nav-bg", 0.6, {opacity:1});
				}else{
					TweenMax.to(".m-nav-bg", 0.6, {opacity:0});
				}
			});

			var _fnBox = $('.index-fn').offset().top;
			$('.m-scroll-down').on('click',function(){
				$('html,body').animate({scrollTop:_fnBox},800);
				
			});

			
			if( _winWidth <= 1000 ){
				$('.menu-logo').hide();
				m_startAni();
				//mobile
				$('.btn-menu').on('click',function(){
					$('body,html').css({overflow:"hidden"});
					$('.nav-group-open').css({overflowY:"auto"});
					$('.btn-menu-close').css({opacity:"1"}).show();
					TweenMax.to(".btn-close-box", 0.6, {transform:"rotate(135deg)"});
					TweenMax.to(".nav-bgcolor", 1, {display:"block",opacity:1});
					TweenMax.to(".nav-group-open", 1.2, {display:"block"});
					TweenMax.to(".nav-list",0.6, {opacity:1,right:0});
					TweenMax.to(".nav-company", 0.8, {opacity:1,left:0,delay:1.2});
					TweenMax.to(".nav-ehome", 0.8, {opacity:1,left:0,delay:1.3});
					TweenMax.to(".nav-hi-end", 0.8, {opacity:1,left:0,delay:1.4});
					TweenMax.to(".nav-switches", 0.8, {opacity:1,left:0,delay:1.5});


				});
				$('.btn-menu-close').on('click',function(){
					$('.nav-group-open').css({overflow:"hidden"});
					TweenMax.to(".btn-close-box", 0.6, {transform:"rotate(0deg)"});
					TweenMax.to(".nav-switches", 0.8, {opacity:0,left:"-100%",delay:0.2});
					TweenMax.to(".nav-hi-end", 0.8, {opacity:0,left:"-100%",delay:0.3});
					TweenMax.to(".nav-ehome", 0.8, {opacity:0,left:"-100%",delay:0.4});
					TweenMax.to(".nav-company", 0.8, {opacity:0,left:"-100%",delay:0.5});
					TweenMax.to(".nav-list",0.6, {opacity:0,right:"-300px",delay:0.4});
					TweenMax.to(".nav-group-open", 1, {display:"none",delay:0.6});
					TweenMax.to(".nav-bgcolor", 1, {display:"none",opacity:0,delay:0.8});
					TweenMax.to(".btn-menu-close", 0.6, {opacity:0,display:"none",delay:1});
					TweenMax.to("body,html", 0.6, {overflowX:"hidden",overflowY:"auto",delay:0.8});
				});
			}else{
				startAni();
				$('.btn-menu').on('click',function(){
					//變成xx
					$('.btn-menu-close').css({opacity:"1"}).show();
					TweenMax.to(".btn-close-box", 0.6, {transform:"rotate(135deg)"});
					TweenMax.to(".nav-bgcolor", 1, {display:"block",opacity:1});
					TweenMax.to(".nav-group-open", 1.2, {display:"block"});
					TweenMax.to(".nav-list",0.6, {opacity:1,right:0});
					TweenMax.to(".nav-company", 1.2, {left:"0",opacity:1,ease: Power4.easeOut,delay:0.3});
					TweenMax.to(".nav-ehome", 1.2, {left:"0",opacity:1,ease: Power4.easeOut,delay:0.4});
					TweenMax.to(".nav-hi-end",1.2, {left:"0",opacity:1,ease: Power4.easeOut,delay:0.5});
					TweenMax.to(".nav-switches", 1.2, {left:"0",opacity:1,ease: Power4.easeOut,delay:0.6});
				});
				$('.btn-menu-close').on('click',function(){
					TweenMax.to(".btn-close-box", 0.6, {transform:"rotate(0deg)"});
					TweenMax.to(".nav-switches", 0.6, {opacity:0,delay:0.2});
					TweenMax.to(".nav-hi-end", 0.6, {opacity:0,delay:0.3});
					TweenMax.to(".nav-ehome", 0.6, {opacity:0,delay:0.4});
					TweenMax.to(".nav-company", 0.6, {opacity:0,delay:0.5});
					TweenMax.to(".nav-list",0.6, {opacity:0,right:"-300px",delay:0.4});
					TweenMax.to(".nav-group-open", 1, {display:"none",delay:1});
					TweenMax.to(".nav-bgcolor", 1, {display:"none",opacity:0,delay:1});
					TweenMax.to(".btn-menu-close", 0.6, {opacity:0,display:"none",delay:1,onComplete:_remove});
					function _remove(){
						$('.nav-switches,.nav-hi-end,.nav-ehome,.nav-company').removeAttr('style');
					}
					
				});
			}
			

			var n = 0;
			var _screenScroll = 0;
			if( _winWidth >= 1000){
				$('body,html').mousewheel(function(e) {
				    if(e.deltaY == -1){//-1為判斷滑鼠往下 1為往上
				    	if( _winWidth <= 1000){
				    		//e.deltaY/=-40;
				    		if( _screenScroll == 1) return false;
				    		if( n < 1){
				    		    _screenScroll = 1;
				    		    n++; 
				    		    switch (n) {
				    		        case 1:
				    		            m_companyIn();
				    		            setTimeout( function(){_screenScroll = 0;},1000);
				    		            break; 
				    		        case 2:
				    		            
				    		            break;
				    		    }
				    		}
				    	}else{
				    		//e.deltaY/=-40;
				    		if( _screenScroll == 1) return false;
				    		if( n < 1){
				    		    _screenScroll = 1;
				    		    n++; 
				    		    switch (n) {
				    		        case 1:
				    		        	indSwiper.autoplay.stop();
				    		            companyIn();
				    		            setTimeout( function(){_screenScroll = 0;},1000);
				    		            break; 
				    		        case 2:
				    		            
				    		            break;
				    		    }
				    		}
				    	}
				        
				    }else if (e.deltaY == 1){//1為判斷滑鼠往上
				        //e.deltaY/=40;
				        if( _screenScroll == 1) return false;
				        
				        if( _winWidth <= 1000){
				        	if( n > 0){
				        	    _screenScroll = 1;
				        	    n--;
				        	    switch (n) {
				        	        case 0:
				        	        	indSwiper.autoplay.start();
				        	        	m_companyOut();
				        	            setTimeout( function(){_screenScroll = 0;},1000);
				        	            break; 
				        	        case 1:
				        	            
				        	            break;
				        	    }
				        	}
				        }else{
				        	if( n > 0){
				        	    _screenScroll = 1;
				        	    n--;
				        	    switch (n) {
				        	        case 0:
				        	        	indSwiper.autoplay.start();
				        	        	companyOut();
				        	            setTimeout( function(){_screenScroll = 0;},1000);
				        	            break; 
				        	        case 1:
				        	            
				        	            break;
				        	    }
				        	}
				        }
				        
				    }
				    console.log(e.deltaY);
				    console.log(n);
				});
				
				$('.scroll-txt,.ind-slide').on('click',function(){
					companyIn();
					indSwiper.autoplay.stop();
					n = 1;
				});
				$('.pad-back').on('click',function(){
					companyOut();
					indSwiper.autoplay.start();
					n = 0;
				});
			}
			
			
			
			function startAni(){
				TweenMax.to(".logo", 1.2, {left:"29px",delay:2.2});
				TweenMax.to(".btn-fb", 1.2, {left:"35px",delay:2.2});
				TweenMax.to(".nav-box", 1, {right:"0",delay:2.2});
				TweenMax.to(".btn-menu", 1.5, {right:"35px",delay:2.5});
				TweenMax.to(".menu-txt", 1.5, {right:"20px",delay:2.5});
				TweenMax.to(".swiper-custom-pagin", 1.5, {right:"44px",delay:2.5});
				TweenMax.to(".scroll-txt", 1.5, {right:"-30px",delay:2.5});
				TweenMax.to(".ind-slogan", 1.2, {alpha:1,delay:2.8});
				TweenMax.to(".slogan-top", 1.2, {alpha:1,delay:2.8});

				TweenMax.to(".scroll-line",0.5,{ left:"-5px",repeat:-1,yoyo:true,delay:2});
				TweenMax.to(".scroll-arrow",0.5,{ left:"-5px",repeat:-1,yoyo:true,delay:2});
			}
			function companyIn(){
				TweenMax.to(".nav-box", 0.5, {right:"-20%"});
				TweenMax.to(".menu-txt", 0.5, {opacity:0,right:"-60px"});
				TweenMax.to(".swiper-custom-pagin", 0.5, {right:"-40",delay:0.3});
				TweenMax.to(".slogan-line", 0.5, {right:"-30%",delay:0.3});
				TweenMax.to(".scroll-txt", 0.5, {right:"-100px",delay:0.5});
				TweenMax.to(".ind-slogan", 1, {alpha:0,delay:0.5});

				TweenMax.to(".ind-slide", 1, {transform:"translateY(-200px)",delay:1});
				TweenMax.to(".index-fn", 1, {bottom:0,delay:1});
				TweenMax.to(".fn-cont", 1, {transform:"scale(0.9)",opacity:1,delay:1.6});
			}
			function companyOut(){
				TweenMax.to(".fn-cont", 0.5, {transform:"scale(0)",opacity:0});
				TweenMax.to(".index-fn", 1, {bottom:"-58%",delay:0.5});
				TweenMax.to(".ind-slide", 1, {transform:"translateY(0)",delay:0.5});
				TweenMax.to(".scroll-txt", 1.5, {right:"-30px",delay:0.5});
				TweenMax.to(".nav-box", 1, {right:"0",delay:1});
				TweenMax.to(".swiper-custom-pagin", 1.5, {right:"44px",delay:1});
				TweenMax.to(".menu-txt", 1.5, {right:"20px",opacity:1,delay:1.2});
				TweenMax.to(".slogan-line", 0.5, {right:"130%",delay:1.2});
				TweenMax.to(".ind-slogan", 1.2, {alpha:1,delay:1.4});
			}

			//mobile
			function m_startAni(){
				TweenMax.to(".btn-menu", 1, {right:"15px",delay:0.7});
				TweenMax.to(".logo", 1, {right:"58px",opacity:1,delay:1});
				TweenMax.to(".ind-slogan", 0.8, {opacity:1,transform:"translateY(0)",delay:1});
				TweenMax.to(".m-slogan-top", 0.8, {opacity:1,transform:"translateY(0)",delay:1.1});
				TweenMax.to(".m-swiper-custom-pagin", 0.6, {right:"15px",delay:2});

				TweenMax.to(".m-scroll-down",0.5,{bottom:"3%",repeat:-1,yoyo:true,delay:2});
			}
			function m_companyIn(){
				TweenMax.to(".nav-box", 1, {height:"9%"});
				TweenMax.to(".menu-txt", 0.5, {opacity:0,right:"-60px"});
				TweenMax.to(".swiper-custom-pagin", 0.5, {right:"-40",delay:0.3})…