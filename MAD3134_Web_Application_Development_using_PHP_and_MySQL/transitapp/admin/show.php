
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
      <div class="column">
        <div class="column col-8 col-mx-auto">
		 <a href="../index.php" class="btn" style="float:right;"> Logout </a>
		 </div>
		 <div class="column col-5 col-mx-auto">
          <?php

            if (isset($_GET["id"]) == FALSE) {
              echo "<p>ID is missing </p>";
            }
            else {
              $id = $_GET["id"];
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
              $sql = "SELECT r.id as id,fl.name as `from`,tl.name as `to`, 
				r.timings as timings,s.name as `status`
				FROM `routes` as r
				INNER JOIN city as fl on fl.id = r.from
				INNER JOIN city as tl on tl.id = r.to
				INNER JOIN `status` as s on s.id = r.status WHERE r.id='" . $id . "'";

              $results = mysqli_query($connection, $sql);

              if ($results == FALSE) {
                echo "Database query failed. <br/>";
                echo "SQL command: " . $sql;
                exit();
              }

              $routes = mysqli_fetch_assoc($results);


              echo "<p style='font-size:20px;'><strong>From: </strong>" . $routes["from"] . "</p>";
              echo "<p style='font-size:20px;'><strong>To: </strong>" . $routes["to"] . "</p>";
              echo "<p style='font-size:20px;'><strong>Timings: </strong>" . $routes["timings"] . "</p>";
			  echo "<p style='font-size:20px;'><strong>Status: </strong>" . $routes["status"] . "</p>";

              echo "<br/>";

              mysqli_free_result($results);
              mysqli_close($connection);

            }
          ?>

          <p>
            <a href="index.php" class="btn">Go Back</a>
          </p>

        </div> <!--//col-10-->
      </div> <!--//columns -->
    </div> <!--// container -->

   <?php include 'footer.php'; ?>



  </body>
</html>
