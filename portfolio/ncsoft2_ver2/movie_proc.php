<?include_once $_SERVER[DOCUMENT_ROOT]."/ncsoft2_ver2/@include/config.php";?>
<?php


$C_DB	= new DBClass;


	$targetFolder = '/ncsoft2_ver2/video'; // Relative to the root


	if (!empty( $_FILES['fMovie'] ))
	{


		$tempFile    = $_FILES['fMovie']['tmp_name'];
		$EXT_TMP	 = explode( ".", $_FILES['fMovie']['name']);
		
		mt_srand((double)microtime()*1000000);
		$tmpName  =chr(mt_rand(65, 90));
		$tmpName .=time();
		$tmpName .=rand(1000,9999);

		$targetPath  = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;



		$targetFile  = rtrim($targetPath,'/') . '/' . $tmpName.'.'.$EXT_TMP[count($EXT_TMP)-1];
		
		$fileTypes  = array('gif', 'jpg', 'png', 'mp4'); // File extensions
		$imageTypes = array('jpg','jpeg','gif','png', 'JPG', 'JPEG', 'GIF', 'PNG'); // image 
		$docTypes   = array('mp4'); // image 

		$fileParts  = pathinfo($_FILES['fMovie']['name']);
		
		if (in_array( strtolower($fileParts['extension']) , $fileTypes))
		{
			move_uploaded_file($tempFile,$targetFile);

			
			if (in_array( strtolower($fileParts['extension']) , $imageTypes)) 
			{
				$imageFileCheck = "image";
			}
			else if (in_array(  strtolower($fileParts['extension']) , $docTypes)) 
			{
				$imageFileCheck = "movie";
			}
			else
			{
				$imageFileCheck = "file";
			}
			
			$fileName = $tmpName.'.'.$EXT_TMP[count($EXT_TMP)-1];
			$PocSql = "INSERT INTO  tbl_movie (mv_movie) VALUES ('".$fileName."')";
	
			$rtnvalue = $C_DB->exec( $PocSql );
		}
	}
	
	bootAlertPreload("업로드 되었습니다.");



?>