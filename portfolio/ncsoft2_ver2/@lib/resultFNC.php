<?
/* 한글처리 */
function XMLValue( $resultType, $resultValue )
{
	header("Content-Type: text/xml; charset=UTF-8");
	header("Pragma:no-cache");
	header("cache-control:no_cache");
	header("Expires:-1");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n";
	echo  "<xml>\r\n";
	echo  "<row value=\"". $resultType ."\" ><![CDATA[" .$resultValue . "]]></row>\r\n";
	echo  "</xml>\r\n";

}

function XMLValueURL( $resultType, $resultValue, $resultURL )
{
	header("Content-Type: text/xml; charset=UTF-8");
	header("Pragma:no-cache");
	header("cache-control:no_cache");
	header("Expires:-1");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n";
	echo  "<xml>\r\n";
	echo "<row value=\"".$resultType."\" resultmsg=\"" . $resultValue. "\"><![CDATA[".$resultURL."]]></row>\r\n";
	echo  "</xml>\r\n";
}
?>