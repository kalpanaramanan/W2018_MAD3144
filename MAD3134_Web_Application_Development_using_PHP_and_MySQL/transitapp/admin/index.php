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

      $results = mysqli_query($connection, $query);

      if ($results == FALSE) {
        echo "Database query failed. <br/>";
        echo "SQL command: " . $query;
        exit();
      }
    ?>
<?php session_start(); //echo $_SESSION["username"]; ?>

<?php include 'header.php'; ?>

    <div class="container">
      <div class = "columns">
        <div class="column col-10 col-mx-auto">

         <a href="addNewRoutes.php" class="btn"> Add New Route </a>
		 <a href="sendSMS.php" class="btn"> Send SMS </a>
		  <a href="userControl.php" class="btn">User Control</a>
		  <a href="../showall.php" class="btn">JSON FILE CREATION</a>
		 <a href="../index.php" class="btn" style="float:right;"> Logout </a>

          <table class="table">
            <tr>
              <th>ID</th>
              <th>Pick up</th>
              <th>Drop Up</th>
              <th>Timings</th>
			  <th>Status</th>
			  <th>Notes</th>  
              <th>Action</th>		        
            </tr>
            <?php while ($routes = mysqli_fetch_assoc($results)) { ?>
				<?php  if( $routes['saturday'] == TRUE) { ?>
					  <tr>
						<!-- <td><?php echo $routes['id']; ?></td> -->
						<td><b>*</b></td>
						<td><?php echo $routes['pickup']; ?></td>
						<td><?php echo $routes['dropup']; ?></td>
						<td><?php echo $routes['timings']; ?></td>
						<td><?php echo $routes['status']; ?></td>
						<td><?php echo $routes['notes']; ?></td>
						<td><a class="btn btn-primary" href="<?php echo 'show.php?id=' . $routes['id']; ?>">View</a> 
						<a  class="btn btn-primary"  href="<?php echo 'edit.php?id=' . $routes['id'].'&pickup='. $routes['pickup'].'&dropup='. $routes['dropup'].'&timings='. $routes['timings'].'&status='. $routes['status'].'&notes='. $routes['notes']; ?>">Edit</a> 
						<a class="btn btn-primary"  href="<?php echo 'delete.php?id='. $routes["id"]; ?>">Delete</a></td>
					  </tr>
				  <?php } else { ?>
						 <tr style="background-color:yellow;"> 
						<td><b>*</b></td>
						<!-- <td><?php echo $routes['id']; ?></td>-->
						<td><?php echo $routes['pickup']; ?></td>
						<td><?php echo $routes['dropup']; ?></td>
						<td><?php echo $routes['timings']; ?></td>
						<td><?php echo $routes['status']; ?></td>
						<td><?php echo $routes['notes']; ?></td>
						<td><a class="btn btn-primary" href="<?php echo 'show.php?id=' . $routes['id']; ?>">View</a> 
						<a  class="btn btn-primary"  href="<?php echo 'edit.php?id=' . $routes['id'].'&pickup='. $routes['pickup'].'&dropup='. $routes['dropup'].'&timings='. $routes['timings'].'&status='. $routes['status'].'&notes='. $routes['notes']; ?>">Edit</a> 
						<a class="btn btn-primary"  href="<?php echo 'delete.php?id='. $routes["id"]; ?>">Delete</a></td>
					  </tr>
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
      mysqli_free_result($results);
      mysqli_close($connection);
    ?>
<?php include 'footer.php'; ?>
  </body>
</html>