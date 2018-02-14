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

      $query = "SELECT r.id as id,fl.name as pickup,tl.name as dropup, r.timings as timings,s.name as status,r.saturday as saturday
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

<?php include 'header.php'; ?>

    <div class="container">
      <div class = "columns">
        <div class="column col-10 col-mx-auto">

         <a href="addNewRoutes.php" class="btn"> Add New Route </a>
		 <a href="sendSMS.php" class="btn"> Send SMS </a>
		 <a href="../index.php" class="btn" style="float:right;"> Logout </a>

          <table class="table">
            <tr>
              <th>ID</th>
              <th>Pick up</th>
              <th>Drop Up</th>
              <th>Timings</th>
			  <th>Status</th>
              <th>Action</th>
              
            </tr>

            <?php while ($routes = mysqli_fetch_assoc($results)) { ?>
				<?php  if( $routes['saturday'] == TRUE) { ?>
					  <tr style="background-color:yellow;">
						<td><?php echo $routes['id']; ?></td>
						<td><?php echo $routes['pickup']; ?></td>
						<td><?php echo $routes['dropup']; ?></td>
						<td><?php echo $routes['timings']; ?></td>
						<td><?php echo $routes['status']; ?></td>
						<td><a class="btn btn-primary" href="<?php echo 'show.php?id=' . $routes['id']; ?>">View</a> 
						<a  class="btn btn-primary"  href="<?php echo 'edit.php?id=' . $routes['id'].'&pickup='. $routes['pickup'].'&dropup='. $routes['dropup'].'&timings='. $routes['timings'].'&status='. $routes['status']; ?>">Edit</a> 
						<a class="btn btn-primary"  href="<?php echo 'delete.php?id='. $routes["id"]; ?>">Delete</a></td>
					  </tr>
				  <?php } else { ?>
						<tr>
						<td><?php echo $routes['id']; ?></td>
						<td><?php echo $routes['pickup']; ?></td>
						<td><?php echo $routes['dropup']; ?></td>
						<td><?php echo $routes['timings']; ?></td>
						<td><?php echo $routes['status']; ?></td>
						<td><a class="btn btn-primary" href="<?php echo 'show.php?id=' . $routes['id']; ?>">View</a> 
						<a  class="btn btn-primary"  href="<?php echo 'edit.php?id=' . $routes['id'].'&pickup='. $routes['pickup'].'&dropup='. $routes['dropup'].'&timings='. $routes['timings'].'&status='. $routes['status']; ?>">Edit</a> 
						<a class="btn btn-primary"  href="<?php echo 'delete.php?id='. $routes["id"]; ?>">Delete</a></td>
					  </tr>
				  <?php } ?>
            <?php } ?>
          </table>
        </div> <!--// col-12 -->
      </div> <!-- // column -->
	  <label class="form-label" style="font-size:20px;float:right;font-weight:bold;color:red;"> *** Highligthed Routes indicates transit available on Saturday as well</label>
    </div> <!--// container -->
    <?php
      // clean up and close database
      mysqli_free_result($results);
      mysqli_close($connection);
    ?>
<?php include 'footer.php'; ?>
  </body>
</html>