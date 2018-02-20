
<?php

// 0. Tell PHP you are going to return a JSON
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


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
	  

// show an error message if PHP cannot connect to the database
if (!$connection)
{
  $output = array("error" => "Failed to connect to MySQL: " . mysqli_connect_error());
  echo json_encode($output);
  exit();
}

// 2. Perform database query
$sql = "SELECT `id`, `from`, `to`, `timings`, `status`, `saturday`, `notes` FROM routes";

$results = mysqli_query($connection, $sql);
if ($results == FALSE) {
  $output = array("error" => "Database quer failed. SQL command: " . $sql);
  echo json_encode($output);
  exit();
}

$routes = [];


while ($row = mysqli_fetch_assoc($results)) {
  $item = array(
    "id" => $row["id"],
    "from" => $row["from"],
    "to" => $row["to"],
	"timings" => $row["timings"],
    "status" => $row["status"],
    "saturday" => $row["saturday"],
	"notes" => $row["notes"]
  );
  array_push($routes, $item);
}

$myfile = fopen("jsonFile.txt", "w") or die("Unable to open file!");
echo json_encode($routes,JSON_PRETTY_PRINT);
fwrite($myfile, json_encode($routes,JSON_PRETTY_PRINT));
fclose($myfile);
?>
