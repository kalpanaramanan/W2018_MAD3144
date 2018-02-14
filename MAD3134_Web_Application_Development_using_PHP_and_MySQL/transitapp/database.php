 <?php
		$dbHost = 'localhost';
		$dbUser = 'root';
		$dbPass = '';
		$dbName = 'transit';
		
		$connection = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
		
		if(mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			exit();	
		}
    ?>