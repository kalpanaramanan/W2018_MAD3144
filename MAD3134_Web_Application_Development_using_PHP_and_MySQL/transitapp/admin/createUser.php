<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST') {

	print_r($_POST);

	  $username = $_POST['username'];
	  $password = $_POST['password'];
	  $role = $_POST['role'];
	
		
	  $dbhost = "localhost";
	  $dbuser = "root";
	  $dbpass = "";
	  $dbname = "transit";

	  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	  if (mysqli_connect_errno())
	  {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	  }
	  $sql =  "INSERT INTO login";
	  $sql .= " (`username`, `password`, `role_id`)";
	  $sql .= " VALUES (";
	  $sql .= "'" . $username . "',";
	  $sql .= "'" . $password . "',";
	  $sql .=  $role ;
	  $sql .=")";

	  $result = mysqli_query($connection, $sql);

	  if ($result == TRUE) {
		$new_id = mysqli_insert_id($connection);
		 header("Location: " . "index.php");
	  
		exit();
	  }
	  else {
		echo "INSERT failed. <br/>";
		echo "SQL command: " . $sql;


		echo mysqli_error($connection);
		mysqli_close($connection);

		exit();
	  }

	  mysqli_free_result($results);

	} else {
		header("Location: " . "index.php");
		exit();
	}
?>