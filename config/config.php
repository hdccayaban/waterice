<?php


class database{
	protected $databaseLink;
	function __construct(){
		include "../config/dbsetting.php";
		$this->host = $dbInfo['host'];
		$this->pg_user = $dbInfo['user'];
		$this->pg_pass = $dbInfo['pass'];
		$this->pg_db = $dbInfo['db'];
		$this->pg_port = $dbInfo['port'];
		$this->openConnection();
		return $this->get_link();
	}
	function openConnection(){
		$this->databaseLink = pg_connect("host=$this->host port=$this->pg_port dbname=$this->pg_db user=$this->pg_user password=$this->pg_pass ")
		or die('Could not connect: ' . pg_last_error());;
	}

	function get_link(){
		return $this->databaseLink;
	}


	function SaveDate($tableName, $insData){
		$this->get_link();
		$columns = implode(", ",array_keys($insData));
		$escaped_values = array_map('pg_escape_string', array_values($insData));
		foreach ($escaped_values as $idx=>$data) $escaped_values[$idx] = "'".$data."'";
		$values  = implode(", ", $escaped_values);
		$query = "INSERT INTO \"".$tableName."\" (".$columns.") VALUES ($values)";
		//print_r($query);
		$result = pg_query($query)  or die('Query failed: ' . pg_last_error());
		//pg_close($this->get_link());
		return $result;
	}

	function verifyData($data){
		$db = $this->con();
		$result=pg_query("SELECT * FROM `metadata` WHERE `message`='".trim($data)."'")or die(pg_last_error());
		$num = pg_num_rows($result);
		return empty($num) ? true : false;
	}
	


};
?>
