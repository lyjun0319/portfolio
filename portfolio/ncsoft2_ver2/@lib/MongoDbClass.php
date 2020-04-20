<?
/* 한글처리 */
include_once "MongoDbSet.php";

class MongoDbClass {
	var $mongoConnect;
	var $errorMessage;
	var $errorCode;
	var $errorBool = false;


	function MongoDbClass()
	{
		global $setMongoDbConnect;

		try 
		{
			$this->mongoConnect = new MongoClient( $setMongoDbConnect );
		}
		catch (MongoException $e)
		{
			$this->errorMessage = $e->getMessage();
			$this->errorCode	= $e->getCode();
			$this->errorBool	= true;
		}
	}
	

	function InsertData($array, $db, $model )
	{
		$document = $array;
		$mongoDbCollect = $this->mongoConnect->$db->$model;
		
		try
		{
			$mongoDbCollect->insert($document);
			$this->errorBool	= false;

			return $mongoDbCollect->count();
		}
		catch (MongoException $e)
		{
			$this->errorMessage = $e->getMessage();
			$this->errorCode	= $e->getCode();
			$this->errorBool	= true;

			return 0;
		}		
	}


	function getError()
	{
		return $this->errorBool;
	}

	function getErrorInfo()
	{
		return $this->errorMessage."|".$this->errorCode;
	}
}

?>