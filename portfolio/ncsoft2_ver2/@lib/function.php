<?
//----------------------------------------------------------------------------------------
// Advice - html형식 변환
//----------------------------------------------------------------------------------------
function CheckWord($CheckValue) {
	if($CheckValue == null or $CheckValue == "") {
		return "";
	} else {
		$CheckValue = str_replace($CheckValue, "<", "&lt;");
		$CheckValue = str_replace($CheckValue, ">", "&gt;");
		$CheckValue = str_replace($CheckValue, "'", "&#39;");
		$CheckValue = str_replace($CheckValue, chr(13), "<br>");
		return $CheckValue;
	}
}

//----------------------------------------------------------------------------------------
// Advice - html태그 사용
//----------------------------------------------------------------------------------------
function CharWord($CheckValue) {
	if($CheckValue == null or $CheckValue == "") {
		return "";
	} else {
		$CheckValue = str_replace("\r\n", "<br>", $CheckValue);
		return $CheckValue;
	}
}

//----------------------------------------------------------------------------------------
// Advice - 문자 길이 컷트 후 .. 효과
// Parmeter Advice - str : 문자, num : 길이
//----------------------------------------------------------------------------------------
function GetCutSubject($str, $num) {
	if ($num >= mb_strlen($str)) return $str;
	/*
	상황에 따라 맞는걸 사용한다.
	return mb_strimwidth($str, '0', $num, '...', 'utf-8');	한글 : 3바이트
	return iconv_substr($str, 0, $num, "UTF-8")."...";		한글자당 1바이트
	*/
	return mb_strimwidth($str, '0', $num, '...', 'utf-8');
}

function GetCutSubject2($str,$num ){
	return iconv_substr($str, 0, $num, "UTF-8")."...";

}

//----------------------------------------------------------------------------------------
// Advice - 배열값에 대한 특정값 유무 체크
// Parmeter Advice - strSplit : 전체 배열변수 (,로 구분) strFind : 찾을 값
//----------------------------------------------------------------------------------------
function GetSplitFindWord($strSplit, $strFind) {
	if($strSplit != "" and $strSplit != null and $strFind != "" and $strFind != null) {
		$strSplit = explode(",", $strSplit);
		$chk = false;
		for($i=0; $i<count($strSplit); $i++) {
			if(strstr($strSplit[$i], $strFind)) {
				echo strstr($strSplit[$i], $strFind);
				$chk = true;
			}
		}
		return $chk;
	} else {
		return false;
	}
}

//----------------------------------------------------------------------------------------
// Advice - method Get 형식으로 파라미터 생성
//----------------------------------------------------------------------------------------
function GetStr($str,$strName,$strValue) {

	if($str == "" or is_null($str)) {
		$str = "";
	} else {
		$str = $str."&";
	}
	return $str.$strName."=".$strValue;
}

//----------------------------------------------------------------------------------------
// Advice - 값 체크후 값이 없으면 전 페이지 이동 및 페이지 처리 종료
// Parmeter Advice - ProcType:처리 타입 형태 설정 ex) 01:alert창 및 전페이지 이동
//							02:XML형식 메시지 출력 그 외 response.end 처리
//----------------------------------------------------------------------------------------

function getParameterCheck($Param, $ProcType) {
	switch($ProcType) {
		case "01" :
			if($Param == "" or $Param == null) {
				JsAlertBack("정보가 정상적으로 전달되지 않았습니다.");
				exit;
			} else {
				return $Param;
			}
			break;
		case "02" :
			if($Param == "" or $Param == null) {
				echo "<resultmsg><![CDATA[정보가 정상적으로 전달되지 않았습니다.]]></resultmsg>";
				exit;
			} else {
				return $Param;
			}
			break;
		default :
			if($Param == "" or $Param == null) {
				exit;
			} else {
				return $Param;
			}
	}
}

//----------------------------------------------------------------------------------------
// Advice - 문자열을 날자 타입으로 변경
// Parmeter Advice - strdate:날자 타입으로 변경할 문자
// Parmeter Advice - ViewType:날자 타입 형태 설정 ex) 1 => 20110511 => 2011.05.11
//----------------------------------------------------------------------------------------
function GetDateType($strdate, $ViewType = 1) {
	if( $ViewType==1 ) {
		$year	=	substr($strdate,0,4);
		$mon	=	substr($strdate,5,2);
		$day	=	substr($strdate,8,2);
		$strdate	=	$year." .".$mon." .".$day;
	} else if( $ViewType==2 ) {
		$mon	=	substr($strdate,5,2);
		$day	=	substr($strdate,8,2);
		$strdate	=	$mon.".".$day;
	} else if( $ViewType==3 ) {
		$year	=	substr($strdate,0,4);
		$mon	=	substr($strdate,5,2);
		$day	=	substr($strdate,8,2);
		$time	=	substr($strdate,11,2);
		$minu	=	substr($strdate,14,2);
		$strdate	=	$year.".".$mon.".".$day." ".$time.":".$minu;
	} else if( $ViewType==4 ) {
		$year	=	substr($strdate,0,4);
		$mon	=	substr($strdate,5,2);
		$day	=	substr($strdate,8,2);
		$strdate	=	$year."년 ".$mon."월 ".$day."일";
	} else if( $ViewType==5 ) {
		$mon	=	substr($strdate,5,2);
		$day	=	substr($strdate,8,2);
		$strdate	=	$mon."월 ".$day."일";
	} else if( $ViewType==6) {
		$year	=	substr($strdate,0,4);
		$mon	=	substr($strdate,5,2);
		$day	=	substr($strdate,8,2);
		$strdate	=	$year.$mon.$day;
	} else if( $ViewType==7 ) {
		$year	=	substr($strdate,0,4);
		$mon	=	substr($strdate,5,2);
		$day	=	substr($strdate,8,2);
		$strdate	=	$year.". ".$mon.". ".$day;
	} else if( $ViewType==8 ) {
		$year	=	substr($strdate,2,2);
		$mon	=	substr($strdate,5,2);
		$day	=	substr($strdate,8,2);
		$strdate = $year.".".$mon.".".$day;
	}
	return $strdate;
}

//----------------------------------------------------------------------------------------
// Advice - 자바스크립트 Alert 창
//----------------------------------------------------------------------------------------
function bootAlert($Msg) {
	echo "<script type='text/javascript'> bootAlert('$Msg'); return; </script>";
}
function bootAlertGo($strMsg, $strUrl) {
	echo "<script type='text/javascript'> bootAlert('$strMsg'); location.replace('$strUrl'); </script>";
}
function bootAlertPa($Msg) {
	echo "<script type='text/javascript'> parent.bootAlert('$Msg');</script>";
}
function bootAlertPaGo($strMsg, $strUrl) {
	echo "<script type='text/javascript'> parent.bootAlert('$strMsg'); parent.location.replace('$strUrl'); </script>";
}
function bootAlertPreload($strMsg) {
	echo "<script type='text/javascript'> alert('$strMsg'); parent.location.reload(); </script>";
}
function bootAlertPaScript($Msg, $Script) {
	echo "<script type='text/javascript'> parent.bootAlert('$Msg');$Script</script>";
}

//----------------------------------------------------------------------------------------
// Advice - 자바스크립트 Alert 창
//----------------------------------------------------------------------------------------
function JsAlert($Msg) {
	echo "<script> alert('$Msg');  </script>";
}
function JsParentMember($code, $Msg) {
	echo "<script type='text/javascript'> parent.isResult('$code','$Msg'); </script>";
}
function JsLocation($src) {
	echo "<script type='text/javascript'> location.href='$src';  </script>";
	exit;
}




function JsAlertReload($Msg) {
	echo "<script type='text/javascript'> alert('$Msg'); parent.location.reload(); </script>";
}


//----------------------------------------------------------------------------------------
// Advice - 자바스크립트 Alert 창 및History.Back
//----------------------------------------------------------------------------------------
function JsAlertBack($Msg) {
	echo "<script type='text/javascript'> alert('$Msg'); history.back(); </script>";
}

