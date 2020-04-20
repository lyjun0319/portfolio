<?
/* 한글처리 */

class StringClass {

	var $m_AddItemArray1 = array();
	var $m_AddItemArray2 = array();
	var $m_AddItemArray3 = array();
	var $m_AddItemCount;
	var $m_WhereArray1 = array();
	var $m_WhereArray2 = array();
	var $m_WhereArray3 = array();
	var $m_WhereCount;

	var $InsertColum;
	var $InsertValue;
	var $UpdateValue;
	
	public function __construct() {
		$this->m_AddItemCount = 0;
		$this->m_WhereCount = 0;
    }

	//'----------------------------------------------------------------------------------------
	//' inCol : 컬럼명
	//' invalue : 입력값
	//' ctype : 문자 : C , 숫자 : I
	//'----------------------------------------------------------------------------------------

	public function AddItem($inCol , $invalue , $ctype ) {
		if ((is_null($invalue) or $invalue == "") and $ctype == "I") {
			return;
		}

		if ($ctype == "B") {
			if ($invalue) {
				$invalue = "true";
			} else {
				$invalue = "false";
			}
		}

		$this->m_AddItemCount = $this->m_AddItemCount + 1;

		array_push($this->m_AddItemArray1, $inCol);
		array_push($this->m_AddItemArray2, $invalue);
		array_push($this->m_AddItemArray3, $ctype);
	}

	public Function GetInsert(&$OutColum = "",&$OutValue = "") {

		$OutColum = "";
		$OutValue = "";

		for($GetCount = 0; $GetCount < $this->m_AddItemCount; $GetCount++) {
			if($this->m_AddItemArray1[$GetCount] != "" and $this->m_AddItemArray2[$GetCount] != "") {
				if($GetCount == 0) {
					$GetQuota = "";
				} else {
					$GetQuota = ",";
				}
				$GetCol .= $GetQuota.$this->m_AddItemArray1[$GetCount];

				switch ($this->m_AddItemArray3[$GetCount]) {
					// Boolean, Integer
					case "B":
					case "I":
						$GetVal .= $GetQuota.$this->m_AddItemArray2[$GetCount];
						break;

					// Non Convert Quotation Mark 
					case "NCQ":
						$GetVal .= $GetQuota."'".$this->m_AddItemArray2[$GetCount]."'";
						break;

					// Char
					case "C":
					default:
						$GetVal .= $GetQuota."'".Strquota($this->m_AddItemArray2[$GetCount])."'";
						break;
				}
			}
		}
		$OutColum = $GetCol;
		$OutValue = $GetVal;
		return $this->m_AddItemCount;

	}

	public Function GetUpdate(&$OutValue = "") {
		$OutValue = "";

		for($GetCount = 0; $GetCount < $this->m_AddItemCount; $GetCount++) {
			if($this->m_AddItemArray1[$GetCount] != "" and ($this->m_AddItemArray2[$GetCount] != "" or $this->m_AddItemArray3[$GetCount] != "I")) {
				if($GetCount == 0) {
					$GetQuota = "";
				} else {
					$GetQuota = ",";
				}

				switch ($this->m_AddItemArray3[$GetCount]) {
					// Boolean, Integer
					case "B":
					case "I":
						$OutVal .= $GetQuota.$this->m_AddItemArray1[$GetCount]." = ".$this->m_AddItemArray2[$GetCount];
						break;

					// Non Convert Quotation Mark 
					case "NCQ":
						$OutVal .= $GetQuota.$this->m_AddItemArray1[$GetCount]." = '".$this->m_AddItemArray2[$GetCount]."'";
						break;

					// Char
					case "C":
					default:
						$OutVal .= $GetQuota.$this->m_AddItemArray1[$GetCount]." = '".Strquota($this->m_AddItemArray2[$GetCount])."'";
						break;
				}
			}
		}
		$OutValue = $OutVal;
		return $this->m_AddItemCount;
	}

