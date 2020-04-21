<?
	$movieFile = $_REQUEST['m'];

	if ( $movieFile == "" )
	{
		$movieFile = "movie2.mp4";
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>NC SOFT</title>	
	<link rel="stylesheet" href="/portfolio/ncsoft2_ver2/css/reset.css">
	<link rel="stylesheet" href="/portfolio/ncsoft2_ver2/css/style.css">
	<link rel="stylesheet" href="/portfolio/ncsoft2_ver2/css/style2.css">
	<link rel="stylesheet" href="/portfolio/ncsoft2_ver2/css/css/style3.css">
	<link rel="stylesheet" href="/portfolio/ncsoft2_ver2/css/css/flaticon.css">
	<link rel="stylesheet" href="/portfolio/ncsoft2_ver2/css/css/animate.css">
	<link rel="stylesheet" href="/portfolio/ncsoft2_ver2/css/css/swiper.min.css">
	<link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">

	<!--[if lte IE 9]>
		<link href='./css/animations-ie-fix.css' rel='stylesheet'>
	<![endif]-->

	<script src="/portfolio/ncsoft2_ver2/js/jquery.3.3.1.min.js"></script>
	<script src="/portfolio/ncsoft2_ver2/js/selectivizr-min.js"></script>
	<script src="/portfolio/ncsoft2_ver2/js/swiper.min.js"></script>
	
	<script src="/portfolio/ncsoft2_ver2/js/jquery.fittext.js"></script>
	<script src="/portfolio/ncsoft2_ver2/js/jquery.lettering.js"></script>
	<script src="/portfolio/ncsoft2_ver2/js/jquery.textillate.js"></script>
	<script src="/portfolio/ncsoft2_ver2/js/TweenMax.min.js"></script>
	<script src="/portfolio/ncsoft2_ver2/js/jquery.mousewheel.min.js"></script>
	
	<script src="/portfolio/ncsoft2_ver2/js/main.js"></script>
	<script src="/portfolio/ncsoft2_ver2/js/run.js"></script>
	<script src="/portfolio/ncsoft2_ver2/js/TextPlugin.min.js"></script>
	
	<script src="./js/modernizr.custom.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.0/socket.io.js"></script>
	<script>
		var socket = io("https://pub.mdplus.kr:8443", {secure:true, rejectUnauthorized:false} );

		socket.on('toMike', function(msg){
			$('#INJURY_CONT').val(msg.message);
		});


	</script>
	<!--[if lte IE 8]>
		<script src="./js/html5.js"></script>
	<![endif]-->
	
</head>
<body>
	<div class="wrap">
		<header class="header_wrap">
			<h1><a href=""><img src="./img/ncsoft.png" alt="엔씨소프트"></a></h1>
			<div class="login">
				<a href="" class="">로그인</a>
				<a href="" class="">회원가입</a>
				<a href="javascript:void(0)" class="close_nav_cont"></a>
			</div>
		</header>

		<div class="notice_wrap">
			<div class="notice_box">
				<div class="notice_small">
					<a href="javascript:void(0)"><img src="./img/notice_icon.png" alt=""></a>
					<span class="notice_count">1</span>
				</div>
				<div class="notice_big">
					<a href="javascript:void(0)" class="notice_big_off"><img src="./img/notice_icon2.png" alt=""></a>
					<a href=""><span class="notice_txt">NCSOFT 인재채용 홈페이지가 리뉴얼되었습니다.</span></a>
				</div>
			</div>	
		</div>

		<div class="scroll">
			<div class="video">
				<div class="dimm"></div>	
				<video class="covervid-video" id="ncVideo" autoplay loop>
					<source src="video/<?=$movieFile?>" type="video/mp4">
				</video>
			</div>
			<div class="mtxt">
				<p class="mtxt_num01"><img src="./img/mtxt_extra.png" alt=""></p>
				<p class="mtxt_num02 tlt">A place filled with enthusiasm,<br/><span> passion</span> and <span>enthusiasm!</span></p>
				<p class="mtxt_num03 tlt2">enjoy NCSOFT, passionate NCSOFT, youth NCSOFT</p>
				<p class="mtxt_num04">
					<span class="flaticon_mouse"><img src="./img/mouse_icon.png" alt=""></span>
					<span class="tlt3">Mouse Wheel</span>
				</p>
			</div>

			<div class="nav_box">
				<nav class="">
					<ul class="nav">
						<li>
							<a href="javascirpt:void(0)" class="aboutus">
								<span class="nav_tt">Culture</span>
								<span class="extra_line"></span>
							</a>
						</li>
						<li>
							<a href="javascript:void(0)" class="">
								<span class="nav_tt">LIFE</span>
								<span class="extra_line"></span>	
							</a>
						</li>
						<li>
							<a href="javascript:void(0)" >
								<span class="nav_tt">JOB</span>
								<span class="extra_line"></span>	
							</a>
						</li>
						<li>
							<a href="javascript:void(0)" class="recruitment">
								<span class="nav_tt">지원하기</span>
								<span class="extra_line"></span>
							</a>					
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<div class="menu_list">
			<ul class="cf">
				<li>
					<a href="sub2.html">
						<span class="txt_wrap">
							<span class="txt_wrap_inner">
								<span class="tit">About US</span>
								<span class="sub_tit">작고, 강하고, 알찬기업</span>
							</span>
						</span> <!-- //txt_wrap -->
						<span class="menu_overlay"><span class="icon_view">view</span></span>
						<img src="img/menu_list_bg_01.jpg" alt="" class="menu_list_img" />
					</a>
				</li>
				<li>
					<a href="#">
						<span class="txt_wrap">
							<span class="txt_wrap_inner">
								<span class="tit">Enjoy NCSOFT</span>
								<span class="sub_tit">즐거움으로 연결된 새로운 세상</span>
							</span>
						</span> <!-- //txt_wrap -->
						<span class="menu_overlay"><span class="icon_view">view</span></span>
						<img src="img/menu_list_bg_02.jpg" alt="" class="menu_list_img" />
					</a>
				</li>
				<li>
					<a href="#">
						<span class="txt_wrap">
							<span class="txt_wrap_inner">
								<span class="tit">NCSOFT Meet</span>
								<span class="sub_tit">온라인 세상을 뛰어넘은 즐거움</span>
							</span>
						</span> <!-- //txt_wrap -->
						<span class="menu_overlay"><span class="icon_view">view</span></span>
						<img src="img/menu_list_bg_03.jpg" alt="" class="menu_list_img" />
					</a>
				</li>
				<li>
					<a href="#">
						<span class="txt_wrap">
							<span class="txt_wrap_inner">
								<span class="tit">Apply</span>
								<span class="sub_tit">젊음과 패기와 열정이 가득한 곳</span>
							</span>
						</span> <!-- //txt_wrap -->
						<span class="menu_overlay"><span class="icon_view">view</span></span>
						<img src="img/menu_list_bg_04.jpg" alt="" class="menu_list_img" />
					</a>
				</li>
			</ul>
		</div> <!-- //menu_list -->

		<div class="nc_cont_wrap">
			<a href="javascript:void(0)" class="arrow">
				<span class="extra_scroll_line"></span>
				<p>SCROLL UP</p>
			</a>
			<div class="nc_cont">
				<div class="nc_cont_in nc_cont_l">
					<div class="elder_interview">
						<div class="elder_stt">interview</div>
						<div class="extra_line"></div>
						<div class="elder_mtt">선배들의<br/>NC STORY</div>
						<a href="" class="link_more"></a>
					</div>
					<div class="utily_link">
						<ul>
							<li>
								<a href="">
									<span class="utily_linkicon"><img src="./img/nc_cont_link01.png" alt=""></span>
									<span class="utily_linktt">인재상</span>
								</a>
								<span class="link_line"></span>
							</li>
							<li>
								<a href="">
									<span class="utily_linkicon"><img src="./img/nc_cont_link02.png" alt=""></span>
									<span class="utily_linktt">채용프로세스</span>
								</a>
								<span class="link_line"></span>
							</li>
							<li>
								<a href="">
									<span class="utily_linkicon"><img src="./img/nc_cont_link03.png" alt=""></span>
									<span class="utily_linktt">비전/핵심가치</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="nc_cont_in">
					<div class="nc_cont_slide">
						<ul class="swiper-wrapper">
							<li class="swiper-slide"><img src="./img/slide_bn01.png" alt=""></li>
							<li class="swiper-slide"><img src="./img/slide_bn02.png" alt=""></li>
						</ul>
						<div class="swiper-pagination"></div>
					</div>
				</div>
				<div class="nc_cont_in nc_cont_r">
					<div class="db_input">
						<div class="elder_mtt">인재DB등록</div>
						<div class="extra_line"></div>
						<div class="elder_stt">NC SOFT에서는<br/>즐거움과 열정을 가진<br/>인재를 기다립니다. </div>
						<a href="" class="link_more"></a>
					</div>
					<div class="utily_link2">
						<ul>
							<li><a href="">채용 <span>FAQ</span></a></li>
							<li class="link_line"></li>
							<li><a href="">1:1 <span>문의</span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="recr_top_bn">
			<div class="recr_top_title">
				<div class="extra_line"></div>
				<div class="recr_top_mtt">NCSOFT <span>Recruit</span></div>
				<div class="recr_top_tt">젊음과 패기와 열정이 가득한 엔씨소프트</div>
			</div>
			<ul>
				<li>
					<a href="">
						<span class="links_tt">신입공채</span>
						<span class="links_comming"><img src="./img/coming.png" alt=""></span>
					</a>
				</li>
				<li>
					<a href="">
						<span class="links_tt">전문연구요원</span>
						<span class="links_comming"><img src="./img/coming.png" alt=""></span>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)" class="intun_btn">
						<span class="links_tt">인턴</span>
						<span class="dday_count">D-15</span>	
						<span class="links_count">3</span>
					</a>
				</li>
				<li>
					<a href="">
						<span class="links_tt">수시채용</span>
						<span class="links_comming"><img src="./img/coming.png" alt=""></span>
					</a>
				</li>
			</ul>	
		</div>

		<div class="recruitment_list_wrap">
			<div class="recruitment_list_inner">
				<div class="recr_list_close"><a href="javascript:void(0)"><img src="./img/close_nav.png" alt=""></a></div>
				<div class="recruitment_list_count">
					<div class="count_line"><img src="./img/list_count.png" alt=""></div>
				</div>
				<div class="recruitment_list_slide">
					<ul class="swiper-wrapper">
						<li class="swiper-slide first">
							<div class="recr_list_cont">
								<div class="recr_list_thumb"><img src="./img/list_thumb01.png" alt=""></div>
								<div class="recr_list_txt">
									<dl>
										<dt class="recr_list_tt">글로벌 손익 관리<br/>담당자 채용</dt>
										<dd class="recr_list_dday">18.05.01 ~ 18.05.31</dd>
										<dd class="recr_list_carrer">
											<span>경력</span>
											<span>신입</span>
											<span class="recr_list_carrer_dday">D-30</span>
										</dd>
									</dl>
									<a href="javascript:void(0)" class="recr_target">지원하기</a>	
								</div>
							</div>
							<div class="recr_list_extratt">
								<span class="recr_list_mtt">Development</span>
							</div>
						</li>
						<li class="swiper-slide two">
							<div class="recr_list_cont">
								<div class="recr_list_thumb"><img src="./img/list_thumb01.png" alt=""></div>
								<div class="recr_list_txt">
									<dl>
										<dt class="recr_list_tt">글로벌 손익 관리<br/>담당자 채용</dt>
										<dd class="recr_list_dday">18.05.01 ~ 18.05.31</dd>
										<dd class="recr_list_carrer">
											<span>경력</span>
											<span>신입</span>
											<span class="recr_list_carrer_dday">D-30</span>
										</dd>
									</dl>
									<a href="javascript:void(0)" class="recr_target">지원하기</a>	
								</div>
							</div>
							<div class="recr_list_extratt">
								<span class="recr_list_mtt">Development</span>
							</div>
						</li>
						<li class="swiper-slide three">
							<div class="recr_list_cont">
								<div class="recr_list_thumb"><img src="./img/list_thumb01.png" alt=""></div>
								<div class="recr_list_txt">
									<dl>
										<dt class="recr_list_tt">글로벌 손익 관리<br/>담당자 채용</dt>
										<dd class="recr_list_dday">18.05.01 ~ 18.05.31</dd>
										<dd class="recr_list_carrer">
											<span>경력</span>
											<span>신입</span>
											<span class="recr_list_carrer_dday">D-30</span>
										</dd>
									</dl>
									<a href="javascript:void(0)" class="recr_target">지원하기</a>	
								</div>
							</div>
							<div class="recr_list_extratt">
								<span class="recr_list_mtt">Development</span>
							</div>
						</li>
						<li class="swiper-slide four">
							<div class="recr_list_cont ">
								<div class="recr_list_thumb"><img src="./img/list_thumb01.png" alt=""></div>
								<div class="recr_list_txt">
									<dl>
										<dt class="recr_list_tt">글로벌 손익 관리<br/>담당자 채용</dt>
										<dd class="recr_list_dday">18.05.01 ~ 18.05.31</dd>
										<dd class="recr_list_carrer">
											<span>경력</span>
											<span>신입</span>
											<span class="recr_list_carrer_dday">D-30</span>
										</dd>
									</dl>
									<a href="javascript:void(0)" class="recr_target">지원하기</a>	
								</div>
							</div>
							<div class="recr_list_extratt">
								<span class="recr_list_mtt">Development</span>
							</div>
						</li>
						<li class="swiper-slide five">
							<div class="recr_list_cont">
								<div class="recr_list_thumb"><img src="./img/list_thumb01.png" alt=""></div>
								<div class="recr_list_txt">
									<dl>
										<dt class="recr_list_tt">글로벌 손익 관리<br/>담당자 채용</dt>
										<dd class="recr_list_dday">18.05.01 ~ 18.05.31</dd>
										<dd class="recr_list_carrer">
											<span>경력</span>
											<span>신입</span>
											<span class="recr_list_carrer_dday">D-30</span>
										</dd>
									</dl>
									<a href="javascript:void(0)" class="recr_target">지원하기</a>	
								</div>
							</div>
							<div class="recr_list_extratt">
								<span class="recr_list_mtt">Development</span>
							</div>
						</li>
					</ul>
				</div>
			</div>	
			<div class="waves wave2"></div>
		</div>
		
		<div class="recruitments">
			<div class="recr_hastag">
				<div class="hastag_search">
					<div class="hastag_search_tt">검색할 태그를 선택해주세요.</div>
				</div>
				<div class="hastag_round">
					<ul>
						<li class="round_1 w90 active_1"><span class="round_txt">전문<br/>연구요원</span></li>
						<li class="round_2 w70 active_2"><span class="round_txt">신입</span></li>
						<li class="round_3 w89 "><span class="round_txt">게임개발</span></li>
						<li class="round_4 w90 active_3"><span class="round_txt">Data<br/>Engineering</span></li>
						<li class="round_5 w114 active_1"><span class="round_txt">Systems<br/>Engineer</span></li>
						<li class="round_6 w75 active_4"><span class="round_txt">경력</span></li>
						<li class="round_7 w114 active_5"><span class="round_txt">Mobile<br/>Application</span></li>
						<li class="round_8 w88"><span class="round_txt">게임기획</span></li>
						<li class="round_9 w76 active_6"><span class="round_txt ft11">Art – 3D<br/>Environment<br/>Art</span></li>
						<li class="round_10 w114"><span class="round_txt">인턴</span></li>
						<li class="round_11 w114 active_1"><span class="round_txt">게임개발 PM</span></li>
						<li class="round_12 w113 active_3"><span class="round_txt">Data Analysis<br/>&<br/>Programming</span></li>
						<li class="round_13 w101"><span class="round_txt">게임사업</span></li>
						<li class="round_14 w100"><span class="round_txt">Security<br/>Administration</span></li>
						<li class="round_15 w101 active_2"><span class="round_txt">Web<br/>Application</span></li>
						<li class="round_16 w89"><span class="round_txt">AI Research</span></li>
						<li class="round_17 w113 active_6"><span class="round_txt">HRM</span></li>
					</ul>
				</div>
				<div class="hastag_btn">
					<input type="submit" value="검색">	
				</div>
			</div>
			<div class="recr_list">
				<div class="recr_history">
					<ul>
						<li><a href="javascript:void(0)">HOME</a><span class="recr_arrow">></span></li>
						<li>지원하기</li>
					</ul>
				</div>
				<div class="recer_list_top">
					<div class="recer_search">
						<input type="text" />
						<input type="submit" class="job_search_btn" id="job_search_btns">
					</div>
					<div class="recer_list_tt"><span>지원하기</span><span class="recer_list_stt">즐거움과 열정이 넘치는 당신을 기다립니다.</span></div>
					<div class="recer_list_tab">
						<ul class="recer_depth1">
							<li class="active"><a href="javascript:void(0)">All</a></li>
							<li>
								<a href="javascript:void(0)">Development</a>
								<ul class="recer_depth2">
									<li class="active"><a href="">Development</a></li>
									<li><a href="">Programming</a></li>
									<li><a href="">Game Design</a></li>
									<li><a href="">Art</a></li>
									<li><a href="">Sound</a></li>
									<li><a href="">Directing</a></li>
									<li><a href="">Debelopment Management</a></li>
									<li><a href="">Web Service 기획</a></li>
									<li><a href="">Web Design</a></li>
									<li><a href="">QA</a></li>
									<li><a href="">Experience Design</a></li>
									<li><a href="">AI</a></li>
									<li><a href="">Research</a></li>
								</ul>	
							</li>
							<li><a href="javascript:void(0)">Manager Supporting</a></li>
							<li><a href="javascript:void(0)">Business</a></li>
							<li><a href="javascript:void(0)">Service</a></li>
							<li><a href="javascript:void(0)">System &amp; Information</a></li>
						</ul>	
					</div>
				</div>
				<div class="recer_list_cont">
					<ul class="grid effect-2" id="grid">
						<li>
							<div class="grid_cont">
								<div class="grid_thumb"><a href="javascript:void(0)"><img src="./img/list_thumb.png"></a></div>
								<div class="grid_txt">
									<div class="dday_count"><img src="./img/dday01.png" alt=""></div>
									<div class="kind_job">Development</div>
									<div class="extra_line"></div>
									<div class="job_intro">
										<dl>
											<dt>빅데이터 엔지니어</dt>
											<dd>국내외 게임 데이터의 전사에 제공하기 위한<br/>데이터 수집/가공 플랫폼 개발 및 게임<br/>데이터를 활용한 분석 지표 개발</dd>
										</dl>
									</div>
									<div class="job_day">
										<div class="job_daycount"><span><img src="./img/list_month.png" alt=""></span><span>18.05.01 ~ 18.05.31</span></div>
										<div class="careerandnewcomer">
											<span class="career">경력</span>
											<span class="newcomer">신입</span>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="grid_cont">
								<div class="grid_thumb"><a href="javascript:void(0)"><img src="./img/list_thumb01.png"></a></div>
								<div class="grid_txt">
									<div class="dday_count"><img src="./img/dday01.png" alt=""></div>
									<div class="kind_job">Development</div>
									<div class="extra_line"></div>
									<div class="job_intro">
										<dl>
											<dt>빅데이터 엔지니어</dt>
											<dd>국내외 게임 데이터의 전사에 제공하기 위한<br/>데이터 수집/가공 플랫폼 개발 및 게임<br/>데이터를 활용한 분석 지표 개발</dd>
										</dl>
									</div>
									<div class="job_day">
										<div class="job_daycount"><span><img src="./img/list_month.png" alt=""></span><span>18.05.01 ~ 18.05.31</span></div>
										<div class="joy_dday">D - 30</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="grid_cont">
								<div class="grid_thumb grid_thumb_none"><a href="http://drbl.in/fWMM"><img src="./img/list_thumb.png"></a></div>
								<div class="grid_txt">
									<div class="dday_count"><img src="./img/dday01.png" alt=""></div>
									<div class="kind_job">Development</div>
									<div class="extra_line"></div>
									<div class="job_intro">
										<dl>
											<dt>빅데이터 엔지니어</dt>
											<dd>국내외 게임 데이터의 전사에 제공하기 위한<br/>데이터 수집/가공 플랫폼 개발 및 게임<br/>데이터를 활용한 분석 지표 개발</dd>
										</dl>
									</div>
									<div class="job_day">
										<div class="job_daycount"><span><img src="./img/list_month.png" alt=""></span><span>18.05.01 ~ 18.05.31</span></div>
										<div class="joy_dday">D - 30</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="grid_cont">
								<div class="grid_thumb"><a href="http://drbl.in/fWMM"><img src="./img/list_thumb02.png"></a></div>
								<div class="grid_txt">
									<div class="dday_count"><img src="./img/dday01.png" alt=""></div>
									<div class="kind_job">Development</div>
									<div class="extra_line"></div>
									<div class="job_intro">
										<dl>
											<dt>빅데이터 엔지니어</dt>
											<dd>국내외 게임 데이터의 전사에 제공하기 위한<br/>데이터 수집/가공 플랫폼 개발 및 게임<br/>데이터를 활용한 분석 지표 개발</dd>
										</dl>
									</div>
									<div class="job_day">
										<div class="job_daycount"><span><img src="./img/list_month.png" alt=""></span><span>18.05.01 ~ 18.05.31</span></div>
										<div class="joy_dday">D - 30</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="grid_cont">
								<div class="grid_thumb"><a href="javascript:void(0)"><img src="./img/list_thumb01.png"></a></div>
								<div class="grid_txt">
									<div class="dday_count"><img src="./img/dday01.png" alt=""></div>
									<div class="kind_job">Development</div>
									<div class="extra_line"></div>
									<div class="job_intro">
										<dl>
											<dt>빅데이터 엔지니어</dt>
											<dd>국내외 게임 데이터의 전사에 제공하기 위한<br/>데이터 수집/가공 플랫폼 개발 및 게임<br/>데이터를 활용한 분석 지표 개발</dd>
										</dl>
									</div>
									<div class="job_day">
										<div class="job_daycount"><span><img src="./img/list_month.png" alt=""></span><span>18.05.01 ~ 18.05.31</span></div>
										<div class="joy_dday">D - 30</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="grid_cont">
								<div class="grid_thumb"><a href="http://drbl.in/fWMM"><img src="./img/list_thumb.png"></a></div>
								<div class="grid_txt">
									<div class="dday_count"><img src="./img/dday01.png" alt=""></div>
									<div class="kind_job">Development</div>
									<div class="extra_line"></div>
									<div class="job_intro">
										<dl>
											<dt>빅데이터 엔지니어</dt>
											<dd>국내외 게임 데이터의 전사에 제공하기 위한<br/>데이터 수집/가공 플랫폼 개발 및 게임<br/>데이터를 활용한 분석 지표 개발</dd>
										</dl>
									</div>
									<div class="job_day">
										<div class="job_daycount"><span><img src="./img/list_month.png" alt=""></span><span>18.05.01 ~ 18.05.31</span></div>
										<div class="joy_dday">D - 30</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="grid_cont">
								<div class="grid_thumb"><a href="http://drbl.in/fWMM"><img src="./img/list_thumb02.png"></a></div>
								<div class="grid_txt">
									<div class="dday_count"><img src="./img/dday01.png" alt=""></div>
									<div class="kind_job">Development</div>
									<div class="extra_line"></div>
									<div class="job_intro">
										<dl>
											<dt>빅데이터 엔지니어</dt>
											<dd>국내외 게임 데이터의 전사에 제공하기 위한<br/>데이터 수집/가공 플랫폼 개발 및 게임<br/>데이터를 활용한 분석 지표 개발</dd>
										</dl>
									</div>
									<div class="job_day">
										<div class="job_daycount"><span><img src="./img/list_month.png" alt=""></span><span>18.05.01 ~ 18.05.31</span></div>
										<div class="joy_dday">D - 30</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="grid_cont">
								<div class="grid_thumb"><a href="http://drbl.in/fWMM"><img src="./img/list_thumb.png"></a></div>
								<div class="grid_txt">
									<div class="dday_count"><img src="./img/dday01.png" alt=""></div>
									<div class="kind_job">Development</div>
									<div class="extra_line"></div>
									<div class="job_intro">
										<dl>
											<dt>빅데이터 엔지니어</dt>
											<dd>국내외 게임 데이터의 전사에 제공하기 위한<br/>데이터 수집/가공 플랫폼 개발 및 게임<br/>데이터를 활용한 분석 지표 개발</dd>
										</dl>
									</div>
									<div class="job_day">
										<div class="job_daycount"><span><img src="./img/list_month.png" alt=""></span><span>18.05.01 ~ 18.05.31</span></div>
										<div class="joy_dday">D - 30</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="grid_cont">
								<div class="grid_thumb"><a href="http://drbl.in/fWMM"><img src="./img/list_thumb.png"></a></div>
								<div class="grid_txt">
									<div class="dday_count"><img src="./img/dday01.png" alt=""></div>
									<div class="kind_job">Development</div>
									<div class="extra_line"></div>
									<div class="job_intro">
										<dl>
											<dt>빅데이터 엔지니어</dt>
											<dd>국내외 게임 데이터의 전사에 제공하기 위한<br/>데이터 수집/가공 플랫폼 개발 및 게임<br/>데이터를 활용한 분석 지표 개발</dd>
										</dl>
									</div>
									<div class="job_day">
										<div class="job_daycount"><span><img src="./img/list_month.png" alt=""></span><span>18.05.01 ~ 18.05.31</span></div>
										<div class="joy_dday">D - 30</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="grid_cont">
								<div class="grid_thumb"><a href="http://drbl.in/fWMM"><img src="./img/list_thumb.png"></a></div>
								<div class="grid_txt">
									<div class="dday_count"><img src="./img/dday01.png" alt=""></div>
									<div class="kind_job">Development</div>
									<div class="extra_line"></div>
									<div class="job_intro">
										<dl>
											<dt>빅데이터 엔지니어</dt>
											<dd>국내외 게임 데이터의 전사에 제공하기 위한<br/>데이터 수집/가공 플랫폼 개발 및 게임<br/>데이터를 활용한 분석 지표 개발</dd>
										</dl>
									</div>
									<div class="job_day">
										<div class="job_daycount"><span><img src="./img/list_month.png" alt=""></span><span>18.05.01 ~ 18.05.31</span></div>
										<div class="joy_dday">D - 30</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="grid_cont">
								<div class="grid_thumb"><a href="http://drbl.in/fWMM"><img src="./img/list_thumb01.png"></a></div>
								<div class="grid_txt">
									<div class="dday_count"><img src="./img/dday01.png" alt=""></div>
									<div class="kind_job">Development</div>
									<div class="extra_line"></div>
									<div class="job_intro">
										<dl>
											<dt>빅데이터 엔지니어</dt>
											<dd>국내외 게임 데이터의 전사에 제공하기 위한<br/>데이터 수집/가공 플랫폼 개발 및 게임<br/>데이터를 활용한 분석 지표 개발</dd>
										</dl>
									</div>
									<div class="job_day">
										<div class="job_daycount"><span><img src="./img/list_month.png" alt=""></span><span>18.05.01 ~ 18.05.31</span></div>
										<div class="joy_dday">D - 30</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="grid_cont">
								<div class="grid_thumb grid_thumb_none"><a href="http://drbl.in/fWMM"><img src="./img/list_thumb.png"></a></div>
								<div class="grid_txt">
									<div class="dday_count"><img src="./img/dday01.png" alt=""></div>
									<div class="kind_job">Development</div>
									<div class="extra_line"></div>
									<div class="job_intro">
										<dl>
											<dt>빅데이터 엔지니어</dt>
											<dd>국내외 게임 데이터의 전사에 제공하기 위한<br/>데이터 수집/가공 플랫폼 개발 및 게임<br/>데이터를 활용한 분석 지표 개발</dd>
										</dl>
									</div>
									<div class="job_day">
										<div class="job_daycount"><span><img src="./img/list_month.png" alt=""></span><span>18.05.01 ~ 18.05.31</span></div>
										<div class="joy_dday">D - 30</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="grid_cont">
								<div class="grid_thumb"><a href="http://drbl.in/fWMM"><img src="./img/list_thumb.png"></a></div>
								<div class="grid_txt">
									<div class="dday_count"><img src="./img/dday01.png" alt=""></div>
									<div class="kind_job">Development</div>
									<div class="extra_line"></div>
									<div class="job_intro">
										<dl>
											<dt>빅데이터 엔지니어</dt>
											<dd>국내외 게임 데이터의 전사에 제공하기 위한<br/>데이터 수집/가공 플랫폼 개발 및 게임<br/>데이터를 활용한 분석 지표 개발</dd>
										</dl>
									</div>
									<div class="job_day">
										<div class="job_daycount"><span><img src="./img/list_month.png" alt=""></span><span>18.05.01 ~ 18.05.31</span></div>
										<div class="joy_dday">D - 30</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="grid_cont">
								<div class="grid_thumb"><a href="http://drbl.in/fWMM"><img src="./img/list_thumb01.png"></a></div>
								<div class="grid_txt">
									<div class="dday_count"><img src="./img/dday01.png" alt=""></div>
									<div class="kind_job">Development</div>
									<div class="extra_line"></div>
									<div class="job_intro">
										<dl>
											<dt>빅데이터 엔지니어</dt>
											<dd>국내외 게임 데이터의 전사에 제공하기 위한<br/>데이터 수집/가공 플랫폼 개발 및 게임<br/>데이터를 활용한 분석 지표 개발</dd>
										</dl>
									</div>
									<div class="job_day">
										<div class="job_daycount"><span><img src="./img/list_month.png" alt=""></span><span>18.05.01 ~ 18.05.31</span></div>
										<div class="joy_dday">D - 30</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="grid_cont">
								<div class="grid_thumb grid_thumb_none"><a href="http://drbl.in/fWMM"><img src="./img/list_thumb.png"></a></div>
								<div class="grid_txt">
									<div class="dday_count"><img src="./img/dday01.png" alt=""></div>
									<div class="kind_job">Development</div>
									<div class="extra_line"></div>
									<div class="job_intro">
										<dl>
											<dt>빅데이터 엔지니어</dt>
											<dd>국내외 게임 데이터의 전사에 제공하기 위한<br/>데이터 수집/가공 플랫폼 개발 및 게임<br/>데이터를 활용한 분석 지표 개발</dd>
										</dl>
									</div>
									<div class="job_day">
										<div class="job_daycount"><span><img src="./img/list_month.png" alt=""></span><span>18.05.01 ~ 18.05.31</span></div>
										<div class="joy_dday">D - 30</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
				
				<div id="apply_wrap">
					<div class="cmn_input_wrap etc_application">
						<fieldset>
							<div class="etc_application_desc">
								<div class="join_input_wrap tabNo1 cateNo1">
									<div class="etc_figure_area on">
										<div class="etc_figure_box">
											<figure class="user_figure">
												<img src="./img/no_image.png" alt="입사지원 이미지">
												<figcaption class="indent">입사지원 이미지</figcaption>
											</figure>
											<p class="figure_info_txt" style="text-align: center;">최근 6개월 이내 촬영한
												<br>본인 사진을 등록해 주세요.
												<br>※ 파일 크기 : 1MB 이내</p>
											<div class="etc_file_box">
												<div class="btns_etc_file btn_hover">
													<label for="btnFigureFile" class="indent">첨부파일 버튼</label>
													<button type="button" class="btn_file">사진 등록</button>
													<input type="file" name="btnFigureFile" id="btnFigureFile" accept="image/gif, image/jpeg, image/png"
														class="tp_file" title="첨부파일 버튼">
													<input type="hidden" name="PIC_FILE_GROUP_CODE" id="PIC_FILE_GROUP_CODE" value=""> </div>
											</div>
										</div>
										<dl class="cmn_input_box etc_join_box first_join_box">
											<dt>
												<span>*</span>지원부문1</dt>
											<dd>
												<div class="join_info_box">
													<div class="etc_select_box">
														<label for="HOPE_SEC1" style="color: rgb(0, 0, 0); font-weight: 700;">선택하세요.</label>
														<select id="HOPE_SEC1" title="입사지원 지원부문1 선택" name="HOPE_SEC1">
															<option value="">선택하세요.</option>
															<option value="40">R&amp;D</option>
														</select>
													</div>
												</div>
											</dd>
										</dl>
										<dl class="etc_join_box">
											<dt>
												<span>*</span>지원분야1</dt>
											<dd>
												<div class="join_info_box">
													<div class="etc_select_box">
														<label for="HOPE_FLD1">선택하세요.</label>
														<select id="HOPE_FLD1" title="입사지원 지원분야1 선택" name="HOPE_FLD1">
															<option value="">선택하세요.</option>
														</select>
													</div>
												</div>
											</dd>
										</dl>
										<dl class="cmn_input_box etc_join_box">
											<dt>
												<span>*</span>근무지1</dt>
											<dd>
												<div class="join_info_box">
													<div class="etc_select_box">
														<label for="HOPE_LOC1">선택하세요.</label>
														<select id="HOPE_LOC1" title="입사지원 근무지1 선택" name="HOPE_LOC1">
															<option value="">선택하세요.</option>
														</select>
													</div>
												</div>
											</dd>
										</dl>
									</div>
									<dl class="cmn_input_box etc_join_box user_name_box">
										<dt>
											<span>*</span>성명</dt>
										<dd>
											<p class="user_name">김다미</p>
										</dd>
									</dl>
									<dl class="cmn_input_box etc_join_box cmn_bdb tab1NameArea">
										<dt>
											<span>*</span>영문성명</dt>
										<dd class="w50 pr_none">
											<div class="etc_input_box w135">
												<label for="ENG_FAMILY_NM" class="indent">Hong</label>
												<input type="text" name="ENG_FAMILY_NM" id="ENG_FAMILY_NM" class="tp_txt" title="영문 성 입력" placeholder="Hong"> </div>
											<div class="etc_input_box w135 ml10">
												<label for="ENG_NM" class="indent">Gil-dong</label>
												<input type="text" name="ENG_NM" id="ENG_NM" class="tp_txt" title="영문 이름 입력" placeholder="Gil-dong"> </div>
										</dd>
									</dl>
									<dl class="cmn_input_box etc_join_box">
										<dt>
											<span>*</span>지원경로</dt>
										<dd>
											<div class="join_info_box">
												<div class="etc_select_box">
													<label for="APPLY_PATH" style="color: rgb(0, 0, 0); font-weight: 700;">선택하세요.</label>
													<select id="APPLY_PATH" title="지원경로 선택" name="APPLY_PATH" data-code_gb="0114"
														data-first_opt="선택하세요.">
														<option value="">선택하세요.</option>
														<option value="1">채용홈페이지</option>
														<option value="2">링크드인</option>
														<option value="3">취업포탈</option>
														<option value="4">관련협회/카페</option>
														<option value="5">지인추천</option>
														<option value="99">기타-상세내용입력</option>
													</select>
												</div>
												<div class="etc_input_box w440 ml10">
													<label for="APPLY_PATH_ETC_NM" style="display: none;">지원경로 입력</label>
													<input type="hidden" name="APPLY_PATH_ETC_NM" id="APPLY_PATH_ETC_NM" class="tp_txt"
														title="지원 경로 입력" maxlength="60"> </div>
											</div>
										</dd>
									</dl>
									<dl class="cmn_input_box etc_join_box">
										<dt>
											<span>*</span>국적1</dt>
										<dd>
											<div class="join_info_box">
												<div class="etc_select_box">
													<label for="NATION_CD1" style="color: rgb(0, 0, 0); font-weight: 700;">선택하세요.</label>
													<select id="NATION_CD1" title="국적1 선택" name="NATION_CD1" data-code_gb="0003"
														data-first_opt="선택하세요.">
														<option value="">선택하세요.</option>
														<option value="KR">대한민국</option>
														<option value="GH">가나</option>
														<option value="GA">가봉</option>
														<option value="GY">가이아나</option>
														<option value="GM">감비아</option>
														<option value="GT">과테말라</option>
														<option value="GD">그레나다</option>
														<option value="GR">그리스</option>
														<option value="GN">기니</option>
														<option value="GW">기니비사우</option>
														<option value="NA">나미비아</option>
														<option value="NR">나우루</option>
														<option value="NG">나이지리아</option>
														<option value="SR">남수단</option>
														<option value="Z6">남아프리카 공화국</option>
														<option value="NL">네덜란드</option>
														<option value="NP">네팔</option>
														<option value="NO">노르웨이</option>
														<option value="NZ">뉴질랜드</option>
														<option value="NE">니제르</option>
														<option value="NI">니카라과</option>
														<option value="DK">덴마크</option>
														<option value="DM">도미니카</option>
														<option value="DO">도미니카 공화국</option>
														<option value="DE">독일</option>
														<option value="TL">동티모르</option>
														<option value="LA">라오스</option>
														<option value="LR">라이베리아</option>
														<option value="LV">라트비아</option>
														<option value="RU">러시아</option>
														<option value="LB">레바논</option>
														<option value="LS">레소토</option>
														<option value="RO">루마니아</option>
														<option value="LU">룩셈부르크</option>
														<option value="RW">르완다</option>
														<option value="LY">리비아</option>
														<option value="LT">리투아니아</option>
														<option value="LI">리히텐슈타인</option>
														<option value="MG">마다가스카르</option>
														<option value="MH">마셜 제도</option>
														<option value="MK">마케도니아 공화국</option>
														<option value="MW">말라위</option>
														<option value="MY">말레이시아</option>
														<option value="ML">말리</option>
														<option value="MX">멕시코</option>
														<option value="MC">모나코</option>
														<option value="MA">모로코</option>
														<option value="MU">모리셔스</option>
														<option value="Z7">모리타니</option>
														<option value="MZ">모잠비크</option>
														<option value="Z8">몬테네그로</option>
														<option value="MD">몰도바</option>
														<option value="MV">몰디브</option>
														<option value="MT">몰타</option>
														<option value="MN">몽골</option>
														<option value="US">미국</option>
														<option value="MM">미얀마</option>
														<option value="FM">미크로네시아 연방</option>
														<option value="VU">바누아투</option>
														<option value="BH">바레인</option>
														<option value="BB">바베이도스</option>
														<option value="BS">바하마</option>
														<option value="BD">방글라데시</option>
														<option value="BJ">베냉</option>
														<option value="VE">베네수엘라</option>
														<option value="VN">베트남</option>
														<option value="BE">벨기에</option>
														<option value="Z9">벨라루스</option>
														<option value="BZ">벨리즈</option>
														<option value="Z10">보스니아 헤르체고비나</option>
														<option value="BW">보츠와나</option>
														<option value="BO">볼리비아</option>
														<option value="BI">부룬디</option>
														<option value="BF">부르키나파소</option>
														<option value="BT">부탄</option>
														<option value="KP">북한</option>
														<option value="BG">불가리아</option>
														<option value="BR">브라질</option>
														<option value="BN">브루나이</option>
														<option value="WS">사모아</option>
														<option value="SA">사우디아라비아</option>
														<option value="SM">산마리노</option>
														<option value="ST">상투메 프린시페</option>
														<option value="SN">세네갈</option>
														<option value="Z11">세르비아</option>
														<option value="SC">세이셸</option>
														<option value="LC">세인트 루시아</option>
														<option value="VC">세인트 빈센트 그레나딘</option>
														<option value="Z12">세인트 키츠 네비스</option>
														<option value="SO">소말리아</option>
														<option value="SB">솔로몬 제도</option>
														<option value="SD">수단</option>
														<option value="LK">스리랑카</option>
														<option value="SZ">스와질란드</option>
														<option value="SE">스웨덴</option>
														<option value="CH">스위스</option>
														<option value="ES">스페인</option>
														<option value="SK">슬로바키아</option>
														<option value="SI">슬로베니아</option>
														<option value="SY">시리아</option>
														<option value="SL">시에라리온</option>
														<option value="SG">싱가포르</option>
														<option value="AE">아랍에미리트</option>
														<option value="AM">아르메니아</option>
														<option value="AR">아르헨티나</option>
														<option value="IS">아이슬란드</option>
														<option value="HT">아이티</option>
														<option value="IE">아일랜드</option>
														<option value="AZ">아제르바이잔</option>
														<option value="AF">아프가니스탄</option>
														<option value="AD">안도라</option>
														<option value="DZ">알제리</option>
														<option value="AO">앙골라</option>
														<option value="AG">앤티가 바부다</option>
														<option value="ER">에리트레아</option>
														<option value="EE">에스토니아</option>
														<option value="EC">에콰도르</option>
														<option value="ET">에티오피아</option>
														<option value="SV">엘살바도르</option>
														<option value="GB">영국</option>
														<option value="YE">예멘</option>
														<option value="OM">오만</option>
														<option value="AU">오스트레일리아</option>
														<option value="AT">오스트리아</option>
														<option value="HN">온두라스</option>
														<option value="JO">요르단</option>
														<option value="UG">우간다</option>
														<option value="Z13">우루과이</option>
														<option value="UZ">우즈베키스탄</option>
														<option value="UA">우크라이나</option>
														<option value="IQ">이라크</option>
														<option value="IR">이란</option>
														<option value="IL">이스라엘</option>
														<option value="EG">이집트</option>
														<option value="IT">이탈리아</option>
														<option value="IN">인도</option>
														<option value="ID">인도네시아</option>
														<option value="JP">일본</option>
														<option value="JM">자메이카</option>
														<option value="ZM">잠비아</option>
														<option value="GQ">적도 기니</option>
														<option value="CN">중국</option>
														<option value="Z14">중앙아프리카 공화국</option>
														<option value="TW">중화민국(대만)</option>
														<option value="Z16">중화민국(타이완)</option>
														<option value="DJ">지부티</option>
														<option value="ZW">짐바브웨</option>
														<option value="TD">차드</option>
														<option value="CZ">체코</option>
														<option value="CL">칠레</option>
														<option value="CM">카메룬</option>
														<option value="CV">카보베르데</option>
														<option value="KZ">카자흐스탄</option>
														<option value="QA">카타르</option>
														<option value="KH">캄보디아</option>
														<option value="CA">캐나다</option>
														<option value="KE">케냐</option>
														<option value="CR">코스타리카</option>
														<option value="CI">코트디부아르</option>
														<option value="CO">콜롬비아</option>
														<option value="CG">콩고공화국</option>
														<option value="CD">콩고민주공화국</option>
														<option value="CU">쿠바</option>
														<option value="KW">쿠웨이트</option>
														<option value="HR">크로아티아</option>
														<option value="KG">키르기스스탄</option>
														<option value="KI">키리바시</option>
														<option value="CY">키프로스</option>
														<option value="TJ">타지키스탄</option>
														<option value="TZ">탄자니아</option>
														<option value="TH">태국</option>
														<option value="TR">터키</option>
														<option value="TG">토고</option>
														<option value="TM">투르크메니스탄</option>
														<option value="TV">투발루</option>
														<option value="TN">튀니지</option>
														<option value="Z15">트리니다드 토바고</option>
														<option value="PA">파나마</option>
														<option value="PY">파라과이</option>
														<option value="PK">파키스탄</option>
														<option value="PG">파푸아뉴기니</option>
														<option value="PW">팔라우</option>
														<option value="PE">페루</option>
														<option value="PT">포르투갈</option>
														<option value="PL">폴란드</option>
														<option value="FR">프랑스</option>
														<option value="FJ">피지</option>
														<option value="FI">핀란드</option>
														<option value="PH">필리핀</option>
														<option value="HU">헝가리</option>
														<option value="zz">수리남공화국</option>
													</select>
												</div>
											</div>
										</dd>
									</dl>
									<dl class="cmn_input_box etc_join_box">
										<dt class="line_h125">
											<span>*</span>본인주소
											<br>(거주지)</dt>
										<dd>
											<div class="user_add_line">
												<div class="user_add_inquiry">
													<div class="etc_input_box">
														<label for="POST_CD" class="indent">우편번호를 검색하세요.</label>
														<input type="text" name="POST_CD" id="POST_CD" readonly="readOnly"
															class="tp_txt" title="본인 주소 입력" disabled="" placeholder="우편번호를 검색하세요."></div>
													<button type="button" class="btn_add_inquiry btn_hover tab1Addr">검색</button>
													<input type="hidden" name="NAT_CD" id="NAT_CD"> </div>
												<button type="button" class="btn_hover btn_init remove_addr">X</button>
												<div class="etc_radio_wrap">
													<div class="etc_radio_box on">
														<input id="IN_EX_GB1" type="radio" name="IN_EX_GB" value="0" class="tp_radio" title="국내"
															checked="">
														<label for="IN_EX_GB1">국내</label>
													</div>
													<div class="etc_radio_box">
														<input id="IN_EX_GB2" type="radio" name="IN_EX_GB" value="1" class="tp_radio" title="해외">
														<label for="IN_EX_GB2">해외</label>
													</div>
												</div>
											</div>
											<div class="user_add_line ">
												<div class="etc_input_box w100">
													<label for="ADDR"></label>
													<input type="text" name="ADDR" id="ADDR" disabled="" class="tp_txt" title="본인 주소 입력"
														maxlength="300"> </div>
											</div>
											<div class="user_add_line">
												<div class="etc_input_box w100">
													<label for="ADDR_DTL">상세 주소를 입력하세요.</label>
													<input type="text" name="ADDR_DTL" id="ADDR_DTL" class="tp_txt" title="본인 주소 입력"
														maxlength="300" placeholder="상세 주소를 입력하세요."> </div>
											</div>
										</dd>
									</dl>
									<dl class="etc_join_box tab1PhoneArea">
										<dt>
											<span>*</span>휴대전화</dt>
										<dd class="phone_num_box w50 pr_none">
											<div class="etc_input_box w80">
												<label for="TEL1" class="indent">010</label>
												<input type="text" name="TEL1" id="TEL1" maxlength="3" class="tp_txt onlyNumber"
													title="휴대전화 입력" placeholder="010"> </div>
											<div class="etc_input_box w80">
												<label for="TEL2" class="indent">1234</label>
												<input type="text" name="TEL2" id="TEL2" maxlength="4" class="tp_txt onlyNumber"
													title="휴대전화 입력" placeholder="1234"> </div>
											<div class="etc_input_box w80">
												<label for="TEL3" class="indent">1234</label>
												<input type="text" name="TEL3" id="TEL3" maxlength="4" class="tp_txt onlyNumber"
													title="휴대전화 입력" placeholder="1234"> </div>
										</dd>
										<dt class="ml50">
											<span>*</span>비상 연락처</dt>
										<dd class="phone_num_box w50 pr_none">
											<div class="etc_input_box w80">
												<label for="EME_TEL1" class="indent">010</label>
												<input type="text" name="EME_TEL1" id="EME_TEL1" maxlength="3" class="tp_txt onlyNumber"
													title="연락처 입력" placeholder="010"> </div>
											<div class="etc_input_box w80">
												<label for="EME_TEL2" class="indent">1234</label>
												<input type="text" name="EME_TEL2" id="EME_TEL2" maxlength="4" class="tp_txt onlyNumber"
													title="연락처 입력" placeholder="1234"> </div>
											<div class="etc_input_box w80">
												<label for="EME_TEL3" class="indent">1234</label>
												<input type="text" name="EME_TEL3" id="EME_TEL3" maxlength="4" class="tp_txt onlyNumber"
													title="연락처 입력" placeholder="1234"> </div>
										</dd>
									</dl>
									<dl class="etc_join_box tab1DesablityArea">
										<dt>
											<span>*</span>장애내용</dt>
										<dd>
											<dl class="user_name_line">
												<dt class="user_name_dt">
													<span>*</span>장애여부</dt>
												<dd class="user_name_dd w50">
													<div class="etc_select_box">
														<label for="INJURY_YN" style="color: rgb(0, 0, 0); font-weight: 700;">선택하세요.</label>
														<select id="INJURY_YN" title="장애여부 선택" name="INJURY_YN" data-code_gb="0129"
															data-first_opt="선택하세요.">
															<option value="">선택하세요.</option>
															<option value="Y">예</option>
															<option value="N">아니오</option>
														</select>
													</div>
												</dd>
												<dt class="user_name_dt ml20">
													<span>*</span>등급</dt>
												<dd class="user_name_dd w50">
													<div class="etc_select_box">
														<label for="INJURY_GRADE" style="color: rgb(0, 0, 0); font-weight: 700;">선택하세요.</label>
														<select id="INJURY_GRADE" title="등급 선택" name="INJURY_GRADE" data-code_gb="0164"
															data-first_opt="선택하세요.">
															<option value="">선택하세요.</option>
															<option value="01">1급</option>
															<option value="02">2급</option>
															<option value="03">3급</option>
															<option value="04">4급</option>
															<option value="05">5급</option>
															<option value="06">6급</option>
														</select>
													</div>
												</dd>
											</dl>
											<dl class="user_name_line">
												<dt class="user_name_dt">
													<span>*</span>장애내용</dt>
												<dd class="user_name_dd">
													<div class="etc_input_box w100">
														<label for="INJURY_CONT"></label>
														<input type="text" name="INJURY_CONT" id="INJURY_CONT" class="tp_txt mic_chk" title="장애내용 입력">
													</div>
												</dd>
											</dl>
										</dd>
									</dl>
								</div>
								<div class="join_ttl_area pb_none">
									<strong class="join_ttl">병역 및 보훈정보</strong>
								</div>
								<div class="join_input_wrap tabNo1 cateNo2">
									<dl class="etc_join_box tab1MillArea">
										<dt>
											<span>*</span>군필여부</dt>
										<dd class="w50 pr_none">
											<div class="etc_select_box">
												<label for="MIL_CD" style="color: rgb(0, 0, 0); font-weight: 700;">선택하세요.</label>
												<select id="MIL_CD" title="군필여부 선택" name="" data-code_gb="0004" data-first_opt="선택하세요.">
													<option value="">선택하세요.</option>
													<option value="1">필</option>
													<option value="2">미필</option>
													<option value="3">특례중</option>
													<option value="4">특례필</option>
													<option value="8">의가사제대</option>
													<option value="10">의병제대</option>
													<option value="5">면제</option>
													<option value="7">비대상</option>
													<option value="11">전역예정</option>
												</select>
											</div>
										</dd>
										<dt class="ml50">
											<span>*</span>군면제사유</dt>
										<dd class="w50">
											<div class="etc_select_box">
												<label for="MIL_EXCPT_CD" style="color: rgb(0, 0, 0); font-weight: 700;">선택하세요.</label>
												<select id="MIL_EXCPT_CD" title="군면제사유 선택" disabled="disabled" name="MIL_EXCPT_CD"
													data-code_gb="0094" data-first_opt="선택하세요.">
													<option value="">선택하세요.</option>
													<option value="01">신체문제</option>
													<option value="02">생계곤란</option>
													<option value="03">기타사유</option>
												</select>
											</div>
										</dd>
									</dl>
									<dl class="cmn_input_box etc_join_box">
										<dt>
											<span>*</span>복무기간</dt>
										<dd class="army_date_box">
											<div class="etc_input_box w113">
												<label for="MIL_START_DT1" class="indent">YYYY</label>
												<input type="text" name="MIL_START_DT1" id="MIL_START_DT1" maxlength="4" class="tp_txt onlyNumber"
													title="복무기간 입력" placeholder="YYYY"> </div>
											<div class="etc_input_box w113">
												<label for="MIL_START_DT2" class="indent">MM</label>
												<input type="text" name="MIL_START_DT2" id="MIL_START_DT2" maxlength="2" class="tp_txt onlyNumber"
													title="복무기간 입력" placeholder="MM"> </div>
											<div class="etc_input_box w113">
												<label for="MIL_START_DT3" class="indent">DD</label>
												<input type="text" name="MIL_START_DT3" id="MIL_START_DT3" maxlength="2" class="tp_txt onlyNumber"
													title="복무기간 입력" placeholder="DD"> </div>
											<div class="etc_input_box w113 ml52">
												<label for="MIL_END_DT1" class="indent">YYYY</label>
												<input type="text" name="MIL_END_DT1" id="MIL_END_DT1" maxlength="4" class="tp_txt onlyNumber"
													title="복무기간 입력" placeholder="YYYY"> </div>
											<div class="etc_input_box w113">
												<label for="MIL_END_DT2" class="indent">MM</label>
												<input type="text" name="MIL_END_DT2" id="MIL_END_DT2" maxlength="2" class="tp_txt onlyNumber"
													title="복무기간 입력" placeholder="MM"> </div>
											<div class="etc_input_box w113">
												<label for="MIL_END_DT3" class="indent">DD</label>
												<input type="text" name="MIL_END_DT3" id="MIL_END_DT3" maxlength="2" class="tp_txt onlyNumber"
													title="복무기간 입력" placeholder="DD"> </div>
										</dd>
									</dl>
									<dl class="etc_join_box tab1Mill2Area">
										<dt>
											<span>*</span>계급</dt>
										<dd class="w50">
											<div class="etc_select_box">
												<label for="MIL_RANK" style="color: rgb(0, 0, 0); font-weight: 700;">선택하세요.</label>
												<select id="MIL_RANK" title="계급 선택" name="" data-code_gb="0006" data-first_opt="선택하세요.">
													<option value="">선택하세요.</option>
													<option value="01">대장</option>
													<option value="02">중장</option>
													<option value="03">소장</option>
													<option value="04">준장</option>
													<option value="11">대령</option>
													<option value="12">중령</option>
													<option value="13">소령</option>
													<option value="21">대위</option>
													<option value="22">중위</option>
													<option value="23">소위</option>
													<option value="24">준위</option>
													<option value="30">원사</option>
													<option value="31">상사</option>
													<option value="32">중사</option>
													<option value="33">하사</option>
													<option value="34">장기하사</option>
													<option value="35">단기하사</option>
													<option value="36">일반하사</option>
													<option value="41">병장</option>
													<option value="42">상병</option>
													<option value="43">일병</option>
													<option value="44">이병</option>
													<option value="45">기타</option>
												</select>
											</div>
										</dd>
										<dt class="ml20">
											<span>*</span>군별</dt>
										<dd class="w50">
											<div class="etc_select_box">
												<label for="MIL_DITINC" style="color: rgb(0, 0, 0); font-weight: 700;">선택하세요.</label>
												<select id="MIL_DITINC" title="군별 선택" name="" data-code_gb="0005" data-first_opt="선택하세요.">
													<option value="">선택하세요.</option>
													<option value="1">육군</option>
													<option value="2">해군</option>
													<option value="3">공군</option>
													<option value="4">해병대</option>
													<option value="5">전투경찰</option>
													<option value="6">해양경찰</option>
													<option value="7">의무경찰</option>
													<option value="8">의무소방</option>
													<option value="9">특례</option>
													<option value="10">공익근무요원</option>
													<option value="11">전문연구요원</option>
													<option value="12">산업기능요원</option>
													<option value="13">병역특례(복무중-이직가능)</option>
												</select>
											</div>
										</dd>
									</dl>
									<dl class="cmn_input_box etc_join_box">
										<dt>
											<span>*</span>주특기</dt>
										<dd class="w50">
											<div class="etc_select_box">
												<label for="MIL_SPE" style="color: rgb(0, 0, 0); font-weight: 700;">선택하세요.</label>
												<select id="MIL_SPE" title="주특기 선택" name="MIL_SPE" data-code_gb="0214" data-first_opt="선택하세요.">
													<option value="">선택하세요.</option>
													<option value="106">통신병</option>
													<option value="100">보병</option>
												</select>
												<input type="hidden" name="MIL_SPE_NM" id="MIL_SPE_NM"> </div>
										</dd>
									</dl>
									<dl class="etc_join_box tab1Mill3Area">
										<dt>
											<span>*</span>보훈대상여부</dt>
										<dd class="w50">
											<div class="etc_select_box">
												<label for="BRANCH_YN" style="color: rgb(0, 0, 0); font-weight: 700;">선택하세요.</label>
												<select id="BRANCH_YN" title="보훈대상여부 선택" name="" data-code_gb="0129" data-first_opt="선택하세요.">
													<option value="">선택하세요.</option>
													<option value="Y">예</option>
													<option value="N">아니오</option>
												</select>
											</div>
										</dd>
										<dt class="ml20">
											<span>*</span>보훈관계</dt>
										<dd class="w50">
											<div class="etc_select_box">
												<label for="BRANCH_REL" style="color: rgb(0, 0, 0); font-weight: 700;">선택하세요.</label>
												<select id="BRANCH_REL" title="보훈관계 선택" name="" data-code_gb="0007" data-first_opt="선택하세요.">
													<option value="">선택하세요.</option>
													<option value="1">대상(본인)</option>
													<option value="2">대상(가족)</option>
													<option value="3">대상(유족)</option>
												</select>
											</div>
										</dd>
									</dl>
									<dl class="etc_join_box tab1Mill4Area">
										<dt class="line_h125 pt_none">
											<span>*</span>보훈취업지원
											<br>대상여부</dt>
										<dd class="w50">
											<div class="etc_select_box">
												<label for="BRANCH_SUPPLY_YN" style="color: rgb(0, 0, 0); font-weight: 700;">선택하세요.</label>
												<select id="BRANCH_SUPPLY_YN" title="보훈취업지원 대상여부 선택" name="" data-code_gb="0129"
													data-first_opt="선택하세요.">
													<option value="">선택하세요.</option>
													<option value="Y">예</option>
													<option value="N">아니오</option>
												</select>
											</div>
										</dd>
										<dt class="ml20">
											<span>*</span>가점비율</dt>
										<dd class="w50">
											<div class="etc_select_box">
												<label for="BRANCH_ADD_POINT" style="color: rgb(0, 0, 0); font-weight: 700;">선택하세요.</label>
												<select id="BRANCH_ADD_POINT" title="가점비율 선택" name="" data-code_gb="0136" data-first_opt="선택하세요."
													data-ex_col="attr1">
													<option value="">선택하세요.</option>
													<option value="5" data-attr1="null">5%</option>
													<option value="10" data-attr1="null">10%</option>
												</select>
											</div>
										</dd>
									</dl>
									<dl class="cmn_input_box etc_join_box">
										<dt>
											<span>*</span>보훈번호</dt>
										<dd class="phone_num_box">
											<div class="etc_input_box w100">
												<label for="BRANCH_NO" class="indent">보훈번호를 숫자 8자리 또는 10자리로 입력하세요.</label>
												<input type="text" name="BRANCH_NO" id="BRANCH_NO" class="tp_txt onlyNumber"
													maxlength="10" title="보훈번호 입력" placeholder="보훈번호를 숫자 8자리 또는 10자리로 입력하세요."> </div>
										</dd>
									</dl>
								</div>
								<div class="application_info_txt_area" style="display:none">
									<p style="line-height: 1.2; font-family: HyundaiSansTextKRMedium; font-size: 12pt; margin-top: 0px; margin-bottom: 0px;">&nbsp;</p>
								</div>
								<div class="btns_application mt40">
									<div class="btns_left">
										<div class="btn_save">
											<button type="button" class="btn_next btn_hover temp_save">임시저장</button>
										</div>
									</div>
									<div class="btns_right">
										<div class="btn_next">
											<button type="button" class="btn_next btn_hover next_save">다음단계</button>
										</div>
									</div>
								</div>
							</div> <!-- //etc_application_desc -->
						</fieldset>
					</div> <!-- //cmn_input_wrap -->
				</div> <!-- //apply_wrap -->
			</div>
		</div>


		<footer class="footer">
			<div class="sns">
				<ul>
					<li class="f_facebook"><a href=""><i class="flaticon-twitter-black-shape"></i></a></li>
					<li class="f_twitter"><a href=""><i class="flaticon-facebook-logo"></i></a></li>
					<li class="f_youtube"><a href=""><i class="flaticon-play"></i></a></li>
				</ul>
			</div>
			<div class="copy">
				<div class="familysite">FAMILY SITE <i class="flaticon-arrow"></i></div>
				<p>Copyright ⓒ<span>NCSOFT</span> All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<script src="./js/masonry.pkgd.min.js"></script>
	
</body>
</html>