//----------------------------------------------------------------------------------------
// Advice - 자바스크립트 메세지창 출력후 이동
// Parmeter Advice - (str:메세지명, strUrl:이동할주소)
//----------------------------------------------------------------------------------------
function JsAlertGo($strMsg, $strUrl) {
	echo "<script type='text/javascript'> alert('$strMsg'); 
			location.href ='$strUrl'; </script>";
}

//----------------------------------------------------------------------------------------
// Advice - 자바스크립트 메세지창 출력후 이동
// Parmeter Advice - (str:메세지명, strUrl:이동할주소)
//----------------------------------------------------------------------------------------
function JsAlertPaGo($strMsg, $strUrl) {
	echo "<script type='text/javascript'> alert('$strMsg'); parent.location.replace('$strUrl'); </script>";
}

//----------------------------------------------------------------------------------------
// Advice - 자바스크립트 창닫기
//----------------------------------------------------------------------------------------
function JsSelfClose($Msg = "") {
	if($Msg == "") {
		echo "<script type='text/javascript'> self.close(); </script>";
	} else {
		echo "<script type='text/javascript'> alert('$Msg'); self.close(); </script>";
	}
}

function JsSelfCloseApp($Msg = "") {
	if($Msg == "") {
		echo "<script type='text/javascript'> self.close(); </script>";
	} else {
		echo "<script type='text/javascript'> alert('$Msg'); window.fitpl.setBack(); </script>";
	}
}

//----------------------------------------------------------------------------------------
// Advice - 주민번호로 나이확인
//----------------------------------------------------------------------------------------
function JAgeCount($Jumin) {
	if(substr($Jumin,0,2) > date("y")) {
		$JuminCount = "19".substr($Jumin,0,2);
	} else {
		$JuminCount = "20".substr($Jumin,0,2);
	}
	$JAgeCount = (date("Y") - $JuminCount) -1;

	if(date("m")*30 + date("d") >= substr($Jumin,2,2)*30 + substr($Jumin,4,2)) {
		$JAgeCount = $JAgeCount + 1;
	}

	return $JAgeCount;
}

//----------------------------------------------------------------------------------------
// Advice - 생년월일로 나이확인
//----------------------------------------------------------------------------------------
function YAgeCount($bdate) {
	$YAgeCount = (date("Y") - substr($bdate,0,4)) + 1;
	return $YAgeCount;
}

//----------------------------------------------------------------------------------------
// Advice - 암호화
//----------------------------------------------------------------------------------------
function GetBase64Encode($data) {
	$data = trim($data);

	if($data == "") {
		$return_data = "";
	} else {
		$return_data = base64_encode($data);
	}
	return $return_data;
}

//----------------------------------------------------------------------------------------
// Advice - 복호화
//----------------------------------------------------------------------------------------
function GetBase64Decode($data) {
	$data = trim($data);

	if($data == "") {
		$return_data = "";
	} else {
		$return_data = base64_decode($data);
	}
	return $return_data;
}


/*******************************************************************************************************
'----------------------------------------------------------------------------------------
' Advice - node 의 하위 자식노등중 nodeName 의 값을 반환한다.
'----------------------------------------------------------------------------------------
FUNCTION getNodeText(node, ByVal nodeName)

	If NOT node IS Nothing And NOT node.selectSingleNode(nodeName) IS Nothing then ' 오류 발생시 처리
		getNodeText = node.selectSingleNode(nodeName).text
	Else
		getNodeText = ""
	End if

END Function

Function getXMLCount(XML , CheckValue)

	dim XmlDoc,root,Maplist
	Set XmlDoc = Server.CreateObject("Microsoft.xmlDom")
	XmlDoc.loadXML XML

	Set root = XmlDoc.documentElement
	Set Maplist = root.selectSingleNode("//" & CheckValue)

	IF Typename(Maplist ) <> "Nothing" then
		getXMLCount = Maplist.childNodes.length
	else
		getXMLCount = 0
	end if
	Set root = nothing
	Set Maplist = nothing
	Set XmlDoc = nothing
End Function
*******************************************************************************************************/


//==================
//== 콤마 함수
//==================
function getComma($inputName) {
	if($inputName != "" and $inputName != null) {
		$comma = number_format($inputName);
		/*
		밑의 경우는 소수점 3째 자리에서 반올림하여 2째 자리까지 표현
		$comma = number_format($inputName,2);
		*/
	} else {
		$comma = $inputName;
	}
	return $comma;
}

//========================
//==원 표시
//========================
function getWon($inputName) {
	if($inputName != "" and $inputName != null) {
		$won = "￦".number_format($inputName);
	} else {
		$won = $inputName;
	}
	return $won;
}


//=========================================
//==날짜/주/월 더한 날 구하기
//=========================================
/*
asp 특화
Function TransAddDay(sdate, is_day)
	If isnull(is_day) or Not isnumeric(is_day) or len(is_day) < 1 Then
		is_day = 0
	End if

	TransEndDate = DATEADD("d",is_day, sdate)
End Function

Function TransAddWeek(sdate, is_day)
	If isnull(is_day) or Not isnumeric(is_day) or len(is_day) < 1 Then
		is_day = 0
	End if

	TransEndDate = DATEADD("w",is_day, sdate)
End Function


Function TransAddMonth(sdate, is_day)
	If isnull(is_day) or Not isnumeric(is_day) or len(is_day) < 1 Then
		is_day = 0
	End if

	TransEndDate = DATEADD("m",is_day, sdate)
End Function
*/
/*
기준일 2011-09-06
DateAdd(2)."<br>";  // 2 days after 2011-09-08
DateAdd(-6,0,"Y-m-d")."<br>";  // 2 days before with gigen format 2011-08-31
DateAdd(3,"01/01/2000");  // 3 days after given date  2000-01-04
*/
function DateAdd($v,$d=null , $f="Y-m-d"){
  $d=($d?$d:date("Y-m-d"));
  return date($f,strtotime($v." days",strtotime($d)));
}

//========================================
//= 문자열 함수
//========================================

function getTransWord($inputName) {

	$inputName = trim($inputName);
	$inputName = str_replace("%20", "", $inputName);
	$inputName = str_replace("--", "", $inputName);
	$inputName = str_replace("'", "", $inputName);
	$inputName = str_replace("script", "scripty", $inputName);
	//$inputName = str_replace("=", "", $inputName);
	//$inputName = str_replace(chr(13).chr(10),"<br>", $inputName);
	$inputName = str_replace(Chr(39),"''", $inputName);

	return $inputName;
}


//=============================================================================================
// trim and request
//=============================================================================================

function Srequest($inDataStr) {
	$Srequest = trim(removeXSS(sqlFilter($inDataStr)));
	return $Srequest;
}


function sqlFilter($search) {

	//필수 필터링 문자 리스트
	$strSearch[0] = "'";
	$strSearch[1] = "";
	$strSearch[2] = "%22";
	$strSearch[3] = "%";
	$strSearch[4] = "--";

	//변환될 필터 문자
	$strReplace[0] = "";
	$strReplace[1] = chr(13);
	$strReplace[2] = " ";
	$strReplace[3] = "";
	$strReplace[4] = "";

	$data = $search;
	for($cnt=0; $cnt < count($strSearch); $cnt++) {	//필터링 인덱스를 배열 크기와 맞춰준다.
		$data = str_replace(strtolower($strSearch[$cnt]), $strReplace[$cnt], $data);
	}
	return $data;
}

