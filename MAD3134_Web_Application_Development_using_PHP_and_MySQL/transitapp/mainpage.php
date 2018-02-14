<?php

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		//print_r($_POST);
		
		$username = $_POST['username'];
		$password = $_POST['password'];

		$dbHost = 'localhost';
		$dbUser = 'root';
		$dbPass = '';
		$dbName = 'transit';
		
		$connection = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
		
		if(mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			exit();	
		}
		
		$query = "SELECT role_id FROM login WHERE username ='" .$username ."' and password = '".$password ."'";
		
		$results = mysqli_query($connection,$query);
		
		$roles = mysqli_fetch_assoc($results);
		
		//echo $roles['role_id'];
		if ($results == TRUE) {
			
			switch($roles['role_id']){
				case 1:
				{
					header("Location: " . "admin/index.php");
					exit();
					break;
				}
				case 2:
				{
					header("Location: " . "client/index.php");
					exit();
					break;
				}
				default:
				{
					header("Location: " . "../../index.php");
					exit();
				}
			}
			
		}else{
			echo "Database query failed. <br/>";
			  echo "SQL command: " . $query;
			  exit();
		}
		mysqli_free_result($results);
	} else {
		header("Location: " . "../../index.php");
		exit();
	}
	
	
?>