	public Function GetWhere() {
		$GetQuota = "";
		$OrBy = "";
		for($GetCount = 0; $GetCount < $this->m_AddItemCount; $GetCount++) {
			if(($this->m_AddItemArray1[$GetCount] != "" or $this->m_AddItemArray3[$GetCount] == "ADD") and $this->m_AddItemArray2[$GetCount] != "") {
				if($GetQuota == "") {
					$GetQuota = " where ";
				} else {
					$GetQuota = " and ";
				}

				if($OrBy == "" And $this->m_AddItemArray3[$GetCount] == "ORD") {
					$OrBy = " Order by ";
				}

				switch ($this->m_AddItemArray3[$GetCount]) {
					case "B":
					case "I":
					case "COLUMN":
						$OutVal = $OutVal.$GetQuota.$this->m_AddItemArray1[$GetCount]." = ".$this->m_AddItemArray2[$GetCount];
						break;

					case "L":
						$OutVal = $OutVal.$GetQuota.$this->m_AddItemArray1[$GetCount]." Like '".Strquota($this->m_AddItemArray2[$GetCount])."%' ";
						break;

					case "FL":
						$OutVal = $OutVal.$GetQuota." ".$this->m_AddItemArray1[$GetCount]." Like '%".Strquota($this->m_AddItemArray2[$GetCount])."%' ";
						//$OutVal = $OutVal.$GetQuota.$this->m_AddItemArray1[$GetCount]." Like '%".Strquota($this->m_AddItemArray2[$GetCount])."%' ";
						break;

					case "C":
						$OutVal = $OutVal.$GetQuota.$this->m_AddItemArray1[$GetCount]." = '".Strquota($this->m_AddItemArray2[$GetCount])."'";
						break;

					case "IN":
						$OutVal = $OutVal.$GetQuota.$this->m_AddItemArray1[$GetCount]." in (".$this->m_AddItemArray2[$GetCount].")";
						break;

					case "NOTIN":
						$OutVal = $OutVal.$GetQuota.$this->m_AddItemArray1[$GetCount]." NOT IN (".Strquota($this->m_AddItemArray2[$GetCount]).")";
						break;

					case "NO":
						$OutVal = $OutVal.$GetQuota.$this->m_AddItemArray1[$GetCount]." <> '".Strquota($this->m_AddItemArray2[$GetCount])."'";
						break;

					case "STRD":
						$OutVal = $OutVal.$GetQuota.$this->m_AddItemArray1[$GetCount]." >= '".Strquota($this->m_AddItemArray2[$GetCount])."'";
						break;

					case "LASD":
						$OutVal = $OutVal.$GetQuota.$this->m_AddItemArray1[$GetCount]." <= '".Strquota($this->m_AddItemArray2[$GetCount])."'";
						break;

					case "ADD":
						$OutVal = $OutVal.$GetQuota.$this->m_AddItemArray2[$GetCount];
						break;

					case "LSOI":
						$OutVal = $OutVal.$GetQuota.$this->m_AddItemArray1[$GetCount]." < ".Strquota($this->m_AddItemArray2[$GetCount]);
						break;

					case "RSOI":
						$OutVal = $OutVal.$GetQuota.$this->m_AddItemArray1[$GetCount]." > ".Strquota($this->m_AddItemArray2[$GetCount]);
						break;

					case "ORFL":
						$tempArr = explode("|", $this->m_AddItemArray1[$GetCount]);
						$temp = "(";
						for($i=0 ; $i < count($tempArr) ; $i++){
							$temp = $temp.$tempArr[$i]." LIKE '%".Strquota($this->m_AddItemArray2[$GetCount])."%' OR ";
						}
						$temp = substr($temp, 0 ,strlen($temp)-4);
						$temp = $temp.")";
						$OutVal = $OutVal.$GetQuota.$temp;
						break;

					case "ORC":
						$tempArr = explode("|", $this->m_AddItemArray1[$GetCount]);
						$temp = "(";
						for($i=0 ; $i < count($tempArr) ; $i++){
							$temp = $temp.$tempArr[$i]." = '".Strquota($this->m_AddItemArray2[$GetCount])."' OR ";
						}
						$temp = substr($temp, 0 ,strlen($temp)-4);
						$temp = $temp.")";
						$OutVal = $OutVal.$GetQuota.$temp;
						break;

					default:
						$OutVal = $OutVal.$GetQuota.$this->m_AddItemArray1[$GetCount]." ".$this->m_AddItemArray3[$GetCount]." '".Strquota($this->m_AddItemArray2[$GetCount])."'";
						break;
				}
			}
		}
		return $OutVal;
	}




} // end class


//'----------------------------------------------------------------------------------------
//' 넘겨받은 문자열의 '을 ''로 바꾸고 양쪽에 '을 덧붙여 리턴. 문자열의 길이가 0일경우 NULL을 리턴
//'----------------------------------------------------------------------------------------
function Strquota($sql) {
	if($sql != "") {
		$Strquota =  str_replace("'", "''", $sql);
	} else {
		$Strquota = "";
	}
	return $Strquota;
}
?>