function removeXSS($get_String) {
	//get_String = Replace(get_String, "&", "&amp;")
	//$get_String = Replace(get_String, "<", "&lt;")
	//$get_String = Replace(get_String, ">", "&gt;")
	$get_String = str_replace("<xmp", "<x-xmo", $get_String);
	$get_String = str_replace("javascript", "<x-javascript", $get_String);
	$get_String = str_replace("script", "<x-script", $get_String);
	$get_String = str_replace("iframe", "<x-iframe", $get_String);
	$get_String = str_replace("document", "<x-document", $get_String);
	$get_String = str_replace("vbscript", "<x-vbscript", $get_String);
	$get_String = str_replace("applet", "<x-applet", $get_String);
	$get_String = str_replace("embed", "<x-embed", $get_String);
	$get_String = str_replace("object", "<x-object", $get_String);
	$get_String = str_replace("frame", "<x-frame", $get_String);
	$get_String = str_replace("grameset", "<x-grameset", $get_String);
	$get_String = str_replace("layer", "<x-layer", $get_String);
	$get_String = str_replace("bgsound", "<x-bgsound", $get_String);
	$get_String = str_replace("alert", "<x-alert", $get_String);
	$get_String = str_replace("onblur", "<x-onblur", $get_String);
	$get_String = str_replace("onchange", "<x-onchange", $get_String);
	$get_String = str_replace("onclick", "<x-onclick", $get_String);
	$get_String = str_replace("ondblclick","<x-ondblclick",  $get_String);
	$get_String = str_replace("enerror", "<x-enerror", $get_String);
	$get_String = str_replace("onfocus", "<x-onfocus", $get_String);
	$get_String = str_replace("onload", "<x-onload", $get_String);
	$get_String = str_replace("onmouse", "<x-onmouse", $get_String);
	$get_String = str_replace("onscroll", "<x-onscroll", $get_String);
	$get_String = str_replace("onsubmit", "<x-onsubmit", $get_String);
	$get_String = str_replace("onunload", "<x-onunload", $get_String);
	return $get_String;
}

function SetPageLIstCount( $TotalPage, $ListCount, $GetMsg, $SetColor, $SetCount ) {
	flush();
	ob_start();

	$PosPage = $_REQUEST['PosPage']; // 페이지 10단위
	$CurPage = $_REQUEST['CurPage'];	//페이지 1 ~10 사이

	//사용이미지
	$SetImagesE = "<img src=\"/@master/_images/PageImg/next.gif\"  >";
	$SetImagesS = "<img src=\"/@master/_images/PageImg/prev.gif\"   style=\"margin-right:3px;\">";
	$SetImagesEW = "<img src=\"/@master/_images/PageImg/next_w.gif\"  style=\"margin-right:3px;\">";
	$SetImagesSW = "<img src=\"/@master/_images/PageImg/prev_w.gif\"  >";

	//초기화
	if( $PosPage == "" || $CurPage  == 0 ) $CurPage = 1;
	if( $PosPage == "" ) $PosPage = 0;
	$i = 1;

	//초기화 2
	$lastPosPage = floor(( $TotalPage / $ListCount) / $SetCount );
	if( ( $TotalPage % $ListCount ) == 0  || $TotalPage <= $ListCount ) {
		$lastCurPage = ( floor( $TotalPage / $ListCount) % $SetCount );
		$TotalPage = ( floor( $TotalPage / $ListCount ) );
	} else {
		$lastCurPage = ( floor( $TotalPage / $ListCount) % $SetCount ) + 1;
		$TotalPage = (floor( $TotalPage / $ListCount ) ) + 1;
	}

	//초기화 3
	$GoUrl = $_SERVER['PHP_SELF']. '?';

	if( $GetMsg != "" ) {
		$GetMsg = "&" . $GetMsg;
	}

	//==========================================출력 color=======================================================
	$Scolor =  "<font color=\"". $SetColor ."\">";
	echo "<div id=\"PageDiv\" style=\"width:450px; margin:0 auto;\">";
	//==========================================출력1=======================================================
	echo "<a href=" . $GoUrl . "CurPage=1&PosPage=0". $GetMsg." onfocus=\"this.blur();\">".$SetImagesSW."</a>";
	if( $PosPage > 0 ) {
		echo "<a href=" . $GoUrl . "CurPage=1&PosPage=" . ( $PosPage-1 ). $GetMsg . " onfocus=\"this.blur();\">".  $Scolor.$SetImagesS."</a>&nbsp;</font> ";
	} else {
		echo $Scolor . $SetImagesS . "&nbsp;</font> ";
	}

	//==========================================출력2 반복=======================================================
	do {
		if( $i < $SetCount ) {
			$GUstr = "|";
		} else {
			$GUstr = "";
		}

		if( $TotalPage >= ( $i + ( $PosPage * $SetCount ) )  ) {
			if( $i == $CurPage ) {
				echo " <a href=" . $GoUrl . "CurPage=" . $i . "&PosPage=" . $PosPage . $GetMsg .  " onfocus=this.blur();>" .  $Scolor . "<b>" .  (($PosPage * $SetCount) + $i) ."</b></font></a>&nbsp;<font color=#dddddd>".$GUstr."</font> ";
			} else {
				echo " <a href=" . $GoUrl . "CurPage=" . $i . "&PosPage=" . $PosPage . $GetMsg .   " onfocus=\"this.blur();\">" . $Scolor . " " .( ( $PosPage * $SetCount ) + $i )."</font></a>&nbsp;<font color=\"#dddddd\">".$GUstr."</font> ";
			}
		} else {
			echo "<font color=\"#DDDDDD\">".( ( $PosPage * 10 ) + $i ). "</font> <font color=\"#dddddd\">". $GUstr . "</font>&nbsp;";
		}

		$i++;
		//echo $i;
		$k++;
		if( $k > 100 ) break;
	} while( $i<$SetCount + 1 );

	//==========================================출력3=======================================================
	if ( $TotalPage >  ( $PosPage * $SetCount ) + $SetCount ) {
		echo "<a href=" . $GoUrl . "CurPage=1&PosPage=" . ($PosPage + 1) . $GetMsg . " onfocus=\"this.blur();\">" . $Scolor . $SetImagesE."</font></a>";
	} else {
		echo $Scolor  . $SetImagesE ."</font>";
	}

	echo "<a href=" . $GoUrl . "CurPage=".$lastCurPage."&PosPage=". $lastPosPage . $GetMsg ." onfocus=\"this.blur();\">". $SetImagesEW ."</a>";
	//==========================================출력 color end =======================================================
	echo "</div>";
	if( $TotalPage < 2 ) {
		ob_end_clean();//만약 페이지가 하나일때 출력안함
	} else {
		ob_flush();
	}
}

function SetPageLIst( $TotalPage, $ListCount, $GetMsg, $SetCount ) {
	flush();
	ob_start();

	$PosPage = $_REQUEST['PosPage']; // 페이지 10단위
	$CurPage = $_REQUEST['CurPage'];	//페이지 1 ~10 사이

	//사용이미지
	$SetImagesE = '<img src="/@resources/images/common/btn_list_next_move.gif" alt="다음" />';
	$SetImagesS = '<img src="/@resources/images/common/btn_list_prev_move.gif" alt="이전" />';
	$SetImagesEW = '<img src="/@resources/images/common/btn_list_last_move.gif" alt="마지막으로" />';
	$SetImagesSW = '<img src="/@resources/images/common/btn_list_first_move.gif" alt="처음으로" />';


	$dis_SetImagesS = '<img src="/@resources/images/common/btn_list_prev_move.gif" alt="이전 페이지가 없습니다." />';
	$dis_SetImagesE = '<img src="/@resources/images/common/btn_list_next_move.gif" alt="다음 페이지가 없습니다." />';

	//초기화
	if( $PosPage == "" || $CurPage  == 0 ) $CurPage = 1;
	if( $PosPage == "" ) $PosPage = 0;
	$i = 1;

	//초기화 2
	$lastPosPage = floor(( $TotalPage / $ListCount) / $SetCount );
	if( ( $TotalPage % $ListCount ) == 0  || $TotalPage <= $ListCount ) {
		$lastCurPage = ( floor( $TotalPage / $ListCount) % $SetCount );
		$TotalPage = ( floor( $TotalPage / $ListCount ) );
	} else {
		$lastCurPage = ( floor( $TotalPage / $ListCount) % $SetCount ) + 1;
		$TotalPage = (floor( $TotalPage / $ListCount ) ) + 1;
	}

	//초기화 3
	$GoUrl = $_SERVER['PHP_SELF']. '?';

	if( $GetMsg != "" ) {
		$GetMsg = "&" . $GetMsg;
	}

	//==========================================출력1=======================================================
	echo "<a href=" . $GoUrl . "CurPage=1&PosPage=0". $GetMsg." class='btn_first' >".$SetImagesSW."</a>";
	if( $PosPage > 0 ) {
		echo "<a href=" . $GoUrl . "CurPage=1&PosPage=" . ( $PosPage-1 ). $GetMsg . " class='btn_prev' >".$SetImagesS."</a>";
	} else {
		echo "<span class='btn_prev'>".$dis_SetImagesS."</span>";
	}

	//==========================================출력2 반복=======================================================
	do {

		if( $TotalPage >= ( $i + ( $PosPage * $SetCount ) )  ) {
			if( $i == $CurPage ) {
				echo "<strong>".(($PosPage * $SetCount) + $i)."</strong>";
			} else {
				echo " <a href=" . $GoUrl . "CurPage=" . $i . "&PosPage=" . $PosPage . $GetMsg . " >".( ( $PosPage * $SetCount ) + $i )."</a>";
			}
		}

		$i++;
		$k++;
		if( $k > 100 ) break;
	} while( $i<$SetCount + 1 );

	//==========================================출력3=======================================================
	if ( $TotalPage >  ( $PosPage * $SetCount ) + $SetCount ) {
		echo "<a href=" . $GoUrl . "CurPage=1&PosPage=" . ($PosPage + 1) . $GetMsg . " class='btn_next' >". $SetImagesE."</a>";
	} else {
		echo "<span class='btn_next'>".$dis_SetImagesE ."</span>";
	}

	echo "<a href=" . $GoUrl . "CurPage=".$lastCurPage."&PosPage=". $lastPosPage . $GetMsg ." class='btn_last' >". $SetImagesEW ."</a>";
	//==========================================출력 color end =======================================================

	if( $TotalPage < 2 ) {
		ob_end_clean();//만약 페이지가 하나일때 출력안함
	} else {
		ob_flush();
	}
}

