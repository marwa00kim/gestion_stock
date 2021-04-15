<?php
/**
* 
*/
class database
{
	private $con;
	public function connect()
	{
		$localhost = "127.0.0.1";
         $username = "root";
          $password = "";
          $dbname = "gestion de stock";
		$this->con = new mysqli($localhost, $username, $password, $dbname);
		if($this->con){

			return $this->con;
			
		}
		return "database_connection_fail";
	}
}
//$db = new database();
//$db->connect();



?>