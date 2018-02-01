<?php

// This guide demonstrates the five fundamental steps
// of database interaction using PHP.

// Credentials
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "mad3142_db";

// 1. Create a database connection
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// 2. Perform database query
$query = "SELECT id, first_name, last_name FROM employees";
$results = mysqli_query($connection,$query);
//print_r($results);

// 3. Use returned data (if any)
/*$totalRows = mysqli_num_rows($results);
for($i=0;$i<$totalRows;$i++){
	$employee = mysqli_fetch_assoc($results);
	//print_r($employee);
	//echo "<br>";
	echo  " ID :". $employee["id"];
	echo  " First Name :". $employee["first_name"];
	echo  " Last Name :". $employee["last_name"];
	echo "<br>";
}*/


while ($employee = mysqli_fetch_assoc($results)){
	echo  " ID :". $employee["id"];
	echo  " First Name :". $employee["first_name"];
	echo  " Last Name :". $employee["last_name"];
	echo "<br>";
}

// 4. Release returned data


// 5. Close database connection
mysqli_close($connection);

?>