function BootSetPaging( $TotalPage, $ListCount, $GetParam, $SetColor, $SetCount ) {
	flush();
	ob_start();

	$PosPage = $_REQUEST['PosPage'];
	$CurPage = $_REQUEST['CurPage'];

	//초기화
	if( $PosPage == "" || $CurPage  == 0 ) $CurPage = 1;
	if( $PosPage == "" ) $PosPage = 0;
	$i = 1;

	//초기화 2
	if( ( $TotalPage % $ListCount ) == 0  || $TotalPage <= $ListCount ) {
		$TotalPage = ( floor( $TotalPage / $ListCount ) );
	} else {
		$TotalPage = (floor( $TotalPage / $ListCount ) ) + 1;
	}

	//초기화 3
	$GoUrl = $_SERVER['PHP_SELF']. '?';

	if( $GetParam != "" ) {
		$GetParam = "&" . $GetParam;
	}

	if( $PosPage > 0 ) {
		echo "<li><a href=\"javascript:goPage('1','".( $PosPage-1 ).$GetParam."')\" onfocus=\"this.blur();\">Prev</a></li>".chr(10);
	} else {
		echo "<li><a href=\"javascript:void(0);\">Prev</a></li>".chr(10);
	}
	do {
		if($TotalPage >= ($i+($PosPage*$SetCount))){
			$active = ($i == $CurPage ? "class=\"active\"" : "");
			echo "<li ".$active."><a href=\"javascript:goPage('".$i."', '".$PosPage.$GetParam."')\" onfocus=\"this.blur();\">".(($PosPage*$SetCount)+$i)."</a></li>".chr(10);
		}
		$i++;
	} while( $i<$SetCount + 1 );
	if ( $TotalPage >  ( $PosPage * $SetCount ) + $SetCount ) {
		echo "<li><a href=\"javascript:goPage('1', '".($PosPage + 1).$GetParam."')\" onfocus=\"this.blur();\">Next</a></li>".chr(10);
	} else {
		echo "<li><a href=\"javascript:void(0);\">Next</a></li>".chr(10);
	}
	if( $TotalPage < 2 ) {
		ob_end_clean();//만약 페이지가 하나일때 출력안함
	} else {
		ob_flush();
	}
}

function GetStrFromReqValHid( $str ) {
	$ParseString = explode( "&", $str );
	$htmstr = "";

	foreach( $ParseString as $key=>$val ) {
		$tempArray = explode( "=", $val );
		$htmstr .= "<input type='hidden' name ='" .$tempArray[0]."' value='".$tempArray[1]."' />".chr(13).chr(10);
	}
	return $htmstr;
}

function GetNewImg($date, $newImg) {

	eregi("(.+)-(.+)-(.+) (.+):(.+):(.+)",$date,$temp);
	// $temp=preg_split("/[-,:, ]/", $date);  // 이게 더 보기 좋음
	$getTime = mktime($temp[4],$temp[5],$temp[6],$temp[2],$temp[3],$temp[1]);

	$nowTime = mktime();
	$returnStr = "";

	if(($nowTime - $getTime) < 86400) {
		$returnStr = $newImg;
	}
	return $returnStr;
}

// 문자열 HTML BR 형태 출력
function strHtmlBr($str) {
	$str = trim($str);
	$str = stripslashes($str);
	$str = str_replace("\n","<br>", $str);
	return $str;
}

// 문자열 BR HTML 형태 출력
function strBrHtml($str) {
	$str = trim($str);
	$str = stripslashes($str);
	$str = str_replace("<br>","\n", $str);
	return $str;
}

// 메일 발송
function mailto($MAIL_FROM_NAME,$MAIL_FROM,$MAIL_TO,$MAIL_SUBJ,$body) {
    $mailheaders = "Return-Path: <$MAIL_FROM> \r\n";
    $mailheaders .= "From: =?utf-8?B?".base64_encode($MAIL_FROM_NAME)."?=  <{$MAIL_FROM}>\r\n";
    $mailheaders .= "X-Mailer: JOYNET Interface\r\n";

    $boundary = "--------" . uniqid("part");

    $mailheaders .= "MIME-Version: 1.0\r\n";
    $mailheaders .= "Content-Type: multipart/alternative; boundary=\"=_NextPart_$boundary\"";

    $bodytext  = "This is a multi-part message in MIME format.\r\n\r\n";
    $bodytext .= "--=_NextPart_$boundary\r\n";
    $bodytext .= "Content-Type: text/plain; charset=utf-8\r\n";
    $bodytext .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $bodytext .= ereg_replace("(.{80})","\\1\r\n",base64_encode(strip_tags($body))) . "\r\n\r\n";

    $bodytext .= "--=_NextPart_$boundary\r\n";
    $bodytext .= "Content-Type: text/html; charset=utf-8\r\n";
    $bodytext .= "Content-Transfer-Encoding: base64\r\n\r\n";

    $bodytext .= ereg_replace("(.{80})","\\1\r\n",base64_encode(stripslashes($body)));
    $bodytext .= "\r\n\r\n--=_NextPart_$boundary--\r\n";
    $result = mail($MAIL_TO, '=?utf-8?B?' . base64_encode($MAIL_SUBJ) . '?=',$bodytext,$mailheaders, '-f'.$MAIL_FROM);

    return $result;
}

function mailer($fname, $fmail, $to, $subject, $content)
{
    $fname   = "=?utf-8?B?" . base64_encode($fname) . "?=";
    $subject = "=?utf-8?B?" . base64_encode($subject) . "?=";

    $header  = "Return-Path: <$fmail>\n";
    $header .= "From: $fname <$fmail>\n";
    $header .= "Reply-To: <$fmail>\n";
    $header .= "MIME-Version: 1.0\n";

    // UTF-8 관련 수정
    //$header .= "X-Mailer: SIR Mailer 0.92 (sir.co.kr) : $_SERVER[SERVER_ADDR] : $_SERVER[REMOTE_ADDR] : $g4[url] : $_SERVER[PHP_SELF] : $_SERVER[HTTP_REFERER] \n";
	$header .= "X-Mailer: PHP/".phpversion()." \n";

	$header .= "Content-Type: TEXT/HTML; charset=utf-8\n";
	$content = stripslashes($content);
    $header .= "Content-Transfer-Encoding: BASE64\n\n";
    $header .= chunk_split(base64_encode($content)) . "\n";

    @mail($to, $subject, "", $header);
}


