<div class="bg" style="display:none"></div>
<div class="loginbox">
	<a href="#" class="x"><img src="images/login_x.jpg" alt=""></a>
	<p class="poplogo"><img src="images/login_t.jpg" alt="우동카"></p>
    <div class="popinput">
		<p class="tt loginMsgBox"></p>
    	<p><label for="id"><input type="text"		id="login_id" name="login_id" placeholder="아이디"></label></p>
        <p><label for="pw"><input type="password"	id="login_pw" name="login_pw" placeholder="비밀번호" id="pw"></label></p>
        <p class="logbot"><a href="javascript:void(0)" class="wc_login">로그인</a></p>
        <a href="./member.php" class="popmem">회원가입</a><span class="bar pad">|</span><a href="./find_person.php" class="popmem">아이디</a><span class="bar">/</span><a href="./find_person.php" class="popmem">비밀번호찾기</a>
    </div>
</div>

<div class="rescomtxt popStoreBox" style="display:none">
	<a href="#" class="resx"><img src="images/login_x.jpg" alt="" class="popStoreClose"></a>
    <div class="rescomtx_se_1">
        <p class="comtitle">
            <span class="com_l pop_store_name">씽씽 렌터카</span>
            <span class="com_r pop_store_tel">02-511-4810</span>
        </p>
    </div>
    <div class="rescomtx_se_2">
        <p class="comtitle">
            <span class="com_l pop_store_addr">서울시 강남구 역삼동 322-559</span>
            <span class="com_r pop_store_distance">2.5Km</span>
        </p>
    </div>
    <div class="rescomtx_se_3">
        <table summary="업체 정보">
            <colgorup>
                <col class="rescomtx_t1">
                <col class="rescomtx_t2">                            
            </colgorup>
            <tbody>
                <tr>
                    <th>영업시간</th>
                    <td class="pop_time">09:00~18:00</td>
                </tr>
                <tr>
                    <th>홈페이지</th>
                    <td class="pop_homepage"><a href="http://naver.com">http://naver.com</a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="rescomokokdiv">
     <a href="javascript:void(0)" class="rescomokok popStoreClose">닫기</a>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(window).on("load", function(){



			$("#login_pw").unbind("keydown").keydown(function (e) {
				if (e.keyCode == 13) 
				{

					e.preventDefault();
					if(pattern_check_ui("#login_id" ,			"아이디를 입력하세요."			, "우동카의 아이디는 이메일 형식으로 입력하셔야 합니다."	, getPattern('EMAIL') , $(".loginMsgBox"))==false){return;}
					if(pattern_check_ui("#login_pw" ,			"비밀번호를 입력하세요."		, "허용되지 않는 문자열 입니다."	, getPattern('PASSWORD'), $(".loginMsgBox") )==false){return;}


					var param = {
						"use_id"				: $("#login_id").val()		,
						"use_pwd"				: $("#login_pw").val()		
					};

					__ajaxCall("/@interface/meet_user_login.php", param, true, "text", "post",
							function (_response) 
							{

								var arr = _response.split("|");
								$token = null;

								if (arr[0] != "0")
								{
									$(".loginMsgBox").html(arr[1] );
									return;
								}
								else
								{
									alert( arr[1] );
									location.reload();
								}

							
							}
							, 
							function(_error)
							{
								alert("시스템 오류로 인해 정보등록이 실패 하였습니다.");
								return;
							}
					); 
				}
			});



			$(".wc_login").on("click", function(){
				if(pattern_check_ui("#login_id" ,			"아이디를 입력하세요."			, "우동카의 아이디는 이메일 형식으로 입력하셔야 합니다."	, getPattern('EMAIL') , $(".loginMsgBox"))==false){return;}
				if(pattern_check_ui("#login_pw" ,			"비밀번호를 입력하세요."		, "허용되지 않는 문자열 입니다."	, getPattern('PASSWORD'), $(".loginMsgBox") )==false){return;}


				var param = {
					"use_id"				: $("#login_id").val()		,
					"use_pwd"				: $("#login_pw").val()		
				};

				__ajaxCall("/@interface/meet_user_login.php", param, true, "text", "post",
						function (_response) 
						{

							var arr = _response.split("|");
							$token = null;

							if (arr[0] != "0")
							{
								$(".loginMsgBox").html(arr[1] );
								return;
							}
							else
							{
								alert( arr[1] );
								location.reload();
							}

						
						}
						, 
						function(_error)
						{
							alert("시스템 오류로 인해 정보등록이 실패 하였습니다.");
							return;
						}
				); 
			});

			$(".centerPopCall").on("click" , function(){
				var store = $(this).attr("data-store");
				var param = {"INS_LAT" : $geo.latitude , "INS_LONG" : $geo.longitude, "key" : store };
				__ajaxCall("/@interface/getStoreView.php", param , true, "json", "post",
					function (_response) 
					{
						if (_response.info.length > 0 )
						{
							var data = _response.info[0];

							$(".pop_store_name").html(data.tsi_store_name);
							$(".pop_store_tel").html(data.tsi_contact_no);

							$(".pop_store_distance").html(data.distance + "km");
							$(".pop_store_addr").html(data.tsi_map_addr);


							$(".pop_homepage").html('<a href="'+data.tsi_homepage+'" target="_blank">'+data.tsi_homepage+'</a>');

							var timeStr = data.tsi_open_time + "~" + data.tsi_close_time;
							$(".pop_time").html(timeStr);
							$(".bg").show();
							$(".popStoreBox").fadeIn("fast");

							$(".popStoreClose").on("click", function(){
								$(".bg").hide();
								$(".popStoreBox").hide();
							});


						}
						else
						{
							alert("업체정보가 존재하지 않습니다.");
							return;
						}
					}
					, 
					function(_error)
					{

						return;
					}
				);
			});

			//console.log( get_version_of_IE() );

			var ie_ver = get_version_of_IE();

			if ( ie_ver != "N/A")
			{
				ie_ver = parseInt(ie_ver);
				if ( ie_ver <= 9)
				{
					var rtnUrl = "./new_browser.php";
					winPopUPCenter(rtnUrl, "new_browser_pop", 540, 550, "no", "no");
				}
			}

			


		});
	});


	function get_version_of_IE () { 

		 var word; 
		 var version = "N/A"; 

		 var agent = navigator.userAgent.toLowerCase(); 
		 var name = navigator.appName; 

		 // IE old version ( IE 10 or Lower ) 
		 if ( name == "Microsoft Internet Explorer" ) word = "msie "; 

		 else { 
			 // IE 11 
			 if ( agent.search("trident") > -1 ) word = "trident/.*rv:"; 

			 // IE 12  ( Microsoft Edge ) 
			 else if ( agent.search("edge/") > -1 ) word = "edge/"; 
		 } 

		 var reg = new RegExp( word + "([0-9]{1,})(\\.{0,}[0-9]{0,1})" ); 

		 if (  reg.exec( agent ) != null  ) version = RegExp.$1 + RegExp.$2; 

		 return version; 
	} 
</script>