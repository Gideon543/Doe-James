<?php
namespace controllers;
	require __DIR__."/../controllers/client_controller.php";
	class Authentication extends ClientController{
		
		//Check if an input email is available
		private function availableEmail($email){
			$results = $this -> displayEmail($email);
			if(empty($results)){
				return true;
			}
			return false;
		}

		//Register user if email is not taken
		public function registerUser($errorCount, $fname, $lname, $pass, $email){
			if($errorCount == 0){
				if($this-> availableEmail($email)){
					$results = $this -> addClient($fname, $lname, $pass, $email);
					header("location: index.php");
				}else{
					echo '<script type ="text/JavaScript">';  
					echo 'alert("Email is already taken. Try again")'; 
					echo '</script>'; 
				}
			}
		}

		//Login user if email and password exists
		public function loginUser($email, $password, &$getClientId){
			$results = $this -> displayEmailPass($email, $password);
			if(empty($results)){
				return false;
			}
			$getClientId = $results[0]["client_id"];
			return true;
		}
	}

?>