function addZero($size)
{
	$returnStr ="";

	for($i=0;$i<$size;$i++)
	{
		$returnStr = $returnStr."0";

	}
	return $returnStr;
}




function addSpace($size)
{
	$returnStr ="";

	for($i=0;$i<$size;$i++)
	{
		$returnStr = $returnStr." ";

	}
	return $returnStr;
}




function randomNum($size)
{
	$num = array(1,2,3,4,5,6,7,8,9,0);

	for($i=0;$i<$size;$i++)
	{
		$rand  = rand(0,9);
		$pass .= $num[$rand];
	}
	return $pass;
}


function randomNumString($size)
{
	$num = array(1,2,3,4,5,6,7,8,9,0,"A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","W","X","Y","Z","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","w","x","y","z");

	for($i=0;$i<$size;$i++)
	{
		$rand  = rand(0,61);
		$pass .= $num[$rand];
	}
	return $pass;
}


function randomNumLower($size)
{
	$num = array(1,2,3,4,5,6,7,8,9,0,"a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","w","x","y","z");

	for($i=0;$i<$size;$i++)
	{
		$rand  = rand(0,31);
		$pass .= $num[$rand];
	}
	return $pass;
}


function getUserPoint($userID)
{
	$C_DB_FN = New DBClass();

	$sql     = " select tum_point from tbl_user_manage where TUM_USER_ACCOUNT = '$userID' ";
	$rArr	 = $C_DB_FN->GetLow( $sql, $rsCount );

	if ( $rsCount <= 0 )
	{
		return 0;
	}
	else
	{
		$rPoint = $rArr[0][0];
		return $rPoint;
	}
}

function getUserBool( $user_id )
{


	$C_DB_FN = New DBClass();

	$sql     = " select count(user_id) from tbl_fitpl_user where user_id = '$user_id' ";



	$rArr	 = $C_DB_FN->GetLow( $sql, $rsCount );

	if (  $rArr[0][0] > 0 )
	{
		return true;
	}
	else
	{
		return false;
	}

}

function getUserInfoCnt($key, $value)
{
	$C_DB_FN = New DBClass();

	$sql     = " select count(user_id) from tbl_fitpl_user  where $key = '$value' ";
	$rArr	 = $C_DB_FN->GetLow( $sql, $rsCount );

	return $rArr[0][0];


}



function getUserInfoCntOut($key, $value)
{
	$C_DB_FN = New DBClass();

	$sql     = " select count(user_id) from tbl_fitpl_user_out  where $key = '$value' ";
	$rArr	 = $C_DB_FN->GetLow( $sql, $rsCount );

	return $rArr[0][0];


}


function getUserInfoBool($key, $value)
{
	$C_DB_FN = New DBClass();

	$sql     = " select count(user_id) from tbl_fitpl_user where $key = '$value' ";
	$rArr	 = $C_DB_FN->GetLow( $sql, $rsCount );

	if (  $rArr[0][0] > 0 )
	{
		return true;
	}
	else
	{
		return false;
	}
}


function getUserInfoBoolOut($key, $value)
{
	$C_DB_FN = New DBClass();

	$sql     = " select count(user_id) from tbl_fitpl_user_out where $key = '$value' ";
	$rArr	 = $C_DB_FN->GetLow( $sql, $rsCount );

	if (  $rArr[0][0] > 0 )
	{
		return true;
	}
	else
	{
		return false;
	}
}

function getPartnerInfoBool($key, $value)
{
	$C_DB_FN = New DBClass();

	$sql     = " select count(fitpl_index) from fitpl_store where $key = '$value' ";
	$rArr	 = $C_DB_FN->GetLow( $sql, $rsCount );

	if (  $rArr[0][0] > 0 )
	{
		return true;
	}
	else
	{
		return false;
	}
}

function getUserToken( $token )
{
   $C_DB_FN = New DBClass();

   $sql		= " select token_user_key, token_user_id, token_use_date from tbl_user_token where token_user_key = '$token'  ";
   $rArr	= $C_DB_FN->GetLow( $sql, $rsCount );

	if (   $rsCount > 0 )
	{
		$token_user_id		= $rArr[1][0];
		$token_user_date	= $rArr[2][0];
		return "0";
	}
	else
	{
		return "-1";
	}
}

function getUserInfo( $user_id )
{
		$C_DB_FN = New DBClass();

		$sql     = " select user_id, user_name, user_nick_name,  user_phone, CONCAT(user_point,'')
							, user_sex, user_age, set_mail, set_phone, user_location_1_parent,  user_location_1_second, user_location_2_parent
							, user_location_2_second, user_cm, user_helth_type, user_weight


							, ( select LOC_NAME from tbl_new_location where LOC_INDEX = tfu.user_location_1_parent) as locationParent01Name
							, ( select LOC_NAME from tbl_new_location where LOC_INDEX = tfu.user_location_1_second) as locationSecond01Name
							, ( select LOC_NAME from tbl_new_location where LOC_INDEX = tfu.user_location_2_parent) as locationParent02Name
							, ( select LOC_NAME from tbl_new_location where LOC_INDEX = tfu.user_location_2_second) as locationSecond02Name

							
							from tbl_fitpl_user tfu where user_id = '$user_id' and user_del = 'N' and user_block = 'N'  ";



		$rArr	 = $C_DB_FN->GetLow( $sql, $rsCount );

		if (   $rsCount > 0 )
		{
			return $rArr;
		}
		else
		{
			return "";
		}

}


function refreshToken( $token )
{
   $C_DB_FN = New DBClass();

   $sql		= " select token_user_key, token_user_id, token_use_date from tbl_user_token where token_user_key = '$token'  ";
   $rArr	= $C_DB_FN->GetLow( $sql, $rsCount );

	if (   $rsCount > 0 )
	{
		$token_user_id		= $rArr[1][0];
		$token_user_date	= $rArr[2][0];
		$db_token			= randomNumLower(20);
		
		$sql = " update tbl_user_token set token_user_key = '$db_token' , token_use_date = DATE_ADD(now(), INTERVAL 20 MINUTE) , token_reg_date = now() where token_user_id ='$token_user_id' ";
		$rtnvalue = $C_DB->exec( $sql );

	}
	else
	{
		return "-1";
	}
}




function getFitplServiceList($index)
{
	$C_DB_FN = New DBClass();
	$stringDong = "";
	if ( strpos ( $index, "," ) !== false )	
	{
		$indexArr = explode(",", $index);
		$cnt = 0;
		for ( $i = 0 ; $i < sizeof( $indexArr ) ; $i++ )
		{

			$w		 = $indexArr[$i];

			if ( $i <= 1 )
			{
				$sql     = " 
								select 
								ifnull(tcd_code_name,'') 
								from tbl_code_detail where tcd_code = '$w' limit 1
							";
		
				$rArr	 = $C_DB_FN->GetLow( $sql, $rsCount );
				$stringDong = $stringDong.$rArr[0][0].",";
			}
			else
			{
				$cnt++;
			}

			

		}

		if ( $cnt > 0 )
		{
			$stringDong = $stringDong."  외 ".$cnt."건";
		}
		
	}
	else
	{
		$sql     = " 
							select 
							ifnull(tcd_code_name,'') 
							from tbl_code_detail where tcd_code = '$index' limit 1
					";
		$rArr	 = $C_DB_FN->GetLow( $sql, $rsCount );
		$stringDong = $stringDong.$rArr[0][0].",";
	}

	return $stringDong;
}


function getFitplService($index)
{
	$C_DB_FN = New DBClass();
	$stringDong = "";
	if ( strpos ( $index, "," ) !== false )	
	{
		$indexArr = explode(",", $index);
		for ( $i = 0 ; $i < sizeof( $indexArr ) ; $i++ )
		{
			$w		 = $indexArr[$i];
			$sql     = " 
							select 
							ifnull(tcd_code_name,'') 
							from tbl_code_detail where tcd_code = '$w' limit 1
						";
			$rArr	 = $C_DB_FN->GetLow( $sql, $rsCount );
			$stringDong = $stringDong.$rArr[0][0].",";

		}
	}
	else
	{
		$sql     = " 
							select 
							ifnull(tcd_code_name,'') 
							from tbl_code_detail where tcd_code = '$index' limit 1
					";
		$rArr	 = $C_DB_FN->GetLow( $sql, $rsCount );
		$stringDong = $stringDong.$rArr[0][0].",";
	}

	return $stringDong;
}


