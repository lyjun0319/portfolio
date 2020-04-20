<!---해더 부분--->
<? if ( $inSessionID == "" ) { ?>
	<div class="head_w">
		<div class="head">
			<a href="/index.php" class="logo" title="우동카"><img src="images/logo.jpg" alt="우동카" /></a>
			<div class="navi">	
				<a href="./member.php" class="member toptxt" title="회원가입">회원가입</a>
				<span class="hip">|</span>
				<a href="" class="login toptxt wc_login_pop" title="로그인">로그인</a>                    
			</div>
			<ul class="gnb">
				<li><a href="./center.php">전체 렌터카 검색</a></li>
				<li><a href="./information.php">우동카 소개</a></li>
				<li><a href="./info_txt.php">고객지원</a></li>
				<li><a href="./customer.php">문의하기</a></li>
			</ul>
			<!--모바일 네비게이션 시작-->
			<div class="mo_snavi">    
				<a href="" id="slidx_button" class="mfn fbt"><img src="images/mo_navi.jpg" alt="네비게이션"></a>                
				<div id="slidx_menu">            	
				<a href="" onClick="return false;" id="slidx_button" class="mfn xx"><img src="images/mo_x.png" alt=""></a>    
					<ul>
						<li><a href="./center.php">전체 렌터카 검색</a></li>
						<li><a href="./information.php">우동카 소개</a></li>
						<li><a href="./info_txt.php">고객지원</a></li>
						<li><a href="./customer.php">문의하기</a></li>
					</ul>
					<p><a href="" class="m_login wc_login_pop">로그인</a></p>
					<p><a href="./member.php" class="m_mem">회원가입</a></p>                
				</div>
			</div>
			<!--모바일 네비게이션 끝-->
		</div>
	</div>
	<!---해더 부분 끝---> 
<? } else { ?>
	<div class="head_w">
		<div class="head">
			<a href="/index.php" class="logo" title="우동카"><img src="images/logo.jpg" alt="우동카" /></a>
			<div class="navi" style="width:270px">	


				<a href="./mypage.php" class="member toptxt" title="마이페이지"><?=$inSessionNM?>님 안녕하세요.</a>
				<span class="hip">|</span>
				<a href="./mypage.php" class="member toptxt" title="마이페이지">마이페이지</a>
				<span class="hip">|</span>
				<a href="javascript:void(0);" class="login toptxt user_logout" title="로그아웃">로그아웃</a>     

                 
			</div>
			<ul class="gnb">
				<li><a href="./center.php">전체 렌터카 검색</a></li>
				<li><a href="./information.php">우동카 소개</a></li>
				<li><a href="./info_txt.php">고객지원</a></li>
				<li><a href="./customer.php">문의하기</a></li>
			</ul>
			<!--모바일 네비게이션 시작-->
			<div class="mo_snavi">    
				<a href="" id="slidx_button" class="mfn fbt"><img src="images/mo_navi.jpg" alt="네비게이션"></a>                
				<div id="slidx_menu">            	
				<a href="" onClick="return false;" id="slidx_button" class="mfn xx"><img src="images/mo_x.png" alt=""></a>    
					<ul>
						<li><a href="./center.php">전체 렌터카 검색</a></li>
						<li><a href="./information.php">우동카 소개</a></li>
						<li><a href="./info_txt.php">고객지원</a></li>
						<li><a href="./customer.php">문의하기</a></li>
					</ul>

					

					<p><a href="mypage.php" class="m_login">마이페이지</a></p>
					<p><a href="javascript:void(0);" class="m_mem user_logout">로그아웃</a></p>
            
				</div>
			</div>
			<!--모바일 네비게이션 끝-->
		</div>
	</div>
	<!---해더 부분 끝---> 
<? } ?>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<div class="mo_now"><img src="images/mo_now.jpg" alt="">&nbsp;<span class="gps_address">GPS 수신중입니다.</span></div>
<script type="text/javascript">
	var $geo		= {};
	var $geo_backup = {};
	var $geocoder   = null;
	console.log("AAAAAA");
	console.log(google);
	$(document).ready(function(){

		$(window).on("load", function(){
        		if (navigator.geolocation) 
        		{
        			$geo.watchid = navigator.geolocation.getCurrentPosition(
        						  function(position){
      								$geo.latitude = position.coords.latitude;
    								$geo.longitude = position.coords.longitude;
    								$geo_backup.latitude = position.coords.latitude;
    								$geo_backup.longitude = position.coords.longitude;



									getGeoAddress();
        						  }
        						, 
								function()
        						{
									getIpGeo();
        						}
        						,  
								{
								  enableHighAccuracy: true, 
								  maximumAge        : 60000, 
								  timeout           : 5000    		
								}
        			);
        		}
        		else
        		{
					getIpGeo();
        		} 


		});

		function getIpGeo()
		{
			$.ajax({
				url : "//freegeoip.net/json/",
				dataType : "jsonp",
				jsonp : "callback",
				success : function(d){
					if ( (parseFloat(d.latitude) > 0) && (parseFloat(d.longitude) > 0)  )
					{
						$geo.latitude = d.latitude;
						$geo.longitude = d.longitude;
						$geo_backup.latitude = d.latitude;
						$geo_backup.longitude = d.longitude;
						getGeoAddress();
					}
					else
					{
						$geo.latitude  = 37.56682;
						$geo.longitude = 126.97865;
						$geo_backup.latitude =  37.56682;
						$geo_backup.longitude = 126.97865;
						getGeoAddress();								

					}
				}
				, 
				error : function(request,status,error)
				{
					$geo.latitude  = 37.56682;
					$geo.longitude = 126.97865;
					$geo_backup.latitude =  37.56682;
					$geo_backup.longitude = 126.97865; 
					getGeoAddress();
				}
			});
		}

		function getGeoAddress()
		{
			setTimeout(function(){
				$geocoder  = new google.maps.Geocoder();
				var latlng = new google.maps.LatLng($geo.latitude,$geo.longitude);





				$geocoder.geocode({'latLng': latlng }, function(results, status){
					var addrObject = "";
					try {

						console.log( results );
						addrObject = results[0].address_components;

						var addrSido   = addrObject[2].short_name;
						var addrDong   = addrObject[1].short_name;
						var addrString = addrSido + " " + addrDong;
						$(".gps_address").html(addrString);
					}
					catch(err) {
						$(".gps_address").html("");
					}	
				});
			},500);
		}

		$(".user_logout").on("click", function(){
			__ajaxCall("/@interface/user_logout.php", {}, true, "text", "post",
					function (_response) 
					{
						location.href="/index.php";
			        }
					, 
					function(_error)
					{
						alert("시스템 오류로 인해 정보등록이 실패 하였습니다.");
						return;
					}
	    	); 
		});
	});
</script>