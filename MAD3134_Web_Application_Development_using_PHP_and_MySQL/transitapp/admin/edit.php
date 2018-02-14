<?php
if (isset($_GET["id"]) == FALSE) {
  // missing an id parameters, so
  // redirect person back to add employee page
  header("Location: " . "index.php");
  exit();
}

$id = $_GET["id"];
$pickup = $_GET["pickup"];
$dropup = $_GET["dropup"];
$timings = $_GET["timings"];
$status1 = $_GET["status"];

$str = explode(":",$timings);
$str1 = explode(" ",$str[1]);


// get the item from the database, just like show
// do the SQL
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

 $sql = "SELECT r.id as id,fl.name as pickup,tl.name as dropup, r.timings as timings,s.name as status,r.saturday as saturday
				FROM `routes` as r
				INNER JOIN city as fl on fl.id = r.from
				INNER JOIN city as tl on tl.id = r.to
				INNER JOIN `status` as s on s.id = r.status WHERE r.id=" . $id ;

$results = mysqli_query($connection, $sql);


if ($results == FALSE) {
  echo "Database query failed. <br/>";
  echo "SQL command: " . $sql;
  exit();
}

// it's different! you only need to get 1 person, so no loop!
$routes = mysqli_fetch_assoc($results);


// check for a POST request

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

