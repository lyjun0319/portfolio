<?
/* 한글처리 */
include_once "DBConstant.php";
class DBClass {
	var $mConnect;
	var $mXML;
	var $mRs;
	var $mProcCount;
	var $db_host, $db_name, $db_user, $db_pwd;

	function DBClass() {
		global $SetDBConnect;
		$this->db_host		= $SetDBConnect['Host'];
		$this->db_name		= $SetDBConnect['DB'];
		$this->db_user		= $SetDBConnect['Id'];
		$this->db_pwd		= $SetDBConnect['Pw'];

		$this->mConnect = @mysql_connect( $this->db_host, $this->db_user, $this->db_pwd, true) or die(mysql_error());
		@mysql_select_db( $this->db_name, $this->mConnect);
		@mysql_query('set names utf8');
	}

	function result ( $sql ) {
		$sql				= trim( $sql );
		$result				= @mysql_query( $sql, $this->mConnect ) or die(mysql_error($this->mConnect));
		return $result;
	}

	function select ( $table, $where, $field = "*" ) {
		$sql				= "Select $field from $table $where";
		$result				= $this->result( $sql );
		$this->mProcCount	= mysql_num_rows($result);
		return $result;
	}

	function object ( $table, $where, $field = "*" ) {
		$sql				= "Select $field from $table $where";
		$result				= $this->result( $sql );
		$this->mProcCount	= mysql_num_rows($result);
		$row				= @mysql_fetch_object($result);
		return $row;
	}

	function row ( $table, $where, $field = "*" ) {
		$sql				= "Select $field from $table $where";
		$result				= $this->result( $sql );
		$this->mProcCount	= mysql_num_rows($result);
		$row				= @mysql_fetch_row($result);
		return $row;
	}

	function sum ( $table, $where, $field = "*" ) {
		$sql				= "Select sum($field) from $table $where";
		$result				= $this->result( $sql );
		$row				=  @mysql_fetch_row($result);
		if( $row[0] ) { return $row[0]; } else { return 0;}
	}

	function cnt ( $table, $where, $field = "idx" ) {
		$sql				= "Select count($field) from $table $where";
		$result				= $this->result( $sql );
		$row				=  @mysql_fetch_row($result);
		if( $row[0] ) { return $row[0]; } else { return 0;}
	}

	function max_ ( $table, $where, $field = "idx" ) {
		$sql				= "Select max($field) from $table $where";
		$result				= $this->result( $sql );
		$row				=  @mysql_fetch_row($result);
		if( $row[0] ) { return $row[0]; } else { return 0;}
	}

	function min_ ( $table, $where, $field = "idx" ) {
		$sql				= "Select min($field) from $table $where";
		$result				= $this->result( $sql );
		$row				=  @mysql_fetch_row($result);
		if( $row[0] ) { return $row[0]; } else { return 0;}
	}

	function insert ( $table, $data ) {
		$sql				= "insert into $table set $data";
		if($this->result( $sql )) {
			$this->mProcCount = mysql_affected_rows();
			return true;
		} else {
			return false;
		}
	}

	function update ( $table, $data ) {
		$sql				= "update $table set $data";
		if($this->result( $sql )) {
			$this->mProcCount = mysql_affected_rows();
			return true;
		} else {
			return false;
		}
	}
	
	function delete ( $table, $data ) {
		$sql				= "delete from $table $data";

		if($this->result( $sql )) {
			$this->mProcCount = mysql_affected_rows();
			return true;
		} else {
			return false;
		}
	}

	function stripSlash ( $str ) {
		$str				= trim( $str );
		$str				= stripslashes( $str );
		return $str;
	}

	function addSlash ( $str ) {
		$str				= trim( $str );
		$str				= addslashes( $str );
		if(empty( $str )) {
			$str			= "NULL";
		}
		return $str;
	}

	function addSlash_chk ( $str ) {
		$str				= trim( $str );
		$str				= stripslashes( $str );
		$str				= addslashes( $str );
		$str				= mysql_real_escape_string( $str );
		return $str;
	}

	function stripSlash_chk ( $str ) {
		$str				= trim( $str );
		$str				= stripslashes( $str );
		$str				= mysql_real_escape_string( $str );
		return $str;
	}

	function getError() {
		return mysql_errno($this->mConnect) . " : " . mysql_error($this->mConnect);
	}

	function setXML($sXML) {
		$this->mXML = $sXML;
	}

	function nonExecuteQuery($sQuery) {
		$sQuery				= trim( $sQuery );
		$result				= $this->result( $sQuery );
		return $result;
	}

	function getCount() {
		return $this->mProcCount;
	}

	function close() {
		mysql_close($this->mConnect);
	}

	function Exec( $sql ) {
		$sql				= trim( $sql );
		$result				= $this->result( $sql );
		
		/*
		$qry = explode(" ", $sql);

		if(strtolower($qry[0]) == "select") {
			$cnt = mysql_num_rows($result);
		} else {
			$cnt = mysql_affected_rows();
		}
		*/

		return true;
	}

	function GetLow($sql, &$cnt) {
		$sql				= trim( $sql );
		$rs					= $this->result( $sql );
		$cnt				= mysql_num_rows($rs);
		$fields				= mysql_num_fields($rs);

		$i = 0;
		while($row = mysql_fetch_row($rs)) {
			for ($j=0; $j < $fields; $j++) {
				$return[$j][$i] = $row[$j];
			}
			$i++;
		}
		return $return;
	}

	function GetString($sql, &$cnt) {
		$sql				= trim( $sql );
		$rs					= $this->result( $sql );
		$cnt				= mysql_num_rows($rs);
		$fields				= mysql_num_fields($rs);

		$i = 0;
		while($row = mysql_fetch_row($rs)) {
			for ($j=0; $j < $fields; $j++) {
				if($j == $fields-1) {
					$return .= $row[$j]."\n";
				} else {
					$return .= $row[$j]."	";
				}
				
			}
			$i++;
		}
		return nl2br($return);
	}

	function CheckForErrors() {
		echo mysql_errno($this->mConnect) . " : " . mysql_error($this->mConnect) . "\n";
	}
	
	function Begin() {
		$sql				= "begin";
		$result				= $this->result( $sql );
	}

	function back() {
		$sql				= "rollback";
		$result				= $this->result( $sql );
	}

	function Commit() {
		$sql				= "commit";
		$result				= $this->result( $sql );
	}
	
	function __destruct() {
		mysql_close($this->mConnect);
	}

	function GetStr($str,$strName,$strValue) {

		if($str == "" or is_null($str)) {
			$str = "";
		} else {
			$str = $str."&";
		}
		return $str.$strName."=".$strValue;
	}

	function quota($sql) {
		if($sql != "") {
			$quota =  str_replace("'", "''", $sql);
		} else {
			$quota = "";
		}
		return $quota;
	}

	function last_insert_id(){
		return mysql_insert_id( $this->mConnect );
	}

}
?>