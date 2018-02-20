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

      $query = "SELECT r.id as id,fl.name as pickup,tl.name as dropup, r.timings as timings,s.name as status,r.saturday as saturday,r.notes as notes
				FROM `routes` as r
				INNER JOIN city as fl on fl.id = r.from
				INNER JOIN city as tl on tl.id = r.to
				INNER JOIN `status` as s on s.id = r.status";

      $resultsBra = mysqli_query($connection, $query);
	  $resultsMiss = mysqli_query($connection, $query);
	  $resultsLam = mysqli_query($connection, $query);

      if ($resultsBra == FALSE) {
        echo "Database query failed. <br/>";
        echo "SQL command: " . $query;
        exit();
      }
	  $now = new DateTime();
    ?>

<?php session_start(); //echo $_SESSION["username"]; ?>
<?php include 'header.php'; ?>

    <div class="container">
      <div class = "columns">
        <div class="column col-10 col-mx-auto">
			<a href="busPasses.php" class="btn" > Purchases Passes </a>
			<a href="maps.php" class="btn" > Locations </a>
			<a href="../index.php" class="btn" style="float:right;"> Logout </a>
		   <br><br>
		  <h1 style="text-decoration:underline;">  <label class="form-label" for="from">Schedule for Brampton </label></h1>
		  <br><br>
          <table class="table">
            <tr>
              <th>ID</th>
              <th>Pick up</th>
              <th>Drop Up</th>
              <th>Timings</th>
			  <th>Status</th> 
			  <th>Notes</th> 
			  <th>Next Bus In</th>
            </tr>
			
            <?php while ($routesBrampton = mysqli_fetch_assoc($resultsBra)) { ?>			
				<?php if($routesBrampton['pickup'] == "Brampton"){ ?>
				<?php
					$futureDate = new DateTime($routesBrampton['timings']);
					$diff = date_diff($now, $futureDate);
				?>
				<?php  if( $routesBrampton['saturday'] == TRUE) { ?>
					<tr>
						<!-- <td><?php echo $routesBrampton['id']; ?></td> -->
						<td><b>*</b></td>
						<td><?php echo $routesBrampton['pickup']; ?></td>
						<td><?php echo $routesBrampton['dropup']; ?></td>
						<td><?php echo $routesBrampton['timings']; ?></td>
						<td><?php echo $routesBrampton['status']; ?></td>
						<td><?php echo $routesBrampton['notes']; ?></td>
						<td><?php echo $diff->format("%h hours %i minutes") ?>
					</tr>
					 <?php } else { ?>
						<tr style="background-color:yellow;">
						<td><b>*</b></td>
						<!-- <td><?php echo $routesBrampton['id']; ?></td> -->
						<td><?php echo $routesBrampton['pickup']; ?></td>
						<td><?php echo $routesBrampton['dropup']; ?></td>
						<td><?php echo $routesBrampton['timings']; ?></td>
						<td><?php echo $routesBrampton['status']; ?></td>
						<td><?php echo $routesBrampton['notes']; ?></td>
						<td><?php echo $diff->format("%h hours %i minutes") ?>
					</tr>
					 <?php } ?>
				<?php } ?>
            <?php } ?>
          </table>
		   <br><br>
		   <h1 style="text-decoration:underline;"> <label class="form-label" for="from">Schedule for Lambton College</label></h1>
		  <br><br>
		   <table class="table">
            <tr>
              <th>ID</th>
              <th>Pick up</th>
              <th>Drop Up</th>
              <th>Timings</th>
			  <th>Status</th> 
			   <th>Notes</th> 
			  <th>Next Bus In</th>
            </tr>
            <?php while ($routesLambton = mysqli_fetch_assoc($resultsLam)) { ?>
				<?php if($routesLambton['pickup'] == "Lambton College"){ ?>
				<?php			
					$futureDate = new DateTime($routesLambton['timings']);
					$diff = date_diff($now, $futureDate);
				?>	
				<?php  if( $routesLambton['saturday'] == TRUE) { ?>				
					<tr>
						<td><b>*</b></td>
						<!-- <td><?php echo $routesLambton['id']; ?></td> -->
						<td><?php echo $routesLambton['pickup']; ?></td>
						<td><?php echo $routesLambton['dropup']; ?></td>
						<td><?php echo $routesLambton['timings']; ?></td>
						<td><?php echo $routesLambton['status']; ?></td>
						<td><?php echo $routesLambton['notes']; ?></td>
						<td><?php echo $diff->format("%h hours %i minutes") ?>
					</tr>
					<?php } else { ?>
						<tr style="background-color:yellow;">
						<td><b>*</b></td>
						<!-- <td><?php echo $routesLambton['id']; ?></td> -->
						<td><?php echo $routesLambton['pickup']; ?></td>
						<td><?php echo $routesLambton['dropup']; ?></td>
						<td><?php echo $routesLambton['timings']; ?></td>
						<td><?php echo $routesLambton['status']; ?></td>
						<td><?php echo $routesLambton['notes']; ?></td>
						<td><?php echo $diff->format("%h hours %i minutes") ?>
					</tr>
					 <?php } ?>
				<?php } ?>
            <?php } ?>
          </table>
		  <br><br>
		 <h1 style="text-decoration:underline;"> <label class="form-label" for="from">Schedule for Mississauga</label></h1>
		  <br><br>
		   <table class="table">
            <tr>
              <th>ID</th>
              <th>Pick up</th>
              <th>Drop Up</th>
              <th>Timings</th>
			  <th>Status</th> 
			  <th>Notes</th> 
			  <th>Next Bus In</th>
            </tr>
            <?php while ($routesMiss = mysqli_fetch_assoc($resultsMiss)) { ?>
			
		
			
				<?php if($routesMiss['pickup'] == "Mississauga"){ ?>
				<?php
					$futureDate = new DateTime($routesMiss['timings']);
					$diff = date_diff($now, $futureDate);
				?>
					<?php  if( $routesMiss['saturday'] == TRUE) { ?>
					<tr>
						<td><b>*</b></td>
						<!-- <td><?php echo $routesMiss['id']; ?></td> -->
						<td><?php echo $routesMiss['pickup']; ?></td>
						<td><?php echo $routesMiss['dropup']; ?></td>
						<td><?php echo $routesMiss['timings']; ?></td>
						<td><?php echo $routesMiss['status']; ?></td>
						<td><?php echo $routesMiss['notes']; ?></td>
						<td><?php echo $diff->format("%h hours %i minutes") ?>
					</tr>
					<?php } else { ?>
						<tr style="background-color:yellow;">
						<td><b>*</b></td>
						<!-- <td><?php echo $routesMiss['id']; ?></td> -->
						<td><?php echo $routesMiss['pickup']; ?></td>
						<td><?php echo $routesMiss['dropup']; ?></td>
						<td><?php echo $routesMiss['timings']; ?></td>
						<td><?php echo $routesMiss['status']; ?></td>
						<td><?php echo $routesMiss['notes']; ?></td>
						<td><?php echo $diff->format("%h hours %i minutes") ?>
					</tr>
					 <?php } ?>
				<?php } ?>
            <?php } ?>
          </table>
		   <label class="form-label" style="margin-left:10px;font-size:20px;font-weight:bold;color:red;"> *Highligthed in yellow are not available on Saturdays.</label> <br>
		   <label class="form-label" style="font-size:15px;float:right;color:black;">Updated as on 1st Feburary,2018.</label>
        </div> <!--// col-12 -->
      </div> <!-- // column -->
    </div> <!--// container -->
    <?php
      // clean up and close database
      mysqli_free_result($resultsBra);
      mysqli_close($connection);
    ?>
<?php include 'footer.php'; ?>
  </body>
</html>