<?include_once $_SERVER[DOCUMENT_ROOT]."/@include/config.php";?>
<?

	$inSessionID	= $_SESSION["wc_users_id"];
	$inSessionNM	= $_SESSION["wc_users_name"];
	$_SESSION['meet_kk_id']		= "";
	$_SESSION['meet_kk_nm']		= "";
	$_SESSION['meet_kk_pf']		= "";

?>
<!DOCTYPE html>
	<html lang="ko">
	<head>
	<meta charset="utf-8">	
	<title>우동카</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!--[if lt IE 9]><script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css"><![endif]-->
	<link rel="stylesheet" href="css/base.css">
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/slidx.js"></script>
    <script type="text/javascript" src="js/mov.min.js"></script>    
    <link href="css/pc.css" type="text/css" media="all and (min-width:768px)" rel="stylesheet"/>
    <link href="css/mobile.css" type="text/css" media="all and (max-width:767px)" rel="stylesheet"/>
    <link href="/@resources/js/jquery.ui.all.css" type="text/css"  rel="stylesheet"/>