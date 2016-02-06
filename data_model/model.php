<?php

class Database_Reader
{
	private $dbh;

	function __construct() {
		try {
      		$this->dbh = new PDO("mysql:host=kevinzuern.com;dbname=propheis_ablesail", "propheis_able", "Ablesail");
      		$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   		}
   
   		catch(PDOException $e)
   		{	
      		echo "Connection to database failed: " . $e->getMessage();
   		}

	}

	function valid_username($username) {
		$num_user = $this->dbh->query("SELECT * FROM `user` WHERE `username`='".$username."'");
		$result = $num_user->fetch(PDO::FETCH_ASSOC);
		
		if(!$result) {
			return FALSE;
		}
		else {
			return TRUE;
		}
		
	}
}

?>