function getAdreessDelivery($index)
{
	$C_DB_FN = New DBClass();
	$stringDong = "";
	if ( strpos ( $index, "," ) !== false )	
	{
		$indexArr = explode(",", $index);
		for ( $i = 0 ; $i < sizeof( $indexArr ) ; $i++ )
		{
			$w		 = $indexArr[$i];
			$sql     = " 
							select 
							ifnull(tac_dong,'') 
							from tbl_addr_code where tac_index = '$w' limit 1
						";
			$rArr	 = $C_DB_FN->GetLow( $sql, $rsCount );
			$stringDong = $stringDong.$rArr[0][0].",";

		}
	}
	else
	{
		$sql     = " 
						select 
						ifnull(tac_dong,'') 
						from tbl_addr_code where tac_index = '$index' limit 1
					";
		$rArr	 = $C_DB_FN->GetLow( $sql, $rsCount );
		$stringDong = $stringDong.$rArr[0][0].",";
	}

	return $stringDong;
}

function getOptiomName($index)
{
	$C_DB_FN = New DBClass();

	$sql     = " 
					select 
					tsm_index, tsm_name, tsm_price, tsm_addyn
					from tbl_store_menu where tsm_index = '$index' limit 1
				";
	$rArr	 = $C_DB_FN->GetLow( $sql, $rsCount );

	$mIndex  = $rArr[0][0];
	$mName   = $rArr[1][0];
	$mPrice  = $rArr[2][0];
	$mAdd  = $rArr[3][0];

	return $mName."/".$mPrice."/".$mAdd;
}


function getOptiomMenu($index, $select)
{
	
	$C_DB_FN = New DBClass();
	$selectBox = "<select name='cartOption[]' class='cartOption' style='font-size:12px'><option value='0' data-price='0'>추가</option>";
	if ( strpos ( $index, "," ) !== false )	
	{
		$indexArr = explode(",", $index);
		for ( $i = 0 ; $i < sizeof( $indexArr ) ; $i++ )
		{
			$w		 = $indexArr[$i];
			$sql     = " 
							select 
							tsm_index, tsm_name, tsm_price, tsm_addyn
							from tbl_store_menu where tsm_index = '$w' limit 1
						";
			$rArr	 = $C_DB_FN->GetLow( $sql, $rsCount );



			$mIndex  = $rArr[0][0];
			$mName   = $rArr[1][0];
			$mPrice  = $rArr[2][0];
			$mAdd  = $rArr[3][0];
			
			if ( $select == $mIndex )
			{
				$selectBox = $selectBox."<option value='".$mIndex."' data-price='".$mPrice."' data-add='$mAdd' selected >".$mName." / ".number_format($mPrice)."원</option>";
			}
			else
			{
				$selectBox = $selectBox."<option value='".$mIndex."' data-price='".$mPrice."' data-add='$mAdd'>".$mName." / ".number_format($mPrice)."원</option>";
			}
			
			
		}
	}
	else
	{
		$sql     = " 
						select 
						tsm_index, tsm_name, tsm_price, tsm_addyn
						from tbl_store_menu where tsm_index = '$index' limit 1
					";
		$rArr	 = $C_DB_FN->GetLow( $sql, $rsCount );

		$mIndex  = $rArr[0][0];
		$mName   = $rArr[1][0];
		$mPrice  = $rArr[2][0];
		$mAdd  = $rArr[3][0];		

		if ( $select == $mIndex )
		{
			$selectBox = $selectBox."<option value='".$mIndex."' data-price='".$mPrice."'  data-add='$mAdd' selected >".$mName." / ".number_format($mPrice)."원</option>";
		}
		else
		{
			$selectBox = $selectBox."<option value='".$mIndex."' data-price='".$mPrice."' data-add='$mAdd' >".$mName." / ".number_format($mPrice)."원</option>";
		}


		//$selectBox = $selectBox."<option value='".$mIndex."' data-price='".$mPrice."'>".$mName." / ".number_format($mPrice)."원</option>";
	}
	$selectBox = $selectBox."</select>";
	return $selectBox;
}

function getServiceName($index)
{
	$C_DB_FN = New DBClass();

	$sql     = " 
					select 
					tsm_index, tsm_name, tsm_price
					from tbl_store_menu where tsm_index = '$index' limit 1
				";
	$rArr	 = $C_DB_FN->GetLow( $sql, $rsCount );

	$mIndex  = $rArr[0][0];
	$mName   = $rArr[1][0];
	$mPrice  = $rArr[2][0];

	return $mName;
}



function getServiceMenu($index, $select)
{
	$C_DB_FN = New DBClass();
	$selectBox = "<select name='cartService[]' class='cartService' style='font-size:12px'>><option value='0'>옵션</option>";
	if ( strpos ( $index, "," ) !== false )	
	{
		$indexArr = explode(",", $index);
		for ( $i = 0 ; $i < sizeof( $indexArr ) ; $i++ )
		{
			$w		 = $indexArr[$i];
			$sql     = " 
							select 
							tsm_index, tsm_name, tsm_price
							from tbl_store_menu where tsm_index = '$w' limit 1
						";
			$rArr	 = $C_DB_FN->GetLow( $sql, $rsCount );

			$mIndex  = $rArr[0][0];
			$mName   = $rArr[1][0];
			$mPrice  = $rArr[2][0];
			


		if ( $select == $mIndex )
		{
			$selectBox = $selectBox."<option value='".$mIndex."' data-price='0' selected>".$mName."</option>";
		}
		else
		{
			$selectBox = $selectBox."<option value='".$mIndex."' data-price='0'>".$mName."</option>";
		}


			
			
		}
	}
	else
	{
		$sql     = " 
						select 
						tsm_index, tsm_name, tsm_price
						from tbl_store_menu where tsm_index = '$index' limit 1
					";
		$rArr	 = $C_DB_FN->GetLow( $sql, $rsCount );

		$mIndex  = $rArr[0][0];
		$mName   = $rArr[1][0];
		$mPrice  = $rArr[2][0];
		


		if ( $select == $mIndex )
		{
			$selectBox = $selectBox."<option value='".$mIndex."' data-price='0' selected>".$mName."</option>";
		}
		else
		{
			$selectBox = $selectBox."<option value='".$mIndex."' data-price='0'>".$mName."</option>";
		}


	}
	$selectBox = $selectBox."</select>";
	return $selectBox;
}

function jsonOutputArray($code, $message, $array)
{
	$arrCode = array('result'=>$code,'message'=>$message, 'info'=>$array);
	return json_encode( $arrCode  );
}



function jsonOutputDefault($code, $message)
{
	$arrCode = array('result'=>$code,'message'=>$message);
	return json_encode( $arrCode  );
}

function getBoardInfo($code, $mode, $group)
{
	global $C_DB;
	
	if ( strtoupper($group) == "Y" )
	{
		$boardSql			= 
			"	
					SELECT 
						dbi_code			,
						dbi_title			, 
						dbi_customer		, 
						dbi_admin_skin		, 
						dbi_custom_skin		,
						dbi_reply			,
						dbi_state_display	,
						dbi_group_code		,
						dbi_category		,
						dbi_desc

					FROM  
						GH_board_info  
					WHERE 
						dbi_group_code = '".$code."' 
					limit 1 
			";
	}
	else
	{
		$boardSql			= 
			"	
					SELECT 
						dbi_code			,
						dbi_title			, 
						dbi_customer		, 
						dbi_admin_skin		, 
						dbi_custom_skin		,
						dbi_reply			,
						dbi_state_display	,
						dbi_group_code		,
						dbi_category		,
						dbi_desc

					FROM  
						GH_board_info  
					WHERE 
						dbi_code = '".$code."' 
					
					limit 1 
			";
	}


	$boardArray		= $C_DB->GetLow( $boardSql, $boardRsCount );
	return $boardArray;
}

