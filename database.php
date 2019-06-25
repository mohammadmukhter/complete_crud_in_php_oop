<?php

class Database{

	private $host_name=SERVER_NAME;
	private $user_name=USER_NAME;
	private $password=PASSWORD;
	private $database_name=DB_NAME;

	public $connection;


	public function __construct()
	{
		$this->connect();
	}

	private function connect()
	{
		$this->connection=new mysqli($this->host_name,$this->user_name,$this->password,$this->database_name);
		if(!$this->connection)
		{
			echo 'database is not connected';
		}
	
	
	}

	public function insert($table,$value)
	{
		$insert_query="INSERT INTO $table SET $value";
		$inserted=$this->connection->query($insert_query) or die ("Error".__LINE__);

		if($inserted)
		{
			return $inserted;
		}
		else
		{
			return false;
		}
	}

	public function select($table)
	{
		$select_query="SELECT * FROM $table";
		$selected=$this->connection->query($select_query) or die ("Error".__LINE__);
		if($selected)
		{
			return $selected;
		}
	}


	public function delete($table,$condition)
	{
		$delete_query="DELETE FROM $table WHERE $condition";
		$deleted=$this->connection->query($delete_query) or die ("Error".__LINE__);
		if($deleted)
		{
			return $deleted;
		}
		else
		{
			return false;
		}

	}

	public function first($table,$condition)
	{
		$first_select_query="SELECT * FROM $table WHERE $condition";
		$first_selected=$this->connection->query($first_select_query) or die ("Error".__LINE__);
		if($first_selected)
		{
			return $first_selected;
		}
	}

	public function update($table,$value,$condition)
	{
		$update_query="UPDATE $table SET $value WHERE $condition";

		$updated=$this->connection->query($update_query) or die ("Error".__LINE__);
		if($updated)
		{
			return $updated;
		}
		else
		{
			return false;
		}
	}
}


?>