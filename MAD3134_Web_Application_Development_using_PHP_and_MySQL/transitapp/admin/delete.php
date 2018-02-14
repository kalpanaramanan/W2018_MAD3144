<?php
  if (isset($_GET["id"]) == FALSE) {
    // missing an id parameters, so
    // redirect person back to add employee page
    header("Location: " . "index.php");
    exit();
  }

  $id = $_GET["id"];

  // check for a POST request
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

    $query = "DELETE FROM routes ";
    $query .= "WHERE id='" . $id . "' ";
    $query .= "LIMIT 1";

    $results = mysqli_query($connection, $query);

    // for delete statements, the result is going to be true or false.
    if ($results == TRUE) {
      header("Location: " . "index.php");
      exit();
    }
    if ($results == FALSE) {
      echo "Database query failed. <br/>";
      echo "SQL command: " . $query;
      exit();
    }

    mysqli_free_result($results);
    mysqli_close($connection);
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
			<h3> Are you sure you want to delete this Route ? </h3>
			 <form action="delete.php?id=<?php echo $id; ?>" method="POST">
				<button type="submit" class="btn btn-primary"   name="choice"> Yes! </button>
				<a  href="index.php" class="btn btn-primary"   > No! </a>
			 </form>

        </div> <!--// col-12 -->
      </div> <!-- // column -->
    </div> <!--// container -->

   <?php include 'footer.php'; ?>


  </body>
</html>