function Srequest2($inDataStr) {
	$Srequest = trim(removeXSS2(sqlFilter($inDataStr)));
	return $Srequest;
}

function arrSendPush( $message, $ticker, $title, $key, $imgFile )
{
	$C_DB_FN = New DBClass();
	$sql = " select user_push, user_id from tbl_fitpl_user where set_push = 'Y' and user_push <> '' ";




	$rArr	 = $C_DB_FN->GetLow( $sql, $rsCount );

	if ( $rsCount > 0 )
	{
		for($i=0; $i<$rsCount; $i++)
		{
			$pushToken    = $rArr[0][$i];			
			$pushID	      = $rArr[1][$i];	

			$pushTypeStr  = "ANDROID";
			$push_keyCode = $pushToken ;


			$startdate = date("YmdHi")."00";
			$enddate   = date("YmdHi",strtotime ("+1 minutes"))."00";

			$doc = array(
				"Device"		=> $pushTypeStr 	,
				"Oauth"			=> "AIzaSyAdeKVH_BSJmMLhs-71f-aZcL_v5LgoAIs"	,
				"From"			=> $push_keyCode								,
				"UserID"		=> $pushID										,
				"Ticker"		=> $ticker										,
				"Title"			=> $title		,
				"Badge"			=> "1"			,
				"Message"		=> $message		,
				"Sound"			=> ""			,
				"Images"		=> $imgFile 		,
				"Type"			=> "G"					,
				"Url"			=> ""						,
				"StartDate"		=> $startdate	,
				"EndDate"		=> $startdate	,
				"pushYN"		=> "N"
			);

			
			$monClass = New MongoDbClass();
			$rtnCount = $monClass->InsertData( $doc, "meet_app_push", "ourtownpush" );
		}

		if ( $key != "" )
		{
			$sql = " UPDATE GH_board_data SET dbd_pushdate = now() WHERE dbd_index = ".$key;
			$rst = $C_DB_FN->exec( $sql );
		}
	}
}


function setPushAndroidCustomer( $message, $ticker, $title, $type, $url, $image, $userId, $gcmId)
{

	$C_DB_FN = New DBClass();

	$sql = " select user_push from tbl_fitpl_user where set_push = 'Y' and user_id = '$gcmId' and user_push is not null limit 1 ";
	$rArr	 = $C_DB_FN->GetLow( $sql, $rsCount );

	if ( $rsCount > 0 )
	{
		$user_push		 = $rArr[0][0];
		$pushTypeStr     = "ANDROID";
		$push_keyCode	 = $user_push;


		$startdate = date("YmdHi")."00";
		$enddate   = date("YmdHi",strtotime ("+1 minutes"))."00";

		$doc = array(
			"Device"		=> $pushTypeStr 	,
			"Oauth"			=> "AIzaSyCMK_E2X_ZbtE6jM_GfqtjGEkhoid89Rxc"	,
			"From"			=> $push_keyCode		,
			"UserID"		=> $gcmId		,
			"Ticker"		=> $ticker		,
			"Title"			=> $title		,
			"Badge"			=> "1"			,
			"Message"		=> $message		,
			"Sound"			=> ""			,
			"Images"		=> $image		,
			"Type"			=> $type		,
			"Url"			=> $url			,
			"StartDate"		=> $startdate	,
			"EndDate"		=> $startdate	,
			"pushYN"		=> "N"
		);
		$monClass = New MongoDbClass();
		$rtnCount = $monClass->InsertData( $doc, "meet_app_push", "ourtownpush" );
	}
}



function fitpassCnt( $user_id )
{

	$C_DB_FN = New DBClass();

	$sql = "
			
				select
					count(pm_index)
				from  
					tbl_fitpl_pay
				where 
				
				pm_user_id = '$user_id' and pm_state = 'Y' and pm_product = 'fitpass' and pm_last_date >= now()
		   ";


	$rArr			= $C_DB_FN->GetLow( $sql, $rsCount );
	$fitpassCnt		= $rArr[0][0];

	return $fitpassCnt;
}




function removeXSS2($get_String) {
	//get_String = Replace(get_String, "&", "&amp;")
	//$get_String = Replace(get_String, "<", "&lt;")
	//$get_String = Replace(get_String, ">", "&gt;")
	$get_String = str_replace("<xmp", "<x-xmo", $get_String);
	$get_String = str_replace("javascript", "<x-javascript", $get_String);
	$get_String = str_replace("script", "<x-script", $get_String);
	//$get_String = str_replace("iframe", "<x-iframe", $get_String);
	$get_String = str_replace("document", "<x-document", $get_String);
	$get_String = str_replace("vbscript", "<x-vbscript", $get_String);
	$get_String = str_replace("applet", "<x-applet", $get_String);
	//$get_String = str_replace("embed", "<x-embed", $get_String);
	$get_String = str_replace("object", "<x-object", $get_String);
	//$get_String = str_replace("frame", "<x-frame", $get_String);
	$get_String = str_replace("grameset", "<x-grameset", $get_String);
	$get_String = str_replace("layer", "<x-layer", $get_String);
	$get_String = str_replace("bgsound", "<x-bgsound", $get_String);
	$get_String = str_replace("alert", "<x-alert", $get_String);
	$get_String = str_replace("onblur", "<x-onblur", $get_String);
	$get_String = str_replace("onchange", "<x-onchange", $get_String);
	$get_String = str_replace("onclick", "<x-onclick", $get_String);
	$get_String = str_replace("ondblclick","<x-ondblclick",  $get_String);
	$get_String = str_replace("enerror", "<x-enerror", $get_String);
	$get_String = str_replace("onfocus", "<x-onfocus", $get_String);
	$get_String = str_replace("onload", "<x-onload", $get_String);
	$get_String = str_replace("onmouse", "<x-onmouse", $get_String);
	$get_String = str_replace("onscroll", "<x-onscroll", $get_String);
	$get_String = str_replace("onsubmit", "<x-onsubmit", $get_String);
	$get_String = str_replace("onunload", "<x-onunload", $get_String);
	return $get_String;
}

function fncConvertToJpg( $source_file, $_width, $_height, $object_file )
{
	list($img_width,$img_height, $type) = getimagesize($source_file);
	$img_sour = imagecreatefromXbmp($source_file);

	$x_last = 0;
    $y_last = 0;


	$img_dest = imagecreatetruecolor($_width,$_height); 
	imagecopyresampled($img_dest, $img_sour,0,0,0,0,$_width,$_height,$img_width,$img_height); 

	$img_last = imagecreatetruecolor($_width,$_height); 
	imagecopy($img_last,$img_dest,0,0,$x_last,$y_last,$_width,$_height);
	imagedestroy($img_dest);

	imagejpeg($img_last, $object_file, 100);
    imagedestroy($img_last);

    return true;
}

function imagecreatefromXbmp($p_sFile)
{
	$file	  = fopen($p_sFile,"rb");
	$read = fread($file,10);
	while(!feof($file)&&($read<>""))
		$read    .=    fread($file,1024);
	$temp    =    unpack("H*",$read);
	$hex    =    $temp[1];
	$header    =    substr($hex,0,108);
	if (substr($header,0,4)=="424d")
	{
		$header_parts    =    str_split($header,2);
		$width            =    hexdec($header_parts[19].$header_parts[18]);
		$height            =    hexdec($header_parts[23].$header_parts[22]);
		unset($header_parts);
	}
	$x                =    0;
	$y                =    1;
	$image            =    imagecreatetruecolor($width,$height);
	$body            =    substr($hex,108);
	$body_size        =    (strlen($body)/2);
	$header_size    =    ($width*$height);
	$usePadding        =    ($body_size>($header_size*3)+4);
	for ($i=0;$i<$body_size;$i+=3)
	{
		if ($x>=$width)
		{
			if ($usePadding)
				$i    +=    $width%4;
			$x    =    0;
			$y++;
			if ($y>$height)
				break;
		}
		$i_pos    =    $i*2;
		$r        =    hexdec($body[$i_pos+4].$body[$i_pos+5]);
		$g        =    hexdec($body[$i_pos+2].$body[$i_pos+3]);
		$b        =    hexdec($body[$i_pos].$body[$i_pos+1]);
		$color    =    imagecolorallocate($image,$r,$g,$b);
		imagesetpixel($image,$x,$height-$y,$color);
		$x++;
	}
	unset($body);
	return $image;
}


