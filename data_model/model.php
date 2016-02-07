
<?php

class Database_Reader
{
	private $dbh;

	//connects to database
	function __construct() {
		try {
      		$this->dbh = new PDO("mysql:host=kevinzuern.com;dbname=propheis_ablesail", "propheis_able", "Ablesail") or die("Couldn't connect to the database.");
      		$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   		}
   
   		catch(PDOException $e)
   		{	
      		echo "Connection to database failed: " . $e->getMessage();
   		}

	}
	//takes username as parameter, returns true if the username exists in database and false if it does not
	public function valid_username($username) {
		$num_user = $this->dbh->query("SELECT * FROM `user` WHERE `username`='".$username."'");
		$result = $num_user->fetch();
		
		if(!$result) {
			return FALSE;
		}
		else {
			return TRUE;
		}
		
	}
   public function get_registrations($email) {
      $query = "SELECT * FROM `infosheet` WHERE email = " . "\"".$email . "\"";
      
      $data = $this->dbh->query($query);

      return $data->fetch();
   }
   public function get_registration($ID) {
      $query = "SELECT * FROM `infosheet` WHERE ID = " . "\"".$ID . "\"";
      
      $data = $this->dbh->query($query);

      return $data->fetch();
   }
   


   public function valid_user($username, $pw)
   {
      $users = $this->dbh->query("SELECT `password` FROM `user` 
         WHERE `username`='".$username."'
         AND `password`='".$pw."'
      ");
      
      if (count($users) == 0){
         //No users available
         return FALSE;
      } 
      elseif (count($users) == 1) {
         foreach ($users as $i){
            return $i['password'] == $pw; // double layer of safety
         }
      } else{
         // fatal error
         echo "Database error: too many users with same username";
         return FALSE;
      }
   }

//helper method to read database
public function read(){
      $a = $this->dbh->query("SELECT * FROM `infosheet`");
      foreach ($a as $b){
         for($i = 0; $i < count($b); $i += 1){
            echo $b[$i] . " ";
         }
         echo "\n";
      }
   }
}


?>


