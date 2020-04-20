<?
	//세션 체크
	
	if ( $inSessionID == "" || $inSessionID == null )
	{
?>
		<script type="text/javascript">
			alert("해당 페이지는 로그인 이후 이용이 가능합니다.");
			location.href='/@page/index.php';
		</script>
<?
		exit;
	}

	$myinfo = getUserInfo();

	if ($myinfo == "")
	{
?>
		<script type="text/javascript">
			alert("해당 페이지는 로그인 이후 이용이 가능합니다.");
			location.href='/@page/index.php';
		</script>
<?
		exit;
	}
	else
	{
		$db_user_id		= $myinfo[0][0];
		$db_user_name	= $myinfo[1][0];
		$db_user_profil	= $myinfo[4][0];
		$db_push_yn		= $myinfo[2][0];
		$db_mail_yn		= $myinfo[3][0];
		$db_user_point	= $myinfo[5][0];
	}

?>
