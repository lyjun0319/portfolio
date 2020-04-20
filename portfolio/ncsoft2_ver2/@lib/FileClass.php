<?
/* 한글처리 */
class FileClass {

	var $mfileSize = 0;
	var $mfileMaxSize = 10;
	var $mfileQuota = array("bmp", "gif", "jpg", "jpeg", "png");
	var $mfileExtension;
	var $mfileName;
	var $mfileOrgName;
	var $mfilePath;
	var $mXML;
	var $mrData;

	var $mTempName;

	function setXML() {
	}

	function setRData() {
	}

	function getRData() {
	}

	function SaveFile($sFile, $sFilePath) {

		// 저장시 파일명 생성
		mt_srand((double)microtime()*1000000);
		$tmpName=chr(mt_rand(65, 90));
		$tmpName.=time();
		$tmpName.=rand(1000,9999);

		$this->mTempName = $tmpName;

		$sFilePath = str_replace("../", "", $sFilePath);
		$sFilePath = str_replace("./", "", $sFilePath);

		$this->mfilePath = $_SERVER[DOCUMENT_ROOT].$sFilePath;

		$temp_i=0;

		if( $sFile[size] > 0 ) {
			if( $EXT_TMP = explode( ".", $sFile[name])) {
				$this->mfileExtension = $EXT_TMP[count($EXT_TMP)-1];
				foreach ($this->mfileQuota as $value) {
					if( strstr( $value, strtolower($EXT_TMP[count($EXT_TMP)-1]))) {
						$temp_i++;
					} 
				}
				if($temp_i<1){
					return "업로드 불가능 확장자입니다.";
					exit;
				}
			}
			if( $sFile[size]  > 1024*1024*$this->mfileMaxSize) {
				return "업로드 용량 초과입니다\\n\\n".$this->mfileMaxSize."메가까지 업로드 가능합니다";
				exit;
			}
			$this->mfileName	= $this->mTempName.".".$EXT_TMP[count($EXT_TMP)-1];
			$this->mfileOrgName = $sFile[name];

			if( !@move_uploaded_file($sFile[tmp_name], $this->mfilePath.$this->mfileName) ) {
				return "파일 업로드 에러";
				exit;
			} else {
				$this->mfileSize = $sFile[size];
				@unlink($sFile[tmp_name]);
			}
			return true;
		}

	}

	function setFileMaxSize($sFileSize) {
		if($sFileSize > 0) {
			$this->mfileMaxSize = $sFileSize;
		}
	}

	function setFileQuota($aFileQuota) {
		if($aFileQuota != null and $aFileQuota != "") {
			$this->mfileQuota = $aFileQuota;
		}
	}

	function getSaveFileName() {
		return $this->mfileName;
	}

	function GetFileName() {
		return $this->mfileOrgName;
	}

	function getSaveFilePath() {
		return $this->mfilePath;
	}

	function getFileQuota() {
		return $this->mfileExtension;
	}

	function FileDelete($sFileName) {
		$sFileName = str_replace("../", "", $sFileName);
		$sFileName = str_replace("./", "", $sFileName);
		if(unlink($_SERVER[DOCUMENT_ROOT].$sFileName)) {
			return true;
		} else {
			return false;
		}
	}
	function FolderDelete($sFileFolder) {
		$sFileFolder = str_replace("../", "", $sFileFolder);
		$sFileFolder = str_replace("./", "", $sFileFolder);
		$sFileFolder = $_SERVER[DOCUMENT_ROOT].$sFileFolder;
		if (is_dir($sFileFolder)) {
			$objects = scandir($sFileFolder);
			foreach ($objects as $object) {
				
				if ($object != "." && $object != "..") {
					if (filetype($sFileFolder."/".$object) == "dir") {
						$tmp_path = str_replace($_SERVER[DOCUMENT_ROOT], "", $sFileFolder);
						$this->setRemoveFolder($tmp_path."/".$object);
					} else {
						unlink($sFileFolder."/".$object);
					}
				}
			}
			reset($objects);
			rmdir($sFileFolder);
		}
		return true;
	}


	function FolderCreate($sFileFolder) {
		$tmp = explode("/", $sFileFolder);
		$tmp_path = $_SERVER[DOCUMENT_ROOT];
		for($i=0; $i<count($tmp); $i++) {
			if($tmp[$i] != "") {
				if(is_dir($tmp_path."/".$tmp[$i])) {
					$tmp_path = $tmp_path."/".$tmp[$i];
				} else {
					echo $tmp[$i]."<br>";
					mkdir($tmp_path."/".$tmp[$i]);
					$tmp_path = $tmp_path."/".$tmp[$i];
				}
			}
		}
		return true;
	}

	function FileMove($sFileName, $sFilePath) {
		$sFileName = str_replace("../", "", $sFileName);
		$sFileName = str_replace("./", "", $sFileName);
		$sFileName = $_SERVER[DOCUMENT_ROOT].$sFileName;

		
		$sFilePath = str_replace("../", "", $sFilePath);
		$sFilePath = str_replace("./", "", $sFilePath);
		$sFilePath = $_SERVER[DOCUMENT_ROOT].$sFilePath;

		if( !@move_uploaded_file($sFileName, $sFilePath) ) {
			return "파일 이동 에러";
		} else {
			@unlink($sFileName);
		}
		return true;
	}

