
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
   
   // Takes ID of user info you want to change, the name of the column you want to change in infosheet table, 
   // as well as the value you'd like to change it to, then makes those changes
   public function update_registration($ID, $to_change, $new_value)
   {
   		try {
   		$this->dbh->query("UPDATE `infosheet` SET `$to_change` = " ."\"".$new_value."\" WHERE `ID` = $ID" );
   		}
   		catch (PDOexception $e){
   			if ($e ->errorInfo[1] == 1054) {
   				echo $column. "is not a valid column!"; //if column name does not exist, returns specific error
   			}
   			else {
   				echo $e; //otherwise, echoes error message
   			}
   		}  		
   }

   public function get_all_registrations() {
      $query = "SELECT * FROM `infosheet`";
      $data = $this->dbh->query($query);
      return $data->fetchAll();
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
private function read(){
      $a = $this->dbh->query("SELECT * FROM `infosheet`");
      foreach ($a as $b){
         for($i = 0; $i < count($b); $i += 1){
            echo $b[$i] . " ";
         }
         echo "\n";
      }
   }

   
   public function delete_user($username)
   {
      try{
         $this->dbh->query(" DELETE FROM `user` WHERE `username`='".$username."' ");
      } catch (PDOException $e){
         echo $e;
      }
   }
   
   public function change_email($username, $new_email)
   {
      $this->dbh->query(
      "UPDATE `user` SET `email`='".$new_email."' 
         WHERE `username`='".$username."' 
      ");
   }
   
   /* reads evrything from the database, and prints it*/
   public function read_db($db){
      $a = $this->dbh->query("SELECT * FROM `".$db."` ");
      foreach ($a as $b){
         for($i = 0; $i < count($b); $i += 1){
            echo $b[$i] . " ";
         }
         echo "\n";
      }
   }
   
   /*change a specific column for a given row by their username
   Do not include the `` characters when inputting data*/
   public function change_user_column($column, $new_data, $username)
   {
      try{
         $this->dbh->query(
         "UPDATE `user` SET `".$column."`='".$new_data."'
            WHERE `username` = '".$username."' 
         "); 
      } catch (PDOexception $e){
         if ($e ->errorInfo[1] == 1054)
            echo $column." is not a valid column"."\n";
         else
            echo $e;
      }
   }
}

?>


