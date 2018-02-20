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
 
    <?php
		session_start();
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

      $query = "SELECT bp.id as id,bp.from as pickup_id,bp.to as dropup_id,fl.name as pickup,tl.name as dropup, bp.timings as timings,bp.total_seats_available , bp.no_of_seats_left
				FROM `bus_passes` as bp
				INNER JOIN city as fl on fl.id = bp.from
				INNER JOIN city as tl on tl.id = bp.to";

      $results = mysqli_query($connection, $query);

      if ($results == FALSE) {
        echo "Database query failed. <br/>";
        echo "SQL command: " . $query;
        exit();
      }
    ?>


<?php include 'header.php'; ?>

    <div class="container">
      <div class = "columns">
        <div class="column col-10 col-mx-auto">
		 <a href="../index.php" class="btn" style="float:right;"> Logout </a>

          <table class="table">
            <tr>
              <th>Select</th>
              <th>Pick up</th>
              <th>Drop Up</th>
              <th>Timings</th>
			  <th>Total No of seats</th>
			  <th>No of Seats Left</th>  	        
            </tr>
            <?php while ($routes = mysqli_fetch_assoc($results)) { ?>
					 <tr> 
						<td><input type="checkbox" value="1" name="selectRoutes"></td>
						<!-- <td><?php echo $routes['id']; ?></td>-->
						<td style="display:none;"><?php echo $routes['pickup_id']; ?></td>
						<td style="display:none;"><?php echo $routes['dropup_id']; ?></td>
						<td><?php echo $routes['pickup']; ?></td>
						<td><?php echo $routes['dropup']; ?></td>
						<td><?php echo $routes['timings']; ?></td>
						<td><?php echo $routes['total_seats_available']; ?></td>
						<td><?php echo $routes['no_of_seats_left']; ?></td>
					</tr>	
            <?php } ?>
          </table><br>
		   <button" id="generateticket"  class="btn"> Generate Ticket  </button>
		   </div> <!--// col-12 -->
      </div> <!-- // column -->
	 
    </div> <!--// container -->
    <?php
      // clean up and close database
      mysqli_free_result($results);
      mysqli_close($connection);
    ?>
<?php include 'footer.php'; ?>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>

	$("#generateticket").on("click", function () {
		
		
		var result = $("tr:has(:checked)")

		if (result.length < 2) {
			alert("Please Select Round trip ");
		} else if (result.length > 2) {
			alert("Please Select Round trip");
		} else {
		console.log(result);
			
		var json = result.map(function () {
			return [$(this).children().slice(1).map(function () {
				return $(this).text().trim()
			}).get()]
		}).get()
		
		var JSONdata = JSON.stringify(json,0,"\t");
		console.log(JSONdata);
		console.log(JSON.stringify(json.length)); // displays length of total array
		console.log(JSON.stringify(json[0].length)); // displays the lenght of each array elements
		
		var session_user = <?php echo  "'".$_SESSION["username"]."'"; ?>;
		console.log("Username :"+session_user);
		}

	});
	
</script> 

  </body>
</html>