	function setCopyFile($sFileName, $sFilePath) {
		$sFileName = str_replace("../", "", $sFileName);
		$sFileName = str_replace("./", "", $sFileName);
		$sFileName = $_SERVER[DOCUMENT_ROOT].$sFileName;

		
		$sFilePath = str_replace("../", "", $sFilePath);
		$sFilePath = str_replace("./", "", $sFilePath);
		$sFilePath = $_SERVER[DOCUMENT_ROOT].$sFilePath;

		if( !@move_uploaded_file($sFileName, $sFilePath) ) {
			return "파일 복사 에러";
		}
		return true;
	}

	function setNailFile($sFileName, $sFileSaveName) {
	}



	function ImageNail($file, $save_filename, $save_path, $max_width, $max_height) {
		$bcor = 255;
		$ratio=$max_width/$max_height;
		$img_info = getImageSize($file);
		if($img_info[2] == 1) {
			$src_img = ImageCreateFromGif($file);
		} else if($img_info[2] == 2) {
			$src_img = ImageCreateFromJPEG($file);
		} else if($img_info[2] == 3) {
			$src_img = ImageCreateFromPNG($file);
		} else {
			return 0;
		}
		$img_width = $img_info[0];
		$img_height = $img_info[1];

		if($img_width > $max_width || $img_height > $max_height) {
			if($img_width == ceil($img_height*$ratio)) {
				$dst_width = $max_width;
				$dst_height = $max_height;
			} else if($img_width > ceil($img_height*$ratio)) {
				$dst_width = $max_width;
				$dst_height = ceil(($max_width / $img_width) * $img_height);
			} else {
				$dst_height = $max_height;
				$dst_width = ceil(($max_height / $img_height) * $img_width);
			}
		} else {
			$dst_width = $img_width;
			$dst_height = $img_height;
		}
		if($dst_width < $max_width) $srcx = ceil(($max_width - $dst_width)/2); else $srcx = 0;
		if($dst_height < $max_height) $srcy = ceil(($max_height - $dst_height)/2); else $srcy = 0;

		if($img_info[2] == 1) {
			$dst_img = imagecreate($max_width, $max_height);
		} else {
			$dst_img = imagecreatetruecolor($max_width, $max_height);
		}

		$bgc = ImageColorAllocate($dst_img, $bcor, $bcor, $bcor);
		ImageFilledRectangle($dst_img, 0, 0, $max_width, $max_height, $bgc); 
		ImageCopyResampled($dst_img, $src_img, $srcx, $srcy, 0, 0, $dst_width, $dst_height, ImageSX($src_img),ImageSY($src_img));

		if($img_info[2] == 1) {
			ImageInterlace($dst_img);
			ImageGif($dst_img, $save_path.$save_filename);
		} else if($img_info[2] == 2) {
			ImageInterlace($dst_img);
			ImageJPEG($dst_img, $save_path.$save_filename);
		} else if($img_info[2] == 3) {
			ImagePNG($dst_img, $save_path.$save_filename);
		}
		ImageDestroy($dst_img);
		ImageDestroy($src_img);

		return true;
	}

	function ImageNail2($file, $save_filename, $save_path, $max_width, $max_height) {
		$bcor = 255;
		$ratio=$max_width/$max_height;
		$img_info = getImageSize($file);
		if($img_info[2] == 1) {
			$src_img = ImageCreateFromGif($file);
		} else if($img_info[2] == 2) {
			$src_img = ImageCreateFromJPEG($file);
		} else if($img_info[2] == 3) {
			$src_img = ImageCreateFromPNG($file);
		} else {
			return 0;
		}
		$img_width = $img_info[0];
		$img_height = $img_info[1];

		$dst_width = $max_width;
		$dst_height = $max_height;

		if($dst_width < $max_width) $srcx = ceil(($max_width - $dst_width)/2); else $srcx = 0;
		if($dst_height < $max_height) $srcy = ceil(($max_height - $dst_height)/2); else $srcy = 0;

		if($img_info[2] == 1) {
			$dst_img = imagecreate($max_width, $max_height);
		} else {
			$dst_img = imagecreatetruecolor($max_width, $max_height);
		}

		$bgc = ImageColorAllocate($dst_img, $bcor, $bcor, $bcor);
		ImageFilledRectangle($dst_img, 0, 0, $max_width, $max_height, $bgc); 
		ImageCopyResampled($dst_img, $src_img, $srcx, $srcy, 0, 0, $dst_width, $dst_height, ImageSX($src_img),ImageSY($src_img));

		if($img_info[2] == 1) {
			ImageInterlace($dst_img);
			ImageGif($dst_img, $save_path.$save_filename);
		} else if($img_info[2] == 2) {
			ImageInterlace($dst_img);
			ImageJPEG($dst_img, $save_path.$save_filename);
		} else if($img_info[2] == 3) {
			ImagePNG($dst_img, $save_path.$save_filename);
		}
		ImageDestroy($dst_img);
		ImageDestroy($src_img);

		return true;
	}

	function GetFileSize() {
		return $this->mfileSize;
	}

	function __destruct() {
		//소멸자
	}

	function ImageSize(&$Width, &$Hieght, $file) {
		if(is_file($file)) {
			$img_info = getImageSize($file);
			$Width = $img_info[0];
			$Hieght = $img_info[1];
		}
	}

	function GetFilePath( $BoType )	 {
		$oBoName = Array();
		$oBoName["store"] = "/@uploads/store/"; // EMAIL
		$oBoName["etc"]   = "/@upload/etc/"; // EMAIL
		return $oBoName[$BoType];
	}
}
?>