<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST') {

	print_r($_POST);

	  $from = $_POST['from'];
	  $to = $_POST['to'];
	  $hour = $_POST['hour'];
	  $mintues = $_POST['mintues'];
	  $time = $_POST['time'];
	  $status = $_POST['status'];
	  $timings = $hour.':'.$mintues.' '.$time;
	 
	
	  if(isset($_POST['saturday'])){ 
		$saturday = 1;
	  }else{
		  $saturday = 0;
		}
		
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
	  $sql =  "INSERT INTO routes";
	  $sql .= " (`from`, `to`, `timings`,`status`,saturday)";
	  $sql .= " VALUES (";
	  $sql .=  $from . ",";
	  $sql .=  $to . ",";
	  $sql .= "'" . $timings . "',";
	  $sql .=  $status . ",";
	  $sql .=  $saturday ;
	  $sql .=")";

	  $result = mysqli_query($connection, $sql);

	  if ($result == TRUE) {
		$new_id = mysqli_insert_id($connection);
		//header("Location: " . "show.php?id=".$new_id);
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
		header("Location: " . "addNewRoutes.php");
		exit();
	}
?>
