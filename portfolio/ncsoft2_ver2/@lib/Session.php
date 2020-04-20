<?
/* 한글처리 */
$SessionCheckValue = "0";

if( $_COOKIE["U_IDX"] == "" ) $SessionCheckValue = $SessionCheckValue .= 1;
if( $_COOKIE["U_NAME"] == "" ) $SessionCheckValue = $SessionCheckValue .= 2;
if( $_COOKIE["U_ID"] == "" ) $SessionCheckValue = $SessionCheckValue .= 3;


$m_U_IDX;
$m_U_NAME;
$m_U_ID;
$m_U_TYPE;
//===============================================================
//	session의 ID값을 체크하여 로그인여부를 판단한다.
//===============================================================
function Check_Session()
{
	SetgoURL("");
	global $m_U_IDX, $m_U_NAME, $m_U_ID, $m_U_TYPE;


	$m_U_NAME	 = $_SESSION['fitpl_a_name'];
	$m_U_ID		 = $_SESSION['fitpl_a_id'];

}

//===============================================================
//	session의 ID값을 체크하여 로그인여부를 판단한다. - 팝업 용
//===============================================================
function Check_Session_Pop()
{
	global $m_U_IDX, $m_U_NAME, $m_U_ID, $m_U_TYPE;
	$m_U_NAME = $_SESSION["meet_admin_name"];
	$m_U_ID		 = $_SESSION["meet_admin_system"];

	if( $m_U_ID == "" )
	{
		 Result("F","로그인 후 사용할 수 있습니다.","","로그인","","top.self.close();");
	}
}

//===============================================================
//	session의 ID값을 체크하여 로그인여부를 판단한다. - 아이프레임 용
//===============================================================
function Check_Session_ifr()
{
	global $m_U_IDX, $m_U_NAME, $m_U_ID, $m_U_TYPE;
	$m_U_NAME	 = $_SESSION["meet_admin_name"];
	$m_U_ID		 = $_SESSION["meet_admin_system"];
}

function GetLogin()
{
	if( $_SESSION["meet_admin_system"] != "" )
	{
		return true;
	}

	else
	{
		return false;
	}
}

function GetadminLogin()
{

	if( $_SESSION["fitpl_a_id"] != "" )
	{
		return true;
	}

	else
	{
		return false;
	}
}

function GetUserLogin()
{
	if( $_COOKIE["U_TYPE"] == "" &&  $_COOKIE["U_IDX"] != "" )
	{
		return true;
	}

	else
	{
		return false;
	}
}

function isLogin(){
	if( $_SESSION["fitpl_a_id"] != "" ){
		return true;
	}else{
		return false;
	}
}

//===============================================================
//	쿠키 설정
//===============================================================
function SetgoURL( $sURL )
{
	if( is_array( $_POST ) == true )
	{
		$postval = implode( "&", $_POST );
	}

	else
	{
		$postval = "";
	}

	if( $sURL == "" )
	{
		$sURL = $_SERVER['PHP_SELF'];
		if( strstr($sURL, '/ADMIN/LOGIN/') != false )
		{
			return;
		}

		if( strlen( $_SERVER['QUERY_STRING'] ) > 0 )
		{
			$sURL = $sURL."?".$_SERVER['QUERY_STRING'];
			if( $_SERVER['QUERY_STRING'] != "" && $postval != "" )
			{

				$sURL = $sURL."&";
			}
			$sURL = $postval;
		}

		else
		{
			$sURL = $_SERVER['QUERY_STRING'];
		}

		setcookie( "GetURL", $sURL, 0, "/" );
	}
}

function GetgoURL()
{
	$sURL = $_COOKIE['GetURL'];

	if( $sURL == "" )
	{
		$sURL = "/ADMIN/main/main.asp";
	}

	return $sURL;
}

?>