//print_r($routes);
  // get items from DATABASE
  
  
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

  $cityQuery = "SELECT * FROM city order by name asc ";
  $statusSQL = "SELECT * FROM status order by name asc ";

  $fromResults = mysqli_query($connection, $cityQuery);
  $toResults = mysqli_query($connection, $cityQuery);
  $statusResults = mysqli_query($connection, $statusSQL);
  

  
  // check for errors
  if ($fromResults == FALSE || $toResults == FALSE || $statusResults == FALSE) {
	echo "Database query  failed. <br/>";
	echo "SQL command: " . $cityQuery;
	exit();
  }
 
}

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	  
	    
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
  
	  $from = $_POST['from'];
	  $to = $_POST['to'];
	  $hour = $_POST['hour'];
	  $mintues = $_POST['mintues'];
	  $time = $_POST['time'];
	  $statusw = $_POST['status'];
	
	  $timingss = $hour.':'.$mintues.' '.$time;

		 if(isset($_POST['saturday'])){ 
		$saturday = 1;
	  }else{
		  $saturday = 0;
		}
		
		
  $query = "UPDATE routes SET  ";
  $query .= "`from`='" . $from . "', ";
  $query .= "`to`='" . $to . "', ";
  $query .= "timings ='" . $timingss  . "', ";
  $query .= "`status` ='" . $statusw . "', ";
  $query .= "`saturday` ='" . $saturday . "' ";
  $query .= "WHERE id='" .$id . "' ";
  $query .= "LIMIT 1";

  $resultss = mysqli_query($connection, $query);

  // for delete statements, the result is going to be true or false.
  if ($resultss == TRUE) {
    header("Location: " . "index.php");
    exit();
  }
  if ($resultss == FALSE) {
    echo "Database query failed. <br/>";
    echo "SQL command: " . $query;
    exit();
  }
	
  }
  
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../css/spectre.min.css">
    <link rel="stylesheet" href="../css/spectre-exp.min.css">
    <link rel="stylesheet" href="../css/spectre-icons.min.css">
		<style type="text/css">
		header {
			max-width:960px;
			margin:0 auto;
			margin-top:40px;
		}
		footer {
			max-width:960px;
			margin:0 auto;
			margin-top:40px;	
		}
		div.container {
			margin-top:40px;
		}
		h1 {
			font-size:24px;
		}
		h2 {
			font-size:20px;
		}
	</style>
  </head>
  <body>
    <?php include 'header.php'; ?>

    <div class="container">
      <div class = "columns">
        <div class="column col-8 col-mx-auto">
		<a href="../index.php" class="btn" style="float:right;"> Logout </a>
		</div>
		<div class="column col-5 col-mx-auto">
          <form action="" method="POST" class="form-group">
           <table>
					<tr>
						<td><label class="form-label" for="from">Pick Up</label></td>
						<td> 
							<select name="from" style="width:200px;height:40px;">	
								<?php while ($from = mysqli_fetch_assoc($fromResults)) { ?>
									<?php if (trim($from["name"]) == trim($pickup)) { ?>
										<option value=<?php echo $from['id'] ?> selected> <?php echo $from['name'] ?> </option>
									<?php } else {  ?>
										<option value=<?php echo $from['id'] ?>> <?php echo $from['name'] ?> </option>
									<?php } ?>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td><label class="form-label" for="to">Drop Up</label></td>
						<td> 
							<select name="to" style="width:200px;height:40px;">
								<?php while ($to = mysqli_fetch_assoc($toResults)) { ?>
									<?php if ($to["name"] == $dropup) { ?>
										<option value="<?php echo $to['id'] ?>" selected> <?php echo $to['name'] ?> </option>
									<?php } else {  ?>
										<option value="<?php echo $to['id'] ?>"> <?php echo $to['name'] ?> </option>
									<?php } ?>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td><label class="form-label" for="timings">Timings</label></td>
						<td> 
							<select name="hour" style="width:60px;height:40px;">
								<?php for($i=1;$i<=12;$i++){ ?>
										<?php if ($i == $str[0]) { ?>
										<option value=<?php echo $i; ?> selected><?php echo $i; ?></option>
									<?php } else {  ?>
										<option value=<?php echo $i; ?> ><?php echo $i; ?></option>
									<?php } ?>
								<?php } ?>
							</select>	:
							<select name="mintues" style="width:60px;height:40px;">
								<option value = "00">00</option>
								<option value = "05">05</option>
								<?php for($j=10;$j<=55;$j++){ ?>
									<?php if ($j == $str1[0]) { ?>	
									<option value= <?php echo $j; ?> selected><?php echo $j; ?></option>
									<?php } else {  ?>
										<option value= <?php echo $j; ?> ><?php echo $j; ?></option>
									<?php } ?>
								<?php $j +=4;} ?>
							</select>
							<select name="time" style="width:60px;height:40px;">
							<?php if ($str1[1] == "AM") { ?>	
								<option value = "AM" selected>AM</option>
								<option value = "PM">PM</option>
							<?php } else {  ?>
								<option value = "AM">AM</option>
								<option value = "PM" selected>PM</option>
								<?php } ?>
							</select>
						</td>
						<tr>
						<td><label class="form-label" for="status">Current Status</label></td>
						<td> 
							<select name="status" style="width:200px;height:40px;">
								<?php while ($status = mysqli_fetch_assoc($statusResults)) { ?>
									<?php if ($status["name"] == $status1) { ?>
										<option value= <?php echo $status['id']  ?> selected><?php echo $status['name']  ?></option>
										<?php } else {  ?>
										<option value= <?php echo $status['id']  ?> ><?php echo $status['name']  ?></option>
										<?php } ?>
									<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td><label class="form-label" for="saturday"></label></td>
						<?php if ($routes['saturday'] == 1) { ?>	
							<td><input type="checkbox" name="saturday" value="1" checked><span style="font-weight:bold;">*</span> Saturday Available</td>
						<?php } else {  ?>
								<td><input type="checkbox" name="saturday" value="1" ><span style="font-weight:bold;">*</span> Saturday Available</td>
						<?php } ?>
					</tr>
				</table>  
              <input type="submit" class="btn btn-primary" value="Update Route" />
          </form>


        </div> <!--// col-12 -->
      </div> <!-- // column -->
    </div> <!--// container -->

  <?php include 'footer.php'; ?>

    <?php
      // clean up and close database
		mysqli_free_result($fromResults);
		mysqli_free_result($toResults);
		mysqli_free_result($statusResults);
		mysqli_free_result($results);
		mysqli_close($connection);
    ?>

  </body>
</html>
