<?
/* 한글처리 */
include_once($_SERVER[DOCUMENT_ROOT]."/@include/config.php");

$newName = Srequest($_REQUEST["newName"]);
$orgName = Srequest($_REQUEST["orgName"]);
//$orgName = iconv("utf-8", "euc-kr", $orgName);

$file = $_SERVER[DOCUMENT_ROOT].$newName;

//First, see if the file exists
if (!is_file($file)) { die("<b>파일을 찾을 수 없습니다.</b>"); }

$len = filesize($file);
$filename = basename($file);
$file_extension = strtolower(substr(strrchr($filename,"."),1));

switch( $file_extension ) {
	case "pdf": $ctype="application/pdf"; break;
	case "exe": $ctype="application/octet-stream"; break;
	case "zip": $ctype="application/zip"; break;
	case "doc": 
	case "docc": $ctype="application/msword"; break;
	case "xls": 
	case "xlsx": $ctype="application/vnd.ms-excel"; break;
	case "ppt": 
	case "pptx": $ctype="application/vnd.ms-powerpoint"; break;
	case "gif": $ctype="image/gif"; break;
	case "png": $ctype="image/png"; break;
	case "jpeg":
	case "jpg": $ctype="image/jpg"; break;
	case "mp3": $ctype="audio/mpeg"; break;
	case "wav": $ctype="audio/x-wav"; break;
	case "mpeg":
	case "mpg":
	case "mpe": $ctype="video/mpeg"; break;
	case "mov": $ctype="video/quicktime"; break;
	case "avi": $ctype="video/x-msvideo"; break;

	//The following are for extensions that shouldn't be downloaded (sensitive stuff, like php files)
	case "php":
	case "jsp":
	case "asp":
	case "aspx":
	case "htm":
	case "html":
	case "txt": die("<b>Cannot be used for ". $file_extension ." files!</b>"); break;

	default: $ctype="application/force-download";
}

//Begin writing headers
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: public"); 
header("Content-Descript-xion: File Transfer");

//Use the switch-generated Content-Type
header("Content-Type: $ctype");

//Force the download
$header="Content-Disposition: attachment; filename=".$orgName.";";
header($header );
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".$len);
@readfile($file);
exit;


?>