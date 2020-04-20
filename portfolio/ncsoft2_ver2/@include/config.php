<?
error_reporting(E_ALL ^ E_NOTICE);

// 보안설정이나 프레임이 달라도 쿠키가 통하도록 설정
header('P3P: CP="ALL CURa ADMa DEVa TAIa OUR BUS IND PHY ONL UNI PUR FIN COM NAV INT DEM CNT STA POL HEA PRE LOC OTC"');
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Content-Type: text/html; charset=UTF-8");

if (!isset($set_time_limit)) $set_time_limit = 0;
@set_time_limit($set_time_limit);

// 짧은 환경변수를 지원하지 않는다면
if (isset($HTTP_POST_VARS) && !isset($_POST)) {
	$_POST   = &$HTTP_POST_VARS;
	$_GET    = &$HTTP_GET_VARS;
	$_SERVER = &$HTTP_SERVER_VARS;
	$_COOKIE = &$HTTP_COOKIE_VARS;
	$_ENV    = &$HTTP_ENV_VARS;
	$_FILES  = &$HTTP_POST_FILES;

    if (!isset($_SESSION))
		$_SESSION = &$HTTP_SESSION_VARS;
}


// phpBB2 참고
// php.ini 의 magic_quotes_gpc 값이 FALSE 인 경우 addslashes() 적용
// SQL Injection 등으로 부터 보호

if( !get_magic_quotes_gpc() )
{
	if( is_array($_GET) )
	{
		while( list($k, $v) = each($_GET) )
		{
			if( is_array($_GET[$k]) )
			{
				while( list($k2, $v2) = each($_GET[$k]) )
				{
					$_GET[$k][$k2] = addslashes($v2);
				}
				@reset($_GET[$k]);
			}
			else
			{
				$_GET[$k] = addslashes($v);
			}
		}
		@reset($_GET);
	}

	if( is_array($_POST) )
	{
		while( list($k, $v) = each($_POST) )
		{
			if( is_array($_POST[$k]) )
			{
				while( list($k2, $v2) = each($_POST[$k]) )
				{
					$_POST[$k][$k2] = addslashes($v2);
				}
				@reset($_POST[$k]);
			}
			else
			{
				$_POST[$k] = addslashes($v);
			}
		}
		@reset($_POST);
	}

	if( is_array($_COOKIE) )
	{
		while( list($k, $v) = each($_COOKIE) )
		{
			if( is_array($_COOKIE[$k]) )
			{
				while( list($k2, $v2) = each($_COOKIE[$k]) )
				{
					$_COOKIE[$k][$k2] = addslashes($v2);
				}
				@reset($_COOKIE[$k]);
			}
			else
			{
				$_COOKIE[$k] = addslashes($v);
			}
		}
		@reset($_COOKIE);
	}
}

//==========================================================================================================================
// XSS(Cross Site Scripting) 공격에 의한 데이터 검증 및 차단
//--------------------------------------------------------------------------------------------------------------------------
function xss_clean($data)
{
    // If its empty there is no point cleaning it :\
    if(empty($data))
        return $data;

    // Recursive loop for arrays
    if(is_array($data))
    {
        foreach($data as $key => $value)
        {
            $data[$key] = xss_clean($value);
        }

        return $data;
    }

    // http://svn.bitflux.ch/repos/public/popoon/trunk/classes/externalinput.php
    // +----------------------------------------------------------------------+
    // | Copyright (c) 2001-2006 Bitflux GmbH                                 |
    // +----------------------------------------------------------------------+
    // | Licensed under the Apache License, Version 2.0 (the "License");      |
    // | you may not use this file except in compliance with the License.     |
    // | You may obtain a copy of the License at                              |
    // | http://www.apache.org/licenses/LICENSE-2.0                           |
    // | Unless required by applicable law or agreed to in writing, software  |
    // | distributed under the License is distributed on an "AS IS" BASIS,    |
    // | WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or      |
    // | implied. See the License for the specific language governing         |
    // | permissions and limitations under the License.                       |
    // +----------------------------------------------------------------------+
    // | Author: Christian Stocker <chregu@bitflux.ch>                        |
    // +----------------------------------------------------------------------+

    // Fix &entity\n;
    $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
    $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/', '$1;', $data);
    $data = preg_replace('/(&#x*[0-9A-F]+);*/i', '$1;', $data);

    if (function_exists("html_entity_decode"))
    {
        $data = html_entity_decode($data);
    }
    else
    {
        $trans_tbl = get_html_translation_table(HTML_ENTITIES);
        $trans_tbl = array_flip($trans_tbl);
        $data = strtr($data, $trans_tbl);
    }

    // Remove any attribute starting with "on" or xmlns
    $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#i', '$1>', $data);

    // Remove javascript: and vbscript: protocols
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#i', '$1=$2nojavascript...', $data);
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#i', '$1=$2novbscript...', $data);
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#', '$1=$2nomozbinding...', $data);

    // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#i', '$1>', $data);

    // Remove namespaced elements (we do not need them)
    $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

    do
    {
        // Remove really unwanted tags
        $old_data = $data;
        $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
    }
    while ($old_data !== $data);

    return $data;
}

