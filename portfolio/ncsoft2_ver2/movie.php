

<?

	include_once $_SERVER[DOCUMENT_ROOT]."/ncsoft2_ver2/@include/config.php";
	$C_DB	= new DBClass;

	$SelSql = " select mv_movie from tbl_movie ";

	$RtnArray = $C_DB->GetLow($SelSql, $RtnRsCount);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>NC SOFT</title>	

	<script src="./js/jquery.3.3.1.min.js"></script>

	
</head>
<body>
	<form name="frmMovie" id="frmMovie" method="post" action="./movie_proc.php" target="ifrMovie" enctype="multipart/form-data">
		mp4파일만 업로드 해주세요. : <input type="file" name="fMovie" />
		<br />
		<br />
		<br />
		<button name="btnMovie" id="btnMovie">영상등록</button>
	</form>
	
	<script>
		$(document).ready(function(){
			
			$("#btnMovie").on("click", function(){
				$("#frmMovie").submit();
			});
		});
	</script>

	<br>
	<table border="1" cellspacing="1" cellpadding="1" bgcolor="#efefef">
	  <tr>
		<th width="300">링크</th>
	  </tr>
	  <tr>
		<td><a href="https://pub.mdplus.kr/ncsoft2_ver2/index.php?m=movie1.mp4" target="_blank">movie1.mp4 영상확인</a></td>
	  </tr>
	  <tr>
		<td><a href="https://pub.mdplus.kr/ncsoft2_ver2/index.php?m=movie2.mp4" target="_blank">movie2.mp4 영상확인</a></td>
	  </tr>
	  <tr>
		<td><a href="https://pub.mdplus.kr/ncsoft2_ver2/index.php?m=movie3.mp4" target="_blank">movie3.mp4 영상확인</a></td>
	  </tr>
	  <tr>
		<td><a href="https://pub.mdplus.kr/ncsoft2_ver2/index.php?m=movie4.mp4" target="_blank">movie4.mp4 영상확인</a></td>
	  </tr>
	  <tr>
		<td><a href="https://pub.mdplus.kr/ncsoft2_ver2/index.php?m=movie5.mp4" target="_blank">movie5.mp4 영상확인</a></td>
	  </tr>
	  <tr>
		<td><a href="https://pub.mdplus.kr/ncsoft2_ver2/index.php?m=movie6.mp4" target="_blank">movie6.mp4 영상확인</a></td>
	  </tr>
	  <tr>
		<td><a href="https://pub.mdplus.kr/ncsoft2_ver2/index.php?m=movie7.mp4" target="_blank">movie7.mp4 영상확인</a></td>
	  </tr>
	</table>
	<br />
	<table border="1" cellspacing="1" cellpadding="1" bgcolor="#efefef">
	  <tr>
		<th width="300">링크</th>
	  </tr>
	  <? for($i=0; $i<$RtnRsCount; $i++){ 
		$movie			= $RtnArray[0][$i];
	  ?>
		  <tr>
			<td><a href="https://pub.mdplus.kr/ncsoft2_ver2/index.php?m=<?=$movie?>" target="_blank"><?=$movie?> 영상확인</a></td>
		  </tr>
	  <? } ?>

	</table>
	<iframe name="ifrMovie" style="width:1000px;height:500px;display:none"></iframe>
</body>
</html>