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

      $query = "SELECT * FROM city order by name asc ";
	  $statusSQL = "SELECT * FROM status order by name asc ";

      $fromResults = mysqli_query($connection, $query);
	  $toResults = mysqli_query($connection, $query);
	  $statusResults = mysqli_query($connection, $statusSQL);
	  
      if ($fromResults == FALSE || $toResults == FALSE || $statusResults == FALSE) {
        echo "Database query failed. <br/>";
        echo "SQL command: " . $query;
        exit();
      }
    ?>

<?php include 'header.php'; ?>

    <div class="container">
      <div class = "columns">
        <div class="column col-10 col-mx-auto">

          <a href="index.php" class="btn"> Go Back  </a>
		  <div class="column col-8 col-mx-auto">
		<a href="../index.php" class="btn" style="float:right;"> Logout </a>
		</div> 
		<div class="column col-5 col-mx-auto">
		     <form action="create.php" method="POST" class="form-group">
				
				<table>
					<tr>
						<td><label class="form-label" for="from">Pick Up</label></td>
						<td> 
							<select name="from" style="width:200px;height:40px;" >
								<?php while ($from = mysqli_fetch_assoc($fromResults)) { ?>
									<option value= <?php echo $from['id']  ?> ><?php echo $from['name']  ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td><label class="form-label" for="to">Drop Up</label></td>
						<td> 
							<select name="to" style="width:200px;height:40px;" >
								<?php while ($to = mysqli_fetch_assoc($toResults)) { ?>
									<option value= <?php echo $to['id']  ?> ><?php echo $to['name']  ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td><label class="form-label" for="timings">Timings</label></td>
						<td> 
							<select name="hour" style="width:60px;height:40px;">
								<?php for($i=1;$i<=12;$i++){ ?>
									<option value= <?php echo $i; ?> ><?php echo $i; ?></option>
								<?php } ?>
							</select>	:
							<select name="mintues"style="width:60px;height:40px;">
								<option value = "00">00</option>
								<option value = "05">05</option>
								<?php for($j=10;$j<=55;$j++){ ?>
									<option value= <?php echo $j; ?> ><?php echo $j; ?></option>
								<?php $j +=4;} ?>
							</select>
							<select name="time" style="width:60px;height:40px;">
								<option value = "AM">AM</option>
								<option value = "PM">PM</option>
							</select>
						</td>
						<tr>
						<td><label class="form-label" for="status">Current Status</label></td>
						<td> 
							<select name="status" style="width:200px;height:40px;">
								<?php while ($status = mysqli_fetch_assoc($statusResults)) { ?>
									<option value= <?php echo $status['id']  ?> ><?php echo $status['name']  ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td><label class="form-label" for="saturday"></label></td>
						
						<td><input type="checkbox" name="saturday" value="1"><span style="font-weight:bold;">*</span> Saturday Available</td>
					</tr>
				</table>  
              <input type="submit" class="btn btn-primary" value="Add New Route" />
         
          </form>
		  
        </div> <!--// col-12 -->
      </div> <!-- // column -->
    </div> <!--// container -->
    <?php
      // clean up and close database
	  mysqli_free_result($fromResults);
      mysqli_free_result($toResults);
	  mysqli_free_result($statusResults);
      mysqli_close($connection);
    ?>
<?php include 'footer.php'; ?>
  </body>
</html>