
<?php

class Database_Reader
{
	private $dbh;

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
	public function valid_username($username) {
		$num_user = $this->dbh->query("SELECT * FROM `user` WHERE `username`='".$username."'");
		$result = $num_user->fetch(PDO::FETCH_ASSOC);
		
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
}

?>