function sendMail($mailAddreess, $subject, $body )
{
	require_once  $_SERVER[DOCUMENT_ROOT]."/@lib/PHPMailerAutoload.php"; 

	$mail = new PHPMailer;
	$mail->isSMTP();                                      // Set mailer to use SMTP

	$mail->Host			= 'smtp.gmail.com';						  // Specify main and backup SMTP servers
	$mail->SMTPAuth		= true;                               // Enable SMTP authentication
	$mail->CharSet		= "utf-8";
	$mail->SMTPSecure	= "ssl";		                 // sets the prefix to the servier
	$mail->Port = 465;                                    // TCP port to connect to
	$mail->Username		= "woodongcar2";             // GMAIL username
	$mail->Password		= "woodongcar";              // GMAIL password
	$mail->From			= 'woodongcar@woodongcar.co.kr';
	$mail->FromName		= '핏플';

	$mail->addAddress($mailAddreess);     // Add a recipient
	
	//$mail->addReplyTo('info@example.com', 'Information');
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');
	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject = $subject;
	$mail->Body    = $body;
	$mail->AltBody = $subject;

	if(!$mail->send()) {



		return false;
	} else {


		return true;
	}

}

function setSmsSend( $phone, $message )
{
	include_once $_SERVER[DOCUMENT_ROOT]."/@lib/class.sms.php";

	$sms_server	= "211.172.232.124";	## SMS 서버 
	$sms_id		= "zoppura";				## icode 아이디
	$sms_pw		= "p6942335";			## icode 패스워드
	$portcode	= 1;					## 정액제 : 2, 충전식 : 1

	$SMS	= new SMS;
	$SMS->SMS_con($sms_server,$sms_id,$sms_pw,$portcode);

	/**************************************************************************************
	1단계: 보낼 메시지를 저장합니다. 쇼핑몰에서 장바구니에 물건을 담는다고 생각하면 됩니다.
		
		일반 메시지를 보낼 경우 SMS->Add() 를 사용합니다. 인자는 다음과 같습니다.
			1. 받는 사람 핸드폰 번호
			2. 보내는 사람 전화 (회신번호)
			3. 보내는 사람 이름
			4. 보내는 메시지 (80자 이내)
			5. 예약시간 (12자 - 예약발송일 경우에만 입력. 예: 2001년 5월30일 오후2시30분이면 200105301430)

		URL을 보낼 경우 SMS->AddURL() 을 사용합니다. 인자는 다음과 같습니다.
			1. 받는 사람 핸드폰 번호
			2. URL (50자 이내)
			3. 보내는 메시지 (80자 이내)
			4. 예약시간 (12자 - 예약발송일 경우에만 입력. 예: 2001년 5월30일 오후2시30분이면 200105301430)
		
		잘못된 값이 들어갔을 경우 에러메시지가 리턴됩니다.

		※ .URL 콜백의 경우 건당 50원의 요금이 부과 됩니다.
		※ .SKT(011,017) 번호로 발송하실 경우 사용자 동의를 받지 않아 전송 실패일 경우에도
			정상적으로 요금이 청구 됩니다.
		※ .KTF(016,018) 번호로 발송하실 경우 회신번호를 반드시 입력하셔야 정상적으로 송신이 됩니다.
	**************************************************************************************/

	$tran_phone		= $phone;		# 수신번호
	$tran_callback	= "15442905";	# 회신번호
	$tran_msg		= iconv("UTF-8","euc-kr", $message) ;		# 발송 메세지
	$tran_date		= "";				#발송시간
	#즉시 전송일 경우 $tran_date	= "" ;$변수 = iconv("EUC-KR","UTF-8", $string);
	#예약 전송일 경우 $tran_date	= "200412312359";	# 2004년 12월 31일 23시 59분
	$result = $SMS->Add($phone,"$tran_callback","$sms_id","$tran_msg","$tran_date");

	if ($result)
	{
		return "N1";
	}
	else
	{
		$result = $SMS->Send();
		if ($result) {
			$success = $fail = 0;
			foreach($SMS->Result as $result) {
				list($phone,$code)=explode(":",$result);

				if ($code=="Error") {
					$fail++;
				} else {
					$success++;
				}
			}
			return "Y";
			$SMS->Init(); // 보관하고 있던 결과값을 지웁니다.
		}
		else
		{
			return "N2";
		}
	}
}

function returnWeekStr( $week )
{
	$rtnWeek = "";
	if ( $week == "0" )  { $rtnWeek= "일요일"; }
	if ( $week == "1" )  { $rtnWeek= "월요일"; }
	if ( $week == "2" )  { $rtnWeek= "화요일"; }
	if ( $week == "3" )  { $rtnWeek= "수요일"; }
	if ( $week == "4" )  { $rtnWeek= "목요일"; }
	if ( $week == "5" )  { $rtnWeek= "금요일"; }
	if ( $week == "6" )  { $rtnWeek= "토요일"; }




	return $rtnWeek;
}

function returnAgeRange( $age,$rtnType)
{	
	$returnMsg = "";

	if ( $age <= 0 )
	{
		if( $rtnType == "A")
		{
			$returnMsg = "  ";
		}
		else
		{
			$returnMsg = "";
		}
	}


	if ( $age >= 10 && $age < 20 )
	{
		if( $rtnType == "A")
		{
			$returnMsg = " ( round( DATEDIFF(now() ,user_birth) / 365,0) >= 10 and round( DATEDIFF(now() ,user_birth) / 365,0) < 20 )";
		}
		else
		{
			$returnMsg = "10대";
		}
	}

	if ( $age >= 20 && $age < 30 )
	{
		if( $rtnType == "A")
		{
			$returnMsg = " ( round( DATEDIFF(now() ,user_birth) / 365,0) >= 20 and round( DATEDIFF(now() ,user_birth) / 365,0) < 30 )";
		}
		else
		{
			$returnMsg = "20대";
		}
	}


	if ( $age >= 30 && $age < 40 )
	{
		if( $rtnType == "A")
		{
			$returnMsg = " ( round( DATEDIFF(now() ,user_birth) / 365,0) >= 30 and round( DATEDIFF(now() ,user_birth) / 365,0) < 40 )";
		}
		else
		{
			$returnMsg = "30대";
		}
	}


	if ( $age >= 40 && $age < 50 )
	{
		if( $rtnType == "A")
		{
			$returnMsg = " ( round( DATEDIFF(now() ,user_birth) / 365,0) >= 40 and round( DATEDIFF(now() ,user_birth) / 365,0) < 50 )";
		}
		else
		{
			$returnMsg = "40대";
		}
	}


	if ( $age >= 50 && $age < 60 )
	{
		if( $rtnType == "A")
		{
			$returnMsg = " ( round( DATEDIFF(now() ,user_birth) / 365,0) >= 50 and round( DATEDIFF(now() ,user_birth) / 365,0) < 60 )";
		}
		else
		{
			$returnMsg = "50대";
		}
	}


	if ( $age >= 60 && $age < 70 )
	{
		if( $rtnType == "A")
		{
			$returnMsg = " ( round( DATEDIFF(now() ,user_birth) / 365,0) >= 60 and round( DATEDIFF(now() ,user_birth) / 365,0) < 70 )";
		}
		else
		{
			$returnMsg = "60대";
		}
	}


	if ( $age >= 70 && $age < 80 )
	{
		if( $rtnType == "A")
		{
			$returnMsg = " ( round( DATEDIFF(now() ,user_birth) / 365,0) >= 70 and round( DATEDIFF(now() ,user_birth) / 365,0) < 80 )";
		}
		else
		{
			$returnMsg = "70대";
		}
	}

	if ( $age >= 80 )
	{
		if( $rtnType == "A")
		{
			$returnMsg = " ( round( DATEDIFF(now() ,user_birth) / 365,0) >= 80  )";
		}
		else
		{
			$returnMsg = "80대 이상";
		}
	}

	return $returnMsg;
}

?>