$_GET = xss_clean($_GET);



//==========================================================================================================================
// extract($_GET); 명령으로 인해 page.php?_POST[var1]=data1&_POST[var2]=data2 와 같은 코드가 _POST 변수로 사용되는 것을 막음
// 081029 : letsgolee 님께서 도움 주셨습니다.
//--------------------------------------------------------------------------------------------------------------------------
$ext_arr = array ('PHP_SELF', '_ENV', '_GET', '_POST', '_FILES', '_SERVER', '_COOKIE', '_SESSION', '_REQUEST',
                  'HTTP_ENV_VARS', 'HTTP_GET_VARS', 'HTTP_POST_VARS', 'HTTP_POST_FILES', 'HTTP_SERVER_VARS',
                  'HTTP_COOKIE_VARS', 'HTTP_SESSION_VARS', 'GLOBALS');
$ext_cnt = count($ext_arr);
for ($i=0; $i<$ext_cnt; $i++) {
    // GET 으로 선언된 전역변수가 있다면 unset() 시킴
    if (isset($_GET[$ext_arr[$i]])) unset($_GET[$ext_arr[$i]]);
}
//==========================================================================================================================

$_SERVER['PHP_SELF'] = htmlentities($_SERVER['PHP_SELF']);

//-------------------------------------------
// SESSION 설정
//-------------------------------------------
ini_set("session.use_trans_sid", 0);    // PHPSESSID를 자동으로 넘기지 않음
ini_set("url_rewriter.tags","");		// 링크에 PHPSESSID가 따라다니는것을 무력화함 (해뜰녘님께서 알려주셨습니다.)


if (isset($SESSION_CACHE_LIMITER))
    @session_cache_limiter($SESSION_CACHE_LIMITER);
else
    @session_cache_limiter("no-cache, must-revalidate");


ini_set("session.cache_expire", 180);		//세션 캐쉬 보관시간 (분)
ini_set("session.gc_maxlifetime", 10800);	//session data의 garbage collection 존재 기간을 지정 (초)
ini_set("session.gc_probability", 1);		//session.gc_probability는 session.gc_divisor와 연계하여 gc(쓰레기 수거) 루틴의 시작 확률을 관리합니다. 기본값은 1입니다. 자세한 내용은 session.gc_divisor를 참고하십시오.

/** session.gc_divisor는 session.gc_probability와 결합하여 각 세션 초기화 시에 gc(쓰레기 수거) 프로세스를 시작할 확률을 정의합니다. 확률은 gc_probability/gc_divisor를 사용하여 계산합니다. 즉, 1/100은 각 요청시에 GC 프로세스를 시작할 확률이 1%입니다. session.gc_divisor의 기본값은 100입니다. **/
ini_set("session.gc_divisor", 100);			

//session_set_cookie_params(0, "/");
//ini_set("session.cookie_domain", $g4['cookie_domain']);


session_start();
include_once $_SERVER[DOCUMENT_ROOT]."/ncsoft2_ver2/@lib/function.php";
include_once $_SERVER[DOCUMENT_ROOT]."/ncsoft2_ver2/@lib/Session.php";
include_once $_SERVER[DOCUMENT_ROOT]."/ncsoft2_ver2/@lib/resultFNC.php";
include_once $_SERVER[DOCUMENT_ROOT]."/ncsoft2_ver2/@lib/StringClass.php";
include_once $_SERVER[DOCUMENT_ROOT]."/ncsoft2_ver2/@lib/DBClass.php";
include_once $_SERVER[DOCUMENT_ROOT]."/ncsoft2_ver2/@lib/FileClass.php";
include_once $_SERVER[DOCUMENT_ROOT]."/ncsoft2_ver2/@lib/MongoDbClass.php";


$domain = "http://dev.mdplus.kr/";

define('KK_CLIENT_ID'		, 'ce3bb4b336575ceb17260427bdef85bd');
define('KK_REDIRECT'		, 'http://meet.mdplus.kr/@interface/kakaoCallback.php');


define('CONSUMER_KEY'			, 'mrHcpBn8trNcf3QLrcmutYK3N');
define('CONSUMER_SECRET'	, 'AXm7JqXu0XkQ1qb3TqwzZMYmBOfbgXmzTR8jgS8bbASClvsdf2');
define('OAUTH_CALLBACK'		, 'http://meet.mdplus.kr/@interface/twiter_callback.php');


define('naver_ClientID'			, 'OKwmDkyrZ6GvEq7HsorZ');
define('naver_ClientSecret'	, 'B3w98AezOz');
define('naver_RedirectURL'		, 'http://meet.mdplus.kr/@interface/naver_callback.php');



?>